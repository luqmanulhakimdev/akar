<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('model_auth');
        $this->load->model('absen_model');
    }

//    public function login(){
//        if($this->session->has_userdata('user_id')){
//            redirect('absen');
//        }
//        
//        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username');
//        $this->form_validation->set_rules('password', 'Password', 'required|callback_check_password');
//
//        if($this->form_validation->run() === FALSE){
//            $data['jabatan'] = $this->model_auth->get_jabatan();
//            $data['title'] = 'jabatan';
//            
//            $this->load->view('templates/header');
//            $this->load->view('auth/login', $data);
//            $this->load->view('templates/footer');
//        }else{
//            $karyawan = $this->model_auth->get_user('username', $this->input->post('username'));
//            $status = $this->model_auth->get_userjabatan($karyawan['id_jabatan']);
//            
//            if($this->absen_model->check_absen($karyawan['id'], mdate('%Y-%m-%d')))
//                $masuk = TRUE;
//            else
//                $masuk = FALSE;
//
//            $data = array(
//                'username' => $karyawan['username'],
//                'user_id' => $karyawan['id'],
//                'user_jabatan' => $status['nama_jabatan'],
//                'absen_masuk' => $masuk,
//                'logged_in' => TRUE
//            );
//            
//            $this->session->set_userdata($data);
//            redirect('absen');
//        }
//    }
    
    public function login(){
        if($this->session->has_userdata('user_id')){
            redirect('data_absenku');
        }
        
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username');
        $this->form_validation->set_rules('password', 'Password', 'required|callback_check_password');

        if($this->form_validation->run() === FALSE){
//            $data['jabatan'] = $this->model_auth->get_jabatan();
//            $data['title'] = 'jabatan';
            
            $this->load->view('templates/header');
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        }else{
            $karyawan = $this->model_auth->get_user('username', $this->input->post('username'), 'karyawan');
//            $status = $this->model_auth->get_userjabatan($karyawan['id_jabatan']);
            
            if($this->absen_model->check_absen($karyawan['id'], mdate('%Y-%m-%d'))){
                if($this->absen_model->check_absen_pulang($karyawan['id'], mdate('%Y-%m-%d'))){
                    $key = 'absen_pulang';
                    $value = TRUE;
                }else{
                    $key = 'absen_masuk';
                    $value = TRUE;
                }
                    
//                if($this->absen_model->check_absen($karyawan['id'], mdate('%Y-%m-%d') > 0){
//                    $pulang = TRUE;
//                }  
            }else{
                $key = 'absen_masuk';
                $value = FALSE;
            }

            $data = array(
                'username' => $karyawan['username'],
                'user_id' => $karyawan['id'],
                'user_status' => 'karyawan',
                $key => $value,
                'logged_in' => TRUE
            );
            
            $this->session->set_userdata($data);
            redirect('absen');
        }
    }
    
    public function login_admin(){
        if($this->session->has_userdata('user_id')){
            redirect('data_absen');
        }
        
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_admin');
        $this->form_validation->set_rules('password', 'Password', 'required|callback_check_password_admin');

        if($this->form_validation->run() === FALSE){
//            $data['jabatan'] = $this->model_auth->get_jabatan();
//            $data['title'] = 'jabatan';
            
            $this->load->view('templates/header');
            $this->load->view('auth/login_admin');
            $this->load->view('templates/footer');
        }else{
            $admin = $this->model_auth->get_user('username', $this->input->post('username'), 'admin');
//            $status = $this->model_auth->get_userjabatan($karyawan['id_jabatan']);

            $data = array(
                'username' => $admin['username'],
                'user_id' => $admin['id'],
                'user_status' => 'admin',
                'logged_in' => TRUE
            );
            
            $this->session->set_userdata($data);
            redirect('data_absen');
        }
    }
    
    public function logout(){
        if(!$this->session->has_userdata('user_id')){
            redirect('login');
        }
        
        $data = array('username', 'user_id', 'logged_in', 'user_status', 'absen_masuk', 'absen_pulang');
        $this->session->unset_userdata($data);
        redirect('login');
    }

    public function check_username($username){
        
        if(!$this->model_auth->get_user('username', $username, 'karyawan')){
            $this->form_validation->set_message('check_username', 'Username is not on database');
            return false;
        }
        
        return true;
    }

    public function check_password($password){

        $user = $this->model_auth->get_user('username', $this->input->post('username'), 'karyawan');
        if(!$this->model_auth->check_password($user['username'], $password, 'karyawan')){
            $this->form_validation->set_message('check_password', 'Password is incorrect');
            return false;
        }
        
        return true;
    }

    public function check_username_admin($username){
        
        if(!$this->model_auth->get_user('username', $username, 'admin')){
            $this->form_validation->set_message('check_username_admin', 'Username is not on database');
            return false;
        }
        
        return true;
    }

    public function check_password_admin($password){

        $user = $this->model_auth->get_user('username', $this->input->post('username'), 'admin');
        if(!$this->model_auth->check_password($user['username'], $password, 'admin')){
            $this->form_validation->set_message('check_password_admin', 'Password is incorrect');
            return false;
        }
        
        return true;
    }
    
}
