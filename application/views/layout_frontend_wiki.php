<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>#LebiBaikDenganOfon</title>
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="OFON">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php include('css-javascript.php') ?>
<!--<link rel="stylesheet" media="screen" href="<?= base_url() ?>assets/polo/css/responsive.css">-->
        <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/jquery.js"></script>
    </head>
    <body>
        <?php include('sidebar.php'); ?>
        <div id="layout" class="layout-wide">

            <header class="slide" id="home" style="margin-top:80px">
                <div class="nav_logo animated fadeInDown">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2"> <a href="<?= base_url() ?>" title="Back to Home"><img src="<?= base_url() ?>assets/themes/img/logo.png" alt="Logo" class="logo_img"> </a> </div>
                        </div>
                    </div>
                </div>
            </header>
            <?php $this->load->view($content); ?>
        </section>

        <footer class="coopring">
            <p>&copy; 2019 Ofon. All Rights Reserved.</p>
        </footer>

    </div>

    <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/nav/tinynav.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/nav/superfish.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/nav/hoverIntent.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/nav/jquery.sticky.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/totop/jquery.ui.totop.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src='<?= base_url() ?>assets/themes/js/rs-plugin/js/jquery.themepunch.revolution.min.js'></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/fancybox/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/gallery/modernizr.custom.26633.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/gallery/jquery.gridrotator.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/team/modernizr.custom.63321.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/team/jquery.catslider.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/filters/jquery.isotope.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/theme-options/theme-options.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/theme-options/jquery.cookies.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/twitter/jquery.tweet.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/animations/wow.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/parallax/jquery.inview.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/parallax/nbw-parallax.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/bootstrap/bootstrap.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/themes/js/main.js"></script>
    <script type="text/javascript">
                                function show_login() {
                                    $(".profile-drawer").toggle();
                                }
    </script>
</html>