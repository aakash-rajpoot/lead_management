<?php
require APPPATH . '/libraries/REST_Controller.php';
     
class Agent extends REST_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('api_model/agent_api_model');
		$this->load->helper(array('form','url','html','string','jwt_helper'));
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
                
            case 'agent_login':
                $this->agent_login();
                break;

            case 'forgotpassword':
                $this->forgotpassword();
                break;    

            case 'verify_reset_otp':
                $this->verify_reset_otp();
                break; 

            case 'update_password':
                $this->update_password();
                break;     

            case 'profile':
                $this->profile();
                break;
                
            case 'update_profile':
                $this->update_profile();
                break;   
        }

    }

    public function send_otp(){
        $email = $this->input->post('email');

        if(!empty($email)) {
            $data = $this->agent_api_model->agent_mobile_post($email);
            if($data['pass'] == ''){
                $login_otp = rand(000000,999999);
                $token =  $this->generate_auth_token($data);
                $this->agent_api_model->save_login_otp($login_otp,$data,$token);
                $status = $this->email_config($email,$login_otp);
                if($status) {
                    $this->response(['status'=>true,'message'=>'OTP has been sent to your email id.','auth_token'=>$token], REST_Controller::HTTP_OK);
                }
            }else{
                $this->response(['status'=>false,'message'=>'You can already created your password.So please login by your password.'], REST_Controller::HTTP_BAD_REQUEST);
            }
        } else {
            $this->response(['status'=>false,'message'=>'Please enter valid email.'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    function email_config($email,$login_otp){
        $this->email->from('info@Kritak.com', 'KRITAK INFRA PVT.LTD.');
        $this->email->reply_to('noreply@gmail.com', 'No Reply');
        $this->email->to($email);
        $this->email->subject('Kritak|OTP for Authentication');
        $this->email->message('This OTP '.$login_otp.' ia valid within 10 minutes only. Use this OTP to create your password.');

        if ($this->email->send()) {
            return true;    
        } else {
            return false;
        }
    }

    function verify_otp(){
        $otp = $this->input->post('otp');
        $userData = $this->agent_api_model->verify_token();
        if($userData == false) {
            $this->response(['status'=>false,'message'=>'Authorization failed!'], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if(!empty($otp)){
                $data = $this->agent_api_model->verify_sent_otp($otp,$userData);
                if(!empty($data)){
                    $this->agent_api_model->update_otp_status($data);
                    $this->response(['status'=>true,'message'=>'OTP has been verified.'], REST_Controller::HTTP_OK);
                }else{
                    $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }
    }

    function create_password(){
        $this->form_validation->set_rules('password', 'Password', 'required|regex_match[/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/]|min_length[8]');
		$this->form_validation->set_rules('confpass', 'Confirm Password', 'required|matches[password]');

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('required', '* Please enter valid %s');

        $userData = $this->agent_api_model->verify_token();
        if($userData == false) {
            $this->response(['status'=>false,'message'=>'Authorization failed!'], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if($this->form_validation->run()){
                $pwd = md5($this->input->post('password'));
                $status = $this->agent_api_model->create_agent_pass($pwd,$userData);
                if($status > 0){
                    $this->response(['status'=>true,'message'=>'Your password has been created successfully.'], REST_Controller::HTTP_OK);
                }else{
                    $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_BAD_REQUEST);
                }
            }else{
                $this->response(['status'=>false,'message'=>'Password and Confirm password doesn\'t match. '], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    function change_password(){
        $userData = $this->agent_api_model->verify_token();
        if($userData == false) {
            $this->response(['status'=>false,'message'=>'Authorization failed!'], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            $oldpass = md5($this->input->post('oldpass'));
            $this->form_validation->set_rules('oldpass', 'Old Password', 'required');
            $this->form_validation->set_rules('newpass', 'New Password', 'required|regex_match[/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/]|min_length[8]');
            $this->form_validation->set_rules('confpass', 'Confirm Password', 'required|matches[newpass]');
            
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_message('required', '* Please enter valid %s');

            if($this->form_validation->run()){
                $row = $this->agent_api_model->fetch_oldPass($userData);
                if($row== $oldpass){
                    $new_pass = md5($this->input->post('newpass'));
                    $status = $this->agent_api_model->change_pass($userData,$new_pass);
                    if($status > 0){
                        $this->response(['status'=>true,'message'=>'Password has successfully changed.'], REST_Controller::HTTP_OK);
                    } else {
                        $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_BAD_REQUEST);
                    }
                } else {
                    $this->response(['status'=>false,'message'=>'Old password doesn\'t match.'], REST_Controller::HTTP_BAD_REQUEST);
                }
            } else {
                $this->response(['status'=>false,'message'=>'New Password and Confirm password doesn\'t match. '], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function agent_login(){
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $data = $this->agent_api_model->check_agent_login_details($email,$password);
        if(!empty($data)){
            $token = $this->agent_api_model->generate_auth_token($data);
            if($token){
                $status = $this->agent_api_model->save_login_auth_token($email,$token);
                if($status > 0){
                    $this->response(['status'=>true,'message'=>'Login Successfully.','token'=>$token], REST_Controller::HTTP_OK);
                }else{
                    $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }else{
            $this->response(['status'=>false,'message'=>'Please Enter Valid Crediantials.'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function forgotpassword() {
        $email = $this->input->post('email');
        $data = $this->agent_api_model->agent_mobile_post($email);
        if (!empty($data)) {
            $reset_otp = rand(000000,999999);
            $this->agent_api_model->save_reset_otp($reset_otp,$data);

            $this->email->from('info@Kritak.com', 'KRITAK INFRA PVT.LTD.');
            $this->email->reply_to('noreply@gmail.com', 'No Reply');
            $this->email->to($email);
            $this->email->subject('Kritak|Password reset request');
            $mail_message = 'Dear ' . $data['name'] . ',' . "<br>\r\n";
            $mail_message .= 'Thanks for contacting regarding to forgot password. <br>Enter this OTP '.$reset_otp.' to reset your password.</b>'."\r\n";
            $mail_message .= '<br>Please Update your password.';
            $mail_message .= '<br>Thanks & Regards';
            $mail_message .= '<br>KRITAK INFRA PVT.LTD.';
    
            $this->email->message($mail_message);
    
            if ($this->email->send()) {
                $this->response(['status'=>true,'message'=>'Forgot password OTP has been send in your email.'], REST_Controller::HTTP_OK);
            } else {
                $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            $this->response(['status'=>false,'message'=>'Enter valid email.'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function verify_reset_otp(){
        $reset_otp = $this->input->post('reset_otp');
        $email = $this->input->post('email');

        if(!empty($reset_otp)){
            $data = $this->agent_api_model->verify_reset_pass_otp($reset_otp,$email);
            if(!empty($data)){
                $this->agent_api_model->update_reset_otp_status($data);
                $this->response(['status'=>true,'message'=>'OTP has been verified.'], REST_Controller::HTTP_OK);
            }else{
                $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_BAD_REQUEST);
            }
        }else{
            $this->response(['status'=>false,'message'=>'Enter the password reset OTP.'], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
    
    public function update_password() {
        $email = $this->input->post('email');
        $newpass = md5($this->input->post('newpass'));

        $this->form_validation->set_rules('newpass', 'New Password', 'required|regex_match[/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/]|min_length[8]');
        $this->form_validation->set_rules('confpass', 'Confirm Password', 'required|matches[newpass]');

        if($this->form_validation->run()){
            $data = $this->agent_api_model->update_agent_password($email,$newpass);
            if($data > 0){
                $this->response(['status'=>true,'message'=>'Password has been successfully changed.'], REST_Controller::HTTP_OK);
            }
        }else{
            $this->response(['status'=>false,'message'=>'New Password and Confirm password doesn\'t match. '], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function profile(){
        $userData = $this->agent_api_model->verify_token();
        if($userData == false) {
            $this->response(['status'=>false,'message'=>'Authorization failed!'], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            $data = $this->agent_api_model->fetch_profile_details($userData);
            if(!empty($data)){
                $this->response(['status'=>true,'message'=>'Profile details are here.','Profile details'=>$data], REST_Controller::HTTP_OK);
            }else{
                $this->response(['status'=>false,'message'=>'New Password and Confirm password doesn\'t match. '], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    function update_profile() {
        $userData = $this->agent_api_model->verify_token();
        if($userData == false) {
            $this->response(['status'=>false,'message'=>'Authorization failed!'], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            $this->form_validation->set_rules('name', 'Full name','required|min_length[2]|regex_match[/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/]');
            $this->form_validation->set_rules('phone', 'Phone number','required|min_length[10]|max_length[12]|regex_match[/^[0]?[0-9]\d{9}$/]');
            $this->form_validation->set_rules('permanent', 'Permanent Address','required');
            if($this->form_validation->run()) {
                $data = $this->agent_api_model->update_agent_profile($userData);
                if($data > 0){
                    $this->response(['status'=>true,'message'=>'Profile updated successfully.'], REST_Controller::HTTP_OK);
                }else{
                    $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }
    }
    


}