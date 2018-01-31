<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('list_model');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('dddc/index.php');
	}
	public function search_ajax()
	{
		$matou = $this->input->post('matou');
		$date = $this->input->post('date');
		$renshu = $this->input->post('renshu');

		$newdata = array(
			'matou' => $matou,
			'date' => $date,
			'renshu' => $renshu
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
		$matou = $_SESSION['matou'];
		$date = $_SESSION['date'];
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
		$matou = $_SESSION['matou'];
		$ship_data['matou'] = $matou;
		$this->load->view('dddc/checkinfo.php');
	}

}
