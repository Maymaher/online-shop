<?php
include_once 'test.php';
?>

<html>

<head>

    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>

<link rel="stylesheet" type="text/css" href="css/index.css"/>


</head>

<body>

    <div class="nav_bar">
        <img src="images/logo.png" alt="logo image"/>
        
        <ul>
        
            <li> <a href="index.php">Home</a> </li>
            <li> <a href="signup.php">signUp</a> </li>
            <li> <a href="login.php">Login</a> </li>
            

            <div class="dropdown">
                <li><a class="dropbtn">categories
                    <i class="fa fa-caret-down"></i>
                </a>
                    
                </li>
                
                <div class="dropdown-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
                </div>
              </div>
          
            <li> <a href="contact_us.php">Contact Us</a> </li>
            <div class="search">
                <form  action="index.php"  method="POST" enctype="multipart/form-data">    
                    <input type="search" name="t_search" placeholder="search by item name"/>
                    <input id="btn_search" type="submit" name="submit" value="Search" />
                    
                </form>
                </div>
        </ul>
        
        
        </div>

<?php
if(isset($_POST['submit']) and $_POST['submit']=='Search'){
    $word=$_POST['t_search'];
    header("location:http://localhost/git project/ndr1/search_for_user.php?word=".$word);
}
?>


<div class="background_img">
  <img src="images/banner13.jpg">


</div>


<div class="section_view">
<h1>Products</h1>



<div class="imgrow">

<?php
$get_data=mysqli_query($con,"select * from items");
if($get_data){
    while($row=mysqli_fetch_assoc($get_data))
    {
        $id=$row['id'];
        $name=$row['name'];
        $price=$row['price'];
        $image=$row['image_path'];

?>
<div class="item_view">

<a href="<?php echo "http://localhost/git project/ndr1/item_detail_foruser.php?item=".$id; ?>">
<img src="<?php echo $image ?>" alt="item image" />

<div class="middle">
    <div class="text">More detail</div>
  </div>


    </a>
<h3>Price:<?php echo $price; ?></h3>

</div>

   
    <?php

}
}

?>






</div>



<div class="more_courses">
<h2>More Items</h2>

    <a href="#"><img  src="images/ic_trending_flat_24px (1).png" class="arrow"></a>
</div>



</div> 
    



<div class="space"></div>

<div class="footer_view">

    <div class="footer_links">


</div>

<div class="copy_right">



<img src="images/fb.png" alt="fb icon"/>
<img src="images/twit.png" alt="twitter icon"/>
<img src="images/insta.png" alt="insta icon"/>
<img src="images/gmail.png" alt="gmail icon"/>

<p>Copyright it-share 2019 developed by NDR inc </p>
</div>

</div>




</body>
</html>