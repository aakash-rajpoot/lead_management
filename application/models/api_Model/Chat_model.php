<?php
class Chat_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function agent_chat_upload($agent_msg,$userData){
        $chat_data = array( 
            'date_time' => date("Y-m-d h:i:sa"),
            'message' => $this->input->post('message'),
            'admin_id' => $admin_id,
            'agent_id' => $agent_id
        );
        $this->db->insert('sq_chat',$chat_data);
    }


}