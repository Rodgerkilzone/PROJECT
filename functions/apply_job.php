<?php      
       if(isset($_POST['submit'])){
include "connect.php";
$job_id=$_POST['job_id'];
$user_id=$_POST['user_id'];

$ext=end(explode(".",$_FILES["cover_doc"]["name"]));
$cover_letter_url="assets/cover_docs/".$job_id."_".$user_id.".".$ext;
$ext2=end(explode(".",$_FILES["cv_doc"]["name"]));
$cv_url="assets/cv_docs/".$job_id."_".$user_id.".".$ext2;

$delete= "DELETE FROM applications WHERE job_id='$job_id' and user_id='$user_id'";
mysqli_query($conn,$delete);

$sql="INSERT INTO applications(job_id,user_id,cover_letter_url,cv_url,date_applied ) VALUES ('$job_id','$user_id', '$cover_letter_url','$cv_url',CURRENT_TIMESTAMP)";
mysqli_query($conn,$sql);
$query = mysqli_query($conn,"SELECT MAX(job_id) as max FROM jobs WHERE company_id='$company_id'"); 
$row = mysqli_fetch_array($query);
$highest_id = $row['max'];

if($_FILES["cover_doc"]["name"]!==""){
	$ext=end(explode(".",$_FILES["cover_doc"]["name"]));
				if($ext=="docx" || "pdf"){
			$_FILES["cover_doc"]["name"]=$job_id."_".$user_id.".".$ext;
				$filetmp=$_FILES["cover_doc"]["tmp_name"];
				$filename=$_FILES["cover_doc"]["name"];
				$filetype=$_FILES["cover_doc"]["type"];
				
				$filepath="../assets/cover_docs/".$filename;

			move_uploaded_file($filetmp,$filepath);
				}	
}
if($_FILES["cv_doc"]["name"]!==""){
	$ext=end(explode(".",$_FILES["cv_doc"]["name"]));
				if($ext=="docx" || "pdf"){
			$_FILES["cv_doc"]["name"]=$job_id."_".$user_id.".".$ext;
				$filetmp=$_FILES["cv_doc"]["tmp_name"];
				$filename=$_FILES["cv_doc"]["name"];
				$filetype=$_FILES["cv_doc"]["type"];
				$filepath="../assets/cv_docs/".$filename;
			move_uploaded_file($filetmp,$filepath);
				}
}
  exit(header("location:../jobs.php?message=Application successfull"));
};
       ?>