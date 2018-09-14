<?php
       
       if(isset($_POST['submit'])){
include "connect.php";
$user_id=$_POST['user_id'];
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
	
   exit(header("location:../user/profile.php?user_id=$user_id&message=wrong password confirmation"));
}else{
$select = mysqli_query($conn, "SELECT `email` FROM `company` WHERE `email` = '$email' UNION SELECT `email` FROM `job_seeker` WHERE `email` = '$email' and user_id!='$user_id' ");
if(mysqli_num_rows($select)) {
   exit(header("location:../user/profile.php?user_id=$user_id&message=This email is already being used"));
}else{
$sql="UPDATE  job_seeker set first_name='$first_name',last_name='$last_name',email='$email',gender='$gender',location='$location',phone_number='$phone_number',password='$password' WHERE user_id='$user_id' ";

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
 exit(header("location:../user/profile.php?user_id=$user_id&message=update successfull"));
}
}

};
       ?>