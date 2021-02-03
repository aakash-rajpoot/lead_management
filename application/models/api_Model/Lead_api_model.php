<?php
class Lead_api_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // public function fetch_all_lead_data($email){
    //     return $this->db->get_where("sq_lead",['email'=>$email,'status'=>'1'])->result();
    // }

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
        return $this->db->get_where("sq_lead_unit",['status'=>'1'])->result();
    }

    // public function assigned_units_detail($userData){
    //     return $this->db->get_where("sq_lead",['assign_to'=>$userData['id'],'status'=>1])->result();
    // }

    public function all_agent_leads($userData){
        $returnData = [];
        $returnData['create-leads'] = $this->db->get_where("sq_lead",['created_by'=>$userData['id'],'user_type'=>2,'status'=>1])->result();
        $returnData['assigned-leads'] = $this->db->get_where("sq_lead",['assign_to'=>$userData['id'],'status'=>1])->result();
        return $returnData;
    }


}
