<?php
class Agent_api_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function agent_mobile_post($email) {
        return $this->db->get_where("sq_members", ['email' => $email,'active'=>'1'])->row_array();
    }

    function save_login_otp($login_otp,$data,$token){
        $this->db->insert('sq_otp_verification',['otp'=>$login_otp,'agent_id'=>$data['id']]);
        return $this->db->update('sq_members',['auth_token'=>$token],array('email'=>$data['email'],'active'=>1));
    }

    function verify_sent_otp($otp,$userData){
        $this->db->select('*');
        $this->db->from('sq_members as u');
        $this->db->join('sq_otp_verification as o', 'u.id = o.agent_id', 'inner');
        $this->db->where('u.email',$userData['email']);
        $this->db->where('o.otp',$otp);
        $this->db->where('o.active','0');
        return $this->db->get()->row_array();
    }

    function update_otp_status($data){
        return $this->db->update('sq_otp_verification', ['active'=>1], array('agent_id'=>$data['agent_id']));
    }


    function create_agent_pass($pwd,$userData){
        return $this->db->update('sq_members', ['pass'=>$pwd], array('email'=>$userData['email'],'active'=>'1'));
    }
    
    function fetch_oldPass($userData){
        return $this->db->get_where("sq_members", ['email' => $userData['email'],'active'=>'1'])->row()->pass;
    }

    function change_pass($userData,$new_pass){
        return $this->db->update('sq_members', ['pass'=>$new_pass], array('email'=>$userData['email'],'active'=>'1'));
    }

    function get_auth_token($token){
        return $this->db->select('id,name,email')->get_where("sq_members", ['auth_token' => $token,'active'=>'1'])->row_array();
    }

    function check_agent_login_details($email,$password){
        return $this->db->get_where("sq_members", ['email' => $email,'pass' => $password,'active'=>'1'])->row_array();
    }

    public function save_login_auth_token($email,$token) {
        return $this->db->update('sq_members', ['auth_token'=>$token], array('email'=>$email,'active'=>'1'));
    }

    function save_reset_otp($reset_otp,$data) {
        $this->db->insert('sq_otp_verification',['reset_otp'=>$reset_otp,'agent_id'=>$data['id']]);
    }

    public function verify_reset_pass_otp($reset_otp,$email) {
        $this->db->select('*');
        $this->db->from('sq_members as u');
        $this->db->join('sq_otp_verification as o', 'u.id = o.agent_id', 'inner');
        $this->db->where('u.email',$email);
        $this->db->where('o.reset_otp',$reset_otp);
        $this->db->where('o.status','0');
        return $this->db->get()->row_array();
    }

    public function update_reset_otp_status($data) {
        return $this->db->update('sq_otp_verification', ['active'=>1], array('agent_id'=>$data['agent_id']));
    }
    
    public function update_agent_password($email,$newpass) {
        return $this->db->update('sq_members', ['pass'=>$newpass], array('email'=>$email,'active'=>'1'));
    }

    public function fetch_profile_details($userData){
        return $this->db->get_where("sq_members", ['email' => $userData['email'],'active'=>'1'])->row_array();
    }

    public function update_agent_profile($userData){
        $data = array(
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'permanent' => $this->input->post('permanent')
        );
        return $this->db->update('sq_members',$data, array('email'=>$userData['email'],'active'=>'1'));
    }
    

}
