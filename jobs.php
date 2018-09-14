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
      <li class="nav-item active">
        <a class="nav-link" href="jobs.php">Jobs <span class="sr-only">(current)</span></a>
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
        <a class="nav-link " href="index.php" >Sign in</a>
  
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
<div class="parallax" style="min-height:260px">
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

</div>

<div class="filter">
 <form action="functions/search.php" class="form-inline" style="margin: 0 auto 0 auto;">
  <input class="form-control" id="myInput" onkeyup="myFunction()"  type="search" placeholder="Search for Jobs..." aria-label="Search">
   

<?php
if(isset($_GET['category'])){
  $category1=$_GET['category'];
   $category2=$_GET['category'];
}else{
  $category1="Select_category";
   $category2="All_categories";
};

if(isset($_GET['exp'])){
$exp1=$_GET['exp'];
$exp2=$_GET['exp'];
}else{
$exp1="Select_experience";
$exp2="N/A";
};
?>

Job Type:
<select name="type" class="form-control">
   <option value=<?php echo $category2;?> ><?php echo $category1;?></option>
  <option value="All_categories">All categories</option>
        <option value="Engineering">Engineering</option>
        <option value="ICT_and_Software">ICT and Software</option>
         <option value="Construction">Construction</option>
          <option value="Sales_and_Marketing">Sales and Marketing</option>
           <option value="Design_and_Art">Design and Art</option>
            <option value="Health">Health</option>
             <option value="Banking_and_Finance">Banking and Finance</option>
              <option value="Hospital_and_Tourism">Hospital and Tourism</option>
               <option value="Legal">Legal</option>
                <option value="Management">Management</option>
                 <option value="Media_and_Journalism">Media and Journalism</option>
                  <option value="Other_Jobs">Other Jobs</option>
</select>
Experience:
<select name="exp" class="form-control">
  <option value=<?php echo $exp2;?>><?php echo $exp1;?></option>
      <option value="N/A">N/A</option>
        <option value="0-2(Years)">0-2 years</option>
        <option value="3-5(Years)">3-5 years</option>
        <option value="Above_5(Years)">Above 5 years</option>
</select>
     <button type="submit" name="search" style="margin-right:10px" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
 
  </form>

 </div>
 <hr/>
<div id="container" class="container">


 <?php

            include "functions/connect.php";
            @ $category=$_GET['category'];
            if(isset($_GET['category'])){ 
              if(isset($_GET['exp'])){ 
                $exp=$_GET['exp'];
                $query = mysqli_query($conn,"SELECT * from jobs WHERE deadline>=CURRENT_TIMESTAMP  and job_type='$category' and Experience='$exp' ORDER BY job_id DESC");
              }else{
                  $query = mysqli_query($conn,"SELECT * from jobs WHERE deadline>=CURRENT_TIMESTAMP  and job_type='$category' ORDER BY job_id DESC");
              }

            }else{
              if(isset($_GET['exp'])){ 
                $exp=$_GET['exp'];
              $query = mysqli_query($conn,"SELECT * from jobs WHERE deadline>=CURRENT_TIMESTAMP   and Experience='$exp' ORDER BY job_id DESC");}
              else
              {
                  $query = mysqli_query($conn,"SELECT * from jobs WHERE deadline>=CURRENT_TIMESTAMP ORDER BY job_id DESC");

              }
            }
          
            
               while ($row = mysqli_fetch_array($query)) {
                $company_id=$row['company_id'];
       $query2 = mysqli_query($conn,"SELECT * from company WHERE company_id='$company_id'");
               $row2 = mysqli_fetch_array($query2)


                ?>
<div class="card" id="card" >
  <div style="margin-top:5px"><div style="float: left" class="avatar"><img src=<?php 

if(file_exists("images/profile/company/".$row2['email'].".jpg"))
echo "images/profile/company/".$row2['email'].".jpg"; 
else{
  echo "images/profile/company/".$row2['email'].".png";
}

?>  alt="" style="width: 100%;height:100%"></div>
<div style="float:left;margin-left: 4px"><h6 style="line-height: 30px"><?php echo $row2['company_name']; ?></h6></div>
</div>
<img src=<?php 

if(file_exists("images/jobs/".$row['company_id']."_".$row['job_id'].".jpg"))
echo "images/jobs/".$row['company_id']."_".$row['job_id'].".jpg"; 
else{
  echo "images/jobs/".$row['company_id']."_".$row['job_id'].".png";
}

?>  style="height:150px;width:100%">
<div class="detail">
<h6 id="job_name"><?php echo $row['job_name']; ?></h6>  
<small id="limit">

  <?php echo substr($row['about'], 0, 100).".."; ?>
</small>
<script type="text/javascript"></script>
<br/><small style="float: right;color:gray;margin-bottom: 3px"><?php echo $row['job_type']; ?></small>
<hr/>
<button  style="float:left;" type="button" class="btn btn-info"  data-toggle="modal" data-target=<?php echo "#view_".$row['job_id']; ?> >View</button>
<?php 
if(isset($_COOKIE["sess_user"])){
include "functions/connect.php";
  $email=$_COOKIE["sess_user"];
 $select = mysqli_query($conn, "SELECT * FROM `job_seeker` WHERE `email` = '$email' ");
if(mysqli_num_rows($select)) { 

?> 
<button style="float:right;" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target=<?php echo "#apply_".$row['job_id']; ?> >Apply</button>
<?php }}else{ ?>
<a href="index.php"><button style="float:right;" type="button" class="btn btn-outline-primary">Login</button></a>
<?php }?>


</div>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="modal fade" id=<?php echo "view_".$row['job_id']; ?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="color: #555">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: blue;font-weight: bold"><?php echo $row2['company_name']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        
    <label  style="color: black;font-weight: bold">Job</label>
    <p style="padding-left: 5px"><?php echo $row['job_name']; ?></p>
  <label  style="color: black;font-weight: bold">Type</label>
    <p style="padding-left: 5px"><?php echo $row['job_type']; ?></p>
    <label  style="color: black;font-weight: bold">Detail</label>
    <p style="padding-left: 5px"><?php echo $row['about']; ?></p>

    <label  style="color: black;font-weight: bold">Requirement/Qualifications</label>
    <p style="padding-left: 5px"><?php echo $row['requirements']; ?></p>

    <label  style="color: black;font-weight: bold">Resposibility</label>
    <p style="padding-left: 5px"><?php echo $row['resposibility']; ?></p>
<label  style="color: black;font-weight: bold">Experience</label>
    <p style="padding-left: 5px"><?php echo $row['experience']; ?></p>

    <label  style="color: black;font-weight: bold">Salary</label>
    <p style="padding-left: 5px"><?php echo $row['salary']; ?></p>
     <label  style="color: green;font-weight: bold;font-size:14px">DEADLINE: <?php echo $row['deadline']; ?></label>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="modal fade" id=<?php echo "apply_".$row['job_id']; ?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="color: #555">
      <form method="post" action="functions/apply_job.php" class="form-group" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: green;font-weight: bold"><?php echo $row2['company_name']; ?> -(APPLY)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <label  style="color: black;font-weight: bold">Job</label>
    <p style="padding-left: 5px"><?php echo $row['job_name']; ?> </p>

        <input type="number" name="job_id" class="form-control"  value=<?php echo $row['job_id']; ?> style="display: none">
            <?php 
include "functions/connect.php";
  $email=$_COOKIE["sess_user"];
 $select = mysqli_query($conn, "SELECT * FROM `job_seeker` WHERE `email` = '$email' ");
    while ($row = mysqli_fetch_array($select)) {

    ?>
        <input type="number" name="user_id" class="form-control"  value=<?php echo $row['user_id']; ?>  style="display: none">
    <input type="text" name="first_name" class="form-control"  value=<?php echo $row['first_name']; ?>  disabled>
    <input type="text" name="last_name" class="form-control"  value=<?php echo $row['last_name']; ?>  disabled>
    <input type="email" name="email" class="form-control"  value=<?php echo $row['email']; ?>  disabled>
      <input type="number" name="phone_number" class="form-control"  value=<?php echo $row['phone_number']; ?>  disabled>

    <?php } ?>
     <label style="color:red">Cover Letter</label> <br>

<input type="file" style="margin-left:45px;width:200px" name="cover_doc" required><br>
 <label style="color:red">CV</label> <br>

<input type="file" style="margin-left:45px;width:200px" name="cv_doc" required><br>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <input type="submit" name="submit" value="submit" class="btn btn-primary pull-right">
      </div>
    </form>
    </div>
  </div>
</div>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
</div>

<?php } ?>




</div>

<!-- ///////////////////// -->
<nav aria-label="Page navigation example">
<ul class="pagination justify-content-center">
    <li class="pag_prev page-item">
        <a href="#" class="page-link" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
    </li>
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
body{
   min-height: 100vh;
}
input{
  margin-right:10px;
  margin-bottom:5px;
}
button{
  margin-bottom:5px;
}
select{
  margin-right:10px;
}
.filter{
  margin: 10px;
  padding:5px;
  background-color: white;
}
.detail{
  padding: 3px;
  padding-left:4px;
}
.container{

  padding: 10px
}
.card{
  width: 280px;
  box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 5px 0 rgba(0,0,0,.23);
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
  color:white;
    /*position:absolute;*/
   bottom:0;

}
.container {
  margin: 0 auto 0 auto;
  max-width: 1200px;
  flex-wrap: wrap;
  display: flex;
  justify-content: space-around;
}
.container > .card {
  border-radius: 5px;
  box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 5px 0 rgba(0,0,0,.23);
  background-color: white;
  flex-basis: 280px;
  margin:10px auto 0 auto;
  text-align: left;
  transition:transform 200ms ease;
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
.card{
  display: block;
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
    //////////////////////////////////////

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
function truncateText(selector, maxLength) {
    var element = document.querySelector(selector),
        truncated = element.innerText;

    if (truncated.length > maxLength) {
        truncated = truncated.substr(0,maxLength) + '...';
    }
    return truncated;
}
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