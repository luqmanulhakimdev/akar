<?php

class Karyawan_model extends CI_Model {
    
    public function __contruct(){
        parent::__construct();
    }
    
//    public function get_karyawan(){
//        $this->db->select('*');
//        $this->db->from('karyawan');
//        $this->db->join('jabatan', 'jabatan.id = karyawan.id_jabatan');
//        $this->db->where('karyawan.id', $this->session->userdata('user_id'));
//        $query = $this->db->get();
//        return $query->row_array();
//    }
    
    public function get_user($table, $key, $value){
        $query = $this->db->get_where($table, array($key => $value));
        return $query->row_array();
    }

    public function update_karyawan($params, $file_name = FALSE, $id){

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

            case 'alamat':
                $data = array(
                  'kota' => $this->input->post('kota'),
                  'kecamatan' => $this->input->post('kecamatan'),
                  'desa_kel' => $this->input->post('kelurahan'),
                  'jalan_no' => $this->input->post('jalan'),
                  'rw' => $this->input->post('rw'),
                  'rt' => $this->input->post('rt'),
                  'kd_pos' => $this->input->post('kode_pos')
                );
            break;

            case 'alamat_domisili':
                $data = array(
                  'kota_domisili' => $this->input->post('kota_domisili'),
                  'kecamatan_domisili' => $this->input->post('kecamatan_domisili'),
                  'desa_kel_domisili' => $this->input->post('kelurahan_domisili'),
                  'jalan_no_domisili' => $this->input->post('jalan_domisili'),
                  'rw_domisili' => $this->input->post('rw_domisili'),
                  'rt_domisili' => $this->input->post('rt_domisili'),
                  'kd_pos_domisili' => $this->input->post('kode_pos_domisili')
                );
            break;

            case 'telepon':
                $data = array('telepon' => $this->input->post('telepon'));
            break;

            case 'jabatan':
                $data = array('jabatan' => $this->input->post('jabatan'));
            break;

            case 'status':
                $data = array('status' => $this->input->post('status'));
            break;

            case 'agama':
                $data = array('agama' => $this->input->post('agama'));
            break;

            case 'j_kel':
                $data = array('j_kel' => $this->input->post('j_kel'));
            break;

            case 'tanggal_mulai_bekerja':
                $data = array('tgl_mulai_bekerja' => date("Y-m-d", strtotime($this->input->post('tgl_mulai_bekerja'))));
            break;

            case 'status_kepegawaian':
                $data = array('status_kepegawaian' => $this->input->post('status_kepegawaian'));
            break;

            case 'email':
                $data = array('email' => $this->input->post('email'));
            break;

            case 'tgl_lahir':
                $data = array('tgl_lahir' => date("Y-m-d", strtotime($this->input->post('tgl_lahir'))));
            break;

            case 'tem_lahir':
                $data = array('tem_lahir' => $this->input->post('tem_lahir'));
            break;

            case 'bank':
                $data = array(
                    'bank' => $this->input->post('bank'),
                    'no_rek' => $this->input->post('no_rek')
                );
            break;

            case 'no_npwp':
                $data = array('no_npwp' => $this->input->post('no_npwp'));
            break;

            case 'no_ktp':
                $data = array('no_ktp' => $this->input->post('no_ktp'));
            break;

            case 'no_kk':
                $data = array('no_kk' => $this->input->post('no_kk'));
            break;

            case 'no_bpjs_ketenagakerjaan':
                $data = array();
            break;

            case 'bpjs':
                $data = array(
                    'no_bpjs_kesehatan' => $this->input->post('bpjs_kesehatan'),
                    'no_bpjs_ketenagakerjaan' => $this->input->post('bpjs_ketenagakerjaan')
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
        
        if($id === FALSE)
            $id = $this->session->userdata('user_id');
        
        $this->db->where('id', $id);
        return $this->db->update('karyawan', $data);

    }
    
}