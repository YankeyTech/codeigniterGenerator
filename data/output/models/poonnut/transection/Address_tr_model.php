<?php

if (!defined("BASEPATH")) {
    exit("No direct script access allowed");
}

class Address_tr_model extends CI_Model {
    
    protected $table_name = 'address_tr';
    public $addr_id;
    public $province_id;
    public $district;
    public $subdistrict;
    public $post_code;
    public $addr_detail;
    public $tel;
    public $country;
    public $latitude;
    public $logitude;
    public $isdelete;

    public function __construct() {
        parent::__construct();
    }

    private function set_Input_to_model() {
	$this->addr_id = $this->input->post('addr_id');
	$this->province_id = $this->input->post('province_id');
	$this->district = $this->input->post('district');
	$this->subdistrict = $this->input->post('subdistrict');
	$this->post_code = $this->input->post('post_code');
	$this->addr_detail = $this->input->post('addr_detail');
	$this->tel = $this->input->post('tel');
	$this->country = $this->input->post('country');
	$this->latitude = $this->input->post('latitude');
	$this->logitude = $this->input->post('logitude');
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
        $this->db->update($this->table_name, $this, array('$addr_id' => $this->addr_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function delete() {
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->delete($this->table_name, array('addr_id' => $this->addr_id));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    public function update_delete() {
        $this->isdelete = 1;
        $this->set_Input_to_model();
        $this->db->trans_start();
        $this->db->update($this->table_name, array('addr_id' => $this->addr_id));
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


