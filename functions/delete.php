<?php
if(isset($_POST['delete_skill'])){

	include "../functions/connect.php";
	$id=$_POST['id'];
 $select = mysqli_query($conn, "UPDATE  `job_seeker` SET `skills` ='' WHERE user_id='$id' ");
mysqli_query($conn,$select);
 exit(header("location:../user/profile.php?user_id=$id&message=skills deleted"));
}

if(isset($_POST['delete_education'])){

	include "../functions/connect.php";
	$id=$_POST['id'];
 $select = mysqli_query($conn, "UPDATE  `job_seeker` SET `education` ='' WHERE user_id='$id' ");
mysqli_query($conn,$select);
 exit(header("location:../user/profile.php?user_id=$id&message=education deleted"));
}

if(isset($_POST['delete_experience'])){

	include "../functions/connect.php";
	$id=$_POST['id'];
 $select = mysqli_query($conn, "UPDATE  `job_seeker` SET `experience` ='' WHERE user_id='$id' ");
mysqli_query($conn,$select);
 exit(header("location:../user/profile.php?user_id=$id&message=experience deleted"));
}

if(isset($_POST['delete_hobbies'])){

	include "../functions/connect.php";
	$id=$_POST['id'];
 $select = mysqli_query($conn, "UPDATE  `job_seeker` SET `hobbies` ='' WHERE user_id='$id' ");
mysqli_query($conn,$select);
 exit(header("location:../user/profile.php?user_id=$id&message=hobbies deleted"));
}

?>