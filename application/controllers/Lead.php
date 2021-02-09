<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model(array('lead_model','setting_model','unit_model'));
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('form_validation','session','pagination'));
    }
    public function index(){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $query = $this->lead_model->fetch_total_lead();
        $all_leads = $query->result_array();
        $total_leads['total_lead'] = $all_leads;
        $this->load->view('lead/total_lead',$total_leads);
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
            $this->lead_model->lead_data();
            redirect('lead');
        }
        $this->load->view('lead/add_lead',$data2);
        $this->load->view('templates/admin_footer');
    }

    function soft_delete_lead_data($id){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $this->lead_model->soft_delete_lead($id);
        redirect('lead');
        $this->load->view('templates/admin_footer');
    }

    function update_lead($id){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $data = $this->lead_model->fetch_all_lead($id);
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

        $data1 = $this->lead_model->fetch_lead_data();
        $all_leads = $data1->result_array();
        $names['leads'] = $all_leads;

        $data2 = $this->lead_model->fetch_lead_name($id);
        $assign = $data2->result_array();
        $names['rename'] = $assign;

        if(isset($_POST['lead_assign'])){
            $this->lead_model->lead_assign_data();
            redirect('lead');
        }

        $this->load->view('lead/assign_lead',$names);
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
        $this->load->view('lead/inventory',$data);
        $this->load->view('templates/admin_footer');
    }


}