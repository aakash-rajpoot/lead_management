<?php
class Agent_api_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function agent_mobile_get($email) {
        return $this->db->get_where("sq_members", ['email' => $email,'status'=>'1'])->row_array();
    }

    function agent_mobile_post($input) {
        $this->db->insert('sq_members',$input);
    }

    function agent_mobile_put($id,$input) {
        $this->db->update('sq_members', $input, array('id'=>$id));
    }

    function agent_mobile_delete($id) {
        $this->db->delete('sq_members', array('id'=>$id));
    }
    
}