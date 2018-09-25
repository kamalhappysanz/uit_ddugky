<?php

Class Newsfeedmodel extends CI_Model
{

  public function __construct()
  {
      parent::__construct();

  }


  function create_newsfeed($title,$description,$status,$user_id){
    $insert="INSERT INTO newsfeed (title,description,status,created_by,updated_at) VALUES('$title','$description','$status','$user_id',NOW())";
    $res=$this->db->query($insert);
    if($res){
      echo "success";
    }else{
      echo "failed";
    }

  }
  function exist_title($title){
   $select="SELECT * FROM newsfeed WHERE title='$title'";
   $res=$this->db->query($select);
   if($res->num_rows()==0){
     echo "true";
   }else{
     echo "false";
   }
  }
  function view_newsfeed(){
    $this->db->order_by("id", "desc");
    $query = $this->db->get('newsfeed');
    return $query->result();
  }
  function get_newsfeed($newfeed_id){
    $id=base64_decode($newfeed_id)/98765;
    $this->db->where('id', $id);
    $query = $this->db->get('newsfeed');
    return $query->result();
  }

  function exist_title_check($title,$newfeed_id){
      $id=base64_decode($newfeed_id)/98765;
      $this->db->where('title', $title);
      $this->db->where("id !=",$id);
      $query = $this->db->get('newsfeed');
      $num = $query->num_rows();
      if($num=='0'){
        echo "true";
      }else{
        echo "false";
      }
  }
  function update_newsfeed($title,$description,$status,$newsfeed_id,$user_id){
      $id=base64_decode($newsfeed_id)/98765;
      $data = array(
          'title' => $title,
          'description' => $description,
          'status' => $status,
          'updated_by'=>$user_id
  );
   $this->db->set('updated_at', 'NOW()', FALSE);
   $this->db->where('id', $id);
   $query=$this->db->update('newsfeed', $data);
    if($query){
      echo "success";
    }else{
      echo "failed";
    }
  }

















}
