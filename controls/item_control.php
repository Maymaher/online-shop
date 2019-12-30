<?php
include_once '../moduls/item_class.php';
session_start();

if(isset($_POST['submit']) and $_POST['submit']=="Add"){
    // $id=$_POST['t_id'];
    $email=$_SESSION['s_email'];
    $name=$_POST['t_name'];
    $price=$_POST['price'];
    $amount=$_POST['amount'];
    

$upload_image_name=$_FILES['photo_file']['name'];
$target_folder="item_images/".$upload_image_name;
$target_loc="http://localhost/git project/ndr1/item_images/".$upload_image_name;
$pack_pic2=$_FILES['photo_file']['tmp_name'];
move_uploaded_file($pack_pic2,$target_folder);



$add=new item();
$add->insert_item($name,$email,$price,$amount,$target_folder,$target_loc);


}




if(isset($_POST['submit']) and $_POST['submit']=="Edit"){
   
    $name=$_POST['name'];
    $price=$_POST['price'];
    $amount=$_POST['amount'];
    $id=$_POST['id'];
    
    

  if($_FILES['photo_file']['name']!=""){
    $upload_image_name=$_FILES['photo_file']['name'];
    $target_folder="item_images/".$upload_image_name;
    $target_loc="http://localhost/git project/ndr1/images/".$upload_image_name;
    $pack_pic2=$_FILES['photo_file']['tmp_name'];
    move_uploaded_file($pack_pic2,$target_folder);
  }
  else{
    
      $old_image=new item();
      list($target_folder,$target_loc)=$old_image->get_image($id);

  }

    $item=new item();
    $item->update($id,$name,$email,$price,$amount,$target_folder,$target_loc);



}


if(isset($_POST['submit']) and $_POST['submit']=="Delete")
{
    $id=$_POST['id'];
    $del=new item();
    $del->delete($id);
}





?>