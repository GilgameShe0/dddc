<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ms extends CI_Controller {
/*****************舟山民宿************************/
	
    public function __construct()
	{
		parent::__construct();
		$this->load->model('ms_model');
		$this->load->library('session');
		$openid = "qs12edq2sqryh";
		$this->session->set_userdata("openid",$openid);
	}

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
}