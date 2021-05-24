<?php
include("connect.php");
$courseID = $_GET['id'];
$head_ID = $_GET['headID'];
 
    $teacherID = mysqli_query($conn, "SELECT teacherfinal.teacher_id FROM teacherfinal,users WHERE teacherfinal.course_id='$courseID' and teacherfinal.teacher_id=users.user_id");
                                    $fetcherTeacher = mysqli_fetch_array($teacherID);
                                     $teacher = $fetcherTeacher['teacher_id']; //teacher ID
                                    $request = mysqli_query($conn, "INSERT INTO `course_request`(`request_id`, `user_id`, `course_id`, `teacher_id`, `status`) VALUES (null,'$head_ID','$courseID','$teacher','pending')");
                                    if($request){
                                        
                                        header("location:approve_courses.php");
                                    }

                                ?>