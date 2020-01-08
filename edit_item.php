<?php
ob_start();

include_once 'models/item_class.php';

session_start();
if(!isset($_SESSION['s_email'])){
    
    include 'login.php';
    die();
}

?>

<html>

<head>

    <title> profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<link rel="stylesheet" type="text/css" href="css/add_item.css"/>



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
<li> <a href="home.php">Home</a> </li>
    <li> <a href="edit_profile.php">Edit profile</a> </li>
    <li> <a href="add_item.php">add item</a> </li>
    <li> <a href="setting.php">view items</a> </li>
    <li> <a href="contact_us.php">Contact Us</a> </li>
    <li> <a href="logout.php">logout</a> </li>

</ul>


</div>



<div class="section_view">

<?php

$item_id=$_GET['item_id'];
$item=new item();
$item->get_item_by_id($item_id);

?>


<form action="controllers/item_control.php" method="POST" enctype="multipart/form-data">
<div class="signup_design">

<h2 id="signup_header">Edit Item</h2>
<div class="view_image">
    <img src="<?php echo $item->path ;?>" id="view_img" >
</div>

<input type="text" name="name" value="<?php echo $item->name?>" placeholder="item name" />
<input type="text" name="price" value="<?php echo $item->price?>" placeholder="price " />
<input type="text" name="amount" value="<?php echo $item->amount?>" placeholder="quantity" />
<input type="hidden" name="id" value="<?php echo $item_id?>"  />

<input type="file" onchange="preview_image(event)" name="photo_file">


<input id="btn_signup" type="submit" name="submit" value="Edit" />
<input id="btn_signup" type="submit" name="submit" value="Delete" />


</form>





</div>



</div>






</body>
</html>