<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model(array('chat_model','setting_model'));
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('form_validation','session'));
    }
    
    public function index($agent_id){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $chat['data'] = $this->chat_model->get_chat_data();

        $this->form_validation->set_rules('message', 'Message','required');

        if($this->form_validation->run()){
            $admin_id = $_SESSION['id'];
            $this->chat_model->add_chat($admin_id,$agent_id);
            redirect('chat');
        }
        $this->load->view('chat', $chat);
        $this->load->view('templates/admin_footer');
    }




}