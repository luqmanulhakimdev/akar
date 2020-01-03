<?php

class Model_admin extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function set_karyawan($file_name = FALSE){

        $data = array(
            'awalan'        => $this->input->post('awalan'),
            'nama_depan'    => $this->input->post('nama_depan'),
            'nama_tengah'   => $this->input->post('nama_tengah'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'akhiran'       => $this->input->post('akhiran'),
            'no_kk'         => $this->input->post('no_kk'),
            'no_ktp'        => $this->input->post('ktp'),
            'j_kel'         => $this->input->post('j_kel'),
            'tem_lahir'     => $this->input->post('tem_lahir'),
            'tgl_lahir'     => date("Y-m-d", strtotime($this->input->post('tgl_lahir'))),
            'username'      => $this->input->post('username'),
            'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'foto'          => $file_name,
            'kota'          => $this->input->post('kota'),
            'kecamatan'     => $this->input->post('kecamatan'),
            'desa_kel'      => $this->input->post('desa_kel'),
            'jalan_no'      => $this->input->post('jalan_no'),
            'rw'            => $this->input->post('rw'),
            'rt'            => $this->input->post('rt'),
            'kd_pos'        => $this->input->post('kode_pos'),
            'kota_domisili'         => $this->input->post('kota_domisili'),
            'kecamatan_domisili'    => $this->input->post('kecamatan_domisili'),
            'desa_kel_domisili'     => $this->input->post('desa_kel_domisili'),
            'jalan_no_domisili'     => $this->input->post('jalan_no_domisili'),
            'rw_domisili'           => $this->input->post('rw_domisili'),
            'rt_domisili'           => $this->input->post('rt_domisili'),
            'kd_pos_domisili'       => $this->input->post('kode_pos_domisili'),
            'agama'                 => $this->input->post('agama'),
            'status'                => $this->input->post('status'),
            'telepon'               => $this->input->post('telepon'),
            'email'                 => $this->input->post('email'),
            'no_npwp'               => $this->input->post('no_npwp'),
            'bank'                  => $this->input->post('nama_bank'),
            'no_rek'                => $this->input->post('no_rekening'),
            'tgl_mulai_bekerja'     => date("Y-m-d", strtotime($this->input->post('tanggal_mulai_bekerja'))),
            'status_kepegawaian'    => $this->input->post('status_kepegawaian'),
            'jabatan'               => $this->input->post('jabatan'),
            'no_bpjs_ketenagakerjaan' => $this->input->post('bpjs_ketenagakerjaan'),
            'no_bpjs_kesehatan'     => $this->input->post('bpjs_kesehatan')
        );
        return $this->db->insert('karyawan', $data);
    }

//    public function set_karyawan(){
//        
//        $data = array(
//            'id_jabatan' => $this->input->post('id_jabatan'),
//            'username' => $this->input->post('username'),
//            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
//            'nama' => $this->input->post('nama'),
//            'j_kel' => $this->input->post('j_kel')
//        );
//        
//        return $this->db->insert('karyawan', $data);
//        
//    }

//    public function jabatan_karyawan(){
//        $query = $this->db->get('jabatan');
//        return $query->result_array();
//    }

//    public function data_karyawan($number, $offset){
//        $this->db->select('*');
//        $this->db->from('karyawan');
//        $this->db->join('jabatan', 'jabatan.id = karyawan.id_jabatan');
//        $this->db->order_by('karyawan.id', 'DESC');
//        $query = $this->db->limit($number, $offset)->get();
//        return $query->result_array();
//    }

    public function data_karyawan($number, $offset){
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->order_by('karyawan.id', 'DESC');
        $query = $this->db->limit($number, $offset)->get();
        return $query->result_array();
    }
    
    public function update_admin($params, $file_name = FALSE){
        switch($params){
            case 'nama':
                $data = array(
                    'awalan' => $this->input->post('awalan'),
                    'nama_depan' => $this->input->post('nama_depan'),
                    'nama_tengah' => $this->input->post('nama_tengah'),
                    'nama_belakang' => $this->input->post('nama_belakang'),
                    'akhiran' => $this->input->post('akhiran')
                );
            break;
                
            case 'password':
                $data = array(
                    'password' => password_hash($this->input->post('repassword'), PASSWORD_DEFAULT)
                );
            break;
                
            case 'photo':
                $data = array('foto' => $file_name);
            break;
        }
        
        $this->db->where('id', $this->session->userdata('user_id'));
        return $this->db->update('admin', $data);
    }
    
    public function check_password($id, $password){
        $this->load->model('karyawan_model');
        $hash = $this->karyawan_model->get_user('admin', 'id', $id)['password'];
        if(password_verify($password, $hash)){
            return true;
        }
       
        return false;
    }

    public function num_rows(){
        $query = $this->db->get('karyawan')->num_rows();
        return $query;
    }

    public function num_rows_search($keyword){
        $this->db->like('awalan', $keyword);
        $this->db->or_like('nama_depan', $keyword);
        $this->db->or_like('nama_tengah', $keyword);
        $this->db->or_like('nama_belakang', $keyword);
        $this->db->or_like('jabatan', $keyword);
        $query = $this->db->get('karyawan')->num_rows();
        return $query;
    }

//    public function get_search($keyword, $perpage = FALSE, $from = FALSE){
//        $this->db->select('*');
//        $this->db->from('karyawan');
//        $this->db->join('jabatan', 'jabatan.id = karyawan.id_jabatan');
//        $this->db->like('karyawan.nama', $keyword);
//        $this->db->or_like('jabatan.nama_jabatan', $keyword);
//        $this->db->order_by('karyawan.id', 'DESC');
//        $query = $this->db->limit($perpage, $from)->get();
//        return $query->result_array();
//    }
    
    public function get_search($keyword, $perpage = FALSE, $from = FALSE){
        $this->db->like('awalan', $keyword);
        $this->db->or_like('nama_depan', $keyword);
        $this->db->or_like('nama_tengah', $keyword);
        $this->db->or_like('nama_belakang', $keyword);
        $this->db->or_like('jabatan', $keyword);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->limit($perpage, $from)->get('karyawan');
        return $query->result_array();
    }
    
}