<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventgallery extends CI_Controller {

	function __construct()
	 {
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('eventgallerymodel');

		 }


	public function home()
	{
		$data=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('user_type');
		if($user_role=='1'){
			$this->load->view('admin/admin_header');
			$this->load->view('admin/gallery/create');
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
			$data['res']=$this->eventgallerymodel->view_event_gallery();
			$this->load->view('admin/admin_header');
			$this->load->view('admin/gallery/view',$data);
			$this->load->view('admin/admin_footer');
		}else{
			redirect('adminlogin/login');
		}
	}


	public function get_eventgallery()
	{
		$data=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('user_type');
		if($user_role=='1'){
			$row_id=$this->uri->segment(3);
			$data['res']=$this->eventgallerymodel->get_eventgallery($row_id);
			$this->load->view('admin/admin_header');
			$this->load->view('admin/gallery/edit',$data);
			$this->load->view('admin/admin_footer');
		}else{
			redirect('adminlogin/login');
		}
	}


	public function create_gallery(){
		$data=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('user_type');
		if($user_role=='1'){
			 $title=$this->db->escape_str($this->input->post('title'));
			 $description=$this->db->escape_str($this->input->post('description'));
			 $status=$this->db->escape_str($this->input->post('status'));
			 $cover_img = $_FILES['cover_img']['name'];
					if(empty($cover_img)){
						$cat_cover_img='';
					}else{
					 	$temp = pathinfo($cover_img, PATHINFO_EXTENSION);
						$cat_cover_img = 'C_'.round(microtime(true)) . '.' . $temp;
						$uploaddir = 'assets/gallery/';
						$trade_file = $uploaddir.$cat_cover_img;
						move_uploaded_file($_FILES['cover_img']['tmp_name'], $trade_file);
					}
			 $data['res']=$this->eventgallerymodel->create_gallery($title,$cat_cover_img,$description,$status,$user_id);			
			 if($data['res']=='success'){
				 redirect('eventgallery/view');
			 }else{
				  redirect('eventgallery/view');
			 }
		}else{

		}
	}

	public function update_gallery(){
		$data=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('user_type');
		if($user_role=='1'){
			 $title=$this->db->escape_str($this->input->post('title'));
			 $newsfeed_id=$this->db->escape_str($this->input->post('newsfeed_id'));
			 $description=$this->db->escape_str($this->input->post('description'));
			 $status=$this->db->escape_str($this->input->post('status'));
			 $cover_img_old=$this->db->escape_str($this->input->post('cover_img_old'));
			 $row_id=$this->db->escape_str($this->input->post('row_id'));
			 $cover_img = $_FILES['cover_img']['name'];
					if(empty($cover_img)){
						$cat_cover_img=$cover_img_old;
					}else{
					 	$temp = pathinfo($cover_img, PATHINFO_EXTENSION);
						$cat_cover_img = 'C_'.round(microtime(true)) . '.' . $temp;
						$uploaddir = 'assets/gallery/';
						$trade_file = $uploaddir.$cat_cover_img;
						move_uploaded_file($_FILES['cover_img']['tmp_name'], $trade_file);
					}
			 $data['res']=$this->eventgallerymodel->update_gallery($title,$cat_cover_img,$description,$status,$user_id,$row_id);
			 if($data['res']=='success'){
				redirect('eventgallery/view');
			}else{
				 redirect('eventgallery/view');
			}
		}else{
			 redirect('/');
		}
	}

		public function add_gallery_image(){
			$data=$this->session->userdata();
			$user_id=$this->session->userdata('id');
			$user_role=$this->session->userdata('user_type');
			if($user_role=='1'){
				$this->load->view('admin/admin_header');
				$this->load->view('admin/gallery/add_gallery',$data);
				$this->load->view('admin/admin_footer');
			}else{

			}
		}

		public function create_gallery_img(){
			$data=$this->session->userdata();
			$user_id=$this->session->userdata('id');
			$user_role=$this->session->userdata('user_type');
			if($user_role=='1'){
						$event_token=$this->db->escape_str($this->input->post('event_token'));
						$name_array = $_FILES['gallery_img']['name'];
						$tmp_name_array = $_FILES['gallery_img']['tmp_name'];
						$count_tmp_name_array = count($tmp_name_array);
						$static_final_name = time();
						for($i = 0; $i < $count_tmp_name_array; $i++){
						 $extension = pathinfo($name_array[$i] , PATHINFO_EXTENSION);
						$file_name[]=$static_final_name.$i.".".$extension;
						move_uploaded_file($tmp_name_array[$i], "assets/gallery/images/".$static_final_name.$i.".".$extension);
					}
						$data['res']=$this->eventgallerymodel->create_gallery_img($event_token,$file_name,$user_id);
						if($data['res']=='success'){
		 				redirect('eventgallery/view');
		 			}else{
		 				 redirect('eventgallery/view');
		 			}

			}else{
				redirect('/');
			}
		}

		public function view_gallery_image(){
			$data=$this->session->userdata();
			$user_id=$this->session->userdata('id');
			$user_role=$this->session->userdata('user_type');
			if($user_role=='1'){
				$row_id=$this->uri->segment(3);
				$data['res']=$this->eventgallerymodel->view_gallery_image($row_id);
				$this->load->view('admin/admin_header');
				$this->load->view('admin/gallery/view_gallery',$data);
				$this->load->view('admin/admin_footer');
			}else{
				redirect('/');
			}
		}

	public function delete_gallery_img(){
		$data=$this->session->userdata();
		$user_id=$this->session->userdata('id');
		$user_role=$this->session->userdata('user_type');
		if($user_role=='1'){
				$id=$this->db->escape_str($this->input->post('id'));
				$data=$this->eventgallerymodel->delete_gallery_img($id);

		}else{
				redirect('/');
		}
	}

	public function exist_title(){
		$title=$this->db->escape_str($this->input->post('title'));
		$data=$this->eventgallerymodel->exist_title($title);
	}

	public function exist_title_check(){
		$title=$this->db->escape_str($this->input->post('title'));
		$newfeed_id=$this->uri->segment(3);
		$data=$this->eventgallerymodel->exist_title_check($title,$newfeed_id);
	}


}
