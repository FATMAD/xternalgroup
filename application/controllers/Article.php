<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';


class Article extends BaseController
{
    /**
     * This is default constructor of the class
     */
public function __construct()
    {
     parent::__construct();
     $this->isLoggedIn();
     $this->load->model('categories_model');
     $this->load->model("article_model");
     $this->load->model('comments_model');     
     $this->load->model('user_model');  
     $this->load->model('media_model'); 
     $this->load->helper('text'); 
     $this->load->helper("form"); 
     $this->load->helper('url'); 
    }
    
 /**
     * This function used to load the first screen of the user
     */   
function index() {

        echo ("articles ");
        $data['media']=$this->article_model->getmediapost();
        var_dump( $data['media']);
        $data['nbre']=$this->article_model->countmdiapost();
        var_dump( $data['nbre']);
        $data['catmpost']=$this->categories_model->getpostcat();
        var_dump($data['catmpost']);

     
    }
//liste des articles 
function articlelisting(){

         if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {        
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            $this->load->library('pagination');
            $count = 10;
            $returns = $this->paginationCompress ( "userListing/", $count, 10 );
            $data ['articles'] =$this->article_model->read('*');
            //$data['userRecords'] = $this->user_model->userListing($searchText, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = 'Xternal groupe  : Articles Listing';
            $this->loadViews("post/posts", $this->global, $data, NULL);
        }
    }
//function  single view article 
function view_single_Article($post_id){
    echo "hello word ";

         if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {      
            $data['post'] = $this->article_model->get_post($post_id);
            var_dump($data['post']);
            $data['media']=$this->media_model->get_Media_post($post_id);
            var_dump($data['media']);
            $data['comments'] = $this->comments_model->get_comment($post_id);  
            var_dump($data['comments']); 
            $data['nbre_comments']=$this->comments_model->count_commt_post($post_id);
            echo ("nbre des commentaires :".$data['nbre_comments']);
            
            $this->global['pageTitle'] = 'Xternal groupe  : single***Article';
            $this->loadViews("post/single_Article", $this->global, $data, NULL);
        }
    }
    /******************************* Activeer les commentaires *********************************************/
    function commentaires_Activeted($comment_id){
    echo "hello COMMENT ";

         if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {      
            //$data['post'] = $this->article_model->get_post($post_id);
            //var_dump($data['post']);
          
            $data['comments'] = $this->comments_model->get_comment($post_id);  
            var_dump($data['comments']); 
            //$data['nbre_comments']=$this->comments_model->count_commt_post($post_id);
            //echo ("nbre des commentaires ".var_dump($data['nbre_comments']));
            
            $this->global['pageTitle'] = 'Xternal groupe  : single***Article';
            $this->loadViews("post/single_Article", $this->global, $data, NULL);
        }
    }

//function edit article     
function articledit(){
          if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {  
            $data['Category']=$this->categories_model->read('*');
            $this->global['pageTitle'] = 'Xternal Group : Add New ARTICLES';
            $this->loadViews("post/editpost", $this->global, $data, NULL);

        }  
}
// delete article 
function articldelete($id){
        $this->article_model->delete($id);
        redirect('/liste');
    }
// form add  article
function articleAdd(){

         if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {

            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->user_model->userListingCount($searchText);

            $returns = $this->paginationCompress ( "userListing/", $count, 10 );

            $data['type']=$this->article_model->getMediaType();
            //var_dump($data['type']);

            //$searchText = $this->security->xss_clean($this->input->post('searchText'));
            //$data['searchText'] = $searchText;

            //$data['type']=$this->article_model->getMediaType();
            $data['redecteurs']=$this->user_model->redecteur();
            //var_dump($data['redecteurs']);
            $data['users'] = $this->user_model->userListing($searchText, $returns["page"], $returns["segment"]);  
            $data['Category']=$this->categories_model->read('*');
            $data['nbre']=$this->article_model->countmdiapost();
                //var_dump( $data['nbre']);
            //var_dump($data['Category']);          
            $this->global['pageTitle'] = 'Xternal Group : Add New ARTICLES';
            $this->loadViews("post/addpost", $this->global, $data, NULL);
        }

      }

//function create article
function createart(){

        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|mp3|mp4';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('userfile')) {//If there is error when uploading file
                $error = array('error' => $this->upload->display_errors());
                 } 
               else {
                //echo("heloo world");
                 $data  = array('img' => $this->upload->data());
                 $data['nbre']=$this->article_model->countmdiapost();
                 $this->load->library('form_validation');
                 $userInfo = array(
                'user_id' =>$this->session->userdata('userId') , 
                'post_title' => $this->input->post('title'),
                'post' => $this->input->post('text'),
                'active' => 0,
                'img'  =>$data['img']['file_name'],
                'media'=>$data['nbre'],
                'category_id'=>$this->input->post('category_id'),
                'redecteur' =>$this->input->post('redecteur'),
                'slug' =>$this->input->post('slug'),
                'metadescription' =>$this->input->post('meta'),
                'metakeywords' =>$this->input->post('MetaKeyWords'),

                                );
                $this->load->model('article_model');
                $result=$this->article_model->create($userInfo);
                $data['article']=$this->article_model->read('*');
            //var_dump($data['article']);
                $this->global['pageTitle'] = 'Xternal groupe  : Articles Listing';
                $this->loadViews("post/posts", $this->global, $data, NULL);               
                
                 }         
        }
    }

//changer visibilité  d' une article 
function articleActiveted($act){
          if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($act==1){
                $act=0;
                echo "Activeter";

            }else{
                $act=1;
                 echo "Désactiver ";

            }

        }        

    }    


/*---------------------------------gestion des categories--------------------------------------- */

//add new category
function addCategorie()
{
               
    if ($this->isAdmin()==TRUE){
         $this->loadThis();


    } else {
         $this->global['pageTitle'] = 'Xternal Group : Add New ARTICLES';
        
        $this->loadViews("categories/addcat", $this->global, NULL , NULL);

}
//add category _ajax
function create_category_ajax(){



}

            }
//add category 
function createcat(){

        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {

            $this->load->helper('form');
            $this->load->library('form_validation');
            
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|mp3|mp4';
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('userfile')) {//If there is error when uploading file
                $error = array('error' => $this->upload->display_errors());
                 } 
               else {
                //echo("heloo world");
                $data  = array('img' => $this->upload->data());
                $this->load->library('form_validation');
            
                //$this->form_validation->set_rules('nom','nom','trim|required|max_length[128]');
                //if($this->form_validation->run() == FALSE)
                //{
                //$this->addNew();
                //}
                //else
                //{
                
                $nom = $this->input->post('nom');
                $image = $data['img']['file_name'] ;
                $description = $this->input->post('description');
                
                $userInfo = array('nom'=>$nom,  'img'=>$image, 'description'=> $description,);
                var_dump($userInfo);              
                $this->load->model('categories_model');
                $result=$this->categories_model->create_category($userInfo);
               $data['Category']=$this->categories_model->read('*');
               var_dump($data['Category']);
          
                redirect('addArt');
                
                /*if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New User created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                */
                
                 }
            //}
        //}
            
        }
    }

// edit category
function editcat()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $Id = $this->input->post('id');
            
            //$this->form_validation->set_rules('nom','nom','trim|required|max_length[128]');
            //$this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            //$this->form_validation->set_rules('password','Password','matches[cpassword]|max_length[20]');
            //$this->form_validation->set_rules('cpassword','Confirm Password','matches[password]|max_length[20]');
            //$this->form_validation->set_rules('role','Role','trim|required|numeric');
            //$this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
            
            //if($this->form_validation->run() == FALSE)
            //{
                //$this->editOld($userId);
           // }
            //else
            //{
                $nom = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $img = $this->security->xss_clean($this->input->post('email'));
                $description = $this->input->post('password');
                //$roleId = $this->input->post('role');
                $//mobile = $this->security->xss_clean($this->input->post('mobile'));
                
                $userInfo = array();
                
                if(empty($password))
                {
                    $userInfo = array('email'=>$email, 'roleId'=>$roleId, 'name'=>$name,
                                    'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                else
                {
                $userInfo = array('email'=>$email, 
                                   'password'=>getHashedPassword($password), 
                                   'roleId'=>$roleId,
                                   'name'=>ucwords($name), 
                                   'mobile'=>$mobile, 
                                   'updatedBy'=>$this->vendorId, 
                                   'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                $result = $this->user_model->editUser($userInfo, $userId);
                if($result == true)
                {
                    $this->session->set_flashdata('success', 'User updated successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User updation failed');
                }
                
                redirect('userListing');
            }
    }


//listing categories

function categories()
    {

    if ($this->isAdmin()==TRUE){
         $this->loadThis();


    } else {


             $searchText = $this->security->xss_clean($this->input->post('searchText'));
             $data['searchText'] = $searchText;
            
             $this->load->library('pagination');
             $count = 10;
             $returns = $this->paginationCompress ( "userListing/", $count, 10 );
             //$data ['articles'] =$this->article_model->read('*');
            //$data['userRecords'] = $this->user_model->userListing($searchText, $returns["page"], $returns["segment"]);
             $data['category']=$this->categories_model->read('*');
             $this->global['pageTitle'] = 'Xternal Group : liste des Categories';
             $this->loadViews("categories/categories", $this->global,$data , NULL);


            }
    }


    
//liste des  post par categories 
function categoriearticle(){
        echo ("liste des articles de base de donnees ");

    }

//gestion des categories

function categoriesListe(){

        $data['Category']=$this->categories_model->read('*');
        var_dump($data['Category']);
        $this->global['pageTitle'] = 'Xternal groupe  : Articles Listing';

         $this->loadViews("post/addpost", $this->global, $data, NULL);
    }
//Delete category
function categoriesdelete(){

        echo "liste des categories ";
    }

}

?>
    
   