<?php
ob_start();

include_once 'test.php';

session_start();
// if(!isset($_SESSION['s_email'])){
   
//     include 'login.php';
//     die();
// }

?>

<html>

<head>

    <title> view items</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<link rel="stylesheet" type="text/css" href="css/items.css"/>




</head>

<body>

<div>
<img class="logo" src="images/logo.png" alt="logo image"/>

<ul>
<li> <a href="index.php">Home</a> </li>
<li> <a href="login.php">login</a> </li>
    <li> <a href="signup.php">signup</a> </li>
    

    <li> <a href="contact_us.php">Contact Us</a> </li>

</ul>


</div>

<!-- <div class="space"></div> -->


<!--  start section div -->

<div class="section_view">


<div class="search">

<form action="search_for_user.php" method="POST">

<input type="search" class="form-control"  name="t_search" placeholder="search...">
<input type="submit" class="btn btn-primary"  name="submit" value="search">
</form>

<?php

if(isset($_POST['submit']) and $_POST['submit']=="search"){
    $word=$_POST['t_search'];
    header("location:http://localhost/git project/ndr1/search_for_user.php?word=".$word);
}

?>

</div>



<div class="all">

<?php

if(isset($_GET['word']))
{
    $search=$_GET['word'];


$get_data=mysqli_query($con,"select * from items where name like '%$search%' ");
if($get_data){
    while($row=mysqli_fetch_assoc($get_data))
    {
        $id=$row['id'];
       $name=$row['name'];
       $price=$row['price'];
    //    $amount=$row['amount'];
       $path=$row['image_path'];



?>
<div class="supplier">

<a href="<?php echo "http://localhost/git project/ndr1/item_detail_foruser.php?item=".$id; ?>" >

<img src="<?php echo $path; ?>" id="view_image" alt="item image">
<div class="middle">
    <div class="text">More detail</div>
  </div>
    </a>
    
<h5>Item Name:<?php echo $name ; ?></h5>

<h5>price: <?php echo $price ; ?> EGP </h5>
<!--<a href="<?php echo "http://localhost/git project/ndr1/edit_item.php?item_id=".$id?>">edit</a>-->



</div>


<?php
    }
}

}
?>


</div>


</div>





</body>
</html>