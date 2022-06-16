<?php

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UsersModel');
    }
    public function index() {
        $users = new UsersModel();
        $data['type'] = 'user';
        $data['data'] = $users->get_users();
        $this->load->view('includes/header',$data);
        $this->load->view('users/list', $data);
        $this->load->view('includes/footer');
    }
    public function create() {
        $data['type'] = 'user';
        $this->load->view('includes/header',$data);
        $this->load->view('users/create');
        $this->load->view('includes/footer');
    }
    public function edit($id){
        $user = $this->db->get_where('users', ['user_id' => $id])->row();
        $data['type'] = 'user';
        $this->load->view('includes/header',$data);
        $this->load->view('users/edit', ['user' => $user]);
        $this->load->view('includes/footer');
    }
    public function delete($id){
        $data['type'] = 'user';
        $this->db->where('user_id',$id);
        $this->db->delete('users');
        redirect(base_url('users'));
    }
    public function searchuser($username){
        $user = $this->db->like('users',['user_id'=>$username])->row();
        $data['type'] = 'user';
        $this->load->view('includes/header',$data);
        $this->load->view('users/search', ['user' => $user]);
        $this->load->view('includes/footer');
    }
}

?>