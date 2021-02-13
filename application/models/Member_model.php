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

    function fetch_total_members($limit, $start){

        $name = $this->input->get('name', TRUE); 
        $email = $this->input->get('email', TRUE); 
        $phone = $this->input->get('phone', TRUE); 
        $joining_date = $this->input->get('joining_date', TRUE);  
        $where = "active = '1' ";
        if(!empty($name)) {
            $where.= " AND name like '%$name%'";
        }
        if(!empty($email)) {
            $where.= " AND email like '%$email%'";
        }
        if(!empty($phone)) {
            $where.= " AND phone like '%$phone%'";
        }
        if(!empty($joining_date)) {
            $where.= " AND joining_date like '%$joining_date%'";
        }

        $query = $this->db->limit($limit, $start)
            ->select("id,name,email,phone,alt_phone,gender,dob,joining_date,resignation_date,permanent,correspondence,active")
            ->from('sq_members')
            ->where($where)
            ->get();
        return $query;

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