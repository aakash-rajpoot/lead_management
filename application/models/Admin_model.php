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

    function change_password($new_pass){
        $this->db->set('password', $new_pass);
        $this->db->where('role_id', 1);
        return $this->db->update('sq_admin');
        
    }

    function check_old_password() {
        $this->db->select('password');
        $this->db->from('sq_admin');
		$this->db->where('role_id', 1);
		$query = $this->db->get();
        return $query->row_array();
    }



}