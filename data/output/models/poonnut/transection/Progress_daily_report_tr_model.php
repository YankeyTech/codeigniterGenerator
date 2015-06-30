<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Progress_daily_report_tr_model extends CI_Model {
    
    protected $table_name = 'progress_daily_report_tr';
    public $progress_id;
    public $emp_id;
    public $project_id;
    public $type_progress_id;
    public $weather_id;
    public $progress_date;
    public $work_detail_today;
    public $work_detail_tomorrow;
    public $barriers;
    public $solutions;
    public $isdelete;

    public function __construct() {
        parent::__construct();
    }

    private function set_Input_to_model() {
	$this->progress_id = $this->input->post('progress_id');
	$this->emp_id = $this->input->post('emp_id');
	$this->project_id = $this->input->post('project_id');
	$this->type_progress_id = $this->input->post('type_progress_id');
	$this->weather_id = $this->input->post('weather_id');
	$this->progress_date = $this->input->post('progress_date');
	$this->work_detail_today = $this->input->post('work_detail_today');
	$this->work_detail_tomorrow = $this->input->post('work_detail_tomorrow');
	$this->barriers = $this->input->post('barriers');
	$this->solutions = $this->input->post('solutions');
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
        $this->db->update($this->table_name, $this, array('$progress_id' => $this->progress_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function delete() {
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->delete($this->table_name, array('progress_id' => $this->progress_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    public function update_delete() {
        $this->isdelete = 1;
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->update($this->table_name, array('progress_id' => $this->progress_id));
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


