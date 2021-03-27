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
        <?php include('sidebar.php'); ?>
        <div id="layout" class="layout-wide">
            <header class="slide" id="home">
                <div class="nav_logo animated fadeInDown">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2"> <a href="<?= base_url() ?>" title="Back to Home"><img src="<?= base_url() ?>assets/themes/img/logo.png" alt="Logo" class="logo_img"> </a> </div>
                            <nav>
                                <?php //include('menu-frontend.php') ?>
                                <ul id="menu" class="sf-menu" style="float:left !important">
                                    <li> <a href="#home">BERANDA</a>
                                    </li>
                                    <li><a href="#about">TENTANG Ofon</a></li>
                                    <li><a href="#feature">FITUR</a></li>
                                    <li><a href="#coverage">JANGKAUAN AREA</a></li>
                                    <li><a href="#faq">FAQ</a></li>
                                    <li><a href="<?=base_url()?>product">PRODUK</a></li>
					 <li><a href="<?=base_url()?>blog">BLOG</a></li>
                                    <li><a href="<?=base_url()?>karir">KARIR</a></li>
                                    <li><a href="#contact">HUBUNGI KAMI</a></li>
                                  <!--  <li>

                                       <a href="#" onclick="show_login();">LOGIN</a>
                                    </li>-->

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
                <div class="tp-banner-container">
                    <div class="tp-banner">
                        <ul>
                            <li data-transition="zoomout" data-slotamount="7" data-masterspeed="2500"> <img src="<?= base_url() ?>assets/themes/img/slide/slides/3.jpg" alt="slidebg1" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                                <div class="tp-caption style-caption large_text lft tp-resizeme" data-x="16" data-y="80" data-speed="500" data-start="1200" data-easing="Power4.easeOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 5; max-width: 700px; line-height: 60px; max-height: auto; white-space: normal;">
                                    <h1>Layanan telepon untuk<br>
                                        kebutuhan rumah modren.<br>
                                        <span>Ofon Home</span></h1>
                                </div>
                                <div class="tp-caption style-caption lfb tp-resizeme" data-x="16" data-y="290" data-speed="500" data-start="1200" data-easing="Power4.easeOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 3; color: #dedede; max-width: 800px; max-height: auto; white-space: normal;">
                                    <p>Praktis melalui internet dengan tarif lebih murah dan mobile ready</p>
                                </div>
                                <div class="tp-caption style-caption lfb tp-resizeme" data-x="20" data-y="400" data-speed="300" data-start="1400" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"> <a href='index-one-page.html#' class='button'> <i class="fa fa-link"></i>Details</a> </div>
                                <div class="tp-caption style-caption lfb tp-resizeme" data-x="255" data-y="400" data-speed="300" data-start="1600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"> <a href="index-one-page.html#" class="button"> <i class="fa fa-mobile"></i>Download Ofon IGO </a> </div>
                            </li>
                            <li data-transition="zoomout" data-slotamount="7" data-masterspeed="2500"> <img src="<?= base_url() ?>assets/themes/img/slide/slides/2.jpg" alt="slidebg1" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                                <div class="tp-caption style-caption large_text lft tp-resizeme" data-x="16" data-y="80" data-speed="500" data-start="1200" data-easing="Power4.easeOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 5; max-width: 700px; line-height: 60px; max-height: auto; white-space: normal;">
                                    <h1>Layanan telepon yang tepat<br>
                                        untuk bisnis berskala kecil<br>
                                        <span>Ofon Small Business.</span>                 </h1>
                                </div>
                                <div class="tp-caption style-caption lfb tp-resizeme" data-x="16" data-y="290" data-speed="500" data-start="1200" data-easing="Power4.easeOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 3; color: #dedede; max-width: 800px; max-height: auto; white-space: normal;">
                                    <p>Dapat dihubungkan dengan <em>extention</em> melalui aplikasi mobil Ofon IGO melalui <em>cloud</em> internet.</p>
                                </div>
                                <div class="tp-caption style-caption lfb tp-resizeme" data-x="20" data-y="400" data-speed="300" data-start="1400" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"> <a href='index-one-page.html#' class='button'> <i class="fa fa-link"></i>Details</a> </div>
                                <div class="tp-caption style-caption lfb tp-resizeme" data-x="216" data-y="400" data-speed="300" data-start="1600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"> <a href="index-one-page.html#" class="button"> <i class="fa fa-android"></i>Download Ofon IGO </a> </div>
                            </li>
                            <li data-transition="zoomout" data-slotamount="7" data-masterspeed="2500"> <img src="<?= base_url() ?>assets/themes/img/slide/slides/1.jpg" alt="slidebg1" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                                <div class="tp-caption style-caption large_text lft tp-resizeme" data-x="16" data-y="80" data-speed="500" data-start="1200" data-easing="Power4.easeOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 5; max-width: 700px; line-height: 60px; max-height: auto; white-space: normal;" >
                                    <h1>Layanan telepon <br>
                                        dengan kapasitas besar <br>
                                        <span>Ofon SIP Trunk.</span>                 </h1>
                                </div>
                                <div class="tp-caption style-caption lfb tp-resizeme" data-x="16" data-y="290" data-speed="500" data-start="1200" data-easing="Power4.easeOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 3; color: #dedede; max-width: 800px; max-height: auto; white-space: normal;">
                                    <p>untuk dihubungkan dengan sistem telephony PABX pelanggan enterpise .</p>
                                </div>
                                <div class="tp-caption style-caption lfb tp-resizeme" data-x="20" data-y="400" data-speed="300" data-start="1400" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"> <a href='index-one-page.html#' class='button'> <i class="fa fa-link"></i>Details</a> </div>

                                <!--
                    <div class="tp-caption style-caption lfb tp-resizeme" data-x="216" data-y="400" data-speed="300" data-start="1600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300">
                    <a href="index-one-page.html#" class="button">
                    <span><i class="fa fa-windows"></i></span>Buy App
                    </a>
                    </div>
                                -->
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <div class="row info_title wow fadeInUp" id="about">
                <div class="vertical_line">
                    <div class="circle_bottom"></div>
                </div>
                <div class="info_vertical animated">

                    <h1>Tentang <span>Ofon</span>.</h1>

                    <p class="lead" style=""><?=substr( $about[0]['content_data'], 0, 561)?>...<a href="<?=base_url().str_replace(".html",'',$about[0]['menu_alias']).'/'.$about[0]['menu_alias']?>"><span>read more</span></a></p>
                    <h1></h1>
                    <h1><div class="tp-caption style-caption lfb tp-resizeme" data-x="216" data-y="400" data-speed="300" data-start="1600" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"> <a href="index.html" class="button"> <i class="fa fa-book"></i>Ofon Whitepaper </a> </div></h1>


                </div>
                <div class="vertical_line">
                    <div class="circle_top"></div>
                </div>
            </div>

            <!--
          <section class="content_info">

          <div class="paddings">
          <div class="container wow fadeInUp">

          <div class="bout-us-image">
          <img class="img-responsive" src="<?= base_url() ?>assets/themes/img/services/4.png" alt="">
          </div>

          <div class="row">

          <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="service-01">
          <div class="head-service-01">
          <i class="fa fa-bullhorn"></i>
          </div>
          <div class="caption-service-01">
          <h3>Branding</h3>
          <p>Lorem ipsum dolor sit amet elit sed do eiusmod tempor incilabore dolore magna aliqua.</p>
          </div>
          </div>
          </div>


          <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="service-01">
          <div class="head-service-01">
          <i class="fa fa-cogs"></i>
          </div>
          <div class="caption-service-01">
          <h3>Web Design</h3>
          <p>Lorem ipsum dolor sit amet elit sed do eiusmod tempor incilabore dolore magna aliqua.</p>
          </div>
          </div>
          </div>


          <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="service-01">
          <div class="head-service-01">
          <i class="fa fa-bolt"></i>
          </div>
          <div class="caption-service-01">
          <h3>Marketing</h3>
          <p>Lorem ipsum dolor sit amet elit sed do eiusmod tempor incilabore dolore magna aliqua.</p>
          </div>
          </div>
          </div>

            <!--
            <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="service-01">
            <div class="head-service-01">
            <i class="fa fa-camera"></i>
            </div>
            <div class="caption-service-01">
            <h3>Photography</h3>
             <p>Lorem ipsum dolor sit amet elit sed do eiusmod tempor incilabore dolore magna aliqua.</p>
            </div>
            </div>
            </div>

            </div>
            </div>
            </div>

            </section>
            -->

<!--<section class="content_info">

<div class="bg_parallax image_02_parallax"></div>


<section class="opacy_bg_02 paddings">

<div class="info_vertical animated">

<p>Menghubungkan masyaraat Indonesia untuk hidup hari ini yang lebih baik dan membangun masa depan yang sejahtera.</p>
<p><em>"Suyatim Abdurahman Habibie"</em></p>


</div>

</section>

</section>-->



            <section class="content_info" id="feature">
                <div class="bg_parallax image_01_parallax"></div>
                <section class="opacy_bg_01 paddings borders">
                    <div class="container wow fadeInUp">
                        <div class="row text-center">
                            <div class="service-process">
                                <div class="info_vertical animated">
                                    <h1>Fitur & Manfaat Ofon.</h1>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                    <div class="thumbnail">
                                        <div class="caption-head"> <em class="caption-icon fa fa-mobile icon-big"></em>
                                            <p class="caption-title">Local Landline<br> Telephone number<br>
                                                </br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                    <div class="thumbnail">
                                        <div class="caption-head"> <em class="caption-icon fa fa-reply-all icon-big"></em>
                                            <p class="caption-title">Cost Savings<br>
                                                </br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                    <div class="thumbnail">
                                        <div class="caption-head"> <em class="caption-icon fa fa-user icon-big"></em>
                                            <p class="caption-title">Powerful Cloud PBX </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                    <div class="thumbnail">
                                        <div class="caption-head"> <em class="caption-icon fa fa-sliders icon-big"></em>
                                            <p class="caption-title">User Friendly <br> Web Portal<br>
                                                </br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                    <div class="thumbnail">
                                        <div class="caption-head"> <em class="caption-icon fa fa-globe icon-big"></em>
                                            <p class="caption-title">Mobile Extension</br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                    <div class="thumbnail">
                                        <div class="caption-head"> <em class="caption-icon fa fa-phone icon-big"></em>
                                            <p class="caption-title">Conference Call<br>
                                                </br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                    <div class="thumbnail">
                                        <div class="caption-head"> <em class="caption-icon fa fa-clock-o icon-big"></em>
                                            <p class="caption-title">Unified Communication<br>
                                                24 Jam</br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                    <div class="thumbnail">
                                        <div class="caption-head"> <em class="caption-icon fa fa-money icon-big"></em>
                                            <p class="caption-title">Scalability<br>
                                                </br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 single_services">
                                <p class="lead">Lebih baik dalam komunikasi. <a href="index-one-page.html#">lebih baik dengan Ofon</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
            <div class="row info_title wow fadeInUp" id="services">
                <div class="vertical_line">
                    <div class="circle_bottom"></div>
                </div>
                <div class="info_vertical animated">
                    <h1>Kenapa Ofon </h1>
              <!--      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.</p> -->
                </div>
            </div>

            <section class="content_info">
                <div class="paddings">
                    <div class="container wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="service-01">
                                    <div class="head-service-01"> <i class="fa fa-ban"></i> </div>
                                    <div class="caption-service-01">
                                        <h3>Licensed Operator</h3>
                                        <p>Operator layanan telepon kantor dan rumah dengan lisensi dari MENKOMINFO.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="service-01">
                                    <div class="head-service-01"> <i class="fa fa-cloud-download"></i> </div>
                                    <div class="caption-service-01">
                                        <h3>Quick Installation </h3>
                                        <p>Penyambungan layanan yang cepat dan mudah.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="service-01">
                                    <div class="head-service-01"> <i class="fa fa-certificate"></i> </div>
                                    <div class="caption-service-01">
                                        <h3>Dedicated Customer Care</h3>
                                        <p>Customer Service 24 jam dan dukungan teknis tepat tanggap. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="service-01">
                                    <div class="head-service-01"> <i class="fa fa-eye"></i> </div>
                                    <div class="caption-service-01">
                                        <h3>Expertise in IP Telephony </h3>
                                        <p>Pakar dalam bidang teleponi berbasis IP dan telekomunikasi digital.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="service-01">
                                    <div class="head-service-01"> <i class="fa fa-cubes"></i> </div>
                                    <div class="caption-service-01">
                                        <h3>Quality and Availability</h3>
                                        <p>Kualitas suara jernih dengan standard mutu sesuai ketentuan regulator dan lebih baik. High availability karena langsung terhubung ke operator tanpa perantara.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="service-01">
                                    <div class="head-service-01"> <i class="fa fa-mobile-phone"></i> </div>
                                    <div class="caption-service-01">
                                        <h3>Digital Transformation</h3>
                                        <p>Bagian dari Transformasi Digital sarana Telekomunikasi demi peningkatan efisiensi dan produktivitas.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!--
          <section class="content_info">

          <div class="info_resalt borders">
          <div class="container">

          <div class="portfolioFilter">
          <a href="index-one-page.html#" data-filter="*" class="current">Show All</a>
          <a href="index-one-page.html#desing" data-filter=".desing">Desing</a>
          <a href="index-one-page.html#development" data-filter=".development">Development</a>
          <a href="index-one-page.html#mobile" data-filter=".mobile">Mobile</a>
          <a href="index-one-page.html#retina" data-filter=".retina">Retina Desing</a>
          </div>


          <div class="row portfolioContainer">

          <div class="col-sm-6 col-md-4 desing">
          <div class="item-work">
          <div class="hover">
          <img src="<?= base_url() ?>assets/themes/img/gallery/1.jpg" alt="Image" />
          <a href="<?= base_url() ?>assets/themes/img/gallery/1.jpg" class="ligbox-image" title="Image"><div class="overlay"></div></a>
          </div>
          <div class="info">
          <a href="single-work.html">Jekas - Creative Template</a>
          <i class="fa fa-tablet"></i>
          <i class="fa fa-desktop"></i>
          </div>
          </div>
          </div>


          <div class="col-sm-6 col-md-4 development">
          <div class="item-work">
          <div class="hover">
          <img src="<?= base_url() ?>assets/themes/img/gallery/2.jpg" alt="Image" />
          <a href="<?= base_url() ?>assets/themes/img/gallery/2.jpg" class="ligbox-image" title="Image"><div class="overlay"></div></a>
          </div>
          <div class="info">
          <a href="single-work.html">Mycv - One Resume Page</a>
          <i class="fa fa-tablet"></i>
          <i class="fa fa-desktop"></i>
          </div>
          </div>
          </div>


           <div class="col-sm-6 col-md-4 mobile">
          <div class="item-work">
          <div class="hover">
          <img src="<?= base_url() ?>assets/themes/img/gallery/3.jpg" alt="Image" />
          <a href="<?= base_url() ?>assets/themes/img/gallery/3.jpg" class="ligbox-image" title="Image"><div class="overlay"></div></a>
          </div>
          <div class="info">
          <a href="single-work.html">Megahost - Hosting Template</a>
          <i class="fa fa-tablet"></i>
          <i class="fa fa-desktop"></i>
          </div>
          </div>
          </div>


          <div class="col-sm-6 col-md-4 development">
          <div class="item-work">
          <div class="hover">
          <img src="<?= base_url() ?>assets/themes/img/gallery/4.jpg" alt="Image" />
          <a href="<?= base_url() ?>assets/themes/img/gallery/4.jpg" class="ligbox-image" title="Image"><div class="overlay"></div></a>
          </div>
          <div class="info">
          <a href="single-work.html">Studio - Landing Page</a>
          <i class="fa fa-tablet"></i>
          <i class="fa fa-desktop"></i>
          </div>
          </div>
          </div>


          <div class="col-sm-6 col-md-4 retina">
          <div class="item-work">
          <div class="hover">
          <img src="<?= base_url() ?>assets/themes/img/gallery/5.jpg" alt="Image" />
          <a href="<?= base_url() ?>assets/themes/img/gallery/5.jpg" class="ligbox-image" title="Image"><div class="overlay"></div></a>
          </div>
          <div class="info">
          <a href="single-work.html">Ebook - Landing Page</a>
          <i class="fa fa-tablet"></i>
          <i class="fa fa-desktop"></i>
          </div>
          </div>
          </div>


          <div class="col-sm-6 col-md-4 desing">
          <div class="item-work">
          <div class="hover">
          <img src="<?= base_url() ?>assets/themes/img/gallery/6.jpg" alt="Image" />
          <a href="<?= base_url() ?>assets/themes/img/gallery/6.jpg" class="ligbox-image" title="Image"><div class="overlay"></div></a>
          </div>
          <div class="info">
          <a href="single-work.html">Gotten - Landing Page</a>
          <i class="fa fa-tablet"></i>
          <i class="fa fa-desktop"></i>
          </div>
          </div>
          </div>

          </div>

          </div>
          </div>

          </section>
            -->



            <!--
          <div class="row info_title wow fadeInUp" id="blog">
          <div class="vertical_line">
          <div class="circle_bottom"></div>
          </div>
          <div class="info_vertical animated">
          <h1>Latest <span>Blog</span>.</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam.</p>
          </div>
          </div>

          <section class="content_info">

          <div class="paddings">
          <div class="container wow fadeInUp">
          <div class="row">

          <div class="col-sm-6 col-md-6">
          <div class="blog-content">
          <div class="entry-header">
          <div class="blog-image">
          <img class="img-responsive" src="<?= base_url() ?>assets/themes/img/gallery/1.jpg" alt="">
          <div class="more-link">
          <a href="index-one-page.html#"><i class="fa fa-plus"></i></a>
          </div>
          </div>
          <div class="post-date">
          <h3>27<span>August</span></h3>
          </div>
          </div>
          <div class="entry-content">
          <h3 class="entry-title"><a href="index-one-page.html#">Adipisicing elit, sed do eiusmod tempor</a></h3>
          <ul class="entry-meta">
          <li><a href="index-one-page.html#"><i class="fa fa-user"></i> By: Admin <span>/</span></a></li>
          <li><a href="index-one-page.html#"><i class="fa fa-tags"></i> Desing <span>/</span></a></li>
          <li><a href="index-one-page.html#"><i class="fa fa-comments"></i> 2 Comments</a></li>
          </ul>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          </div>
          </div>
          </div>


          <div class="col-sm-6 col-md-6">
          <div class="blog-content">
          <div class="entry-header">
          <div class="blog-image">
          <img class="img-responsive" src="<?= base_url() ?>assets/themes/img/gallery/2.jpg" alt="">
          <div class="more-link">
          <a href="index-one-page.html#"><i class="fa fa-plus"></i></a>
           </div>
          </div>
          <div class="post-date">
          <h3>27<span>August</span></h3>
          </div>
          </div>
          <div class="entry-content">
          <h3 class="entry-title"><a href="index-one-page.html#">Adipisicing elit, sed do eiusmod tempor</a></h3>
          <ul class="entry-meta">
          <li><a href="index-one-page.html#"><i class="fa fa-user"></i> By: Gama <span>/</span></a></li>
          <li><a href="index-one-page.html#"><i class="fa fa-tags"></i> Photograph <span>/</span></a></li>
          <li><a href="index-one-page.html#"><i class="fa fa-comments"></i> 5 Comments</a></li>
          </ul>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          </div>
          </div>
          </div>


          <div class="col-sm-6 col-md-6">
          <div class="blog-content">
          <div class="entry-header">
          <div class="blog-image">
          <img class="img-responsive" src="<?= base_url() ?>assets/themes/img/gallery/3.jpg" alt="">
          <div class="more-link">
          <a href="index-one-page.html#"><i class="fa fa-plus"></i></a>
          </div>
          </div>
          <div class="post-date">
          <h3>27<span>August</span></h3>
          </div>
          </div>
          <div class="entry-content">
          <h3 class="entry-title"><a href="index-one-page.html#">Adipisicing elit, sed do eiusmod tempor</a></h3>
          <ul class="entry-meta">
          <li><a href="index-one-page.html#"><i class="fa fa-user"></i> By: Admin <span>/</span></a></li>
          <li><a href="index-one-page.html#"><i class="fa fa-tags"></i> Development <span>/</span></a></li>
          <li><a href="index-one-page.html#"><i class="fa fa-comments"></i> 3 Comments</a></li>
          </ul>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          </div>
          </div>
          </div>


          <div class="col-sm-6 col-md-6">
          <div class="blog-content">
          <div class="entry-header">
          <div class="blog-image">
          <img class="img-responsive" src="<?= base_url() ?>assets/themes/img/gallery/4.jpg" alt="">
          <div class="more-link">
          <a href="index-one-page.html#"><i class="fa fa-plus"></i></a>
          </div>
          </div>
          <div class="post-date">
           <h3>27<span>August</span></h3>
          </div>
          </div>
          <div class="entry-content">
          <h3 class="entry-title"><a href="index-one-page.html#">Adipisicing elit, sed do eiusmod tempor</a></h3>
          <ul class="entry-meta">
          <li><a href="index-one-page.html#"><i class="fa fa-user"></i> By: Admin <span>/</span></a></li>
          <li><a href="index-one-page.html#"><i class="fa fa-tags"></i> Art <span>/</span></a></li>
          <li><a href="index-one-page.html#"><i class="fa fa-comments"></i> 3 Comments</a></li>
          </ul>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          </div>
          </div>
          </div>

          </div>
          </div>
          </div>

          </section>
            -->

            <!--
            <section class="info_resalt borders">
              <div class="container">
                <div class="row">
                  <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="item_table">
                      <div class="head_table">
                        <h1>Ofon Home</h1>
                        <h2>Rp 300 rb / bln</h2>
                      </div>
                      <ul>
                        <li class="color"><i class="fa fa-check"></i> Styled elements</li>
                        <li><i class="fa fa-check"></i> Advanced admin</li>
                        <li class="color"><i class="fa fa-check"></i> Up to 10 users</li>
                        <li><i class="fa fa-check"></i> Email Marketing</li>
                        <li class="color"><i class="fa fa-check"></i> 3 Users License</li>
                      </ul>
                      <a href="feature-table-pricing.html#" class="button">Order Now</a> </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="item_table">
                      <div class="head_table">
                        <h1>Ofon Light Business</h1>
                        <h2>Rp 650 rb / bln</h2>
                      </div>
                      <ul>
                        <li class="color"><i class="fa fa-check"></i>Styled elements</li>
                        <li><i class="fa fa-check"></i>Advanced admin</li>
                        <li class="color"><i class="fa fa-check"></i>Up to 10 users</li>
                        <li><i class="fa fa-check"></i>Email Marketing</li>
                        <li class="color"><i class="fa fa-check"></i>3 Users License</li>
                      </ul>
                      <a href="feature-table-pricing.html#" class="button">Order Now</a> </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="item_table">
                      <div class="head_table">
                        <h1>Ofon Small Business</h1>
                        <h2>Rp 600 rb / bln</h2>
                      </div>
                      <ul>
                        <li class="color"><i class="fa fa-check"></i>Styled elements</li>
                        <li><i class="fa fa-check"></i>Advanced admin</li>
                        <li class="color"><i class="fa fa-check"></i>Up to 10 users</li>
                        <li><i class="fa fa-check"></i>Email Marketing</li>
                        <li class="color"><i class="fa fa-check"></i>3 Users License</li>
                      </ul>
                      <a href="feature-table-pricing.html#" class="button">Order Now</a> </div>
                  </div>
                  <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="item_table">
                      <div class="head_table">
                        <h1>Ofon for Corporate</h1>
                        <h2>Call for Price</h2>
                      </div>
                      <ul>
                        <li class="color"><i class="fa fa-check"></i>Styled elements</li>
                        <li><i class="fa fa-check"></i>Advanced admin</li>
                        <li class="color"><i class="fa fa-check"></i>Up to 10 users</li>
                        <li><i class="fa fa-check"></i>Email Marketing</li>
                        <li class="color"><i class="fa fa-check"></i>3 Users License</li>
                      </ul>
                      <a href="feature-table-pricing.html#" class="button">Contact Us</a> </div>
                  </div>
                </div>
              </div>
            </section>

            -->



    <section class="content_info">
        <div class="bg_parallax image_05_parallax"></div>
        <div class="vertical_line">
            <div class="circle_bottom"></div>
        </div>
        <div class="info_vertical animated">
            <h1 style=" color: white;">milestone Ofon </h1>
        </div>
        <div class="container wow fadeInUp">
            <div class="row results results-no-top">
                <?php if (isset($milestoneData)) {
                    foreach($milestoneData as  $index =>$value) {?>
                        <div class="col-md-2" style="width:20%">
                            <h2 style="border-bottom:0px !important"><?=$value['year']?></h2>
                            <p style="border-top:1px solid #cdcdcd;color: white;"><?=$value['town']?></p>
                        </div>
                    <?php }

                }?>

            </div>
        </div>
    </section>

    <section class="content_info" id="coverage">
        <div class="bg_parallax image_04_parallax"></div>
        <div class="vertical_line">
            <div class="circle_bottom"></div>
        </div>
        <div class="info_vertical">
            <h1>Jangkauan Area</h1>
        </div>
        <div class="paddings">
            <div class="container wow fadeInUp">
                <div class="row">
                    <div class="col-md-12">
                        <p class="lead">  </p>
                        <d>
                            <h1></h1>
                            <h1></h1>
                            <h1></h1>
                            <h1></h1>
                        </d>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content_info">
        <video class="bg_video" preload="auto" autoplay loop muted poster='<?= base_url() ?>assets/themes/img/slide/slides/4.jpg' data-setup="{}">
            <source src="<?= base_url() ?>assets/themes/img/video/video.mp4" type="video/mp4">
            <source src="<?= base_url() ?>assets/themes/img/video/video-sections.webm" type="video/webm">
        </video>
        <section class="opacy_bg_03 paddings">
            <div class="info_vertical animated">
                <h1>Portofolio Klien</h1>
            </div>
            <div class="container wow fadeInUp">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="owl-carousel carousel-sponsors tooltip-hover" id="carousel-sponsors">
                            <?php if ($linkData) {
                                    foreach($linkData as $index => $value) { ?>
                                        <li data-toggle="tooltip" title data-original-title="Name Sponsor">
                                            <a href="#" class="tooltip_hover" title="Name Sponsor">
                                                <img src="<?= base_url().$value['link_file_path'] ?>" alt="Image"></a>
                                        </li>
                                <?php }
                            } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </section>


   <!-- <div class="row info_title wow fadeInUp" id="pricing">
        <div class="vertical_line">
            <div class="circle_bottom"></div>
        </div>
        <div class="info_vertical">
            <h1>Penawaran Terbaik.</h1>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet ante.</p>
        </div>
        <div class="vertical_line"></div>
        <i class="fa fa-gift left"></i> </div>

    <div class="row info_title wow fadeInUp" id="karir">
        <div class="vertical_line">
            <div class="circle_bottom"></div>
        </div>
        <div class="info_vertical">
            <h1>Karir <span>Ofon</span>.</h1>
                  <img alt="karir" src="assets/themes/img/karir-2.jpeg" style="margin-left:auto;margin-right:auto;width:100%;"/>
                

        </div>
        <div class="vertical_line">
            <div class="circle_top"></div>
        </div>
    </div>-->

    <section class="content_info">
        <div class="bg_parallax image_02_parallax"></div>
        <section class="opacy_bg_02 paddings">
            <ul class="owl-carousel carousel-testimonials wow fadeInUp" id="carousel-testimonials">
                <?php if($testimonialData) {
                        foreach ($testimonialData as $index => $value) {?>
                            <li>
                                <div class="head-testimonials">
                                <div class="image-testimonials"> <img src="<?= base_url().$value['tstm_image_path'] ?>" alt=""></div>
                                </div>
                                <div class="name">
                                    <h3><?=$value['tstm_name']?></h3>
                                </div>
                                <div class="job">
                                    <h3><?=$value['tstm_position']?></h3>
                                </div>
                                <p style="color: white;"><?=$value['tstm_desc']?></p>
                            </li>
                  <?php }
                }?>
            </ul>
        </section>
    </section>


    <section class="content_info" id="faq">
        <div class="vertical_line">
            <div class="circle_bottom"></div>
        </div>
        <div class="info_vertical">
            <h1>Frequently Asked Questions</h1>
        </div>
        <div class="paddings">
            <div class="container wow fadeInUp">
                <div class="row">
                    <div class="col-md-12">
          <!--            <p class="lead"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rutrum pellentesque imperdiet. Nulla lacinia iaculis nulla non pulvinar. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eu risus enim, ut pulvinar lectus. Sed hendrerit nibh metus. </p> -->
                        
                        <?php foreach($faqCategory as $index => $value) {?>
                            <hr class="tall">
                            <h3><?=$value?></h3>
                        <?php 
                            if (isset($faqData)) {
                                foreach($faqData as $indexData => $valueData) {
                                    if ($valueData['faq_ctgr'] == $index) {?>
                                        <div class="accordion-trigger">
                                            <?=$valueData['faq_qstn']?></div>
                                        <div class="accordion-container">
                                            <p><?=$valueData['faq_answer']?></p>
                                        </div>
                                <?php }
                                }
                            }
                         }?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="row info_title wow fadeInUp" id="contact">
        <!--    <div class="vertical_line">
              <div class="circle_bottom"></div>
            </div>
            <div class="info_vertical">
              <h1>Contact Us.</h1>
              <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet ante.</p>
            </div>
            <div class="vertical_line"></div>
                  <div class="circle_bottom"></div>
            <i class="fa fa-envelope-o left"></i> </div> -->
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
                                <textarea placeholder="Pesan Anda" name="message" required></textarea>
                                <input type="submit" name="Submit" value="Kirim Pesan" class="button">
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h3>Ofon Center</h3>
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
    
</body>
</html>
