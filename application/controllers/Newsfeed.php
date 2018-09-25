<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newsfeed extends CI_Controller {

	function __construct()
	 {
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('newsfeedmodel');

		 }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function home()
	{
		$data=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('user_type');
		if($user_role=='1'){
			$this->load->view('admin/admin_header');
			$this->load->view('admin/newsfeed/create');
			$this->load->view('admin/admin_footer');
		}else{
			redirect('adminlogin/login');
		}

	}
	public function view()
	{
		$data=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('user_type');
		if($user_role=='1'){
			$data['res']=$this->newsfeedmodel->view_newsfeed();
			$this->load->view('admin/admin_header');
			$this->load->view('admin/newsfeed/view',$data);
			$this->load->view('admin/admin_footer');
		}else{
			redirect('adminlogin/login');
		}
	}


	public function get_newsfeed()
	{
		$data=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('user_type');
		if($user_role=='1'){
			$newfeed_id=$this->uri->segment(3);
			$data['res']=$this->newsfeedmodel->get_newsfeed($newfeed_id);
			$this->load->view('admin/admin_header');
			$this->load->view('admin/newsfeed/edit',$data);
			$this->load->view('admin/admin_footer');
		}else{
			redirect('adminlogin/login');
		}
	}


	public function create(){
		$data=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('user_type');
		if($user_role=='1'){
			 $title=$this->db->escape_str($this->input->post('title'));
			 $description=$this->db->escape_str($this->input->post('description'));
			 $status=$this->db->escape_str($this->input->post('status'));
			 $data=$this->newsfeedmodel->create_newsfeed($title,$description,$status,$user_id);
		}else{

		}
	}

	public function update_newsfeed(){
		$data=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('user_type');
		if($user_role=='1'){
			 $title=$this->db->escape_str($this->input->post('title'));
			 $newsfeed_id=$this->db->escape_str($this->input->post('newsfeed_id'));
			 $description=$this->db->escape_str($this->input->post('description'));
			 $status=$this->db->escape_str($this->input->post('status'));
			 $data=$this->newsfeedmodel->update_newsfeed($title,$description,$status,$newsfeed_id,$user_id);
		}else{

		}
	}

	public function exist_title(){
		$title=$this->db->escape_str($this->input->post('title'));
		$data=$this->newsfeedmodel->exist_title($title);
	}

	public function exist_title_check(){
		$title=$this->db->escape_str($this->input->post('title'));
		$newfeed_id=$this->uri->segment(3);
		$data=$this->newsfeedmodel->exist_title_check($title,$newfeed_id);
	}


}
