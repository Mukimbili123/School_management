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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-sm-block"><img src="img/2.png" width="100%" height="100%"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Sign in </h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user"
                                                 aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                 placeholder="Password">
                                        </div>
                                        
                                        <button class="btn btn-primary btn-user btn-block" name="login">
                                            Login
                                        </button>
                                       <?php
                                       include('connect.php');
                                       session_start();
                                       if(isset($_POST['login'])){
                                           $email = $_POST['email'];
                                           $password = $_POST['password'];
                                           $select = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' and password='$password'");
                                           $fetch = mysqli_fetch_array($select);
                                           if (mysqli_num_rows($select) > 0){
                                              if ($fetch['account'] == 'Teacher'){
                                                  if($fetch['status'] == 'enabled'){
                                                      $_SESSION['teacher'] = $fetch['user_id'];
                                                      header("location:teacher_index.php");

                                                  }else{
                                                      echo "<label class='text-danger'>Your account have been disabled... </label>";
                                                  }
                                              } else if($fetch['account'] == 'Student'){
                                                if($fetch['status'] == 'enabled'){
                                                    $_SESSION['student'] = $fetch['user_id'];
                                                    header("location:student_index.php");

                                                }else{
                                                    echo "<label class='text-danger'>Your account have been disabled... </label>";
                                                }
                                              }else if($fetch['account'] == 'head_master'){
                                                if($fetch['status'] == 'enabled'){
                                                    $_SESSION['head_master'] = $fetch['user_id'];
                                                    header("location:index.php");

                                                }else{
                                                    echo "<label class='text-danger'>Your account have been disabled... </label>";
                                                }
                                              }
                                           }else{
                                               echo "<label class='text-danger'>INVALID Email and Password</label>";
                                           }
                                       }
                                       ?>
                                    </form>
                                    <div class="text-center">
                                        
                                    </div>
                                    <hr>
                                    
                                    <div class="text-center">
                                        <a class="medium btn btn-success btn-user btn-block" href="register_student.php">STUDENT application</a>
                                    </div>
                                    <br>
                                    <div class="text-center">
                                        <a class="medium btn btn-danger btn-user btn-block" href="register_teacher.php">TEACHER application </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>