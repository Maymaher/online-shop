<?php 
session_start();
if(isset($_SESSION['s_email']))
unset($_SESSION['s_email']);

header("location:login.php");



?>