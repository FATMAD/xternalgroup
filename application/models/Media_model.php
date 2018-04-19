<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Media_model extends  MY_Model
{
   
public $table = "media";
//public $table = "type";



function getMediaType()
    {
        $this->db->select('*');
        $this->db->from('type');
        //$this->db->where('roleId !=', 1);
        $query = $this->db->get();
        
        return $query->result();
    }

   function get_Media_upl(){

        $this->db->select(' *');
        $this->db->from('media');
        $this->db->where('source ',0);
        //$this->db->where('BaseTbl.roleId =', 4);
        $query=$this->db->get();
        return $query->result();

    }  
      //$this->db->where('BaseTbl.isDeleted', 0);
        //$this->db->where('BaseTbl.roleId =', 4);
        //$query = $this->db->get(); 

    function get_Media(){

    	$this->db->select('	*');
    	$this->db->from('media');
    	$query=$this->db->get();
    	return $query->result();

    } 

    function createMedia(){

     	$this->db->trans_start();
        $this->db->insert('media', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        
    } 

/********************listing Image *************************************/  

function get_Media_Image(){


        $this->db->select('*,type.type');
        $this->db->from('media as image ');
        $this->db->join('type', 'type.id_type = image.type','left');
        $this->db->where('image.type=', 3);
         $this->db->where('image.source', 0);
    
        $query = $this->db->get();
      
        
        return $query->result();


    }
 /********************listing audio *************************************/   
function get_Media_Audio(){


        $this->db->select('*,type.type');
        $this->db->from('media as audio');
        $this->db->join('type', 'type.id_type = audio.type','left');
        $this->db->where('audio.type=', 1);
         $this->db->where('audio.source', 0);
    
        $query = $this->db->get();
      
        
        return $query->result();


    } 
/********************listing Védio *************************************/  
 function get_Media_Vedio(){

        $this->db->select('*,type.type');
        $this->db->from('media as vedio');
        $this->db->join('type', 'type.id_type = vedio.type','left');
        $this->db->where('vedio.type=', 2);
        $this->db->where('vedio.source', 0);
    
        $query = $this->db->get();
      
        
        return $query->result();


    }    
function get_Media_post($post_id){
        $this->db->select('*');
        $this->db->from('media');
        $this->db->join('posts', 'posts.post_id = media.post','left');
        $this->db->where('post',$post_id);
        $query = $this->db->get();
        $query->result();
        return $query->result();
    
}    
//nbre des media par post
function countmdiapost(){
  //count(getmediapost());
  $this->db->select('*');
        $this->db->from('media');
        $this->db->join('posts', 'posts.post_id = media.post','left');
        $query = $this->db->get();
        $query->result();
        return count($query->result());
    
}


}
