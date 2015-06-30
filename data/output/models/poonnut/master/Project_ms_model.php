<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Project_ms_model extends CI_Model {
    
    protected $table_name = 'project_ms';
    public $project_id;
    public $project_name;
    public $start_date;
    public $end_date;
    public $detail;
    public $tel;
    public $isdelete;
    public $address_tr_addr_id;

    public function __construct() {
        parent::__construct();
    }

    private function set_Input_to_model() {
	$this->project_id = $this->input->post('project_id');
	$this->project_name = $this->input->post('project_name');
	$this->start_date = $this->input->post('start_date');
	$this->end_date = $this->input->post('end_date');
	$this->detail = $this->input->post('detail');
	$this->tel = $this->input->post('tel');
	$this->isdelete = $this->input->post('isdelete');
	$this->address_tr_addr_id = $this->input->post('address_tr_addr_id');
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
        $this->db->update($this->table_name, $this, array('$project_id' => $this->project_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function delete() {
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->delete($this->table_name, array('project_id' => $this->project_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    public function update_delete() {
        $this->isdelete = 1;
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->update($this->table_name, array('project_id' => $this->project_id));
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


