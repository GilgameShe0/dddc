<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dcby extends CI_Controller {
    
    public function __construct()
	{
		parent::__construct();
		$this->load->model('dcby_model');
		$this->load->library('session');
		$openid = "qs12edq2sqryh";
		$this->session->set_userdata("openid",$openid);
	}

	public function search_ajax()
	{
		$matou =$this->input->post('matou');
		$date = $this->input->post('date');
        $type = $this->input->post('type');
		$newdata = array(
			'matou' => $matou,
			'date' => $date,
			'type' => $type
		);
		// var_dump($newdata);
		// exit();
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
		$type = $_SESSION['type'];
	    $date = $_SESSION['date'];
		// echo $type;
		// exit();
		$ship_data['ship_info'] = $this->dcby_model->get_ships($matou,$type);
		// var_dump($ship_data);
		// exit();
		$ship_data['date'] = $date;
		$ship_data['matou'] = $matou;
		$this->load->view('dcby/shiplist',$ship_data,$date);
	}

	public function shipinfo_view(){
		$shipid = $this->input->get('shipid');
		$ship_data['ship_info'] = $this->dcby_model->get_ships_byid($shipid);
		// var_dump($ship_data);
		// exit();
		$this->load->view('dcby/shipdetails.php',$ship_data);
	}

	public function checkinfo_view(){

	$shipid = $this->input->get('shipid');
	$ship_data['ship_info'] = $this->dcby_model->get_ships_byid($shipid);
	foreach ($ship_data['ship_info'] as $row)
	{	
		$ship_data['shipid'] = $row['shipid'];
	    $ship_data['price'] = $row['price'];
	}
	$matou = $_SESSION['matou'];
	$date = $_SESSION['date'];
	$ship_data['matou'] = $matou;
	$ship_data['start_date'] = $date;
	$this->load->view('dcby/checkinfo.php',$ship_data);
	}


}
