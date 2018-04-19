
    <?php if(!defined('BASEPATH')) exit('No direct script access allowed');

	class Comments_model extends MY_Model{
		public $table = "comments";
		
    function add_comment($data)
    {
        $this->db->insert('comments',$data);
        return $this->db->insert_id();
    }
    function get_comments()
    {
        $this->db->select('comments.*,tbl_users.name,tbl_users.image,posts.post_title');
        $this->db->from('comments');
        $this->db->join('tbl_users','tbl_users.userId = comments.user_id', 'left');
        $this->db->join('posts','posts.post_id = comments.post_id', 'left');
        //$this->db->where('post_id',$post_id);
        $this->db->order_by('date_added','asc');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_comment($post_id)
    {
        $this->db->select('comments.*,tbl_users.name');
        $this->db->from('comments');
        $this->db->join('tbl_users','tbl_users.userId = comments.user_id', 'left');
        $this->db->where('post_id',$post_id);
        $this->db->order_by('date_added','asc');
        $query = $this->db->get();
        return $query->result_array();
    }
    //nbre des commentaire par post et par user
    function count_com_post_user($post_id){
    	$this->db->select('comments.*,tbl_users.name');
        $this->db->from('comments');
        $this->db->join('tbl_users','tbl_users.userId = comments.user_id', 'left');
        $this->db->where('post_id',$post_id);
        $this->db->order_by('date_added','asc');
        $query = $this->db->get();
        return count($query->result_array());


    }
    
    //nbre des comments par post 
    function count_commt_post($post_id){
    	$this->db->select('comments.*');
        $this->db->from('comments');
        //$this->db->join('tbl_users','tbl_users.userId = comments.user_id', 'left');
        $this->db->where('post_id',$post_id);
        $this->db->order_by('date_added','asc');
        $query = $this->db->get();
        return count($query->result_array());


    }
    //liste des commentaire desactiver 

    function commt_post($post_id){
    	$this->db->select('comments.*');
        $this->db->from('comments');
        //$this->db->join('tbl_users','tbl_users.userId = comments.user_id', 'left');
        $this->db->where('post_id',$post_id);
        $this->db->order_by('date_added','asc');
        $query = $this->db->get();
        return count($query->result_array());
    }


    function activer($id, $data)
    {
        $this->db->where('comment_id',$id);
        $this->db->update('comments',$data);
    }


     function update_Comment($comment_id, $data)
    {
        $this->db->where('comment_id',$comment_id);
        $this->db->update('comments',$data);
    }
    
    function delete_comment($comment_id)
    {
        $this->db->where('comment_id',$comment_id);
        $this->db->delete('comments');
    }



	

		 


	}

