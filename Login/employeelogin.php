<?php 
session_start();
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
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    
    <!-- ADDING EXTERNAL ICONS AND EXTERNAL CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/button.css">
    <link rel="stylesheet" href="../css/dropdownbutton.css">
    
    <!-- ADDING EXTERNAL JAVASCRIPT -->
    <script type="text/javascript" src="../js/javascript.js"></script>
    <script type="text/javascript" src="../js/confirm.js"></script>
    <script type="text/javascript" src="../js/dropdown.js"></script>
    <style>
        .d-flex, .input-group, .form-group, .right{padding-left: 20px;}
    </style>
    <!-- TITLE NAME AND ICON-->
    <title>Maya Job Portal System</title>
    <link rel="icon" type="image" href="../Logo/Logo.png" alt="Logo" width=60 height=60>
    
</head>
<body>
<!-- HEADER STARTS -->    
<header id="header-sec">
<!-- NAVIGATION STARTS-->
    <nav id="navigation">
        <div class="logo">
            <h1 class="name-logo">
                <a href="home.html"><IMG SRC="../Logo/LogoFinal.png" ALT="Logo" height="35"></IMG></a>
            </h1>
        </div>
        
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../about.html">About</a></li> 
             <li><a href="../contact.html">Contact</a></li>
             <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn" style="width: auto;">Login</button>
                <div id="myDropdown" class="dropdown-content">
                <a href="login.php">User Login</a>
                <a href="employeelogin.php">Employee Login</a>
                <a href="companylogin.php">Registered Company Login</a>
                </div>
            </div>
         </ul>          
    </nav>
    <!-- NAVIGATION BAR ENDS-->

    <?php
    include '../config.php';
    if(isset($_POST['submit'])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $email_search = "select * from employee where empusername='$username'";
        $query = mysqli_query($conn, $email_search);

        $email_count = mysqli_num_rows($query);

        if($email_count)
        {
            $sql = "Select emppassword, name from employee e join registrationdetails r where e.regid = r.regid and e.empusername='$username'";
            $hash= mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($hash)){
            $hash = $row["emppassword"];
            $_SESSION['name']= $row["name"];
            }


            if(password_verify($password, $hash))
            {
                header("Location: ./employee/");
                    exit();
            }
            else
            {
                echo '<script>
                    alert("Incorrect Password");
                    </script>';
            }
        }
        else
        {
            echo '<script>
                    alert("Incorrect Username");
                    </script>';
        }
    }
?>
    <h1 class="title" style="text-align: center; color: green; padding-top:80px;">Maya Job Portal System</h1><br>
    <h3 style="text-align: center;">Employee Login Panel</h3>
    <br><br><br>
    <div class="container h-90">
		<div class="d-flex justify-content-center h-90">
			<div class="user_card">
				<div class="d-flex justify-content-center" style="padding-left: 80px;">
					<div class="brand_logo_container">
						<img src="../Logo/LogoFinal.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" name="form" METHOD="POST" enctype="multipart/form-data">
						<div class="input-group mb-3">
                            <section style="display: flex;">
							<div class="input-group-append">
								<span class="input-group-text"><i class="far fa-user" style="font-size:28px; padding:5px;"></i></span>
                            </div>
                            <div class="right">
                            <input type="text" name="username" class="form-control input_user" value="" placeholder="username">
                            </div>
                            <section>
						</div>
                        <div class="input-group mb-2">
                        <section style="display: flex;">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key" style="font-size:28px; padding:5px;"></i></span>
                            </div>
                            <div class="right">
                            <input type="password" name="password" class="form-control input_pass" value="" placeholder="password">
                            </div>
                            <section>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline" style="width:20px;">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
                     <button name="submit" value="submit" class="btn login_btn">Login</button>
				   </div>
					</form>
				</div>
                <div class="mt-4">
					<div class="d-flex justify-content-center links" style="margin-top: 20px;">
						Don't have an account? <a href="../signup.php" class="ml-2" style="border: 1px solid black; background: #fff; color: black; padding: 10px;">Sign Up</a>
					</div>
				</div>
			</div>
		</div>
    </div><br>
</header>
<!-- HEADER ENDS -->                 <li><a href="../signup.php">Sign Up</a></li>
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
        <div class="footer-main" style="padding:5px;">
        <h4>Copyright &copy; Maya Job Portal System
        <script>var year = new Date(); document.write(year.getFullYear());</script>. All Right Reserved </h4>
        </div>
        <hr>
    </footer>
     <!-- FOOTER ENDS -->    
</body>
</html>