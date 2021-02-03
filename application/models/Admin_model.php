<?php
class Admin_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

   function login_verification(){
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $this->db->select("id,username,email");
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

    function fetch_admin_profile_details(){
        $this->db->select('*');
        $this->db->from('sq_admin');
        $this->db->where('role_id', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    function profile_update(){
        $data = array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'mobile' => $this->input->post('mobile'),
            'dob' => $this->input->post('dob'),
            'address' => $this->input->post('address'),
            'gender' => $this->input->post('gender')
        ); 
        if(!empty($this->input->post('profile_image'))) {
            $data['profile_image'] = $this->input->post('profile_image');
        }
        
        // $profile = $this->input->post('profile_image');
        $this->db->set($data);
        $this->db->where('role_id', 1);
        return $this->db->update('sq_admin',$data);
    }




}