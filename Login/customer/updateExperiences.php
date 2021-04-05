<?php 
session_start();

if(!isset($_SESSION['name']))
{
    header("Location: ../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META INFORMATION -->
    <meta charset="UTF-8"/>
    <meta name="description" content="This is the offical page of Maya Job Portal System">  
    <meta name="author" content="Maya Job Portal System">    
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- ADDING EXTERNAL ICONS AND EXTERNAL CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/dropdownbutton.css">
    <link rel="stylesheet" href="../../css/profile.css">
    <link rel="stylesheet" href="../../css/button.css">
    
    <!-- ADDING EXTERNAL JAVASCRIPT -->
    <script type="text/javascript" src="../../js/dropdown.js"></script>

    <!-- TITLE NAME AND ICON-->
    <title>Maya Job Portal System</title>
    <link rel="icon" type="image" href="../../Logo/Logo.png" alt="Logo" width=60 height=60>
    <style>
    table{
        table-layout:auto;
        width: auto;
        font-size: 15px;
    }
    </style>
</head>
<body>
<!-- HEADER STARTS -->    
<header id="header-sec">
<!-- NAVIGATION STARTS-->
    <nav id="navigation">
        <div class="logo">
            <h1 class="name-logo">
                <a href="home.html"><IMG SRC="../../Logo/LogoFinal.png" ALT="Logo" height="35"></IMG></a>
            </h1>
        </div>
        
            <ul>
                <li><a href="../customer/home.php">Home</a></li>
                <li><a href="../customer/elearning.php">E-learning</a></li> 
                <li><a href="../customer/profile.php">My Profile</a></li> 
                <li><a href="../customer/editProfile.php" class="active">Edit Profile</a></li>
                <li><a href="../customer/status.php">My Status</a></li>
                <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn" style="width: auto;"><?php echo $_SESSION['name'];?></button>
                <div id="myDropdown" class="dropdown-content">
                <a href="logout.php">Log Out</a>
                </div>
            </ul>        
    </nav>
    <!-- NAVIGATION BAR ENDS-->
    <br>
    <div class="elearning" style="padding-top: 50px;">
        <h1 style="text-align: center; color: green;"><?php echo $_SESSION['name'];?> </h1>
        <br>
        <div class="sidenav">
        <a href="./personal.php">Personal Information</a>
        <a href="./education.php">Education</a>
        <a href="./experience.php">Experience</a>
        <a href="./responsibilities.php">Responsibilities</a>
        <a href="./references.php">References</a>
        </div>

        <div class="main">
        <?php 
            include_once "../config.php";
            $regid = $_SESSION['regid'];
            $expId = $_GET["expId"];
            $sql=mysqli_query($conn, "select * from experiences where expId = $expId");
            while($row=mysqli_fetch_assoc($sql)){
        ?>
            <!-- FORM STARTS -->
            <br>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="reporting form" METHOD="POST">
            <section style="display: flex;">
            <div class="left" style="padding-left: 150px;">
                <div class="input-group">
                    <label for="startDate"><h6>Start Date</h6></label>
                    <input name="startDate" value="<?=$row["startDate"]?>" type="text" placeholder="<?=$row["startDate"]?>" id="startDate"><br>
                    <span id="startDate"> </span>
                </div>
                <div class="input-group">
                    <label for="post"><h6>Post</h6></label>
                    <input name="post" type="text" value="<?=$row["post"]?>" id="post"><br>
                    <span id="post"> </span>
                </div>
                <div class="input-group">
                    <label for="address"><h6>Address</h6></label>
                    <input name="address" type="text" value="<?=$row["address"]?>" id="address"><br>
                    <span id="address"> </span>
                </div>
            </div>
            <div class="right" style="padding-left: 200px;">
            <div class="input-group">
                    <label for="endDate"><h6>End Date</h6></label>
                    <input name="endDate" type="text" value="<?=$row["endDate"]?>" id="endDate"><br>
                    <span id="endDate"> </span>
                </div>
                <div class="input-group">
                    <label for="organizationName"><h6>Organization Name</h6></label>
                    <input name="organizationName" type="text" value="<?=$row["organizationName"]?>" id="organizationName"><br>
                    <span id="organizationName"></span>
                </div>
                
                <div class="input-group">
                    <label for="expId"><h6>Experience Id</h6></label>
                    <input name="expId" type="text" value="<?=$row["expId"]?>" readonly="expId" id="expId"><br>
                    <span id="expId"> </span>
                </div>
            </div>
            </section>
            <?php } ?>
            <section style="display: flex;">
            <div class="input-group" style="padding-left: 200px;">
                <button name="submit" value="submit">Update</button>
            </div> 
            <div class="input-group" style="padding-left: 200px;">
                <button name="delete" value="delete">Delete</button>
            </div>     
            </section>

            <?php
            if(isset($_POST['delete']))
            {
                $expId = mysqli_real_escape_string($conn, $_POST["expId"]);

                $insertQuery = "Delete from experiences where expId = '$expId' and cusId = '$regid'";
                $result = mysqli_query($conn, $insertQuery);

                if($result)
                    {
                        echo '<script>
                        window.location ="experience.php";
                        </script>';
                    }
                    else
                    {
                        echo'<script>window.location.replace("experience.php");</script>';
                    }
            }
                if(isset($_POST['submit']))
                {
                    $startDate = mysqli_real_escape_string($conn, $_POST["startDate"]);
                    $endDate = mysqli_real_escape_string($conn, $_POST["endDate"]);
                    $post = mysqli_real_escape_string($conn, $_POST["post"]);
                    $organizationName = mysqli_real_escape_string($conn, $_POST["organizationName"]);
                    $address = mysqli_real_escape_string($conn, $_POST["address"]);
                    $expId = mysqli_real_escape_string($conn, $_POST["expId"]);
                
                    $insertQuery = "Update experiences set startDate= '$startDate', endDate= '$endDate', 
                                    post= '$post', organizationName= '$organizationName', address='$address'
                                    where expId = '$expId' and cusId = '$regid'";
                     $result = mysqli_query($conn, $insertQuery);
                      
                    if($result)
                    {
                        echo '<script>
                        window.location ="experience.php";
                        </script>';
                    }
                    else
                    {
                        echo'<script>window.location.replace("experience.php");</script>';
                    }
                }
            ?>


        </div>
        <br>
    </div>
    <!-- CONTENT ENDS -->
</header>
<!-- HEADER ENDS -->    

    <!-- FOOTER STARTS -->    
    <footer class="footer">
        <hr>
        <div class="socialicon">
            <h4 style="color:white; margin-bottom: 15px;"> Find Us! </h4>
                <a href="https://www.facebook.com/sanzit17" target="_blank"><i class="fab fa-facebook-square"></i></a>
                <a href="https://www.twitter.com/sanzit17" target="_blank"><i class="fab fa-twitter-square"></i></a>
                <a href="https://www.instagram.com/sanzit17" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://www.youtube.com/channel/UCWLgazYeOBTxxca0GFY3Rmw" target="_blank"><i class="fab fa-youtube"></i></a>
        </div>
        <hr>
        <div class="footer-main">
        <h4 style="padding:5px;">Copyright &copy; Maya Job Portal System
        <script>var year = new Date(); document.write(year.getFullYear());</script>. All Right Reserved </h4>
        </div>
        <hr>
    </footer>
     <!-- FOOTER ENDS -->    
</body>
</html>