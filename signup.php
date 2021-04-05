<?php 
session_start();
include './config.php' 
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
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/button.css">
    
    <!-- ADDING EXTERNAL JAVASCRIPT -->
    <script type="text/javascript" src="./js/javascript.js"></script>
    <link rel="stylesheet" href="./css/dropdownbutton.css">
    <script type="text/javascript" src="./js/dropdown.js"></script>
    <!-- TITLE NAME AND ICON-->
    <title>Maya Job Portal System</title>
    <link rel="icon" type="image" href="./Logo/Logo.png" alt="Logo" width=60 height=60>
    
</head>
<body>
<!-- HEADER STARTS -->    
<header id="header-sec">
<!-- NAVIGATION STARTS-->
    <nav id="navigation">
        <div class="logo">
            <h1 class="name-logo">
                <a href="home.html"><IMG SRC="./Logo/LogoFinal.png" ALT="Logo" height="35"></IMG></a>
            </h1>
        </div>
        
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.html">About</a></li> 
             <li><a href="contact.html">Contact</a></li>
             <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn" style="width: auto;">Login</button>
                <div id="myDropdown" class="dropdown-content">
                <a href="./Login/login.php">User Login</a>
                <a href="./Login/employeelogin.php">Employee Login</a>
                <a href="./Login/companylogin.php">Registered Company Login</a>
                </div>
            </div>
             <li><a href="signup.php" class="active">Sign Up</a></li>
         </ul>          
    </nav>
    <!-- NAVIGATION BAR ENDS-->

    <?php
        if(isset($_POST['submit']))
        {
            $name = mysqli_real_escape_string($conn, $_POST["name"]);
            $address = mysqli_real_escape_string($conn, $_POST["address"]);
            $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
            $type = mysqli_real_escape_string($conn, $_POST["type"]);
            $dateOfBirth = mysqli_real_escape_string($conn, $_POST["dateOfBirth"]);
            $username = mysqli_real_escape_string($conn, $_POST["cusUsername"]);
            $password = mysqli_real_escape_string($conn, $_POST["password"]);
            $conpassword = mysqli_real_escape_string($conn, $_POST["conpassword"]);
            
            $pass = password_hash($password, PASSWORD_BCRYPT);

            $checkEmail = "Select * from registrationdetails where email='$username'";
            $query = mysqli_query($conn, $checkEmail);

            $countEmail = mysqli_num_rows($query);
            if($countEmail>0)
            {
                echo '<script>
                    alert("Email already registered.");
                    </script>';
            }
            else
            {
                if($password == $conpassword)
                {
                    $registrationDetails = "INSERT INTO registrationdetails(name, address, gender, dateOfBirth, email) values 
                    ('$name', '$address', '$gender', '$dateOfBirth', '$username')";
             
                    $result = mysqli_query($conn, $registrationDetails);
                    $getregId = "Select regId from registrationdetails where email='$username'";
                    $reg= mysqli_query($conn, $getregId);
                    while($row = mysqli_fetch_assoc($reg)){
                        $regId = $row["regId"];
                    }

                    $customer = "INSERT INTO customer(cusUsername, cusPassword, type, regId) values 
                    ('$username', '$pass', '$type', '$regId')";
                    $result1 = mysqli_query($conn, $customer);

                    $personal = "INSERT INTO personalinformation 
                    (jobField, dateofbirth, fatherName, martialStatus, nationality, languagesknown, portifoliosummary, cusId) 
                    VALUES 
                    ('Unkown', '$dateOfBirth', 'Unkown', 'Unkown', 'Unkown', 'Unkown', 'Unkown', '$regId')";
                    $result2 = mysqli_query($conn, $personal);

                    echo '<script>
                    alert("Thank you for registration");
                    </script>';
                    //header("Location: ./login/login.php");
                }
                else
                {
                    echo '<script>
                    alert("Password arenot matching");
                    </script>';
                }
            }
        }

    ?>

    <h1 style="text-align: center; color: green; padding-top:70px;">Maya Job Portal System</h1><br>
    <h3 style="text-align: center;">Job Seeker Registration Details</h3><br>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" name="form" METHOD="POST" enctype="multipart/form-data">
        <section id="rights" style="display: flex">
            <div class="right"  style="padding-left: 300px;">
                <div class="input-group">
                    <label for="name"><h3>Full Name</h3></label>
                    <input name="name" type="text" placeholder="" id="name" required><br>
                    <span id="name"> </span>
                </div>
                <div class="input-group">
                    <label for="gender"><h3>Gender</h3></label>
                    <select id="gender" name="gender" required>
                        <option value="" disable></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Rather Not to Say">Rather Not to Say</option> 
                    </select>
                </div>
                <div class="input-group">
                    <label for="cusUsername"><h3>Username/Email</h3></label>
                    <input name="cusUsername" type="email" placeholder="" id="cusUsername" required><br>
                    <span id="cusUsername"> </span>
                </div>
                <div class="input-group">
                    <label for="password"><h3>Password</h3></label>
                    <input name="password" type="password" placeholder="" id="password" required>
                    <span id="password"> </span>
                </div>
            </div>

            <div class="left" style="padding-left: 300px">
                <div class="input-group">
                    <label for="address"><h3>Address</h3></label>
                    <input name="address" id="address" placeholder="" required>
                    <span id="address"> </span>
                </div>
                <div class="input-group">
                    <label for="type"><h3>Type</h3></label>
                    <select id="type" name="type" required>
                        <option value="" disable></option>
                        <option value="Full">Full-Time</option>
                        <option value="Part">Part-Time</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="dateOfBirth"><h3>Date of Birth</h3></label> 
                    <input name="dateOfBirth" type="date" placeholder="" id="dateOfBirth" required>
                    <span id="dateOfBirth"> </span>
                </div>
                    
                <div class="input-group">
                    <label for="conpassword"><h3>Confirm Password</h3></label>
                    <input name="conpassword" type="password" placeholder="" id="conpassword" required>
                    <span id="conpassword"> </span>
                </div>
            </div>
        </section>
        <div class="input-group" style="padding-left: 600px;">
            <button name="submit" value="submit" onclick="return confirmation();">Submit</button>
        </div>
    </form>


</header>
<!-- HEADER ENDS -->    

    <!-- FOOTER STARTS -->    
    <footer class="footer">
        <hr>
        <section id="box-grid">
        <div class="box">
            <i class="fas fa-envelope fa-3x"></i>
            <h3> Subscribe now and stay with us.</h3>
        </div>
    
        <div class="tbox">
            <input id="email_inf" type="email" name="email" placeholder="Enter your email address" required="email">
            <button type="submit" class="fas fa-check-square" onclick="submitFunction()"></button>
        </div>
        </section>
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