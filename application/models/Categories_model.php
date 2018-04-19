
    <?php if(!defined('BASEPATH')) exit('No direct script access allowed');

	class Categories_model extends MY_Model{
		public $table = "categories";
		
	public function get_categories(){
			$this->db->order_by('nom');
			$query = $this->db->get('categories');
			return $query->result_array();
		}

	public function create_category($data){
			 $this->db->insert('categories',$data);
        return $this->db->insert_id();
			
			//return $this->db->insert('categories', $data);
		}
		
function update_category($id, $data)
    {
        $this->db->where('id',$id);
        $this->db->update('categories',$data);
    }

 function get_category($id){
			$query = $this->db->get_where('categories', array('id' => $id));
			return $query->row();
		}

function delete_category($id){
			$this->db->where('id', $id);
			$this->db->delete('categories');
			return true;
		}
function getpostcat(){


        $this->db->select('*');
        $this->db->from('posts');
        $this->db->join('categories', 'categories.id = posts.category_id','left');
        //$this->db->where('BaseTbl.isDeleted', 0);
        //$this->db->where('BaseTbl.roleId =', 4);
        $query = $this->db->get();
        
        return $query->result();


    }


		 //$this->load->model('category_model', 'category');
	    //$categories = $this->category->read();
	}

