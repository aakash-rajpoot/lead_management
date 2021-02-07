<?php
require APPPATH . '/libraries/REST_Controller.php';
     
class Chat extends REST_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model(array('api_model/chat_model'));
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('form_validation','session'));
    }

    public function index_post($action = '') {
        switch($action) {

            case 'agent_chat':
                $this->agent_chat();
                break;

        }
    }

    public function agent_chat(){
        $userData = $this->verify_token();
        if(!empty($userData)) {
            $agent_msg = $this->input->post('message');
            $this->form_validation->set_rules('message', 'Message','required');
            if($this->form_validation->run()){
                $chat = $this->chat_model->agent_chat_upload($agent_msg,$userData);
                
            }
        }

    }




}