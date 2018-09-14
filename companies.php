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
       <li class="nav-item ">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="jobs.php">Jobs <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Companies</a>
      </li>
    </ul>
    <div>
       <ul class="navbar-nav mr-auto ">
         <?php 
if(!isset($_COOKIE["sess_user"])){
   
?> 
       <li class="nav-item ">
        <a class="nav-link " href="index.php">Sign in</a>
  
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
<?php
include "functions/connect.php";
if(isset($_COOKIE['sess_user'])){
$email=$_COOKIE['sess_user'];
//
// echo $email;
$check=mysqli_query($conn, "SELECT * FROM `company` WHERE `email` = '$email' ");
$rows = mysqli_fetch_array($check);
  if($rows['email']==$_COOKIE['sess_user']){

 $company_id=$rows['company_id'];




?>
 <li class="nav-item ">
 <a class="nav-link " href=<?php echo "company/profile.php?company_id=".$company_id ?>>Account</a>
</li>
<?php }}?>
    </ul>

    </div>
  </div>
</nav>
<div class="parallax" style="min-height:260px">
  <!-- <img c src="images/jobs.jpg" style="width: 100%;height:100%" > -->
  <div style="width: 100%;color:white;">
    <div style="float:left;background-color: black;opacity:0.7;width: 100%;height:130%;margin: 0 auto 0 auto"></div>
<div style="position: absolute;float: left;padding: 10px;width: 70%;">
   <h4>Available jobs</h4>
<p>
  View job positions posted by different companies in the job market. <br/>
  Please sign up in order to apply for the jobs.

 
</p>
  <button type="button" class="btn btn-primary">Register</button><button style="margin-left:10px" type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#loginModal">Sign in</button>

</div>
  </div>
  <div  style="width: 70%;margin: 0 auto 0 auto;color:white;padding: 10px">
<div class="banner"></div>   
<div style="transform: translateY(-120% );position: absolute;float: left;">
   <h4>Available jobs</h4>
<p>
  View jobs positions posted by different companies in the job market. <br/>
  Please sign up in order to apply for the jobs.

 
</p>
  <button type="button" class="btn btn-primary">Register</button><button style="margin-left:10px" type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#loginModal">Sign in</button>
</div>

 </div>
</div>

<div class="filter">
 <form class="form-inline" style="margin: 0 auto 0 auto;">
  <input class="form-control" id="myInput" onkeyup="myFunction()"  type="search" placeholder="Search for Jobs..." aria-label="Search">
   
     <button style="margin-right:10px" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>

 </div>
 <hr/>
<div class="container">

 <?php

            include "functions/connect.php";
            $query = mysqli_query($conn,"SELECT * from company ORDER BY company_id DESC");
            $no=1;
               while ($row = mysqli_fetch_array($query)) {


                ?>
<div class="card" style=" border: 1px solid #e5e5e5;">
<img src=<?php 

if(file_exists("images/profile/company/".$row['email'].".jpg"))
echo "images/profile/company/".$row['email'].".jpg"; 
else{
  echo "images/profile/company/".$row['email'].".png";
}

?>  style="height:150px;width:100%">

<div class="detail">
<h6><?php echo $row['company_name']; ?></h6>  

<p style="color:gray">
<strong>Detail</strong><br>
<small >
  <?php echo substr($row['about'], 0, 50).".."; ?>
</small><br>
<small style="color: blue"><b>   <?php echo $row['location']; ?></b></small></p>

<hr>

<a href=<?php echo "company/profile.php?company_id=".$row['company_id']; ?> ><button style="float:right;" type="button" class="btn btn-info" >View Company</button></a>
</div>

</div>
<?php } ?>


</div>
<nav aria-label="Page navigation example">
<ul class="pagination justify-content-center">
    <li class="pag_prev page-item">
        <a href="#" class="page-link" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
    </li>
    <!-- our dynamic pagination content goes here -->
    <li class="pag_next page-item">
        <a href="#" class="page-link" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
    </li>
</ul>
</nav>
<button  id="myBtn" title="Go to top"><img src="images/arrow.png" style="transform: rotate(180deg);width:25px;height:25px" ></button>
<style>
body{
  margin: 0px;

}
input{
  margin-right:10px;
  margin-bottom:5px;
}
button{
  margin-bottom:5px;
   /*margin-left:10px;*/
}
select{
  /*margin-left:10px;*/
  margin-right:10px;
  /*margin-bottom:5px;*/
}
.filter{
  margin: 10px;
  /*width: 100%;*/
  padding:5px;
  background-color: white;
}
.detail{
  padding: 3px;
  padding-left:4px;
}
.container{

  padding: 10px;
}
.card{
  /*padding:5px;*/
  width: 280px;

  /*height: 320px;*/
  /*box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 5px 0 rgba(0,0,0,.23);*/
}
.avatar{
  margin-left: 10px;
  width: 30px;
  height: 30px;
  overflow: hidden;
  border-radius: 15px;
  border:0.5px solid #a5e5e5;

}
.banner{
  width: 100%;
  height: 200px;
opacity: 0.7;
transform: translateX(-10px);
/*z-index: -1;*/



background-color:black;

}
.parallax{
  display: none;
  padding:50px;
   background-image: url("images/jobs2.jpg");
     height: 40vh;
      width: 100%;
   background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: 100% 100vh;

}
footer{
  background-color: black;
  height: 150px;
  width: 100%;
    /*position:absolute;*/
    z-index: -3;
   bottom:0;
  color:white;

}
.container {
  margin: 0 auto 0 auto;
  max-width: 1200px;
  flex-wrap: wrap;

 /* display: flex;
  justify-content: space-around;*/
  display: flex;
  justify-content: space-around;
}
.container > .card {
  background-color: white;
  background-color: white;
  flex-basis: 280px;
  margin:10px auto 0 auto;
  overflow: hidden;
  text-align: left;
  transition:transform 200ms ease;
   box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 5px 0 rgba(0,0,0,.23);
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
}

#myBtn:hover {
  /*background-color: #555;*/
}
</style>
<script>
$( document ).ready(function() { 
    

    pageSize = 10;
    pagesCount = $(".card").length;
    var currentPage = 1;
    
    var nav = '';
    var totalPages = Math.ceil(pagesCount / pageSize);
    for (var s=0; s<totalPages; s++){
        nav += '<li class="numeros page-item"><a href="#" class="page-link">'+(s+1)+'</a></li>';
    }
    $(".pag_prev").after(nav);
    $(".numeros").first().addClass("active");

    showPage = function() {
        $(".card").hide().each(function(n) {
            if (n >= pageSize * (currentPage - 1) && n < pageSize * currentPage)
                $(this).show();
        });
    }
    showPage();


    $(".pagination li.numeros").click(function() {
        $(".pagination li").removeClass("active");
        $(this).addClass("active");
        currentPage = parseInt($(this).text());
        showPage();
    });

    $(".pagination li.pag_prev").click(function() {
        if($(this).next().is('.active')) return;
        $('.numeros.active').removeClass('active').prev().addClass('active');
        currentPage = currentPage > 1 ? (currentPage-1) : 1;
        showPage();
    });

    $(".pagination li.pag_next").click(function() {
        if($(this).prev().is('.active')) return;
        $('.numeros.active').removeClass('active').next().addClass('active');
        currentPage = currentPage < totalPages ? (currentPage+1) : totalPages;
        showPage();
    });
});
function myFunction() {
  var input = document.getElementById("myInput");
  var filter = input.value.toLowerCase();
  var nodes = document.getElementsByClassName('card');

  for (i = 0; i < nodes.length; i++) {
    if (nodes[i].innerText.toLowerCase().includes(filter)) {
      nodes[i].style.display = "block";
    } else {
      nodes[i].style.display = "none";
    }
  }
}

$(document).ready(function(){

    $(window).scroll(function(){
        if ($(this).scrollTop() > 200) {
            $('#myBtn').fadeIn();

        } else {
            $('#myBtn').fadeOut();
        };
        
    });
    $('#myBtn').click(function(){
        $('html, body').animate({scrollTop : 0},800);

        return false;
       
    });

});
</script>
  </body>
  <footer>
    <div style="padding-top:100px;width:100%">
   <div>@2018 TECHNICAL UNIVERSITY OF KENYA </div> 
<div style="float:right;right:10px">Project By Rodger M.K</div>
  </div>
  </footer>

</html>