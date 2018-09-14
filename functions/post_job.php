<?php
       
       if(isset($_POST['submit'])){
include "connect.php";
$company_id=$_POST['company_id'];
$job_name=$_POST['job_name'];
$job_type=$_POST['job_type'];
$about=$_POST['about'];
$requirement=$_POST['requirement'];
$resposibility=$_POST['resposibility'];
$experience=$_POST['experience'];
$salary=$_POST['salary'];
$deadline=$_POST['deadline'];
$sql="INSERT INTO jobs(company_id,job_name,job_type,about,requirements,resposibility,experience,salary,deadline,date_posted ) VALUES ('$company_id','$job_name','$job_type','$about','$requirement','$resposibility','$experience','$salary','$deadline',CURRENT_TIMESTAMP)";

mysqli_query($conn,$sql);
$query = mysqli_query($conn,"SELECT MAX(job_id) as max FROM jobs WHERE company_id='$company_id'"); 
$row = mysqli_fetch_array($query);
$highest_id = $row['max'];

if($_FILES["job_pic"]["name"]!==""){
	$ext=end(explode(".",$_FILES["job_pic"]["name"]));
				if($ext=="jpg" || "png"){
			$_FILES["job_pic"]["name"]=$company_id."_".$highest_id.".".$ext;
				$filetmp=$_FILES["job_pic"]["tmp_name"];
				$filename=$_FILES["job_pic"]["name"];
				$filetype=$_FILES["job_pic"]["type"];
				
				$filepath="../images/jobs/".$filename;

			move_uploaded_file($filetmp,$filepath);
				}
	
}

  exit(header("location:../company/profile.php?company_id=$company_id"));
};
       ?>