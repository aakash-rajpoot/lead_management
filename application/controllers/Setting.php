<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        //$this->load->model('setting_model');
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('form_validation','session'));
    }
    
    public function index(){
        $this->load->view('templates/admin_header');
        $this->load->view('setting/general');
        $this->load->view('templates/admin_footer');
    }


}