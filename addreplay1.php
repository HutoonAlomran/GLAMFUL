<?php 
include 'DBconnection.php';
session_start();

$clinic_ID= $_GET['id']; //get the clinic id
$rev_id= $_GET['reviewID']; //get the clinic id


$query= "SELECT * FROM review WHERE ID=$rev_id";
$result = mysqli_query($connection, $query);
      

$role =  $_SESSION['role'];
if($role != 'admin'){
    $_SESSION['role']='guest';
}else{
    echo '<script>alert("Sorry ,as an Admin you cannot write a replay")</script>'; 
    echo  '<script>window.location.href="clinicInfo.php?id='.$_GET['id'].'"; </script>';
    //cant write a replay if you are an admin, back to the clinic info
} 

$repName="";
$replay_text="";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add reply</title>
    <!-- for the stars -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <!-- CSS File -->
    <link rel="stylesheet" href="Addreview.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>

<body>
    <header class="header" id="header">
    
             <a href="index.php" accesskey="h"><img id="LOGO"  src="LOGO.png"  height="60" alt="logo"></a>

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
   
        <div class="breadcrumb">
            <a href="index.php" >Home &nbsp;</a> >>
            <a href="categories.php">&nbsp;Search for clinics&nbsp;</a> >>
            <a href="clinicInfo.php?id=<?php echo $clinic_ID ?>">&nbsp;Clinic Information&nbsp;</a> >>
            <a href="addReplay.php">&nbsp;Add Replay&nbsp;</a> >>
         </div>


    
    <section class="about" id="about">
        <div class="container" style="margin-top: 100px;">
           
            <div class="card four">
        <div class="card-header">
            <p class="title">Add  Your  Reply</p>
        </div>

        <div class="card-body">
<?php   
if(isset($_POST['addReplay'])){
 
    $rev_id1=$_POST["revvv_id"];
    $clinic_ID1=$_POST["cliniccc_id"];
    $repName=$_POST["replayName"];
    $replay_text=$_POST["replayText"];    
   
    
        if(!empty($repName) && !empty($replay_text)){
        $sql="INSERT INTO replies(review_id, name, reply_text) VALUES('$rev_id1','$repName','$replay_text')";    
        $query=mysqli_query($connection,$sql) or die(mysqli_error($connection));

        echo " <p style='color:#007500; border-style:outset; background-color:white;'>Thank you For sharing your thoughts by Adding a Replay ❤!</p>";
        echo '<script>setTimeout(function() { window.location.href="replies.php?id='.$clinic_ID1.'&reviewID='.$rev_id1.'"; }, 4000);  </script> ';
        
        }
    else{
        echo '<script>alert("Please fill out all fields to send a replay");</script>';
    } 
}?>
        <form action="addreplay1.php" method="post" enctype="multipart/form-data" >

           
            
         <?php $row= mysqli_fetch_row($result); ?>
                    <input type="hidden" class="form-control"  name="revvv_id" value="<?php echo $row[0];?>">
                     <input type="hidden" class="form-control"  name="cliniccc_id" value="<?php echo $row[5];?>">
         
              
                     
            
            <br>
            <br>
            <label for="name" style="font-size: large; font-weight: bold; ">Name:&nbsp;</label>
            <input style="width: 10cm; border-radius:5px;" type="text" name="replayName" id="revieww" placeholder="Enter Your Name" required>
            <br><br>
            <label for="review" style="font-size: large; font-weight: bold; ">Reply:&nbsp;</label>
            <textarea rows="10" placeholder="Enter Your Replay" name="replayText" id="revieww" required></textarea>

            <br><br>


            
          <div><input class="cta" type="submit" name="addReplay" > </div>

</form>
        </div>

        
    </div>
        </div>
    </section>
    <!-- End About Section -->
    
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
      

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
 
<script>
 
 
    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });
 
</script>

<style>
    
    input[type=submit] {
    width: 100%;
    cursor: pointer;
    outline: none;
    border: none;
    border-radius: 6px;
    padding: 16px;
    margin-top: 32px;
    background-image: linear-gradient(to right, #EDCDBB,  #724c337e, #D4B499);
    background-size: 300% 100%;
    font-size: 1.4em;
    transition: background-position 0.7s;}

    input[type=submit]:hover {
    background-position: 100% 0;
}
</style>
</body>
</html>

