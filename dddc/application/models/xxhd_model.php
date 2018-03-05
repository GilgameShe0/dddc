<?php
class xxhd_model extends CI_Model {
	public function get_ships($matou,$type)
	{
	    $query = $this->db->query("SELECT * FROM shipinfo WHERE location = '$matou' AND type='$type'");
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