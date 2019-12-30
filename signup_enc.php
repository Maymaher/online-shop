<?php
include_once 'test.php';
?>

<html>

<head>

    <title> NDR signup</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<link rel="stylesheet" type="text/css" href="css/signup.css"/>


<script>
    function preview_image(event)
            {
                var reader = new FileReader();
                reader.onload = function ()
                {
                  var output = document.getElementById('view_img');
                  output.src = reader.result;
                };
        reader.readAsDataURL(event.target.files[0]);
            }
   </script>

</head>

<body>

<div>
<img class="logo" src="images/logo.png" alt="logo image"/>

<ul>

    <li> <a href="index.php">Home</a> </li>
    <li> <a href="signup.php">signUp</a> </li>
    <li> <a href="login.php">Login</a> </li>
    <li> <a href="contact_us.php">Contact Us</a> </li>

</ul>


</div>

<!--  start section div -->





<div class="section_view">

<div class="view_image">
    <img src="images/profile.png" id="view_img" >
</div>

<!-- signup part design  -->
<form action="signup.php" method="POST" enctype="multipart/form-data">
<div class="signup_design">



<h2 id="signup_header">SignUp</h2>
<input type="text" name="t_name" placeholder="Username" />
<input type="tel" name="t_phone" placeholder="Phone number" />
<input type="email" name="t_email" placeholder="Your E-mail" />
<input type="password" name="t_pass" placeholder="Your Password" />
<input type="text" name="t_id" placeholder="Your national id " />
<input type="text" name="address" placeholder="Your address" />

<input type="file" onchange="preview_image(event)" name="photo_file">

<input id="btn_signup" type="submit" name="submit" value="SignUp" />


</form>




</div>
<!--  end of login part design  -->



</div>


<?php

if(isset($_POST['submit']) and $_POST['submit']=="SignUp"){
    $id=$_POST['t_id'];
    $name=$_POST['t_name'];
    $address=$_POST['address'];
    $phone=$_POST['t_phone'];
    $pass=$_POST['t_pass'];
    $mail=$_POST['t_email'];

//   check if email is exist

  $sql_check=mysqli_query($con,"select * from supplier where Email='$mail'");
  if(mysqli_num_rows($sql_check)>0){
      echo '<script>alert("this email already exist")</script>';

  }
  
  else{

    $upload_image_name=$_FILES['photo_file']['name'];
    $target_folder="images/".$upload_image_name;
    $target_loc="http://localhost/ndr1/images/".$upload_image_name;
    $pack_pic2=$_FILES['photo_file']['tmp_name'];
    move_uploaded_file($pack_pic2,$target_folder);


    // encript data before upload

  
$omtokiss = '3LifeJoseph';
$method = 'aes-256-cbc';

// Must be exact 32 chars (256 bit)
$omtokiss = substr(hash('sha256', $omtokiss, true), 0, 32);
//echo "Password:" . $password . "\n";

// IV must be exact 16 chars (128 bit)
$iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);

// av3DYGLkwBsErphcyYp+imUW4QKs19hUnFyyYcXwURU=
$enc_id = base64_encode(openssl_encrypt($id, $method, $omtokiss, OPENSSL_RAW_DATA, $iv));

$enc_name = base64_encode(openssl_encrypt($name, $method, $omtokiss, OPENSSL_RAW_DATA, $iv));

$enc_phone = base64_encode(openssl_encrypt($phone, $method, $omtokiss, OPENSSL_RAW_DATA, $iv));

$enc_address = base64_encode(openssl_encrypt($address, $method, $omtokiss, OPENSSL_RAW_DATA, $iv));

$enc_email = base64_encode(openssl_encrypt($mail, $method, $omtokiss, OPENSSL_RAW_DATA, $iv));

$enc_pass = base64_encode(openssl_encrypt($pass, $method, $omtokiss, OPENSSL_RAW_DATA, $iv));


// My secret message 1234
// $decrypted = openssl_decrypt(base64_decode($encrypted), $method, $password, OPENSSL_RAW_DATA, $iv);

    
    // end of encript data


    $sql_add=mysqli_query($con,"insert into supplier (national_id,name,Email,address,ndr,phone,image,image_path) values ('$enc_id','$enc_name','$enc_email',
    '$enc_address','$enc_pass','$enc_phone','$target_folder','$target_loc')") ;


    if($sql_add){
        // echo '<script>alert("save data ...")</script>';
        $header="ndr.com";
        $to=$_POST['t_email'];
        $subject="welcome to ndr store";
        $msg="welcome to our ndr store \n  for support please call us at :0125547844 \n if you get some errors from our side that ok";

        mail($to,$subject,$msg,$header);

        session_start();
        $_SESSION['s_email']=$enc_enmail;
        header('location:edit_profile.php');
    }
    else{
        echo "Error".mysqli_error($con);
        // echo '<script>alert("check your connection and try again")</script>';
    }

  }
}



?>




</body>
</html>