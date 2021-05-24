<?php
include('connect.php');
require_once 'server/mail.php';
$StudentrejectId =$_GET['StudentrejectId'];
$query = mysqli_query($conn, "SELECT * FROM students WHERE student_id='$StudentrejectId'");
    $studentInfo = mysqli_fetch_array($query);
    $studentName = $studentInfo['names'];
    $studentEmail = $studentInfo['email'];
    $studentDob = $studentInfo['DOB'];
    $studentGender = $studentInfo['gender'];
    $DeleteStudent = mysqli_query($conn, "DELETE FROM students WHERE student_id='$StudentrejectId'");
    if ($DeleteStudent) {
        $subjectDeny = 'APPLICATION REJECTION';
        $denyMail = 'HEllo '. $studentName . 'your application have been rejected try again...';
        sendEmail($studentEmail, $denyMail, $subjectDeny, $emailFrom, $emailpass);
        header("location: view_student.php");
    } 
?>