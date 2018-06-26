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
<!DOCTYPE html>
<html>
<head>
    <?php include("header.php") ?>
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

    <?php include("navbar.php") ?>
    <?php include("sidebar.php") ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">

            <div class="row">

                <!-- /.col -->
                <div class="col-md-8">

                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-green-active"
                             style="background: url('assets/images/bg.png') center center;">
                            <h3 class="widget-user-username"><?php echo $_SESSION['user']['first_name'] ." ". $_SESSION['user']['middle_name'] ." ". $_SESSION['user']['last_name']; ?></h3>
                            <h5 class="widget-user-desc"><?php echo $_SESSION['user']['hobby']; ?></h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="<?php echo $_SESSION['user']['photo']; ?>" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <a href="profile.php?uid=<?php echo $_SESSION['user']['id']; ?>">
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header">3,200</h5>
                                            <span class="description-text">QUESTIONS</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                </a>
                                <!-- /.col -->

                                <a href="profile.php?uid=<?php echo $_SESSION['user']['id']; ?>">
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header">3,200</h5>
                                            <span class="description-text">ANSWERED</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                </a>
                                <!-- /.col -->

                                <a href="profile.php?uid=">
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header">200</h5>
                                            <span class="description-text">UNANSWERD</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                </a>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>

                    <!--you can start new row-->

                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Ask Anything
                                <small>in this section you can ask anything to anyone</small>
                            </h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                <button type="button" class="btn btn-info btn-sm" data-widget="collapse"
                                        data-toggle="tooltip" title="Collapse">
                                    <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-info btn-sm" data-widget="remove"
                                        title="Remove">
                                    <i class="fa fa-times"></i></button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            <form action="views/question/question.php" method="post">
                                <img class="img-responsive img-circle img-sm"
                                     src="<?php echo $_SESSION['user']['photo']; ?>"
                                     alt="image">
                                <!-- .img-push is used to add margin to elements next to floating images -->
                                <div class="img-push">
                                    <div style="padding-bottom: 10px;"
                                         class="input-group input-group-sm">
                                        <input type="hidden" name="user_id"
                                               value="<?php echo $_SESSION['user']['id']; ?>">
                                        <input maxlength="120" type="text" name="title"
                                               placeholder="Enter your Question title"
                                               class="form-control">
                                        <span class="input-group-btn">
                      <i class="btn btn-info btn-flat">Title</i>
                    </span>
                                    </div>
                                </div>
                                <textarea id="editor1" name="description" rows="10" cols="80" ">

                                </textarea>
                                <div class="box-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"
                                            data-toggle="tooltip">Cancel
                                    </button>
                                    <button type="submit" class="btn btn-info pull-right">Ask</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>


                <div class="col-md-4">
                    <?php include("rightbar.php") ?>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include("footer.php") ?>

</div>
<!-- ./wrapper -->

</body>
</html>
