<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminlogin extends CI_Controller {

	function __construct()
	 {
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('loginmodel');

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
			$data['res_news']=$this->loginmodel->count_newsfeed();
			$data['res_gallery']=$this->loginmodel->count_gallery();
			$data['res_contact']=$this->loginmodel->count_contact();


			$this->load->view('admin/admin_header');
			$this->load->view('admin/dashboard',$data);
			$this->load->view('admin/admin_footer');
		}else{
			redirect('/');
		}
	}
	public function change_password()
	{
		$data=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('user_type');
		if($user_role=='1'){
			$this->load->view('admin/admin_header');
			$this->load->view('admin/password_update');
			$this->load->view('admin/admin_footer');
		}else{
			redirect('/');
		}
	}

	public function checkpassword(){
			$data=$this->session->userdata();
			$user_id=$this->session->userdata('id');
			$user_role=$this->session->userdata('user_type');
			$password=md5($this->input->post('currentpassword'));
			$data=$this->loginmodel->checkpassword($password,$user_id);
		}


		public function updatepassword(){
			$data=$this->session->userdata();
			$user_id=$this->session->userdata('id');
			$user_role=$this->session->userdata('user_type');
			if($user_role=='1'){
			 $password=md5($this->input->post('newpassword'));
			 $data=$this->loginmodel->updatepassword($password,$user_id);
			}else{
				redirect('/');
			}
		}

		public function contact_enquired(){
			$data=$this->session->userdata();
			$user_id=$this->session->userdata('id');
			$user_role=$this->session->userdata('user_type');
			if($user_role=='1'){
			 $data['res']=$this->loginmodel->contact_form_enquired();
			 $this->load->view('admin/admin_header');
			 $this->load->view('admin/contact_form_enquired',$data);
			 $this->load->view('admin/admin_footer');
			}else{
				redirect('/');
			}
		}

		public function login()
		{
			$this->load->view('login');
		}

		public function check_login(){
			 $user_name=$this->input->post('user_name');
			$password=md5($this->input->post('password'));
			$data=$this->loginmodel->login($user_name,$password);
			echo $data['status'];
		}


		public function contact_us(){
			$name=$this->db->escape_str($this->input->post('name'));
			$phone=$this->db->escape_str($this->input->post('phone'));
			$message=$this->db->escape_str($this->input->post('message'));
			$subject=$this->db->escape_str($this->input->post('subject'));
			$data=$this->loginmodel->contact_us($name,$phone,$subject,$message);

		}
		public function logout(){
			$datas=$this->session->userdata();
			$this->session->unset_userdata($datas);
			$this->session->sess_destroy();
			redirect('/');
		}
}
