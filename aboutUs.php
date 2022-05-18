<?php 
include 'DBconnection.php';
session_start();
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
    <link rel="stylesheet" href="aboutUs.css">
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
                    <li><a href="aboutUs.php" class="nav-link active">about Us</a></li>
                    <li><a href="categories.php" class="nav-link">Search for clinics</a></li>
                
                </ul>
            </nav>
            <div class="nav-toggle" id="nav-toggle">
                <i class="fas fa-bars"></i>
            </div>
        </div> 

        
    </header>
    
    <!-- Start Home Section -->
    <section class="home">
        <div class="breadcrumb">
            <a href="index.php" >Home &nbsp;</a> >>
            <a href="aboutUs.php">&nbsp;About Us&nbsp;</a> >>
            
        </div> 

        <div class="container">
            <div class="home-img">
                <img src="img/22.png">
            </div>
            <div class="home-content">
                <h1>About Us..</h1>
                <p>Glamful is a review website, that allows people who are interested in beauty to share their reviews on beauty clinics in Riyadh with others,
                 or even explore other people's reviews on beauty clinics.</p>
            </div>
            <section class="package" id="package" style="margin-top: -60px;">
                <div calss="VM" style="display: flex;">
                    <img src="img/mission.png" alt="" height="150" width="150" style="margin-left:100px; margin-top:-30px;">
                <p style="margin-top: 50px;">Our mission is to gather people's experiences and reviews on Riyadh beauty clinics just in one place,
                     to save clients time and effort while searching for a suitable clinic.</p>
            </div>
            </section> 
             
            <section class="package" id="package" style="margin-top: 30px;">
                <div calss="VM" style="display: flex;">
                    <img src="img/vision.png" alt="" height="150" width="150" style="margin-left:100px; margin-top:-30px;">
                <p style="margin-top: 50px;">Our vision is Improving clients experience in finding the most suitable beauty clinic in Riyadh through exploring clients reviews on them. </p>
            </div>
        </section> 
        </div>
        
        
    </section>
    
    <!-- End Home Section -->
    <!-- Start About Section -->
    <section class="about" id="about">
        <div class="container">
            
        </div>
       
    </section>
    <!-- End About Section -->
    <!-- Start Services Section -->
    <section class="services" id="services">
       
    </section>
    <!-- End Services Section -->
    <!-- Start Package Section -->
   
    <!-- End Package Section -->
    
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