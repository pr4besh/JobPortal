<?php
include '../config.php';

session_start();
    $regid = $_SESSION['regid'];
    $jobId = $_GET["jobId"];
         
    $insertQuery = "Insert into appliedJob(regId, jobDetailsId) values('$regid', '$jobId')";
    $result = mysqli_query($conn, $insertQuery);
         
    if($result)
    {
        echo '<script>
        alert("Successfully Applied.");
        window.location ="home.php";
        </script>';
    }
    else
    {
        echo'<script>
        alert("Already applied!");
        window.location ="home.php";</script>';
    }
?>