<?php
require APPPATH . '/libraries/REST_Controller.php';
     
class Agent extends REST_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('agent_api_model');
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('form_validation','session'));
    }

	public function index_get() {
        $row_data = $this->input->get();
        $email = implode(',', $row_data);
        if(!empty($email)) {
            $data = $this->agent_api_model->agent_mobile_get($email);
            if(!empty($data)){
                $this->response($data, REST_Controller::HTTP_OK);
            }else{
                $this->response(['Unable to locate account.'], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response(['Entered email has not registered.'], REST_Controller::HTTP_OK);
        }
	}

    public function index_post() {
        $input = $this->input->post();
        print_r($input['name']);die;
        $this->agent_api_model->agent_mobile_post($input);
        $this->response(['Agent created successfully.'], REST_Controller::HTTP_OK);
    }

    public function index_put($id) {
        $input = $this->put();
        $this->agent_api_model->agent_mobile_put($id,$input);
        $this->response(['Agent updated successfully.'], REST_Controller::HTTP_OK);
    }

    public function index_delete($id) {
        $this->agent_api_model->agent_mobile_delete($id);
        $this->response(['Agent deleted successfully.'], REST_Controller::HTTP_OK);
    }
}