<?php
class News extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper('url_helper');
    }
    public function view()
    {
        $data['news_item'] = $this->news_model->get_news();

        if (empty($data['news_item']))
        {
            show_404();
        }
        $this->load->view('news/hotellist', $data);
    }
    public function view_sort()
    {   
        $mt_id = $this->input->get('mt_id');
        $data['news_item'] = $this->news_model->mt_item($mt_id);
        if (empty($data['news_item']))
        {
            show_404();
        }
        $this->load->view('news/hotellist', $data);
    }
    public function xiangqing()
    {
        $num = $this->input->get('num');
        $data['new_item']=$this->news_model->xiangqing($num);
        // if (empty($data['news_item']))
        // {
        //     show_404();
        // }
        // $this->load->view('news/hote_xiangqing', $data);
        var_dump($data);
    }
}