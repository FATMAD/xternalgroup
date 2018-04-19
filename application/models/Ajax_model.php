<?php
class Ajax_model extends CI_Model{
 
    function cat_list(){
        $hasil=$this->db->get('categories');
        return $hasil->result();
    }
 
    function save_Cat(){
        $data = array(
                 'id'        =>'',
                'nom'  => $this->input->post('product_code'), 
                'img'  => $this->input->post('image'), 
                'description' => $this->input->post('description'), 
            );
        $result=$this->db->insert('categories',$data);
        return $result;
    }
 
   /* function update_Cat(){
        $product_code=$this->input->post('product_code');
        $product_name=$this->input->post('product_name');
        $product_price=$this->input->post('price');
 
        $this->db->set('product_name', $product_name);
        $this->db->set('product_price', $product_price);
        $this->db->where('product_code', $product_code);
        $result=$this->db->update('product');
        return $result;
    }
 
    function delete_Cat(){
        $product_code=$this->input->post('product_code');
        $this->db->where('product_code', $product_code);
        $result=$this->db->delete('product');
        return $result;
    }*/
     
}