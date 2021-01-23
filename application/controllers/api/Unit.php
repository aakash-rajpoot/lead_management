<?php
require APPPATH . '/libraries/REST_Controller.php';
     
class Unit extends REST_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('api_model/unit_api_model');
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('form_validation','session'));
    }

    function index_post(){
        $this->form_validation->set_rules('unit_type', 'Types of units','required');
        $this->form_validation->set_rules('unit_size', 'Unit size','required');
        $this->form_validation->set_rules('size_measure', 'Size Measure','required');

        if($this->form_validation->run()) {
            $status = $this->unit_api_model->add_units_data();
            if($status == "1"){
                $this->response(['Unit added successfully.'], REST_Controller::HTTP_OK);
            }else{
                $this->response(['Error Found.'], REST_Controller::HTTP_OK);
            }
        }
    }

    function index_put($id){
        $unit = $this->put();
        $status = $this->unit_api_model->update_unit_data($id,$unit);
        if($status == "1"){
            $this->response(['Unit updated successfully.'], REST_Controller::HTTP_OK);
        }else{
            $this->response(['Error Found.'], REST_Controller::HTTP_OK);
        }
    }

    function index_delete($id){
        $status = $this->unit_api_model->delete_unit_data($id);
        if($status == "1"){
            $this->response(['Unit deleted successfully.'], REST_Controller::HTTP_OK);
        }else{
            $this->response(['Error Found.'], REST_Controller::HTTP_OK);
        }
    }

}