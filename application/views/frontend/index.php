<!-- banner -->
<section class="revolution-slider">
    <div class="bannercontainer">
        <div class="banner">
            <ul style="">
                <!-- Slide 1 -->
                <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" > 
                    <!-- Main Image --> 
                    <img src="<?= base_url() ?>assets/starhotel/images/images_me/10541951_651837864930215_1612035174_n.jpg" style="opacity:0;" alt="slidebg1"  data-bgfit="cover" data-bgposition="left bottom" data-bgrepeat="no-repeat"> 
                    <!-- Layers -->           
                    <!-- Layer 1 -->
                    <div class="caption sft revolution-starhotel bigtext"  
                         data-x="505" 
                         data-y="30" 
                         data-speed="700" 
                         data-start="1700" 
                         data-easing="easeOutBack"> 
                        <span>
<!--                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i> 
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>-->
                        </span> 
                        <!--A Five Star Hotel--> 
                        <span>
<!--                            <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> 
                            <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                            <i class="fa fa-star-o"></i>-->
                        </span>
                    </div>
                    <!-- Layer 2 -->
                    <div class="caption sft revolution-starhotel smalltext"  
                         data-x="605" 
                         data-y="105" 
                         data-speed="800" 
                         data-start="1700" 
                         data-easing="easeOutBack">
                        <span>
                            <!--And we like to keep it that way!-->
                        </span>
                    </div>
                    <!-- Layer 3 -->
<!--                    <div class="caption sft"  
                         data-x="775" 
                         data-y="175" 
                         data-speed="1000" 
                         data-start="1900" 
                         data-easing="easeOutBack">
                        <a href="room-list.html" class="button btn btn-purple btn-lg">
                            See rooms
                        </a> 
                    </div>-->
                </li>
                <!-- Slide 2 -->
                <li data-transition="boxfade" data-slotamount="7" data-masterspeed="1000" > 
                    <!-- Main Image --> 
                    <img src="<?= base_url() ?>assets/starhotel/images/images_me/1724416_1564596297102234_682091935_n.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat"> 
                    <!-- Layers -->           
                    <!-- Layer 1 -->
<!--                    <div class="caption sft revolution-starhotel bigtext"  
                         data-x="585" 
                         data-y="30" 
                         data-speed="700" 
                         data-start="1700" 
                         data-easing="easeOutBack"> 
                        <span><i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i></span> Double room <span><i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i></span></div>
                     Layer 2 
                    <div class="caption sft revolution-starhotel smalltext"  
                         data-x="682" 
                         data-y="105" 
                         data-speed="800" 
                         data-start="1700" 
                         data-easing="easeOutBack">
                        <span>€ 99,- a night this summer</span></div>-->
                    <!-- Layer 3 -->
<!--                    <div class="caption sft"  
                         data-x="785" 
                         data-y="175" 
                         data-speed="1000" 
                         data-start="1900" 
                         data-easing="easeOutBack">
                        <a href="room-detail.html" class="button btn btn-purple btn-lg">Book this room</a> 
                    </div>-->
                </li>
                <li data-transition="boxfade" data-slotamount="7" data-masterspeed="1000" > 
                    <!-- Main Image --> 
                    <img src="<?= base_url() ?>assets/starhotel/images/images_me/10539150_1470446153232914_1307962002_n.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat"> 
                    <!-- Layers -->           
                    <!-- Layer 1 -->
<!--                    <div class="caption sft revolution-starhotel bigtext"  
                         data-x="585" 
                         data-y="30" 
                         data-speed="700" 
                         data-start="1700" 
                         data-easing="easeOutBack"> 
                        <span><i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i></span> Double room <span><i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i></span></div>
                     Layer 2 
                    <div class="caption sft revolution-starhotel smalltext"  
                         data-x="682" 
                         data-y="105" 
                         data-speed="800" 
                         data-start="1700" 
                         data-easing="easeOutBack">
                        <span>€ 99,- a night this summer</span></div>
                     Layer 3 
                    <div class="caption sft"  
                         data-x="785" 
                         data-y="175" 
                         data-speed="1000" 
                         data-start="1900" 
                         data-easing="easeOutBack">
                        <a href="room-detail.html" class="button btn btn-purple btn-lg">Book this room</a> -->
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- end Banner -->
<!-- favorite wood -->
<section class="rooms mt50">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="lined-heading"><span>Recent Updates</span></h2>
            </div>
            <!-- Room -->
            
                <?php if($image_data) {
                     foreach($image_data as $index => $value) { ?>
                    <div class="col-sm-4">
                        <div class="room-thumb"> <img src="<?= base_url().'images/thumbnail/'.$value['type'].'/'.$value['ctgr_id'].'/'.$value['image_name'] ?>" alt="room 1" class="img-responsive" />
                    <div class="mask">
                        <div class="main">
                            <h5><?=$value['orig_name']?></h5>
                            <!--<div class="price">&euro; 99<span>a night</span></div>-->
                        </div>
                        <div class="content">
                            <p><span>Description</span> 
                            <?=$value['desc']?></p>
<!--                            <div class="row">
                                <div class="col-xs-6">
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-check-circle"></i> Incl. breakfast</li>
                                        <li><i class="fa fa-check-circle"></i> Private balcony</li>
                                        <li><i class="fa fa-check-circle"></i> Sea view</li>
                                    </ul>
                                </div>
                                <div class="col-xs-6">
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-check-circle"></i> Free Wi-Fi</li>
                                        <li><i class="fa fa-check-circle"></i> Incl. breakfast</li>
                                        <li><i class="fa fa-check-circle"></i> Bathroom</li>
                                    </ul>
                                </div>
                            </div>-->
                            <!--<a href="room-detail.html" class="btn btn-primary btn-block">Read More</a>-->
                        </div>
                    </div>
                </div>
                </div>
               <?php }
                }
?>
        </div>
    </div>
</section>
<!-- end favorite wood -->
<!-- USP's -->
<!--<section class="usp mt100">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="lined-heading"><span>USP section</span></h2>
            </div>
            <div class="col-sm-3 bounceIn appear" data-start="0">
                <div class="box-icon">
                    <div class="circle"><i class="fa fa-glass fa-lg"></i></div>
                    <h3>Beverages included</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse interdum eleifend augue, quis rhoncus purus fermentum. </p>
                    <a href="#">Read more<i class="fa fa-angle-right"></i></a> </div>
            </div>
            <div class="col-sm-3 bounceIn appear" data-start="400">
                <div class="box-icon">
                    <div class="circle"><i class="fa fa-credit-card fa-lg"></i></div>
                    <h3>Stay First, Pay After!</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse interdum eleifend augue, quis rhoncus purus fermentum. </p>
                    <a href="#">Read more<i class="fa fa-angle-right"></i></a> </div>
            </div>
            <div class="col-sm-3 bounceIn appear" data-start="800">
                <div class="box-icon">      
                    <div class="circle"><i class="fa fa-cutlery fa-lg"></i></div>
                    <h3>24 Hour Restaurant</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse interdum eleifend augue, quis rhoncus purus fermentum. </p>
                    <a href="#">Read more<i class="fa fa-angle-right"></i></a> </div>
            </div>
            <div class="col-sm-3 bounceIn appear" data-start="1200">
                <div class="box-icon">
                    <div class="circle"><i class="fa fa-tint fa-lg"></i></div>
                    <h3>Spa Included!</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse interdum eleifend augue, quis rhoncus purus fermentum. </p>
                    <a href="#">Read more<i class="fa fa-angle-right"></i></a> </div>
            </div>
        </div>
    </div>
</section>-->
<!-- end USP's -->