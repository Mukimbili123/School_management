<?php
include('connect.php');
$teacherRejectId =$_GET['teacherRejectId'];
$query = mysqli_query($conn, "SELECT * FROM teacher WHERE teacher_id='$teacherRejectId'");
$teachertInfo = mysqli_fetch_array($query);
$teacherName = $teachertInfo['name'];
$teacherEmail = $teachertInfo['email'];
$teacherDob = $teachertInfo['DOB'];
$teacherGender = $teachertInfo['gender'];
$teacherCourseId = $teachertInfo['course_id'];
    $DeleteStudent = mysqli_query($conn, "DELETE FROM teacher WHERE teacher_id='$teacherRejectId'");
    if ($DeleteStudent) {
        $subjectDeny = 'APPLICATION REJECTION';
        $denyMail = 'HEllo '. $teacherName . ' your application have been rejected try again...';
        sendEmail($teacherEmail, $denyMail, $subjectDeny, $emailFrom, $emailpass);
        header("location: view_teacher.php");
    } 
?>