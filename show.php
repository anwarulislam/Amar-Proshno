<?php
include("vendor/autoload.php");
use App\question\question;
use App\answer\answer;

session_start();
$obj = new question();
$obj1 = new answer();
$data = $obj->show($_GET['id']);
$allAnswer = $obj1->ShowAnswer($_GET['id']);

if (empty($_GET['id'])) {
    $_SESSION['message'] = '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                You are eligible to use this link..!
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

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <div class="user-block">
                                <img class="img-circle" src="<?php echo $data['photo']; ?>" alt="User Image">
                                <span class="username">
                                        <a href="profile.php?uid=<?php echo $data['user_id']; ?>">
                                            <?php echo $data['first_name'] . " " . $data['middle_name'] . " " . $data['last_name']; ?>
                                        </a>
                                    </span>
                                <span class="description"><?php echo $data['created_at'] ?></span>
                            </div>
                            <!-- /.user-block -->
                            <div class="box-tools">
                                <button type="button" class="btn btn-box-tool" data-toggle="tooltip"
                                        title="Mark as read">
                                    <i class="fa fa-circle-o"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" title="Remove"
                                        data-widget="remove">
                                    <i
                                            class="fa fa-times"></i></button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <b class="text-muted" style="font-size: 20px">
                                <p href="show.php?id=<?php echo $data['id'] ?>"><?php echo $data['title'] ?></p>
                            </b>
                            <div style="font-size: 15px">
                                <?php echo $data['description'] ?>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <span class="text-muted">45 Views - 2 Answers</span>
                            <div class="pull-right">
                                <?php if (!empty($_SESSION['user'])) { ?>

                                    <a href="#ans"
                                       class="btn btn-default btn-xs">
                                        <i class="fa fa-eye"></i> Answer
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>


                    <?php foreach ($allAnswer as $ans) { ?>

                        <div class="box">
                            <div class="box-header with-border">
                                <div class="user-block">
                                    <img class="img-circle" src="<?php echo $ans['photo']; ?>"
                                         alt="User Image">
                                    <span class="username">
<a href="profile.php?uid=<?php echo $ans['user_id']; ?>">
    <?php echo $ans['first_name'] . " " . $ans['middle_name'] . " " . $ans['last_name']; ?>
</a>
</span>
                                    <span class="description"><?php echo $ans['created_at'] ?></span>
                                </div>
                                <!-- /.user-block -->
                                <div class="box-tools">

                                    <?php if (isset($_SESSION['user']['id']) == $ans['user_id']) { ?>
                                        <a href="ansedit.php?ansid=<?php echo $ans['id']; ?>" type="button"
                                           class="btn btn-box-tool" title="Edit Your Answer">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="views/answer/delete.php?101010101010101010101010101010=<?php echo $ans['id']; ?>&10101010101010"
                                           type="button"
                                           class="btn btn-box-tool" title="Delete Your Answer">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    <?php } ?>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" title="Remove"
                                            data-widget="remove">
                                        <i class="fa fa-times"></i></button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div>
                                    <?php echo $ans['description'] ?>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    <?php } ?>


                    <?php if (!empty($_SESSION['user'])) { ?>
                        <div id="ans" class="box box-info">
                            <div class="box-header">
                                <h3 class="box-title">Answer to this Question
                                    <small>in this section you can Answer to anyone's
                                        question
                                    </small>
                                </h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button type="button" class="btn btn-info btn-sm"
                                            data-widget="collapse"
                                            data-toggle="tooltip" title="Collapse">
                                        <i class="fa fa-minus"></i></button>
                                    <button type="button" class="btn btn-info btn-sm"
                                            data-widget="remove" title="Remove">
                                        <i class="fa fa-times"></i></button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body pad">
                                <form action="views/answer/answer.php" method="post">
                                    <input type="hidden" value="<?php echo $data['id']; ?>"
                                           name="question_id">
                                    <input type="hidden" value="<?php echo $_SESSION['user']['id']; ?>"
                                           name="user_id">
                                    <textarea id="editor2" name="description" rows="10"
                                              cols="80"></textarea>

                                    <div class="box-footer">
                                        <button type="button" class="btn btn-default"
                                                data-dismiss="modal"
                                                data-toggle="tooltip">Cancel
                                        </button>
                                        <button type="submit" name="submit"
                                                class="btn btn-info pull-right">
                                            Answer
                                        </button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    <?php } ?>

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
