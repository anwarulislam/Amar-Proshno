<?php
session_start();
include("vendor/autoload.php");
use App\question\question;

$obj = new question();
$data = $obj->show($_GET['quid']);
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
        <section class="content-header">
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset ($_SESSION['message']);
            }
            ?>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">

                <!-- /.col -->
                <div class="col-md-8">
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Update or Edit Your Question
                                <small>in this section you can edit your Question</small>
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
                            <form action="views/question/update.php" method="post">
                                <input type="hidden" name="question_id" value="<?php echo $_GET['quid']; ?>">
                                <img class="img-responsive img-circle img-sm" src="<?php echo $data['photo']; ?>" alt="image">
                                <!-- .img-push is used to add margin to elements next to floating images -->
                                <div class="img-push">
                                    <div style="padding-bottom: 10px;"
                                         class="input-group input-group-sm">

                                        <input type="text" name="title" value="<?php echo $data['title']; ?>"
                                               placeholder="Enter your Question title"
                                               class="form-control">
                                        <span class="input-group-btn">
                      <i class="btn btn-info btn-flat">Title</i>
                    </span>
                                    </div>
                                </div>
                                <textarea id="editor1" name="description" rows="10" cols="80" ">
                                <?php echo $data['description']; ?>
                                </textarea>
                                <div class="box-footer">
                                    <a href="views/question/delete.php?101010101010101010101010101010="<?php echo $data['id']; ?> type="button" class="btn btn-default">Delete
                                    </a>
                                    <button type="submit" class="btn btn-info pull-right">Update</button>
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
