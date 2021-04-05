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
    <div class="cv" style="padding: 0 70px 20px 100px;">
        <h1 style="text-align: center; color: green;"><?php echo $_SESSION['name'];?> </h1>
        <table>
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
            $sql=mysqli_query($conn, "select * from personalinformation where cusid = '$regid'");
            while($row=mysqli_fetch_assoc($sql)){
        ?>
            <!-- FORM STARTS -->
            <br>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" class="reporting form" METHOD="POST">
            <section style="display: flex;">
            <div class="left" style="padding-left: 80px;">
                <div class="input-group">
                    <label for="dateofbirth"><h6>Date of Birth</h6></label>
                    <input name="dateofbirth" value="<?=$row["dateofbirth"]?>" type="text" placeholder="<?=$row["dateofbirth"]?>" id="dateofbirth"><br>
                    <span id="dateofbirth"> </span>
                </div>
                <div class="input-group">
                    <label for="fatherName"><h6>Father Name</h6></label>
                    <input name="fatherName" type="text" value="<?=$row["fatherName"]?>" id="fatherName"><br>
                    <span id="fatherName"> </span>
                </div>
                <div class="input-group">
                    <label for="martialStatus"><h6>Martial Status</h6></label>
                    <input name="martialStatus" type="text" value="<?=$row["martialStatus"]?>" id="martialStatus"><br>
                    <span id="martialStatus"> </span>
                </div>
            </div>
            <div class="right" style="padding-left: 200px;">
            <div class="input-group">
                    <label for="languagesknown"><h6>Language Known</h6></label>
                    <input name="languagesknown" type="text" value="<?=$row["languagesknown"]?>" id="languagesknown"><br>
                    <span id="languagesknown"> </span>
                </div>
                <div class="input-group">
                    <label for="nationality"><h6>Nationality</h6></label>
                    <input name="nationality" type="text" value="<?=$row["nationality"]?>" id="nationality"><br>
                    <span id="nationality"></span>
                </div>
                <div class="input-group">
                    <label for="field"><h6>Job Field</h6></label>
                    <input name="field" type="text" value="<?=$row["jobField"]?>" id="field"><br>
                    <span id="field"></span>
                </div>
            </div>
            </section>
            <div class="input-group" style="padding-left: 80px;">
                    <label for="summary"><h6>Summary</h6></label>
                    <input name="summary" style=" width:620px; height:50px;" type="text" value="<?=$row["portifoliosummary"]?>" id="summary"><br>
                    <span id="summary"> </span>
            </div>
            <?php } ?>
            <div class="input-group" style="padding-left: 300px;">
                <button name="submit" value="submit">Submit</button>
            </div>

            <?php 
                if(isset($_POST['submit']))
                {
                    $dateofbirth = mysqli_real_escape_string($conn, $_POST["dateofbirth"]);
                    $fatherName = mysqli_real_escape_string($conn, $_POST["fatherName"]);
                    $field = mysqli_real_escape_string($conn, $_POST["field"]);
                    $martialStatus = mysqli_real_escape_string($conn, $_POST["martialStatus"]);
                    $languageKnown = mysqli_real_escape_string($conn, $_POST["languagesknown"]);
                    $nationality = mysqli_real_escape_string($conn, $_POST["nationality"]);
                    $summary = mysqli_real_escape_string($conn, $_POST["summary"]); 

                    $insertQuery = "Update personalinformation set dateofbirth = '$dateofbirth', fatherName = '$fatherName', martialStatus = '$martialStatus', nationality = 
                                    '$nationality', jobField='$field', languagesknown = '$languageKnown', portifoliosummary = '$summary' where cusId = '$regid'";
                    $result = mysqli_query($conn, $insertQuery);
	
                    if($result)
                    {
                        echo '<script>
                        alert("Thank you for updating your personal information!")
                        window.location ="personal.php";
                        </script>';
                    }
                    else
                    {
                    echo'<script>alert("Error Try Again")</script>';
                    echo'<script>window.location.replace("personal.php");</script>';
                    }

                }
                    
            ?>
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