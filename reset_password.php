<?php
include_once 'test.php';
?>

<html>



<head>

    <title></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="css/login.css"/>
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>




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


<form action="reset_password.php" method="POST" >
<div class="login_design">



<h2 id="login_header">reset password</h2>

<input type="hidden" name="t_email" value="<?php echo $mail=$_GET['e']; ?>">
<input type="text" name="t_pass"  placeholder="new password"/>

<label class="check_box">


</label>

<input id="btn_login" type="submit" name="submit" value="save"/>

<h4>if you need support call: <b>  </b> </h4>


<div class="imgs">
<img src="images/icons8-facebook-circled-48.png">
<img src="images/gmail.png">
<img src="images/icons8-twitter-circled-48.png">
</div>


</form>





</div>
<!--  end of login part design  -->



</div>
<?php

if(isset($_POST['submit']) and $_POST['submit']=="save")
{
   $email=$_POST['t_email'];
   $pass=$_POST['t_pass'];
   $ip_add=$_SERVER['REMOTE_ADDR'];

   $sql_sel=mysqli_query($con,"select * from  reset_password where email='$email' and ip_address='$ip_add'");
if($sql_sel){
if(mysqli_num_rows($sql_sel)>0){
   
    $sql_up=mysqli_query($con,"update supplier set ndr='$pass' where Email='$email'");
    if($sql_up){
        //delete from reset password
        $sql_d=mysqli_query($con,"delete from reset_password where email='$email'");
        if($sql_d)
        session_start();
        $_SESSION['s_email']=$email;
        header('location:setting.php');
    }
    else{
        header('location:support.php');

    }

   


}
 else{
    echo '<script>alert("try again")</script>';

}

}
else{
    echo '<script>alert("check your connection and try again")</script>';

}


}


?>

</body>
</html>