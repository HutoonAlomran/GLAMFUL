<?php 
include 'DBconnection.php';
$Review_id = $_POST['id'];
echo $Review_id;
if(isset($Review_id)){
$deleteReview="DELETE FROM review WHERE ID=$Review_id";
$result = mysqli_query($connection, $deleteReview);


$deleteReplies="DELETE FROM replies WHERE review_id=$Review_id";
$result = mysqli_query($connection, $deleteReplies);
    
}
