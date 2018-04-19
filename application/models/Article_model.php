<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends  MY_Model
{
   
public $table = "posts";
//public $table = "type";


public function createArt($data){
       $this->db->insert('posts',$data);
        return $this->db->insert_id();
      
      //return $this->db->insert('categories', $data);
    }
  function get_post($post_id){

        $this->db->select('*');
        $this->db->from('posts');
        //$this->db->join('tbl_users','tbl_users.userId = comments.user_id', 'left');
        $this->db->where('post_id',$post_id);
        $this->db->order_by('date_added','asc');
        $query = $this->db->get();
        return $query->result_array();
    }
 function getMediaType()
    {
        $this->db->select('*');
        $this->db->from('type');
        //$this->db->where('roleId !=', 1);
        $query = $this->db->get();
        
        return $query->result();
    }

    function getMedia(){

    	$this->db->select('	*');
    	$this->db->form('media');
    	$query=$this->db->get();
    	return $query->result();

    } 
     function createMedia(){

     	$this->db->trans_start();
        $this->db->insert('media', $userInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        
    } 

    function getmediapost(){


        $this->db->select('*');
        $this->db->from('media');
        $this->db->join('posts', 'posts.post_id = media.post','left');
        //$this->db->where('BaseTbl.isDeleted', 0);
        //$this->db->where('BaseTbl.roleId =', 4);
        $query = $this->db->get();
        //return count($query->result());
        
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