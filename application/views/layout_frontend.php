<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>OFON web Beta</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="favicon.ico">

<!-- Stylesheets -->
<link rel="stylesheet" href="<?=base_url()?>assets/starhotel/css/animate.css">
<link rel="stylesheet" href="<?=base_url()?>assets/starhotel/css/bootstrap.css">
<link rel="stylesheet" href="<?=base_url()?>assets/starhotel/css/font-awesome.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/starhotel/css/owl.carousel.css">
<link rel="stylesheet" href="<?=base_url()?>assets/starhotel/css/owl.theme.css">
<link rel="stylesheet" href="<?=base_url()?>assets/starhotel/css/prettyPhoto.css">
<link rel="stylesheet" href="<?=base_url()?>assets/starhotel/css/smoothness/jquery-ui-1.10.4.custom.min.css">
<link rel="stylesheet" href="<?=base_url()?>assets/starhotel/rs-plugin/css/settings.css">
<link rel="stylesheet" href="<?=base_url()?>assets/starhotel/css/theme.css">
<link rel="stylesheet" href="<?=base_url()?>assets/starhotel/css/colors/turquoise.css" id="switch_style">
<link rel="stylesheet" href="<?=base_url()?>assets/starhotel/css/responsive.css">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600,700">

<!-- Javascripts --> 
<script type="text/javascript" src="<?=base_url()?>assets/starhotel/js/jquery-1.11.0.min.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/starhotel/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/starhotel/js/bootstrap-hover-dropdown.min.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/starhotel/js/owl.carousel.min.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/starhotel/js/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/starhotel/js/jquery.nicescroll.js"></script>  
<script type="text/javascript" src="<?=base_url()?>assets/starhotel/js/jquery.prettyPhoto.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/starhotel/js/jquery-ui-1.10.4.custom.min.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/starhotel/js/jquery.jigowatt.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/starhotel/js/jquery.sticky.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/starhotel/js/waypoints.min.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/starhotel/js/jquery.isotope.min.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/starhotel/js/jquery.gmap.min.js"></script> 
<!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>-->
<script type="text/javascript" src="<?=base_url()?>assets/starhotel/rs-plugin/js/jquery.themepunch.plugins.min.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/starhotel/rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/starhotel/js/switch.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/starhotel/js/custom.js"></script> 

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.<?=base_url()?>assets/starhotel/js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="pattern-1">
    <div style="background-color: #fff;"> 
        <!-- Top header -->
        <div id="top-header">
          <div class="container">
            <div class="row">
              <div class="col-xs-6">
                <div class="th-text pull-left">
                  <div class="th-item"> <a href="#"><i class="fa fa-phone"></i> 012-12345678</a> </div>
                  <div class="th-item"> <a href="#"><i class="fa fa-envelope"></i> MAIL@OFON.OR.ID</a></div>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="th-text pull-right">
                  <div class="th-item">
                    <div class="social-icons"> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-youtube-play"></i></a> </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Header -->
        <header class=""> 
            <!-- Navigation -->
            <div class="navbar yamm navbar-default" id="sticky" style="height: 100px;">
              <div class="container" >
              <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle" style="float:left">
                  <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
                </button>
                <div id=""> 
                  <img id="default-logo" src="<?=base_url()?>assets/senayan-image/logo-baru.jpg" alt="Starhotel" style="width:200px;"> 
                </div>

                </div>
                <div id="navbar-collapse-grid" class="navbar-collapse collapse" style="background-color: #fff"> 
                  <ul class="nav navbar-nav">
                    <li class="active"> 
                      <a href="<?=base_url()?>">Home</a>
                    </li>
                    <li class="dropdown"> 
                      <a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated">About<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="room-list.html">Background and Development</a></li>
                        <li><a href="room-detail.html">Overview</a></li>
                        <li><a href="room-detail.html">Board of Directors</a></li>
                        <li><a href="room-detail.html">OFON Foundation</a></li>
                        <li><a href="room-detail.html">Our Department</a></li>
                        <li><a href="room-detail.html">Fellowships and Internships</a></li>
                        <li><a href="room-detail.html">Overview</a></li>
                      </ul>
                    </li>
                    <li class="dropdown"> 
                      <a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated">Scholar<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="room-list.html">Researchers Directory</a></li>
                      </ul>
                    </li>
                    <li class="dropdown"> 
                      <a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated">Research<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="room-list.html">Ongoing Research</a></li>
                        <li><a href="room-list.html">Past Research</a></li>
                      </ul>
                    </li>
                    <li class="dropdown"> 
                      <a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated">Publications<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="room-list.html">Features</a></li>
                      </ul>
                    </li>
                    <li class="dropdown"> 
                      <a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated">Institutional Partnership<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="room-list.html">Background and Development</a></li>
                        <li><a href="room-detail.html">Overview</a></li>
                        <li><a href="room-detail.html">Board of Directors</a></li>
                        <li><a href="room-detail.html">OFON Foundation</a></li>
                        <li><a href="room-detail.html">Our Department</a></li>
                        <li><a href="room-detail.html">Fellowships and Internships</a></li>
                        <li><a href="room-detail.html">Overview</a></li>
                      </ul>
                    </li>
                    <li class="dropdown"> 
                      <a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated">Gallery<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li><a href="room-list.html">Background and Development</a></li>
                        <li><a href="room-detail.html">Overview</a></li>
                        <li><a href="room-detail.html">Board of Directors</a></li>
                        <li><a href="room-detail.html">OFON Foundation</a></li>
                        <li><a href="room-detail.html">Our Department</a></li>
                        <li><a href="room-detail.html">Fellowships and Internships</a></li>
                        <li><a href="room-detail.html">Overview</a></li>
                      </ul>
                    </li>
                    <li class="dropdown"> 
                      <a href="#" >Event</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
        </header>
        <?php include('slider.php') ?>
        <div class="container" style="z-index: 200">
            <div class="row">


              <aside class="mt50">
                <div class="col-md-9"> 
                  <!-- Widget: Text -->
                  <div class="widget">
                      <h2 class="lined-heading bounceInRight appear" data-start="800"><span>Last Update</span></h2>
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#hotel" data-toggle="tab">Working Paper</a></li>
                        <li><a href="#events" data-toggle="tab">Opinion</a></li>
                      </ul>
                      <!-- Tab panes -->
                      <div class="tab-content" >
                          <div class="tab-pane fade in active" id="hotel">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse interdum eleifend augue, quis rhoncus purus fermentum. In hendrerit risus arcu, in eleifend metus dapibus varius. Nulla dolor sapien, laoreet vel tincidunt non, egestas non justo. Phasellus et mattis lectus, et gravida urna.</p>
                            <p> Donec pretium sem non tincidunt iaculis. Nunc at pharetra eros, a varius leo. Mauris id hendrerit justo. Mauris egestas magna vitae nisi ultricies semper. Nam vitae suscipit magna. Nam et felis nulla. Ut nec magna tortor. Nulla dolor sapien, laoreet vel tincidunt non, egestas non justo. </p>
                          </div>
                          <div class="tab-pane fade" id="events">Phasellus sodales justo felis, a vestibulum risus mattis vitae. Aliquam vitae varius elit, non facilisis massa. Vestibulum luctus diam mollis gravida bibendum. Aliquam mattis velit dolor, sit amet semper erat auctor vel. Integer auctor in dui ac vehicula. Integer fermentum nunc ut arcu feugiat, nec placerat nunc tincidunt. Pellentesque in massa eu augue placerat cursus sed quis magna.</div>
                      </div> 
                    <br>
                      <h2 class="lined-heading bounceInRight appear" data-start="800"><span>Features</span></h2>
                      <br>   
                      <article>                   
                        <div class="row">
                          <div class="col-sm-1 col-xs-2 meta">
                            <div class="meta-date"><span>Apr</span>15</div>
                          </div>
                          <div class="col-sm-11 col-xs-10 meta">
                            <h2>This is a video post</h2>
                            <span class="meta-author"><i class="fa fa-user"></i><a href="#">Starhotel</a></span> <span class="meta-category"><i class="fa fa-pencil"></i><a href="#">Hotel business</a></span> <span class="meta-comments"><i class="fa fa-comment"></i><a href="#">3 Comments</a></span> </div>
                          <div class="col-md-12">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed turpis neque. In auctor, odio eget luctus lobortis, sapien erat blandit felis, eget volutpat augue felis in purus. Aliquam ultricies est id ultricies facilisis. Maecenas tempus... </p>
                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat tristique mauris, vitae ultrices mauris ultricies eu. In viverra ut sem eget venenatis. Sed nec ligula non eros ultrices euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget arcu imperdiet, semper dolor in, lacinia augue. Mauris hendrerit vestibulum lorem, non auctor felis dignissim vel. Sed arcu est, posuere pulvinar arcu non, porttitor consequat ligula. Curabitur ac volutpat mauris. Duis pretium commodo accumsan. Nullam ut facilisis velit. </p>
                            <blockquote>
                              <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante."</em></p>
                              <span>John Doe in <cite title="Source Title">CEO Travel</cite></span> </blockquote>
                            <p> Donec sit amet urna eu nisi egestas iaculis sed ac massa. Morbi interdum nibh sapien, non fermentum diam laoreet quis. Maecenas congue, nibh id placerat lacinia, nisi felis dictum risus, at commodo nisl quam ac libero. Fusce imperdiet vehicula luctus. Sed at auctor ligula. Phasellus a commodo dui, at iaculis odio. Mauris diam eros, tempor at neque eget, imperdiet facilisis mauris. Donec adipiscing nisi vel nisl tristique fermentum. Quisque ultrices justo vitae massa mollis, eu ultricies tortor varius. Nam auctor viverra sodales. Suspendisse ac lobortis sem. Nunc pretium molestie mauris in aliquet. Sed vitae ante porttitor mi condimentum eleifend. Duis at dictum libero, vel pellentesque enim. </p>
                          </div>
                        </div>
                      </article>                   

                    <br> 
                    <h2 class="lined-heading bounceInRight appear" data-start="800"><span>Research</span></h2>

                      <br>
                  <article>
                    <div class="row">
                      <div class="col-sm-1 col-xs-2 meta">
                        <div class="meta-date"><span>Apr</span>15</div>
                      </div>
                      <div class="col-sm-11 col-xs-10 meta">
                        <h2>This is a video post</h2>
                        <span class="meta-author"><i class="fa fa-user"></i><a href="#">Starhotel</a></span> <span class="meta-category"><i class="fa fa-pencil"></i><a href="#">Hotel business</a></span> <span class="meta-comments"><i class="fa fa-comment"></i><a href="#">3 Comments</a></span> </div>
                      <div class="col-md-12">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed turpis neque. In auctor, odio eget luctus lobortis, sapien erat blandit felis, eget volutpat augue felis in purus. Aliquam ultricies est id ultricies facilisis. Maecenas tempus... </p>
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat tristique mauris, vitae ultrices mauris ultricies eu. In viverra ut sem eget venenatis. Sed nec ligula non eros ultrices euismod. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget arcu imperdiet, semper dolor in, lacinia augue. Mauris hendrerit vestibulum lorem, non auctor felis dignissim vel. Sed arcu est, posuere pulvinar arcu non, porttitor consequat ligula. Curabitur ac volutpat mauris. Duis pretium commodo accumsan. Nullam ut facilisis velit. </p>
                        <blockquote>
                          <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante."</em></p>
                          <span>John Doe in <cite title="Source Title">CEO Travel</cite></span> </blockquote>
                        <p> Donec sit amet urna eu nisi egestas iaculis sed ac massa. Morbi interdum nibh sapien, non fermentum diam laoreet quis. Maecenas congue, nibh id placerat lacinia, nisi felis dictum risus, at commodo nisl quam ac libero. Fusce imperdiet vehicula luctus. Sed at auctor ligula. Phasellus a commodo dui, at iaculis odio. Mauris diam eros, tempor at neque eget, imperdiet facilisis mauris. Donec adipiscing nisi vel nisl tristique fermentum. Quisque ultrices justo vitae massa mollis, eu ultricies tortor varius. Nam auctor viverra sodales. Suspendisse ac lobortis sem. Nunc pretium molestie mauris in aliquet. Sed vitae ante porttitor mi condimentum eleifend. Duis at dictum libero, vel pellentesque enim. </p>
                      </div>
                    </div>
                  </article>


                  </div>
                </div>
              </aside>
              <aside class="mt50">
                <div class="col-md-3"> 
                  <!-- Widget: Text -->
                  <div class="widget">
                    <h3>Upcoming Events</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sed turpis neque. In auctor, odio eget luctus lobortis, sapien erat blandit felis, eget volutpat augue felis in purus.</p>
                  </div>
                  <!-- Widget: Latest news -->
                  <div class="widget clearfix">
                    <h3>Latest News</h3>
                    <ul class="list-unstyled">
                      <li>
                        <article>
                          <div class="news-thumb"> <a href="blog-post.html">
                            <img src="<?=base_url()?>assets/starhotel/images/blog/blog-sm-1.jpg" alt="Popular news"></a> </div>
                          <div class="news-content clearfix">
                            <h4><a href="blog-post.html">This is a video post</a></h4>
                            <span><a href="blog-post.html">April 15 2014</a></span> </div>
                        </article>
                      </li>
                      <li>
                        <article>
                          <div class="news-thumb"> <a href="blog-post.html"><img src="<?=base_url()?>assets/starhotel/images/blog/blog-sm-2.jpg" alt="Popular news"></a> </div>
                          <div class="news-content clearfix">
                            <h4><a href="blog-post.html">An image post</a></h4>
                            <span><a href="blog-post.html">April 14 2014</a></span> </div>
                        </article>
                      </li>
                      <li>
                        <article>
                          <div class="news-thumb"> <a href="blog-post.html"><img src="<?=base_url()?>assets/starhotel/images/blog/blog-sm-3.jpg" alt="Popular news"></a> </div>
                          <div class="news-content clearfix">
                            <h4><a href="blog-post.html">Audio included post</a></h4>
                            <span><a href="blog-post.html">April 12 2014</a></span> </div>
                        </article>
                      </li>
                    </ul>
                  </div>
                  <!-- Widget: Categories -->
                  <div class="widget">
                    <h3>Category</h3>
                    <ul class="list-unstyled arrow">
                      <li><a href="#">Rooms <span class="badge pull-right">46</span></a></li>
                      <li><a href="#">Media <span class="badge pull-right">11</span></a></li>
                      <li><a href="#">Marketing <span class="badge pull-right">42</span></a></li>
                    </ul>
                  </div>
                  <!-- Widget: Tags -->
                  <div class="widget">
                    <h3>Tags</h3>
                    <div class="tags"> <a href="#">HTML</a> <a href="#">CSS</a> <a href="#">Jquery</a> <a href="#">Modern</a> <a href="#">Responsive</a> <a href="#">Wordpress</a> <a href="#">Fun</a> <a href="#">Movies</a> <a href="#">Music</a> <a href="#">Information</a> </div>
                  </div>
                  <!-- Widget: Archive -->
                  <div class="widget">
                    <h3>Archive</h3>
                    <ul class="list-unstyled arrow">
                      <li><a href="#">April 2014 <span class="badge pull-right">15</span></a></li>
                      <li><a href="#">May 2014 <span class="badge pull-right">9</span></a></li>
                      <li><a href="#">February 2014 <span class="badge pull-right">3</span></a></li>
                      <li><a href="#">January 2014 <span class="badge pull-right">5</span></a></li>
                    </ul>
                  </div>
                </div>
              </aside>
            </div>
        </div>
        <footer>
            <div class="container">
              <div class="row">
                <div class="col-md-3 col-sm-3">
                  <h4>About Starhotel</h4>
                  <p>Suspendisse sed sollicitudin nisl, at dignissim libero. Sed porta tincidunt ipsum, vel volutpat. <br>
                    <br>
                    Nunc ut fringilla urna. Cras vel adipiscing ipsum. Integer dignissim nisl eu lacus interdum facilisis. Aliquam erat volutpat. Nulla semper vitae felis vitae dapibus. </p>
                </div>
                <div class="col-md-3 col-sm-3">
                  <h4>Recieve our newsletter</h4>
                  <p>Suspendisse sed sollicitudin nisl, at dignissim libero. Sed porta tincidunt ipsum, vel volutpa!</p>
                  <form role="form">
                    <div class="form-group">
                      <input name="newsletter" type="text" id="newsletter" value="" class="form-control" placeholder="Please enter your E-mailaddress">
                    </div>
                    <button type="submit" class="btn btn-lg btn-black btn-block">Submit</button>
                  </form>
                </div>
                <div class="col-md-3 col-sm-3">
                  <h4>From our blog</h4>
                    <ul>    
                    <li>
                  <article>
                  <a href="blog-post.html">This is a video post<br>April 15 2014</a>
                  </article>
                </li>
                    <li>
                  <article>
                  <a href="blog-post.html">An image post<br>April 14 2014</a>
                  </article>
                </li>
                    <li>
                  <article>
                  <a href="blog-post.html">Audio included post<br>April 12 2014</a>
                  </article>
                </li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-3">
                  <h4>Address</h4>
                  <address>
                  <strong>Starhotel</strong><br>
                  795 Las Palmas<br>
                  Spain, CA 94107<br>
                  <abbr title="Phone">P:</abbr> <a href="#">(123) 456-7890</a><br>
                  <abbr title="Email">E:</abbr> <a href="#">mail@example.com</a><br>
                  <abbr title="Website">W:</abbr> <a href="#">www.slashdown.nl</a><br>
                  </address>
                </div>
              </div>
            </div>
            <div class="footer-bottom">
            <div class="container">
            <div class="row">
            <div class="col-xs-6"> &copy; 2014 Starhotel All Rights Reserved </div>
            <div class="col-xs-6 text-right">
            <ul>
            <li><a href="contact-01.html">Contact</a></li>
            </ul>
            </div>
            </div>
            </div>
            </div>
        </footer>
        <!-- Go-top Button -->
        <div id="go-top"><i class="fa fa-angle-up fa-2x"></i></div>
    </div>
</body>
</html>