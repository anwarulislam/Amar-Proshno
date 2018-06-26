<div style="text-align: center">
    <button style="text-align: center" type="button" class="btn btn-info btn-lg"
            data-toggle="modal"
            data-target="#myModal">Ask
        Anything You want
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
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
                    <button type="button" class="btn btn-info btn-sm" data-dismiss="modal"
                            data-toggle="tooltip" title="remove">
                        <i class="fa fa-times"></i></button>
                </div>
                <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">


                <form action="views/question/question.php" method="post">
                    <img class="img-responsive img-circle img-sm"
                         src="assets/images/avtr.jpg"
                         alt="Alt Text">
                    <!-- .img-push is used to add margin to elements next to floating images -->
                    <div class="img-push">
                        <div style="padding-bottom: 10px;"
                             class="input-group input-group-sm">
                            <input type="text" name="title"
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
                        <button type="submit" name="submit" class="btn btn-info pull-right">
                            Ask
                        </button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>



    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->

        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="row">
                <div class="col-md-12">
                    <div class="info-box bg-aqua">
                        <span class="info-box-icon"><i class="fa fa-share"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Questions</span>
                            <span class="info-box-number">41,410</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="fa fa-street-view"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Visitors</span>
                            <span class="info-box-number">41,410</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="info-box bg-yellow">
                        <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Events</span>
                            <span class="info-box-number">41,410</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="info-box bg-red">
                        <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Answered</span>
                            <span class="info-box-number">41,410</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
<div class="control-sidebar-bg"></div>