<?php
include('connect.php');
require_once 'server/mail.php';
$courserejectID =$_GET['courseRejectId'];
$studentName = $_GET['user_name'];
$studentEmail = $_GET['user_email'];
$course_name = $_GET['course_name'];
    $DeleteStudent = mysqli_query($conn, "DELETE FROM course_request WHERE request_id='$courserejectID'");
    if ($DeleteStudent) {
        $subjectDeny = 'COURSE REJECTION';
        $denyMail = 'HEllo '. $studentName . 'your requested course <b>'. $course_name .'</b>have been rejected try again...';
        sendEmail($studentEmail, $denyMail, $subjectDeny, $emailFrom, $emailpass);
        header("location:head_master_course_approve.php");
    } 
?>