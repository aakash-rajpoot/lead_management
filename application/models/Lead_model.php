<?php
class Lead_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    function lead_data(){
        $lead = array(
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'alt_phone' => $this->input->post('alt_phone'),
            'property_address' => $this->input->post('property_address'),
            'client_address' => $this->input->post('client_address'),
            'role' => $this->input->post('role'),
            'remark' => $this->input->post('remark'),
            'other_info' => $this->input->post('other_info'),
            'reference' => $this->input->post('reference')
        );
        $this->db->insert('sq_lead',$lead);
    }

    function fetch_total_lead(){
        $this->db->select("*");
        $this->db->from('sq_lead');
        $this->db->where('status',1);
        return $this->db->get();
    }

    function soft_delete_lead($id){
        $this->db->set('status',0);
        $this->db->where('id', $id);
        return $this->db->update('sq_lead');
    }

    // function hard_delete_lead($id){
    //     $this->db->where('id', $id);
    //     return $this->db->delete('sq_lead');
    // }

    function update_lead_details($id){

    $lead = array(
        'name' => $this->input->post('name'),
        'phone' => $this->input->post('phone'),
        'email' => $this->input->post('email'),
        'alt_phone' => $this->input->post('alt_phone'),
        'property_address' => $this->input->post('property_address'),
        'client_address' => $this->input->post('client_address'),
        'role' => $this->input->post('role'),
        'remark' => $this->input->post('remark'),
        'other_info' => $this->input->post('other_info'),
        'reference' => $this->input->post('reference')
    );
        $this->db->set($lead);
        $this->db->where('id', $id);
        return $this->db->update('sq_lead',$lead);
    }

    function fetch_all_lead($id){
        $this->db->select("*");
        $this->db->from('sq_lead');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function fetch_lead_data(){
        $this->db->select("name,role");
        $this->db->from('sq_members');
        $this->db->where('status',1);
        return $this->db->get();
    }

    function fetch_lead_name(){
        $this->db->select("name");
        $this->db->from('sq_lead');
        $this->db->where('status',1);
        return $this->db->get();
    }

    function update_lead_assign_data(){
        $name = $this->input->post('lead_name');
        $data = $this->input->post('assign_lead');
        $this->db->set('assign_to', $data);
        $this->db->where('name', $name);
        $this->db->where('status', 1);
        return $this->db->update('sq_lead');
    }

    function deassign_lead_data($id){
        $this->db->set('assign_to',' ');
        $this->db->where('id', $id);
        return $this->db->update('sq_lead');
    }

    function reassign_lead_data($id){
        $this->db->select("name");
        $this->db->from('sq_lead');
        $this->db->where('id',$id);
        return $this->db->get();
    }

}