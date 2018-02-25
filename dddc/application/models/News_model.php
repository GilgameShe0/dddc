<?php
class News_model extends CI_Model {

	public function get_news()
	{
	    $query = $this->db->get("yjl");
	    return $query->result_array();
	} 
	
	public function sort_item(){
		$query = $this->db->query('SELECT * FROM yjl ORDER BY price');
		return $query->result_array();
	}   

	public function mt_item($mt_id){

		$query = $this->db->query("SELECT * FROM yjl WHERE location='$mt_id'");
		return $query->result_array();
	}   

	public function xiangqing($num){
		$query = $this->db->query("SELECT * FROM yjl WHERE num='$num'");
		return $query->result_array();
	}   
}