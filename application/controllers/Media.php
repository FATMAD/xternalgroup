<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Media extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn(); 
        $this->load->model('media_model'); 
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index() {
        $this->load->library('pagination');
        $count = 5;
        $this->paginationCompress ( "index/", $count, 10 );
        //echo ("liste des commntaires ");
        $data['ALL_media'] = $this->media_model->get_Media(); 
        echo("all media:"); 
        var_dump($data['ALL_media']);

        $data['media'] = $this->media_model->get_Media_upl(); 
        echo("<h1>All media /upload :</h2>");
        //var_dump($data['media']);
        var_dump($data['media']); 

        echo("media/image");
        $data['image']=$this->media_model->get_Media_Image();
        var_dump($data['image']);


       echo("media/AUDIO");
        $data['image']=$this->media_model->get_Media_Audio();
        var_dump($data['image']);
        echo("media/AUDIO");
        $data['image']=$this->media_model->get_Media_Vedio();
        var_dump($data['image']);

     
        $this->global['pageTitle'] = 'xternal : Bibliothéque';
        
        $this->loadViews("media/medias", $this->global, NULL , NULL);
    }


    function listing_media ()
    {





    }
    
}

?>
    
   