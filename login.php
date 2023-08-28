<?php
include('conn.php');
session_start();



if(isset($_POST['submit'])){
//extract($_POST);
$ad_email=mysqli_real_escape_string($con,$_POST['ad_email']);
$ad_pass=mysqli_real_escape_string($con,$_POST['ad_pass']);
$check=mysqli_query($con,"select * from admin where ad_email='$ad_email' and ad_password='$ad_pass'");
$check_fetch=mysqli_fetch_array($check);

if($check_fetch['ad_id']!=''){
$_SESSION['ad_id']=$check_fetch['ad_id'];


header('location:index.php');
}

}

?>

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex" />
    <title>DrSm@rt | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background: #f5f5f5;
        }

        .login-page {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-logo {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 25px;
        }

        .header-logo {
            display: block;
            width: 150px;
            margin: 0 auto 30px;
        }

        .form-control {
            border-radius: 20px;
        }

        .input-group-text {
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
        }

        .btn-primary {
            border-radius: 20px;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active {
            background-color: #0069d9;
            border-color: #0062cc;
        }

        .forgot-password {
            text-align: center;
            margin-top: 20px;
            color: #888;
        }

        .forgot-password a {
            color: #007bff;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-page">
        <div class="login-box">
            <img src="images/header_logo.png" alt="DrSm@rt" title="DrSm@rt" class="header-logo img-fluid">
            <h1 class="login-logo">Admin Login</h1>
            <form method="post">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" name="ad_email" class="form-control" placeholder="Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></
                            </span>
                        </div>
                        <input type="password" name="ad_pass" class="form-control" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
            </form>
             
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>
