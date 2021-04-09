<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ( ! $this->session->userdata('id')){ redirect('admin'); }
        $this->load->model(array('chat_model','setting_model','member_model'));
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('form_validation','session'));
    }
    
    public function index(){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data); 
        $user_from = $this->session->get_userdata()['id']; 
        $user_to = $this->session->userdata('chat_with');
        
        $this->form_validation->set_rules('message', 'Message','required');
        if($this->form_validation->run()){            
            $_POST['type'] = 0;
            $this->chat_model->add_chat($user_from,$user_to);
        }

        $chat['members']  = $this->chat_model->get_chat_members();
        $chat['data'] = $this->chat_model->get_chat_data();

        
        $this->load->view('chat', $chat);
        $this->load->view('templates/admin_footer');
    }
    function set_session($id){
        $this->session->set_userdata('chat_with', $id);
        redirect('chat');
    }



}