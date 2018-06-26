<?php
session_start();
/*if (empty($_SESSION['user'])){
    $_SESSION['message'] = "<h3 style='color: orangered;text-align: center'>Please Login...</h3><br>";
    header("location:login.php");
}*/
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

                    <?php
                    include("vendor/autoload.php");
                    use App\question\question;

                    $obj = new question();
                    $allQuestions = $obj->getAllQuestions();
                    ?>

                    <?php foreach ($allQuestions as $qu) { ?>

                        <div class="box box-info">
                            <div class="box-header with-border">
                                <div class="user-block">
                                    <img class="img-circle" src="<?php echo $qu['photo']; ?>" alt="User Image">
                                    <span class="username">
                                        <a href="profile.php?uid=<?php echo $qu['user_id']; ?>"><?php echo $qu['first_name'] . " " . $qu['middle_name'] . " " . $qu['last_name']; ?></a>
                                    </span>
                                    <span class="description"><?php echo $qu['created_at'] ?></span>
                                </div>
                                <!-- /.user-block -->
                                <div class="box-tools">
                                    <?php if (isset($_SESSION['user'])) {
                                        if ($_SESSION['user']['id'] == $qu['user_id'] or $_SESSION['user']['is_admin'] == '1') {
                                            ?>
                                            <a href="quedit.php?quid=<?php echo $qu['id']; ?>" type="button"
                                               class="btn btn-box-tool" title="Edit Your Question">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a href="views/question/delete.php?101010101010101010101010101010=<?php echo $qu['id']; ?>&101010101010101010101010101010"
                                               type="button"
                                               class="btn btn-box-tool" title="Delete Your Question">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        <?php }
                                    } ?>
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
                                <b style="font-size: 20px">
                                    <a class="text-muted" href="show.php?id=<?php echo $qu['id'] ?>">
                                        <?php echo $qu['title'] ?></a>
                                </b>
                                <div>
                                    <?php echo $qu['description'] ?>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <span class="text-muted">45 Views - 2 Answers</span>
                                <div class="pull-right">

                                    <a href="show.php?id=<?php echo $qu['id'] ?>"
                                       class="btn btn-default btn-xs">
                                        <i class="fa fa-eye"></i> See full and Answer
                                    </a>

                                </div>
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
