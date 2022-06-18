<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ProductsModel');
    }

public function getpdf(){
    $data['products'] = $this->ProductsModel->get_products();
    $this->pdf->load_view('html/products/pdf', $data);
}

    public function index(){
        $products = new ProductsModel();
        $data['data'] = $products->get_products();
        $data['type'] = 'product';
        $this->load->view('includes/header',$data);
        $this->load->view('html/products/list', $data);
        $this->load->view('includes/footer');
    }

    public function create(){
        $data['type'] = 'product';
        $this->load->view('includes/header',$data);
        $this->load->view('html/products/create');
        $this->load->view('includes/footer');
    }
    public function store(){
        $products = new ProductsModel();
        $products->insert_product();
        redirect(base_url('products'));
    }
    public function edit($id){
        $product = $this->db->get_where('entries', ['entry_id' => $id])->row();
        $data['type'] = 'product';
        $this->load->view('includes/header',$data);
        $this->load->view('html/products/edit', ['product' => $product]);
        $this->load->view('includes/footer');
    }
    public function update($id){
        $products = new ProductsModel();
        $products->update_product($id);
        redirect(base_url('products'));
    }
    public function delete($id){
        
        $this->db->where('entry_id',$id);
        $this->db->delete('entries');
        redirect(base_url('products'));
    }

}
