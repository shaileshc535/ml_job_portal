<?php
// include('include/header2.php');
ob_start();
session_start();
include('../admin/assets/_dbconnect.php');
$pid = $_GET['id'];
// $type= get_safe_value($con,$_POST['type']);

if(isset($_SESSION['loggedin'])){
    $uid = $_SESSION['loggedin'];
    if(mysqli_num_rows(mysqli_query($con,"select * from job_shortlist where user_id='$uid' and id_jobpost='$pid'"))>0){

        echo"Already Added";
    }
    else{
        $date = date('y-m-d h:i:s');           
        mysqli_query($con,"insert into job_shortlist(user_id,id_jobpost,date) values('$uid','$pid','$date')");
        header('Location:job-listings.php');  
    }
}
else{
    echo"Not Loggedin";
}


?>