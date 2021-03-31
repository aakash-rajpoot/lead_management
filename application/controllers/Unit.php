<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ( ! $this->session->userdata('id')){ eedirect('admin'); }
        $this->load->model(array('unit_model','setting_model'));
		$this->load->helper(array('form','url','html'));
        $this->load->library(array('form_validation','session','pagination'));
        
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn'); 
    }
    public function index(){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $config = array();
        $config["base_url"] = base_url().'unit/index';
        $config["total_rows"] = $this->unit_model->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $this->pagination->initialize($config);
        $page = (!isset($_GET['unit_filter']) && $this->uri->segment(3)) ? $this->uri->segment(3) : 0; 
        $data["links"] = $this->pagination->create_links();
        $data['total_unit'] = $this->unit_model->get_unit($config["per_page"], $page)->result_array();
        $this->load->view('unit/all_units',$data);
        $this->load->view('templates/admin_footer');
    }

    function add_unit(){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);

        $this->form_validation->set_rules('unit_type', 'Types of units','required');
        $this->form_validation->set_rules('unit_size', 'Unit size','required');
        $this->form_validation->set_error_delimiters('<div class="php_error">', '</div>');
        $this->form_validation->set_message('required', '* Please enter valid %s');
        
        if(isset($_POST['unit_submit']) && $this->form_validation->run()) {
            $this->unit_model->add_unit_details();
            redirect('unit/add_unit');
        }
        $this->load->view('unit/add_unit');
        $this->load->view('templates/admin_footer');
    }

    function update_unit($id){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $data1 = $this->unit_model->get_unit_data($id);
        $this->form_validation->set_rules('unit_type', 'Types of units','required');
        $this->form_validation->set_rules('unit_size', 'Unit size','required');
        $this->form_validation->set_error_delimiters('<div class="php_error">', '</div>');
        $this->form_validation->set_message('required', '* Please enter valid %s');
        
        if(isset($_POST['unit_update']) && $this->form_validation->run()) {
            $this->unit_model->update_unit_details($id);
            redirect('unit');
        }
        $this->load->view('unit/update_unit',$data1);
        $this->load->view('templates/admin_footer');
    }

    function delete_unit($id){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $this->unit_model->delete_unit_data($id);
        redirect('unit');
        $this->load->view('templates/admin_footer');
    }

}