<?php

class Model_auth extends CI_Model {
     
    public function __construct(){
        parent::__construct();
    }

    public function get_user($key, $value, $table){
        $query = $this->db->get_where($table, array($key => $value));
        if(!empty($query->row_array())){
            return $query->row_array();
        }

        return false;
    }

//    public function get_jabatan(){
//        $query = $this->db->get('jabatan');
//        return $query->result_array();
//    }
     
//    public function get_userjabatan($id){
//        $query = $this->db->get_where('jabatan', array('id' => $id));
//        return $query->row_array();
//    }

    public function check_password($username, $password, $table){
        $hash = $this->get_user('username', $username, $table)['password'];
        if(password_verify($password, $hash)){
            return true;
        }
       
        return false;
    }

}