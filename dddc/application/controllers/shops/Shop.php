<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('shop_model');
        $this->load->helper('url_helper');
    }
	public function index()
	{   
		$data['news_item'] = $this->shop_model->get_index();
    //     var_dump($data);
    // exit();

        if (empty($data['news_item']))
        {
            show_404();
        }
        $this->load->view('fishshop/index',$data);
    

	}
    
    public function detail()
    {   
    	$fishid = $this->input->get('fishid');
        $min_price=$this->input->get('min_price');
        $type=$this->input->get('type');
        $data['news_item'] = $this->shop_model->get_detail($fishid);
        $data['min_price']=$min_price;
        $data['type']=$type;

        if (empty($data['news_item']))
        {
            show_404();
        }
  //       $data = array('num1' => 1, 'num2' => 2, 'op' => +, 'result' => 3);  
		// var_dump($data);
  //       exit();
        $this->load->view('fishshop/detail',$data);
	}

}