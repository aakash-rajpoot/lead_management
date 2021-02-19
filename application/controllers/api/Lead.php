<?php
require APPPATH . '/libraries/REST_Controller.php';
     
class Lead extends REST_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model(array('api_model/lead_api_model','api_model/agent_api_model'));
		$this->load->helper(array('form','url','html','jwt_helper','pdf_helper'));
		$this->load->library(array('form_validation','session','email'));
    }

    public function index_post($action = '') {
        switch($action) {

            case 'add_lead':
                $this->add_lead();
                break;

            case 'available_units':
                $this->available_units();
                break;

            case 'all_status':
                $this->all_status();
                break;

            case 'lead_status':
                $this->lead_status();
                break;

            case 'dashboard_status':
                $this->dashboard_status();
                break;
                
            case 'all_leads':
                $this->all_leads();
                break;
                  
        }
    }

    public function add_lead(){
        $userData = $this->agent_api_model->verify_token();
        if($userData == false) {
            $this->response(['status'=>false,'message'=>'Authorization failed!'], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            $this->form_validation->set_rules('name', 'Lead name','required|min_length[5]|regex_match[/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/]');
            $this->form_validation->set_rules('email', 'Email', 'valid_email|regex_match[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/]');
            $this->form_validation->set_rules('phone', 'Phone number','required|min_length[10]|max_length[12]|regex_match[/^[0]?[0-9]\d{9}$/]');
            $this->form_validation->set_rules('property_address', 'Property of Address','required');
            $this->form_validation->set_rules('client_address', 'Client Address','required');

            if($this->form_validation->run()) {
                $status = $this->lead_api_model->add_lead_data($userData);
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

    public function available_units(){
        $userData = $this->agent_api_model->verify_token();
        if($userData == false) {
            $this->response(['status'=>false,'message'=>'Authorization failed!'], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            $units = $this->lead_api_model->available_units_detail();
            if($units){
                $this->response(['status'=>true,'message'=>'All Available Units.','available_units'=>$units], REST_Controller::HTTP_OK);
            }else{
                $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function all_leads() {
        $userData = $this->agent_api_model->verify_token();
        if($userData == false) {
            $this->response(['status'=>false,'message'=>'Authorization failed!'], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            $leads = $this->lead_api_model->all_agent_leads($userData);
            if($leads){
                $this->response(['status'=>true,'message'=>'All Leads.','all leads'=>$leads], REST_Controller::HTTP_OK);
            }else{
                $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    function all_status(){
        $userData = $this->agent_api_model->verify_token();
        if($userData == false) {
            $this->response(['status'=>false,'message'=>'Authorization failed!'], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            $status = $this->lead_api_model->get_all_status();
            if($status){
                $this->response(['status'=>true,'message'=>'All status.','all status'=>$status], REST_Controller::HTTP_OK);
            }else{
                $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function lead_status(){
        $userData = $this->agent_api_model->verify_token();
        if($userData == false) {
            $this->response(['status'=>false,'message'=>'Authorization failed!'], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            $remark = $this->input->post('status_remark');
            $status_date = date('Y-m-d');

            $data = $this->lead_api_model->update_status($status,$id,$remark,$status_date);
            if(gettype($data) == 'array'){
                $status = $this->send_tax_doc($data['email']);
                if($status) {
                    $this->response(['status'=>true,'message'=>'Documentation has been sent to client successfully.'], REST_Controller::HTTP_OK);
                }else{
                    $this->response(['status'=>false,'message'=>'Documentations has not sent!'], REST_Controller::HTTP_BAD_REQUEST);  
                }            
            } else {
                $this->response(['status'=>false,'message'=>' Status successfully updated.'], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function dashboard_status(){
        $userData = $this->agent_api_model->verify_token();
        if($userData == false) {
            $this->response(['status'=>false,'message'=>'Authorization failed!'], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            $pending = $incomplete = $complete = 0;
            $data = $this->lead_api_model->get_status_count();
            if($data){
                foreach ($data as $key => $item) {
                    if($item->status == 1){
                        $pending += 1;
                    }else if($item->status == 2){
                        $incomplete += 1;
                    }else if($item->status == 3){
                        $complete += 1;
                    }
                }
                $this->response(['status'=>true,'message'=>'Status of all the assigned leads.','Pending'=>$pending,'Incomplete'=>$incomplete,'Complete'=>$complete], REST_Controller::HTTP_OK);
            } else {
                $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    function send_tax_doc($email){
        $this->email->from('info@Kritak.com', 'KRITAK INFRA PVT.LTD.');
        $this->email->reply_to('noreply@gmail.com', 'No Reply');
        $this->email->to($email);
        $this->email->subject('Kritak|Tax Documentation');
        $this->email->message('You have successfully booked a lead and the tax documentation are given below.');
        $file_path = base_url('\media\tax-pdf\tax.pdf');
        $this->email->attach($file_path);
        if ($this->email->send()) {
            return true;    
        } else {
            return false;
        }
    }


}