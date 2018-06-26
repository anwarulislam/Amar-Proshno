<?php
session_start();
if (!empty($_SESSION['user'])){
    $_SESSION['message'] = '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                You are Already Logged In..!
              </div>';
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php include("header.php") ?>
</head>


<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="index.php"><b>Amar</b>PROSHNO</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to Ask a Question</p>

        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset ($_SESSION['message']);
        }
        ?>

        <form action="views/auth/login.php" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="email" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" minlength="6" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-4 col-xs-offset-8">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
            </div>
        </form>


        <!-- /.social-auth-links -->
        <p style="text-align: center;padding-top: 10px"><a href="register.php" class="text-center">Register a new membership</a><p/>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="assets/js/jQuery/jquery-2.2.3.min.js"></script>
<script src="assets/js/bootstrap/bootstrap.min.js"></script>
</body>
</html>
