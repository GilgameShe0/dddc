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

	// 查找酒店
	public function get_hotels()
	{
	    $query = $this->db->query("SELECT hotel_name,hotelimg,address,location,hotelid,cook_price,(b_price+d_price-abs(b_price-d_price))/2 FROM hotelinfo");
	    return $query->result_array();
	}

	public function get_hotels_byid($hotelid){
 		$query = $this->db->query("SELECT * FROM hotelinfo WHERE hotelid = '$hotelid'");
 		return $query->result_array();
	}

	public function get_rooms_byid($hotelid){
 		$query = $this->db->query("SELECT * FROM roominfo WHERE hotelid = '$hotelid'");
 		return $query->result_array();
	}
	  
}
?>