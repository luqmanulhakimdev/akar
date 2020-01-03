<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('karyawan_model');
        $this->load->model('model_auth');
    }
    
    public function profile($id = FALSE){
        if(!$this->session->has_userdata('user_id')){
            redirect('login');
        }
        
        if($id == FALSE)
            $id = $this->session->userdata('user_id');
        
        $data['karyawan'] = $this->karyawan_model->get_user('karyawan', 'id', $id);
        
        $this->load->view('templates/header_profile');
        $this->load->view('karyawan/profile', $data);
        $this->load->view('templates/footer_profile');
    }
    
//    public function edit($params = FALSE){
//        if(!$this->session->has_userdata('user_id')){
//            redirect('login');
//        }
//        
//        switch($params){
//            case 'nama':
//                $this->form_validation->set_rules('nama', 'Nama', 'required');
//            break;
//                
//            case 'alamat':
//                $this->form_validation->set_rules('alamat', 'Alamat', 'required');
//            break;
//                
//            case 'telepon':
//                $this->form_validation->set_rules('telepon', 'Telepon', 'required');
//            break;
//                
//            case 'email':
//                $this->form_validation->set_rules('email', 'Email', 'required');
//            break;
//                
//            case 'lahir':
//                $this->form_validation->set_rules('tem_lahir', 'Tempat lahir', 'required');
//                $this->form_validation->set_rules('tgl_lahir', 'Tanggal lahir', 'required');
//            break;
//
//            case 'password':
//                $this->form_validation->set_rules('password', 'Password', 'required|callback_check_password');
//                $this->form_validation->set_rules('new-password', 'Password baru', 'required');
//                $this->form_validation->set_rules('repassword', 'Ulangi Password', 'required|matches[repassword]');
//            break;
//                
//            case 'photo':
//                $config['upload_path'] = './assets/photo/';
//                $config['allowed_types'] = 'gif|jpg|png';
//                $config['encrypt_name'] = TRUE;
//                $this->upload->initialize($config);
//                
//                if($this->upload->do_upload('photo')){
//                    $data = $this->upload->data();
//                    $file_name = $data['file_name'];
//                    
//                    $this->karyawan_model->update_karyawan($params, $file_name);
//                    redirect('profile');
//                }
//            break;
//                
//            default:
//                show_404();
//        }
//
//        if($this->form_validation->run() === TRUE){
//            $this->karyawan_model->update_karyawan($params);
//            redirect('profile');
//        }
    
    
    public function edit($params = FALSE, $id = FALSE){
        if(!$this->session->has_userdata('user_id')){
            redirect('login');
        }

        switch($params){
            case 'nama':
                $this->form_validation->set_rules('awalan', 'Gelar awal');
                $this->form_validation->set_rules('nama_depan', 'Nama depan', 'required');
                $this->form_validation->set_rules('nama_tengah', 'Nama tengah');
                $this->form_validation->set_rules('nama_belakang', 'Nama belakang');
                $this->form_validation->set_rules('akhiran', 'Gelar akhir');
            break;   
                
            case 'tem_lahir':
                $this->form_validation->set_rules('tem_lahir', 'Tempat lahir', 'required');
            break; 
                
            case 'tgl_lahir':
                $this->form_validation->set_rules('tgl_lahir', 'Tanggal lahir', 'required');
            break;
                
            case 'j_kel':
                $this->form_validation->set_rules('j_kel', 'Jenis kelamin', 'required');
            break;
              
            case 'agama':
                $this->form_validation->set_rules('agama', 'Agama', 'required');
            break;
                
            case 'status':
                $this->form_validation->set_rules('status', 'Status', 'required');
            break;
                
            case 'username':
                $this->form_validation->set_rules('username', 'Username', 'required');
            break;
                
            case 'password':
                $this->form_validation->set_rules('password', 'Password', 'required|callback_check_password');
                $this->form_validation->set_rules('new-password', 'Password baru', 'required');
                $this->form_validation->set_rules('repassword', 'Ulangi Password', 'required|matches[repassword]');
            break;
                
            case 'alamat':
                $this->form_validation->set_rules('kota', 'Kota', 'required', 'alpha');
                $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required', 'alpha');
                $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required', 'alpha');
                $this->form_validation->set_rules('jalan', 'Jalan & Nomer rumah', 'required', 'alpha_numeric');
                $this->form_validation->set_rules('rw', 'RW', 'alpha_numeric');
                $this->form_validation->set_rules('rt', 'RT', 'alpha_numeric');
                $this->form_validation->set_rules('kode_pos', 'kode POS', 'alpha');
            break;

            case 'alamat_domisili':
                $this->form_validation->set_rules('kota_domisili', 'Kota', 'required');
                $this->form_validation->set_rules('kecamatan_domisili', 'Kecamatan', 'required');
                $this->form_validation->set_rules('kelurahan_domisili', 'Kelurahan', 'required');
                $this->form_validation->set_rules('jalan_domisili', 'Jalan & Nomer rumah', 'required');
                $this->form_validation->set_rules('rw_domisili', 'RW');
                $this->form_validation->set_rules('rt_domisili', 'RT');
                $this->form_validation->set_rules('kode_pos_domisili', 'kode POS');
            break;

            case 'email':
                $this->form_validation->set_rules('email', 'Email', 'valid_email');
            break;

            case 'telepon':
                $this->form_validation->set_rules('telepon', 'Telepon', 'required');
            break;            
            
            case 'no_ktp':
                $this->form_validation->set_rules('no_ktp', 'Nomer KTP', 'required');
            break;
                
            case 'no_kk':
                $this->form_validation->set_rules('no_kk', 'Nomer kartu keluarga', 'numeric');
            break;
                
            case 'photo':
                $config['upload_path'] = './assets/photo/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);
                $delete = $this->karyawan_model->get_user('karyawan', 'id', $this->session->userdata('user_id'));
                $path = './assets/photo/' .$delete['foto'];
                unlink($path);

                if($this->upload->do_upload('photo')){
                    $data = $this->upload->data();
                    $file_name = $data['file_name'];

                    $this->karyawan_model->update_karyawan($params, $file_name, $id);
                    redirect('admin/detail/'.$id);
                }
            break;
                
            case 'jabatan':
                $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
            break;
                
            case 'status_kepegawaian':
                $this->form_validation->set_rules('status_kepegawaian', 'Status kepegawaian', 'required');
            break;

            case 'tanggal_mulai_bekerja':
                $this->form_validation->set_rules('tgl_mulai_bekerja', 'Tanggal mulai bekerja', 'required');
            break;

            case 'no_npwp':
                $this->form_validation->set_rules('no_npwp', 'Nomer NPWP', 'numeric');
            break;

            case 'bpjs':
                $this->form_validation->set_rules('bpjs_ketenagakerjaan', 'BPJS ketenagakerjaan', 'numeric');
                $this->form_validation->set_rules('bpjs_kesehatan', 'BPJS kesehatan', 'numeric');
            break;

            case 'bank':
                $this->form_validation->set_rules('bank', 'Nama bank', 'alpha');
                $this->form_validation->set_rules('no_rek', 'Nomer rekening', 'numeric');
            break;
                
            default:
                show_404();
        }

        if($this->form_validation->run() === TRUE){
            $this->karyawan_model->update_karyawan($params, FALSE, $id);
            if($id === FALSE){ 
                redirect('profile');
            }
            
            redirect('admin/detail/'.$id);
        }
    }    
    
    public function check_password($password){
        
        if(!$this->model_auth->check_password($this->session->userdata('username'), $password, 'karyawan')){
            $this->form_validation->set_message('check_password', 'Password is incorrect');
            die('Password is incorrect');
            return false;
        }
        
        return true;
    }
    
    
}