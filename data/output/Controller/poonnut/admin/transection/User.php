<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('portfolio_group_model');
        $this->load->model('portfolio_item_model');
    }

    public function index() {

        $data['portfolio_group_list'] = $this->portfolio_group_model->get_all();

        $this->template->append_page_section('admin/portfolio/portfolio_group_form');
        $this->template->append_page_section('admin/portfolio/portfolio_group_table');
        $this->template->render_admin_template($this, $data);
    }

    public function portfolio_group() {

        $data['portfolio_group_list'] = $this->portfolio_group_model->get_all();

        $this->template->append_page_section('admin/portfolio/portfolio_group_form');
        $this->template->append_page_section('admin/portfolio/portfolio_group_table');
        $this->template->render_admin_template($this, $data);
    }

    public function create() {

        $this->portfolio_group_model->insert();
        redirect(site_url('admin/portfolio/portfolio_group'));
    }

    public function retrieve() {
        $data['portfolio_item_list'] = $this->portfolio_item_model->get_all();

        $this->template->append_page_section('admin/portfolio/portfolio_item_form');
        $this->template->append_page_section('admin/portfolio/portfolio_item_table');
        $this->template->render_admin_template($this, $data);
    }

    public function modify() {

        $this->portfolio_item_model->insert();
        redirect(site_url('admin/portfolio/portfolio_item'));
    }

    public function dispose() {

        $this->template->render_admin_template($this);
    }

}
