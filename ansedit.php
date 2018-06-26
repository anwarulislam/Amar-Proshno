<?php
session_start();
include("vendor/autoload.php");
use App\answer\answer;

$obj = new answer();
$data = $obj->show($_GET['ansid']);
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
                            <h3 class="box-title">Update or Edit Your Answer
                                <small>in this section you can edit your Answer</small>
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
                            <form action="views/answer/update.php" method="post">
                                <input type="hidden" name="answer_id" value="<?php echo $_GET['ansid']; ?>">
                                <input type="hidden" name="question_id" value="<?php echo $data['question_id']; ?>">

                                <textarea id="editor1" name="description" rows="10" cols="80" ">
                                <?php echo $data['description']; ?>
                                </textarea>
                                <div class="box-footer">
                                    <a href="views/answer/delete.php?101010101010101010101010101010=<?php echo $_GET['ansid']; ?>" type="button" class="btn btn-default">Delete
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
