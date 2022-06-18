<?php

class UsersModel extends CI_Model
{

    public function get_users()
    {
        // if (!empty($this->input->get("search"))) {
        //     $this->db->like('title', $this->input->get("search"));
        //     $this->db->or_like('description', $this->input->get("search"));
        // }
        $query = $this->db->get("users");
        return $query->result();
    }
    public function insert_user()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[10]|max_length[15]|is_unique[users.username]|alpha_numeric');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric|min_length[8]|max_length[15]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'matches[password]|alpha_numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Please fill in all the fields');
            return false;
        } else {

            $data = [
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password')
            ];
            return $this->db->insert('users', $data);
        }
    }
    public function update_user($id)
    {
        if (!empty(trim($this->input->post("firstname"))) || !empty(trim($this->input->post("lastname"))) || !empty(trim($this->input->post("username")))  || !empty($this->input->post("email"))) {
            $data = [
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
            ];

            $this->db->where('user_id', $id);
            return $this->db->update('users', $data);
        } else {
            return false;
        }
    }
    public function delete_user($id)
    {
        $this->db->where('user_id', $id);
        return $this->db->delete('users');
    }
    public function get_user($id)
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get('users');
        return $query->row();
    }
    public function get_user_by_username($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query->row();
    }
    public function get_user_by_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->row();
    }
    public function login($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('users');
        return $query->row();
    }
}
