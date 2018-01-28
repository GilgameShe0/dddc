<?php
class List_model extends CI_Model {
	
	// 按码头搜索船
	public function get_ships($matou,$date)
	{
	    $query = $this->db->query("SELECT * FROM shipinfo WHERE location = '$matou'");
	    return $query->result_array();
	} 

	// 按日期搜索船
	public function check_list(){

	}

	public function get_ships_byid($shipid){
 		$query = $this->db->query("SELECT * FROM shipinfo WHERE shipid = '$shipid'");
 		return $query->result_array();
	}
	  
}
?>