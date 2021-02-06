<?php
class Lead_api_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function add_lead_data($userData){
        $lead = array(
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'alt_phone' => $this->input->post('alt_phone'),
            'property_address' => $this->input->post('property_address'),
            'client_address' => $this->input->post('client_address'),
            'remark' => $this->input->post('remark'),
            'reference' => $this->input->post('reference'),
            'available_unit' => $this->input->post('available_unit'),
            'created_by'=> $userData['id'],
            'user_type' => '2'
        );
        return $this->db->insert('sq_lead',$lead);
    }

    public function available_units_detail(){
        return $this->db->get_where("sq_lead_unit",['active'=>'1'])->result();
    }

    public function all_agent_leads($userData){
        $member_id = $userData['id'];
        $this->db->select("sq_lead.id,name,email,phone,alt_phone,client_address,property_address,assign_date,available_unit,remark,reference,status_name,lead_date, IF(created_by=$member_id,1,0) lead_origin, IF(created_by=assign_to AND assign_to=$member_id,1,0) origin_and_assigned")
            ->from("sq_lead")
            ->join('sq_status', 'sq_lead.status = sq_status.id', 'left')
            ->where('created_by',$member_id)
            ->or_where('assign_to',$member_id)
            ->where('active',1);
            return $this->db->get()->result_array();
    }

    public function get_all_status(){
        return $this->db->get_where("sq_status")->result();
    }

    public function update_status($status,$id,$remark){
        return $this->db->update('sq_lead', ['status'=>$status,'status_remark'=>$remark], array('id'=>$id,'active'=>'1'));
    }

    public function get_status_count(){
        return $this->db->select('status')->get_where("sq_lead")->result();
    }


}
