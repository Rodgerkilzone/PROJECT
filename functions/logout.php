<?php 
session_start();

session_destroy();
 setcookie('sess_user','',time() - (86400 * 30),'/');

header("location:../index.php");

 ?>