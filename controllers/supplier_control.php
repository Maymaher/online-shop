
<?php
session_start();
include_once '../moduls/supplier_class.php';

if(isset($_POST['submit']) and $_POST['submit']=="SignUp"){
    $id=$_POST['t_id'];
    $name=$_POST['t_name'];
    $address=$_POST['address'];
    $phone=$_POST['t_phone'];
    $pass=$_POST['t_pass'];
    $mail=$_POST['t_email'];

//   check if email is exist

//   $sql_check=mysqli_query($con,"select * from supplier where Email='$mail'");
//   if(mysqli_num_rows($sql_check)>0){
//       echo '<script>alert("this email already exist")</script>';

//   }
  
  

    $upload_image_name=$_FILES['photo_file']['name'];
    $target_folder="images/".$upload_image_name;
    $target_loc="http://localhost/ndr1/images/".$upload_image_name;
    $pack_pic2=$_FILES['photo_file']['tmp_name'];

     
    
    move_uploaded_file($pack_pic2,$target_folder);

    $n=new supplier();
    $n->insert($id,$name,$mail,$address,$pass,$phone,$target_folder,$target_loc);

  
}


if(isset($_POST['submit']) and $_POST['submit']=="update"){
   
    $name=$_POST['t_name'];
    $address=$_POST['address'];
    $phone=$_POST['t_phone'];
    $pass=$_POST['t_pass'];
   
     $s_email=$_SESSION['s_email'];
    $upload_image_name=$_FILES['photo_file']['name'];
    $target_folder="images/".$upload_image_name;
    $target_loc="http://localhost/ndr1/images/".$upload_image_name;
    $pack_pic2=$_FILES['photo_file']['tmp_name'];
    move_uploaded_file($pack_pic2,$target_folder);

    $s=new supplier();
    $s->update($name,$s_email,$address,$pass,$phone,$target_folder,$target_loc);

  

}



if(isset($_POST['submit']) and $_POST['submit']=="send message")
{


   $email=$_POST['t_email'];

   $currenttime=time();
   $req_time=date('Y-m-d',$currenttime);
   $ip_add=$_SERVER['REMOTE_ADDR'];
   $ip_addr_local=$_SERVER['HTTP_CLIENT_IP'];
   $ip_from_proxy=$_SERVER['HTTP_X_FORWARDED_FOR'];

  $n=new supplier();
  $n->forget_password($email,$req_time,$ip_add,$ip_addr_local,$ip_from_proxy);


   

}


if(isset($_POST['submit']) and $_POST['submit']=="Login")
{
   $email=$_POST['t_email'];
   $pass=$_POST['t_pass'];

   $m=new supplier();
   $m->check_login($email,$pass);



}



?>