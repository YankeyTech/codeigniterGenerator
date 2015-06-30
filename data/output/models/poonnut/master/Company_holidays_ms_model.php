<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Company_holidays_ms_model extends CI_Model {
    
    protected $table_name = 'company_holidays_ms';
    public $holiday_id;
    public $holiday_date;
    public $holiday_th;
    public $holiday_en;
    public $isdelete;

    public function __construct() {
        parent::__construct();
    }

    private function set_Input_to_model() {
	$this->holiday_id = $this->input->post('holiday_id');
	$this->holiday_date = $this->input->post('holiday_date');
	$this->holiday_th = $this->input->post('holiday_th');
	$this->holiday_en = $this->input->post('holiday_en');
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
        $this->db->update($this->table_name, $this, array('$holiday_id' => $this->holiday_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function delete() {
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->delete($this->table_name, array('holiday_id' => $this->holiday_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    public function update_delete() {
        $this->isdelete = 1;
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->update($this->table_name, array('holiday_id' => $this->holiday_id));
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


