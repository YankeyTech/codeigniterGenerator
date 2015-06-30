<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Employee_address_tr_model extends CI_Model {
    
    protected $table_name = 'employee_address_tr';
    public $emp_addr_id;
    public $emp_id;
    public $addr_id;
    public $addr_type;

    public function __construct() {
        parent::__construct();
    }

    private function set_Input_to_model() {
	$this->emp_addr_id = $this->input->post('emp_addr_id');
	$this->emp_id = $this->input->post('emp_id');
	$this->addr_id = $this->input->post('addr_id');
	$this->addr_type = $this->input->post('addr_type');
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
        $this->db->update($this->table_name, $this, array('$emp_addr_id' => $this->emp_addr_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function delete() {
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->delete($this->table_name, array('emp_addr_id' => $this->emp_addr_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    public function update_delete() {
        $this->isdelete = 1;
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->update($this->table_name, array('emp_addr_id' => $this->emp_addr_id));
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


