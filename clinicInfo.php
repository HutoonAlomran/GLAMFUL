<?php 
include 'DBconnection.php';
include 'social.php';
session_start();

$admin_id= $_SESSION["id"];
$role =  $_SESSION['role'];
if($role != 'admin'){
    $_SESSION['role']='guest';
    $role =$_SESSION['role'];
}

$clinic_ID = $_GET['id'];
$query = "SELECT *  FROM clinic WHERE ID='$clinic_ID'";
$result = mysqli_query($connection,$query);
$rquery = "SELECT *  FROM review WHERE clinic_ID='$clinic_ID'";
$revresult = mysqli_query($connection,$rquery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clinic info</title>
    <!-- CSS File -->
    <link rel="stylesheet" href="clinicInfo.css">
    <link rel="stylesheet" href="social.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
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
    
    
        <div class="breadcrumb">
            <a href="index.php" >Home &nbsp;</a> >>
            <a href="categories.php">&nbsp;Search for clinics&nbsp;</a> >>
            <a href="clinicInfo.php?id=<?php echo $clinic_ID;?>">&nbsp;clinicInfo&nbsp;</a> >>
        </div>
         
                 
    </section>
    <!-- End Home Section -->
     <!-- Start About Section -->
    <section class="about" id="about">
        <?php if($role == 'admin'){?>
                    <a href="adminHome.php?id=<?php echo $admin_id ?>"><button class="btn" style="width:110px;margin-top:48px; margin-left:1135px;">Admin home</button></a>
                    <?php } ?>
        <div class="container">
          
                  <?php
                           while ($clinic = mysqli_fetch_assoc($result)) {
                                $idc = $clinic['ID'];
                                $namec = $clinic['name'];
                                $loc = $clinic['location'];
                                $phone = $clinic['phone_number'];
                                $soM = $clinic['social_media'];
                                $img = $clinic['picture'];
                                $reg = $clinic['region'];
                                $WT = $clinic['work_time'];
                           
                ?>
                
            
            <div class="about-detail">
                
            <div class="section-title" style="margin-top: 50px; ">
                <h1><?php echo $namec ?></h1>
            </div>
                <div class="about-detail-content">
                    <div class="about-img">
                        <img src="img/<?php echo $img ?>" width="350" height="350">
                    </div>
                    <div class="about-description">
                        <p>Location : <?php echo $loc ?></p>
                        <p>Working Hours : <?php echo $WT ?></p>
                        <p>Contact : <?php echo $phone ?></p>
                        <div style="display:inline;"><img src="img/check-mark.png" width="23px;" height="23px;"><h3>Certified clinic</h3></div>
                        <div class="footer-data-social">
                    
                   
                    <p><a href="<?php echo $soM ?>"><i class="fab fa-instagram"></i></a>  <?php echo $soM ?></p>
                   
                </div> 
                <?php
		showSharer("http://localhost/GlamfulFinall/GlamfulFinall/clinicInfo.php?id=$clinic_ID", "Check this clinic!"); //must add clinic link 
		?>
                    </div>
                </div>
                  <?php }?>
            </div>
        </div>
    </section>
    <!-- End About Section -->
    <!-- Start Services Section -->
    <section class="services" id="services">
        <div class="services-content">
           
           <div class="testimonials-content">
            <div class="section-title">
                 <span>Client Reviews</span>
            </div>
             
            <div class="testimonials-card" style="margin-left: -80px;">
                    <?php
                           while ($review = mysqli_fetch_assoc($revresult)) {
                                $rid = $review['ID'];
                                $rname = $review['name'];
                                $rrating = $review['rating'];
                                $rtext = $review['review_text'];
                                $rimg = $review['picture'];
                ?>
                
                <div class="testimonials-item">
                            
                    <div class="testimonials-box" >
                        
                        <div class="testimonials-name">
                            <h1 style="color: #f7e6df; font-weight: bold;"><?php echo $rname ?></h1>
                           <?php for($i = 1; $i <= $rrating; $i++){ ?>
                                    <i class='fa fa-star'  style="color:#f5c71a;" ></i>  
                            <?php }?>
                        </div>
                        <div class="testimonials-description">
                           <p><?php echo $rtext ?> </p><br>
                           <?php if(!empty($rimg)){?>
                           <img src="img/<?php echo $rimg ?>" width="200" height="150">
                           <?php }else{ ?>
                          <img  width="200" height="150">
                          <?php }?>
                        </div>
                        <br>
 
                        <?php if($role == 'guest'){?>
                       <a href="addreplay1.php?id=<?php echo $_GET['id'];?>&reviewID=<?php echo $rid; ?>">  <i class="fa fa-reply" style="font-size:24px;color:#4F2C05;"></i></a>
                       
                        <br>
                         <?php } ?>
                       <?php if($role == 'admin'){?>
                        <button onclick="deleteReview(<?php echo $rid ?>)"><i class="fa fa-solid fa-trash" style="font-size:24px;color:#4F2C05; left:0; bottom:0; "></i></button>
                        <?php } ?>
                      <br>
                        <div class="testimonials-description" style="text-align: center;">
                        <a href="replies.php?id=<?php echo $_GET['id'];?>&reviewID=<?php echo $rid; ?>" class="nav-link" style="text-decoration:underline;">Replies</a>
                        </div>
                        
                    </div>
                    <br>
                </div>
         
               <?php } ?>
                 </div> 
                    <?php if($role == 'guest'){?>
                  <a href="addReview.php?id=<?php echo $_GET['id'];?>"><button class="Addbtn">Add Review</button></a>
                    <?php } ?>
           </div>   
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
    <script>
    function deleteReview(id) {
        $result= confirm('Warning: Are you sure you want delete this Review?');
        if($result == true){
        $.ajax({
            url:"deleteReview.php",
            type:"POST",
            data:{id:id},
            success:function(data){
                window.location.reload();
            },
            error: function (){
                alert("AJAX request was a failure");
            }
        });}
    
    }     
    </script>
    <script>
	var share_btn = document.querySelector(".share_btn");
	var toggle_button = document.querySelector(".toggle_button");

	share_btn.addEventListener("click", function(){
		toggle_button.classList.toggle("active");
	});
</script>
</body>
</html>