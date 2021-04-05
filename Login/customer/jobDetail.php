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
    <link rel="stylesheet" href="../../css/button.css">
    
    <!-- ADDING EXTERNAL JAVASCRIPT -->
    <script type="text/javascript" src="../../js/dropdown.js"></script>

    <!-- TITLE NAME AND ICON-->
    <title>Maya Job Portal System</title>
    <link rel="icon" type="image" href="../../Logo/Logo.png" alt="Logo" width=60 height=60>
    <style>
    table{
        margin-left: auto;
        margin-right: auto;
        width: 80%;
        font-size: 15px;
    }
    h2.headertekst {
    text-align: center;
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
                <li><a href="../customer/home.php" class="active">Home</a></li>
                <li><a href="../customer/elearning.php">E-learning</a></li> 
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
    <div class="main" style="padding-top: 70px;"><br>
        <?php 
            include_once "../config.php";
            $jobId = $_GET["jobId"];
            $sql=mysqli_query($conn, "select * from jobDetails where jobId = $jobId");
            while($row=mysqli_fetch_assoc($sql)){
        ?>

        <table class="table" border="2">
        <tbody>
        <h2 style="text-align:center;">Basic Job Information </h2><br>
        <tr>
            <th>Job Level</th>
            <th><?=$row["jobLevel"]?></th>
        </tr>

        <tr>
            <th>No of Vacancy</th>
            <th><?=$row["noOfVacancy"]?></th>
        </tr>
        <tr>
            <th>Employment Type</th>
            <th><?=$row["empType"]?></th>
        </tr>
        <tr>
            <th>Job Location</th>
            <th><?=$row["jobLocation"]?></th>
        </tr>
        <tr>
            <th>Offered Salary</th>
            <th><?=$row["offeredSalary"]?></th>
        </tr>
        <tr>
            <th>Apply Deadline</th>
            <th><?=$row["applyDeadline"]?></th>
        </tr>
        <tr>
            <th>Education Level</th>
            <th><?=$row["educationLevel"]?></th>
        </tr>
        <tr>
            <th>Experience Required</th>
            <th><?=$row["expReq"]?></th>
        </tr>
        <tr>
            <th>Professional Skill Required</th>
            <th><?=$row["skillReq"]?></th>
        </tr>
        <tr>
            <th>Duties</th>
            <th><?=$row["duties"]?></th>
        </tr>
        <tr>
            <th>Link</th>
            <th style="height:80px;">
                <div class="button">
                <a style="padding-left:20px; color:white;" target="_blank" href="<?=$row["link"]?>">
                <button name="view" value="view">View</button>
                </a>
                </div>
            </th>
        </tr>
        </tbody>
        </table><br>
        <h3 style="text-align: center; color:darkgreen;">Apply Job:</h3><br>
        <div class="applyButton" style="padding-left: 42%;">
            <a style="padding-left:20px; color:white;" href="./applyJob.php?jobId=<?=$row['jobId']?>">
                <button name="submit" value="submit">ApplyJob</button>
            </a>
        </div>
        <?php } ?><br>
    </div>
    <br>
   
                
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