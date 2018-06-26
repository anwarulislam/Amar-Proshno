<?php
session_start();
include("vendor/autoload.php");
use App\auth\auth;

$obj = new auth();
$users = $obj->ShowAllUsers();

/*if (empty($_SESSION['user'])) {
    $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                You are not Logged In..!
              </div>';
    header('location:index.php');
}*/
?>
<!DOCTYPE html>
<html>
<head>
    <?php include("header.php") ?>
</head>
<body class="hold-transition skin-green sidebar-mini fixed">
<div class="wrapper">

    <?php include("navbar.php") ?>
    <?php include("sidebar.php") ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset ($_SESSION['message']);
            }
            ?>
            <h1 style="text-align: center">
                All registered Users
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">



                <?php foreach ($users as $user) { ?>
                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-aqua-active">
                            <h3 class="widget-user-username"><?php echo $user['first_name']." ".$user['middle_name']." ".$user['last_name']; ?></h3>
                            <h5 class="widget-user-desc"><?php echo $user['email']; ?></h5>
                        </div>
                        <div style="padding-top: 10px" class="widget-user-image">
                            <img class="img-circle" src="<?php echo $user['photo']; ?>" alt="User Avatar">
                        </div>
                        <div class="box-footer"></div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-xs-4 border-right">
                                    <a href="profile.php?uid=<?php echo $user['id']; ?>"><i class="fa fa-user"> Profile</i></a>
                                </div>
                                <div class="col-xs-4 border-right">
                                    <a href="update.php?uid=<?php echo $user['id']; ?>"><i class="fa fa-edit"> Update</i></a>
                                </div>
                                <div class="col-xs-4">
                                    <a href="views/auth/delete.php?101010101010101010101010101010=<?php echo $user['id']; ?>"><i class="fa fa-trash"> Delete</i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                <?php } ?>



            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include("footer.php") ?>

    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

</body>
</html>
