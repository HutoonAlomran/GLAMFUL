<?php 
include 'DBconnection.php';
session_start();

if($_SESSION["role"] != "admin" || !isset($_SESSION['id'])){ // if you are not an admin , go back to the home page
	header("Location:index.php");
}

$admin_id = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glamful</title>
    <!-- CSS File -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cssH.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <header class="header" id="header">
       
           <!--  <div id="logo">-->
             <a href="index.php" accesskey="h"><img id="LOGO"  src="LOGO.png"  height="60" alt="logo"></a>
             <a class="logo" href="index.php" accesskey="h">
               <!-- <img src="img/logo.png">
            </div>--> 
            <div class="navbar">
            <nav class="nav-menu" id="nav-menu">
                <ul class="nav-list">
                   
                    <li><a href="index.php" class="nav-link">home</a></li>
                    <li><a href="aboutUs.php" class="nav-link">about Us</a></li>
                    <li><a href="categories.php" class="nav-link">Search for clinics</a></li>
                
                </ul>
            </nav>
            <div class="nav-toggle" id="nav-toggle">
                <i class="fas fa-bars"></i>
            </div>
        </div> 
    </header>
    
    <!-- Start Home Section -->
    <section class="signup">
        <div class="breadcrumb">
            <a href="index.php" >Home &nbsp;</a> >>
            <a href="adminLogIn.php">&nbsp;Admin Log In&nbsp;</a> >>
            <a href="adminSignUp.php">&nbsp;Admin Home&nbsp;</a> >>
        </div>

        <div class="container" style="align-items:center;">
                <div class="section-title">
                    <h1>Welcome!</h1>
                    <h2>Admin: <?php echo $_SESSION["fn"]." ".$_SESSION["ln"];?></h2>
                </div>
                <FontAwesomeIcon icon="fa-solid fa-plus" />
                <div class="tasks">
                    <a href="newClinic.php">
                        <button  class="Mbtn"><i class="fa fa-solid fa-plus"></i>  Add new clinic</button>
                    </a>

                    <a href="categories.php">
                        <button  class="Mbtn"><i class="fa fa-solid fa-eye"></i>  view clinics</button>
                    </a>

                    <a href="logOut.php">
                        <button  class="log-out"></i>Log out</button>
                    </a>
                </div>    
        </div>
    </section>

    <!-- End Testimonials Section -->
    <!-- Start Footer Section -->
    <footer class="footer" id="contact">
        <div class="footer-list">
            
            <div class="footer-data">
                <h2>Contact Us:</h2>
                <div class="fott"><img src="img/phonne.png" width="25px;" height="25px;"><p>&nbsp;011 285 1609</p></div>
                <div class="fott"> <img src="img/mail.jpg" width="25px;" height="25px;"><p>&nbsp;GLAMFUL@gmail.com</p></div>
            </div>
            <div class="footer-data">
                <h2 style="margin-top: -27px;">Social Media:</h2>
                
                <div class="footer-data-social">
                    
                    <a href=""><i class="fab fa-facebook"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                </div>
            
            </div>
            
            </div>
        
        <div class="copy">
            <p>&copy; 2022 All Rights Reserved, GLAMFUL®</p>
            
        </div>
    </footer>
    <!-- End Footer Section -->
    <!-- Javascript File -->
    <script src="main.js"></script>
</body>
</html>