<?php
ob_start();

include_once 'test.php';
include_once 'moduls/item_class.php';

session_start();
if(!isset($_SESSION['s_email'])){
  
    include 'login.php';
    die();
}

?>

<html>

<head>

    <title> view items</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="css/item_detail.css"/>



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



<div class="all">

<?php


$id=$_GET['item'];

$item=new item();
$item->get_item_by_id($id);

?>
<div class="supplier">



<img src="<?php echo $item->path; ?>" id="view_image" alt="supplier photo">

<h5>price: <?php echo $item->price ; ?> </h5>
<h5>name: <?php echo $item->name ?> </h5>
<h5>available units: <?php echo $item->amount ?> </h5>




</div>


</div>


</div>




</body>
</html>