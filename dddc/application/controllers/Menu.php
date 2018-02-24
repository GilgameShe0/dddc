<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('list_model');
		$this->load->library('session');
		$openid = "qs12edq2sqryh";
		$this->session->set_userdata("openid",$openid);
	}

	public function index()  //显示主页
	{
		$this->load->view('dddc/index.php');
	}

	public function dcby()   //显示租船捕鱼入口
	{
		$this->load->view('dddc/dcby.php');
	}

	public function xxhd()   //显示休闲海钓入口
	{
		$this->load->view('dddc/xxhd.php');
	}

	public function fishshop()   //显示鱼商城入口
	{
		$this->load->view('fishshop/index.php');
	}

	public function search_ajax()
	{
		$matou = $this->input->post('matou');
		$date = $this->input->post('date');
		
		$newdata = array(
			'matou' => $matou,
			'date' => $date,
		);
		$this->session->set_userdata($newdata);
		if($newdata){
			$back = array(
			'state' => 1,
			'msg' => 'ok' 
			);
		};
		echo json_encode($back);
		exit; 
	}
	public function search_list()
	{
		$matou = $this->input->get('matou');
		$date = $this->input->get('date');
		$ship_data['ship_info'] = $this->list_model->get_ships($matou,$date);
		$ship_data['date'] = $date;
		$ship_data['matou'] = $matou;
		$this->load->view('dddc/shiplist.php',$ship_data,$date);
	}

	public function shipinfo_view(){
		$shipid = $this->input->get('shipid');
		$ship_data['ship_info'] = $this->list_model->get_ships_byid($shipid);
		// var_dump($ship_data);
		// exit();
		$this->load->view('dddc/shipdetails.php',$ship_data);
	}

	// 提交订单数据
	function checkinfo_view(){

		$shipid = $this->input->get('shipid');
		$ship_data['ship_info'] = $this->list_model->get_ships_byid($shipid);
		foreach ($ship_data['ship_info'] as $row)
		{	
			$ship_data['shipid'] = $row['shipid'];
		    $ship_data['price'] = $row['price'];
		}
		$matou = $_SESSION['matou'];
		$date = $_SESSION['date'];
		$ship_data['matou'] = $matou;
		$ship_data['start_date'] = $date;
		$this->load->view('dddc/checkinfo.php',$ship_data);
	}

	/*****************舟山民宿************************/
	public function yjl()   //显示渔家乐入口
	{
		$hotel_data['hotel_info'] = $this->list_model->get_hotels();
		$this->load->view('yjl/yjllist.php',$hotel_data);
	}

	public function hotel_detail()  //具体酒店信息
	{
		$hotelid = $this->input->get('hotelid');
		$hotel_data['hotel_info'] = $this->list_model->get_hotels_byid($hotelid);
		$hotel_data['room_info'] = $this->list_model->get_rooms_byid($hotelid);
		$this->load->view('yjl/yjldetail.php',$hotel_data);
	}
	public function time_ajax() //住店时间存入session
	{
		$time_date = array(
			'startDate' => $this->input->post('startDate'),
			'endDate' => $this->input->post('endDate'),
			'NumDate' => $this->input->post('NumDate')
		);
		$this->session->set_userdata($time_date);
		var_dump($time_date);
		if($time_date){
			$data = array(
			'state' => '1',
			'msg' => 'ok' 
			);
			echo json_encode($data);
			exit(); 
		};	
	}
	public function hotel_ajax()   //ajax传入订单信息
	{
		$hotel_order = array(
			'hotelid' => $this->input->post('hotelid'),
			'roomtype' => $this->input->post('roomtype'),
			'roomprice' => $this->input->post('roomprice'),
			'hotel_name' => $this->input->post('hotel_name')
		);
		$this->session->set_userdata($hotel_order);  //订单信息存入session缓存

		if($hotel_order){
			$data = array(
			'state' => '1',
			'msg' => 'ok' 
			);
			echo json_encode($data);
			exit(); 
		};
	}
	
	public function order_view()  //显示订单页面
	{
		// 从session中取出
		$order_data['order_info'] = array(
			'hotelid' => $_SESSION['hotelid'],
			'roomtype' => $_SESSION['roomtype'],
			'roomprice' => $_SESSION['roomprice'],
			'startDate' => $_SESSION['startDate'],
			'endDate' => $_SESSION['endDate'],
			'NumDate' => $_SESSION['NumDate'],
			'hotel_name' => $_SESSION['hotel_name']
		);
		$this->load->view('yjl/order.php',$order_data);
	}

	public function order_submit() //将订单信息存入数据库表
	{
		// 生成订单号
		$openid = $_SESSION['openid'];
		$orderid = strtotime ("now").substr($openid , 0 , 5);
		$order_info = array(
			'orderid' => $orderid,
			'openid' => $openid,
			'hotelid' => $_SESSION['hotelid'],
			'hotelname' => $_SESSION['hotel_name'],
			'roomtype' => $_SESSION['roomtype'],
			'startDate' => $_SESSION['startDate'],
			'endDate' => $_SESSION['endDate'],
			'NumDate' => $_SESSION['NumDate'],
			'name' => $this->input->post('name'),
			'mobile' => $this->input->post('mobile'),
			'roomprice' => $_SESSION['roomprice'],
			'total_price' =>$this->input->post('total_price'),
			'now_date' => date('Y-m-d H:i:s')
		);
		$this->db->insert('hotel_order', $order_info);


		$query = $this->db->query("SELECT total_price,orderid FROM hotel_order WHERE orderid = '$orderid'");
		$price_info = $query->result_array();
		if($price_info){
			$data = array(
				'state' => '1',
				'msg' => $price_info['0']['total_price'],
				'orderid' => $price_info['0']['orderid']
			);
			echo json_encode($data);
			exit;
		}else{
			$data = array(
				'state' => '0',
				'msg' => '提交失败请重试！'
			);
			echo json_encode($data);
			exit;
		}	
	}
	public function pay_order()   //确认支付页面
	{
		$orderid = $this->input->post('orderid');
		$mark = $this->input->post('mark');
		$order_info = array(
			'is_pay' => $mark
		);
		$where = "orderid = '$orderid'";
		$this->db->update('hotel_order',$order_info,$where);
		$data = array(
				'state' => '1',
				'msg' => '支付成功！'
			);
		echo json_encode($data);
		exit;
	}
	public function orderlist(){
		echo "支付成功！";
		$openid = $_SESSION['openid'];
		$query = $this->db->query("SELECT * FROM hotel_order WHERE openid = '$openid'");
		$query = $query->result_array();
		var_dump($query);
	}

	public function test(){
		$openid = $_SESSION['openid'];
		$orderid = strtotime ("now").substr($openid , 0 , 5);
		echo $orderid;
	}

	/*********************舟山民宿**********************/

	/****用户登录*****/

}
