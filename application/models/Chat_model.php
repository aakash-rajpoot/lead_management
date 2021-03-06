<?php
class Chat_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    function add_chat($admin_id,$agent_id){
        $chat_data = array( 
            'date_time' => date("Y-m-d H:i:s"),
            'message' => $this->input->post('message'),
            'type' => $this->input->post('type'),
            'admin_id' => $admin_id,
            'agent_id' => $agent_id
        );
        return $this->db->insert('sq_chat',$chat_data);
    }
    
    function get_chat_data($agent_id){
        $this->db->select("sm.name as agent_name,sa.username as admin_name,sc.message,sc.type,sc.date_time")
            ->from("sq_chat as sc")
            ->join('sq_admin as sa', 'sc.admin_id = sa.id', 'inner')
            ->join('sq_members as sm', 'sc.agent_id = sm.id', 'inner')
            ->where('agent_id',$agent_id);
            return $this->db->get()->result_array();
    }



    // SELECT sm.name as agent_name,sa.username as admin_name,sc.message,sc.type,sc.date_time FROM `sq_chat` sc 
    // INNER JOIN sq_admin sa on sc.admin_id = sa.id
    // INNER JOIN sq_members sm on sc.agent_id = sm.id
}