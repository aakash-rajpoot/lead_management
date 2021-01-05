<?php
require APPPATH . '/libraries/REST_Controller.php';
     
class Lead_Api extends REST_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('lead_api_model');
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('form_validation','session'));
    }

    public function index_get(){
        $input = $this->lead_api_model->fetch_all_lead_data();
        print_r($input);
    }

    public function index_post(){
        $this->form_validation->set_rules('name', 'Lead name','required|min_length[5]|regex_match[/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/]');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|regex_match[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/]');
        $this->form_validation->set_rules('phone', 'Phone number','required|min_length[10]|max_length[12]|regex_match[/^[0]?[0-9]\d{9}$/]');
    
		if($this->form_validation->run()) {
            $status = $this->lead_api_model->add_lead_data();
            if($status == "1"){
                $this->response(['Lead created successfully.'], REST_Controller::HTTP_OK);
            }else{
                $this->response(['Error Found.'], REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['Please check your lead validations.'], REST_Controller::HTTP_OK);
        }

    }

    public function index_put($id){
        $lead = $this->put();
        $status = $this->lead_api_model->update_lead_data($id,$lead);
        if($status == "1"){
            $this->response(['Lead updated successfully.'], REST_Controller::HTTP_OK);
        }else{
            $this->response(['Error Found.'], REST_Controller::HTTP_OK);
        }
    }

    public function index_delete($id) {
        $status = $this->lead_api_model->delete_lead_data($id);
        if($status == "1"){
            $this->response(['Lead deleted successfully.'], REST_Controller::HTTP_OK);
        }else{
            $this->response(['Error Found.'], REST_Controller::HTTP_OK);
        }
    }

}