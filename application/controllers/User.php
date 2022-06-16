<?php

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UsersModel');
    }
    public function index() {
        $users = new UsersModel();
        $data['data'] = $users->get_users();
        $this->load->view('includes/header');
        $this->load->view('users/list', $data);
        $this->load->view('includes/footer');
    }
    public function create() {
        $this->load->view('includes/header');
        $this->load->view('users/create');
        $this->load->view('includes/footer');
    }
}

?>