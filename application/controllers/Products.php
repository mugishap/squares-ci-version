<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Products extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductsModel');
    }

    public function getpdf()
    {
        $data['products'] = $this->ProductsModel->get_products();
        $this->load->view('html/products/pdf', $data);
    }

    public function index()
    {
        $this->load->library('session');
        if ($this->session->userdata('user_id')) {
            $products = new ProductsModel();
            $data['data'] = $products->get_products();
            $data['type'] = 'product';
            $this->load->view('includes/header', $data);
            $this->load->view('html/products/list', $data);
            $this->load->view('includes/footer');
        } else {
            redirect(base_url('login/form'));
        }
    }

    public function create()
    {
        $this->load->library('session');
        if ($this->session->userdata('user_id')) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]|max_length[40]');
            $this->form_validation->set_rules('description', 'Description', 'trim|required|min_length[3]|max_length[200]');
            $this->form_validation->set_rules('price', 'Price', 'trim|required|min_length[1]|max_length[10]');
            $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|min_length[1]|max_length[10]');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', 'Please fill in all the fields');
                $data['type'] = 'product';
                $data['error'] = $this->form_validation->error_array();
                $this->load->view('includes/header');
                $this->load->view('html/products/create');
                $this->load->view('includes/footer');
            } else {
                $data['type'] = 'product';
                $this->load->view('includes/header', $data);
                $this->load->view('html/products/create');
                $this->load->view('includes/footer');
            }
        } else {
            redirect(base_url('login/form'));
        }
    }
    public function store()
    {
        $this->load->library('session');
        if ($this->session->userdata('user_id')) {
            $products = new ProductsModel();
            $products->insert_product();
            redirect(base_url('products'));
        } else {
            redirect(base_url('login/form'));
        }
    }
    public function edit($id)
    {
        $this->load->library('session');
        if ($this->session->userdata('user_id')) {
            $product = $this->db->get_where('entries', ['entry_id' => $id])->row();
            $data['type'] = 'product';
            $this->load->view('includes/header', $data);
            $this->load->view('html/products/edit', ['product' => $product]);
            $this->load->view('includes/footer');
        } else {
            redirect(base_url('login/form'));
        }
    }
    public function update($id)
    {
        $this->load->library('session');
        if ($this->session->userdata('user_id')) {
            $products = new ProductsModel();
            $products->update_product($id);
            redirect(base_url('products'));
        } else {
            redirect(base_url('login/form'));
        }
    }
    public function delete($id)
    {
        $this->load->library('session');
        if ($this->session->userdata('user_id')) {
            $this->db->where('entry_id', $id);
            $this->db->delete('entries');
            redirect(base_url('products'));
        } else {
            redirect(base_url('login/form'));
        }
    }
}
