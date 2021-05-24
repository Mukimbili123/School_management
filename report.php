<?php
    session_start();
    if(!$_SESSION['head_master']){
    header("location:login.php?Make log in");
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>School management system</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body >
<center>
    <img src="img/download.jpg" class="img">


<h4 class="label-control text-danger">Reporting</h4>

<table class="table table-responsive col-md-12" width="400" >
                        <thead>
                            <td>#</td>
                            <td>Teacher's name</td>
                            
                            <td>Course name</td>
                            <td>Student name</td>
                        </thead>
                        <?php
                        include("connect.php");
                        $na=mysqli_query($conn,"SELECT * from course_request WHERE status ='approved'");
                        $counter=1;
                        while($fe=mysqli_fetch_array($na)){
                        ?>
                        <tbody>
                            <td><?=$counter?></td>
                            <td><?php
                            $teach = $fe['teacher_id'];
                            $teacherSet = mysqli_query($conn, "SELECT name FROM users,teacherfinal WHERE users.user_id='$teach' and users.user_id=teacherfinal.teacher_id");
                            $teacherGet = mysqli_fetch_array($teacherSet);
                            echo $teacherGet['name'];
                            ?></td>
                           
                            <td>
                           <?php
                           $course = $fe['course_id'];
                           $courseSet = mysqli_query($conn, "SELECT course.name FROM course_request,course,teacherfinal WHERE course_request.course_id= '$course' and course_request.status='approved'");
                           $courseGet = mysqli_fetch_array($courseSet);
                           echo $courseGet['name'];
                           ?>
                            </td>
                            <td><?php 
                           $stud = $fe['user_id'];
                           $studentSet = mysqli_query($conn, "SELECT name FROM course_request,users WHERE course_request.user_id= '$stud' and course_request.user_id=users.user_id and course_request.status='approved'");
                           $studentGet = mysqli_fetch_array($studentSet);
                           echo $studentGet['name'] . '<br>';
                           
                            ?>

                            </td>
                            
                        </tbody>
                    <?php  $counter++; }    ?>
                    </table>
</center>
                    <a href="javascript:window.print()" class="btn btn-primary" id="printbtn">Print report</a>
                    <style>
                    @media print{
                        #printbtn{
                            display: none;
                        }
                    }
                    </style>

</body>

</html>