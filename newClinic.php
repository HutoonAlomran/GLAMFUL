<?php 
include 'DBconnection.php';
session_start();
$admin_id= $_SESSION["id"];
/*
$role =  $_SESSION['role'];
if($role != 'admin'  || !isset($_SESSION['id'])){
    echo '<script>alert("You are not able to access this page")</script>';
     header("Location:index.php"); // you are not able to access this page if you are not an admin   
} */
        
    
    
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
    <link rel="stylesheet" href="newClinic.css">
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
    
    <section>
        <div class="breadcrumb">
            <a href="index.php" >Home &nbsp;</a> >>
            <a href="adminLogIn.php">&nbsp;Admin Log In&nbsp;</a> >>
            <a href="adminhome.php">&nbsp;Admin Home&nbsp;</a> >>
            <a href="newClinic.php">&nbsp;Add New Clinic&nbsp;</a> >>
           
        </div>
        
    </section>
    <!-- End Home Section -->

    <!-- Start Package Section -->
    <section class="package" id="package">

        <div class="section-title" style="margin-top: 140px;">
           
            <br>
            <br>           
            <h1>Join Us</h1>
            <br> 
           
        </div>

        <div class="package-cards">
            <form class="card" method="POST" action="newClinic.php" enctype="multipart/form-data">
<?php if(isset($_POST['addClinic'])){
        
        $clinicLogo = "";
        $clinicName=$_POST['clinicname'];
        $clinicLocation= $_POST['location'];
        $clinicPhone= $_POST['phoneNumber'];
        $clinicSocial= $_POST['socialmedia'];
        
        $clinicLogo=$_FILES['myfile']['name'];
        $tempname=$_FILES['myfile']['tmp_name'];
         move_uploaded_file($tempname,"img/".$clinicLogo);
        
        $clinicRegoin= $_POST['regoin'];
        $clinicTime= $_POST['worktime'];
        $Admin_ID =$_SESSION['id'];
        
        $sql= "SELECT * FROM clinic WHERE phone_number='$clinicPhone';";
        $result= mysqli_query($connection, $sql);
        //checking that its a new clinic to add
        if(mysqli_num_rows( $result )==0){
            if(!empty($clinicName) && !empty($clinicLocation) && !empty($clinicTime) && !empty($clinicPhone) && !empty($clinicSocial)  ){

                $sql2="INSERT INTO clinic(name,location,phone_number,social_media,picture,region,work_time,admin_id) VALUES('$clinicName','$clinicLocation','$clinicPhone','$clinicSocial','$clinicLogo','$clinicRegoin','$clinicTime','$Admin_ID')";
                $result2= mysqli_query($connection,$sql2);
                
                if($result2){
                    $sql = "SELECT * FROM clinic WHERE phone_number='$clinicPhone'";
                    $result = mysqli_query($connection,$sql);
                    $row= mysqli_fetch_row($result);
                    $_SESSION['clinicID']=$row[0];
                    $clinic = mysqli_fetch_assoc($result);
                    
                    echo " <p style='color:#007500; border-style:outset; background-color:white;'>Clinic was added successfully!</p>";
                    echo '<script>setTimeout(function() {window.location.href="clinicinfo.php?id='.$_SESSION['clinicID'].'";}, 4000);  </script> ';
        }
                else {
                    echo '<script>alert("Clinic failed to add")</script>'; }
            
                
            }
        }else { 
               echo "<p style='color:#C70039; border-style:outset; background-color:white;'>Phone number is already used, please use another Phone number to add the clinic</p>";
                }
    } ?>
                <div class="card-title">
                     
                    <h2>Add New Clinic</h2>
                </div>

                
                <div class="card-items">

                    <div class="item">
                        <label for="cname">Clinic Name:&nbsp;</label>
                        <input type="text" id="cname" name="clinicname" placeholder="Enter Clinic Name"  pattern="[a-zA-Z-\s]*" title="Please enter letters only" required>
                    </div>

                    <div class="item">
                        <label for="location">Location:&nbsp;</label>
                        <input type="text" id="location" name="location" placeholder="Enter Location" required>
                    </div>

                    <div class="item">
                        <label for="region">Regoin in Riyadh:&nbsp;</label>
                            <select name="regoin" id="regoin">
                            <option value="North">North</option>
                            <option value="South">South</option>
                            <option value="East">East</option>
                            <option value="West">West</option>
                            </select>
                    </div>
                 
                    <div class="item">
                        <label for="worktime">Work Time:&nbsp;</label>
                        <input type="text" id="worktime" name="worktime" placeholder="Enter Work Time" required>
                    </div>

                    <div class="item">
                        <label for="phoneNumber">phone Number:&nbsp;</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" pattern="[0-9]{9,10}" title="Please enter 9-10 Digits" placeholder="Enter phone number"required>
                    </div>

                    <div class="item">
                        <label for="logo">Clinic logo:&nbsp;</label>
                        <input type="file" id="myfile" name="myfile" required>
                    </div>

                    <div class="item">
                        <label for="socialmedia">Enter your Instagram link:&nbsp;</label>
                        <input type="text" id="socialmedia" name="socialmedia" placeholder="Enter clinic Instagram" required>
                    </div>
  
                    <input style="margin-left: 66px; margin-top: 50px;" class="btn" type="submit" name="addClinic" value="Submit" >
                </div>  
            </form>           
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
        function myFunction11() {
            var nn = document.getElementById('cname');
            var ll = document.getElementById('location');
            var ww = document.getElementById('worktime');
            var pp = document.getElementById('phoneNumber');
            var ss = document.getElementById('socialmedia');
                    
                        if (nn.value == "") {
                            alert("Please fill out all fields to add a new clinic");
                            cname.focus();
                            return false;
                        }  
                        if (ll.value == "") {
                            alert("Please fill out all fields to add a new clinic");
                            location.focus();
                            return false;
                        }  
                        if (ww.value == "") {
                            alert("Please fill out all fields to add a new clinic");
                            worktime.focus();
                            return false;
                        }  
                        if (pp.value == "") {
                            alert("Please fill out all fields to add a new clinic");
                            phoneNumber.focus();
                            return false;
                        }  
                        if (ss.value == "") {
                            alert("Please fill out all fields to add a new clinic");
                            socialmedia.focus();
                            return false;
                        }  
                        

                        else {
  // alert("Clinic was added successfully");
 // window.location.href="Mhomepage.php";
} }
    </script>
</body>
</html>