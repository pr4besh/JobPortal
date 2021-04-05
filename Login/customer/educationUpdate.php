<?php

include_once "../config.php";
session_start();

if(!isset($_SESSION['name']))
{
    header("Location: ../login.php");
}

if(isset($_POST['submit']))
{
    $course = $_POST["course"];
    $specialization = $_POST["specialization"];
    $university = $_POST["university"];
    $institution = $_POST["institution"];
    $passingYear = $_POST["passingYear"];
    $educationId = $_POST["educationId"];
    $regid = $_SESSION['regid'];

    $insertQuery = "Update education set course = '$course', specialization = '$specialization', 
                    university = '$university', institution = '$institution', passingYear='$passingYear'
                    where eduId = '$educationId' and cusId = '$regid'";
     $result = mysqli_query($conn, $insertQuery);
      
    if($result)
    {
        echo '<script>
        alert("Thank you for updating your personal information!")
        window.location ="education.php";
        </script>';
    }
    else
    {
        echo'<script>alert("Error Try Again")</script>';
        echo'<script>window.location.replace("education.php");</script>';
    }
}
?>