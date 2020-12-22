<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('setting_model');
		$this->load->helper(array('form','url','html'));
		$this->load->library(array('form_validation','session'));
    }
    
    public function index(){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        
        if(isset($_POST['save'])){
            if(isset($_FILES['logo']) && $_FILES['logo']['error'] == '0'){
                $config['upload_path'] = './media/logo';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['width']  = 150;
                $config['height'] = 50;
    
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('logo')){
                    $_POST['logo'] = $this->upload->data('file_name');
                }else{
                    $error = array('error' => $this->upload->display_errors());
                }
            }
            $this->setting_model->save_setting_details();
            redirect('setting','refresh');
        }
        $this->load->view('setting/general',$data);
        $this->load->view('templates/admin_footer');
    }


}