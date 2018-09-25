<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	 {
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('loginmodel');

		 }


	public function index()
	{
		$data['res']=$this->loginmodel->view_news_feed();
		$this->load->view('header');
		$this->load->view('index',$data);
		$this->load->view('footer');
	}
	public function about_us()
	{
		$this->load->view('header');
		$this->load->view('about_us');
		$this->load->view('footer');
	}

	public function event()
	{
		$data['res']=$this->loginmodel->get_all_event_gallery();
		$this->load->view('header');
		$this->load->view('event',$data);
		$this->load->view('footer');
	}
	public function gallery_view()
	{
		$ev_id=$this->uri->segment(2);
		$data['res']=$this->loginmodel->view_event_gallery($ev_id);
		$data['res_title']=$this->loginmodel->get_event_name($ev_id);
		$this->load->view('header');
		$this->load->view('gallery',$data);
		$this->load->view('footer');
	}


	public function contact()
	{
		$this->load->view('header');
		$this->load->view('contact');
		$this->load->view('footer');
	}
}
