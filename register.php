<?php
session_start();
if (!empty($_SESSION['user'])){
    $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                You are already Logged In..!
              </div>';
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <?php include("header.php") ?>
</head>

<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="index.php"><b>Amar</b>PROSHNO</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>


        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset ($_SESSION['message']);
        }
        ?>


        <form action="views/auth/register.php" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                <span class="glyphicon glyphicon-font form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" required>
                <span class="glyphicon glyphicon-font form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                <span class="glyphicon glyphicon-font form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="email" placeholder="Email" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input minlength="6" type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input minlength="6" type="password" name="rpass" id="confirm_password" class="form-control" placeholder="Retype password" required>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8"></div>
                <div class="col-xs-4">
                    <button type="submit" name="register" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
            </div>
        </form>


        <div class="social-auth-links text-center">
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Already Have
                Membership
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Login
                            <small>Type Email and Password to Login</small>
                        </h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <button type="button" class="btn btn-info btn-sm" data-dismiss="modal"
                                    data-toggle="tooltip" title="remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="login-box-body">
                        <p class="login-box-msg">Sign in to Ask a Question</p>


                        <form action="views/auth/login.php" method="post">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" name="email" placeholder="Email" required>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input minlength="6" type="password" class="form-control" name="password" placeholder="Password" required>
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="row">
                                <div class="col-xs-8"></div>
                                <div class="col-xs-4">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                                </div>
                            </div>
                        </form>
                        <!-- /.social-auth-links -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="assets/js/jQuery/jquery-2.2.3.min.js"></script>
<script src="assets/js/bootstrap/bootstrap.min.js"></script>
<script>
    var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
</body>
</html>
