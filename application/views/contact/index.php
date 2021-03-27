<div class="container">
    <div class="row contact_row">
        <div class="col-sm-7 contact_info">
            <!--<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v=3.exp"></script>-->
            <div id="map" class="map m-t-30">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63459.00413689636!2d106.8482297397377!3d-6.23896683197994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3135acd93ad%3A0x9d21fc0d931b6f48!2sForum+Warga+Kota+Jakarta+(Fakta)!5e0!3m2!1sen!2sid!4v1544782512977" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-lg-5 center">
            <form class="widget-contact-form" action="include/contact-form.php" role="form" method="post">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" aria-required="true" name="widget-contact-form-name" class="form-control required name" placeholder="Enter your Name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" aria-required="true" name="widget-contact-form-email" class="form-control required email" placeholder="Enter your Email">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="subject">Your Subject</label>
                        <input type="text" name="widget-contact-form-subject" class="form-control required" placeholder="Subject...">
                    </div>
                </div>                                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea type="text" name="widget-contact-form-message" rows="5" class="form-control required" placeholder="Enter your Message"></textarea>
                </div>

                <div class="form-group">
                    <script src='https://www.google.com/recaptcha/api.js'></script>
                    <div class="g-recaptcha" data-sitekey="AIzaSyBw8lPuTqHfJuWdHFsVmSIy8ZLQ2xsAUGU"></div>
                </div>
                <button class="btn" type="submit" id="form-submit"><i class="fa fa-paper-plane"></i>&nbsp;Send message</button>
            </form>

        </div>
    </div>
</div>
<!--<script type="text/javascript" async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBw8lPuTqHfJuWdHFsVmSIy8ZLQ2xsAUGU&callback=initMap"></script>-->