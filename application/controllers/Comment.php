<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Comment extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('comments_model');  
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
      /*******************************LISTING COMMENTS BY USERS AND ARTICLES********************************************/
    public function index() {

         //$searchText = $this->security->xss_clean($this->input->post('searchText'));
        //$data['searchText'] = $searchText;
        $this->load->library('pagination');
        $count = 5;
        $this->paginationCompress ( "index/", $count, 10 );
        //echo ("liste des commntaires ");
        $data['comments'] = $this->comments_model->get_comments();  
        var_dump($data['comments']); 
        $this->global['pageTitle'] = 'xternal groupe : lsite des commentaires ';
        
        $this->loadViews("comment/comments", $this->global, $data , NULL);
    }

    /*******************************LISTING COMMENTS  ARTICLES*****************************************************/
    function listing_Comments_article(){

        echo ("liste des commntaires ");
    }

    /******************************* Activeted comments **************************************************************/
    function commentaires_Activeted($comment_id){
    
         if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {      
            
          $data =array(
                   
                        'etat'=>1,
                );
         
            $this->comments_model->update_Comment($comment_id, $data);
             
            redirect('Comment/');
           
        }
        }

        /******************************* DELETE comments **************************************************************/

        function delete_comment($comment_id){
            if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {      
            
            $this->comments_model->delete_comment($comment_id);
            echo("is deleteted ");
             
            redirect('Comment/');
           
        }
        }



        


}

?>