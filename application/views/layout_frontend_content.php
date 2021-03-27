<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>#LebiBaikDenganOfon</title>
        <meta name="description" content="#LebiBaikDenganOfon">
        <meta name="author" content="ofon.co.id">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include('css-javascript.php') ?>
    </head>
    <body>
        <div class="preloader">
            <div class="status">&nbsp;</div>
        </div>
        <div id="layout" class="layout-wide">
            <header class="slide" id="home">
                <div class="nav_logo animated fadeInDown">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3 logo"> <a href="<?=base_url()?>" title="Back to Home"><img src="<?=base_url()?>assets/themes/img/logo.png" alt="Logo" class="logo_img"> </a> </div>
                            <nav class="col-md-9">
                                <?php include('menu-frontend.php') ?>
                            </nav>
                        </div>
                    </div>
                </div>
                
            </header>
            <div class="row info_title wow fadeInUp" id="about">
                <div class="vertical_line">
                    <div class="circle_bottom"></div>
                </div>
                <div class="info_vertical animated">

                    <h1>Tentang <span>Ofon</span>.</h1>            
                    <?=$content[0]['content_data']?>
                    <h1></h1>      
                </div>
                <div class="vertical_line">
                    <div class="circle_top"></div>
                </div>
            </div>

    <div class="row info_title wow fadeInUp" id="contact">
        <section class="content_info">
            <div class="info_resalt border-top">
                <div class="container wow fadeInUp">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Contact Form</h3>
                            <form id="form" action="php/send_mail.php">
                                <input type="text" placeholder="Name" name="Name" required>
                                <input type="email" placeholder="Email" name="Email" required>
                                <input type="number" placeholder="Phone" name="Phone" required>
                                <textarea placeholder="Your Message" name="message" required></textarea>
                                <input type="submit" name="Submit" value="Send Message" class="button">
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h3>Get in touch</h3>
                            <p class="lead">Jl. K.H. Mas Mansyur No.Kav. 126, Karet Tengsin, Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10250</p>
                            <section class="map_area">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.397033389068!2d106.8151228!3d-6.2112517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f6aa0ce995f9%3A0xed935b94a739c157!2sMenara+Batavia!5e0!3m2!1sid!2sid!4v1542083166007" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                        <h3>RECENT LINKS</h3>
                        <ul>
                            <li><i class="fa fa-check"></i><a href="index-one-page.html#">Work</a></li>
                            <li><i class="fa fa-check"></i><a href="index-one-page.html#">About Us</a></li>
                            <li><i class="fa fa-check"></i><a href="index-one-page.html#">Services</a></li>
                            <li><i class="fa fa-check"></i><a href="index-one-page.html#">Contact Us</a></li>
                        </ul>
                    </div> 


                    <div class="col-md-3">
                        <h3>NEWSLETTER SIGN UP</h3>
                        <p>Enter your e-mail and subscribe to our newsletter.</p>
                        <form id="newsletterForm" class="newsletterForm" action="php/mailchip/newsletter-subscribe.php">
                            <div class="input-group"> <span class="input-group-addon"> <i class="fa fa-envelope"></i> </span>
                                <input class="form-control" placeholder="Email Address" name="email" type="email" required="required">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit" name="subscribe">Go!</button>
                                </span> </div>
                        </form>
                    </div>

                    <div class="col-md-3">
                        <h3>CONTACT US</h3>
                        <ul class="contact_footer">
                            <li> <i class="fa fa-envelope"></i> <a href="index-one-page.html#"><span class="__cf_email__" data-cfemail="fa9f829b978a969fba9f829b978a969fd4999597">[email&#160;protected]</span></a> </li>
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
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
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
</body>
</html>