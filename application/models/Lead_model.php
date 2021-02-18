<?php
class Lead_model extends CI_Model {

    protected $table = 'sq_lead';
    public function __construct() {
        $this->load->database();
    }

    function lead_data(){
        $lead = array(
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'email' => $this->input->post('email'),
            'alt_phone' => $this->input->post('alt_phone'),
            'property_address' => $this->input->post('property_address'),
            'client_address' => $this->input->post('client_address'),
            'remark' => $this->input->post('remark'),
            'reference' => $this->input->post('reference'),
            'lead_status' => date('Y-m-d')
        );
        $units = $this->input->post('available_unit');
        $lead['available_unit'] = implode( ",",$units); 
        $insert_status = $this->db->insert('sq_lead',$lead);
        $insert_id = $this->db->insert_id();
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
        return $insert_status;
    }

    function fetch_total_lead($limit, $start){

        $name = $this->input->get('name', TRUE); 
        $email = $this->input->get('email', TRUE); 
        $phone = $this->input->get('phone', TRUE); 
        $property_address = $this->input->get('property_address', TRUE); 
        $client_address = $this->input->get('client_address', TRUE); 
        $available_unit = $this->input->get('available_unit', TRUE); 
        $status = $this->input->get('status', TRUE); 
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
        if(!empty($property_address)) {
            $where.= " AND property_address like '%$property_address%'";
        }
        if(!empty($client_address)) {
            $where.= " AND client_address like '%$client_address%'";
        }
        if(!empty($available_unit)) {
            $where.= " AND u.unit_id='$available_unit'";
        }
        if(!empty($status)) {
            $where.= " AND status='$status'";
        }

        $query = $this->db->limit($limit, $start)
        ->select("sq_lead.id,name,email,phone,alt_phone,client_address,assign_to,property_address,assign_date,available_unit,status,lead_date,remark,reference")
        ->from($this->table)
        ->join('sq_lead_unit as u', 'sq_lead.id = u.lead_id', 'left')
        ->where($where)
        ->group_by('sq_lead.id')
        ->get();

        return $query;
    }

    function soft_delete_lead($id){
        $this->db->set('active',0);
        $this->db->where('id', $id);
        return $this->db->update('sq_lead');
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

    function fetch_all_lead($id){
        $this->db->select("*");
        $this->db->from('sq_lead');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function fetch_lead_data(){
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

    function lead_assign_data(){
        $name = $this->input->post('lead_name');
        $data = array(
            'assign_to' => $this->input->post('assign_lead'),
            'assign_date' => date('Y-m-d'),
            'status' => 1
        );

        $this->db->set($data);
        $this->db->where('name', $name);
        $this->db->where('active', 1);
        return $this->db->update('sq_lead');
    }

    function deassign_lead_data($id){
        $this->db->set('assign_to',' ');
        $this->db->set('assign_date',' ');
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
       
        $assign_to = $this->input->get('assign_to', TRUE); 
        $created_by = $this->input->get('created_by', TRUE); 
        $name = $this->input->get('name', TRUE); 
        $email = $this->input->get('email', TRUE); 
        $phone = $this->input->get('phone', TRUE); 
        $property_address = $this->input->get('property_address', TRUE); 
        $client_address = $this->input->get('client_address', TRUE); 
        $available_unit = $this->input->get('available_unit', TRUE); 
        $status = $this->input->get('status', TRUE); 
        $create_lead_date = $this->input->get('lead_date', TRUE); 
        $assign_lead_date = $this->input->get('assign_date', TRUE);
        $where = "active = '1' ";
        if(!empty($assign_to)) {
            $where.= " AND assign_to = '$assign_to'";
        }
        if(!empty($created_by)) {
            $where.= " AND created_by = '$created_by'";
        }
        if(!empty($name)) {
            $where.= " AND name like '%$name%'";
        }
        if(!empty($email)) {
            $where.= " AND email like '%$email%'";
        }
        if(!empty($phone)) {
            $where.= " AND phone like '%$phone%'";
        }
        if(!empty($property_address)) {
            $where.= " AND property_address like '%$property_address%'";
        }
        if(!empty($client_address)) {
            $where.= " AND client_address like '%$client_address%'";
        }
        if(!empty($available_unit)) {
            $where.= " AND u.unit_id='$available_unit'";
        }
        if(!empty($status)) {
            $where.= " AND status='$status'";
        }
        if(!empty($create_lead_date)) {
            $where.= " AND lead_date='$create_lead_date'";
        }
        if(!empty($assign_lead_date)) {
            $where.= " AND assign_date='$assign_lead_date'";
        }

        return $where;
    }


    function view_lead_details($id){
        $query = $this->db->select("sq_lead.id,name,email,phone,alt_phone,client_address,property_address,assign_date,available_unit,status,status_name,color_code,lead_date,reference,remark")
        ->from($this->table)
        ->join('sq_status', 'sq_lead.status = sq_status.id', 'left')
        ->join('sq_lead_unit as u', 'sq_lead.id = u.lead_id', 'left')
        ->where('sq_lead.id',$id)
        ->get();
        return $query->row_array();
    }

    function fetch_all_counter(){
        $counter=[];
        $counter['members']=$this->db->get_where("sq_members",['active'=>'1'])->num_rows();
        $counter['leads']=$this->db->get_where("sq_lead",['active'=>'1'])->num_rows();
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



}