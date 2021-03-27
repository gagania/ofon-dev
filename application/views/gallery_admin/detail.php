<article>                   
    <div class="row">
        <div class="col-sm-11 col-xs-10 meta">
            <div class="row gallery"> 
            <?php if(isset($galleryList)){
                    foreach($galleryList as $index => $value) { ?>
                        <div class="col-sm-3 fadeIn appear" data-start="200"> <a href="<?= base_url() ?>images/<?=$value['event_id'].'/'.$value['image_name']?>" data-rel="prettyPhoto[gallery1]"><img src="<?= base_url() ?>images/thumbnail/<?=$value['event_id'].'/'.$value['image_name']?>" alt="image" class="img-responsive zoom-img" /><i class="fa fa-search"></i></a> </div>
            <?php   } 
                  }?>
            </div> 
            <a href="<?= base_url() ?>gallery/photo" class="btn btn-primary pull-right">Back</a>
        </div>
    </div>
    
</article>  