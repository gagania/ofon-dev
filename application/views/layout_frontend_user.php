<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>#LebiBaikDenganOfon</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.4 -->
        <link href="<?= base_url() ?>assets/lte/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!--<link href="<?= base_url() ?>assets/lte/dist/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
        <!-- Ionicons -->
        <!--<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />-->
        <link rel="stylesheet" href="<?= base_url() ?>assets/lte/plugins/select2/select2.min.css">
        <!-- Theme style -->
        <link href="<?= base_url() ?>assets/lte/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?= base_url() ?>assets/lte/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/lte/dist/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/lte/dist/css/additional.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="<?= base_url() ?>assets/lte/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/lte/plugins/input-mask/jquery.inputmask.js"></script>
        <script src="<?= base_url() ?>assets/lte/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="<?= base_url() ?>assets/lte/plugins/jQueryUI/jquery-ui.js"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <img src="<?= base_url() ?>assets/themes/img/logo.png" alt="Logo" class="logo_img">
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?= base_url() ?>assets/lte/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?=$this->session->userdata('cstm_full_name')?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?= base_url() ?>assets/lte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                        <p>
                                            <?=$this->session->userdata('cstm_full_name')?>
                                            <!--<small>Member since Nov. 2012</small>-->
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?= base_url() ?>user/logout" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?=$this->session->userdata('cstm_full_name')?></p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <!--      <form action="#" method="get" class="sidebar-form">
                            <div class="input-group">
                              <input type="text" name="q" class="form-control" placeholder="Search...">
                              <span class="input-group-btn">
                                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                    </button>
                                  </span>
                            </div>
                          </form>-->
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="active">
                            <a href="#">
                                <i class="fa fa-th"></i> <span>My Ofon</span>
                                <span class="pull-right-container">
                                  <!--<small class="label pull-right bg-green">new</small>-->
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>user/security">
                                <i class="fa fa-key"></i> <span>Keamanan & Password</span>
                                <span class="pull-right-container">
                                  <!--<small class="label pull-right bg-green">new</small>-->
                                </span>
                            </a>
                        </li>
                        <li class="treeview" class="active">
                            <a href="#">
                                <i class="fa fa-calculator"></i>
                                <span>Tagihan</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url() ?>user/laporan_rincian"><i class="fa fa-circle-o"></i> Rincian Pemakaian Telepon</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Rekap Pemakaian Telepon</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Rekap Telepon</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-adjust"></i> <span>Pengaturan Layanan</span>
                                <span class="pull-right-container">
                                  <!--<small class="label pull-right bg-green">new</small>-->
                                </span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <?php $this->load->view($content); ?>
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                </div>
                <strong>Copyright &copy; 2019 <a href="#">OFON</a>.</strong> All rights
                reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Recent Activity</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                        <p>Will be 23 on April 24th</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-user bg-yellow"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                        <p>New phone +1(800)555-1234</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                        <p>nora@example.com</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                        <p>Execution time 5 seconds</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                        <h3 class="control-sidebar-heading">Tasks Progress</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Custom Template Design
                                        <span class="label label-danger pull-right">70%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Update Resume
                                        <span class="label label-success pull-right">95%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Laravel Integration
                                        <span class="label label-warning pull-right">50%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <h4 class="control-sidebar-subheading">
                                        Back End Framework
                                        <span class="label label-primary pull-right">68%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">
                        <form method="post">
                            <h3 class="control-sidebar-heading">General Settings</h3>

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Report panel usage
                                    <input type="checkbox" class="pull-right" checked>
                                </label>

                                <p>
                                    Some information about this general settings option
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Allow mail redirect
                                    <input type="checkbox" class="pull-right" checked>
                                </label>

                                <p>
                                    Other sets of options are available
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Expose author name in posts
                                    <input type="checkbox" class="pull-right" checked>
                                </label>

                                <p>
                                    Allow the user to show his name in blog posts
                                </p>
                            </div>
                            <!-- /.form-group -->

                            <h3 class="control-sidebar-heading">Chat Settings</h3>

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Show me as online
                                    <input type="checkbox" class="pull-right" checked>
                                </label>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Turn off notifications
                                    <input type="checkbox" class="pull-right">
                                </label>
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Delete chat history
                                    <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                                </label>
                            </div>
                            <!-- /.form-group -->
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <div class="modal modal-info" id="modal-info" style="display:none; padding-right: 17px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Information</h4>
                    </div>
                    <div class="modal-body">
                        <p><?= $this->session->flashdata('message_success') ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                 <?php if ($this->session->flashdata('message_success')) { ?>
                            $("#modal-info").modal('show');

                <?php } ?>
                $(".knob").knob({
                    /*change : function (value) {
                     //console.log("change : " + value);
                     },
                     release : function (value) {
                     console.log("release : " + value);
                     },
                     cancel : function () {
                     console.log("cancel : " + this.value);
                     },*/
                    draw: function () {

                        // "tron" case
                        if (this.$.data('skin') == 'tron') {

                            var a = this.angle(this.cv)  // Angle
                                    , sa = this.startAngle          // Previous start angle
                                    , sat = this.startAngle         // Start angle
                                    , ea                            // Previous end angle
                                    , eat = sat + a                 // End angle
                                    , r = true;

                            this.g.lineWidth = this.lineWidth;

                            this.o.cursor
                                    && (sat = eat - 0.3)
                                    && (eat = eat + 0.3);

                            if (this.o.displayPrevious) {
                                ea = this.startAngle + this.angle(this.value);
                                this.o.cursor
                                        && (sa = ea - 0.3)
                                        && (ea = ea + 0.3);
                                this.g.beginPath();
                                this.g.strokeStyle = this.previousColor;
                                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                                this.g.stroke();
                            }

                            this.g.beginPath();
                            this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                            this.g.stroke();

                            this.g.lineWidth = 2;
                            this.g.beginPath();
                            this.g.strokeStyle = this.o.fgColor;
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                            this.g.stroke();

                            return false;
                        }
                    }
                });
            });
        </script>

        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?= base_url() ?>assets/lte/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- SlimScroll -->
        <script src="<?= base_url() ?>assets/lte/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src="<?= base_url() ?>assets/lte/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url() ?>assets/lte/dist/js/ControlSidebar.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/lte/dist/js/PushMenu.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/lte/dist/js/app.min.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?= base_url() ?>assets/lte/plugins/select2/select2.full.min.js"></script>
        <script src="<?= base_url() ?>assets/lte/plugins/datepicker/bootstrap-datepicker.js"></script>

        <script src="<?= base_url() ?>assets/lte/dist/js/demo.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/lte/dist/js/jquery.knob.js"></script>
    </body>
</html>
