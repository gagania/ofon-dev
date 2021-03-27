<script type="text/javascript" src="<?= base_url() ?>assets/paging.js"></script>
<div class="col-md-12" style="margin-bottom: 10px;background-color:#fff;border-radius:8px"> 
    <div id="category_list_template">
        <h3 style="text-align:center;margin-top:25px">Archieve By Category</h3>
        <article>
            <div class="row">
                
        <?php if ($categoryList) {
            foreach ($categoryList as $index => $value) {
                ?>
                    <div class="col-sm-4 col-xs-4 meta" style="padding:25px">
                        <div>
                            <a href="#" onclick="javascript:get_article('<?=base_url()?>','archieve','<?=$value['id']?>')"> <?=$value['artc_ctgr_name']?>
                            <span class="badge pull-right"><?=$value['artc_total']?></span></a>
                        </div>
                        
                    </div>
            <?php }
        }
        ?>
            </div>
        </article>
        <hr/>
        <article class="article_category_list" style="display:none;">
            <div class="row">
                <div class="col-sm-12 col-xs-12 meta">
                    <div style="background:black" class="col-sm-12 col-xs-12 meta">Category</div>
                    <div style="" class="col-sm-3 col-xs-3 meta">Date</div>
                    <div style="" class="col-sm-9 col-xs-9 meta">Title</div>
                </div>
                <div class="col-sm-12 col-xs-12 meta article_list" > </div>
            </div>
        </article>
        
    </div>
</div>