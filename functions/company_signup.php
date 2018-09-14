<?php
       
       if(isset($_POST['submit'])){
include "connect.php";
$company_name=$_POST['company_name'];
$company_type=$_POST['company_type'];
$about=$_POST['about'];
$location=$_POST['location'];
$email=$_POST['email'];
$phone_number=$_POST['phone_number'];
$password=md5($_POST['password']);
$confirm_pass=md5($_POST['confirm_pass']);
$facebook_url=$_POST['facebook_url'];
$twitter_url=$_POST['twitter_url'];

if($password!=$confirm_pass)
{
exit(header("location:../sign_company.php?error=wrong password confirmation"));	
}else{
$select = mysqli_query($conn, "SELECT `email` FROM `company` WHERE `email` = '$email' UNION SELECT `email` FROM `job_seeker` WHERE `email` = '$email' ");
if(mysqli_num_rows($select)) {
  
  exit(header("location:../sign_company.php?error=This email is already being used"));
}else{
$sql="INSERT INTO `company`(company_name,company_type,email,about,location,phone_number,password,facebook_url,twitter_url ) VALUES ('$company_name','$company_type','$email','$about','$location','$phone_number','$password','$facebook_url','$twitter_url')";

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

  exit(header("location:../sign_company.php?message=Registration successfull"));
}
}

};
       ?>