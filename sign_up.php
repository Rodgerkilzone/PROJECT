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
  <a class="navbar-brand" href="#">Levix</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="Jobs.php">Jobs <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Companies.php">Companies</a>
      </li>

    </ul>
    <div>
       <ul class="navbar-nav mr-auto ">
       <li class="nav-item ">
        <a class="nav-link " href="#">Sign in</a>
      </li>
    </ul>

    </div>
  </div>
</nav>

<div class="content">
<div class="card" >
      <form method="post" action="functions/job_seeker_signup.php" class="form-group" enctype="multipart/form-data" style="padding: 5px">
  <nav class="nav nav-pills nav-fill" style="margin: 10px">
  <a class="nav-item nav-link active" href="#">Job Seeker</a>
  <a class="nav-item nav-link" href="sign_company.php">Company</a>
<!--   <a class="nav-item nav-link" href="#">Link</a>
  <a class="nav-item nav-link disabled" href="#">Disabled</a> -->
</nav>
<hr style="margin-top:0px" />
<div class="container">
  <div style="background-color: white;flex:1;text-align: center;">

        <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
         <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>

       <select name="gender" class="form-control">
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
 <!-- <label for="exampleFormControlInput1">Date of Birth</label> -->
    <input type="text" name="location" class="form-control"  placeholder="City/Town" required>
      <!-- <label>Location</label> -->
    <input type="Number" name="phone_number" class="form-control" placeholder="Phone Number" required>
 <!-- <label for="exampleFormControlInput1">Email</label> -->
    <input type="email" name="email" class="form-control"  placeholder="Email" required>
      <input type="password" name="password" class="form-control"  placeholder="Password" required>
        <input type="password" name="confirm_pass" class="form-control"  placeholder="Confirm Password" required>
       
  
  </div>
<div style="background-color: white;flex:1;text-align: center">
<img src="images/prof.png" id="profile" alt="profile image" style="width: 180px;height: 180px;border:1px solid lightblue">
      <div class="custom-file"  style="margin:0 auto 0 auto;margin: 5px" >
<input type="file" onchange="readURL(this);" style="margin-left:45px;width:200px" name="profile_pic">
  <br>
      <?php
       if (isset($_GET['error'])){
        echo '<p style=color:Red>'.$_GET['error'].'</p>'; 
      } ;
       if (isset($_GET['message'])){
        echo '<p style=color:#4CAF50;font-size:20px>'.$_GET['message'].'</p>'; 
      } ;
      ?>
</div>
  </div>
</div>

 <hr style="margin-top: 0px" />
        <input  type="submit" name="submit" value="submit" class="btn btn-primary pull-right">
 </form>
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
<style>
body{
  background-color: #F4F5F7;
}
input,select{
  /*margin:10px;*/
  margin-bottom: 10px;
 /* max-width: 500px;*/

}
.background-image {
  position: fixed;
  left: 0;
  right: 0;
  z-index: 1;

  display: block;
  /*background-image: url('images/image_2.JPG');*/
  width: 100vw;
  height: 100vh;
  background-repeat: no-repeat;
  background-size: 100% 100%;

  -webkit-filter: blur(5px);
  -moz-filter: blur(5px);
  -o-filter: blur(5px);
  -ms-filter: blur(5px);
  filter: blur(5px);
}

@media(min-width: 800px){
.container{
  display: flex;
}
}

.card{
  border-radius: 3px;
  /*width: 50%;*/
  max-width: 50%;
  /*min-width: 400px;*/
  /*height:500px;*/
  padding: 10px;
  box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 5px 0 rgba(0,0,0,.23);
  background-color: white;
  margin: 20px auto 20px auto;
  padding-bottom: 20px;

}
footer{
  background-color: black;
  height: 150px;
  width: 100%;
  color:white;
     position : absolute;
    bottom : 0;
}

</style>
  </body>
<!--   <footer>
    <div style="padding-top:100px;width:100%">
    @2018 TECHNICAL UNIVERSITY OF KENYA 
<div style="float:right;right:10px">Project By Rodger M.K</div>
  </div>
  </footer> -->

</html>