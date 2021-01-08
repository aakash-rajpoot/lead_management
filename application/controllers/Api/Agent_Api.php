<?php
require APPPATH . '/libraries/REST_Controller.php';
     
class Agent_Api extends REST_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('agent_api_model');
		$this->load->helper(array('form','url','html','string'));
        $this->load->library(array('form_validation','session','email'));
    }

	public function index_post($action = '') {
        switch($action) {
            case 'send_otp':
                $this->send_otp();
                break;
               
            case 'verify_otp':
                $this->verify_otp();
                break;
                
            case 'create_password':
                $this->create_password();
                break; 

            case 'change_password':
                $this->change_password();
                break;    
            }
    }

    public function send_otp(){
        $email = $this->input->post('email');

        if(!empty($email)) {
            $data = $this->agent_api_model->agent_mobile_post($email);
            if($data['pass'] == ''){
                $login_otp = rand(000000,999999);
                $this->agent_api_model->save_login_otp($login_otp,$data);
                $this->email_config($email,$login_otp);
            }else{
                $this->response(['status'=>true,'message'=>'You can already created your password.So please login by your password.'], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response(['status'=>false,'message'=>'Please enter valid email.'], REST_Controller::HTTP_OK);
        }
    }
    
    public function index_put($id) {
        $input = $this->put();
        $status = $this->agent_api_model->agent_mobile_put($id,$input);
        if($status > 0){
            $this->response(['status'=>true,'message'=>'Agent updated successfully.'], REST_Controller::HTTP_OK);
        }else{
            $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_OK);
        }
    }

    public function index_delete($id) {
        $this->agent_api_model->agent_mobile_delete($id);
        if($status > 0){
            $this->response(['status'=>true,'message'=>'Agent deleted successfully.'], REST_Controller::HTTP_OK);
        }else{
            $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_OK);
        }
    }

    function email_config($email,$login_otp){

        $this->email->from('info@Kritak.com', 'KRITAK INFRA PVT.LTD.');
        $this->email->reply_to('noreply@gmail.com', 'No Reply');
        $this->email->to($email);
        $this->email->subject('Kritak|OTP for Authentication');
        $this->email->message('This OTP '.$login_otp.' ia valid within 10 minutes only. Use this OTP to create your password.');

        if ($this->email->send()) {
            $this->response(['Your OTP has been sent to your entered email.'], REST_Controller::HTTP_OK);
        } else {
            show_error($this->email->print_debugger());
        }

    }

    function verify_otp(){
        $otp = $this->input->post('otp');
        $email = $this->input->post('email');

        if(!empty($otp)){
            $data = $this->agent_api_model->verify_sent_otp($otp,$email);
            if(!empty($data)){
                $this->agent_api_model->update_otp_status($data);
                $this->response(['status'=>true,'message'=>'OTP has been verified.'], REST_Controller::HTTP_OK);
            }else{
                $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_OK);
            }
        }  
    }

    function create_password(){
        $this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/]|min_length[8]');
		$this->form_validation->set_rules('confpass', 'Confirm Password', 'required|matches[password]');

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', '* Please enter valid %s');

		if($this->form_validation->run()){
            $email = $this->input->post('email');
            $pwd = md5($this->input->post('password'));
            $status = $this->agent_api_model->create_agent_pass($pwd,$email);
            if($status > 0){
                $this->response(['status'=>true,'message'=>'Your password has been created successfully.'], REST_Controller::HTTP_OK);
            }else{
                $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_OK);
            }
		}else{
            echo validation_errors();
        }
    }

    function change_password(){
        $email = $this->input->post('email');
        $oldpass = $this->input->post('oldpass');
        $this->form_validation->set_rules('oldpass', 'Old Password', 'required');
        $this->form_validation->set_rules('newpass', 'New Password', 'required|regex_match[/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/]|min_length[8]');
        $this->form_validation->set_rules('confpass', 'Confirm Password', 'required|matches[newpass]');
        
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', '* Please enter valid %s');
        
		if($this->form_validation->run()){
            $row = $this->agent_api_model->fetch_oldPass($email);
            if($row['pass'] == md5($oldpass)){
                $new_pass = md5($this->input->post('newpass'));
                $status = $this->agent_api_model->change_pass($email,$new_pass);
                if($status > 0){
                    $this->response(['status'=>true,'message'=>'Password has successfully changed.'], REST_Controller::HTTP_OK);
                }else{
                    $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_OK);
                }
            }else{
                $this->response(['status'=>false,'message'=>'Old password doesn\'t match.'], REST_Controller::HTTP_OK);
            }
        }else{
            echo validation_errors();
        }
    }
    
    
}