<?php if ($authorsList) {
        foreach ($authorsList as $index => $value) {
            ?>
            <article> 
                <div class="row">
                    <div class="col-sm-12 col-xs-12 meta">
                        <h3><?php
                        $title = '';
//                        foreach($bodTitle as $indexTitle => $valueTitle) { 
//                            if ($value['rsrc_dir_title']) {
//                                if ($value['rsrc_dir_title'] == $indexTitle) {
//                                    $title = $valueTitle;
//                                    break;
//                                }
//                            }
//                        
//                        } 
                        echo $value['author_name']; ?></h3>
                        <hr/>
<!--                        <div style="display:inline-block;float:left;margin-right:10px;">
                            <img style="width:115px;height:140px;" src="<?=base_url().$value['rsrc_dir_image_path']?>"/>
                        </div>
                        <div style="vertical-align:top;">
                            <?=$value['rsrc_dir_content']; ?>
                        </div>
                         <div style="vertical-align:top;"><strong>Research Interest :</strong>
                            <?=$value['rsrc_dir_research']; ?>
                        </div>-->
                        <a href="#" onclick="javascript:history.back();return false;" class="btn btn-primary pull-right">Back</a>
                        <input type="hidden" id="writer" name="writer" value="<?=$value['author_alias']?>"/>
                </div>
            </article>

        <?php }
    }?>
<hr/>
<?php 
   $this->load->view("perpustakaan_admin/list_writer.php"); 
?>
