<?php

include_once 'models/supplier_class.php';
?>

<html>



<head>

    <title> NDR Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>

<link rel="stylesheet" type="text/css" href="css/login.css"/>


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


<div class="section_view">

<!-- login part design  -->
<form action="controllers/supplier_control.php" method="POST" >
<div class="login_design">



<h2 id="login_header">Login</h2>
<input type="email" name="t_email"  placeholder="Your Email"/>
<input type="password" name="t_pass" placeholder="Your Password"/>
<label class="check_box">


<a href="forget_password.php" class="forget_password">Forget password?</a>
</label>

<input id="btn_login" type="submit" name="submit" value="Login"/>

<h4>Don't have account please <b> <a class="signup" href="signup.html">SignUp</a> </b> </h4>


<div class="imgs">
<img src="images/icons8-facebook-circled-48.png">
<img src="images/gmail.png">
<img src="images/icons8-twitter-circled-48.png">
</div>


</form>





</div>
<!--  end of login part design  -->



</div>


</body>
</html>