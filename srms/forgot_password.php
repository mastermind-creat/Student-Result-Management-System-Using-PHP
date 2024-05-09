<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit']))
  {
    $contactno=$_POST['contactno'];
    $email=$_POST['email'];

        $query=mysqli_query($con,"select ID from tbladmin where  Email='$email' and MobileNumber='$contactno' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['contactno']=$contactno;
      $_SESSION['email']=$email;
     header('location:resetpassword.php');
    }
    else{
      $msg="Invalid Details. Please try again.";
    }
  }
  ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    
    <title>SRMS Forgot Password</title>
  

        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/prism/prism.css" media="screen" > <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>



</head>

<body class="bg-dark" style=" background-image: url('images/bg.jpg');">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                      <h3 style="color: white">Student REsults Management System </h3>
                    <hr  color="red"/>
                </div>
                <div class="login-form">
                    <form action="" method="post" name="submit">
                        <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="Email" required="" name="email">
                        </div>
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <input type="text" class="form-control" placeholder="Mobile Number" name="contactno" required="">
                        </div>
                                <div class="checkbox">
                                    <label class="pull-left">
                                <a href="index.php">sign in</a>
                            </label>

                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="submit">Reset</button>
                                
                            
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
