<?php
class Lead_model extends CI_Model {

    protected $table = 'sq_lead';
    public function __construct() {
        $this->load->database();        
    }

    function add_lead_data(){
        $current_user = $this->session->get_userdata();        
        $lead = array(
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'alt_phone' => $this->input->post('alt_phone'),
            'property_address' => $this->input->post('property_address'),
            'client_address' => $this->input->post('client_address'),
            'created_by' => $current_user['id'],
            'remark' => $this->input->post('remark'),
            'reference' => $this->input->post('reference'),            
            'lead_date' => date('Y-m-d'),
            'active' => 1
        );
        $units = $this->input->post('available_unit');
        $lead['available_unit'] = implode( ",",$units); 
        $insert_status = $this->db->insert('sq_lead',$lead);
        $insert_id = $this->db->insert_id();        
        
        $lead_h = array(
            'lead_id' => $insert_id,
            'user_id' => $current_user['id'],
            'activity_type' => 'Lead Created',
            'lead_status' =>1,
            'activity_comment' =>'Lead Created',
            'activity_date' => date("Y-m-d H:i:s")
        );
        $this->update_lead_history($lead_h);


        $unit_data = array();
        if(!empty($units) && !empty($insert_id)) {
            foreach ($units as $key => $value) {
                $unit_data[] = [
                    'unit_id'=>$value,
                    'lead_id'=>$insert_id
                ];
            }
            $this->db->insert_batch('sq_lead_unit', $unit_data);   
        }
        $this->auto_assign_lead($insert_id);
        
        return $insert_id;
    }
    function update_lead_history($lead){ 
        if($lead['lead_id']){
            $insert_status = $this->db->insert('sq_lead_history',$lead);
            $insert_id = $this->db->insert_id();
        }
    }
    function get_lead_history($id){ 
            $query = $this->db->select("h.*, m.fname,m.lname,s.status_name, m2.fname as ffname,m2.lname as llname")
            ->from('sq_lead_history as h') 
            ->join('sq_members as m', 'm.id = h.user_id', 'left')
            ->join('sq_members as m2', 'm2.id = h.transfer_user_id', 'left')
            ->join('sq_status as s', 's.id = h.lead_status', 'left')
            ->where('lead_id', $id) 
            ->order_by('id','DESC')
            ->get();  
            //print_r($this->db->last_query());       
            return $query->result_array();
    }
    function fetch_total_lead($limit, $start){
        $current_user = $this->session->get_userdata();
        $name = $this->input->get('name', TRUE); 
        $email = $this->input->get('email', TRUE); 
        $phone = $this->input->get('phone', TRUE); 
        $property_address = $this->input->get('property_address', TRUE); 
        $client_address = $this->input->get('client_address', TRUE); 
        $available_unit = $this->input->get('available_unit', TRUE); 
        $status = $this->input->get('status', TRUE);  

        if($status!=3){
            if($current_user['role']<=3){
                $where = " (sq_lead.active = '0' OR  sq_lead.active = '1') ";
            }
            else if($current_user['role']==4){            
                $where = " (sq_lead.active = '0' OR  sq_lead.active = '1') ";
                $where .= " AND assign_to in (SELECT id FROM sq_members WHERE manager_id = ".$current_user['id'].") ";
            }
            else{
                $where = " sq_lead.active = '1' ";
                $where .= " AND assign_to = ".$current_user['id'];
            }
        }else{
            if($current_user['role']<=3){
                $where = " sq_lead.active = '0' ";
            }
            else if($current_user['role']==4){            
                $where = " sq_lead.active = '0' ";
                $where .= " AND assign_to in (SELECT id FROM sq_members WHERE manager_id = ".$current_user['id'].") ";
            }
            else{
                $where = " sq_lead.active = '0' ";
                $where .= " AND assign_to = ".$current_user['id'];
            }
        }
        
        if(!empty($name)) {
            $where.= " AND sq_lead.name like '%$name%'";
        }
        if(!empty($email)) {
            $where.= " AND sq_lead.email like '%$email%'";
        }
        if(!empty($phone)) {
            $where.= " AND sq_lead.phone like '%$phone%'";
        }
        if(!empty($property_address)) {
            $where.= " AND sq_lead.property_address like '%$property_address%'";
        }
        if(!empty($client_address)) {
            $where.= " AND sq_lead.client_address like '%$client_address%'";
        }
        if(!empty($available_unit)) {
            $where.= " AND sq_lead.available_unit like '%$available_unit%'";
        }
        if(!empty($status) && $status!=3) {
            $where.= " AND sq_lead.status='$status'";
        } 
        // Apply filters on leads directed from dashboard
        $search_term = $this->input->get('search_term', TRUE);
        $where.= $this->search_leads($search_term);        

        $query = $this->db->limit($limit, $start)
        ->select("sq_lead.*, sq_members.fname,sq_members.lname,sq_members.active as mactive")
        ->from($this->table) 
        ->join('sq_members', 'sq_members.id = sq_lead.assign_to', 'left')
        ->where($where)
        ->group_by('sq_lead.id')
        ->get();  
        //print_r($this->db->last_query());       
        return $query;
    }

    function soft_delete_lead($id){
        $this->db->set('active',0);
        $this->db->where('id', $id);
        return $this->db->update('sq_lead');
    }
    function update_lead_followup($id){
        $user = $this->session->get_userdata();
        $followup_date = $this->input->post('followup_date');
        $lead = array(
            'status' => $this->input->post('status'),
            'remark' => $this->input->post('remark'),
            'followup_date' => date("Y-m-d", strtotime($followup_date)),
            'last_update' => date("Y-m-d H:i:s")
        );
        $this->db->set($lead);
        $this->db->set('attempted', 'attempted+1', FALSE); 
        $this->db->where('id', $id);
        $this->db->update('sq_lead',$lead);
        $lead_h = array(
            'lead_id' => $id,
            'user_id' => $user['id'],
            'activity_type' => 'Follow-up Update',
            'lead_status' =>$this->input->post('status'),
            
            'activity_comment' => $this->input->post('remark'),
            'activity_date' => date("Y-m-d H:i:s")
        );
        $this->update_lead_history($lead_h);
    }

    function update_lead_details($id){
        $lead = array(
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'alt_phone' => $this->input->post('alt_phone'),
            'property_address' => $this->input->post('property_address'),
            'client_address' => $this->input->post('client_address'),
            'remark' => $this->input->post('remark'),
            'reference' => $this->input->post('reference'),
        );
        $units = $this->input->post('available_unit');
        $lead['available_unit'] = implode( ",",$units); 
        $this->db->where('lead_id',$id);
        $this->db->delete('sq_lead_unit');  

        $unit_data = array();
        if(!empty($units)) {
            foreach ($units as $key => $value) {
                $unit_data[] = [
                    'unit_id'=>$value,
                    'lead_id'=>$id
                ];
            }
            $this->db->insert_batch('sq_lead_unit', $unit_data);   
        }
        
        $this->db->set($lead);
        $this->db->where('id', $id);
        return $this->db->update('sq_lead',$lead);
    }

    function fetch_lead($id){
        $this->db->select("sq_lead.*,sq_members.fname,sq_members.lname,sq_members.active as mactive");
        $this->db->from('sq_lead');
        $this->db->join('sq_members', 'sq_members.id = sq_lead.assign_to', 'left');
        $this->db->where('sq_lead.id',$id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function fetch_lead_data($status){
        $this->db->select("*");
        $this->db->from('sq_lead');
        if($status!=''){
            $this->db->where('status',$status);
        }
        $this->db->where('active',1);
       // return $this->db->get();
        return $this->db->count_all_results();
    }
    
    function fetch_members_data(){
        $this->db->select("*");
        $this->db->from('sq_members');
        $this->db->where('active',1);
        return $this->db->get();
    }

    function fetch_lead_name($id){
        $this->db->select("*");
        $this->db->from('sq_lead');
        $this->db->where('id',$id);
        $this->db->where('active',1);
        return $this->db->get();
    }

    function lead_assign_data($id){
        $user = $this->session->get_userdata();
        $name = $this->input->post('lead_name');       
        $this->db->set('assign_to',$this->input->post('assign_lead'));
        $this->db->set('status',5);
        $this->db->set('assign_date',date('Y-m-d')); 
        $this->db->set('transferred_date',date('Y-m-d')); 
        $this->db->set('followup_date',date('Y-m-d')); 
        $this->db->set('last_update',date('Y-m-d H:i:s'));  
        $this->db->set('status_remark','Lead Transfer');         
        $this->db->where('id', $id);
        $st = $this->db->update('sq_lead');
        $lead_data = array('lead_id'=>$id, 'user_id'=>$user['id'],'activity_type'=>'Lead Transfer','lead_status'=>5,'activity_comment'=>'Lead Transfered','transfer_user_id'=>$this->input->post('assign_lead'));
        $this->update_lead_history($lead_data);
        return $st;
    }

    function deassign_lead_data($id){
        $this->db->set('assign_to',' ');
        $this->db->set('assign_date',date('Y-m-d'));
        $this->db->where('id', $id);
        return $this->db->update('sq_lead');
    }

    public function get_count() {
        $where = $this->get_conditions();
        $this->db->where($where);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_leads($limit, $start) { 
        $where = $this->get_conditions();
        $query = $this->db->limit($limit, $start)
        ->select("sq_lead.id,name,email,phone,alt_phone,client_address,property_address,assign_date,available_unit,assign_to,created_by,status,status_name,color_code,lead_date")
        ->from($this->table)
        ->join('sq_status', 'sq_lead.status = sq_status.id', 'left')
        ->join('sq_lead_unit as u', 'sq_lead.id = u.lead_id', 'left')
        ->where($where)
        ->group_by('sq_lead.id')
        ->get();

        return $query->result();
    }


    function get_conditions() {
        $current_user = $this->session->get_userdata(); 

        $user_id = $this->input->get('user_id', TRUE); 
        $name = $this->input->get('name', TRUE); 
        $email = $this->input->get('email', TRUE); 
        $phone = $this->input->get('phone', TRUE); 
        $property_address = $this->input->get('property_address', TRUE); 
        $client_address = $this->input->get('client_address', TRUE); 
        $available_unit = $this->input->get('available_unit', TRUE); 
        $status = $this->input->get('status', TRUE); 
        $create_lead_date = $this->input->get('lead_date', TRUE); 
        $assign_lead_date = $this->input->get('assign_date', TRUE);
        $status_date = $this->input->get('status_date', TRUE);

        if($current_user['role']<=2){
            $where = " sq_lead.active = '0' OR  sq_lead.active = '1'";
        }else{
            $where = " sq_lead.active = '1' ";
        } 
        // Apply filters on leads directed from dashboard
        $search_term = $this->input->get('search_term', TRUE);
        $where.= $this->search_leads($status,$search_term);

        if(!empty($user_id)) {
            $where.= " AND sq_lead.created_by=$user_id OR sq_lead.assign_to=$user_id";
        }
        if(!empty($name)) {
            $where.= " AND sq_lead.name like '%$name%'";
        }
        if(!empty($email)) {
            $where.= " AND sq_lead.email like '%$email%'";
        }
        if(!empty($phone)) {
            $where.= " AND sq_lead.phone like '%$phone%'";
        }
        if(!empty($property_address)) {
            $where.= " AND sq_lead.property_address like '%$property_address%'";
        }
        if(!empty($client_address)) {
            $where.= " AND sq_lead.client_address like '%$client_address%'";
        }
        if(!empty($available_unit)) {
            $where.= " AND sq_lead.available_unit like '%$available_unit%'";
        }
        if(!empty($status)) {
            $where.= " AND sq_lead.status='$status'";
        }
        if(!empty($create_lead_date)) {
            $where.= " AND sq_lead.lead_date='$create_lead_date'";
        }
        if(!empty($assign_lead_date)) {
            $where.= " AND sq_lead.assign_date='$assign_lead_date'";
        }
        if(!empty($status_date)) {
            $where.= " AND sq_lead.status_date='$status_date'";
        }
        if($current_user['role']>=2){
            $cid = $current_user['id'];
            $where.= " AND sq_lead.assign_to='$cid'";
        }  
        
        return $where;
    }
  
    function search_leads($search_term){
        $where = ""; 
        if($search_term=='new'){
            $d = date('Y-m-d');
            $where.= " AND DATE(sq_lead.followup_date) <= '$d' ";
        }else if($search_term=='today'){
            $d = date('Y-m-d');
            $where.= " AND DATE(sq_lead.followup_date) = '$d' "; 
        }
        else if($search_term=='attempted'){
            $d = date('Y-m-d');
            $where.= " AND DATE(sq_lead.followup_date) <='$d' AND attempted > 0";  
        }
        else if($search_term=='future'){
            $d = date('Y-m-d');
            $where.= " AND DATE(sq_lead.followup_date) > '$d' "; 
        }
        else if($search_term=='transferred'){
            $d = date('Y-m-d');
            $where.= " AND sq_lead.transferred_date IS NOT NULL "; 
        }
        return $where;
    }

    function view_lead_details($id){
        $query = $this->db->select("sq_lead.*, s.*, m.fname, m.lname")
        ->from('sq_lead')
        ->join('sq_status as s', 's.id = sq_lead.status', 'left')
        ->join('sq_members as m', 'm.id = sq_lead.assign_to', 'left')
        ->where('sq_lead.id',$id)
        ->get();
        //print_r($this->db->last_query());        
        return $query->row_array();
    }
    function get_all_leads(){
        $leads=$this->db->get_where("sq_lead",['active'=>'1'])->num_rows();
        return $leads;
    }
    function fetch_all_counter(){
        $user = $this->session->get_userdata();
        $counter=[];
        $counter['members']=$this->db->get_where("sq_members",['active'=>'1'])->num_rows();
       
        if($user['role']<=3){
            $where = " (sq_lead.active = '0' OR sq_lead.active = 1) ";
        }
        else if($user['role']==4){            
            $where = " (sq_lead.active = '0' OR sq_lead.active = 1) ";
            $where .= " AND assign_to in (SELECT id FROM sq_members WHERE manager_id = ".$user['id'].") ";
        }
        else{
            $where = " (sq_lead.active = '0' OR sq_lead.active = 1) ";
            $where .= " AND assign_to = ".$user['id'];
        } 
        $counter['leads']=$this->db->get_where("sq_lead",$where)->num_rows();
        $counter['units']=$this->db->get_where("sq_unit",['active'=>'1'])->num_rows();
        return $counter;
    }
    public function get_status() {
        $query = $this->db->from('sq_status')->get();
        return $query->result_array();
    }

    function fetch_lead_status(){
        $this->db->select("status");
        $this->db->from('sq_lead');
        $this->db->join('sq_status as s','sq_lead.status = s.id','left');
        return $this->db->get();
    }
    // Dashboard analysis data to be fetched 
    function get_leads_analysis($lead_status, $extra=null){
        $user = $this->session->get_userdata();        
        if($extra!=='dumps'){
            if($user['role']<=3){
                $where = " (sq_lead.active = '0' OR  sq_lead.active = '1') ";
            }
            else if($user['role']==4){            
                $where = " (sq_lead.active = '0' OR  sq_lead.active = '1') ";
                $where .= " AND assign_to in (SELECT id FROM sq_members WHERE manager_id = ".$user['id'].") ";
            }
            else{
                $where = " sq_lead.active = '1' ";
                $where .= " AND assign_to = ".$user['id'];
            }
        }else{
            if($user['role']<=3){
                $where = " sq_lead.active = '0' ";
            }
            else if($user['role']==4){            
                $where = " sq_lead.active = '0' ";
                $where .= " AND assign_to in (SELECT id FROM sq_members WHERE manager_id = ".$user['id'].") ";
            }
            else{
                $where = " sq_lead.active = '0' ";
                $where .= " AND assign_to = ".$user['id'];
            }
        }

        if($extra == 'today'){
            $d = date('Y-m-d');
            $where.= " AND sq_lead.followup_date='$d'";
        }else if($extra == 'future'){
            $d = date('Y-m-d');
            $where.= " AND sq_lead.followup_date > '$d'";
        }elseif($extra =='attempted'){
            $d = date('Y-m-d');
            $where.= " AND sq_lead.attempted > 0 AND sq_lead.followup_date <= '$d'";
        }
        if($extra!=='dumps'){
            $where .= ' AND sq_lead.status ='.$lead_status; 
        }         
        $this->db->select("*");        
        $this->db->from('sq_lead');
        $this->db->where($where);
        //print_r($this->db->last_query());
        return $this->db->count_all_results();
        
    }

    function new_leads($id)
    {
        $this->db->select("*");
        $this->db->from('sq_lead');
        $this->db->where('assign_to',$id);
        $this->db->where('lead_date',date('Y-m-d'));
        $this->db->where('active',1);
        return $this->db->count_all_results();
    }

    function today_leads($id)
    {
        $this->db->select("*");
        $this->db->from('sq_lead_remarks');
        $this->db->where('agent_id',$id);
        $this->db->where('followup_date','=',date('Y-m-d'));
        $this->db->where('status',1);
        return $this->db->count_all_results();
    }

    function dump_leads($id)
    {
        $this->db->select("*");
        $this->db->from('sq_lead_remarks');
        $this->db->where('agent_id',$id);
        $this->db->where('followup_date','<',date('Y-m-d'));
        $this->db->where('status',3);
        return $this->db->count_all_results();
    }
    function get_sales_persons(){
        $this->db->select("sq_members.id");
        $this->db->from('sq_members');
        $this->db->where('active',1);
        $this->db->where('role',5); 
        $query = $this->db->get(); 
        return $query->result_array();
    }
    function get_reporting_users($id){
        $this->db->select("sq_members.id");
        $this->db->from('sq_members');
        $this->db->where('active',1);
        $this->db->where('role',4); 
        $this->db->where('manager_id',$id); 
        $query = $this->db->get(); 
        return $query->result_array();
    }

    function get_unique_sales_persons_in_lead(){
        $this->db->select("assign_to as id");
        $this->db->distinct();
        $this->db->from('sq_lead');      
        $this->db->where('assign_to >',1); 
        $this->db->where('active',1); 
        $this->db->order_by('assign_to','ASC'); 
        $this->db->group_by("assign_to");
        $query = $this->db->get(); 
        //print_r($this->db->last_query());
        return $query->result_array();
    }
    function get_assigned_leads_per_user(){
        $this->db->select("assign_to, count(*) as leads");
        $this->db->from('sq_lead');      
        $this->db->where('active',1);
        $this->db->order_by('leads','ASC'); 
        $this->db->group_by("assign_to");
        $query = $this->db->get(); 
        return $query->result_array();
    }
    function second_last_lead(){
        $this->db->select("sq_lead.id,sq_lead.assign_to");
        $this->db->from('sq_lead'); 
        $this->db->where('active',1);
        $this->db->order_by('id',"desc");
        $this->db->limit(1,1);
        $query = $this->db->get();
        //print_r($this->db->last_query());
        return $query->result_array();  
    }
    function auto_assign_lead($id){ 
        $sales_persons = $this->get_sales_persons();          
        $get_unique_sales_persons_in_lead = $this->get_unique_sales_persons_in_lead();
        $newUsers=[];        
        $assign_to=0;
        $a1 = array_column($sales_persons, 'id');
        $a2 = array_column($get_unique_sales_persons_in_lead, 'id');
        // check is there any new sales user added in system, if yes then get list of all 
        // new user and select one of them random.
        $newUsers = array_diff($a1, $a2);
        
        if(count($newUsers)>0){
            $random_keys=array_rand($newUsers,1);
            $assign_to = $newUsers[$random_keys];   
        }else{
            $assigned_leads_per_user = $this->get_assigned_leads_per_user();
            //$last_lead = $this->second_last_lead();
            //print_r($assigned_leads_per_user);
            //print_r($last_lead);
            $er=[];
            $max_leads = $this->config->item('max_leads');
           
            foreach($assigned_leads_per_user as $g){
                if($g['leads']<10){
                    array_push($er,$g);
                }
            }
            if(count($er)>0){
                $a3 = array_column($er, 'assign_to');
                sort( $a3, SORT_NUMERIC );
                $smallest = array_shift($a3);
                $smallest_2nd = array_shift($a3);
                $assign_to = $smallest_2nd;
            }
        }

        if($assign_to > 0){
            $this->db->set('assign_to',$assign_to);
            $this->db->set('status',1);
            $this->db->set('assign_date',date('Y-m-d')); 
            $this->db->set('followup_date',date('Y-m-d')); 
            $this->db->set('last_update',date('Y-m-d H:i:s')); 
            $this->db->set('status_remark','Lead Assigned');      
            $this->db->where('id', $id);
            $this->db->update('sq_lead');
            $lead_data = array('lead_id'=>$id, 'user_id'=>$assign_to,'activity_type'=>'Lead Assigned','lead_status'=>1,'activity_comment'=>'Lead Assigned','transfer_user_id'=>0);
            $this->update_lead_history($lead_data);
        }
    }

}