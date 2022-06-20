<?php

class Users extends CI_Controller
{

    public function __construct()
    {
        // $this->load->library('session');
        parent::__construct();
        $this->load->model('UsersModel');
    }
    public function index()
    {
        $this->load->library('session');
        if ($this->session->userdata('user_id')) {

            $users = new UsersModel();
            $data['type'] = 'user';
            $data['users'] = $users->get_users();
            $this->load->view('includes/header', $data);
            $this->load->view('html/users/list', $data);
            $this->load->view('includes/footer');
        } else {
            redirect(base_url('login/form'));
        }
    }
    public function getuser($id)
    {
        $this->load->library('session');
        if ($this->session->userdata('user_id')) {
            $users = new UsersModel();
            $data['type'] = 'user';
            $data['user'] = $users->get_user($id);
        } else {
            redirect(base_url('login/form'));
        }
    }
    public function create()
    {
        $users = new UsersModel();
        $data['type'] = 'user';
        $data['user'] = $users->insert_user();
        $status = $data['user'][0];
        if ($status) {
            $userid = $data['user'][1];
            //    $user =  $users->get_user($userid);
            $res = $users->loginAfterSignup($this->input->post('username'), $this->input->post('password'));
            if ($res) {
                redirect('/products');
            }
        } else {
            $error = $data['user'][1];
            $data['error'] = $error;
            $this->session->set_flashdata('msg', 'User creation failed');
            $this->load->view('html/users/signup', $data);
            $this->load->view('includes/footer');
        }
    }
    public function edit($id)
    {
        $this->load->library('session');
        if ($this->session->userdata('user_id')) {
            $user = $this->db->get_where('users', ['user_id' => $id])->row();
            $data['type'] = 'user';
            $this->load->view('includes/header', $data);
            $this->load->view('html/users/edit', ['user' => $user]);
            $this->load->view('includes/footer');
        } else {
            redirect(base_url('login/form'));
        }
    }
    public function delete($id)
    {
        $this->load->library('session');
        if ($this->session->userdata('user_id')) {
            $data['type'] = 'user';
            $this->db->where('user_id', $id);
            $this->db->delete('users');
            redirect(base_url('users'));
        } else {
            redirect(base_url('login/form'));
        }
    }
    public function searchuser($username)
    {
        $this->load->library('session');
        if ($this->session->userdata('user_id')) {
            $user = $this->db->like('users', ['user_id' => $username])->row();
            $data['type'] = 'user';
            $this->load->view('includes/header', $data);
            $this->load->view('html/users/search', ['user' => $user]);
            $this->load->view('includes/footer');
        } else {
            redirect(base_url('login/form'));
        }
    }

    public function loginform()
    {

        $this->load->library('session');
        if ($this->session->userdata('user_id')) {
            redirect(base_url('products'));
        } else {

            $data['type'] = 'user';
            $this->load->view('includes/header', $data);
            $this->load->view('html/users/login');
            $this->load->view('includes/footer');
        }
    }
    public function login()
    {
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('html/users/login', $data['error'] = 'Username or Password is incorrect');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->db->get_where('users', ['username' => $username])->row();
            if ($user) {
                if ($user->password == hash("SHA512", $password)) {
                    $this->session->set_userdata('user_id', $user->user_id);
                    $this->session->set_userdata('firstname', $user->user_id);
                    $this->session->set_userdata('lastname', $user->user_id);
                    $this->session->set_userdata('username', $user->user_id);
                    $this->session->set_userdata('email', $user->user_id);
                    $this->session->set_flashdata('msg', "User logged in successfully");
                    redirect(base_url('users'));
                } else {
                    $this->session->set_flashdata('error', 'Invalid password');
                    redirect(base_url('users/loginform'));
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid username');
                redirect(base_url('users/loginform'));
            }
        }
    }
    public function update($id)
    {
        $users = new UsersModel();
        $users->update_user($id);
        echo "DONE";
        redirect(base_url('users'));
    }
    public function signupform()
    {
        $data['type'] = 'Signup';
        $this->load->view('html/users/signup');
        $this->load->view('includes/footer');
    }
    public function account($id)
    {
        $this->load->library('session');
        if ($this->session->userdata('user_id')) {
            $users = new UsersModel();
            $data['type'] = 'user';
            $data['user'] = $users->get_user($id);
            $this->load->view('includes/header', $data);
            $this->load->view('html/users/account', $data);
            $this->load->view('includes/footer');
        } else {
            redirect(base_url('login/form'));
        }
    }
    public function logout()
    {
        $this->load->library('session');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('firstname');
        $this->session->unset_userdata('lastname');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        redirect(base_url('login/form'));
    }
}
