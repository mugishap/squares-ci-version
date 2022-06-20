<?php

class UsersModel extends CI_Model
{

    public function get_users()
    {

        $query = $this->db->get("users");
        return $query->result();
    }
    public function insert_user()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[15]|is_unique[users.username]|alpha_numeric');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|unique');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[15]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'matches[password]');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Please fill in all the fields');
            return [false, $this->form_validation->error_array()];
        } else {

            $data = [
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => hash("SHA512", $this->input->post('password'))
            ];
            $this->db->insert('users', $data);
            $userid = $this->get_user_by_username($this->input->post('username'))->user_id;
            return [true, $userid];
        }
    }
    public function update_user($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|min_length[3]|max_length[20]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[15]|alpha_numeric');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Please fill in all the fields');
            return [false, $this->form_validation->error_array()];
        } else {

            $data = [
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
            ];
            $this->db->where('user_id', $id);
            $this->db->update('users', $data);
            return [true, $id];
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
        $this->load->libraries('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[15]|alpha_numeric');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Please fill in all the fields');
            return [false, $this->form_validation->error_array()];
        } else {
            $this->db->where('username', $username);
            $query = $this->db->get('users');
            return $query->row();
        }
    }
    public function get_user_by_email($email)
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Please fill in all the fields');
            return [false, $this->form_validation->error_array()];
        } else {

            $this->db->where('email', $email);
            $query = $this->db->get('users');
            if ($query->num_rows() == 1) {
                return [true, $query->row()];
            } else {
                return [false, $query->num_rows()];
            }
        }
    }
    public function loginAfterSignup($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', hash("SHA512", $password));
        $query = $this->db->get('users');
        if ($query->num_rows() == 1) {
            $this->session->set_userdata('user_id', $query->row()->user_id);
            $this->session->set_userdata('username', $query->row()->username);
            $this->session->set_userdata('firstname', $query->row()->firstname);
            $this->session->set_userdata('lastname', $query->row()->lastname);
            $this->session->set_userdata('email', $query->row()->email);
            return true;
        } else {
            return false;
        }
    }
    public function reset_password($email, $password)
    {
        $this->db->where('email', $email);
        $data = ['password' => hash("SHA512", $password)];
        $this->db->update('users', $data);

        $newpassword = hash("SHA512", $password);
        $this->db->where('email', $email);
        $user = $this->db->get('users');
        if ($user->password == $newpassword) {
            return [true, $user->user_id];
        } else {
            return [false, $this->db->affected_rows()];
        }
    }
}
