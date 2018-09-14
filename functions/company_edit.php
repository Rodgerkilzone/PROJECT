<?php
       
       if(isset($_POST['submit'])){
include "connect.php";
$company_id=$_POST['company_id'];
$company_name=$_POST['company_name'];
$company_type=$_POST['company_type'];
$about=$_POST['about'];
$location=$_POST['location'];
$phone_number=$_POST['phone_number'];
$email=$_POST['email'];
$facebook_url=$_POST['facebook_url'];
$twitter_url=$_POST['twitter_url'];
$password=md5($_POST['password']);
$confirm_pass=md5($_POST['confirm_pass']);
if($password!=$confirm_pass)
{

   exit(header("location:../company/profile.php?company_id=$company_id&message=wrong password confirmation"));
}else{
$select = mysqli_query($conn, "SELECT `email` FROM `job_seeker` WHERE `email` = '$email' UNION SELECT `email` FROM `company` WHERE `email` = '$email' and company_id!='$company_id' ");
if(mysqli_num_rows($select)) {

   exit(header("location:../company/profile.php?company_id=$company_id&message=This email is already being used"));
}else{
$sql="UPDATE  company set company_name='$company_name',company_type='$company_type',email='$email',about='$about',location='$location',phone_number='$phone_number',facebook_url='$facebook_url',twitter_url='$twitter_url',password='$password' WHERE company_id='$company_id' ";

mysqli_query($conn,$sql);


if($_FILES["profile_pic"]["name"]!==""){
	
	$ext=end(explode(".",$_FILES["profile_pic"]["name"]));


				if($ext=="jpg" || "png"){
			$_FILES["profile_pic"]["name"]=$email.".".$ext;
				$filetmp=$_FILES["profile_pic"]["tmp_name"];
				$filename=$_FILES["profile_pic"]["name"];
				$filetype=$_FILES["profile_pic"]["type"];
				
				$filepath="../images/profile/company/".$filename;

			move_uploaded_file($filetmp,$filepath);
		

				}
	
}
 exit(header("location:../company/profile.php?company_id=$company_id&message=update successfull"));
}
}

};
       ?>