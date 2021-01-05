<?php
require APPPATH . '/libraries/REST_Controller.php';
     
class Agent_Api extends REST_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('agent_api_model');
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('form_validation','session'));
    }

	public function index_get() {
        $email = $this->input->get('email');

        if(!empty($email)) {
            $data = $this->agent_api_model->agent_mobile_get($email);
            if(!empty($data)) {
                $this->response($data, REST_Controller::HTTP_OK);
            } else {
                $this->response(['Unable to locate account.'], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response(['Please enter valid email.'], REST_Controller::HTTP_OK);
        }
	}

    public function index_post() {
        
        $this->form_validation->set_rules('name', 'Full name','required|min_length[2]|regex_match[/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[sq_members.email]|regex_match[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/]');
        $this->form_validation->set_rules('phone', 'Phone number','required|min_length[10]|max_length[12]|regex_match[/^[0]?[0-9]\d{9}$/]');
        // $this->form_validation->set_rules('alt_phone', 'Alternate Phone number','min_length[10]|max_length[12]|regex_match[/^[0]?[0-9]\d{9}$/]');
        // $this->form_validation->set_rules('dob', 'Birth Date','required');
        // $this->form_validation->set_rules('aadhar', 'Aadhar Card','required');
        // $this->form_validation->set_rules('pan', 'Pan Card','required');
        // $this->form_validation->set_rules('permanent', 'Permanent Address','required');
            
        // $this->form_validation->set_error_delimiters('<div class="php_error">', '</div>');
        // $this->form_validation->set_message('required', '* Please enter valid %s');

        // $config1['upload_path'] = './media/aadhar';
        // $config1['allowed_types'] = 'pdf';
        // $config1['max_size']    = '15000000';
        // $config1['max_width'] = '1024';
        // $config1['max_height'] = '768';

        // $this->load->library('upload',$config1);
        // $this->upload->initialize($config1);

        // if (!$this->upload->do_upload('aadhar')){
        //     $error = array('error' => $this->upload->display_errors());
        // } else {
        //     $_POST['aadhar'] = $this->upload->data('file_name');
        // }

        // $config2['upload_path'] = './media/pan';
        // $config2['allowed_types'] = 'pdf';
        // $config2['max_size']    = '15000000';
        // $config2['max_width'] = '1024';
        // $config2['max_height'] = '768';

        // $this->load->library('upload',$config2);
        // $this->upload->initialize($config2);

        // if (!$this->upload->do_upload('pan')){
        //     $error = array('error' => $this->upload->display_errors());
        // } else {
        //     $_POST['pan'] = $this->upload->data('file_name');
        // }

        if($this->form_validation->run()) {
            $this->agent_api_model->agent_mobile_post();
            $this->response(['Agent created successfully.'], REST_Controller::HTTP_OK);
        }else{
            $this->response(['Please check your agent validations.'], REST_Controller::HTTP_OK);
        }

    }

    public function index_put($id) {
        $input = $this->put();
        $status = $this->agent_api_model->agent_mobile_put($id,$input);
        if($status == "1"){
            $this->response(['Agent updated successfully.'], REST_Controller::HTTP_OK);
        }else{
            $this->response(['Error Found.'], REST_Controller::HTTP_OK);
        }
    }

    public function index_delete($id) {
        $this->agent_api_model->agent_mobile_delete($id);
        if($status == "1"){
            $this->response(['Agent deleted successfully.'], REST_Controller::HTTP_OK);
        }else{
            $this->response(['Error Found.'], REST_Controller::HTTP_OK);
        }
    }
}