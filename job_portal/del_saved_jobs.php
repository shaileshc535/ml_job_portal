<?php
ob_start();
session_start();
include('../admin/assets/_dbconnect.php');
if(isset($_SESSION['loggedin'])){
    $uid=$_SESSION['loggedin'];




$type=$_GET['type'];
$id=$_GET['id'];

if($type=='delete'){
    $sql = mysqli_query($con,"DELETE FROM job_shortlist where id_jobpost='$id' AND `user_id`='$uid'");
    header('location:candidate-dashboard-saved-jobs.php');
    exit;
}


                                                    
}
else{
    echo 'ma chudao';
}



?>