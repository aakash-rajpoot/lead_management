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
        return $this->db->get_where("sq_members", ['email' => $email,'status'=>'1'])->row_array();
    }

    function change_pass($email,$new_pass){
        return $this->db->update('sq_members', ['pass'=>$new_pass], array('email'=>$email,'status'=>'1'));
    }
}