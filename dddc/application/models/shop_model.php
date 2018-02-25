<?php
class Shop_model extends CI_Model {

	public function get_index()
	{   
		$query = $this->db->query("SELECT goodsinfo.type,sum(goodsinfo.f),min(goodsinfo.price),min(shopship_info.land_date),goodsinfo.fishid,fishinfo.imgurl FROM goodsinfo,shopship_info,fishinfo  WHERE goodsinfo.b_shipid = shopship_info.b_shipid  AND goodsinfo.stock!=0  AND fishinfo.fishid=goodsinfo.fishid group by goodsinfo.type,goodsinfo.fishid,fishinfo.imgurl ");
		
		return $query->result_array();
	} 

	public function get_detail($fishid)
	{   
		$query = $this->db->query("SELECT goodsinfo.*,land_date FROM goodsinfo,shopship_info WHERE goodsinfo.fishid='$fishid' AND goodsinfo.b_shipid=shopship_info.b_shipid AND goodsinfo.stock!=0");
		
		return $query->result_array();
	} 
	
	// public function get_onsale(){
	// 	$query = $this->db->query("SELECT sum() FROM fishinfo ");
	// 	return $query->result_array();
	// }   

	// public function mt_item($mt_id){

	// 	$query = $this->db->query("SELECT * FROM yjl WHERE location='$mt_id'");
	// 	return $query->result_array();
	// }   

	// public function xiangqing($num){
	// 	$query = $this->db->query("SELECT * FROM yjl WHERE num='$num'");
	// 	return $query->result_array();
	// }   
}