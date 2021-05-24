<?php
include 'connect.php';

function password_generate(){$data = '1234567890';return substr(str_shuffle($data), 0, 8);} 
$teacherApproveId = $_GET['teacherApproveId'];
 if($teacherApproveId > 0){
    $query = mysqli_query($conn, "SELECT * FROM teacher WHERE teacher_id='$teacherApproveId'");
    $teachertInfo = mysqli_fetch_array($query);
    $teacherName = $teachertInfo['name'];
    $teacherEmail = $teachertInfo['email'];
    $teacherDob = $teachertInfo['DOB'];
    $teacherGender = $teachertInfo['gender'];
    $teacherCourseId = $teachertInfo['course_id'];
    $teacherPassword = password_generate(); //random password
    //query to check if the course doesn't have a teacher
    $teacherTest = mysqli_query($conn, "SELECT * FROM teacherfinal,course,users WHERE teacherfinal.course_id='$teacherCourseId' and teacherfinal.teacher_id=course.teacher_id and teacherfinale.teacher_id=users.user_id and users.user_id='$teacherApproveId'");
    if($teacherTest){
        //echo "<script>alert('this course have a teacher')</script>";
        echo $teacherCourseId;
    }else{
        $insert = mysqli_query($conn, "INSERT INTO users (`user_id`, `name`, `email`, `DOB`, `password`, `gender`, `status`, `account`) 
        VALUES ('$teacherApproveId', '$teacherName', '$teacherEmail', '$teacherDob', '$teacherPassword', '$teacherGender', 'enabled', 'Teacher')");
        if($insert){
            $subInsert = mysqli_query($conn, "INSERT INTO teacherfinal(`teacherFinal_id`, `teacher_id`, `course_id`) VALUES (null, '$teacherApproveId', '$teacherCourseId')");
            if($subInsert){
                $updateTeacher= mysqli_query($conn, "UPDATE course SET teacher_id='$teacherApproveId' WHERE course_id='$teacherCourseId'");
                $DeleteTeacher = mysqli_query($conn, "DELETE FROM teacher WHERE teacher_id='$teacherApproveId'");
                if($DeleteTeacher){
                $subjectApprove = 'APPROVAL MAIL';
                $approveMail = 'hello, ' . $teacherName . ' your application have been approved. \n Your password is <b>'. $teacherPassword. ' </b>' ;
                sendEmail($teacherEmail, $approveMail, $subjectApprove, $emailFrom, $emailpass);
                header("location:view_teacher.php");
            }
            }     
        }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        

}
}
?>