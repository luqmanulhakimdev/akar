<?php

class Absen_model extends CI_Model {
    
    public function __contruct(){
        parent::__construct();
    }
    
    public function input_absen($id_karyawan, $tanggal, $masuk, $keterangan = '', $ip_address, $latlng){

        $data = array(
            'id_karyawan' => $id_karyawan,
            'tanggal' => $tanggal,
            'masuk' => $masuk,
            'keterangan' => $keterangan,
            'ip_address' => $ip_address,
            'latlng_masuk' => $latlng
        );
        
        return $this->db->insert('absen', $data);
    }
    
    public function input_pulang($id_absen, $pulang, $keterangan = '', $latlng){
        
        $data = array(
            'pulang' => $pulang,
            'keterangan' => $keterangan,
            'latlng_pulang' => $latlng
        );
        
        $this->db->where('id', $id_absen);
        return $this->db->update('absen', $data);
        
    }
    
    public function num_rows($id = FALSE){
        if($id == FALSE){
            $query = $this->db->get('absen')->num_rows();
            return $query;
        }
        
        $query = $this->db->get_where('absen', array('id_karyawan' => $id))->num_rows();
        return $query;
    }
    
    public function num_rows_search($keyword, $id = FALSE){
        if($id == FALSE){   
            $this->db->select('*');
            $this->db->from('absen');
            $this->db->join('karyawan', 'karyawan.id = absen.id_karyawan', 'inner');
            $this->db->like('absen.tanggal', $keyword);
            $this->db->or_like('karyawan.awalan', $keyword);
            $this->db->or_like('karyawan.nama_depan', $keyword);
            $this->db->or_like('karyawan.nama_tengah', $keyword);
            $this->db->or_like('karyawan.nama_belakang', $keyword);
            $this->db->or_like('karyawan.akhiran', $keyword);
            $query = $this->db->get()->num_rows();
            return $query;
        }
        
        $this->db->select('*');
        $this->db->from('absen');
        $this->db->join('karyawan', 'karyawan.id = absen.id_karyawan', 'inner');
        $this->db->where('absen.id_karyawan', $id);
        $this->db->like('absen.tanggal', $keyword);
        $query = $this->db->get()->num_rows();
        return $query;
    }
    
    public function num_rows_search_between($date, $date2){
        $this->db->select('*');
        $this->db->from('absen');
        $this->db->join('karyawan', 'karyawan.id = absen.id_karyawan', 'inner');
        $this->db->where('absen.tanggal BETWEEN ' .$date. ' AND ' .$date2);
        $query = $this->db->get()->num_rows();
        return $query;
    }
    
    public function get_absen($perpage = FALSE, $from = FALSE, $id_karyawan = FALSE){
        if($id_karyawan === FALSE){
            $this->db->select('absen.*, karyawan.foto, karyawan.awalan, karyawan.nama_depan, karyawan.nama_tengah, karyawan.nama_belakang, karyawan.akhiran');
            $this->db->from('absen');
            $this->db->join('karyawan', 'karyawan.id = absen.id_karyawan');
            $this->db->order_by('absen.id', 'DESC');
            $query = $this->db->limit($perpage, $from)->get();
            return $query->result_array();    
        }
        
        $this->db->select('absen.*, karyawan.foto, karyawan.awalan, karyawan.nama_depan, karyawan.nama_tengah, karyawan.nama_belakang, karyawan.akhiran');
        $this->db->from('absen');
        $this->db->join('karyawan', 'karyawan.id = absen.id_karyawan');
        $this->db->where('absen.id_karyawan', $id_karyawan);
        $this->db->order_by('absen.id', 'DESC');
        $query = $this->db->limit($perpage, $from)->get();
        return $query->result_array();   
    }
    
    public function get_absen_id($id){
        $this->db->select('absen.*, karyawan.foto, karyawan.awalan, karyawan.nama_depan, karyawan.nama_tengah, karyawan.nama_belakang, karyawan.akhiran, karyawan.username');
        $this->db->from('absen');
        $this->db->join('karyawan', 'karyawan.id = absen.id_karyawan');
        $query = $this->db->where('absen.id', $id)->get();
        return $query->row_array();
    }
    
    public function get_search($keyword, $perpage = FALSE, $from = FALSE, $id = FALSE){
        if($id == FALSE){   
            $this->db->select('*');
            $this->db->from('absen');
            $this->db->join('karyawan', 'karyawan.id = absen.id_karyawan', 'inner');
            $this->db->like('absen.tanggal', $keyword);
            $this->db->or_like('karyawan.awalan', $keyword);
            $this->db->or_like('karyawan.nama_depan', $keyword);
            $this->db->or_like('karyawan.nama_tengah', $keyword);
            $this->db->or_like('karyawan.nama_belakang', $keyword);
            $this->db->or_like('karyawan.akhiran', $keyword);
            $this->db->order_by('absen.id', 'DESC');
            $query = $this->db->limit($perpage, $from)->get();
            return $query->result_array();
        }
        
        $this->db->select('*');
        $this->db->from('absen');
        $this->db->join('karyawan', 'karyawan.id = absen.id_karyawan', 'inner');
        $this->db->where('absen.id_karyawan', $id);
        $this->db->like('absen.tanggal', $keyword);
        $this->db->order_by('absen.id', 'DESC');
        $query = $this->db->limit($perpage, $from)->get();
        return $query->result_array();
    }
    
    public function get_search_between($date, $date2, $perpage = FALSE, $from = FALSE){
        $this->db->select('*');
        $this->db->from('absen');
        $this->db->join('karyawan', 'karyawan.id = absen.id_karyawan', 'inner');
        $this->db->where('absen.tanggal BETWEEN ' .$date. ' AND ' .$date2);
        $query = $this->db->limit($perpage, $from)->get();
        return $query->result_array();
    }
    
    public function get_all(){
        $this->db->select('*');
        $this->db->from('absen');
        $this->db->join('karyawan', 'karyawan.id = absen.id_karyawan');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function check_absen($id_karyawan, $tanggal){
        $this->db->where('id_karyawan', $id_karyawan);
        $this->db->where('tanggal', $tanggal);
        $query = $this->db->get('absen');
        
        if(!empty($query->row_array())){
            return true;
        }

        return false;
    }
    
    public function check_absen_pulang($id_karyawan, $tanggal){
        $this->db->where('id_karyawan', $id_karyawan);
        $this->db->where('tanggal', $tanggal);
        $this->db->where('pulang IS NOT NULL');
        $query = $this->db->get('absen');
        
        if(!empty($query->row_array())){
            return true;
        }

        return false;
    }
    
    public function check_pulang($id_karyawan, $tanggal){
        $this->db->where('id_karyawan', $id_karyawan);
        $this->db->where('tanggal', $tanggal);
        $this->db->where('pulang IS NULL');
        $query = $this->db->get('absen');
        
        if(!empty($query->row_array())){
            return $query->row_array();
        }

        return false;
    }
    
//    public function get_absen(){
//        
//        $query = $this->db->get();
//        
//        return $query->result_array();
//    }
    
}