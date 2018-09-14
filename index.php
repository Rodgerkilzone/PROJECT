<?php
    ob_start(); 
?>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="page icon" href="images/logo.png" />
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Levix Jobs</title>
  </head>
  <body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Levix   <?php
if(isset($_COOKIE["sess_user"])){
include "functions/connect.php";
  $email=$_COOKIE["sess_user"];
 $select = mysqli_query($conn, "SELECT * FROM `job_seeker` WHERE `email` = '$email' ");
if(mysqli_num_rows($select)) { 

?> 
<small>-(JOB SEEKER)</small>
<?php }else{ ?>
<small>-(COMPANY)</small>
<?php }}?>

</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
       <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="Jobs.php">Jobs <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="companies.php">Companies</a>
      </li>
    </ul>
    <div>

       <ul class="navbar-nav mr-auto ">
         <?php
if(!isset($_COOKIE["sess_user"])){
   
?> 
       <li class="nav-item ">
        <a class="nav-link " href="#"  data-toggle="modal" data-target="#loginModal">Sign in</a>
  
      </li>

    <?php }?>
          <?php
if(isset($_COOKIE["sess_user"])){

      
?> 
       <li class="nav-item ">
    
   <a class="nav-link " href="functions/logout.php">Logout</a>
     
      </li>
<?php
  include "functions/connect.php";
 $select = mysqli_query($conn, "SELECT * FROM `job_seeker` WHERE `email` = '$email' ");
    while ($row = mysqli_fetch_array($select)) {
$user_id=$row['user_id'];
    ?>

      <li class="nav-item ">
 <a class="nav-link " href=<?php echo "user/profile.php?user_id=".$user_id ?>>Account</a>
</li>
<?php };?>

    <?php } ?>

    </ul>

    </div>
  </div>
</nav>
<div class="slide_container">
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div style="width: 100%;height: 100%;position: absolute;background-color:black;z-index: 2;opacity:0.6"></div>
    <div class="carousel-item active">
      <img  src="images/image_1.jpg" class="tales" alt="First slide">
    </div>
    <div class="carousel-item">
      <img  src="images/image_2.jpg" class="tales" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img  src="images/sign.jpg" class="tales" alt="Third slide">
    </div>
  </div>
</div>
<div class="centered" style="z-index: 4">
  <h2>GET UPDATES OF ALL THE JOBS IN THE MARKET</h2>


<?php

if(isset($_COOKIE["sess_user"])){
  echo  "YOU ARE LOGGED IN<br>";
    echo  $_COOKIE["sess_user"];
} else{
   
?> 
  <a class="btn btn-primary" href="sign_up.php">Register</a><button style="margin-left:10px" type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#loginModal">Sign in</button>
<?php
 }
?>
  <form class="example" style="margin:10px auto 0 auto;max-width:500px">
  <input type="text" placeholder="Search for Jobs.." name="search2">
 <a href="jobs.php"> <button type="button"><i class="fa fa-search"></i></button></a>
</form>

</div>
</div>
<div class="category" style="width: 100%;text-align:center">
  <div > 
  
 <hr/>
  <h4>   <b> GET HIRED FOR YOUR DREAM JOB</b></h4> 
Find a Jobs in the following categories</div>

<div class="flex-container">
  <div>
    <a href="jobs.php?category=engineering" style="text-decoration-line: none;color: black"> <img src="images/eng1.jpg" style="width:100%;height:80%">
    <h5 >Engineering</h5></a>
 
  </div>
   <div>
        <a href="jobs.php?category=ICT_and_Software" style="text-decoration-line: none;color: black"> <img src="images/ict.jpg" style="width:100%;height:80%">
    <h5 >ICT and Software</h5></a>
  </div>
   <div>
        <a href="jobs.php?category=Construction" style="text-decoration-line: none;color: black"> <img src="images/eng2.jpg" style="width:100%;height:80%">
    <h5 >Construction</h5></a>
  </div>
    <div>
      <a href="jobs.php?category=engineering" style="text-decoration-line: none;color: black"> <img src="images/eng1.jpg" style="width:100%;height:80%">
    <h5 >Engineering</h5></a>

  </div>
   <div>
    <a href="jobs.php?category=Design_and_Art" style="text-decoration-line: none;color: black"> <img src="images/art.jpg" style="width:100%;height:80%">
    <h5 >Design and Art</h5></a>

  
  </div>
   <div>
    <a href="jobs.php?category=Health" style="text-decoration-line: none;color: black"> <img src="images/health.jpg" style="width:100%;height:80%">
    <h5 >Health</h5></a>

  </div>
  <div>
    <a href="jobs.php?category=Banking_and_Finance" style="text-decoration-line: none;color: black"> <img src="images/bank.jpg" style="width:100%;height:80%">
    <h5 >Banking and Finance</h5></a>

  
  </div>
  <div>
    <a href="jobs.php?category=Hospitality_and_Tourism" style="text-decoration-line: none;color: black"> <img src="images/hosp.jpg" style="width:100%;height:80%">
    <h5 >Hospitality and Tourism</h5></a>

  </div>
  <div>
    <a href="jobs.php?category=Legal" style="text-decoration-line: none;color: black"> <img src="images/legal.jpg" style="width:100%;height:80%">
    <h5 >Legal</h5></a>

  </div>
  <div>
    <a href="jobs.php?category=Management" style="text-decoration-line: none;color: black"> <img src="images/mang.jpg" style="width:100%;height:80%">
    <h5 >Management</h5></a>

  </div>
  <div>
    <a href="jobs.php?category=Media_and_Jounalism" style="text-decoration-line: none;color: black"> <img src="images/media.jpg" style="width:100%;height:80%">
    <h5 >Media and Jounalism</h5></a>

 
  </div>

  <div style="background-color:#e9eaed">
    <!-- <img src="images/health.jpg" style="width:100%;height:80%"> -->
   <a  href="jobs.php?category=Other_Jobs" style="text-decoration-line: none;color: black;width:100%;height:80%" ><div style="margin-top:80px"><h4 >Other Jobs</h5></div></a> 
    
  </div>
</div>
 <a href="jobs.php" class="btn btn-outline-primary" style="margin: 30px">VIEW ALL JOBS</a>
</div>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="form group" action="functions/login.php" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" value="rodger@gmail.com" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" value="1234" class="form-control" id="password" placeholder="Password">
  </div>
<a href="#"><small>Forgot Password?</small> </a> <br/>

      </div>
      <div class="modal-footer">
     
        <input type="submit" name="submit" class="btn btn-primary" value="Login">
      </div>

    </form>
    </div>
  </div>
</div>     
<button  id="myBtn" title="Go to top"><img src="images/arrow.png" style="transform: rotate(180deg);width:25px;height:25px" ></button>
<script type="text/javascript">
  
  $(document).ready(function(){
   $('.carousel').carousel({
  interval: 4000
})
    $(window).scroll(function(){
        if ($(this).scrollTop() > 200) {
            $('#myBtn').fadeIn();
        } else {
            $('#myBtn').fadeOut();
        }
    });

    $('#myBtn').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

});

</script>
<style>
body{
  /*background-color: #f8f8f8;*/
}
  .tales{
    height:80vh;
    width: 100%;
  }
  .slide_container {

    position: relative;
    text-align: center;
    color: white;

}
  .centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%); 
/*opacity: 0.6;*/
      /*background-color:black;*/
      display: block;
    /*background-color:#e5e5e5;*/
}
.category{
  padding:20px;
}
@media(min-width: 700px){

}

.flex-container {
  margin: 0 auto 0 auto;
  max-width: 1200px;
  flex-wrap: wrap;
  color:#333333;

 /* display: flex;
  justify-content: space-around;*/
  display: flex;
  justify-content: space-around;
}
.flex-container > div {
  border-radius: 5px;
  box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 5px 0 rgba(0,0,0,.23);
  background-color: white;
  flex-basis: 250px;
  margin:10px auto 0 auto;
  text-align: center;
  font-size: 30px;
  height:200px;
  transition:transform 200ms ease;
  overflow: hidden;
}
.flex-container > div:hover {
transform: scale(1.03);
transition:transform 200ms ease;
}

form.example input[type=text] {
    padding: 10px;
    font-size: 17px;
    border: 0px;
    float: left;
    height:40px;
    width: 80%;
    background: #f1f1f1;
}

form.example button {
   height:40px;
    float: left;
    width: 20%;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-left: none;
    cursor: pointer;
}

form.example button:hover {
    background: #0b7dda;
}

form.example::after {
    content: "";
    clear: both;
    display: table;
}
footer{
  background-color: black;
  height: 150px;
  width: 100%;
  color:white;

}
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: #007BFF;
  color: white;
  padding: 15px;
  cursor: pointer;
  border-radius: 4px;
  /*opacity: 0.8;*/
}

#myBtn:hover {
  /*background-color: #555;*/
  /*opacity:1;*/
}
</style>
  </body>
  <?php

if(isset($_GET['error']))
{

  echo "<script> alert('".$_GET['error']."')</script>";

};
if(isset($_GET['message']))
{

  echo "<script> alert('".$_GET['message']."')</script>";

};

 ?>
  <footer>
    <div style="padding-top:100px;width:100%">
    @2018 TECHNICAL UNIVERSITY OF KENYA 
<div style="float:right;right:10px">Project By Rodger M.K</div>
  </div>
  </footer>

</html>