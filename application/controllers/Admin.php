<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('admin_model');
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('form_validation','session'));
    }
    
    public function index(){

        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $query = $this->admin_model->login_verification($email,$password);

        $this->form_validation->set_rules('email', 'Email', 'required|callback_validateUser[' . $query->num_rows() . ']');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if(isset($_POST['admin-login']) && $this->form_validation->run()){
            $user = $query->row_array();
			if(!empty($user)) {
				redirect('admin/admin_dashboard/');
            }
        }
        $this->load->view('admin/login');
    }

    function validateUser($email,$recordCount){
		if ($recordCount != 0){
			return TRUE;
		}else{
			$this->form_validation->set_message('validateUser', 'Invalid %s or Password');
			return FALSE;
		}
    }

    function admin_dashboard(){
        $this->load->view('admin/dashboard');
    }


    function send_sms($phone_number, $verification_code) {
    
        $apiKey = urlencode('Jz0sPt9cSBc-5uSObptlg2rnrvqAHHiaYKNCBSjxll');

        $phone_number = '9643293056';

        $verification_code = rand('10000','99999');
    
        $sender = urlencode('SPMKTC');
    
        $message = rawurlencode("Dear Customer, kindly enter this OTP ".$verification_code." to register at Supermarkeet.com. this will be valid for next 15 minutes.");
    
        $data = array('apikey' => $apiKey, 'numbers' => $phone_number, 'sender' => $sender, 'message' => $message);

        $ch = curl_init('https://api.textlocal.in/send/');
    
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);
        
        echo $response;

    }
    






}