<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class User_tr_model extends CI_Model {
    
    protected $table_name = 'user_tr';
    public $user_id;
    public $employee_emp_id;
    public $username;
    public $email;
    public $password;
    public $create_time;
    public $isdelete;

    public function __construct() {
        parent::__construct();
    }

    private function set_Input_to_model() {
	$this->user_id = $this->input->post('user_id');
	$this->employee_emp_id = $this->input->post('employee_emp_id');
	$this->username = $this->input->post('username');
	$this->email = $this->input->post('email');
	$this->password = $this->input->post('password');
	$this->create_time = $this->input->post('create_time');
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
        $this->db->update($this->table_name, $this, array('$user_id' => $this->user_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function delete() {
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->delete($this->table_name, array('user_id' => $this->user_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    public function update_delete() {
        $this->isdelete = 1;
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->update($this->table_name, array('user_id' => $this->user_id));
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


