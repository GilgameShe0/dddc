<?php
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