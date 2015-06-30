<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Employee_job_title_tr_model extends CI_Model {
    
    protected $table_name = 'employee_job_title_tr';
    public $emp_job_title_id;
    public $emp_id;
    public $job_title_id;
    public $salaly;
    public $from_date;
    public $isdelete;

    public function __construct() {
        parent::__construct();
    }

    private function set_Input_to_model() {
	$this->emp_job_title_id = $this->input->post('emp_job_title_id');
	$this->emp_id = $this->input->post('emp_id');
	$this->job_title_id = $this->input->post('job_title_id');
	$this->salaly = $this->input->post('salaly');
	$this->from_date = $this->input->post('from_date');
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
        $this->db->update($this->table_name, $this, array('$emp_job_title_id' => $this->emp_job_title_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function delete() {
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->delete($this->table_name, array('emp_job_title_id' => $this->emp_job_title_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    public function update_delete() {
        $this->isdelete = 1;
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->update($this->table_name, array('emp_job_title_id' => $this->emp_job_title_id));
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


