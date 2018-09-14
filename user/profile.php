<html lang="en">
<link rel="page icon" href="../images/logo.png" />
<?php 
if(isset($_GET['user_id'])){

    $user_id=$_GET['user_id'];
    include "../functions/connect.php";
   $select = mysqli_query($conn, "SELECT * FROM `job_seeker` WHERE `user_id` = '$user_id' ");
    if (mysqli_num_rows($select)) {
    
    ?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
 <a class="navbar-brand" href="#">Levix  
  <?php 
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
        <a class="nav-link" href="../Companies.php">Companies</a>
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

    </ul>

    </div>
  </div>
</nav>
<?php

if(isset($_GET['message']))
{

  echo "<script> alert('".$_GET['message']."')</script>";

}


 ?>

<div  style="width: 90%;margin: 0 auto 0 auto;box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 5px 0 rgba(0,0,0,.23);">
	<?php 
   include "../functions/connect.php";
   $user_id=$_GET['user_id'];
            $query = mysqli_query($conn,"SELECT * from job_seeker WHERE user_id= $user_id");
               while ($row = mysqli_fetch_array($query)) {
    
  ?>
  <div style="width: 100%;height:180px;" class="bg-img">

		<img src=<?php 

if(file_exists("../images/profile/job_seeker/".$row['email'].".jpg")){
 echo  "../images/profile/job_seeker/".$row['email'].".jpg";   
}

else{
  if(file_exists("../images/profile/job_seeker/".$row['email'].".png")){
 echo  "../images/profile/job_seeker/".$row['email'].".png";   
}else{

  echo "../images/profile/job_seeker/prof.png"; 
}
}
    ?> alt="profile img" style="width: 150px;height: 150px;margin-left:50px;transform: translateY(60px);border: 3px solid white;box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 5px 0 rgba(0,0,0,.23)">
	
  </div>
	<div style="width: 100%;background-color: white;min-height:60px">

		 <div style="margin-left: 210px"><strong style="margin:5px;overflow: hidden"><?php echo $row['first_name']." ".$row['last_name']; ?>, <?php echo $row['gender']; ?></strong></div></div>
<?php } ?>

</div>
 
<h5 style="text-align: center;margin:20px">JOB SEEKER INFORMATION</h5>

 <div class="main">
 <div class="about" style="background-color:white">
  <?php 
   include "../functions/connect.php";
      $user_id=$_GET['user_id'];
            $query = mysqli_query($conn,"SELECT * from job_seeker WHERE user_id=$user_id");
               while ($row = mysqli_fetch_array($query)) {
  ?>
<h6 style="color: blue">Details</h6>
<p>First name: <b><?php echo $row['first_name']; ?></b></p>
<p>Last name: <b><?php echo $row['last_name']; ?></b></p>
<p>Email: <b><?php echo $row['email']; ?></b></p>
<h6 style="color: blue">City/Town</h6>
 <p><b><?php echo $row['location']; ?></b></p>
 <h6 style="color: blue">Phone Number</h6>
<p><b><?php echo $row['phone_number']; ?></b></p>
<?php
include "../functions/connect.php";


if(isset($_COOKIE['sess_user'])){
$email=$_COOKIE['sess_user'];
$id=$_GET['user_id'];
// echo $email;
$check=mysqli_query($conn, "SELECT * FROM `job_seeker` WHERE `user_id` = '$id' ");
$rows = mysqli_fetch_array($check);
  if($rows['email']==$_COOKIE['sess_user']){





?>
<button type="submit"  class="btn btn-primary" data-toggle="modal" data-target="#edit">Edit</button>
<?php }}?>


<!-- /////////////////////////////////////////////////////////////////////////// -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="color: #555">
      <form method="post" action="../functions/account_edit.php" class="form-group" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: green;font-weight: bold">Edit Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


            <?php 
include "../functions/connect.php";
  $id=$_GET['user_id'];
 $select = mysqli_query($conn, "SELECT * FROM `job_seeker` WHERE `user_id` = '$id' ");
    while ($row = mysqli_fetch_array($select)) {

    ?>
        <input type="number" name="user_id" class="form-control" value=<?php echo $_GET['user_id']; ?>  style="display: none">
    <input type="text" name="first_name" class="form-control" placeholder="first name" value=<?php echo $row['first_name']; ?>  >
    <input type="text" name="last_name" class="form-control" placeholder="last name" value=<?php echo $row['last_name']; ?>  >
     <!-- <input type="text" name="gender" class="form-control"  value=<?php echo $row['gender']; ?>  > -->
        <select name="gender"  value=<?php echo $row['gender']; ?> class="form-control">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
     <input type="text" name="location" class="form-control"  placeholder="City/Town" value=<?php echo $row['location']; ?>  >
      <input type="email" name="email" class="form-control" placeholder="Email" value=<?php echo $row['email']; ?>  >
      <input type="number" name="phone_number" class="form-control" placeholder="phone number" value=<?php echo $row['phone_number']; ?>  >
      <input type="password" name="password" class="form-control"  placeholder="Password" required>
        <input type="password" name="confirm_pass" class="form-control"  placeholder="Confirm Password" required>
          <img src="../images/prof.png" id="profile" alt="profile image" style="width: 180px;height: 180px;border:1px solid lightblue">
   
<input type="file" onchange="readURL(this);" style="margin-left:45px;width:200px" name="profile_pic">
    <?php } ?>
       

      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <input type="submit" name="submit" value="submit" class="btn btn-primary pull-right">
      </div>
    </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<!-- /////////////////////////////////////////////////// -->
 <hr/>
<div><h6 style="color: black">Recommended</h6>
<?php 

include "../functions/connect.php";
$user_id=$_GET['user_id'];
    $query = mysqli_query($conn,"SELECT * from job_seeker WHERE user_id=$user_id");
               while ($row = mysqli_fetch_array($query)) {
 $skills=json_decode($row['skills'],true);
@ $keys=array_keys($skills) ;
$value=0;
while(isset($keys[$value])){

$rec=mysqli_query($conn,"SELECT * from jobs WHERE deadline>=CURRENT_TIMESTAMP");
   while ($row = mysqli_fetch_array($rec)) {
// 
$sim = similar_text($row['job_name'],$keys[$value], $perc);
$id=$row['company_id'] ;
$select=mysqli_query($conn,"SELECT * from company WHERE company_id=$id");
   $row_2 = mysqli_fetch_array($select);
if($perc>40){
  
   echo "<a href=../company/profile.php?company_id=".$row['company_id'] .">".$row_2['company_name']." -".$row['job_name']."<a><br>";


}

   };

  $value=$value+1;}}
?>

</div><br>
<?php } ?>
</div>

<div class="container" style="background-color:white;min-height: 500px;">


<ul class="nav nav-tabs nav-justified">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#Education">Education</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  data-toggle="tab" href="#Experience">Experience</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#Skills">Skills</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " data-toggle="tab" href="#Hobbies">Hobbies</a>
  </li>
  <?php
include "../functions/connect.php";

if(isset($_COOKIE['sess_user'])){
$email=$_COOKIE['sess_user'];
$id=$_GET['user_id'];
$check=mysqli_query($conn, "SELECT * FROM `job_seeker` WHERE `user_id` = '$id' ");
$rows = mysqli_fetch_array($check);
  if($rows['email']==$_COOKIE['sess_user']){




?>
       <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#Applications">Applications
    </a>
  </li>
<?php }}?>

</ul>


  <div class="tab-content" style="padding: 20px">
  <!-- /////////////////////////////////////////////////////////////////////////////////////// -->  
    <div id="Education" class="tab-pane fade-in active">
<table  class="table table-striped table-bordered">
      <?php 
include "../functions/connect.php";
  $user_id=$_GET['user_id'];
    $query = mysqli_query($conn,"SELECT * from job_seeker WHERE user_id=$user_id");
               while ($row = mysqli_fetch_array($query)) {
 $education=json_decode($row['education'],true);
@ $keys=array_keys($education) ;
$value=0;
while(isset($keys[$value])){
      ?>
      <tr><td>
        <strong><?php echo $keys[$value]; ?></strong>
  <p><?php echo implode(array_slice($education, $value, 1)) ; ?></p>
    <?php $value=$value+1;}}?>
      </td></tr>
</table>
   <form method="post" action="../functions/education_post.php" class="form-group" style="max-width: 400px">

  <script>
        $(document).ready(function (){
            $("#level").change(function() {
                // foo is the id of the other select box 
                if ($(this).val() ==="College" || $(this).val() ==="University") {
                    $("#course").show();
                  $('#course').attr('required', 'required');

                }else{ 
                 $('#course').removeAttr('required');
                    $("#course").hide();
                } 
            });
        });
    </script>
<?php
include "../functions/connect.php";

if(isset($_COOKIE['sess_user'])){
$email=$_COOKIE['sess_user'];
$id=$_GET['user_id'];
// echo $email;
$check=mysqli_query($conn, "SELECT * FROM `job_seeker` WHERE `user_id` = '$id' ");
$rows = mysqli_fetch_array($check);
  if($rows['email']==$_COOKIE['sess_user']){





?>      <select name="level" id="level" class="form-control" requiredd>
        <option value="Primary">Primary</option>
        <option value="Secondary">Secondary</option>
         <option value="College">College</option>
         <option value="University">University</option>
    </select>
     <input type="text" name="school" class="form-control"  placeholder=" School E.g Nairobi University (2011-2015)"  required>
     <input type="text" name="course" class="form-control"  placeholder=" Course E.g Diploma in Accounting  " id="course" style="display:none"> 
 <input  type="submit" name="submit" value="Add new" class="btn btn-primary pull-right"> 
<?php }}?>

   
 
  </form>
  </form>
    <form action="../functions/delete.php" method="post">
    <input type="text" name="id" style="display: none" value=<?php echo $_GET['user_id']; ?>>
<?php
include "../functions/connect.php";

if(isset($_COOKIE['sess_user'])){
$email=$_COOKIE['sess_user'];
$id=$_GET['user_id'];
// echo $email;
$check=mysqli_query($conn, "SELECT * FROM `job_seeker` WHERE `user_id` = '$id' ");
$rows = mysqli_fetch_array($check);
  if($rows['email']==$_COOKIE['sess_user']){




?>
   <button type="submit" name="delete_education" class="btn btn-danger">Delete all</button>
<?php }}?>

 
  </form>
    </div>

    <!-- //////////////////////////////////////////////////////////////////////////////////// -->
    <div id="Experience" class="tab-pane fade"><table  class="table table-striped table-bordered">
 <?php 
include "../functions/connect.php";
$user_id=$_GET['user_id'];
    $query = mysqli_query($conn,"SELECT * from job_seeker WHERE user_id=$user_id");
               while ($row = mysqli_fetch_array($query)) {
 $experience=json_decode($row['experience'],true);
@ $keys=array_keys($experience) ;
$value=0;
while(isset($keys[$value])){
      ?>
      <tr><td>
<strong><?php echo $keys[$value]; ?></strong>
  <p><?php echo implode(array_slice($experience, $value, 1)) ; ?></p></td></tr>
    <?php $value=$value+1;}}?></table>
   <form method="post" action="../functions/experience_post.php" class="form-group" style="max-width: 400px">

<?php
include "../functions/connect.php";


if(isset($_COOKIE['sess_user'])){
$email=$_COOKIE['sess_user'];
$id=$_GET['user_id'];
// echo $email;
$check=mysqli_query($conn, "SELECT * FROM `job_seeker` WHERE `user_id` = '$id' ");
$rows = mysqli_fetch_array($check);
  if($rows['email']==$_COOKIE['sess_user']){





?>
     <input type="text" name="company" class="form-control"  placeholder=" Company E.g Kcb (2011-2015)"  required>
     <input type="text" name="position" class="form-control"  placeholder=" Position E.g Chief financial officer" >

    <input  type="submit" name="submit" value="Add new" class="btn btn-primary pull-right"> 
<?php }}?>


 
  </form>
  </form>
    <form action="../functions/delete.php" method="post">
    <input type="text" name="id" style="display: none" value=<?php echo $_GET['user_id']; ?>>
    <?php
include "../functions/connect.php";


if(isset($_COOKIE['sess_user'])){
$email=$_COOKIE['sess_user'];
$id=$_GET['user_id'];
// echo $email;
$check=mysqli_query($conn, "SELECT * FROM `job_seeker` WHERE `user_id` = '$id' ");
$rows = mysqli_fetch_array($check);
  if($rows['email']==$_COOKIE['sess_user']){





?>
   <button type="submit" name="delete_experience" class="btn btn-danger">Delete all</button>
<?php }}?>

 
  </form>
    </div>
    <div id="Skills" class="tab-pane fade">
       <?php 
include "../functions/connect.php";
$user_id=$_GET['user_id'];
    $query = mysqli_query($conn,"SELECT * from job_seeker WHERE user_id=$user_id");
               while ($row = mysqli_fetch_array($query)) {
 $skills=json_decode($row['skills'],true);
@ $keys=array_keys($skills) ;
$value=0;
while(isset($keys[$value])){
      ?>
<div class="chip">
<?php echo $keys[$value]; ?>
</div>
    <?php $value=$value+1;}}?>
    <br><br>
   <form method="post" action="../functions/skill_post.php" class="form-group" style="max-width: 400px">
    
<?php
include "../functions/connect.php";


if(isset($_COOKIE['sess_user'])){
$email=$_COOKIE['sess_user'];
$id=$_GET['user_id'];
// echo $email;
$check=mysqli_query($conn, "SELECT * FROM `job_seeker` WHERE `user_id` = '$id' ");
$rows = mysqli_fetch_array($check);
  if($rows['email']==$_COOKIE['sess_user']){





?> 
<input type="text" name="skill" class="form-control"  placeholder=" New Skill"  required>
    <input  type="submit" name="submit" value="Add new" class="btn btn-primary pull-right"> 
<?php }}?>


 
  </form>
  <form action="../functions/delete.php" method="post">
    <input type="text" name="id" style="display: none" value=<?php echo $_GET['user_id']; ?>>
    <?php
include "../functions/connect.php";

if(isset($_COOKIE['sess_user'])){
$email=$_COOKIE['sess_user'];
$id=$_GET['user_id'];
// echo $email;
$check=mysqli_query($conn, "SELECT * FROM `job_seeker` WHERE `user_id` = '$id' ");
$rows = mysqli_fetch_array($check);
  if($rows['email']==$_COOKIE['sess_user']){





?>
    <button type="submit" name="delete_skill" class="btn btn-danger">Delete all</button>
<?php }}?>


  </form>

    </div>
   <style>
.chip {
    display: inline-block;
    padding: 0 25px;
    height: 50px;
    font-size: 18px;
    line-height: 50px;
    border-radius: 25px;
    background-color: #f1f1f1;
}

.closebtn {
    padding-left: 10px;
    color: #888;
    font-weight: bold;
    float: right;
    font-size: 20px;
    cursor: pointer;
}

.closebtn:hover {
    color: #000;
}
</style>
   <!-- </div> -->
    <div id="Hobbies" class="tab-pane fade">
         <?php 
include "../functions/connect.php";
$user_id=$_GET['user_id'];
    $query = mysqli_query($conn,"SELECT * from job_seeker WHERE user_id=$user_id");
               while ($row = mysqli_fetch_array($query)) {
 $hobbies=json_decode($row['hobbies'],true);
@ $keys=array_keys($hobbies) ;
$value=0;
while(isset($keys[$value])){
      ?>
<div class="chip">
<?php echo $keys[$value]; ?>
 
</div>
    <?php $value=$value+1;}}?>
    <br><br>
   <form method="post" action="../functions/hobby_post.php" class="form-group" style="max-width: 400px">
   
     <?php
include "../functions/connect.php";

if(isset($_COOKIE['sess_user'])){
$email=$_COOKIE['sess_user'];
$id=$_GET['user_id'];
// echo $email;
$check=mysqli_query($conn, "SELECT * FROM `job_seeker` WHERE `user_id` = '$id' ");
$rows = mysqli_fetch_array($check);
  if($rows['email']==$_COOKIE['sess_user']){





?> 
 <input type="text" name="hobby" class="form-control"  placeholder=" New hobby"  required>
  <input  type="submit" name="submit" value="Add new" class="btn btn-primary pull-right"> 
<?php }}?>

  
 
  </form>
    <form action="../functions/delete.php" method="post">
    <input type="text" name="id" style="display: none" value=<?php echo $_GET['user_id']; ?>>
    <?php
include "../functions/connect.php";


if(isset($_COOKIE['sess_user'])){
$email=$_COOKIE['sess_user'];
$id=$_GET['user_id'];
// echo $email;
$check=mysqli_query($conn, "SELECT * FROM `job_seeker` WHERE `user_id` = '$id' ");
$rows = mysqli_fetch_array($check);
  if($rows['email']==$_COOKIE['sess_user']){





?>
 <button type="submit" name="delete_hobbies" class="btn btn-danger">Delete all</button>
<?php }}?>

   
  </form>
    </div>
     <div id="Applications" class="tab-pane fade table-responsive">
    <table class="table table-hover table-striped table-bordered ">
    
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Company</th>
      <th scope="col">Job</th>

      <th scope="col">Date</th>
      <th scope="col">Message</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  include "../functions/connect.php";
  $no=1 ; 
  $user_id2=$_GET['user_id'];
            $query = mysqli_query($conn,"SELECT * from Applications WHERE user_id=$user_id2 ORDER BY date_applied DESC"); 
               while ($row = mysqli_fetch_array($query)) {         
                $job_id=$row['job_id'];
       $query2 = mysqli_query($conn,"SELECT * from jobs WHERE job_id='$job_id'");

               while($row2 = mysqli_fetch_array($query2)){
               $company_id=$row2['company_id'];
                    $query3= mysqli_query($conn,"SELECT * from company WHERE company_id='$company_id'");
               while($row3= mysqli_fetch_array($query3)){
  $query4 = mysqli_query($conn,"SELECT * from message WHERE user_id=$user_id2  and  job_id='$job_id' ORDER BY date_sent DESC");
               $row4 = mysqli_fetch_array($query4);
      ?>
    <tr>
      <th scope="row"><?php echo $no ; $no=$no+1; ?></th>
      <td><a href=<?php echo "../company/profile.php?company_id=".$row2['company_id']; ?>><?php echo $row3['company_name']; ?></a></td>
      <td><?php echo $row2['job_name']; ?></td>
      <td><?php echo $row['date_applied']; ?></td>
   
      <td><a href="#" data-toggle="modal" data-target=<?php echo "#response_".$row['job_id']."_".$row['user_id']; ?>> <div class="modal fade" id=<?php echo "response_".$row['job_id']."_".$row['user_id']; ?> tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="color: #555">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: blue;font-weight: bold"><?php echo "Response to ".$row2['job_name']." application"; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
 <?php 
include "../functions/connect.php";
 $message=json_decode($row4['message'],true);
@ $keys=array_keys($message) ;
$value=0;
while(isset($keys[$value])){
      ?>
  <div style="width:100%;margin:0 auto 0 auto;background-color: lightblue;padding:5px;margin-top:5px">
   <?php echo $keys[$value]; ?> 
   <br><br>
     <small><b><?php echo "Date sent: ".implode(array_slice($message, $value, 1)) ; ?></b></small>
  </div>
    <?php $value=$value+1;}?>
    <br>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-outline-primary">Exit</button> -->
      </div>
    </div>
  </div>
</div><span class="badge badge-danger"><?php echo $value; ?> messages</span></a></td>
          
    </tr>
    <?php } }}?>
  </tbody>

</table>
    </div>
  </div>
</div>
<!-- //////////////////////////// -->

</div>
</div>

<style>
body{
  margin: 0px;
  background-color:#FAFAFA;
}
input,select{
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
.bg-img {
  position: relative;
  width: 100%;
  height: 100%;
  background: url('../images/splash.jpg') center center no-repeat;
  background-size: cover;
  
  &:before {
    content: '';
	position: absolute;
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	background-image: linear-gradient(to bottom right,#002f4b,#dc4225);
	opacity: .6; 
  }
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
width:92%;
margin: 0 auto 0 auto;

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
border:0.5px solid #e5e5e5;
margin-right: 5px;
margin-left: 5px;
/*padding-bottom: 50px;*/
  box-shadow: 0 1px 1.5px 0 rgba(0,0,0,.12), 0 1px 1px 0 rgba(0,0,0,.24);
  padding-bottom: 25px;
}
.container {
  margin-right:10px;
/*margin-left: 1px;*/
/*margin-top:50px;*/
 box-shadow: 0 1px 1.5px 0 rgba(0,0,0,.12), 0 1px 1px 0 rgba(0,0,0,.24);
  /*border:0.5px solid #e5e5e5;*/
flex:3;
  padding: 20px;
  /*display: flex;*/
  /*justify-content:center;*/
}
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
</html>