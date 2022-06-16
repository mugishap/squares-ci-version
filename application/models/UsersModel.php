<?php

class UsersModel extends CI_Model
{

    public function get_users()
    {
        if (!empty($this->input->get("search"))) {
            $this->db->like('title', $this->input->get("search"));
            $this->db->or_like('description', $this->input->get("search"));
        }
        $query = $this->db->get("entries");
        return $query->result();
    }
    public function insert_user()
    {
        if (!empty($this->input->post("firstname")) || !empty($this->input->post("lastname")) || !empty($this->input->post("username")) || !empty($this->input->post("company")) || !empty($this->input->post("email")) || !empty($this->input->post("password"))) {
            $data = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'company' => $this->input->post('company'),
                'password' => $this->input->post('password')
            );
            return $this->db->insert('users', $data);
        }
    }
    public function update_user($id)
    {
        if (!empty($this->input->post("firstname")) || !empty($this->input->post("lastname")) || !empty($this->input->post("username")) || !empty($this->input->post("company")) || !empty($this->input->post("email")) || !empty($this->input->post("password"))) {
            $data=array(
                'firstname'=>$this->input->post('firstname'),
                'lastname'=>$this->input->post('lastname'),
                'username'=>$this->input->post('username'),
                'email'=>$this->input->post('email'),
                'company'=>$this->input->post('company'),
                'password'=>$this->input->post('password')
            );
            if($id=='user_id'){
                return$this->db->insert('users',$data);
            }else{
                $this->db->where('user_id',$id);
                return$this->db->update('users',$data);
            } 
        }       
    }
    public function delete_user($id)
    {
        $this->db->where('user_id',$id);
        return$this->db->delete('users');
    }
    public function get_user($id)
    {
        $this->db->where('user_id',$id);
        $query=$this->db->get('users');
        return $query->row();
    }
    public function get_user_by_username($username)
    {
        $this->db->where('username',$username);
        $query=$this->db->get('users');
        return $query->row();
    }
    public function get_user_by_email($email)
    {
        $this->db->where('email',$email);
        $query=$this->db->get('users');
        return $query->row();
    }
    public function login($username,$password)
    {
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $query=$this->db->get('users');
        return $query->row();
    }
}
