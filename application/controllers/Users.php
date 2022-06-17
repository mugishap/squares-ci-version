<?php

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('UsersModel');
    }
    public function index()
    {
        $users = new UsersModel();
        $data['type'] = 'user';
        $data['users'] = $users->get_users();
        $this->load->view('includes/header', $data);
        $this->load->view('html/users/list', $data);
        $this->load->view('includes/footer');
    }
    public function create()
    {
        $data['type'] = 'user';
        $this->load->view('includes/header', $data);
        $this->load->view('html/users/create');
        $this->load->view('includes/footer');
    }
    public function edit($id)
    {
        $user = $this->db->get_where('users', ['user_id' => $id])->row();
        $data['type'] = 'user';
        $this->load->view('includes/header', $data);
        $this->load->view('html/users/edit', ['user' => $user]);
        $this->load->view('includes/footer');
    }
    public function delete($id)
    {
        $data['type'] = 'user';
        $this->db->where('user_id', $id);
        $this->db->delete('users');
        redirect(base_url('users'));
    }
    public function searchuser($username)
    {
        $user = $this->db->like('users', ['user_id' => $username])->row();
        $data['type'] = 'user';
        $this->load->view('includes/header', $data);
        $this->load->view('html/users/search', ['user' => $user]);
        $this->load->view('includes/footer');
    }

    public function login()
    {
        $data['type'] = 'users';
        $data['loginErrorMessage'] = 'Either password or username is incorrect';
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('users', ['username' => $username, 'password' => $password])->row();
        if ($user) {
            $this->session->set_userdata('user', $user);
            redirect(base_url('users'));
        } else {
            $this->load->view('includes/header', $data);
            $this->load->view('html/users/login', $data);
            $this->load->view('includes/footer');
        }
        $this->load->view('includes/header', $data);
        $this->load->view('html/users/login');
        $this->load->view('includes/footer');
    }
    public function update($id)
    {
        $users = new UsersModel();
        $users->update_user($id);
        echo "DONE";
        redirect(base_url('users'));
    }
}
