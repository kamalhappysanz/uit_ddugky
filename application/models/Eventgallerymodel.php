<?php

Class Eventgallerymodel extends CI_Model
{

  public function __construct()
  {
      parent::__construct();

  }


  function create_gallery($title,$cat_cover_img,$description,$status,$user_id){
    $select="SELECT * FROM event_gallery_tb WHERE event_title='$title'";
    $res=$this->db->query($select);
    if($res->num_rows()==0){
      $data = array(
          'event_title' => $title,
          'cover_img' =>$cat_cover_img,
          'event_description' => $description,
          'status'=>$status,
          'updated_by'=>$user_id
        );
        $this->db->set('updated_at', 'NOW()', FALSE);
        $this->db->set('created_at', 'NOW()', FALSE);
        $query=$this->db->insert('event_gallery_tb', $data);
        if($query){
          return "success";
        }else{
          return "failed";
        }
    }else{
      return "Already Exist";
    }
  }
  function exist_title($title){
    $select="SELECT * FROM event_gallery_tb WHERE event_title='$title'";
   $res=$this->db->query($select);
   if($res->num_rows()==0){
     echo "true";
   }else{
     echo "false";
   }
  }

  function view_event_gallery(){
    $this->db->order_by("id", "desc");
    $query = $this->db->get('event_gallery_tb');
    return $query->result();
  }
  function get_eventgallery($row_id){
    $id=base64_decode($row_id)/98765;
    $this->db->where('id', $id);
    $query = $this->db->get('event_gallery_tb');
    return $query->result();
  }

  function exist_title_check($title,$newfeed_id){
      $id=base64_decode($newfeed_id)/98765;
      $this->db->where('event_title', $title);
      $this->db->where("id !=",$id);
      $query = $this->db->get('event_gallery_tb');
      $num = $query->num_rows();
      if($num=='0'){
        echo "true";
      }else{
        echo "false";
      }
  }
  function update_gallery($title,$cat_cover_img,$description,$status,$user_id,$row_id){
      $id=base64_decode($row_id)/98765;
      $data = array(
          'event_title' => $title,
          'cover_img' =>$cat_cover_img,
          'event_description' => $description,
          'status'=>$status,
          'updated_by'=>$user_id
        );
    $this->db->set('updated_at', 'NOW()', FALSE);
    $this->db->set('created_at', 'NOW()', FALSE);
    $this->db->where('id', $id);
    $query=$this->db->update('event_gallery_tb', $data);
    if($query){
      return "success";
    }else{
      return "failed";
    }
  }


  function create_gallery_img($event_token,$file_name,$user_id){
    $id=base64_decode($event_token)/98765;
    $count=count($file_name);
    $data =array();
    $d=date("Y-m-d H:i:s");
    for($i=0; $i<$count; $i++) {
    $data[$i] = array(
               'event_id' => $id,
               'event_img' => $file_name[$i],
               'status' => 'Active',
               'updated_by'=>$user_id,
               'updated_at'=>$d
             );

    }
    $query=$this->db->insert_batch('event_gallery_img', $data);
    if($query){
      return "success";
    }else{
      return "failed";
    }
  }


  function view_gallery_image($row_id){
      $id=base64_decode($row_id)/98765;
      $this->db->where('event_id', $id);
      $query = $this->db->get('event_gallery_img');
      return $query->result();
  }

  function delete_gallery_img($id){
    $this->db->where('id', $id);
    $query=$this->db->delete('event_gallery_img');
    if($query){
      echo "success";
    }else{
      echo "failed";
    }
  }
















}
