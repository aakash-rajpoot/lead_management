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


    <?php
require APPPATH . '/libraries/REST_Controller.php';

class Api extends REST_Controller {

	/**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }

    public function index_get() {
        $data = array("message"=>"RESTFULL API");
        $this->response($data);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function data_get($id = 0) {
        if(!empty($id)) {
            $data = $this->db->get_where("sq_lead", ['id' => $id])->row_array();
        } else {
            $data = $this->db->get("sq_lead")->result();
        }
        $this->response($data, REST_Controller::HTTP_OK);
	}

    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function data_post()
    {
        $input = $this->input->post();
        print_r ($input);
        exit;
        $this->db->insert('sq_lead',$input);

        $this->response(['Lead created successfully.'], REST_Controller::HTTP_OK);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function data_put($id)
    {
        $input = $this->put();
        $this->db->update('sq_lead', $input, array('id'=>$id));

        $this->response(['Lead updated successfully.'], REST_Controller::HTTP_OK);
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function data_delete($id) {
        $this->db->delete('sq_lead', array('id'=>$id));

        $this->response(['Lead deleted successfully.'], REST_Controller::HTTP_OK);
    }
}

    	
}