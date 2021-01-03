<?php
class Api_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function agent_mobile_login($email) {
        $this->db->get_where("sq_members", ['email' => $email])->row_array();
    }


}