<?php
class Agent_api_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function agent_mobile_post($email) {
        return $this->db->get_where("sq_members", ['email' => $email,'status'=>'1'])->row_array();
    }

    function agent_mobile_put($id,$input) {
        return $this->db->update('sq_members', $input, array('id'=>$id));
    }

    function agent_mobile_delete($id) {
        return $this->db->delete('sq_members', array('id'=>$id));
    }

    function save_login_otp($login_otp,$data,$token){
        $this->db->insert('sq_otp_verification',['otp'=>$login_otp,'agent_id'=>$data['id']]);
        return $this->db->update('sq_members',['auth_token'=>$token],array('email'=>$data['email'],'status'=>1));
    }

    function verify_sent_otp($otp,$email){
        $this->db->select('*');
        $this->db->from('sq_members as u');
        $this->db->join('sq_otp_verification as o', 'u.id = o.agent_id', 'inner');
        $this->db->where('u.email',$email);
        $this->db->where('o.otp',$otp);
        $this->db->where('o.status','0');
        return $this->db->get()->row_array();
    }

    function update_otp_status($data){
        return $this->db->update('sq_otp_verification', ['status'=>1], array('agent_id'=>$data['agent_id']));
    }


    function create_agent_pass($pwd,$email){
        return $this->db->update('sq_members', ['pass'=>$pwd], array('email'=>$email,'status'=>'1'));
    }
    
    function fetch_oldPass($email){
        return $this->db->get_where("sq_members", ['email' => $email,'status'=>'1'])->row()->pass;
    }

    function change_pass($email,$new_pass){
        return $this->db->update('sq_members', ['pass'=>$new_pass], array('email'=>$email,'status'=>'1'));
    }

    function get_auth_token($email){
        return $this->db->get_where("sq_members", ['email' => $email,'status'=>'1'])->row()->auth_token;
    }

    function check_agent_login_details($email,$password){
        return $this->db->get_where("sq_members", ['email' => $email,'pass' => $password,'status'=>'1'])->row_array();
    }

    public function save_login_auth_token($email,$token) {
        return $this->db->update('sq_members', ['auth_token'=>$token], array('email'=>$email,'status'=>'1'));
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
        return $this->db->update('sq_otp_verification', ['status'=>1], array('agent_id'=>$data['agent_id']));
    }
    
    public function update_agent_password($email,$newpass) {
        return $this->db->update('sq_members', ['pass'=>$newpass], array('email'=>$email,'status'=>'1'));
    }



}
