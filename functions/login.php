 <?php
 include "connect.php";
 if(isset($_POST['submit']) ){
 $email_1=$_POST['email'];

$password_1=md5($_POST['password']);


$query = mysqli_query($conn,"SELECT * FROM job_seeker WHERE password='$password_1' AND email='$email_1'");
$rows = mysqli_num_rows($query);
if ($rows == 1) {

$_SESSION['sess_user']=$email_1;

setcookie("sess_user", $email_1, time()+ (86400 * 30),'/');

header("location:../index.php");

} else {

	$query = mysqli_query($conn,"SELECT * FROM company WHERE password='$password_1' AND email='$email_1'");
$rows = mysqli_num_rows($query);
if ($rows == 1) {
   
$_SESSION['sess_user']=$email_1;

setcookie("sess_user", $email_1, time()+ (86400 * 30),'/');

header("location:../index.php");

} 
else{
$error = "Wrong Password";
header("location:../index.php?error=wrong password");
}
header("location:../index.php");

}



 };
?>