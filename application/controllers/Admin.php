<?php

defined('BASEPATH') OR exit('No direct script acess allowed');

class Admin extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('model_admin');
        $this->load->model('karyawan_model');
    }
    
    public function tambah_data(){
        if(!$this->session->has_userdata('logged_in'))
            redirect('login');

        if($this->session->userdata('user_status') != 'admin')
            redirect('data_karyawan');

        $this->form_validation->set_rules('awalan', 'Gelar depan', '');
        $this->form_validation->set_rules('nama_depan', 'Nama depan', 'required');
        $this->form_validation->set_rules('nama_tengah', 'Nama tengah', '');
        $this->form_validation->set_rules('nama_belakang', 'Nama belakang', '');
        $this->form_validation->set_rules('akhiran', 'Gelar belakang', '');
        $this->form_validation->set_rules('no_kk', 'Nomer kk', '');
        $this->form_validation->set_rules('ktp', 'KTP', 'required');
        $this->form_validation->set_rules('j_kel', 'Jenis kelamin', 'callback_check_default_jkel');
        $this->form_validation->set_rules('tem_lahir', 'Tempat lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal lahir', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('desa_kel', 'Kelurahan / Desa', 'required');
        $this->form_validation->set_rules('jalan_no', 'Jalan & Nomer rumah', 'required');
        $this->form_validation->set_rules('rw', 'Rw', '');
        $this->form_validation->set_rules('rt', 'Rt', '');
        $this->form_validation->set_rules('kode_pos', 'Kode pos', '');
        if($this->input->post('domisili') == 'true'){
            $this->form_validation->set_rules('kota_domisili', 'Kota domisili', 'required');
            $this->form_validation->set_rules('kecamatan_domisili', 'Kecamatan domisili', 'required');
            $this->form_validation->set_rules('desa_kel_domisili', 'Kelurahan / Desa domisili', 'required');
            $this->form_validation->set_rules('jalan_no_domisili', 'Jalan & Nomer rumah domisili', 'required');
            $this->form_validation->set_rules('rw_domisili', 'Rw domisili', '');
            $this->form_validation->set_rules('rt_domisili', 'Rt domisili', '');
            $this->form_validation->set_rules('kode_pos_domisili', 'Kode pos domisili', '');
        }
        $this->form_validation->set_rules('agama', 'Agama', 'callback_check_default_agama');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', '');
        $this->form_validation->set_rules('no_npwp', 'Nomer NPWP', '');
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', '');
        $this->form_validation->set_rules('no_rekening', 'Nomer rekening', '');
        $this->form_validation->set_rules('tanggal_mulai_bekerja', 'Tanggal mulai bekerja', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('status_kepegawaian', 'Status pegawai', 'required');
        $this->form_validation->set_rules('bpjs_ketenagakerjaan', 'Nomer BPJS ketenagakerjaan', '');
        $this->form_validation->set_rules('bpjs_kesehatan', 'Nomer BPJS kesehatan', '');

        if($this->form_validation->run() === FALSE){

            $this->load->view('templates/header');
            $this->load->view('karyawan/tambah_data');
            $this->load->view('templates/footer_tambahdata');
        }else{
            $config['upload_path'] = './assets/photo/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
                
            if($this->upload->do_upload('photo')){
                $data = $this->upload->data();
                $file_name = $data['file_name'];
            }
            
            $this->model_admin->set_karyawan($file_name);
            redirect('data_karyawan');
        }

    }
    
    function check_default_jkel($params){
        if($params == 'default'){
            $this->form_validation->set_message('check_default_jkel', 'The Jenis kelamin field is required.');
            return FALSE;
        }
        
        return TRUE;
    }
    
    function check_default_agama($params){
        if($params == 'default'){
            $this->form_validation->set_message('check_default_agama', 'The Agama field is required.');
            return FALSE;
        }
        
        return TRUE;
    }

//    public function tambah_data(){
//        if(!$this->session->has_userdata('logged_in'))
//            redirect('login');
//        
//        if($this->session->userdata('user_status') == 'karyawan')
//            redirect('data_karyawan');
//            
//        $this->form_validation->set_rules('id_jabatan', 'Jabatan', 'required');
//        $this->form_validation->set_rules('username', 'Username', 'required');
//        $this->form_validation->set_rules('password', 'Password', 'required');
//        $this->form_validation->set_rules('nama', 'Nama', 'required');
//        $this->form_validation->set_rules('j_kel', 'Jenis kelamin', 'required');
//
//        if($this->form_validation->run() === FALSE){
////            $data['jabatan'] = $this->model_admin->jabatan_karyawan();
//            
//            $this->load->view('templates/header');
//            $this->load->view('admin/tambah_data');
//            $this->load->view('templates/footer');
//        }else{
//            $this->model_admin->set_karyawan();
//            redirect('data_karyawan');
//        }
//        
//    }

    public function data_karyawan(){
        if(!$this->session->has_userdata('user_id')){
            redirect('login');
        }elseif($this->session->userdata('user_status') === 'karyawan'){
            redirect('data_absenku');
        }

        $num_rows = $this->model_admin->num_rows();
        $config['base_url'] = 'http://localhost/akar/data_karyawan/page';
        $config['total_rows'] = $num_rows;
        $config['per_page'] = 20;
        $config['num_links'] = 4;
        $config['uri_segment'] = 3;
        $config['first_url'] = 1;
        $config['use_page_numbers'] = TRUE;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&larr; Prev';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="current"><a href="">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';

        $page = ($this->uri->segment(3) > 1)?($this->uri->segment(3) * $config['per_page']) - $config['per_page'] : 0;
        $pages = ceil($num_rows/$config['per_page']);
        
        if($this->uri->segment(3) > $pages){ redirect('data_karyawan'); }
        
        $this->pagination->initialize($config);
        $data['karyawan'] = $this->model_admin->data_karyawan($config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        
        $this->load->view('templates/header_profile');
        $this->load->view('karyawan/data_karyawan', $data);
        $this->load->view('templates/footer_profile');
    }

    public function search(){
        
        $num_rows = $this->model_admin->num_rows_search($this->input->get('key'));
        $config['base_url'] = 'http://localhost/akar/search/karyawan?key=' .$this->input->get('key');
        $config['total_rows'] = $num_rows;
        $config['per_page'] = 1;
        $config['num_links'] = 4;
        $config['uri_segment'] = $this->input->get('page');
        $config['first_url'] = 'http://localhost/akar/search/karyawan?key=' .$this->input->get('key'). '&page=1';
        $config['query_string_segment'] = 'page';
        $config['page_query_string'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&larr; Prev';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="current"><a href="">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';

        $page = ($this->input->get('page') > 1) ? ($this->input->get('page') * $config['per_page']) - $config['per_page'] : 0;
        $pages = ceil($num_rows/$config['per_page']);

        if($this->input->get('page') > $pages){ redirect('admin/data_karyawan'); }

        $this->pagination->initialize($config);
        $data['karyawan'] = $this->model_admin->get_search($this->input->get('key'), $config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();

        $this->load->view('templates/header_profile');
        $this->load->view('karyawan/data_karyawan', $data);
        $this->load->view('templates/footer_profile');
    }
    
//    public function detail($id){
//        if(!$this->session->has_userdata('user_id')){
//            redirect('login');
//        }elseif($this->session->userdata('user_status') === 'karyawan'){
//            redirect('data_absenku');
//        }
//
//        $data['karyawan'] = $this->karyawan_model->get_user('karyawan', 'id', $id);
//        $this->load->view('templates/header');
//        $this->load->view('karyawan/detail', $data);
//        $this->load->view('templates/footer');
//    }
    
    public function profile(){
        if(!$this->session->has_userdata('user_id')){
            redirect('login');
        }elseif($this->session->userdata('user_status') === 'karyawan'){
            redirect('data_absenku');
        }

        $data['data'] = $this->karyawan_model->get_user('admin', 'id', $this->session->userdata('user_id'));
        $this->load->view('templates/header');
        $this->load->view('admin/profile', $data);
        $this->load->view('templates/footer');
    }
    
    public function edit($params = FALSE){
        if(!$this->session->has_userdata('user_id')){
            redirect('login');
        }elseif($this->session->userdata('user_status') === 'karyawan'){
            redirect('data_absenku');
        }

        switch($params){
            case 'nama':
                $this->form_validation->set_rules('awalan', 'Awalan');
                $this->form_validation->set_rules('nama_depan', 'Nama depan', 'required');
                $this->form_validation->set_rules('nama_tengah', 'Nama tengah');
                $this->form_validation->set_rules('nama_belakang', 'Nama belakang', 'required');
                $this->form_validation->set_rules('akhiran', 'Akhiran');
            break;
                
            case 'password':
                $this->form_validation->set_rules('password', 'Password', 'required|callback_check_password');
                $this->form_validation->set_rules('new-password', 'Password baru', 'required');
                $this->form_validation->set_rules('repassword', 'Ulangi Password', 'required|matches[repassword]');
            break;   
                
            case 'photo':
                $config['upload_path'] = './assets/photo/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|jpe';
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                $delete = $this->karyawan_model->get_user('admin', 'id', $this->session->userdata('user_id'));

                if(!empty($delete['foto'])) {
                    $path = './assets/photo/' .$delete['foto'];
                    unlink($path);
                }

                if($this->upload->do_upload('photo')){
                    $data = $this->upload->data();
                    $file_name = $data['file_name'];

                    $this->model_admin->update_admin($params, $file_name);
                    redirect('admin/profile');
                } else {
                    die($this->upload->display_errors('<p>', '</p>'));
                    die(var_dump($_FILES['photo']));
                    die(var_dump($this->upload->do_upload('photo')));
                }
            break;
                
            default:
                show_404();
        }

        if($this->form_validation->run() === TRUE){
            $this->model_admin->update_admin($params);
            redirect('admin/profile');
        }
    }
    
    public function check_password($password){
        
        if(!$this->model_admin->check_password($this->session->userdata('user_id'), $password)){
            $this->form_validation->set_message('check_password', 'Password is incorrect');
            die('Password is incorrect');
            return false;
        }
        
        return true;
    }
    
}
