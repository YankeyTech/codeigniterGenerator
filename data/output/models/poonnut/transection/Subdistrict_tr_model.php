<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Subdistrict_tr_model extends CI_Model {
    
    protected $table_name = 'subdistrict_tr';
    public $subdistrict_id;
    public $subdistrict_name;
    public $district_id;
    public $isdelte;

    public function __construct() {
        parent::__construct();
    }

    private function set_Input_to_model() {
	$this->subdistrict_id = $this->input->post('subdistrict_id');
	$this->subdistrict_name = $this->input->post('subdistrict_name');
	$this->district_id = $this->input->post('district_id');
	$this->isdelte = $this->input->post('isdelte');
    }

    public function insert() {
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->insert($this->table_name, $this);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function update() {
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->update($this->table_name, $this, array('$subdistrict_id' => $this->subdistrict_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function delete() {
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->delete($this->table_name, array('subdistrict_id' => $this->subdistrict_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    public function update_delete() {
        $this->isdelete = 1;
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->update($this->table_name, array('subdistrict_id' => $this->subdistrict_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function get_all() {
        $query = $this->db->get($this->table_name);
        return $query->result();
    }
    
     public function get_empty_record() {
        return get_object_vars($this);
    }

}


