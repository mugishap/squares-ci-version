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
    public function updateaccountform()
    {
        $this->load->library('session');
        if ($this->session->userdata('user_id')) {
            $users = new UsersModel();
            $data['type'] = 'user';
            $data['user'] = $users->get_user($this->session->userdata('user_id'));
            $this->load->view('includes/header', $data);
            $this->load->view('html/users/updateaccount', $data);
            $this->load->view('includes/footer');
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

    public function delete($id)
    {
        $this->load->library('session');
        if ($this->session->userdata('user_id')) {
            $data['type'] = 'user';
            $this->db->where('user_id', $id);
            $this->db->delete('users');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('firstname');
            $this->session->unset_userdata('lastname');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('email');
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
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('html/users/login', $data['error'] = 'Username or Password is incorrect');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->db->get_where('users', ['username' => $username])->row();
            if ($user) {
                if ($user->password == hash("SHA512", $password)) {
                    $this->session->set_userdata('user_id', $user->user_id);
                    $this->session->set_userdata('firstname', $user->firstname);
                    $this->session->set_userdata('lastname', $user->lastname);
                    $this->session->set_userdata('username', $user->username);
                    $this->session->set_userdata('email', $user->email);
                    $this->session->set_flashdata('msg', "User logged in successfully");
                    redirect(base_url('users'));
                } else {
                    $this->session->set_flashdata('error', 'Invalid password');
                    redirect(base_url('users/loginform'));
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid username');
                // redirect(base_url('users/loginform'));
                $data['type']='user';
                $data['error'] = 'Username or Password is incorrect';
                $this->load->view('includes/header',$data);
                $this->load->view('html/users/login', $data);
            }
        }
    }
    public function update($id)
    {
        $users = new UsersModel();
        $res = $users->update_user($id);
        if ($res[0]) {
            $this->session->set_flashdata('msg', 'User updated successfully');
            $id = $res[1];
            $user = $users->get_user($id);
            $this->session->set_userdata('user_id', $user->user_id);
            $this->session->set_userdata('firstname', $user->firstname);
            $this->session->set_userdata('lastname', $user->lastname);
            $this->session->set_userdata('username', $user->username);
            $this->session->set_userdata('email', $user->email);
            redirect(base_url('users'));
        } else {
            $data['error'] = $res[1];
            $this->session->set_flashdata('error', 'User update failed');
            $this->load->view('html/users/updateaccount', $data);
        }
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
    public function resetpasswordform()
    {

        $data['type'] = 'user';
        $this->load->view('includes/header', $data);
        $this->load->view('html/users/resetpassword');
        $this->load->view('includes/footer');
    }
    public function getUserByEmailForResetPassword()
    {
        $email = $this->input->post('email');
        $users = new UsersModel();
        $user = $users->get_user_by_email($email);
        if ($user[0]) {
            $this->load->library('email');
            $this->email->from('precieuxmugisha@gmail.com', 'Squares reset password');
            $this->email->to($email);
            $this->email->subject('Squares reset password wizard');
            $this->email->message('Hello ' . $user[1]->firstname . ' ' . $user[1]->lastname . 'Your reset password code is ' . $user[1]->user_id, 'Please click on the link below to reset your password: ' . base_url() . 'resetpassword/verify/' . $user[1]->user_id . '. If you did not request password reset please ignore this email');
            $this->email->send();
            var_dump($this->email->send());
            if ($this->email->send()) {
                echo "Sent";
            } else {
                echo "Not sent";
            }
            return $user;
        } else {
            echo 'User not found';
            $data['error'] = 'User not found';
            $this->load->view('html/users/resetpassword', $data);
            // return false;
        }
    }
    public function resetpassword()
    {
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|max_length[20]');
        $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|trim|min_length[8]|max_length[20]|matches[password]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('html/users/resetpassword');
        } else {
            $user_id = $this->input->post('user_id');
            $password = $this->input->post('password');
            $users = new UsersModel();
            $res = $users->reset_password($user_id, $password);
            if ($res[0]) {
                $this->session->set_flashdata('msg', 'Password updated successfully');
                redirect(base_url('login/form'));
            } else {
                $data['error'] = $res[1];
                $this->session->set_flashdata('error', 'Password update failed');
                redirect(base_url('resetpassword/verify/' . $user_id));
            }
        }
    }
}
