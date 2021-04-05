<?php
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mayajobportal";
	
    $conn = mysqli_connect($serverName, $username, $password, $dbname);

    #$date = date("Y-m-d");
    #$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
    #$query = "INSERT INTO VISITORS(DATE,IP) VALUES ('$date','$host')";
    #$result = mysqli_query($conn,$query);
?>