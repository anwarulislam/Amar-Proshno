<?php
session_start();
if (empty($_SESSION['user'])){
    $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                You are not Logged In..!
              </div>';
    header('location:index.php');
}
?>
<?php
include("vendor/autoload.php");
use App\auth\auth;


$obj = new auth();
$profile = $obj->profile($_GET['uid']);

if ($_SESSION['user']['id'] !== $_GET['uid']) {
    header('location:update.php?uid=' . $_SESSION['user']['id']);
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
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
                Update Your Profile Information
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="views/auth/update.php" method="post">
                <input type="hidden" name="userid" value="1">
                <div class="row">
                    <div class="col-md-4">

                        <!-- -->

                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle"
                                     src="<?php echo $profile['photo'] ?>" alt="User profile picture">
                                <input class="form-control" type="file" name="photo" id="exampleInputFile">

                                <h3 class="profile-username text-center">
                                    <?php echo $profile['first_name']." ".$profile['middle_name']." ".$profile['last_name']; ?>
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <input maxlength="10" name="first_name" type="text"
                                                   value="<?php echo $profile['first_name']; ?>"
                                                   class="text-muted form-control" placeholder="First Name">
                                        </div>
                                        <div class="col-xs-4">
                                            <input maxlength="10" name="middle_name" type="text"
                                                   value="<?php echo $profile['middle_name']; ?>"
                                                   class="text-muted form-control" placeholder="Middle Name">
                                        </div>
                                        <div class="col-xs-4">
                                            <input maxlength="10" name="last_name" type="text"
                                                   value="<?php echo $profile['last_name']; ?>"
                                                   class="text-muted form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                </h3>

                                <p class="text-muted text-center"><?php echo $profile['email']; ?></p>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-8">
                        <!-- About Me Box -->
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">About</h3>
                                <div class="pull-right box-tools">
                                    <button type="submit" name="submit" class="btn btn-info btn-sm"
                                            title="Save">
                                        <i class="fa fa-save"> Save Changes</i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

                                <input type="text" name="email" class="text-muted form-control"
                                       value="<?php echo $profile['email']; ?>" disabled>

                                <hr>
                                <strong><i class="fa fa-birthday-cake margin-r-5"></i> Date of Birth</strong>

                                <input type="text" name="date_of_birth" placeholder="YYYY-MM-DD"
                                       class="text-muted form-control" value="<?php echo $profile['date_of_birth']; ?>">
                                <hr>
                                <strong><i class="fa fa-transgender-alt margin-r-5"></i> Gender</strong>

                                <select name="gender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <hr>
                                <strong><i class="fa fa-bicycle margin-r-5"></i> Hobby</strong>

                                <input maxlength="15" name="hobby" type="text" class="text-muted form-control"
                                       value="<?php echo $profile['hobby']; ?>">

                                <hr>
                                <strong><i class="fa fa-smile-o margin-r-5"></i> Interest</strong>

                                <input maxlength="15" name="interest" type="text" class="text-muted form-control"
                                       value="<?php echo $profile['interest']; ?>">

                                <hr>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
            </form>
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
