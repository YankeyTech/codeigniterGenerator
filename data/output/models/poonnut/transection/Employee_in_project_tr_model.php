<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Employee_in_project_tr_model extends CI_Model {
    
    protected $table_name = 'employee_in_project_tr';
    public $man_project_id;
    public $project_id;
    public $emp_id;
    public $position_id;
    public $start_date;
    public $end_date;
    public $isdelete;

    public function __construct() {
        parent::__construct();
    }

    private function set_Input_to_model() {
	$this->man_project_id = $this->input->post('man_project_id');
	$this->project_id = $this->input->post('project_id');
	$this->emp_id = $this->input->post('emp_id');
	$this->position_id = $this->input->post('position_id');
	$this->start_date = $this->input->post('start_date');
	$this->end_date = $this->input->post('end_date');
	$this->isdelete = $this->input->post('isdelete');
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
        $this->db->update($this->table_name, $this, array('$man_project_id' => $this->man_project_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function delete() {
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->delete($this->table_name, array('man_project_id' => $this->man_project_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    public function update_delete() {
        $this->isdelete = 1;
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->update($this->table_name, array('man_project_id' => $this->man_project_id));
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


