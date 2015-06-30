<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Employee_tr_model extends CI_Model {
    
    protected $table_name = 'employee_tr';
    public $emp_id;
    public $company_id;
    public $dep_id;
    public $position_id;
    public $emp_code;
    public $pfname;
    public $fname_th;
    public $lname_th;
    public $fname_en;
    public $lname_en;
    public $nickname;
    public $email;
    public $passwd;
    public $gender;
    public $mobile;
    public $cityzen_id;
    public $birthday;
    public $blood;
    public $image;
    public $hire_date;
    public $resign_date;
    public $type;
    public $role;
    public $token_key;
    public $isdelete;
    public $isresign;

    public function __construct() {
        parent::__construct();
    }

    private function set_Input_to_model() {
	$this->emp_id = $this->input->post('emp_id');
	$this->company_id = $this->input->post('company_id');
	$this->dep_id = $this->input->post('dep_id');
	$this->position_id = $this->input->post('position_id');
	$this->emp_code = $this->input->post('emp_code');
	$this->pfname = $this->input->post('pfname');
	$this->fname_th = $this->input->post('fname_th');
	$this->lname_th = $this->input->post('lname_th');
	$this->fname_en = $this->input->post('fname_en');
	$this->lname_en = $this->input->post('lname_en');
	$this->nickname = $this->input->post('nickname');
	$this->email = $this->input->post('email');
	$this->passwd = $this->input->post('passwd');
	$this->gender = $this->input->post('gender');
	$this->mobile = $this->input->post('mobile');
	$this->cityzen_id = $this->input->post('cityzen_id');
	$this->birthday = $this->input->post('birthday');
	$this->blood = $this->input->post('blood');
	$this->image = $this->input->post('image');
	$this->hire_date = $this->input->post('hire_date');
	$this->resign_date = $this->input->post('resign_date');
	$this->type = $this->input->post('type');
	$this->role = $this->input->post('role');
	$this->token_key = $this->input->post('token_key');
	$this->isdelete = $this->input->post('isdelete');
	$this->isresign = $this->input->post('isresign');
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
        $this->db->update($this->table_name, $this, array('$emp_id' => $this->emp_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function delete() {
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->delete($this->table_name, array('emp_id' => $this->emp_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    public function update_delete() {
        $this->isdelete = 1;
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->update($this->table_name, array('emp_id' => $this->emp_id));
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


