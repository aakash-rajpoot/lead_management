<?php
class Setting_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    function save_setting_details() {

        $data = array(
            'site' => $this->input->post('site'),
            'tagline' => $this->input->post('tagline'),
            'admin_email' => $this->input->post('admin_email'),
            'personal_email' => $this->input->post('personal_email'),
        );
        
        if(!empty($this->input->post('logo'))){
            $data['logo'] = $this->input->post('logo');
        }

        $email['email'] = $this->input->post('admin_email');

        $this->db->select("*");
        $this->db->from('sq_setting');
        $query = $this->db->get();

	    if($query->num_rows() == 0){
            $this->db->insert('sq_admin', $email);
            return $this->db->insert('sq_setting', $data);
        }    
        else {
            $this->db->set($email);
            $this->db->update('sq_admin');

            $this->db->set($data);
            return $this->db->update('sq_setting');
        }
    }

    function fetch_setting_details(){
        $this->db->select('*');
        $this->db->from('sq_setting');
        $this->db->from('sq_admin');
        $query = $this->db->get();
        return $query->row_array();
    }

    
}