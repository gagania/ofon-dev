<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="protc" />
        <meta name="description" content="">
        <!-- Document title -->
        <title>PROTC</title>
        <!-- Stylesheets & Fonts -->
        <?php include('css-javascript.php') ?>

    </head>
    <body>
        <!-- Wrapper -->
        <div id="wrapper">

            <!-- Header -->
            <header id="header" class="header-fullwidth header-transparent header-plain">
                <div id="header-wrap">
                    <div class="container">
                        <!--Logo-->
                        <div id="logo">
                            <a href="<?= base_url() ?>" class="logo" data-dark-logo="<?= base_url() ?>assets/polo/images/logo.jpg">
                                <img src="<?= base_url() ?>assets/polo/images/logo.jpg" alt="">
                            </a>
                        </div>
                        <!--Navigation Resposnive Trigger-->
                        <div id="mainMenu-trigger">
                            <button class="lines-button x"> <span class="lines"></span> </button>
                        </div>
                        <!--end: Navigation Resposnive Trigger-->

                        <!--Navigation-->
                        <div id="mainMenu" class="light">
                            <div class="container">
                                <nav>
                                    <?php include('menu-frontend.php') ?>
                                </nav>
                            </div>
                        </div>
                        <!--end: Navigation-->
                    </div>
                </div>
            </header>
            <!-- end: Header -->
            <!-- Page title -->
            <section id="page-title" class="page-title-classic">
                <div class="container">
<!--                    <div class="breadcrumb">
                        <ul>
                            <li><a href="#">Home</a> </li>
                            <li><a href="#">Page title</a> </li>
                            <li class="active"><a href="#">Classic</a> </li>
                        </ul>
                    </div>-->
                    <div class="page-title">
                        <h1>HUBUNGI KAMI</h1>
                        <span></span>
                    </div>
                </div>
            </section>
            <section style="padding:0px !important">
                <div class="container"> 
                    <?php $this->load->view($content); ?>
                </div>
            </section>
<?php include('footer.php') ?>
        </div>
        <!-- end: Wrapper -->

        <!-- Go to top button -->
        <a id="goToTop"><i class="fa fa-angle-up top-icon"></i><i class="fa fa-angle-up"></i></a>

        <script src="<?= base_url() ?>assets/polo/js/jquery.js"></script>
        <script src="<?= base_url() ?>assets/polo/js/plugins.js"></script>
        <!--Template functions-->
        <script src="<?= base_url() ?>assets/polo/js/functions.js"></script>
    </body>
</html>