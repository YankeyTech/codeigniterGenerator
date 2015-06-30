<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Team_member_model extends CI_Model {
    
    protected $table_name = 'team_member';
    public $team_member_id;
    public $team_id;
    public $emp_id;
    public $team_leader;
    public $team_approve;
    public $isdelete;

    public function __construct() {
        parent::__construct();
    }

    private function set_Input_to_model() {
	$this->team_member_id = $this->input->post('team_member_id');
	$this->team_id = $this->input->post('team_id');
	$this->emp_id = $this->input->post('emp_id');
	$this->team_leader = $this->input->post('team_leader');
	$this->team_approve = $this->input->post('team_approve');
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
        $this->db->update($this->table_name, $this, array('$team_member_id' => $this->team_member_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function delete() {
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->delete($this->table_name, array('team_member_id' => $this->team_member_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    public function update_delete() {
        $this->isdelete = 1;
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->update($this->table_name, array('team_member_id' => $this->team_member_id));
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


