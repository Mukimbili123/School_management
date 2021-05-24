<?php
include("connect.php");
require_once 'server/mail.php';
function password_generate()
{
    $data = '1234567890';
    return substr(str_shuffle($data), 0, 8);
} //password generator functionStudentapproveId
$StudentapproveId = $_GET['StudentapproveId'];

if ($StudentapproveId > 0) {
    $query = mysqli_query($conn, "SELECT * FROM students WHERE student_id='$StudentapproveId'");
    $studentInfo = mysqli_fetch_array($query);
    $studentName = $studentInfo['names'];
    $studentEmail = $studentInfo['email'];
    $studentDob = $studentInfo['DOB'];
    $studentGender = $studentInfo['gender'];
    $studentPassword = password_generate(); //to get generated password
    $ID = $studentInfo['student_id'];
    //$insert = mysqli_query($conn, "INSERT INTO users(`user_id`, `name`, `email`, `DOB`, `password`, `gender`, `status`, `account`) VALUES ('$ID', '$studentName', '$studentEmail', '$studentDob', '$studentPassword', '$studentGender', 'enabled', 'Student')");
   $insert = mysqli_query($conn, "INSERT INTO `users`(`user_id`, `name`, `email`, `DOB`, `password`, `gender`, `status`, `account`) VALUES ('$ID','$studentName','$studentEmail','$studentDob','$studentPassword','$studentGender','enabled','Student')");
   
   if($insert){

        $DeleteTeacher = mysqli_query($conn, "DELETE FROM students WHERE student_id='$StudentapproveId'");
        if($DeleteTeacher){
        $subjectApprove = 'APPROVAL MAIL';
        $approveMail = 'hello, ' . $studentName . ' your application have been approved. \n Your password is <b>'. $studentPassword. ' </b>' ;
        sendEmail($studentEmail, $approveMail, $subjectApprove, $emailFrom, $emailpass);
        header("location:view_student.php");
    }
        
}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        

    
}//end of studentID checking
?>
