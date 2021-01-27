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
            'email' => $this->input->post('email')
        );
        return $this->db->insert('sq_lead',$lead);
    }

    public function update_lead_data($id,$lead){
        return $this->db->update('sq_lead', $lead, array('id'=>$id));
    }

    public function delete_lead_data($id){
        return $this->db->delete('sq_lead', array('id'=>$id));
    }


}
