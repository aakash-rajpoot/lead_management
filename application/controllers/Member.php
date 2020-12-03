<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        //$this->load->model('member_model');
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('form_validation','session'));
    }
    
    public function index(){
        $this->load->view('templates/admin_header');
        $this->load->view('member/total_members');
        $this->load->view('templates/admin_footer');
    }

    function add_member(){
        $this->load->view('templates/admin_header');
        $this->load->view('member/add_member');
        $this->load->view('templates/admin_footer');
    }

}