<?php
require APPPATH . '/libraries/REST_Controller.php';
     
class Unit_Api extends REST_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('unit_api_model');
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('form_validation','session'));
    }

    public function index_get(){
        $input = $this->unit_api_model->fetch_all_units_data();
        print_r($input);
    }

    function index_post(){
        
    }

}