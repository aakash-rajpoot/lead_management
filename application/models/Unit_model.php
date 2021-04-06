<?php
class Unit_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    function add_unit_details() {
        $unit = array(
            'unit_type' => $this->input->post('unit_type'),
            'unit_size' => $this->input->post('unit_size'),
            'size_measure' => $this->input->post('size_measure'),
            'unit_range' => $this->input->post('unit_range'),
            'unit_remark' => $this->input->post('unit_remark')
        );
        $this->db->insert('sq_unit',$unit);
    }

    function fetch_unit_data(){
        $this->db->select("*");
        $this->db->from('sq_unit');
        $this->db->where('active',1);
        return $this->db->get();
    }

    function get_unit_data($id){
        $this->db->select("*");
        $this->db->from('sq_unit');
        $this->db->where('id',$id);
        $this->db->where('active',1);
        $query = $this->db->get();
        return $query->row_array();
    }

    function update_unit_details($id){
        $unit = array(
            'unit_type' => $this->input->post('unit_type'),
            'unit_size' => $this->input->post('unit_size'),
            'size_measure' => $this->input->post('size_measure'),
            'unit_range' => $this->input->post('unit_range'),
            'unit_remark' => $this->input->post('unit_remark')
        );
        $this->db->set($unit);
        $this->db->where('id', $id);
        return $this->db->update('sq_unit',$unit);
    }

    function delete_unit_data($id){
        $this->db->set('active',0);
        $this->db->where('id', $id);
        return $this->db->update('sq_unit');
    } 

    function get_unit($limit, $start){

        $unit_type = $this->input->get('unit_type', TRUE); 
        $unit_size = $this->input->get('unit_size', TRUE); 
        $unit_range = $this->input->get('unit_range', TRUE);  
        $where = "active = '1'";
        if(!empty($unit_type)) {
            $where.= " AND unit_type like '%$unit_type%'";
        }
        if(!empty($unit_size)) {
            $where.= " AND unit_size like '%$unit_size%'";
        }
        if(!empty($unit_range)) {
            $where.= " AND unit_range like '%$unit_range%'";
        }

        $query = $this->db->limit($limit, $start)
            ->select("*")
            ->from('sq_unit')
            ->where($where)
            ->get();
        return $query;
    }

    public function get_count() {
        return $this->db->where('active','1')->count_all('sq_unit');
    }
}