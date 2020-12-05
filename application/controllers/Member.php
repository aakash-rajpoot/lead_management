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
		$this->form_validation->set_rules('alt_phone', 'Alternate Phone number','required|min_length[10]|max_length[12]|regex_match[/^[0]?[0-9]\d{9}$/]');
		$this->form_validation->set_rules('property_address', 'Property Of Address','required');
        $this->form_validation->set_rules('client_address', 'Client Address','required');
        $this->form_validation->set_rules('role', 'Role','required');
        $this->form_validation->set_rules('remark', 'Remark','required');
        $this->form_validation->set_rules('other_info', 'Other Information','required');
        $this->form_validation->set_rules('reference', 'Reference By','required');
        
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_message('required', 'Enter %s');

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

    function delete_member_hard_data($id){
        $this->load->view('templates/admin_header');
        $this->member_model->hard_delete_member($id);
        redirect('member');
        $this->load->view('templates/admin_footer');
    }

    function update_member($id){
        $this->load->view('templates/admin_header');
        $data = $this->member_model->fetch_all_members($id);
        
        $this->form_validation->set_rules('name', 'Full name','required|min_length[5]|regex_match[/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|regex_match[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/]');
        $this->form_validation->set_rules('phone', 'Phone number','required|min_length[10]|max_length[12]|regex_match[/^[0]?[0-9]\d{9}$/]');
		$this->form_validation->set_rules('alt_phone', 'Alternate Phone number','required|min_length[10]|max_length[12]|regex_match[/^[0]?[0-9]\d{9}$/]');
		$this->form_validation->set_rules('property_address', 'Property Of Address','required');
        $this->form_validation->set_rules('client_address', 'Client Address','required');
        $this->form_validation->set_rules('role', 'Role','required');
        $this->form_validation->set_rules('remark', 'Remark','required');
        $this->form_validation->set_rules('other_info', 'Other Information','required');
        $this->form_validation->set_rules('reference', 'Reference By','required');
        
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_message('required', 'Enter %s');

		if(isset($_POST['member_update']) && $this->form_validation->run()) { 
            $this->member_model->update_member_details($id);
            redirect('member');
        }
        $this->load->view('member/update_member', $data);
        $this->load->view('templates/admin_footer');
    }

}