<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Model extends CI_Model{


//create   
  public function create($options=array(),$functions=array()){
    if (empty($options) && empty($functions)) {
      return false;
    }
    return (bool) $this->db->set($options)->set($functions,null,false)->insert($this->table);
  }
  //read
  public function read($select = '*', $where = array(), $nb = null, $debut = null){
    return $this->db->select($select)
                    ->from($this->table)
                    ->where($where)
                    ->limit($nb, $debut)
                    ->get()
                    ->result();
  }
//update
public function update($where, $options_echappees = array(), $options_non_echappees = array()){
  if(empty($options_echappees) AND empty($options_non_echappees)) {  return false; } 
  if(is_integer($where)) {  $where = array('id' => $where); } 
  $this->db->set($options_echappees)->set($options_non_echappees, null, false)->where($where)->update($this->table); 
  $where = array_merge($where, $options_echappees, $options_echappees);
  return (bool) $this->db->where($where)->from($this->table)->count_all_results();
}
//delete
public function delete($where) { 
  if(is_integer($where)) {  $where = array('id' => $where); }
  return (bool) $this->db->where($where)->delete($this->table); 
}
//count
public function count($champ = array(), $valeur = null)
{ 
  return (int) $this->db->where($champ, $valeur)->from($this->table)->count_all_results(); 
}
//is_existant
public function is_existant($key=null,$value=null)
{
  if ($key==null || $value==null) {
    return false;
  }
  $where  = array($key => $value);
  $result = array();
  $result = $this->db->select('*')
                     ->from($this->table)
                     ->where($where)
                     ->get()
                     ->result();
  if (count($result)>0) {
    return true;
  }
  return false;
}
}
?>
