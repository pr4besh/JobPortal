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
        <div class="sidenav">
        <a href="./personal.php">Personal Information</a>
        <a href="./education.php">Education</a>
        <a href="./experience.php">Experience</a>
        <a href="./responsibilities.php">Responsibilities</a>
        <a href="./references.php">References</a>
        </div>

        
        <div class="main" style="font-size: 22px;">
        <br><br>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="addform" METHOD="POST">
            <section style="display: flex;">
                <div class="left" style="text-align: center; padding-left:10%;">
                    <div class="input-group">
                        <label for="name"><h6>Name</h6></label>
                            <input name="name" type="text" id="name"><br>
                        <span id="name"></span>
                    </div>
                    <div class="input-group">
                        <label for="number"><h6>Number</h6></label>
                            <input name="number" type="text" id="number"><br>
                        <span id="number"></span>
                    </div>
                </div>
                <div class="right" style="text-align: center; padding-left:30%;">
                    <div class="input-group">
                        <label for="designation"><h6>Designation</h6></label>
                            <input name="designation" type="text" id="designation"><br>
                        <span id="designation"></span>
                    </div>
                    <div class="input-group">
                        <label for="email"><h6>Email</h6></label>
                            <input name="email" type="text" id="email"><br>
                        <span id="email"></span>
                    </div>
                </div>
            </section>
                <div class="input-group" style="text-align: center;">
                        <button name="addRef" value="addRef">Add</button>
                </div> 
            </form>
            <?php
                include_once "../config.php";
                if(isset($_POST['addRef']))
                    {
                        $name = mysqli_real_escape_string($conn, $_POST["name"]);
                        $designation = mysqli_real_escape_string($conn, $_POST["designation"]);
                        $number =  mysqli_real_escape_string($conn, $_POST["number"]);
                        $email = mysqli_real_escape_string($conn, $_POST["email"]);
                        $cusId = $_SESSION['regid'];
                    
                        $insertQuery = "Insert into reference (name, designation, number, email, cusId) values 
                        ('$name', '$designation', '$number', '$email','$cusId')";
                        $result = mysqli_query($conn, $insertQuery);
                        
                        if($result)
                        {
                            echo '<script>
                            alert("Successfully Added.");window.location.replace("references.php");
                            </script>';
                        }
                        else
                        {
                            echo'<script>alert("Error");window.location.replace("references.php");</script>';
                        }
                    }
            ?>
        </div><br><br><br>
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