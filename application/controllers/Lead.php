<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ( ! $this->session->userdata('id')){ redirect('admin'); }
        $this->load->model(array('lead_model','setting_model','unit_model'));
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('form_validation','session','pagination'));
    }
    public function index(){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $config = array();
        $config["base_url"] = base_url().'lead/index';
        
        $config["total_rows"] = $this->lead_model->get_count();        
        $config["per_page"] = 20;
        $config["uri_segment"] = 2;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        
        $this->pagination->initialize($config);
        $page = (!isset($_GET['lead_filter']) && $this->uri->segment(3)) ? $this->uri->segment(3) : 0;         
        $data["links"] = $this->pagination->create_links();
        
        $data['total_lead'] = $this->lead_model->fetch_total_lead($config["per_page"], $page)->result_array();
        $data['units'] = $this->unit_model->fetch_unit_data()->result_array();
        $data['salespersons']  = $this->lead_model->get_sales_persons();
        $data['lead_sources']  = $this->lead_model->get_lead_sources();
        $this->load->view('lead/total_lead',$data);
        $this->load->view('templates/admin_footer');
    }

    public function add_lead(){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $query = $this->unit_model->fetch_unit_data();
        $data1 = $query->result_array();
        $data2['units'] = $data1;
        $this->form_validation->set_rules('name', 'Lead name','required|min_length[5]|regex_match[/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/]');
        $this->form_validation->set_rules('email', 'Email', 'valid_email|regex_match[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/]');
        $this->form_validation->set_rules('phone', 'Phone number','required|min_length[10]|max_length[12]|regex_match[/^[0]?[0-9]\d{9}$/]');
		$this->form_validation->set_rules('property_address', 'Property of Address','required');
        $this->form_validation->set_rules('client_address', 'Client Address','required');

        $this->form_validation->set_error_delimiters('<div class="php_error">', '</div>');
		$this->form_validation->set_message('required', '* Please enter valid %s');

		if(isset($_POST['lead_submit']) && $this->form_validation->run()) {
            $this->lead_model->add_lead_data();
            redirect('lead');
        }
        $data2 = array(
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'alt_phone' => $this->input->post('alt_phone'),
            'property_address' => $this->input->post('property_address'),
            'client_address' => $this->input->post('client_address'), 
            'remark' => $this->input->post('remark'),
            'reference' => $this->input->post('reference') 
        );
        $data2['units'] = $data1;
        $data['lead_sources']  = $this->lead_model->get_lead_sources();
        $this->load->view('lead/add_lead',$data2);
        $this->load->view('templates/admin_footer');
    }

    function soft_delete_lead_data($id){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $user = $this->session->get_userdata();
        if($user['role']<=4){
            $this->lead_model->soft_delete_lead($id);
            redirect('lead');
        }
        $this->load->view('templates/admin_footer');
    }

    function update_lead($id){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $data = $this->lead_model->fetch_lead($id);
        $query = $this->unit_model->fetch_unit_data();
        $data1 = $query->result_array();
        $data['units'] = $data1;

        $this->form_validation->set_rules('name', 'Full name','required|min_length[5]|regex_match[/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|regex_match[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/]');
        $this->form_validation->set_rules('phone', 'Phone number','required|min_length[10]|max_length[12]|regex_match[/^[0]?[0-9]\d{9}$/]');
		$this->form_validation->set_rules('property_address', 'Property Of Address','required');
        $this->form_validation->set_rules('client_address', 'Client Address','required');

        $this->form_validation->set_error_delimiters('<div class="php_error">', '</div>');
		$this->form_validation->set_message('required', '* Please enter valid %s');

		if(isset($_POST['lead_update']) && $this->form_validation->run()) {
            $this->lead_model->update_lead_details($id);
            redirect('lead');
        }
        $data['lead_sources']  = $this->lead_model->get_lead_sources();
        $this->load->view('lead/update_lead', $data);
        $this->load->view('templates/admin_footer');
    }

    function deassign_lead($id){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $this->lead_model->deassign_lead_data($id);
        redirect('lead');
        $this->load->view('templates/admin_footer');
    }

    function assign_lead($id){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        
        $data['lead'] = $this->lead_model->fetch_lead($id);
        $data['members'] =$this->lead_model->fetch_members_data()->result_array(); 

        $this->form_validation->set_rules('remark', 'Remarks','required|min_length[10]|max_length[100]'); 
        $this->form_validation->set_error_delimiters('<div class="php_error">', '</div>');
		$this->form_validation->set_message('required', '* Please enter valid %s');

        if(isset($_POST['lead_assign']) && $this->form_validation->run()) {
            $this->lead_model->lead_assign_data($id);
            redirect('lead');
        } 
        $this->load->view('lead/assign_lead',$data);
        $this->load->view('templates/admin_footer');
    }

    function view_lead($id){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        
        $lead['data'] = $this->lead_model->view_lead_details($id);
        $lead['lead_statuses']=$this->lead_model->get_status();
        $units = explode(',',$lead['data']['available_unit']);
        foreach($units as $unit){
            $lead['units'][] = $this->unit_model->get_unit_data($unit);
        }
        
        $this->form_validation->set_rules('status', 'Lead status','required');
        $this->form_validation->set_rules('remark', 'Remarks','required|min_length[10]|max_length[100]'); 
        $this->form_validation->set_error_delimiters('<div class="php_error">', '</div>');
		$this->form_validation->set_message('required', '* Please enter valid %s');

        if(isset($_POST['lead_update']) && $this->form_validation->run()) {
            $this->lead_model->update_lead_followup($id);
            redirect('lead');
        }
        
        $lead['lead_history'] = $this->lead_model->get_lead_history($id);

        $this->load->view('lead/view_lead',$lead);
        $this->load->view('templates/admin_footer');
    }


}