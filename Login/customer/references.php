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
        <!-- TABLE STARTS -->
        <div class="table" style="padding-left: 60px;"><br>
            <caption><h5 style="text-align: center;">References Details<h5></caption><br>
            <table border="3" cellspacing="5">
                <!-- CAPTION OF EDUCATION TABLE -->
                <tr>
                    <th> Name </th> 
                    <th> Designation </th>
                    <th> Number </th>
                    <th> Email </th>
                    <th> Update </th>
                    <th> Delete </th>
                </tr>
                <?php 
                include_once "../config.php";
                $regid = $_SESSION['regid'];
                $sql="Select * from reference where cusId = '$regid'";
                $result = mysqli_query($conn, $sql);
                while($row=mysqli_fetch_array($result)){  
                ?>
                <tr>
                    <td><?=$row["name"]?></td>
                    <td><?=$row["designation"]?></td>
                    <td><?=$row["number"]?></td>
                    <td><?=$row["email"]?></td>
                    <td><div class="button">
                    <a style="color:white;" href="./updateReferences.php?refId=<?=$row['referenceId']?>">
                    <button name="submit" value="submit">Update</button>
                    </a>
                    </div></td>
                    <td style="padding:10px;"><div class="button">
                    <?php $_SESSION['referenceId'] = $row["referenceId"]; ?>
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="expId" METHOD="POST">
                    <a style="color:white;">
                    <button name="delete" value="delete"> Delete </button>
                    </form>
                    </a>
                    </div></td>

                </tr>
                <?php } ?>
                <?php
                    if(isset($_POST['delete']))
                    {
                        $referenceId = $_SESSION['referenceId'];
         
                        $insertQuery = "Delete from reference where referenceId = '$referenceId' and cusId = '$regid'";
                        $result = mysqli_query($conn, $insertQuery);
         
                        if($result)
                            {
                                echo '<script>
                                window.location ="references.php";
                                </script>';
                            }
                        else
                            {
                                echo'<script>window.location.replace("reference.php");</script>';
                            }
                    }
                ?>
            </table><br><br>
            <form action="addReference.php" class="add" METHOD="POST">
                <div class="input-group" style="padding-left: 300px;">
                    <button name="add" value="add">Add</button>
                </div> 
            </form>
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