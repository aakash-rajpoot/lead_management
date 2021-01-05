<?php
class Agent_api_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function agent_mobile_get($email) {
        return $this->db->get_where("sq_members", ['email' => $email,'status'=>'1'])->row_array();
    }

    function agent_mobile_post() {
        $agent = array(
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            // 'alt_phone' => $this->input->post('alt_phone'),
            // 'gender' => $this->input->post('gender'),
            // 'dob' => $this->input->post('dob'),
            // 'aadhar' => $this->input->post('aadhar'),
            // 'pan' => $this->input->post('pan'),
            // 'permanent' => $this->input->post('permanent'),
            // 'correspondence' => $this->input->post('correspondence')
        );
        // if(empty($this->input->post('joining_date'))){
        //     $agent['joining_date'] = date('Y-m-d');
        // }else{
        //     $agent['joining_date'] = $this->input->post('joining_date');
        // }

        $this->db->insert('sq_members',$agent);
    }

    // function fetch_agent_mobile_data($id){
    //     return $this->db->get_where("sq_members", ['id' => $id,'status'=>'1'])->row_array();
    // }

    function agent_mobile_put($id,$input) {
        $this->db->update('sq_members', $input, array('id'=>$id));
    }

    function agent_mobile_delete($id) {
        $this->db->delete('sq_members', array('id'=>$id));
    }
    
}