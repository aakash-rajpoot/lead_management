<?php
class Unit_api_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function fetch_all_units_data(){
        return $this->db->get_where("sq_lead_unit",['status'=>'1'])->result();
    }

}