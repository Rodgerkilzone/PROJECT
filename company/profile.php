<html lang="en">
<?php
    ob_start(); 
?>
<link rel="page icon" href="../images/logo.png" />
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
        <a class="nav-link " href="../index.php" >Sign in</a>
  
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
<br>
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
<button type="submit"  class="btn btn-primary" data-toggle="modal" data-target="#edit">Edit</button>
<?php }}?>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="color: #555">
      <form method="post" action="../functions/company_edit.php" class="form-group" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: green;font-weight: bold">Edit Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

            <?php 
include "../functions/connect.php";
  $id=$_GET['company_id'];
 $select = mysqli_query($conn, "SELECT * FROM `company` WHERE `company_id` = '$id' ");
    while ($row = mysqli_fetch_array($select)) {

    ?>
        <input type="number" name="company_id" class="form-control"   value=<?php echo $_GET['company_id']; ?> style="display:none">
    <textarea type="text" name="company_name" class="form-control" placeholder="company name" required value=<?php echo $row['company_name']; ?>  ><?php echo $row['company_name']; ?></textarea>
    <input type="text" name="company_type" class="form-control" placeholder="company type" required value=<?php echo $row['company_type']; ?>  >
     <textarea type="text" name="about" class="form-control" placeholder="company description" required value=<?php echo $row['about']; ?> ><?php echo $row['about']; ?> </textarea>
     <input type="text" name="location" class="form-control" placeholder="City/Town" required value=<?php echo $row['location']; ?>  >
      <input type="email" name="email" class="form-control" placeholder="Email" required  value=<?php echo $row['email']; ?>  >
      <input type="number" name="phone_number" class="form-control"  placeholder="phone number" required value=<?php echo $row['phone_number']; ?>  >
          <input type="text" name="facebook_url" class="form-control"  placeholder="Facebook link">
    <input type="text" name="twitter_url" class="form-control"  placeholder="Twitter link">

      <input type="password" name="password" class="form-control"  placeholder="Password" required>
        <input type="password" name="confirm_pass" class="form-control"  placeholder="Confirm Password" required>
          <img src="../images/prof.png" id="profile1" alt="profile image" style="width: 180px;height: 180px;border:1px solid lightblue">
      <!-- <div class="custom-file"  style="margin:0 auto 0 auto;margin: 5px" > -->
<input type="file" onchange="readURL1(this);" style="margin-left:45px;width:200px" name="profile_pic">
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
<?php } ?>
</div>
<div class="container" style="background-color:white">
<p style="width: 100%;font-weight: bold"> JOBS 
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
  <a href=<?php echo "applications.php?company_id=".$_GET['company_id'] ?> style="float: right">APPLICATIONS</a>
<?php }}?>

  <br><br>
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
  <button class="btn btn-primary" data-toggle="modal" data-target="#postjob">+ Add Job</button>
<?php }}?>


   </p>
<div class="modal fade" id="postjob" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="color: #555">
            <form method="post" action="../functions/post_job.php" class="form-group" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="color: black;font-weight: bold">POST JOB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

 <input type="text" name="company_id" value=<?php 
 $company_id=$_GET['company_id'];
echo $company_id;

 ?> class="form-control" placeholder="Enter job name" style="display:none;">
    <input type="text" name="job_name" class="form-control" placeholder="Enter job name" required>
    <div class="input-group" style="margin-bottom: 5px">
  <div class="input-group-prepend">
    <span class="input-group-text">Experience</span>
  </div>
     <select name="job_type" class="form-control" required> 
        <option value="Engineering">Engineer</option>
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
  </div>
    <textarea type="text" name="about" class="form-control"  placeholder="Enter job Description" required></textarea>
    <textarea type="text" name="requirement" class="form-control"  placeholder="Requirements" required></textarea>
    <textarea type="text" name="resposibility" class="form-control"  placeholder="Resposibility" required></textarea>
 
    <div class="input-group" style="margin-bottom: 5px">
  <div class="input-group-prepend">
    <span class="input-group-text">Job Type</span>
  </div>
     <select name="experience" class="form-control" required>
    <option value="N/A">N/A</option>
        <option value="0-2(Years)">0-2 years</option>
        <option value="3-5(Years)">3-5 years</option>
        <option value="Above_5(Years)">Above 5 years</option>
    </select>
  </div>
    <div class="input-group" style="margin-bottom: 5px">
  <div class="input-group-prepend">
    <span class="input-group-text">Salary</span>
  </div>
    <input type="text" name="salary" class="form-control"  placeholder="Ksh 50,000-100,000" required>
  </div>
   <hr>

  <div class="input-group" style="margin-bottom: 5px">
  <div class="input-group-prepend">
    <span class="input-group-text">Application Deadline</span>
  </div>

    <input type="date" name="deadline" class="form-control"  placeholder="deadline" required>

  </div>
 <label style="color:red">Job post image</label><br>

<img src="../images/placeholder.png" id="profile2" alt="profile image" style="width: 180px;height: 180px;border:1px solid lightblue">
      <!-- <div class="custom-file"  style="margin:0 auto 0 auto;margin: 5px" > -->
<input type="file" onchange="readURL2(this);" style="margin-left:45px;width:200px" name="job_pic" required>

  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input  type="submit" name="submit" value="submit" class="btn btn-primary pull-right">
      </div>
    </form>
    </div>
  </div>
</div>
 <?php
  $query = mysqli_query($conn,"SELECT * from jobs WHERE company_id='$company_id' ORDER BY deadline DESC");
   $row_test = mysqli_fetch_array($query);
            if(!isset($row_test['company_id'])){
              echo "<h1 style=color:gray>NO JOBS POSTED</h1>";
            };
            include "../functions/connect.php";
            $company_id=$_GET['company_id'];
            $query = mysqli_query($conn,"SELECT * from jobs WHERE company_id='$company_id' ORDER BY deadline DESC");
               while ($row = mysqli_fetch_array($query)) {

                
       $query2 = mysqli_query($conn,"SELECT * from company WHERE company_id='$company_id'");
               $row2 = mysqli_fetch_array($query2)


                ?>
<div class="card" >
  <div style="margin-top:5px"><div style="float: left" class="avatar"><img src=<?php 

if(file_exists("../images/profile/company/".$row2['email'].".jpg"))
echo "../images/profile/company/".$row2['email'].".jpg"; 
else{
  echo "../images/profile/company/".$row2['email'].".png";
}

?>  alt="" style="width: 100%;height:100%"></div>
 <form action="" method="post" style="margin: 0;padding: 0">
<input type="text" name="id" value=<?php echo $row['job_id']; ?> style="display:none">
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
 <button style="float:right;"  type="submit" name="delete_job" class="btn btn-outline-danger">Delete</button>
<?php }}?>
 


<?php 
if(isset($_POST['delete_job'])){

  include "../functions/connect.php";
  // $email=$_COOKIE["sess_user"];
  $id=$_POST['id'];
 $select = mysqli_query($conn, "DELETE FROM  `jobs`WHERE job_id='$id' ");
mysqli_query($conn,$select);
 exit(header("location:../company/profile.php?company_id=$company_id"));
}
?>
</form>
<div style="float:left;margin-left: 4px"><h6 style="line-height: 30px"><?php echo $row2['company_name']; ?></h6></div>
</div>
<img src=<?php 

if(file_exists("../images/jobs/".$row['company_id']."_".$row['job_id'].".jpg"))
echo "../images/jobs/".$row['company_id']."_".$row['job_id'].".jpg"; 
else{
  echo "../images/jobs/".$row['company_id']."_".$row['job_id'].".png";
}

?>  style="height:150px">
<div class="detail">
<h6><?php echo $row['job_name']; ?></h6>  
<small>
  <?php echo $row['about'];?>
</small>
<br/><small style="float: right;color:gray;margin-bottom: 3px"><?php echo $row['job_type']; ?></small>
<!-- <?php echo $row['deadline']; ?> -->
<hr/>
<?php if(Date('Y-m-d')>$row['deadline']){  ?>
<strong style="font-size: 11px;color: red">DEADLINE: <?php echo $row['deadline']; ?></strong><br>
<?php }else{ ?>
<strong style="font-size: 11px;color: green">DEADLINE: <?php echo $row['deadline']; ?></strong><br>
<?php } ?>
<button  style="float:left;" type="button" class="btn btn-info"  data-toggle="modal" data-target=<?php echo "#view_".$row['job_id']; ?> >View</button>
<?php // @ session_start();
if(isset($_COOKIE["sess_user"])){
include "../functions/connect.php";
  $email=$_COOKIE["sess_user"];
 $select = mysqli_query($conn, "SELECT * FROM `job_seeker` WHERE `email` = '$email' ");
if(mysqli_num_rows($select)) { 

?> 
<!-- <small>-(JOB SEEKER)</small> -->
<button style="float:right;" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target=<?php echo "#apply_".$row['job_id']; ?> >Apply</button>

<?php }}else{ ?>
<!-- <small>-(COMPANY)</small> -->

<a href="../index.php"><button style="float:right;" type="button" class="btn btn-outline-primary">Login</button></a>
<?php }?>
</div>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="modal fade" id="<?php echo "view_".$row['job_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <form method="post" action="../functions/apply_job.php" class="form-group" enctype="multipart/form-data">
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
include "../functions/connect.php";
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
</div>

<script type="text/javascript">
  function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile1')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
     function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile2')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    } 
</script>
<style>
body{
  margin: 0px;
  /*background-color:#F4F5F7;*/
}
input,textarea,select{
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
</html>