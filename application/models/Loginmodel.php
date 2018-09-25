<?php

Class Loginmodel extends CI_Model
{

  public function __construct()
  {
      parent::__construct();

  }

 function login($user_name,$password)
  {
    $query = "SELECT * FROM user_tb WHERE user_name='$user_name'";
    $resultset=$this->db->query($query);
    $resultset->num_rows();

    if($resultset->num_rows()==1)
      {
         $pwdcheck="SELECT * FROM user_tb WHERE password='$password' AND user_name='$user_name'";
          $res=$this->db->query($pwdcheck);
           $res->num_rows();

          if($res->num_rows()==1)
	        {
              foreach($res->result() as $rows)
               {

                 $quer="SELECT status FROM user_tb WHERE id='$rows->id'";
                 $resultset=$this->db->query($quer);
                 $status=$rows->status;
                 switch($status)
                 {
                    case "Active":
                      $data = array("user_name" => $rows->user_name,"msg"  =>"success","name"=>$rows->name,"status"=>"success","user_type"=>$rows->user_type,"id"=>$rows->id);
                      $session_data=$this->session->set_userdata($data);
                      break;
                    case "Inactive":
           					$data= array("status"=>"Deactive","msg"=>"Your Account Is De-Activated");
           					return $data;
                      break;
                  }

                  $data = array("user_name" => $rows->user_name,"msg"  =>"success","name"=>$rows->name,"status"=>"success","user_type"=>$rows->user_type,"id"=>$rows->id);
                  $this->session->set_userdata($data);
   	            return $data;
               }
         }else{
            $data= array("status" => "Wrong Password","msg" => "Password Wrong");
            return $data;
           }
      }else{
            $data= array("status" => "Invalid Username","msg" => "invalid Username");
            return $data;
         }
   }


   function checkpassword($password,$user_id){
     $select="SELECT * FROM user_tb WHERE password='$password' AND id='$user_id'";
     $res=$this->db->query($select);
    if($res->num_rows()==0){
      echo "false";
    }else{
      echo "true";
    }
   }

   function updatepassword($password,$user_id){
     if(empty($password)){

     }else{
       $select="UPDATE user_tb SET password='$password',updated_at=NOW() WHERE id='$user_id'";
       $res=$this->db->query($select);
      if($res){
        echo "success";
      }else{
        echo "failed";
      }
     }
   }


   function count_newsfeed(){
     $this->db->from('newsfeed');
     $cnt=$this->db->count_all_results();
     return $cnt;
   }

   function count_gallery(){
     $this->db->from('event_gallery_tb');
     $cnt=$this->db->count_all_results();
     return $cnt;
   }

   function count_contact(){
     $this->db->from('contact_tb');
     $cnt=$this->db->count_all_results();
     return $cnt;
   }
   function contact_form_enquired(){
     $this->db->order_by("id", "desc");
     $query = $this->db->get('contact_tb');
     return $query->result();
   }

   function contact_us($name,$phone,$subject,$message){
      $day=date("Y-m-d H:i:s");
     $data = array(
         'name' => $name,
         'phone' =>$phone,
         'subject' => $subject,
         'message'=>$message,
         'updated_at'=>$day
       );
       $query=$this->db->insert('contact_tb', $data);
       if($query){
         echo "success";
       }else{
         echo "failed";
       }
   }

   function get_all_event_gallery(){
     $this->db->order_by("id", "desc");
     $this->db->where('status', 'Active');
     $query = $this->db->get('event_gallery_tb');
     return $query->result();
   }

   function view_event_gallery($ev_id){
     $id=base64_decode($ev_id)/98765;
     $this->db->where('event_id', $id);
     $query = $this->db->get('event_gallery_img');
     return $query->result();
   }
   function get_event_name($ev_id){
     $id=base64_decode($ev_id)/98765;
     $this->db->where('id', $id);
     $query = $this->db->get('event_gallery_tb');
     return $query->result();
   }

   function view_news_feed(){
     $this->db->order_by("id", "desc");
     $this->db->where('status', 'Active');
     $query = $this->db->get('newsfeed');
     return $query->result();
   }








}
