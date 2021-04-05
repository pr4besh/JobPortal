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
                <li><a href="../customer/elearning.php">E-learning</a></li> 
                <li><a href="../customer/profile.php" class="active">My Profile</a></li> 
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
    <div class="cv" style="padding: 0 70px 20px 100px;">
        <h1 style="text-align: center; color: green;"><?php echo $_SESSION['name'];?> Portfolio</h1>
        <br>
        <!--<img src="./Pictures/pic.png" align="right" style="margin-right: 100px">-->
        <?php 
            include_once "../config.php";
            $regid = $_SESSION['regid'];
            $sql=mysqli_query($conn, "select * from registrationdetails where regid = '$regid'");
            while($row=mysqli_fetch_assoc($sql)){
          ?>
            <h1 style="color: Green; margin-bottom: 10px;"> <?=$row["name"]?></h1>
                <p style="margin-top:20px;">Address: <?=$row["address"]?><br>
                            Email: <?=$row["email"]?><br>
                        <br>
                <hr style="margin-bottom: 20px;">
        <?php } ?>
        <?php
            $sql=mysqli_query($conn, "select portifoliosummary from personalinformation where cusid = '$regid'");
            while($row=mysqli_fetch_assoc($sql)){
          ?>
        <h3 style="color: green;"> SUMMARY </h3>
            <p> &emsp;&emsp;&emsp;<?=$row["portifoliosummary"]?> </p><br>
        <?php } ?>
        <h3 style="color: green; margin-bottom: 10px;"> EDUCATION </h3>
        <!-- TABLE STARTS -->
        <table border="3" cellspacing="5">
            <!-- CAPTION OF EDUCATION TABLE -->
            <caption>Education Details</caption>
            <tr>
                <th> Course </th>
                <th> Specialization </th>
                <th> University </th>
                <th> Institution </th>
                <th> Year of Passing </th>
            </tr>
            <?php 
            $sql="Select * from education where cusId = '$regid'";
            $result = mysqli_query($conn, $sql);
            while($row=mysqli_fetch_array($result)){  
            ?>
            <tr>
                <td><?=$row["course"]?></td>
                <td><?=$row["specialization"]?></td>
                <td><?=$row["university"]?></td>
                <td><?=$row["institution"]?></td>
                <td><?=$row["passingYear"]?></td>
            </tr>
            <?php } ?>
        </table>
        <!-- TABLE ENDS -->
        <br>
        <h3 style="color: green; margin-bottom: 10px;">EXPERIENCE</h3>
        <?php 
            $sql="select * from experiences where cusId = '$regid'";
            $result = mysqli_query($conn, $sql);
            while($row=mysqli_fetch_array($result)){
        ?>
    <h3 style="margin-bottom: 10px;"></h3>
        <tr>
            <td colspan="2"><?=$row["startDate"]?> to</td>
            <td>     <?=$row["endDate"]?></td>
            <td> &emsp;&emsp;&emsp;&emsp;<?=$row["post"]?></td><br>
            <td>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <?=$row["organizationName"]?> - </td>
            <td><?=$row["address"]?></td>
        </tr>
        <?php } ?><br><br>

    <h3 style="color:green"> RESPONSIBILITIES </h3>
    <?php 
        $sql="select details from responsibilities where cusId = '$regid'";
        $result = mysqli_query($conn, $sql);
        while($row=mysqli_fetch_array($result)){
    ?>
    <table>
    <tr>
    <td> : <?=$row["details"]?></td>
    </tr>
    </table>
    <?php } ?>
        <br>


    <section id="skill-container">                    
    </section>
        <br>
    <?php 
        $sql="Select *, r.gender from personalinformation p join registrationdetails r where r.regid = p.cusid and p.cusid = '$regid'";
        $result = mysqli_query($conn, $sql);
        while($row=mysqli_fetch_array($result)){
    ?>
    <section id="contact-container" style="display: flex;">
        <div class="personal">
            <h3 style="color: green;">PERSONAL PROFILE</h3>
                <ul style="list-style:none;">
                    <li>Date of Birth: <?=$row["dateofbirth"]?></li>
                    <li>Father's Name: <?=$row["fatherName"]?></li>
                    <li>Gender: <?=$row["gender"]?></li>
                    <li>Martial Status: <?=$row["martialStatus"]?></li>
                    <li>Nationality: <?=$row["nationality"]?></li>
                    <li>Languages Known: <?=$row["languagesknown"]?></li>
                </ul>
    <?php } ?>
        </div>
        <div class="ref" style="padding-left: 400px;">         
            <h3 style="color: green;">REFERENCE</h3>
            <?php 
              $sql="Select * from reference where cusid = '$regid'";
              $result = mysqli_query($conn, $sql);
              while($row=mysqli_fetch_array($result)){
            ?>
            <ul style="list-style:none;">
                <li class="bold-name"> <?=$row["name"]?></li>
                <li> <?=$row["designation"]?></li>
                <li>Contact Number: <?=$row["number"]?> </li>
                <li>Email: <?=$row["email"]?> </li><br>
            </ul>
            <?php } ?>
        </div>


    </section>
    </div>
    <!-- CONTENT ENDS -->
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