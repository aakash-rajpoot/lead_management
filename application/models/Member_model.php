<?php
class Member_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

   function member_data(){
        $member = array(
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'alt_phone' => $this->input->post('alt_phone'),
            'gender' => $this->input->post('gender'),
            'dob' => $this->input->post('dob'),
            'aadhar' => $this->input->post('aadhar'),
            'pan' => $this->input->post('pan'),
            'permanent' => $this->input->post('permanent'),
            'correspondence' => $this->input->post('correspondence')
        );
        if(empty($this->input->post('joining_date'))){
            $member['joining_date'] = date('Y-m-d');
        }else{
            $member['joining_date'] = $this->input->post('joining_date');
        }

        $this->db->insert('sq_members',$member);
   }

    function fetch_total_members(){
        $this->db->select("*");
        $this->db->from('sq_members');
        return $this->db->get();
    }

    function soft_delete_member($id){
        $this->db->where('id', $id);
        return $this->db->delete('sq_members');
    }

    function update_member_details($id){
        $member = array(
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'alt_phone' => $this->input->post('alt_phone'),
            'gender' => $this->input->post('gender'),
            'dob' => $this->input->post('dob'),
            'permanent' => $this->input->post('permanent'),
            'correspondence' => $this->input->post('correspondence')
        );

        if(!empty($this->input->post('profile_image'))){
            $member['profile_image'] = $this->input->post('profile_image');
        }

        if(empty($this->input->post('joining_date'))){
            $member['joining_date'] = date('Y-m-d');
        }else{
            $member['joining_date'] = $this->input->post('joining_date');
        }

        $this->db->set($member);
        $this->db->where('id', $id);
        return $this->db->update('sq_members',$member);
    }

    function fetch_member_data($id){
        $this->db->select("*");
        $this->db->from('sq_members');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function fetch_agent_profile_details($id){
        $this->db->select("*");
        $this->db->from('sq_members');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function resign_agent_here($id){
        $date = date('Y-m-d');
        $this->db->set('active',0);
        $this->db->set('resignation_date', $date);
        $this->db->where('id', $id);
        return $this->db->update('sq_members');
    }

    public function get_count() {
        return $this->db->where('active','1')->count_all('sq_members');
    }
}