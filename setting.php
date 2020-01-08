<?php
ob_start();


include_once 'models/supplier_class.php';

session_start();
if(!isset($_SESSION['s_email'])){
    header('location:login.php');
 
    die();
}

?>

<html>

<head>

    <title> setting</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<link rel="stylesheet" type="text/css" href="css/signup.css"/>
<link rel="stylesheet" type="text/css" href="css/setting.css"/>



</head>

<body>

<div>
<img class="logo" src="images/logo.png" alt="logo image"/>

<ul>

<li> <a href="home.php">Home</a> </li>

<li> <a href="edit_profile.php">Edit profile</a> </li>
    <li> <a href="add_item.php">add item</a> </li>
    <li> <a href="setting.php">view items</a> </li>

    <li> <a href="logout.php">logout</a> </li>

</ul>


</div>







<div class="section_view_supplier">

<form action="items.php" method="POST">

<input type="search" class="form-control"  name="t_search" placeholder="search...">
<input type="submit" class="btn btn-primary"  name="submit" value="search">
</form>


<img src="images/profile.png" id="view_img" alt="profile photo">

<div class="all">

<?php

$email=$_SESSION['s_email'];
$data_suplier=new supplier();
$data_suplier->get_supplier($email);



?>
<div class="supplier">




<h5>UserName:<?php echo $data_suplier->name ; ?></h5>

<h5>Email: <?php echo $data_suplier->email ; ?> </h5>




</div>


</div>


</div>



<div class="section_view">


<div class="all">

<?php
$email_i=$_SESSION['s_email'];



$sql_get="select * from items where supplier_email='$email_i'";
    $res=mysqli_query($con,$sql_get);
    if($res){
        while($row=mysqli_fetch_assoc($res)){
            $id=$row['id'];
            $name=$row['name'];
            $photo=$row['image_path'];
            $price=$row['price'];

            

    

?>
<div class="supplier_items">


<a href="<?php echo "http://localhost/git project/ndr1/item_detail.php?item=".$id; ?>">
<img src="<?php echo $photo ?>" id="view_image" alt="supplier photo">
<div class="middle">
    <div class="text">More detail</div>
  </div>


    </a>
    

<h5>price: <?php echo $price ; ?> </h5>
<a href="<?php echo "http://localhost/git project/ndr1/edit_item.php?item_id=".$id; ?>">edit</a>




</div>

<?php
    }
}

?>
</div>


</div>

</div>





</body>
</html>