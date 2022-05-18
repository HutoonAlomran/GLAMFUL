<?php
        define("DBHOST", "localhost");
        define("DBNAME", "glamfulDB");
        define("DBUSER", "root");
        define("DBPASS", "root");
        
        $connection= mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
        
        if(mysqli_connect_errno()){
        echo "<h2>Failed to connect to MySQL database: </h2>";
        die(mysqli_connect_error());}
?>
