<?php
include("vendor/autoload.php");
use App\auth\auth;
use App\question\question;
use App\answer\answer;

$obj = new auth();
$profile = $obj->profile($_GET['uid']);

$obj1 = new question();
$SingleQu = $obj1->SingleQu($profile['id']);
$obj2 = new answer();
$SingleAns = $obj2->SingleAns($profile['id']);

if (empty($_GET['uid'])) {
    header('location:profile.php?uid=' . $_SESSION['user']['id']);
}
if (empty($_SESSION['user'])) {
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
                User Profile And Timeline
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-4">

                    <!-- -->

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle"
                                 src="<?php echo $profile['photo']; ?>" alt="User profile picture">

                            <h3 class="profile-username text-center">
                                <?php echo $profile['first_name'] . " " . $profile['middle_name'] . " " . $profile['last_name']; ?>
                            </h3>

                            <p class="text-muted text-center"><?php echo $profile['email']; ?></p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Question</b> <a class="pull-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Answered</b> <a class="pull-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Contribution</b> <a class="pull-right">13,287</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">About</h3>

                            <?php if ($_SESSION['user']['id'] == $_GET['uid'] or $_SESSION['user']['is_admin'] == '1') { ?>
                                <div class="pull-right box-tools">
                                    <a href="update.php?uid=<?php echo $_SESSION['user']['id']; ?>" type="button"
                                       class="btn btn-default btn-sm"
                                       title="Edit Profile">
                                        <i class="fa fa-edit"> Edit Profile</i></a>
                                </div>
                            <?php } ?>

                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

                            <p class="text-muted"><?php echo $profile['email']; ?></p>

                            <hr>
                            <strong><i class="fa fa-birthday-cake margin-r-5"></i> Date of Birth</strong>

                            <p class="text-muted"><?php echo $profile['date_of_birth']; ?></p>

                            <hr>
                            <strong><i class="fa fa-transgender-alt margin-r-5"></i> Gender</strong>

                            <p class="text-muted"><?php echo $profile['gender']; ?></p>

                            <hr>
                            <strong><i class="fa fa-bicycle margin-r-5"></i> Hobby</strong>

                            <p class="text-muted"><?php echo $profile['hobby']; ?></p>

                            <hr>
                            <strong><i class="fa fa-smile-o margin-r-5"></i> Interest</strong>

                            <p class="text-muted"><?php echo $profile['interest']; ?></p>

                            <hr>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-8">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#questions" data-toggle="tab" aria-expanded="true">Questions</a>
                            </li>
                            <li class=""><a href="#answers" data-toggle="tab" aria-expanded="false">Answers</a></li>
                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane active" id="questions">
                                <?php foreach ($SingleQu as $qu) { ?>

                                    <div class="box">
                                        <div class="box-header with-border">
                                            <div class="user-block">
                                                <img class="img-circle" src="<?php echo $profile['photo']; ?>"
                                                     alt="User Image">
                                                <span class="username">
                                        <a href="profile.php?uid=<?php echo $profile['id']; ?>">
                                        <?php echo $qu['first_name'] . " " . $qu['middle_name'] . " " . $qu['last_name']; ?>
                                        </a>
                                    </span>
                                                <span class="description"><?php echo $qu['created_at'] ?></span>
                                            </div>
                                            <!-- /.user-block -->
                                            <div class="box-tools">

                                                <?php if ($_SESSION['user']['id'] == $qu['user_id'] or $_SESSION['user']['is_admin'] == '1') { ?>
                                                    <a href="quedit.php?quid=<?php echo $qu['id']; ?>" type="button"
                                                       class="btn btn-box-tool" title="Edit Your Question">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <a href="views/question/delete.php?101010101010101010101010101010=<?php echo $qu['id']; ?>&101010101010101010101010101010" type="button"
                                                       class="btn btn-box-tool" title="Delete Your Question">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                <?php } ?>


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
                                                <a class="text-muted"
                                                   href="show.php?id=<?php echo $qu['id'] ?>"><?php echo $qu['title'] ?></a>
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
                                                    <i class="fa fa-eye"></i> See Full and Answer
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>


                            <div class="tab-pane" id="answers">

                                <?php foreach ($SingleAns as $ans) { ?>

                                    <div class="box">
                                        <div class="box-header with-border">
                                            <div class="user-block">
                                                <img class="img-circle" src="<?php echo $profile['photo']; ?>"
                                                     alt="User Image">
                                                <span class="username">
<a href="profile.php?uid=<?php echo $profile['id']; ?>">
    <?php echo $ans['first_name'] . " " . $ans['middle_name'] . " " . $ans['last_name']; ?>
</a>
</span>
                                                <span class="description"><?php echo $ans['created_at'] ?></span>
                                            </div>
                                            <!-- /.user-block -->
                                            <div class="box-tools">

                                                <?php if ($_SESSION['user']['id'] == $ans['user_id'] or $_SESSION['user']['is_admin'] == '1') { ?>
                                                    <a href="ansedit.php?ansid=<?php echo $ans['id']; ?>" type="button"
                                                       class="btn btn-box-tool" title="Edit Your Answer">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <a href="views/answer/delete.php?101010101010101010101010101010=<?php echo $ans['id']; ?>" type="button"
                                                       class="btn btn-box-tool" title="Delete Your Answer">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                <?php } ?>
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
                                            <div>
                                                <?php echo $ans['description'] ?>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <span class="text-muted">Question ID - <?php echo $ans['question_id'] ?></span>
                                            <div class="pull-right">


                                                <a href="show.php?id=<?php echo $ans['question_id'] ?>"
                                                   class="btn btn-default btn-xs">
                                                    <i class="fa fa-eye"></i> See Question
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputName" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail"
                                                   placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience"
                                                      placeholder="Experience"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputSkills"
                                                   placeholder="Skills">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> I agree to the <a href="#">terms and
                                                        conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
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
