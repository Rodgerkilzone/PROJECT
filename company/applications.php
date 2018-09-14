<?php
    ob_start();
    
include "../functions/connect.php";
if(isset($_COOKIE['sess_user'])){
$email=$_COOKIE['sess_user'];
$id=$_GET['company_id'];
// echo $email;
$check=mysqli_query($conn, "SELECT * FROM `company` WHERE `company_id` = '$id' ");
$rows = mysqli_fetch_array($check);
  if($rows['email']==$_COOKIE['sess_user']){


?>
<html lang="en">
<?php 
if(isset($_GET['company_id'])){

    $company_id=$_GET['company_id'];
    include "../functions/connect.php";
   $select = mysqli_query($conn, "SELECT * FROM `company` WHERE `company_id` = '$company_id' ");
    if (mysqli_num_rows($select)) {
    
    ?>
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="page icon" href="../images/logo.png" />
 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css">
    <title>Levix Jobs</title>
  </head>
  <body>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
   <a class="navbar-brand" href="#">Levix   <?php 
if(isset($_COOKIE["sess_user"])){
include "../functions/connect.php";
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
        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../jobs.php">Jobs <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../companies.php">Companies</a>
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
    
   <a class="nav-link " href="../functions/logout.php">Logout</a>
     
      </li>
<?php
  include "../functions/connect.php";
 $select = mysqli_query($conn, "SELECT * FROM `job_seeker` WHERE `email` = '$email' ");
    while ($row = mysqli_fetch_array($select)) {
$user_id=$row['user_id'];
    ?>

      <li class="nav-item ">
 <a class="nav-link " href=<?php echo "../user/profile.php?user_id=".$user_id ?>>Account</a>
</li>
<?php };?>

    <?php } ?>
<?php
include "../functions/connect.php";
if(isset($_COOKIE['sess_user'])){
$email=$_COOKIE['sess_user'];
$id=$_GET['company_id'];
// echo $email;
$check=mysqli_query($conn, "SELECT * FROM `company` WHERE `company_id` = '$id' ");
$rows = mysqli_fetch_array($check);
  if($rows['email']==$_COOKIE['sess_user']){






?>
 <li class="nav-item ">
 <a class="nav-link " href=<?php echo "../company/profile.php?company_id=".$company_id ?>>Account</a>
</li>
<?php }}?>
    </ul>

    </div>
  </div>
</nav>
<div class="parallax" style="height:340px">
  <!-- <img c src="images/jobs.jpg" style="width: 100%;height:100%" > -->
  <div style="width: 100%;color:white">
    <div class="dark" style="float:left;background-color: black;opacity:0.7;width: 100%;height:105%;margin: 0 auto 0 auto"></div>
<div style="position: absolute;float: left;padding: 10px;width: 70%;">
  <?php 
   include "../functions/connect.php";
             $company_id=$_GET['company_id'];
         $query = mysqli_query($conn,"SELECT * from company WHERE company_id='$company_id'");
               while ($row = mysqli_fetch_array($query)) {

  ?>
  <div style="float: left;margin:5px"> <img src=<?php 
// echo  "../images/profile/company/".$row['email'].".jpg";  
if(file_exists("../images/profile/company/".$row['email'].".jpg")){
  echo  "../images/profile/company/".$row['email'].".jpg"; 
}
else{
  if(file_exists("../images/profile/company/".$row['email'].".png")){
  echo  "../images/profile/company/".$row['email'].".png"; 
}else{

  echo "../images/profile/company/prof.png"; 
}
}
    ?> style="width: 100px;height: 100px;border-radius: 50px"></div><div style="float:left;margin:5px">
    <h5><?php echo $row['company_name']; ?></h5>
<p style="font-size:14">
  Follow company on social media.  <br/>
 <!--  <a href="#">facebook</a>,<a href="#">twitter</a> -->
   <a class="btn btn-social btn-facebook" href=<?php echo $row['facebook_url'];?>  >
    <span class="fa fa-facebook"></span>facebook
  </a> 
      <a class="btn btn-social-icon btn-twitter" href=<?php echo $row['twitter_url'];?> >
    <span class="fa fa-twitter"></span>
  </a>
   
</p>
  </div>

<?php } ?>
</div>
  </div>


</div>

<h5 style="text-align: center;margin: 20px">COMPANY INFORMATION AND THEIR JOB POSTS</h5>
 <!-- <br> -->
  <!-- <hr/> -->
 <div class="main">
 <div class="about" style="background-color:white">
  <?php 
   include "../functions/connect.php";
   $company_id=$_GET['company_id'];
// $query = mysqli_query($conn,"SELECT * from company WHERE company_id='$company_id'");
         $query = mysqli_query($conn,"SELECT * from company WHERE company_id='$company_id'");
               while ($row = mysqli_fetch_array($query)) {
  ?>
<h6 style="color: blue">Description</h6>
<p>Company name: <b><?php echo $row['company_name']; ?></b></p>
<p><?php echo $row['about']; ?></p>

<h6 style="color: blue">City/Town</h6>
<?php echo $row['location']; ?>
 <h6 style="color: blue">Phone number</h6>
<?php echo $row['phone_number']; ?>
 <h6 style="color: blue">Email</h6>
<?php echo $row['email']; ?>
<?php } ?>
</div>
<div class="container" style="background-color:white">
<p style="width: 100%;font-weight: bold"> <a href=<?php echo "profile.php?company_id=".$_GET['company_id'] ?>  style="float: left">JOBS</a> <span style="float:right">APPLICATIONS</span> </p>

 <div  class="tab-pane fade table-responsive">

    </div>
 <table class="table table-hover table-striped table-bordered " style="z-index: 0">
    
  <thead>
    <tr>
      <th scope="col">#</th>
            <th scope="col">Reply</th>
      <th scope="col">Job</th>
      <th scope="col">Applicant</th>
      <th scope="col">Email</th>
       <th scope="col">CV</th>
        <th scope="col">Cover letter</th>
       <th scope="col">Account</th>
      <th scope="col">Response</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  include "../functions/connect.php";

  $no=1;
     $company_id=$_GET['company_id'];
            $query = mysqli_query($conn,"SELECT * from jobs WHERE company_id='$company_id'");
               while ($row = mysqli_fetch_array($query)) {
                $job_id=$row['job_id'];
       $query2 = mysqli_query($conn,"SELECT * from applications WHERE job_id='$job_id'");
               while ($row2 = mysqli_fetch_array($query2)){
               $user_id=$row2['user_id'];
                    $query3= mysqli_query($conn,"SELECT * from job_seeker WHERE user_id='$user_id'");
               while($row3= mysqli_fetch_array($query3)){
   $query5 = mysqli_query($conn,"SELECT * from message WHERE job_id='$job_id' and user_id='$user_id' ORDER BY date_sent DESC");
               $row5 = mysqli_fetch_array($query5);

      ?>
    <tr>
      <th scope="row"><?php echo $no; $no++?></th>
            <th scope="row"><input type="checkbox" <?php if(isset($row5['message'])){echo "checked";} ?> disabled></th>
      <td><a href="#"><?php echo $row['job_name']; ?></a></td>
      <td><?php echo $row3['first_name']." ".$row3['last_name']; ?></td>
      <td><?php echo $row3['email']; ?></td>
      <td><a href=<?php
      if(file_exists("../assets/cv_docs/".$job_id."_".$user_id.".docx")){
echo "../assets/cv_docs/".$job_id."_".$user_id.".docx";}else{
echo "../assets/cv_docs/".$job_id."_".$user_id.".pdf";
}


      ?> download=<?php echo $row3['first_name']."_".$row3['last_name'] ."(CV)"   ?>>Download CV</a></td>
        <td><a href=<?php
      if(file_exists("../assets/cover_docs/".$job_id."_".$user_id.".docx")){
echo "../assets/cover_docs/".$job_id."_".$user_id.".docx";}else{
echo "../assets/cover_docs/".$job_id."_".$user_id.".pdf";
}


      ?> download=<?php echo $row3['first_name']."_".$row3['last_name'] ."(Cover_letter)" ?>>Cover letter</a></td>
      <td><a href=<?php echo "../user/profile.php?user_id=".$user_id; ?> >View</a></td>
      <td><button class="btn btn-primary" data-toggle="modal" data-target=<?php echo "#response_".$row['job_id']."_".$row2['user_id']; ?> >Send</button></td>
    </tr>
    <div class="modal fade" id=<?php echo "response_".$row['job_id']."_".$row2['user_id']; ?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="color: #555">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: blue;font-weight: bold"><?php echo "Respond to ".$row3['first_name']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
<form method="post" action="" class="form-group" >
  <input type="text" name="user_id" value=<?php echo $row2['user_id'];?> style="display:none">
   <input type="text"  name="job_id" value=<?php echo $row2['job_id'];?> style="display:none">
  <textarea name="message" placeholder="Enter message" class="form-control" required></textarea>
  <input type="submit" name="submit" value="send" class="btn btn-primary form-control">
<?php
   
       if(isset($_POST['submit'])){

include "../functions/connect.php";
$message=$_POST['message'];
$user_id=$_POST['user_id'];
$job_id=$_POST['job_id'];

 $query = mysqli_query($conn,"SELECT * from message WHERE user_id='$user_id' and job_id='$job_id'");
 $row = mysqli_fetch_array($query);
            if(is_array(json_decode($row['message'],true))){
$age = array($message=>Date('Y-m-d H:i:s'));
$new = json_encode($age);
$ageEncoded=json_encode(array_merge(json_decode($row['message'],true),json_decode($new,true)));
$update= "UPDATE message SET message='$ageEncoded' WHERE user_id='$user_id' and job_id='$job_id'";
mysqli_query($conn,$update);
exit(header("location:../functions/redirect.php?id=$_GET[company_id] "));
}else{
  $age = array($message=>Date('Y-m-d H:i:s'));
$ageEncoded = json_encode($age);
$update= "INSERT INTO message(job_id,user_id,message,date_sent,viewed) VALUES('$job_id','$user_id','$ageEncoded ',CURRENT_TIMESTAMP,'1') ";
mysqli_query($conn,$update);
exit(header("location:../functions/redirect.php?id=$_GET[company_id] "));
}

}

?> 


</form>
 <?php 
include "../functions/connect.php";

 
 $message=json_decode($row5['message'],true);
@ $keys=array_keys($message) ;
$value=0;
while(isset($keys[$value])){
      ?>
  <div style="width:100%;margin:0 auto 0 auto;background-color: lightblue;padding:5px;margin-top:5px">
   <?php echo $keys[$value]; ?> 
      <br><br>
     <small><b><?php echo "Date sent: ".implode(array_slice($message, $value, 1)) ; ?></b></small>
  </div>
    <?php $value=$value+1;} ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <?php } } }?>

  </tbody>

</table>
</div>
</div>
<!-- //////////////////////////////////////////////////// -->

<style>
body{
  margin: 0px;
  /*background-color:#F4F5F7;*/
}
table{
  color:black;
  z-index: 99999;
  border: 9px solid black;
}
input,textarea{
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
  background-color: white;
}
.container{

  padding: 10px;
}
.card{
  /*padding:5px;*/
  width: 280px;
  /*height: 320px;*/
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
/*z-index: -1;*/



background-color:black;

}
.parallax{
  /*display: none;*/
  padding:50px;
   background-image: url("../images/jobs2.jpg");
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
   /*  position : absolute;
    bottom : 0;*/
  color:white;
  bottom: 0;
}
@media(min-width: 700px){
.main{
  display: flex;
  flex-wrap: wrap;
  padding: 5px;
align-items: flex-start;

}
/*.dark{
height: 115%
}*/
}
@media(min-width: 700px){

/*.dark{
height: 120%
}*/
}
.dark{
height: 110%
}
.about{
  padding: 5px;
flex:1;
/*border:0.5px solid #e5e5e5;*/
  box-shadow: 0 1px 1.5px 0 rgba(0,0,0,.12), 0 1px 1px 0 rgba(0,0,0,.24);
margin-right: 5px;
margin-left: 5px;
padding-bottom: 50px;
}
.container {
  margin-right:10px;
margin-left: 10px;
/*margin-top:50px;*/

  /*border:0.5px solid #e5e5e5;*/
    box-shadow: 0 1px 1.5px 0 rgba(0,0,0,.12), 0 1px 1px 0 rgba(0,0,0,.24);
flex:3;
  margin: 0 auto 0 auto;
  /*max-width: 1200px;*/
  flex-wrap: wrap;

  display: flex;
  justify-content: space-around;
  display: flex;
  /*justify-content:center;*/
}
.container > .card {
  overflow:hidden;
  border-radius: 5px;
  box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 5px 0 rgba(0,0,0,.23);
  background-color: white;
  flex-basis: 280px;
  margin:10px auto 0 auto;
  text-align: left;
  border: 0px solid #e5e5e5;
  /*font-size: 30px;*/
  /*height:200px;*/
  transition:transform 200ms ease;
}
</style>

  </body>
  <footer>
    <div style="padding-top:100px;width:100%">
   <div>@2018 TECHNICAL UNIVERSITY OF KENYA </div> 
<div style="float:right;right:10px">Project By Rodger M.K</div>
  </div>
  </footer>
<?php }else{
  echo "USER DOES NOT EXIST";
} }else{
echo "PLEASE SELECT USER";
}?>
<?php }else{echo "PLEASE LOGIN";}}?>
</html>