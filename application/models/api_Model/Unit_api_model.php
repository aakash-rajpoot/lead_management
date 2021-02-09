<?php
class Unit_api_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function fetch_all_units_data(){
        return $this->db->get_where("sq_unit",['status'=>'1'])->result();
    }

    function add_units_data(){
        $unit = array(
            'unit_type' => $this->input->post('unit_type'),
            'unit_size' => $this->input->post('unit_size'),
            'size_measure' => $this->input->post('size_measure')
        );
        return $this->db->insert('sq_unit',$unit);
    }

    function update_unit_data($id,$unit){
        return $this->db->update('sq_unit', $unit, array('id'=>$id));
    }

    function delete_unit_data($id){
        return $this->db->delete('sq_unit', array('id'=>$id));
    }

}