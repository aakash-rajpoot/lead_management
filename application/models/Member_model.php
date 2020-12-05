<?php
class Member_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

   function member_data(){
        $member = array(
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
        $this->db->insert('sq_members',$member);
   }

    function fetch_total_members(){
        $this->db->select("*");
        $this->db->from('sq_members');
        $this->db->where('status',1);
        return $this->db->get();
    }

    function soft_delete_member($id){
         $this->db->set('status',0);
        $this->db->where('id', $id);
        return $this->db->update('sq_members');
    }

    function hard_delete_member($id){
       $this->db->where('id', $id);
       return $this->db->delete('sq_members');
   }
}