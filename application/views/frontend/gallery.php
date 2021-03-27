
<!-- Parallax Effect -->
<script type="text/javascript">$(document).ready(function() {
        $('#parallax-pagetitle').parallax("50%", -0.55);
    });</script>

<section class="parallax-effect">
    <div id="parallax-pagetitle" style="height:186px;background-image: url(<?= base_url() ?>assets/starhotel/images/parallax/parallax-01.jpg);">
        <div class="color-overlay"> 
            <!-- Page title -->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1>Gallery</h1>
                    </div>
                </div>
            </div>
            <div class="container">
    <div class="row">
        <div class="col-sm-12">
            <ul class="nav nav-pills" id="filters">
                <li class="active"><a href="#" data-filter="*">All</a></li>
                <?php if (isset($product)){
                    foreach($product as $index =>$value) { ?>
                        <li><a href="#" data-filter=".<?=$value['id']?>" style="font-weight:bold;"><?=$value['ctgr_name']?></a></li>
                <?php  }
                } else if (isset($jenisKayu)){
                    foreach($jenisKayu as $index =>$value) { ?>
                        <li><a href="#" data-filter=".<?=$value['folder_name']?>" style="font-weight:bold;"><?=$value['jenis_kayu_name']?></a></li>
                <?php  }
                    
                } 
?>
                
                
            </ul>
        </div>
    </div>
</div>
        </div>
    </div>
</section>

<!-- Filter -->


<!-- Gallery -->
<section id="gallery" class="mt50">
    <div class="container">
        <div class="row gallery"> 
            <!-- Image 1 -->
            <?php if (isset($images)){
                  foreach($images as $index=>$value){ ?>
            <div class="col-sm-3  fadeIn appear <?=$value['ctgr_id']?>" data-start="200" style="height: 169px; margin-top: 20px;">
                <a href="<?= base_url().$value['image_path'] ?>" data-rel="prettyPhoto[gallery1]" style="margin-top: auto" title="<?=$value['desc']?>">
                        <img src="<?= base_url().$value['thumbnail'] ?>" alt="<?=$value['orig_name']?>" class="img-responsive zoom-img" style="height: 169px;"/>
                        <i class="fa fa-search"></i></a> 
                    </div> 
            <?php }
            }?>
<!--            <div class="col-sm-3 restaurant fadeIn appear" data-start="200">
                <a href="<?= base_url() ?>assets/starhotel/images/gallery/1.jpg" data-rel="prettyPhoto[gallery1]">
                    <img src="<?= base_url() ?>assets/starhotel/images/gallery/1.jpg" alt="image" class="img-responsive zoom-img" />
                    <i class="fa fa-search"></i></a> 
            </div>
             Image 2 
            <div class="col-sm-3 pool fadeIn appear" data-start="200"> <a href="<?= base_url() ?>assets/starhotel/images/gallery/2.jpg" data-rel="prettyPhoto[gallery1]"><img src="<?= base_url() ?>assets/starhotel/images/gallery/2.jpg" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
             Image 3 
            <div class="col-sm-3 restaurant fadeIn appear" data-start="200"> <a href="<?= base_url() ?>assets/starhotel/images/gallery/3.jpg" data-rel="prettyPhoto[gallery1]"><img src="<?= base_url() ?>assets/starhotel/images/gallery/3.jpg" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
             Image 4 
            <div class="col-sm-3 pool fadeIn appear" data-start="200"> <a href="<?= base_url() ?>assets/starhotel/images/gallery/4.jpg" data-rel="prettyPhoto[gallery1]"><img src="<?= base_url() ?>assets/starhotel/images/gallery/4.jpg" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
             Image 5 
            <div class="col-sm-3 business fadeIn appear" data-start="200"> <a href="<?= base_url() ?>assets/starhotel/images/gallery/5.jpg" data-rel="prettyPhoto[gallery1]"><img src="<?= base_url() ?>assets/starhotel/images/gallery/5.jpg" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
             Image 6 
            <div class="col-sm-3 pool fadeIn appear" data-start="200"> <a href="<?= base_url() ?>assets/starhotel/images/gallery/6.jpg" data-rel="prettyPhoto[gallery1]"><img src="<?= base_url() ?>assets/starhotel/images/gallery/6.jpg" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
             Image 7 
            <div class="col-sm-3 business fadeIn appear" data-start="200"> <a href="<?= base_url() ?>assets/starhotel/images/gallery/7.jpg" data-rel="prettyPhoto[gallery1]"><img src="<?= base_url() ?>assets/starhotel/images/gallery/7.jpg" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
             Image 8 
            <div class="col-sm-3 pool fadeIn appear" data-start="200"> <a href="<?= base_url() ?>assets/starhotel/images/gallery/8.jpg" data-rel="prettyPhoto[gallery1]"><img src="<?= base_url() ?>assets/starhotel/images/gallery/8.jpg" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
             Image 1 
            <div class="col-sm-3 restaurant fadeIn appear" data-start="200"> <a href="<?= base_url() ?>assets/starhotel/images/gallery/9.jpg" data-rel="prettyPhoto[gallery1]"><img src="<?= base_url() ?>assets/starhotel/images/gallery/9.jpg" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
             Image 2 
            <div class="col-sm-3 pool fadeIn appear" data-start="200"> <a href="<?= base_url() ?>assets/starhotel/images/gallery/10.jpg" data-rel="prettyPhoto[gallery1]"><img src="<?= base_url() ?>assets/starhotel/images/gallery/10.jpg" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
             Image 3 
            <div class="col-sm-3 rooms fadeIn appear" data-start="200"> <a href="<?= base_url() ?>assets/starhotel/images/gallery/11.jpg" data-rel="prettyPhoto[gallery1]"><img src="<?= base_url() ?>assets/starhotel/images/gallery/11.jpg" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
             Image 4 
            <div class="col-sm-3 pool fadeIn appear" data-start="200"> <a href="<?= base_url() ?>assets/starhotel/images/gallery/12.jpg" data-rel="prettyPhoto[gallery1]"><img src="<?= base_url() ?>assets/starhotel/images/gallery/12.jpg" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>-->
        </div>
    </div>
</section>
