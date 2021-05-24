<?php
include('connect.php');
$removeID = $_GET['removeId'];
$delete = mysqli_query($conn, "DELETE FROM course_request WHERE request_id = '$removeID'");
if($delete){
header("location:teacher_index.php");
}
?>