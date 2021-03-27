<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <title>#LebiBaikDenganOfon</title>
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Jekas is a Software, Studio and Corporate Responsive Template">
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php include('css-javascript.php') ?>
    </head>
    <body>
        <?php include('sidebar.php'); ?>
        <div id="layout" class="layout-wide">

            <header class="slide">
                <div class="nav_logo animated fadeInDown">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2"> <a href="<?= base_url() ?>" title="Back to Home"><img src="<?= base_url() ?>assets/themes/img/logo.png" alt="Logo" class="logo_img"> </a> </div>
                            <nav>
                                <?php //include('menu-frontend.php') ?>
                                <ul id="menu" class="sf-menu" style="float:left !important">
                                    <li> <a href="<?= base_url() ?>">BERANDA</a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-primary" onclick="show_login();">
                                    <a href="#" style="color: white;">My Ofon</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

<!--            <div class="crumbs border_bottom" style="margin-top:75px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>/</li>
                                <li>Produck</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>-->
            <?php echo $this->load->view($content);?>
            
            <footer class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <h3>FOLLOW US</h3>
                        <ul class="social">
                            <li class="facebook"><i class="fa fa-facebook"></i><a href="index-one-page.html#">Facebook</a></li>
                            <li class="twitter"><i class="fa fa-twitter"></i><a href="index-one-page.html#">Twitter</a></li>
                            <li class="github"><i class="fa fa-instagram"></i><a href="index-one-page.html#">Instagram</a></li>
                            <li class="linkedin"><i class="fa fa-linkedin"></i><a href="index-one-page.html#">Linkedin</a></li>
                        </ul>
                    </div>
                    <!--       <div class="col-md-2">
                              <h3>TWITTER FEED</h3>
                              <div class="twitts"></div>
                            </div> -->
                    <div class="col-md-2">
                        <h3>LINK</h3>
                        <ul>
                            <li><i class="fa fa-check"></i><a href="index-one-page.html#">Karir</a></li>
                            <li><i class="fa fa-check"></i><a href="index-one-page.html#">Tentang Ofon</a></li>
                            <li><i class="fa fa-check"></i><a href="index-one-page.html#">Produk</a></li>
                            <li><i class="fa fa-check"></i><a href="index-one-page.html#">Hubungi Kami</a></li>
                        </ul>
                    </div>


                    <div class="col-md-3">
                        <h3>NEWSLETTER</h3>
                        <p>Masukkan email Anda untuk berlangganan Newsletter kami.</p>
                        <form id="newsletterForm" class="newsletterForm" action="php/mailchip/newsletter-subscribe.php">
                            <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-envelope"></i> </span>
                                <input class="form-control" placeholder="Email Address" name="email" type="email" required="required">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit" name="subscribe">Go!</button>
                                </span> </div>
                        </form>
                    </div>

                    <div class="col-md-3">
                        <h3>HUBUNGI KAMI</h3>
                        <ul class="contact_footer">
                            <li> <i class="fa fa-envelope"></i> <a href="index-one-page.html#"><span class="__cf_email__" data-cfemail="fa9f829b978a969fba9f829b978a969fd4999597">customercare@ofon.co.id</span></a> </li>
                            <li> <i class="fa fa-headphones"></i> <a href="index-one-page.html#">(021) 3971 0000</a> </li>
                            <li class="location"> <i class="fa fa-home"></i> <a href="index-one-page.html#">OFON CENTER <br> Jl. K.H. Mas Mansyur No.Kav. 126, Karet Tengsin, Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10250</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>


        <footer class="coopring">
            <p>&copy; 2019 Ofon. All Rights Reserved.</p>
        </footer>

        </div>
        </script><script type="text/javascript" src="<?= base_url() ?>assets/themes/js/jquery.js"></script>
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
            $(document).ready(function () {
                $('.tp-banner').revolution(
                        {
                            delay: 15000,
                            startwidth: 1170,
                            startheight: 500,
                            hideThumbs: 10,
                            fullWidth: "on",
                            fullScreen: "on",
                            fullScreenOffsetContainer: ""
                        });
            });
            function show_login() {
                $(".profile-drawer").toggle();
            }
        </script>
</html>