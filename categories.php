<?php 
include 'DBconnection.php';
session_start();

$role = $_SESSION['role'];
if($role != 'admin'){
    $_SESSION['role']='guest';
}


$query = "SELECT *  FROM regions";
$result = mysqli_query($connection,$query);


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
    <link rel="stylesheet" href="categories.css">
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
                   
                    <li><a href="index.php" class="nav-link ">home</a></li>
                    <li><a href="aboutUs.php" class="nav-link">about Us</a></li>
                    <li><a href="categories.php" class="nav-link active">Search for clinics</a></li>
                
                </ul>
            </nav>
            <div class="nav-toggle" id="nav-toggle">
                <i class="fas fa-bars"></i>
            </div>
        </div> 

        
    </header>
    
    <!-- Start Home Section -->
    

        <div class="breadcrumb" >
            <a href="index.php" >Home &nbsp;</a> >>
            <a href="categories.php">&nbsp;Search for clinics&nbsp;</a> >>
            
        </div>
        

    <!-- End Home Section -->
    <!-- Start Services Section -->

    <section class="services" id="services">
        <div class="services-content">
            
                    <!-- comment  <h1 style="margin-top: 60px;"><?php echo $region_id ?> Riyadh Clinics</h1> -->
            <div class="section-title" >
                <?php if($role == 'admin'){?>
                    <a href="adminHome.php?id=<?php echo $admin_id ?>"><button class="btn" style="width: 110px;margin-top:-53px; margin-left:1130px;">Admin home</button></a>
                    <?php } ?>
                <h1 style="margin-top: 80px;">Find a Clinic</h1>
                <span>You Can Find The Clinic Nearby You in the bellow categories</span>
            </div>
            <div class="services-content-description">
                <?php 
                    while($region = mysqli_fetch_assoc($result)){
                      $name = $region['region']; //north or south or east or west
                      $img = $region['image']; // region image 
                    ?>
                                                       
                <div class="box">
                    <div class="inner">
                        <img src="img/<?php echo $img ?>">
                    </div>
                    <a href="clinicList.php?region=<?php  echo $name ?>" class="btn"><?php echo $name ?> Riyadh</a> 
                </div>
                <?php } ?>
            </div>

        </div>
         
    </section>
    <!-- End Services Section -->
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