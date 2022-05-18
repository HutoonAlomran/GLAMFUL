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
                   
                    <li><a href="index.php" class="nav-link active">home</a></li>
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
    
    <section class="home">
        <div class="breadcrumb">
            <a href="index.php" >Home &nbsp;</a> >>
            
            
        </div> 

        <div class="container">
            <div class="home-img">
                <img src="img/22.png">
            </div>
            <div class="home-content">
                <h1>Riyadh Beauty Clinics<br><span>in one place!</span></h1>
                <p>with GLAMFUL, Start searching for Beauty Clinics in Riyadh and share your reviews on them, or explore other people's opinions and reviews on them.</p>
                <a href="categories.php" class="btn btn-outline">
                    <img src="img/search.png" width="30px;" height="30px;" style="margin-left:12px;">
                   Search for Beauty Clinics 
                </a>
            </div>
        </div>
        
    </section>
    <!-- End Home Section -->
    <!-- Start About Section -->
    <section class="about" id="about">
        <div class="container">
            <div class="section-title">
                <h1>For Admins</h1>
                
            </div>
            <div class="about-detail">
                <div class="about-detail-content">
                    <div class="about-img">
                        <img src="img/manager.png">
                    </div>
                    <div class="about-description">
                        <p>For the management of beauty clinics, our website needs an Admin that manages the activities of beauty clinics, 
                        whether by adding clinics, deleting them, updating them and managing clients reviews. </p>
                       
                        <br>
                        <a href="adminLogIn.php"><button class="btn">Admin Log In</button></a>
                        <br>
                        New Admin?&nbsp;<a href="adminSignUp.php">Sign Up here</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->
    
    

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

