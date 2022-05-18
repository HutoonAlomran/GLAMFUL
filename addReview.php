<?php 
include 'DBconnection.php';
session_start();

$_SESSION['clinic_id'] = $_GET['id']; //get the clinic id

$role =  $_SESSION['role'];
if($role != 'admin'){
    $_SESSION['role']='guest';
}else{
    echo '<script>alert("Sorry ,as an Admin you cannot write review")</script>'; 
    echo  '<script>window.location.href="clinicInfo.php?id='.$_GET['id'].'"; </script>';
    //cant write a reviw if you are an admin, back to the clinic info
} 

$name="";
$rating="";
$review_text="";
$picture="";

$clinic_ID = $_SESSION['clinic_id'];

   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add review</title>
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
            <a href="addReview.php">&nbsp;Add Review&nbsp;</a> >>
         </div>

    <section class="about" id="about">
        <div class="container" style="margin-top: 100px;">
           
            <div class="card four">
        <div class="card-header">
            <p class="title">Add  Your  Review</p>
        </div>

        <div class="card-body">

<?php    
if(isset($_POST['add'])){
    
    //$ID=$_GET["ID"];
    $name=$_POST["name"];
    $rating=$_POST["rating"];
    $review_text=$_POST["review"];    
    $picture = $_FILES['image']['name'];
    $tempname = $_FILES['image']['temp_name'];
    move_uploaded_file($tempname,"img/".$picture); //it works but its showing an erroe in 18
  
     if(empty($rating)){
          echo "<p style='color:#C70039; border-style:outset; background-color:white;'>its required to rate using Stars 🟌,please rate our clinic</p>";
    } else {
        if(!empty($name) && !empty($review_text)){
        $sql="INSERT INTO review(name, rating, review_text, picture, clinic_ID) VALUES('$name','$rating','$review_text','$picture','$clinic_ID')";    
        $query=mysqli_query($connection,$sql) or die(mysqli_error($connection));
        echo " <p style='color:#007500; border-style:outset; background-color:white;'>Thank you For sharing your thoughts by Adding a Review ❤!</p>";
        echo '<script>setTimeout(function() {window.location.href="clinicinfo.php?id='.$clinic_ID.'";}, 4000);  </script> ';
       
        }
    }
}?>
        <form action="addReview.php?id=<?php echo $_SESSION['clinic_id'] ?>" method="post" enctype="multipart/form-data" >

            <div class="rateyo" id= "rating"
              data-rateyo-rating="0"
              data-rateyo-num-stars="5"
              data-rateyo-score="3">
            </div>


            <span class='result'>0</span>

            <input type="hidden" name="rating">

            <br>
            <br>
            <label for="name" style="font-size: large; font-weight: bold; ">Name:&nbsp;</label>
            <input style="width: 10cm; border-radius:5px;" type="text" name="name" id="revieww" placeholder="Enter Your Name" required>
            <br><br>
            <label for="review" style="font-size: large; font-weight: bold; ">Review:&nbsp;</label>
            <textarea rows="10" placeholder="Enter Your Review" name="review" id="revieww" required></textarea>

            <br><br>


            <label style="font-size: large; font-weight: bold;">Select image:&nbsp;</label>
            <input type="file" name="image" id="image">


          <div><input class="cta" type="submit" name="add" > </div>

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
        $(".rateyo").rateYo({fullStar: true}).on("rateyo.change", function (e, data) {
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