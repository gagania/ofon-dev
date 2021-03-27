<footer id="footer" class="footer-light">
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <!-- Footer widget area 3 -->
                    <div class="widget">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12"><strong>Maintained By</strong></div>
                                <div class="col-md-2"></div>
                                <div class="col-md-6" style="margin-top:15px;">
                                    <img src="<?= base_url() ?>assets/polo/images/logo_fakta.png"/>
                                </div>
                                <!--<div class="copyright-text text-center">&copy; 2018 PROTC. All Rights Reserved.-->
                            </div>
                        </div>
                    </div>
                    <!-- end: Footer widget area 3 -->
                </div>
                <div class="col-lg-3">
                    <!-- Footer widget area 2 -->
                    <div class="widget">
                        <h4>Quick LInks</h4>
                        <ul class="list-icon list-icon-arrow">
                            <li><a href="<?= base_url() ?>about/about.html">About</a></li>
                            <li><a href="<?= base_url() ?>litigasi">Litigasi</a></li>
                            <li><a href="<?= base_url() ?>legislasi">Legislasi</a></li>
                            <li><a href="<?= base_url() ?>perpustakaan">Perpustakaan</a></li>
                        </ul>
                    </div>
                    <!-- end: Footer widget area 2 -->
                </div>
                <div class="col-lg-3">
                    <!-- Footer widget area 1 -->
                    <div class="widget  widget-contact-us">
                        <img src="<?= base_url() ?>assets/polo/images/world-map-dark.png" style="position:absolute;width:100%;"/>
                        <h4>Contact Us</h4>
                        <ul class="list-icon">
                            <li><i class="fa fa-map-marker-alt"></i> <?= $contactData[0]['address'] ?></li>
                            <li><i class="fa fa-phone"></i> <?= $contactData[0]['phone'] ?> </li>
                            <li><i class="far fa-envelope"></i> <a href="<?= $contactData[0]['email'] ?>"><?= $contactData[0]['email'] ?></a> </li>
                        </ul>
                        <!-- Social icons -->
                        <div class="social-icons social-icons-border float-left m-t-20">
                            <ul>
                                <li class="social-facebook"><a href="<?= $contactData[0]['facebook'] ?>"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="social-twitter"><a href="<?= $contactData[0]['twitter'] ?>"><i class="fab fa-twitter"></i></a></li>
                                <li class="social-youtube"><a href="<?= $contactData[0]['youtube'] ?>"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                        <!-- end: Social icons -->
                    </div>
                    <!-- end: Footer widget area 1 -->
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-content">
        <div class="copyright-text text-center">&copy; 2018 PROTC. All Rights Reserved.
        </div>
    </div>
</footer>