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

    function fetch_unit_data($units = ''){
        if(!empty($units)) {
            if(is_array($units)) {
                $this->db->where_in('id',$units);
            } else {
                $this->db->where('id',$units);
            }
        }
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

}