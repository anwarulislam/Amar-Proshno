<?php
include("vendor/autoload.php");
use App\question\question;

$obj = new question();
$sidequ = $obj->getQuestionSidebar();
?>

<div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Recent 5 Questions</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-striped">
            <tbody>
            <?php foreach ($sidequ as $side) { ?>
                <tr>
                    <td><i class="fa fa-circle"></i></td>
                    <td><a href="show.php?id=<?php echo $side['id']; ?>"><?php echo $side['title']; ?></a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <div class="box-footer text-center">
            <a href="allQuestions.php" class="uppercase">View All Questions</a>
        </div>
    </div>
    <!-- /.box-body -->

    <!-- /.box-footer -->
</div>