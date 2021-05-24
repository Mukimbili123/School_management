<?php
include('connect.php');
require_once 'server/mail.php';
$courserejectID =$_GET['courseApproveId'];
$studentName = $_GET['user_name'];
$studentEmail = $_GET['user_email'];

    $DeleteStudent = mysqli_query($conn, "UPDATE course_request SET status='approved' WHERE request_id='$courserejectID'");
    if ($DeleteStudent) {
        $subjectDeny = 'COURSE APPROVAL';
        $denyMail = 'HEllo '. $studentName . 'your requested course <b>'. $course_name .'</b> have been approved try again...';
        sendEmail($studentEmail, $denyMail, $subjectDeny, $emailFrom, $emailpass);
        header("location:head_master_course_approve.php");
    } 
?>