<?php
class Admin_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

   function login_verification($email, $password){
        $this->db->select("name,email");
        $this->db->from('sq_admin');
        $this->db->where(array('email'=>$email,'password'=>$password,'role_id'=>'1'));
        return $this->db->get();

    }



}