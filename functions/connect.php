<?php
$host="localhost";
$username="root";
$password="";
$database="levix";
$conn=mysqli_connect("$host", "$username", "$password","$database")or die("cannot connect"); 
mysqli_select_db($conn,"$database")or die("cannot find database");


	?>