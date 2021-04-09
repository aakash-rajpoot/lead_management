<?php
class Chat_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    function add_chat($user_from,$user_to){
        if($user_to==''){
            $user_to = $this->session->userdata('chat_with');
        }
        $chat_data = array( 
            'date_time' => date("Y-m-d H:i:s"),
            'message' => $this->input->post('message'),
            'type' => $this->input->post('type'),
            'user_from' => $user_from,
            'user_to' => $user_to
        );
        return $this->db->insert('sq_chat',$chat_data);
    }
    
    function get_chat_data(){
        $user_from = $this->session->userdata('id');
        $user_to = $this->session->userdata('chat_with')?$this->session->userdata('chat_with'):1;
        $where ="(`user_from` = $user_from and `user_to` = $user_to) OR (`user_to`= $user_from AND `user_from`= $user_to) ";
        $query = $this->db->select("sm.fname as sender_fname, sm.lname as sender_lname, sa.fname as receiver_fname, sa.lname as receiver_lname,sc.user_from,sc.user_to,sc.message,sc.type,sc.date_time")
            ->from("sq_chat as sc")
            ->join('sq_members as sa', 'sa.id = sc.user_to', 'inner')
            ->join('sq_members as sm', 'sm.id = sc.user_from', 'inner')
            ->where($where)
            ->order_by('sc.id','ASC')
            ->get();
            //print_r($this->db->last_query()); 
            return $query->result_array();
    }

    function get_chat_members(){
        $this->db->select("id,fname,lname");
        $this->db->from('sq_members');
        $this->db->where('active',1);
        $this->db->where('id!=',$this->session->get_userdata()['id']);
        return $this->db->get()->result_array();
    }
}