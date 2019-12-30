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
<link rel="stylesheet" type="text/css" href="css/view.css"/>



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

$get_data=mysqli_query($con,"select * from supplier");
if($get_data){
    while($row=mysqli_fetch_assoc($get_data))
    {
       $name=$row['name'];
       $address=$row['address'];
       $mail=$row['Email'];
       $path=$row['image'];



?>
<div class="supplier">


<img src="<?php echo $path; ?>" alt="supplier photo">

<h5>UserName:<?php echo $name ; ?></h5>

<h5>Email: <?php echo $mail ; ?> </h5>

<h5>address: <?php echo $address ; ?> </h5>



</div>
<?php
    }
}
?>


</div>


</div>




<?php



?>




</body>
</html>