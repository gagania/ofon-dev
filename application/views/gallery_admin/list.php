<!--<div class="pg-category-view" id="phocagallery">-->
    <?php if($eventList){
        foreach($eventList as $index => $value) {?>
            <div style="height:158px; width:130px;" class="phocagallery-box-file pg-box-subfolder">
                <div style="height:118px;width:118px;margin:auto;" class="phocagallery-box-file-first">
                    <div class="phocagallery-box-file-second">
                        <div class="phocagallery-box-file-third">
                            <a href="<?=base_url().$this->router->fetch_class()?>/detail/<?=$value['event_alias']?>" class=""><img class="pg-cat-folder" alt="" src="<?=base_url()?>/assets/starhotel/images/icon-folder-medium.png"></a>
                        </div>
                    </div>
                </div>
                <div style="font-size:12px" class="pg-name"><?=$value['event_name']?></div>

            </div>
<?php  }
    }
?> 
<!--</div>-->
                 
