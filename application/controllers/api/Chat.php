<?php
require APPPATH . '/libraries/REST_Controller.php';
     
class Chat extends REST_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model(array('chat_model','api_model/agent_api_model'));
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('form_validation','session'));
    }

    public function index_post($action = '') {
        switch($action) {

            case 'agent_chat':
                $this->agent_chat();
                break;

            case 'chat_history':
                $this->chat_history();
                break;  
                
        }
    }

    public function agent_chat(){
        $userData = $this->agent_api_model->verify_token();

        if($userData == false){
            $this->response(['status'=>false,'message'=>'Authorization failed!'], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            $this->form_validation->set_rules('message', 'Message','required');
            if($this->form_validation->run()){
                $agent_id = $userData['id'];
                $admin_id = 1;
                $_POST['type'] = 1;
                $chat = $this->chat_model->add_chat($admin_id,$agent_id);
                if($chat) {
                    $this->response(['status'=>true,'message'=>'Message has been send successfully.'], REST_Controller::HTTP_OK);
                }else{
                    $this->response(['status'=>false,'message'=>'Message doesn\'t sent.'], REST_Controller::HTTP_BAD_REQUEST);
                }
            }else{
                $this->response(['status'=>false,'message'=>'Message is required!'], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    function chat_history(){
        $userData = $this->agent_api_model->verify_token();
        if($userData == false) {
            $this->response(['status'=>false,'message'=>'Authorization failed!'], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            $agent_id = $userData['id'];
            $chat = $this->chat_model->get_chat_data($agent_id);
            if($chat) {
                $this->response(['status'=>true,'message'=>'All Messages has been sent.','chat'=>$chat], REST_Controller::HTTP_OK);
            }else{
                $this->response(['status'=>false,'message'=>'Error Found.'], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }





}