<?php

   require APPPATH . '/libraries/REST_Controller.php';
     
class Agent extends REST_Controller {

    public function __construct() {
        parent::__construct();
        
        //$this->load->model('agent_model');
		//$this->load->helper(array('form','url','html'));
		//$this->load->library(array('form_validation','session'));
    }

	public function index_get()
	{
        echo $email;die;
        $this->response($email);die;

        if(!empty($email)) {
            $data = $this->db->get_where("sq_members",['email' => $email])->row_array();
           // $data = $this->api_model->agent_mobile_login($email);
            $this->response($data, REST_Controller::HTTP_OK);
        }
    }

    public function index_post() {

        $input = $this->input->post();

        $this->db->insert('items',$input);

        $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);

    } 
    	
}