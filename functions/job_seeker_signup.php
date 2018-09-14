<?php
       
       if(isset($_POST['submit'])){
include "connect.php";
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$gender=$_POST['gender'];
$location=$_POST['location'];
$phone_number=$_POST['phone_number'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$confirm_pass=md5($_POST['confirm_pass']);
if($password!=$confirm_pass)
{
exit(header("location:../sign_up.php?error=wrong password confirmation"));	
}else{
$select = mysqli_query($conn, "SELECT `email` FROM `company` WHERE `email` = '$email' UNION SELECT `email` FROM `job_seeker` WHERE `email` = '$email' ");
if(mysqli_num_rows($select)) {
  exit(header("location:../sign_up.php?error=This email is already being used"));
}else{
$sql="INSERT INTO job_seeker(first_name,last_name,email,gender,location,phone_number,password ) VALUES ('$first_name','$last_name','$email','$gender','$location','$phone_number','$password')";

mysqli_query($conn,$sql);

if($_FILES["profile_pic"]["name"]!==""){
	$ext=end(explode(".",$_FILES["profile_pic"]["name"]));

				if($ext=="jpg" || "png"){
			$_FILES["profile_pic"]["name"]=$email.".".$ext;
				$filetmp=$_FILES["profile_pic"]["tmp_name"];
				$filename=$_FILES["profile_pic"]["name"];
				$filetype=$_FILES["profile_pic"]["type"];
				
				$filepath="../images/profile/job_seeker/".$filename;

			move_uploaded_file($filetmp,$filepath);

				}
}
  exit(header("location:../sign_up.php?message=Registration successfull"));
}
}

};
       ?>