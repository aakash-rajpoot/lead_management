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

    function save_login_otp($login_otp,$id){
        $otp = array(
            'otp' => $login_otp,
            'agent_id' => $id
        );
        return $this->db->insert('sq_otp_verification',$otp);
    }

    function verify_save_otp($otp,$email){
        $id = $this->fetch_agent_id($email);
        return $this->db->get_where("sq_otp_verification", ['agent_id'=>$id ,'otp'=>$otp, 'status'=>'0'])->num_rows();
    }

    function fetch_agent_id($email){
        $this->db->select('id');
        $this->db->from('sq_members'); 
        $this->db->where('email',$email);
        $this->db->where('status',1);
        $query = $this->db->get();
        return implode('',$query->row_array());
    }

    function create_agent_pass($pwd,$email){
        return $this->db->update('sq_members', ['pass'=>$pwd], array('email'=>$email,'status'=>'1'));
    }

    function after_password_success($email){
        $id = $this->fetch_agent_id($email);
        return $this->db->update('sq_otp_verification', ['status'=>'1'], array('agent_id'=>$id));
    }
    
    function fetch_oldPass($email){
        $this->db->select('pass');
        $this->db->from('sq_members'); 
        $this->db->where('email',$email);
        $this->db->where('status',1);
        $query = $this->db->get();
        return $query->row_array();
    }

    function change_pass($email,$new_pass){
        $this->db->set('pass', $new_pass);
        $this->db->where('email', $email);
        return $this->db->update('sq_members');
    }
}