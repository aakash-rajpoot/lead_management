<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model(array('member_model','setting_model'));
		$this->load->helper(array('form','url','html','date'));
		$this->load->library(array('form_validation','session'));
    }
    
    public function index(){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $query = $this->member_model->fetch_total_members();
        $all_members = $query->result_array();
        $total_members['total_member'] = $all_members;
        $this->load->view('member/total_members',$total_members);
        $this->load->view('templates/admin_footer');
    }

    function add_member(){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
    
        if(isset($_POST['member_submit'])) { 

            $this->form_validation->set_rules('name', 'Full name','required|min_length[2]|regex_match[/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|regex_match[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/]');
            $this->form_validation->set_rules('phone', 'Phone number','required|min_length[10]|max_length[12]|regex_match[/^[0]?[0-9]\d{9}$/]');
            $this->form_validation->set_rules('alt_phone', 'Alternate Phone number','min_length[10]|max_length[12]|regex_match[/^[0]?[0-9]\d{9}$/]');
            $this->form_validation->set_rules('dob', 'Birth Date','required');
            $this->form_validation->set_rules('aadhar', 'Aadhar Card','required');
            $this->form_validation->set_rules('pan', 'Pan Card','required');
            $this->form_validation->set_rules('permanent', 'Permanent Address','required');
            
            $this->form_validation->set_error_delimiters('<div class="php_error">', '</div>');
            $this->form_validation->set_message('required', '* Please enter valid %s');
            
            $config1['upload_path'] = './media/aadhar';
            $config1['allowed_types'] = 'pdf';
            $config1['max_size']    = '15000000';
            $config1['max_width'] = '1024';
            $config1['max_height'] = '768';

            $this->load->library('upload',$config1);
            $this->upload->initialize($config1);

            if (!$this->upload->do_upload('aadhar')){
                $error = array('error' => $this->upload->display_errors());
            } else {
                $_POST['aadhar'] = $this->upload->data('file_name');
            }

            $config2['upload_path'] = './media/pan';
            $config2['allowed_types'] = 'pdf';
            $config2['max_size']    = '15000000';
            $config2['max_width'] = '1024';
            $config2['max_height'] = '768';

            $this->load->library('upload',$config2);
            $this->upload->initialize($config2);

            if (!$this->upload->do_upload('pan')){
                $error = array('error' => $this->upload->display_errors());
            } else {
                $_POST['pan'] = $this->upload->data('file_name');
            }

            if($this->form_validation->run()) {
                $this->member_model->member_data();
                redirect('member');
            }
        }
        $this->load->view('member/add_member');
        $this->load->view('templates/admin_footer');
    }

    function delete_member_soft_data($id){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $this->member_model->soft_delete_member($id);
        redirect('member');
        $this->load->view('templates/admin_footer');
    }

    function resign_agent($id){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $this->member_model->resign_agent_here($id);
        redirect('member');
        $this->load->view('templates/admin_footer');
    }

    function update_member($id){
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $data = $this->member_model->fetch_member_data($id);
        
        if(isset($_POST['member_update'])) { 

            $this->form_validation->set_rules('name', 'Full name','required|min_length[2]|regex_match[/^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|regex_match[/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/]');
            $this->form_validation->set_rules('phone', 'Phone number','required|min_length[10]|max_length[12]|regex_match[/^[0]?[0-9]\d{9}$/]');
            // $this->form_validation->set_rules('alt_phone', 'Alternate Phone number','min_length[10]|max_length[12]|regex_match[/^[0]?[0-9]\d{9}$/]');
            $this->form_validation->set_rules('dob', 'Birth Date','required');
            $this->form_validation->set_rules('permanent', 'Permanent Address','required');
            
            $this->form_validation->set_error_delimiters('<div class="php_error">', '</div>');
            $this->form_validation->set_message('required', '* Please enter valid %s');
            
            if($this->form_validation->run()) {
                if(isset($_FILES['aadhar']) && $_FILES['aadhar']['error'] == '0'){
                    $config1['upload_path'] = './media/aadhar';
                    $config1['allowed_types'] = 'pdf';
                    $config1['max_size']    = '15000000';
                    $config1['max_width'] = '1024';
                    $config1['max_height'] = '768';

                    $this->load->library('upload',$config1);
                    $this->upload->initialize($config1);

                    if (!$this->upload->do_upload('aadhar')){
                        $error = array('error' => $this->upload->display_errors());
                    }
                    else {
                        $_POST['aadhar'] = $this->upload->data('file_name');
                    }
                }
                if(isset($_FILES['pan']) && $_FILES['pan']['error'] == '0'){
                    $config2['upload_path'] = './media/pan';
                    $config2['allowed_types'] = 'pdf';
                    $config2['max_size']    = '15000000';
                    $config2['max_width'] = '1024';
                    $config2['max_height'] = '768';

                    $this->load->library('upload',$config2);
                    $this->upload->initialize($config2);

                    if (!$this->upload->do_upload('pan')){
                        $error = array('error' => $this->upload->display_errors());
                    }
                    else {
                        $_POST['pan'] = $this->upload->data('file_name');
                    }
                }
                if(isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == '0'){
                    $config['upload_path'] = './media/agent_photo';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['width']  = 150;
                    $config['height'] = 50;
        
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    
                    if($this->upload->do_upload('profile_image')){
                        $_POST['profile_image'] = $this->upload->data('file_name');
                    }else{
                        $error = array('error' => $this->upload->display_errors());
                    }
                }
                $this->member_model->update_member_details($id);
                redirect('member');
            }
        }
        $this->load->view('member/update_member', $data);
        $this->load->view('templates/admin_footer');
    }

    function agent_profile_details($id) {
        $data = $this->setting_model->fetch_setting_details();
        $this->load->view('templates/admin_header',$data);
        $data = $this->member_model->fetch_agent_profile_details($id);
        $this->load->view('member/agent_profile',$data);
        $this->load->view('templates/admin_footer');
    }

}