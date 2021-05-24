<?php 
include('connect.php');
$teacherID = $_GET['id'];
$update = mysqli_query($conn, "UPDATE users SET status='enabled' WHERE user_id='$teacherID'");
 if($update){
header("location:board_teacher.php");
 }
                                
?>