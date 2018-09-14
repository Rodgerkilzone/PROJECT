<?php
   
       if(isset($_POST['submit'])){

include "../functions/connect.php";
  $email=$_COOKIE["sess_user"];
 $select = mysqli_query($conn, "SELECT * FROM `job_seeker` WHERE `email` = '$email' ");
    while ($row = mysqli_fetch_array($select)) {
$user_id=$row['user_id'];


$hobby=$_POST['hobby'];

 $query = mysqli_query($conn,"SELECT * from job_seeker WHERE user_id=$user_id");
 $row2 = mysqli_fetch_array($query);
            if(is_array(json_decode($row2['hobbies'],true))){



$age = array($hobby=>null);
$new = json_encode($age);
$ageEncoded=json_encode(array_merge(json_decode($row2['hobbies'],true),json_decode($new,true)));
$update= "UPDATE job_seeker SET hobbies='$ageEncoded' WHERE user_id=$user_id ";
mysqli_query($conn,$update);
 exit(header("location:../user/profile.php?user_id=$user_id&message=Hobby updated"));
}else{
  $age = array($hobby=>null);
$ageEncoded = json_encode($age);

$update= "UPDATE job_seeker SET hobbies='$ageEncoded' WHERE user_id=$user_id ";
mysqli_query($conn,$update);
}
 exit(header("location:../user/profile.php?user_id=$user_id&message=Hobby updated"));

}}

?> 
