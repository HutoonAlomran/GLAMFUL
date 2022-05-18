<?php 
include 'DBconnection.php';
session_start();

$role =  $_SESSION['role'];
if($role != 'admin'){
    $_SESSION['role']='guest';
    $role = $_SESSION['role'];
}

$region_id = $_GET['region'];
$admin_id= $_SESSION["id"];
// i added this for each clinic id
//$clinicID= $_SESSION['clinicID'];

$query = "SELECT * FROM clinic WHERE region='$region_id'";
$result = mysqli_query($connection,$query);

$query2 = "SELECT * FROM clinic WHERE region='$region_id' AND admin_id= '$admin_id'";
$result2 = mysqli_query($connection,$query2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clinics</title>
    <!-- CSS File -->
    <link rel="stylesheet" href="clinicList.css">
    
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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
    
    <section class="home">
        <div class="breadcrumb">
            <a href="index.php" >Home &nbsp;</a> >>
            <a href="categories.php">&nbsp;Search for clinics&nbsp;</a> >>
            <a href="clinicList.php?region=<?php echo $region_id ?>">&nbsp;<?php echo $region_id ?>&nbsp;Clinics List&nbsp;</a> >>
         </div>
                 
    </section>
      
    <!-- End Home Section -->
    
     <!-- Start Package Section--> 
    <section class="package" id="package">
        <div class="section-title">
              <?php if($role == 'admin'){?>
                    <a href="adminHome.php?id=<?php echo $admin_id ?>"><button class="btn" style="width: 110px;margin-top:-130px; margin-left:1140px;">Admin home</button></a>
                    <?php } ?>
                    <h1 style="margin-top: 60px;"><?php echo $region_id ?> Riyadh Clinics</h1>
            
        </div>
        <div class="package-cards">
            
            
        <!-- if the user is  a Guest -->   
         <?php if($role == 'guest'){
                    while ($clinic = mysqli_fetch_assoc($result)){
                           $clinic_id = $clinic['ID'];
                           $clinic_name = $clinic['name'];
                           $clinic_img = $clinic['picture'];    
                    ?>
                       <div class="card">
                           <div class="card-title">
                               <h1><?php echo $clinic_name ?></h1>
                           </div>
                           <div class="card-items">
                               <div class="item">
                                   <img  class="clinicLogo" src="img/<?php echo $clinic_img?>" alt="logo" width="150" height="200" >
                               </div>
                               <a href="clinicInfo.php?id=<?php echo $clinic_id ?>"><button class="btn">View Clinic</button></a>

                           </div>             
                       </div>
         <?php }} ?>
        
          <!-- if the user is an Admin -->
          <?php 
          if ($role == 'admin'){
          while ($clinic2 = mysqli_fetch_assoc($result2)){
                $clinic_id2 = $clinic2['ID'];
                $clinic_name2 = $clinic2['name'];
                $clinic_img2 = $clinic2['picture'];    
         ?>
            <div class="card">
                <div class="card-title">
                    <h1><?php echo $clinic_name2 ?></h1>
                </div>
                <div class="card-items">
                    <div class="item">
                        <img  class="clinicLogo" src="img/<?php echo $clinic_img2?>" alt="logo" width="150" height="200" >
                    </div>
                    <a href="clinicInfo.php?id=<?php echo $clinic_id2 ?>"><button class="btn">View Clinic</button></a>
                    <?php if($role == 'admin'){?>
                    <a href="updateClinic.php?id=<?php echo $clinic_id2 ?>"><button class="btn">Edit Clinic</button></a>
                    <button class="btn" onclick="deleteClinic(<?php echo $clinic_id2 ?>)">Delete Clinic</button></a>
                    <?php } ?>
                </div>             
            </div>
          <?php }} ?>      
        </div>
           
        </div>
    </section>
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
    <script>
    function deleteClinic(id) {
        $result= confirm('Warning: Are you sure you want delete this clinic?');
        if($result == true ){
        $.ajax({
            url:"deleteClinic.php",
            type:"POST",
            data:{id:id},
            success:function(){
                window.location.reload();
            },
            error: function (){
                alert("AJAX request was a failure");
            }
        });}
    
    }     
    </script>
</body>
</html>