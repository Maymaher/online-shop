<?php
ob_start();

include_once 'test.php';

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


<link rel="stylesheet" type="text/css" href="css/signup.css"/>
<link rel="stylesheet" type="text/css" href="css/view.css"/>



</head>

<body>

<div>
<img class="logo" src="images/logo.png" alt="logo image"/>

<ul>

<li> <a href="home.php">home</a> </li>
<li> <a href="supplier_profile.php">Edit profile</a> </li>
    <li> <a href="add_item.php">add item</a> </li>
    <li> <a href="view_items.php">view items</a> </li>

    <li> <a href="contact_us.php">Contact Us</a> </li>

</ul>


</div>






<div class="section_view">

<div class="all">

<?php

$get_data=mysqli_query($con,"select * from items");
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

<a href="<?php echo "http://localhost/git project/ndr1/item_detail.php?item=".$id; ?>" >

<img src="<?php echo $path; ?>" id="view_image" alt="supplier photo">

    </a>
    

    <h5>Name: <?php echo $name ; ?> </h5>
<h5>price: <?php echo $price ; ?> </h5>

<a href="edit_item.php">edit</a>

</div>


<?php
    }
}
?>


</div>


</div>


<!--  end of  section div -->




</body>
</html>