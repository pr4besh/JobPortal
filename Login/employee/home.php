<?php 
session_start();

if(!isset($_SESSION['name']))
{
    header("Location: ../employeelogin.php");
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
    
    <!-- ADDING EXTERNAL ICONS AND EXTERNAL CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/dropdownbutton.css">
    
    <!-- ADDING EXTERNAL JAVASCRIPT -->
    <script type="text/javascript" src="../../js/dropdown.js"></script>
    <style>
        table
        {
            width:80%;
        }
        .button button
        {
            background: #93cb52;
            font-size: 18px;
            color: black;
            align-self: center;
            margin-top: 5px;
            margin-bottom: 5px;
            background: #ffffff;
            padding: 5px 5px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }
    </style>
    <!-- TITLE NAME AND ICON-->
    <title>Maya Job Portal System</title>
    <link rel="icon" type="image" href="../../Logo/Logo.png" alt="Logo" width=60 height=60>
    
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
                <li><a href="../customer/home.php" class="active">Home</a></li>
                <li><a href="../customer/elearning.php">E-learning</a></li> 
                <li><a href="../customer/profile.php">Analysis</a></li> 
                <li><a href="../customer/editProfile.php">Payment</a></li>
                <li><a href="../customer/setting.php">Setting</a></li>
                <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn" style="width: auto;"><?php echo $_SESSION['name'];?></button>
                <div id="myDropdown" class="dropdown-content">
                <a href="logout.php">Log Out</a>
                </div>
            </div>
            </ul>        
    </nav>
    <!-- NAVIGATION BAR ENDS-->
    <br>
    <h1 style="text-align: center; color: green; padding-top:50px;padding-bottom:10px;">Maya Job Portal System</h1><br>
    <h3 style="text-align:center;">Job Details</h3><br>
    <div class="left" style="padding-left:200px;text-align:center;">
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