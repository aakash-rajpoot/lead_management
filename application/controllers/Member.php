<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('member_model');
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('form_validation','session'));
    }
    
    public function index(){
        $this->load->view('templates/admin_header');
        $query = $this->member_model->fetch_total_members();
        $all_members = $query->result_array();
        $total_members['total_member'] = $all_members;
        $this->load->view('member/total_members',$total_members);
        $this->load->view('templates/admin_footer');
    }

    function add_member(){
        $this->load->view('templates/admin_header');

        $this->form_validation->set_rules('name', 'Full name','required|min_length[5]|regex_match[/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|regex_match[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/]');
        $this->form_validation->set_rules('phone', 'Phone number','required|min_length[10]|max_length[12]|regex_match[/^[0]?[0-9]\d{9}$/]');
		$this->form_validation->set_rules('alt_phone', 'Alternate Phone number','min_length[10]|max_length[12]|regex_match[/^[0]?[0-9]\d{9}$/]');
        $this->form_validation->set_rules('dob', 'Birth Date','required');
        $this->form_validation->set_rules('role', 'Role','required');
        
        $this->form_validation->set_error_delimiters('<div class="php_error">', '</div>');
		$this->form_validation->set_message('required', '* Please enter valid %s');

		if(isset($_POST['member_submit']) && $this->form_validation->run()) { 
            $this->member_model->member_data();
            redirect('member');
        }
        $this->load->view('member/add_member');
        $this->load->view('templates/admin_footer');
    }

    function delete_member_soft_data($id){
        $this->load->view('templates/admin_header');
        $this->member_model->soft_delete_member($id);
        redirect('member');
        $this->load->view('templates/admin_footer');
    }

    // function delete_member_hard_data($id){
    //     $this->load->view('templates/admin_header');
    //     $this->member_model->hard_delete_member($id);
    //     redirect('member');
    //     $this->load->view('templates/admin_footer');
    // }

    function update_member($id){
        $this->load->view('templates/admin_header');
        $data = $this->member_model->fetch_member_data($id);
        
        $this->form_validation->set_rules('name', 'Full name','required|min_length[5]|regex_match[/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|regex_match[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/]');
        $this->form_validation->set_rules('phone', 'Phone number','required|min_length[10]|max_length[12]|regex_match[/^[0]?[0-9]\d{9}$/]');
		$this->form_validation->set_rules('alt_phone', 'Alternate Phone number','min_length[10]|max_length[12]|regex_match[/^[0]?[0-9]\d{9}$/]');
        $this->form_validation->set_rules('dob', 'Birth Date','required');
        $this->form_validation->set_rules('role', 'Role','required');
        
        $this->form_validation->set_error_delimiters('<div class="php_error">', '</div>');
		$this->form_validation->set_message('required', '* Please enter valid %s');

		if(isset($_POST['member_update']) && $this->form_validation->run()) { 
            $this->member_model->update_member_details($id);
            redirect('member');
        }
        $this->load->view('member/update_member', $data);
        $this->load->view('templates/admin_footer');
    }

    function agent_profile_details(){
        $this->load->view('templates/admin_header');
        $data = $this->member_model->fetch_agent_profile_details();
      
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

        $this->load->view('member/agent_profile',$data);
        $this->load->view('templates/admin_footer');
    }

}