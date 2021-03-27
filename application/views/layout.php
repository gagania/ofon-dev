<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 2.3.1
Version: 1.3
Author: KeenThemes
Website: http://www.keenthemes.com/preview/?theme=metronic
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>OFON | <?= $title ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <?php
        $this->load->view("util/globalCss");
        $this->load->view("util/globalJs");
        ?>
        <link rel="shortcut icon" href="favicon.ico" />
    </head> 
    <body class="page-header-fixed">
        <div class="loading hide ui-widget-overlay ui-front">
            <img class="loading-img" src="<?= base_url() ?>assets/metronic/img/loading/loading-box.gif">
        </div>
        <div class="header navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="brand" href="/">
                        <!--<img src="<?= base_url() ?>assets/metronic/img/dmsolidwood-logo.png" alt="logo"/>-->
                    </a>
                    <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                        <img src="<?= base_url() ?>assets/metronic/img/menu-toggler.png" alt="" />
                    </a>        
                    <ul class="nav pull-right">   
                        <li class="dropdown user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?php 
                                    if($this->session->userdata('user_image') == ''){
                                        $image_path = 'assets/metronic/img/people-profile.jpg';
                                    }else{
                                        $image_path = 'file_upload/foto_profile/'.$this->session->userdata('user_image');
                                    }
                                ?>
                                <img alt="" src="<?= base_url().$image_path ?>" style="width:30px;height:30px;" />
                                <span class="username"><?php echo $this->session->userdata('user_name'); ?></span>
                                <i class="icon-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= base_url() ?>dmsolidwood_profile"><i class="icon-user"></i> My Profile</a></li> 
                                <li><a href="<?= base_url() ?>help"><i class="icon-question-sign"></i> Help</a></li> 
                                <li class="divider"></li> 
                                <li><a href="<?= base_url() ?>login/logout"><i class="icon-key"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-container page-sidebar-fixed">
            <div class="page-sidebar nav-collapse collapse">
                <ul class="page-sidebar-menu" style="display: block; /*height: 0px !important;*/">
                    <li>
                        <div class="sidebar-toggler hidden-phone"></div>
                    </li>
                    <br> 
                        <?php echo $menus;?> 
                </ul>
            </div>
            <?php if($content == 'index/index'){
                $bgColorLayout = '#DCDCDC';
            }else{
                $bgColorLayout = '#FFFFFF';
            }?>
            <div class="page-content" style=" background-color: <?=$bgColorLayout?>">
                <div class="container-fluid">
                    <?php $this->load->view($content); ?>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer-inner">
                2015 - ITC-LRC 
                <!--- &copy;--> 
                <!--<span style="color: #FFF">indo</span><span style="color: #F00">net</span>-->
            </div>
            <div class="footer-tools">
                <span class="go-top">
                    <i class="icon-angle-up"></i>
                </span>
            </div>
        </div>
        <script>
            jQuery(document).ready(function() {
                App.init(); // initlayout and core plugins
                Index.init();
            });
        </script>
    </body>
</html>