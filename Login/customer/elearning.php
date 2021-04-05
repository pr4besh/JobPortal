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
    
    <!-- ADDING EXTERNAL ICONS AND EXTERNAL CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/dropdownbutton.css">
    
    <!-- ADDING EXTERNAL JAVASCRIPT -->
    <script type="text/javascript" src="../../javascript.js"></script>
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
                <li><a href="../customer/home.php">Home</a></li>
                <li><a href="../customer/elearning.php" class="active">E-learning</a></li> 
                <li><a href="../customer/profile.php">My Profile</a></li> 
                <li><a href="../customer/editProfile.php">Edit Profile</a></li>
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
    <h1 style="text-align: center; color: green;">E-Learning Files:</h1><br>
        <div class="data" style="padding-left:200px;">
            <table class="a" border="3" cellspacing="5" style="display: center; border:2px solid grey;">
            <thead>
                <th><h2>Name</h2></th>
                <th style="width:200px;"><h2>Open Action</h2></th>
                <th style="width:200px;"><h2>Download Action</h2></th>
            </thead>
            <tbody>
                <?php  $files = scandir("../../E-learning"); for ($a = (count($files))-1; $a>=2; $a--){ ?>
                <tr>
                <td style="padding-left:30px;"><h3><?php echo $files[$a] ?><h3></td>
                <td>
                <div class="button">
                    <a style="padding-left:80px; color:white;" href="../../E-learning/<?php echo $files[$a] ?>" target="_blank">
                    <button name="submit" value="submit">View</button>
                    </a>
                </div>
                </td>
                <td><div class="button">
                    <a style="padding-left:50px; color:white;" download="../../E-learning/<?php echo $files[$a] ?>" href="elearning/<?php echo $files[$a] ?>">
                    <button name="submit" value="submit">Download</button>
                    </a>
                </div>
                </td>
                <?php } ?>
                <!-- <td><a href="elearningdb.php?id=<?php echo $file['id'] ?>">Download</a></td> -->
                </tr>
            </tbody>
            </table>
        </div>
        <br><br>
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