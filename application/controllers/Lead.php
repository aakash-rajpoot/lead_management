<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('lead_model');
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('form_validation','session'));
    }
    public function index(){
        $this->load->view('templates/admin_header');
        $query = $this->lead_model->fetch_total_lead();
        $all_leads = $query->result_array();
        $total_leads['total_lead'] = $all_leads;
        $this->load->view('lead/total_lead',$total_leads);
        $this->load->view('templates/admin_footer');
    }

    function add_lead(){
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

		if(isset($_POST['lead_submit']) && $this->form_validation->run()) { 
            $this->lead_model->lead_data();
            redirect('lead');
        }
        $this->load->view('lead/add_lead');
        $this->load->view('templates/admin_footer');
    }

    function soft_delete_lead_data($id){
        $this->load->view('templates/admin_header');
        $this->lead_model->soft_delete_lead($id);
        redirect('lead');
        $this->load->view('templates/admin_footer');
    }

    function hard_delete_lead_data($id){
        $this->load->view('templates/admin_header');
        $this->lead_model->hard_delete_lead($id);
        redirect('lead');
        $this->load->view('templates/admin_footer');
    }

    function update_lead($id){
        $this->load->view('templates/admin_header');
        $data = $this->lead_model->fetch_all_lead($id);
        
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

		if(isset($_POST['lead_update']) && $this->form_validation->run()) { 
            $this->lead_model->update_lead_details($id);
            redirect('lead');
        }
        $this->load->view('lead/update_lead', $data);
        $this->load->view('templates/admin_footer');
    }

    function assign_lead(){
        $this->load->view('templates/admin_header');
        $data = $this->lead_model->fetch_lead_data();
        $all_leads = $data->result_array();
        $data = $this->lead_model->fetch_lead_name();
        $lead_name = $data->result_array();
        $names['names'] = $lead_name;
        $names['leads'] = $all_leads;
    
        $this->form_validation->set_rules('lead_name', 'Lead Name','required');
        $this->form_validation->set_rules('assign_lead', 'Assign Lead','required');

        if(isset($_POST['lead_assign']) && $this->form_validation->run()){
            $this->lead_model->update_lead_assign_data();
            redirect('lead');
        }
        $this->load->view('lead/assign_lead',$names);
        $this->load->view('templates/admin_footer');
    }

}