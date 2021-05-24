<?php
include('connect.php');
$studentID = $_GET['id'];
$update = mysqli_query($conn, "UPDATE users SET status='enabled' WHERE user_id='$studentID'");
if($update){
    header("location:board_student.php");
}
                                ?>
                                    