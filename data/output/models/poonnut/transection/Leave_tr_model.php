<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Leave_tr_model extends CI_Model {
    
    protected $table_name = 'leave_tr';
    public $leve_id;
    public $emp_id;
    public $type_leave_id;
    public $supervisor_id;
    public $begin_date;
    public $end_date;
    public $begin_time;
    public $end_time;
    public $description_issue;
    public $description_approve;
    public $approve_status;
    public $create_date;
    public $isdelete;

    public function __construct() {
        parent::__construct();
    }

    private function set_Input_to_model() {
	$this->leve_id = $this->input->post('leve_id');
	$this->emp_id = $this->input->post('emp_id');
	$this->type_leave_id = $this->input->post('type_leave_id');
	$this->supervisor_id = $this->input->post('supervisor_id');
	$this->begin_date = $this->input->post('begin_date');
	$this->end_date = $this->input->post('end_date');
	$this->begin_time = $this->input->post('begin_time');
	$this->end_time = $this->input->post('end_time');
	$this->description_issue = $this->input->post('description_issue');
	$this->description_approve = $this->input->post('description_approve');
	$this->approve_status = $this->input->post('approve_status');
	$this->create_date = $this->input->post('create_date');
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
        $this->db->update($this->table_name, $this, array('$leve_id' => $this->leve_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function delete() {
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->delete($this->table_name, array('leve_id' => $this->leve_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    public function update_delete() {
        $this->isdelete = 1;
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->update($this->table_name, array('leve_id' => $this->leve_id));
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


