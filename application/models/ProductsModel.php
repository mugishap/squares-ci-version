<?php

class ProductsModel extends CI_Model
{

    public function get_products()
    {
        if (!empty($this->input->get("search"))) {
            $this->db->like('title', $this->input->get("search"));
            $this->db->or_like('description', $this->input->get("search"));
            
        }
        $query = $this->db->get("entries");
        return $query->result();
    }


    public function insert_product()
    {
        if (!empty(trim($this->input->post("title"))) || !empty(trim($this->input->post("description"))) || !empty(trim($this->input->post("amount"))) || !empty(trim($this->input->post("price")))) {
        $data = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price'),
            'amount' => $this->input->post('amount')
        ];
        return $this->db->insert('entries', $data);
    }
    }
    public function update_product($id)
    {
        if (!empty(trim($this->input->post("title"))) || !empty(trim($this->input->post("description"))) || !empty(trim($this->input->post("amount"))) || !empty(trim($this->input->post("price")))) {
            $data=[
                'title'=>$this->input->post('title'),
                'description'=>$this->input->post('description'),
                'price'=>$this->input->post('price'),
                'amount'=>$this->input->post('amount')
            ];
            if($id=='entry_id'){
                return$this->db->insert('entries',$data);
            }else{
                $this->db->where('entry_id',$id);
                return$this->db->update('entries',$data);
            } 
        }       
    }
}
