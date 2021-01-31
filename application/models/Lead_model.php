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
            'remark' => $this->input->post('remark'),
            'reference' => $this->input->post('reference'),
        );
        
        $lead['available_unit'] = implode( ", ", $this->input->post('available_unit')); 

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

    function update_lead_details($id){

        $lead = array(
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'alt_phone' => $this->input->post('alt_phone'),
            'property_address' => $this->input->post('property_address'),
            'client_address' => $this->input->post('client_address'),
            'remark' => $this->input->post('remark'),
            'reference' => $this->input->post('reference'),
        );
        $list = $this->input->post('available_unit');
        $lead['available_unit'] = implode( ", ", $list ); 
    
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
        $this->db->select("*");
        $this->db->from('sq_members');
        $this->db->where('status',1);
        return $this->db->get();
    }

    function fetch_lead_name($id){
        $this->db->select("*");
        $this->db->from('sq_lead');
        $this->db->where('id',$id);
        $this->db->where('status',1);
        return $this->db->get();
    }

    function lead_assign_data(){
        $name = $this->input->post('lead_name');
        $data = array(
            'assign_to' => $this->input->post('assign_lead'),
            'assign_date' => date('Y-m-d')
        );
        $assign_email = $data['assign_to'];
        preg_match('#\[(.*?)\]#', $assign_email, $match);

        $data['assign_to_email'] = $match[1]."\n";

        $this->db->set($data);
        $this->db->where('name', $name);
        $this->db->where('status', 1);
        return $this->db->update('sq_lead');
    }

    function deassign_lead_data($id){
        $this->db->set('assign_to',' ');
        $this->db->set('assign_date',' ');
        $this->db->where('id', $id);
        return $this->db->update('sq_lead');
    }


}