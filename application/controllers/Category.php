<?php
class Category extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('ajax_model');
    }
    function index(){
        $this->load->view('product_view');
    }
 
    function categories_data(){
        $data=$this->product_model->product_list();
        echo json_encode($data);
    }
 
    function save(){


        $data=$this->ajax_model->save_Cat($data);
        echo json_encode($data);

    }
 
    function update(){
        $data=$this->product_model->update_product();
        echo json_encode($data);
    }
 
    function delete(){
        $data=$this->product_model->delete_product();
        echo json_encode($data);
    }
 
}