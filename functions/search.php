    <?php 
     // if(isset($_POST['search'])){
    echo $_GET['type'];
    $type=$_GET['type'];
    $exp=$_GET['exp'];

if($_GET['type']=="All_categories"){
    if($_GET['exp']=="N/A"){
      exit(header("location:../jobs.php"));

    }else{
exit(header("location:../jobs.php?exp=".$exp));
    }

  }else{

    if($_GET['exp']=="N/A"){
      exit(header("location:../jobs.php?category=".$type));

    }else{
exit(header("location:../jobs.php?category=".$type."&exp=".$exp));
    }
            
  }
    
     ?>