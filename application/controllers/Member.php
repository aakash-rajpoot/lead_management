<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ( ! $this->session->userdata('id')){ redirect('admin');}  
        $this->load->model(array('member_model','admin_model','setting_model'));
		$this->load->helper(array('form','url','html','date'));
		$this->load->library(array('form_validation','session','pagination'));
    }
    
    public function index(){
        if($this->session->get_userdata()['role']>4 ){
            redirect('admin/admin_dashboard');
        } 
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $config = array();
        $config["base_url"] = base_url().'member/index';
        $config["total_rows"] = $this->member_model->get_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 2;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $this->pagination->initialize($config);
        $page = (!isset($_GET['member_filter']) && $this->uri->segment(3)) ? $this->uri->segment(3) : 0; 
        $data["links"] = $this->pagination->create_links();
        $data['roles'] = $this->member_model->get_roles();
        $data['total_member'] = $this->member_model->fetch_total_members($config["per_page"], $page)->result_array();
        $data['managers'] = $this->member_model->get_managers();
        $this->load->view('member/total_members',$data);
        $this->load->view('templates/admin_footer');
    }

    function add_member(){

        if($this->session->get_userdata()['role']>3 ){
            redirect('member');
        }

        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
    
        if(isset($_POST['member_submit'])) { 
            $this->form_validation->set_rules('fname', 'First name','required|min_length[2]|regex_match[/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/]');
            $this->form_validation->set_rules('lname', 'Last name','required|min_length[2]|regex_match[/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|regex_match[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/]');
            $this->form_validation->set_rules('phone', 'Phone number','required|min_length[10]|max_length[12]|regex_match[/^[0]?[0-9]\d{9}$/]');
            $this->form_validation->set_rules('dob', 'Birth Date','required');
            $this->form_validation->set_rules('aadhar', 'Aadhar Card','required');
            $this->form_validation->set_rules('pan', 'Pan Card','required');
            $this->form_validation->set_rules('role', 'User Role','required');
            $this->form_validation->set_rules('permanent', 'Permanent Address','required');
            
            $this->form_validation->set_error_delimiters('<div class="php_error">', '</div>');
            $this->form_validation->set_message('required', '* Please enter valid %s');
            
            $config1['upload_path'] = './media/aadhar';
            $config1['allowed_types'] = 'pdf';
            $config1['max_size']    = '15000000';
            $config1['max_width'] = '1024';
            $config1['max_height'] = '768';

            $this->load->library('upload',$config1);
            $this->upload->initialize($config1);

            if (!$this->upload->do_upload('aadhar')){
                $error = array('error' => $this->upload->display_errors());
            } else {
                $_POST['aadhar'] = $this->upload->data('file_name');
            }

            $config2['upload_path'] = './media/pan';
            $config2['allowed_types'] = 'pdf';
            $config2['max_size']    = '15000000';
            $config2['max_width'] = '1024';
            $config2['max_height'] = '768';

            $this->load->library('upload',$config2);
            $this->upload->initialize($config2);

            if (!$this->upload->do_upload('pan')){
                $error = array('error' => $this->upload->display_errors());
            } else {
                $_POST['pan'] = $this->upload->data('file_name');
            }

            if($this->form_validation->run()) {
                $this->member_model->member_data();
                redirect('member');
            }
        }
        $data['roles'] = $this->member_model->get_roles();
        $this->load->view('member/add_member',$data);
        $this->load->view('templates/admin_footer');
    }

    function delete_member_soft_data($id){
        if($this->session->get_userdata()['role']>3 ){
            redirect('member');
        }
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $this->member_model->soft_delete_member($id);
        redirect('member');
        $this->load->view('templates/admin_footer');
    }

    function resign_agent($id){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $this->member_model->resign_agent_here($id);
        redirect('member');
        $this->load->view('templates/admin_footer');
    }

    function update_member($id){
        if($this->session->get_userdata()['role']>3 && $this->session->get_userdata()['id']!=$id){
            redirect('member');
        } 

        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $data = $this->member_model->fetch_member_data($id);

        if(isset($_POST['member_update'])) {             
            $this->form_validation->set_rules('fname', 'First name','required|min_length[2]|regex_match[/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/]');
            $this->form_validation->set_rules('lname', 'Last name','required|min_length[2]|regex_match[/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/]');
            $this->form_validation->set_rules('phone', 'Phone number','required|min_length[10]|max_length[12]|regex_match[/^[0]?[0-9]\d{9}$/]');
            $this->form_validation->set_rules('dob', 'Birth Date','required');
            $this->form_validation->set_rules('role', 'User Role','required');
            $this->form_validation->set_rules('permanent', 'Permanent Address','required');            
            $this->form_validation->set_error_delimiters('<div class="php_error">', '</div>');
            $this->form_validation->set_message('required', '* Please enter valid %s');
            
            if($this->form_validation->run()) {
                if(isset($_FILES['aadhar']) && $_FILES['aadhar']['error'] == '0'){
                    $config1['upload_path'] = './media/aadhar';
                    $config1['allowed_types'] = 'pdf';
                    $config1['max_size']    = '15000000';
                    $config1['max_width'] = '1024';
                    $config1['max_height'] = '768';

                    $this->load->library('upload',$config1);
                    $this->upload->initialize($config1);

                    if (!$this->upload->do_upload('aadhar')){
                        $error = array('error' => $this->upload->display_errors());
                    }
                    else {
                        $_POST['aadhar'] = $this->upload->data('file_name');
                    }
                }
                if(isset($_FILES['pan']) && $_FILES['pan']['error'] == '0'){
                    $config2['upload_path'] = './media/pan';
                    $config2['allowed_types'] = 'pdf';
                    $config2['max_size']    = '15000000';
                    $config2['max_width'] = '1024';
                    $config2['max_height'] = '768';

                    $this->load->library('upload',$config2);
                    $this->upload->initialize($config2);

                    if (!$this->upload->do_upload('pan')){
                        $error = array('error' => $this->upload->display_errors());
                    }
                    else {
                        $_POST['pan'] = $this->upload->data('file_name');
                    }
                }
                if(isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == '0'){
                    $config['upload_path'] = './media/agent_photo';
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
                $this->member_model->update_member_details($id);
                redirect('member');
            }
        } 
        if(isset($_POST['add_review'])) {
            $this->form_validation->set_rules('letter_type', 'Letter Type','required');
            $this->form_validation->set_rules('comments', 'Comments','required|min_length[10]|max_length[200]');   

            $this->form_validation->set_error_delimiters('<div class="php_error">', '</div>');
            $this->form_validation->set_message('required', '* Please enter valid %s');
            
            if($this->form_validation->run()) {
                if(isset($_FILES['letters']) && $_FILES['letters']['error'] == '0'){
                    $config1['upload_path'] = './media/letters';
                    $config1['allowed_types'] = 'pdf';
                    $config1['max_size']    = '15000000';
                    $config1['max_width'] = '1024';
                    $config1['max_height'] = '768';

                    $this->load->library('upload',$config1);
                    $this->upload->initialize($config1);

                    if (!$this->upload->do_upload('letters')){
                        $error = array('error' => $this->upload->display_errors());
                    }
                    else {
                        $_POST['letters'] = $this->upload->data('file_name');
                    }
                }
                
                $agent_id = $id;
                $reviewer_id = $_SESSION['id'];                
                $this->member_model->add_review_to_agent($agent_id,$reviewer_id);
                redirect('member');
            }
        }
        

        if(empty($data['dob'])){
            $data['dob'] = date('d-m-Y');
        }else{
            $data['dob'] = date("d-m-Y", strtotime($data['dob']));
        } 

        if(empty($data['joining_date'])){
            $data['joining_date'] = date('d-m-Y');
        }else{
            $data['joining_date'] = date("d-m-Y", strtotime($data['joining_date']));
        }

        $data['roles'] = $this->member_model->get_roles();
        $this->load->view('member/update_member', $data);
        $this->load->view('templates/admin_footer');
    }

    function profile_details($id) {
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $data = $this->member_model->fetch_agent_profile_details($id);
        $data['reviews'] = $this->member_model->fetch_member_review($id);

        if(empty($data['dob'])){
            $data['dob'] = date('d-m-Y');
        }else{
            $data['dob'] = date("d-m-Y", strtotime($data['dob']));
        } 

        if(empty($data['joining_date'])){
            $data['joining_date'] = date('d-m-Y');
        }else{
            $data['joining_date'] = date("d-m-Y", strtotime($data['joining_date']));
        }        
        $this->load->view('member/agent_profile',$data);
        $this->load->view('templates/admin_footer');
    }


    function inventory() {
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $config = array();
        $config["base_url"] = base_url().'lead/inventory';
        $config["total_rows"] = $this->lead_model->get_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $this->pagination->initialize($config);
        $page = (!isset($_GET['inventory_filter']) && $this->uri->segment(3)) ? $this->uri->segment(3) : 0; 
        $data["links"] = $this->pagination->create_links();
        $data['inventories'] = $this->lead_model->get_leads($config["per_page"], $page);
        $data['units'] = $this->unit_model->fetch_unit_data()->result_array();
        $data['statuses'] = $this->lead_model->get_status();
        $this->load->view('lead/inventory',$data);
        $this->load->view('templates/admin_footer');
    }
    function Feedbacks(){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);        
        $this->load->view('templates/admin_footer');
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
                redirect('member/view_profile');
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
        $user = $this->session->get_userdata();
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $data = $this->admin_model->fetch_profile_details(); 
        $data['reviews'] = $this->member_model->fetch_member_review($user['id']);
		$this->load->view('admin/view_profile', $data);
		$this->load->view('templates/admin_footer');	
	}


}