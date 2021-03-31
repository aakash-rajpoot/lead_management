<?php
class Member_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    function member_data(){
        $member = array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'alt_phone' => $this->input->post('alt_phone'),
            'gender' => $this->input->post('gender'),
            'dob' => $this->input->post('dob'),
            'aadhar' => $this->input->post('aadhar'),
            'pan' => $this->input->post('pan'),
            'permanent' => $this->input->post('permanent'),
            'correspondence' => $this->input->post('correspondence'),
            'role' => $this->input->post('role'),
            'approval' => $this->input->post('approval')
        );
        if(empty($this->input->post('joining_date'))){
            $member['joining_date'] = date('Y-m-d');
        }else{
            $member['joining_date'] = $this->input->post('joining_date');
        }
        $this->db->insert('sq_members',$member);
    }

    function get_roles(){
        $this->db->select("*");
        $query = $this->db->from('sq_role');
        return $this->db->get()->result_array();
    }

    function fetch_total_members($limit, $start){

        $fname = $this->input->get('fname', TRUE); 
        $lname = $this->input->get('lname', TRUE); 
        $email = $this->input->get('email', TRUE); 
        $phone = $this->input->get('phone', TRUE); 
        $role = $this->input->get('role', TRUE); 
        $joining_date = $this->input->get('joining_date', TRUE);  
        $resignation_date = $this->input->get('resignation_date', TRUE);  
        $correspondence = $this->input->get('correspondence', TRUE);  
        $permanent = $this->input->get('permanent', TRUE);  
        $where = "active = '1' or active = '0'";
        if(!empty($fname)) {
            $where.= " AND fname like '%$fname%'";
        }
        if(!empty($lname)) {
            $where.= " AND lname like '%$lname%'";
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
        if(!empty($resignation_date)) {
            $where = "active = '0'";
            $where.= " AND resignation_date like '%$resignation_date%'";
        }
        if(!empty($permanent)) {
            $where.= " AND permanent like '%$permanent%'";
        }
        if(!empty($correspondence)) {
            $where.= " AND correspondence like '%$correspondence%'";
        }
        if(!empty($role)) {
            $where.= " AND role ='$role'";
        }
        $query = $this->db->limit($limit, $start)
            ->select("sq_members.id,fname,lname,email,phone,aadhar,pan,alt_phone,gender,dob,approval,joining_date,resignation_date,permanent,correspondence,active,r.role as urole,role_id")
            ->from('sq_members')
            ->where($where)
            ->join('sq_role as r','sq_members.role = r.role_id','left')
            ->get();
        return $query;
    }
    //print_r($this->db->last_query());   

    function soft_delete_member($id){
        $this->db->where('id', $id);
        return $this->db->delete('sq_members');
    }

    function update_member_details($id){
        $member = array(
            'fname' => $this->input->post('fname'),
            'lname' => $this->input->post('lname'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'alt_phone' => $this->input->post('alt_phone'),
            'gender' => $this->input->post('gender'), 
            'permanent' => $this->input->post('permanent'),
            'role' => $this->input->post('role'),
            'approval' => $this->input->post('approval'),
            'correspondence' => $this->input->post('correspondence')
        );
        if(!empty($this->input->post('profile_image'))){
            $member['profile_image'] = $this->input->post('profile_image');
        }

        if(!empty($this->input->post('dob'))){
            $member['dob'] = date("Y-m-d", strtotime($this->input->post('dob')));
        }
        
        if(empty($this->input->post('joining_date'))){
            $member['joining_date'] = date('Y-m-d');
        }else{
            $member['joining_date'] = date("Y-m-d", strtotime($this->input->post('joining_date')));
        }

        $this->db->set($member);
        $this->db->where('id', $id);
        return $this->db->update('sq_members',$member);
    }

    function fetch_member_data($id){
        $this->db->select("sq_members.id,fname,lname,email,phone,aadhar,pan,alt_phone,gender,dob,approval,joining_date,resignation_date,permanent,correspondence,profile_image,active,r.role,role_id");
        $this->db->from('sq_members');
        $this->db->where('sq_members.id',$id);
        $this->db->join('sq_role as r','sq_members.role = r.role_id','left');
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
    function add_review_to_agent($agent_id,$reviewer_id){
        $member_review = array(
            'agent_id' => $agent_id,
            'letter_type' => $this->input->post('letter_type'),   
            'reviewer_id' =>  $reviewer_id,       
            'review_date' => date('Y-m-d'),
            'comments' => $this->input->post('comments')
        );
        if(!empty($this->input->post('letters'))){
            $member_review['letter_name'] = $this->input->post('letters');
        } 
        return $this->db->insert('sq_members_performance',$member_review);
    }
    function fetch_member_review($id){
        $this->db->select("sq_members_performance.*,m.fname,m.lname");
        $this->db->from('sq_members_performance');
        $this->db->where('agent_id',$id);
        $this->db->join('sq_members as m','m.id = sq_members_performance.reviewer_id','left');
        return $this->db->get()->result_array();
    }
    
}