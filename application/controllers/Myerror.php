<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myerror extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('setting_model'));
    }
    public function index(){
        $this->load->view('404page'); 
    }
}
