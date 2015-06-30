<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Time_sheet_tr_model extends CI_Model {
    
    protected $table_name = 'time_sheet_tr';
    public $time_sheet_id;
    public $emp_id;
    public $supervisor_approve_id;
    public $project_id;
    public $start_date;
    public $end_date;
    public $work;
    public $approve_status;
    public $comment;
    public $leave_id;
    public $time_stamp;
    public $isdelete;

    public function __construct() {
        parent::__construct();
    }

    private function set_Input_to_model() {
	$this->time_sheet_id = $this->input->post('time_sheet_id');
	$this->emp_id = $this->input->post('emp_id');
	$this->supervisor_approve_id = $this->input->post('supervisor_approve_id');
	$this->project_id = $this->input->post('project_id');
	$this->start_date = $this->input->post('start_date');
	$this->end_date = $this->input->post('end_date');
	$this->work = $this->input->post('work');
	$this->approve_status = $this->input->post('approve_status');
	$this->comment = $this->input->post('comment');
	$this->leave_id = $this->input->post('leave_id');
	$this->time_stamp = $this->input->post('time_stamp');
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
        $this->db->update($this->table_name, $this, array('$time_sheet_id' => $this->time_sheet_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function delete() {
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->delete($this->table_name, array('time_sheet_id' => $this->time_sheet_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    public function update_delete() {
        $this->isdelete = 1;
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->update($this->table_name, array('time_sheet_id' => $this->time_sheet_id));
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


