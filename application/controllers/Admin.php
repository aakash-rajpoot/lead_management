<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model(array('admin_model','setting_model'));
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('form_validation','session'));
    }
    
    public function index(){

        $query = $this->admin_model->login_verification();

        $this->form_validation->set_rules('email', 'Email', 'required|callback_validateUser[' . $query->num_rows() . ']');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', '* Please enter valid %s');

        if(isset($_POST['admin-login']) && $this->form_validation->run()){
            $user = $query->row_array();
			if(!empty($user)) {
                $this->session->set_userdata($user);
				redirect('admin/admin_dashboard');
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
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $this->load->view('admin/dashboard');
        $this->load->view('templates/admin_footer');
    }

    function logout(){
        $this->session->sess_destroy();
		redirect('admin');
    }

    function change_pass(){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        
		$this->form_validation->set_rules('old_pass', 'Old Password', 'required|callback_oldPassCheck');
    	$this->form_validation->set_rules('new_pass', 'New Password', 'required|min_length[8]|regex_match[/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/]');
		$this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'required|matches[new_pass]');

        $this->form_validation->set_error_delimiters('<div class="php_error">', '</div>');
        $this->form_validation->set_message('required', '* Please enter valid %s');

		if(isset($_POST['admin_change_password']) && $this->form_validation->run()){
                $new_pass = md5($this->input->post('new_pass'));
                $this->admin_model->change_password($new_pass);
                redirect('admin/logout');
            }
		$this->load->view('admin/change_password');
		$this->load->view('templates/admin_footer');
	}
	
	function oldPassCheck($old_pass) {
        $password = $this->admin_model->check_old_password();
     
		if($password['password'] == md5($old_pass)){
			return true;
		}
        $this->load->view('templates/admin_footer');
    }

    function view_profile(){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $data = $this->admin_model->fetch_admin_profile_details();
      
        if(isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == '0'){
            $config['upload_path'] = './media/images';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['width']  = 150;
            $config['height'] = 50;

            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            
            if($this->upload->do_upload('profile_image')){
                $_POST['profile_image'] = $this->upload->data('file_name');
            }else{
                $error = array('error' => $this->upload->display_errors());
            }
        }
       
        $this->form_validation->set_rules('fname', 'First name','min_length[2]|max_length[50]|regex_match[/^[A-Za-z]+$/]');
        $this->form_validation->set_rules('lname', 'Last name','min_length[2]|max_length[50]|regex_match[/^[A-Za-z]+$/]');
        $this->form_validation->set_rules('mobile', 'Mobile number','min_length[10]|max_length[12]|regex_match[/^[1]?[6789]\d{9}$/]');

        $this->form_validation->set_error_delimiters('<div class="php_error">', '</div>');
        $this->form_validation->set_message('required', '* Please enter valid %s');

        if(isset($_POST['update_profile']) && $this->form_validation->run()){
            $this->admin_model->profile_update();
            redirect('admin/view_profile');
        }
		$this->load->view('admin/view_profile', $data);
		$this->load->view('templates/admin_footer');	
	}


}