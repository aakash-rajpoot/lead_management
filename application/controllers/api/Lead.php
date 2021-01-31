<?php
require APPPATH . '/libraries/REST_Controller.php';
     
class Lead extends REST_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model(array('api_model/lead_api_model','api_model/agent_api_model'));
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('form_validation','session'));
    }

    public function index_post($action = '') {
        switch($action) {
            case 'my_leads':
                $this->my_leads();
                break;

            case 'add_lead':
                $this->add_lead();
                break;

            case 'available_units':
                $this->available_units();
                break;

            case 'assigned_leads':
                $this->assigned_leads();
                break;

            case 'all_leads':
                $this->all_leads();
                break;
                
        }
    }

    public function my_leads(){
        $email = $this->input->post('email');
        $token = $this->verify_token($email);
        if($token) {
            $input = $this->lead_api_model->fetch_all_lead_data($email);
            if($input > 0){
                $this->response(['status'=>true,'all_leads'=>$input,'message'=>'All leads fetch successfully.'], REST_Controller::HTTP_OK);
            }else{
                $this->response(['status'=>false,'message'=>'Leads are not available.'], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function add_lead(){
        $email = $this->input->post('email');
        $token = $this->verify_token($email);
        if($token) {
            $this->form_validation->set_rules('name', 'Lead name','required|min_length[5]|regex_match[/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/]');
            $this->form_validation->set_rules('email', 'Email', 'valid_email|regex_match[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/]');
            $this->form_validation->set_rules('phone', 'Phone number','required|min_length[10]|max_length[12]|regex_match[/^[0]?[0-9]\d{9}$/]');
            $this->form_validation->set_rules('property_address', 'Property of Address','required');
            $this->form_validation->set_rules('client_address', 'Client Address','required');

            if($this->form_validation->run()) {
                $status = $this->lead_api_model->add_lead_data();
                if($status > 0){
                    $this->response(['status'=>true,'message'=>'Lead created successfully.'], REST_Controller::HTTP_OK);
                }else{
                    $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_BAD_REQUEST);
                }
            }else{
                $this->response(['status'=>false,'message'=>'Please check your lead validations.'], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    // public function index_put($id){
    //     $lead = $this->put();
    //     $status = $this->lead_api_model->update_lead_data($id,$lead);
    //     if($status == "1"){
    //         $this->response(['status'=>true,'message'=>'Lead updated successfully.'], REST_Controller::HTTP_OK);
    //     }else{
    //         $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_BAD_REQUEST);
    //     }
    // }

    // public function index_delete($id) {
    //     $status = $this->lead_api_model->delete_lead_data($id);
    //     if($status == "1"){
    //         $this->response(['status'=>true,'message'=>'Lead deleted successfully.'], REST_Controller::HTTP_OK);
    //     }else{
    //         $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_BAD_REQUEST);
    //     }
    // }

    public function verify_token($email) {
        $headers = getallheaders();
        if (isset($headers['Authorization']) && !empty($headers['Authorization'])) {
            if (preg_match('/Bearer\s(\S+)/', $headers['Authorization'], $matches)) {
                $token = $matches[1];
            }
            $auth_token = $this->agent_api_model->get_auth_token($email);
            // print_r($auth_token);die;
            if($token === $auth_token){
                return true;
            }else{
                $this->response(['status'=>false,'message'=>'Authorization failed!'], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function available_units(){
        $units = $this->lead_api_model->available_units_detail();
        if($units){
            $this->response(['status'=>true,'message'=>'All Available Units.','available_units'=>$units], REST_Controller::HTTP_OK);
        }else{
            $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function assigned_leads(){
        $email = $this->input->post('email');
        $token = $this->verify_token($email);
        if($token) {
            $leads = $this->lead_api_model->assigned_units_detail($email);
            if($leads){
                $this->response(['status'=>true,'message'=>'All Assigned Leads.','assigned leads'=>$leads], REST_Controller::HTTP_OK);
            }else{
                $this->response(['status'=>false,'message'=>'Leads are not assigned to you.'], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    function all_leads(){
        $email = $this->input->post('email');
        $token = $this->verify_token($email);
        if($token) {
            $leads = $this->lead_api_model->all_agent_leads($email);
            if($leads){
                $this->response(['status'=>true,'message'=>'All Leads.','all leads'=>$leads], REST_Controller::HTTP_OK);
            }else{
                $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }


}