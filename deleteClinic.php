<?php 
include 'DBconnection.php';
$clinic_id = $_POST['id'];

if(isset($clinic_id)){
    //delete the clinic
    $query="DELETE FROM clinic WHERE ID=$clinic_id";
    $result = mysqli_query($connection, $query);

    $query2 = "SELECT  ID FROM review WHERE clinic_ID=$clinic_id";
    $result2 =mysqli_query($connection, $query2);
    
    
    

        $query3 = "DELETE FROM replies WHERE review_id=ANY(SELECT ID FROM review WHERE clinic_ID=$clinic_id)";
        $result3 = mysqli_query($connection, $query3);
    
    
    //delete all clinic reviews and its replies
    $query1= "DELETE FROM review WHERE clinic_ID=$clinic_id";
    $result1= mysqli_query($connection, $query1);

}
