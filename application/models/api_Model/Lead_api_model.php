<?php
class Lead_api_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function fetch_all_lead_data($email){
        return $this->db->get_where("sq_lead",['email'=>$email,'status'=>'1'])->result();
    }

    public function add_lead_data(){
        $lead = array(
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'alt_phone' => $this->input->post('alt_phone'),
            'property_address' => $this->input->post('property_address'),
            'client_address' => $this->input->post('client_address'),
            'remark' => $this->input->post('remark'),
            'reference' => $this->input->post('reference'),
            'available_unit' => $this->input->post('available_unit')
        );
        return $this->db->insert('sq_lead',$lead);
    }

    public function update_lead_data($id,$lead){
        return $this->db->update('sq_lead', $lead, array('id'=>$id));
    }

    public function delete_lead_data($id){
        return $this->db->delete('sq_lead', array('id'=>$id));
    }

    public function available_units_detail(){
        return $this->db->get_where("sq_lead_unit",['status'=>'1'])->result();
    }

    public function assigned_units_detail($email){
        // return $this->db->get_where("sq_lead",['assign_to_email'=>$email,'status'=>1])->row_array();

        $this->db->select("*");
        $this->db->from('sq_lead');
        $this->db->where('assign_to_email',$email);
        $this->db->where('status',1);
        print_r($this->db->get()->row_array());die;
    }


}
