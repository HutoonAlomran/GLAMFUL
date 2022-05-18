<?php
    include 'DBconnection.php';
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
            <a href="adminlogIn.php">&nbsp;Admin Log In&nbsp;</a> >>
        </div>

        <div class="container" style="align-items:center;">
                        
                    <?php     
    if(isset($_POST['adminLogIn'])){
        $adminUsername= $_POST['username'];
        $password= $_POST['password'];
        $sql= "SELECT * FROM admin WHERE username='$adminUsername';";
        $result= mysqli_query($connection, $sql);
        if(mysqli_num_rows( $result )>0){
            $row = mysqli_fetch_row( $result );
            $logPassword =$row[4];

            if(password_verify($password,$logPassword)){
                session_start();
                $_SESSION["id"]= $row[0];
                $_SESSION["username"]= $row[1];
                $_SESSION["fn"]= $row[2];
                $_SESSION["ln"]= $row[3];
                $_SESSION["role"]= 'admin';

                header("Location:adminHome.php");
                exit();
                
       }else {
                        echo "<p style='color:#C70039;  border-style:outset; background-color:white;'>You entered an incorrect password, please log in again</p>";
                        }

                    }else {
                    echo "<p style='color:#C70039;  border-style:outset; background-color:white; '>You entered an incorrect or non existent admin username, please log in again</p>";
                    }
            }?>
            <p class="sign" align="center"> 
                <div class="section-title">
                    <h1>Log In
                    
                    </h1>
               
                </div>
            </p>


            <form class="form1" method="post" action="adminLogIn.php">

              <input class="input" name="username" id="Username" type="text" align="center" placeholder="Username" pattern=".{3,}" title="Please enter three or more characters" required>
              <input class="input" name="password" id="password" type="password" align="center" placeholder="Password""
              title="Must contain at least one  number and one uppercase and lowercase letter, and at least 6 or more characters" required>
              <input class="submit"  type="submit" align="center" value="Log In" name="adminLogIn" onclick="logFunction()">
              <p class="forgot" align="center"><a href="adminsignUp.php">Don't have an account? Sign Up here</p>
    
            </form>           
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
    <script>
    function  logFunction() {
        var uuu = document.getElementById('Username');
        var ppp = document.getElementById('password');
           
                    
                        if (uuu.value == "") {
                            alert("Please fill out all fields to Log In");
                            Username.focus();
                            return false;
                        }  
                        if (ppp.value == "") {
                            alert("Please fill out all fields to Log In");
                            password.focus();
                            return false;
                        }

                        else {
 // window.location.href="Mhomepage.html";
} }
</script>
</body>
</html>
