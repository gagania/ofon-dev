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
<!--                        <div id="logo">
                            <a href="<?=base_url()?>" class="logo" data-dark-logo="<?= base_url() ?>assets/polo/images/logo.jpg">
                                <img src="<?= base_url() ?>assets/polo/images/logo.jpg" alt="">
                            </a>
                        </div>-->
                        <!--Top Search Form-->
                        <div id="top-search">
                            <form action="search-results-page.html" method="get">
                                <input type="text" name="q" class="form-control" value="" placeholder="Start typing & press  &quot;Enter&quot;">
                            </form>
                        </div>
                        <!--end: Top Search Form-->

                        <!--Header Extras-->
                        <div class="header-extras">
                            <ul>
                                <li>
                                    <!--top search-->
                                    <a id="top-search-trigger" href="#" class="toggle-item">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <!--end: top search-->
                                </li>
                            </ul>
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

            <?php $bannerImage = '';
            if ($banner) {
                    $bannerImage = $banner[0]['image_path'];?>
            <?php }
            ?>
            <!-- SECTION IMAGE FULLSCREEN -->
            <section class="fullscreen background-image background-overlay-light" style='background-image: url("<?= base_url().$bannerImage ?>"); height: 454px;'>
                <div class="container">
                    <div class="container-fullscreen text-center">
                        <div class="text-middle">
                            <h4 data-animation="fadeInUp" data-animation-delay="700" class="animated fadeInUp visible">Selamat Datang</h4>
                            <h1 data-animation="fadeIn" data-animation-delay="500" class="text-large"><span class="text-rotator" data-rotate-effect="fadeIn" data-rotate-speed="3000"><?=isset($banner[0]['desc']) ? $banner[0]['desc']:''?></span> </h1>
<!--                            <div data-animation="fadeInDown" data-animation-delay="900">
                                <a class="btn btn-dark" href="#"><span>Get in Touch</span></a>
                            </div>-->
                            <!--div class="scrolldown-animation" id="scroll-down">
                                <a class="scroll-to" href="#easy-fast"><img src="<?= base_url() ?>assets/polo/images/scrolldown.png" alt="">
                                </a>
                            </div>-->
                        </div>
                    </div>
                </div>
            </section>
            <!-- end: SECTION IMAGE FULLSCREEN -->

            <!-- COUNTERS -->
            <section class="background-grey text-dark">
                <div class="container">
                    <div class="heading heading-center">
                        <h2>VISITORS</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">

                            <div class="text-center">
                                <!--<div class="icon"><i class="fa fa-3x fa-code"></i></div>-->
                                <div class="counter"> <span data-speed="3000" data-refresh-interval="50" data-to="<?php echo ($visToday) ? $visToday[0]['page_count']:'';?>" data-from="0" data-seperator="true"></span> </div>
                                <div class="seperator seperator-small"></div>
                                <p>TODAY</p>
                            </div>
                        </div>

                        <div class="col-lg-3">

                            <div class="text-center">
                                <!--<div class="icon"><i class="fa fa-3x fa-coffee"></i></div>-->
                                <div class="counter"> <span data-speed="4500" data-refresh-interval="23" data-to="<?php echo ($visWeek) ? $visWeek[0]['page_count']:'';?>" data-from="0" data-seperator="true"></span> </div>
                                <div class="seperator seperator-small"></div>
                                <p>THIS WEEK</p>
                            </div>
                        </div>

                        <div class="col-lg-3">

                            <div class="text-center">
                                <!--<div class="icon"><i class="fa fa-3x fa-rocket"></i></div>-->
                                <div class="counter"> <span data-speed="3000" data-refresh-interval="12" data-to="<?php echo ($visMonth) ? $visMonth[0]['page_count']:'';?>" data-from="0" data-seperator="true"></span> </div>
                                <div class="seperator seperator-small"></div>
                                <p>THIS MONTH</p>
                            </div>
                        </div>

                        <div class="col-lg-3">

                            <div class="text-center">
                                <!--<div class="icon"><i class="fa fa-3x fa-smile-o"></i></div>-->
                                <div class="counter"> <span data-speed="4550" data-refresh-interval="50" data-to="<?php echo ($visAll) ? $visAll[0]['page_count']:'';?>" data-from="0" data-seperator="true"></span> </div>
                                <div class="seperator seperator-small"></div>
                                <p>TOTAL</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end: COUNTERS -->

            <div class="seperator p-b-0 p-t-0"><i class="fa fa-chevron-down"></i>
            </div>
            <!-- CLIENTS -->
            <section>
                <div class="container">
                    <div class="heading heading-center">
                        <h2>OUR CLIENTS</h2>
                        <span class="lead">Our awesome clients we've had the pleasure to work with! </span>
                    </div>

                    <ul class="grid grid-5-columns">
                        <?php if ($linkData) {
                            foreach($linkData as $index => $value) {?>
                                <li><a href="<?php echo $value['link_url'];?>" target="_blank" style="width:80%">
                                    <img style="border:1px solid #D3D3D3;width:100%;height:100px" src="<?=base_url().$value['link_file_path']?>"/> </a>
                                </li>
                       <?php }
                        }?>
                    </ul>

                </div>
            </section>

            <!-- Footer -->
            <?php include('footer.php') ?>
            <!-- end: Footer -->

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