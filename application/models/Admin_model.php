<?php
class Admin_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

   function login_verification(){
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $this->db->select("id,fname,lname,email,role,active,joining_date,resignation_date,profile_image");
        $this->db->from('sq_members');
        $this->db->where(array('email'=>$email,'password'=>$password));
        return $this->db->get();

    }

    function change_password($new_pass){
        $user = $this->session->get_userdata();
        $this->db->set('password', $new_pass);
        $this->db->where('id', $user['id']);
        return $this->db->update('sq_members');
    }

    function check_old_password() {
        $user = $this->session->get_userdata();
        $this->db->select('password');
        $this->db->from('sq_members');
		$this->db->where('id', $user['id']);
		$query = $this->db->get();
        return $query->row_array();
    }

    function fetch_profile_details(){
        $user = $this->session->get_userdata();
        $this->db->select('*');
        $this->db->from('sq_members');
        $this->db->where('id', $user['id']);
        $query = $this->db->get();
        return $query->row_array();
    }

    function profile_update(){
        $user = $this->session->get_userdata();
        $data = array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'mobile' => $this->input->post('mobile'),
            'dob' => $this->input->post('dob'),
            'permanent' => $this->input->post('permanent'),
            'correspondence' => $this->input->post('correspondence'),
            'gender' => $this->input->post('gender')
        ); 
        if(!empty($this->input->post('profile_image'))) {
            $data['profile_image'] = $this->input->post('profile_image');
        }
        $this->db->set($data);
        $this->db->where('id', $user['id']);
        return $this->db->update('sq_members',$data);
    }



}