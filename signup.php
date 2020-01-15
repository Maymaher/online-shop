
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

            function validate(){
            
            let phone_value=document.getElementById('t_phone').value;
            reg_phone=/^(\d{11})$/;
            test=reg_phone.test(phone_value);
            if(!test){
            alert("phone must be 11 number"+test);
            return false;
            }
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






<div class="section_view">

<div class="view_image">
    <img src="images/profile.png" id="view_img" >
</div>

<!-- signup part design  -->
<form action="controllers/supplier_control.php" method="POST" onsubmit="return validate()" enctype="multipart/form-data">
<div class="signup_design">



<h2 id="signup_header">SignUp</h2>
<input type="text" name="t_name" placeholder="Username" />
<input type="tel" name="t_phone" placeholder="Phone number" />
<input type="email" name="t_email" placeholder="Your E-mail" />
<input type="password" name="t_pass" placeholder="Your Password" />
<input type="text" name="address" placeholder="Your address" />

<input type="file" onchange="preview_image(event)" name="photo_file">

<input id="btn_signup" type="submit" name="submit" value="SignUp" />


</form>




</div>



</div>






</body>
</html>