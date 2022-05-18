<?php
include 'DBconnection.php';
session_start();

/*if(!isset($_SESSION['id'])){
    echo '<script>alert("You must log in as an admin to access this page")</script>';
     echo  '<script>window.location.href="adminLogIn.php"; </script>';
        
}*/ 

$clinicID=$_GET['id'];
$clinicAdminID= $_SESSION['id'];

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
            <a href="categories.php">&nbsp;Search for clinics&nbsp;</a> >>
            <a href="clinicList.php">&nbsp;East Clinics List&nbsp;</a> >>
            <a href="updateClinic.php">&nbsp;Edit Clinic&nbsp;</a> >>
           
        </div>
        
    </section>
    <!-- End Home Section -->

    <!-- Start Package Section -->
    <section class="package" id="package">

        <div class="section-title" style="margin-top: 100px;">
            <br>
            <br>           
            <h1>Edit Clinic Information</h1>
            <br> 
           
        </div>

        <div class="package-cards">
            <form class="card" method="POST" action="updateClinic.php" enctype="multipart/form-data">
<?php
$query= "SELECT * FROM clinic WHERE ID=$clinicID";
$result = mysqli_query($connection, $query);

    if(isset($_POST['updateClinic'])){
                 
        $clinic_id=$_POST['clinic_id'];
        $clinicName=$_POST['clinicname'];
        $clinicLocation= $_POST['location'];
        $clinicRegoin= $_POST['regoin'];
        $clinicTime= $_POST['worktime'];
        $clinicPhone= $_POST['phoneNumber'];
        $clinicSocial= $_POST['socialmedia'];
        
        
         $clinicLogo=$_FILES['myfile']['name'];
         $tempname=$_FILES['myfile']['temp_name'];
         move_uploaded_file($tempname,"img/".$clinicLogo);
             
         
          if(!empty($clinicName) && !empty($clinicLocation) && !empty($clinicTime) && !empty($clinicPhone) && !empty($clinicSocial && !empty($clinicLogo))  ){
         
           $sql="UPDATE clinic SET name='$clinicName',location='$clinicLocation',phone_number='$clinicPhone',social_media='$clinicSocial',picture='$clinicLogo',region='$clinicRegoin',work_time='$clinicTime',admin_id='$clinicAdminID' WHERE ID='$clinic_id' ";
           $result= mysqli_query($connection,$sql);
          if($result){
                    
           echo " <p style='color:#007500; border-style:outset; background-color:white;'>Clinic was updated successfully!</p>";
                    echo '<script>setTimeout(function() {window.location.href="clinicInfo.php?id='.$clinic_id.'";}, 4000);  </script> ';
                    
                } 
                else {
                    echo "<p style='color:#C70039; border-style:outset; background-color:white;'>Clinic failed to update, please try again</p>";
                    echo '<script>setTimeout(function() {window.location.href="updateClinic.php?id='.$clinic_id.'";}, 4000);  </script> ';
                }
    }
          
    }
     ?>
                <div class="card-title">
                    <h2>Update Clinic</h2>
                </div>
               <div class="card-items">
                   
                  
                   <?php while($clinicInfo = mysqli_fetch_assoc($result)){  ?>
                    <input type="hidden" class="form-control"  name="clinic_id" value="<?=$clinicInfo['ID']?>">  
                   
                    <div class="item">
                        <label for="cname">Clinic Name:&nbsp;</label>
                        <input type="text" id="cname" name="clinicname" pattern="[a-zA-Z-\s]*" title="Please enter letters only" value="<?php echo $clinicInfo['name']?>" placeholder="Enter Clinic Name" required>
                    </div>

                    <div class="item">
                        <label for="location">Location:&nbsp;</label>
                        <input type="text" id="location" name="location" value="<?php echo $clinicInfo['location']?>" placeholder="Enter Location" required>
                    </div>

                    <div class="item">
                        <label for="region">Regoin in Riyadh:&nbsp;</label>
                            <select name="regoin" id="regoin">\
                            <option value="<?php echo $clinicInfo['region']?>" selected><?php echo $clinicInfo['region']?></option>
                            <option value="North">North</option>
                            <option value="South">South</option>
                            <option value="East">East</option>
                            <option value="West">West</option>
                            </select>
                        
                    </div>
                 
                    <div class="item">
                        <label for="worktime">Work Time:&nbsp;</label>
                        <input type="text" id="worktime" name="worktime" value="<?php echo $clinicInfo['work_time']?>" placeholder="Enter Work Time" required>
                    </div>

                    <div class="item">
                        <label for="phoneNumber">phone Number:&nbsp;</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" pattern="[0-9]{9,10}" title="Please enter 9-10 Digits" value="<?php echo $clinicInfo['phone_number']?>" placeholder="Enter phone number" required>
                    </div>

                    <div class="item">
                        <label for="logo">Clinic logo:&nbsp;</label>
                        <input type="file" id="myfile" name="myfile" required>
                    </div>

                    <div class="item">
                        <label for="socialmedia">Enter your Instagram link:&nbsp;</label>
                        <input type="text" id="socialmedia" name="socialmedia" value="<?php echo $clinicInfo['social_media']?>" placeholder="Enter Snapchat, Instagram, Twitter" required>
                    </div>
                   <?php }?>
                   <input style="margin-left: 66px; margin-top: 50px;" class="btn" type="submit" value="Submit" name="updateClinic" required>
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
            var ff = document.getElementById('myfile');
                    
                        if (nn.value == "") {
                            alert("Please fill out all fields to update clinic information");
                            cname.focus();
                            return false;
                        }  
                        if (ll.value == "") {
                            alert("Please fill out all fields to update clinic information");
                            location.focus();
                            return false;
                        }  
                        if (ww.value == "") {
                            alert("Please fill out all fields to update clinic information");
                            worktime.focus();
                            return false;
                        }  
                        if (pp.value == "") {
                            alert("Please fill out all fields to update clinic information");
                            phoneNumber.focus();
                            return false;
                        }  
                        if (ss.value == "") {
                            alert("Please fill out all fields to update clinic information");
                            socialmedia.focus();
                            return false;
                        }  
                        if(ff.value == ""){
                            alert("Please fill out the logo field to update clinic information");
                            return false;
                        }
                        

                        else {
  //alert("Clinic was updated successfully");
 //window.location.href="clinicList.php";
} }
    </script>
</body>
</html>