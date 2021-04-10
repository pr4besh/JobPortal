<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META INFORMATION -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is the offical page of Maya Job Portal System">
    <meta name="author" content="Maya Job Portal System">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <!-- ADDING EXTERNAL ICONS AND EXTERNAL CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/dropdownbutton.css">

    <!-- ADDING EXTERNAL JAVASCRIPT -->
    <script type="text/javascript" src="./js/javascript.js"></script>
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
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="signup.php">Register</a></li>
            </ul>
        </nav>
        <!-- NAVIGATION BAR ENDS-->
    </header>
    <!-- HEADER ENDS -->

    <div class="banner">
        <h1>Welcome to <br> Maya Job Portal System</h1>
    </div>

    <!-- FOOTER STARTS -->
    <footer class="footer">
        <hr>
        <section id="box-footer-maingrid">
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
            <a href="https://www.youtube.com/channel/UCWLgazYeOBTxxca0GFY3Rmw" target="_blank"><i
                    class="fab fa-youtube"></i></a>
        </div>
        <hr>
        <div class="footer-main">
            <h4 style="padding:5px;">Copyright &copy; Maya Job Portal System
                <script>
                var year = new Date();
                document.write(year.getFullYear());
                </script>. <br> All Right Reserved
            </h4>
        </div>
        <hr>
    </footer>
    <!-- FOOTER ENDS -->
</body>
</html>