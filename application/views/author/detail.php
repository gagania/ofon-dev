<?php if ($researchersList) {
        foreach ($researchersList as $index => $value) {
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
                        echo $value['rsrc_dir_name']; ?></h3>
                        <hr/>
                        <div style="display:inline-block;float:left;margin-right:10px;">
                            <img style="width:115px;height:140px;" src="<?=base_url().$value['rsrc_dir_image_path']?>"/>
                        </div>
                        <div style="vertical-align:top;">
                            <?=$value['rsrc_dir_content']; ?>
                        </div>
                         <div style="vertical-align:top;"><strong>Research Interest :</strong>
                            <?=$value['rsrc_dir_research']; ?>
                        </div>
                        <a href="#" onclick="javascript:history.back();return false;" class="btn btn-primary pull-right">Back</a>
                        <input type="hidden" id="writer" name="writer" value="<?=$value['rsrc_dir_alias']?>"/>
                </div>
            </article>

        <?php }
    }?>
<hr/>
<?php 
//   $this->load->view("research/list.php"); 
?>
<script type="text/javascript" src="<?= base_url() ?>assets/paging.js"></script>
<div id="research_list_template">
    <?php if ($researchList) {?>
        <ul>
    <?php foreach ($researchList as $index => $value) {
            ?>
            <li>
                <a href="<?php echo base_url().'research/page/'.$value['research_alias']; ?>">
                <?php echo ''.$value['research_title'].'<br>'; ?>
                </a>
<!--            <article> 
		  <br/>
                <div class="row">
                    <div class="col-sm-12 col-xs-12 meta">
                        <a href="<?php echo base_url().$this->router->fetch_class().'/page/'.$value['research_alias']; ?>">
                            <?php 
//                            if (strpos($value['research_title'],':') !== false) {                                    
//                                $str = explode(":",$value['research_title']);
//                                echo '<h4>'.$str[0].'</h4><br>';
//                                echo '<h3>'.$str[1].'</h3><br>';
//                            }else{
                                echo ''.$value['research_title'].'<br>';
//                            }

                            ?>
                        </a> 
                        <p><i class="fa fa-pencil"></i>
                            <?php 
                                $temp = '';
                                if ($value['written_by'] != '') {
                                $writer = explode(',',$value['written_by']);
                                
                                foreach($writer as $valueWritter) {
                                    if (array_key_exists($valueWritter, $researchersData)) {
                                        if ($temp == '') {
                                            $temp = '<a href="'.base_url().$this->router->fetch_class().'/writer/'.$valueWritter.'">'.$researchersData[$valueWritter].'</a>';
                                        } else {
                                           $temp .= ', <a href="'.base_url().$this->router->fetch_class().'/writer/'.$valueWritter.'">'.$researchersData[$valueWritter].'</a>'; 
                                        }
                                    }
                                }
                            }
                            echo $temp;
                            ?>
                            &nbsp;&nbsp;&nbsp;
                        <i class="fa fa-calendar"></i><?=date("D M d Y", strtotime($value['create_on']))?></p>
                        <p class="intro"><?=substr( $value['research_content'], 0, 850) ?>....</p>
                        <a href="<?php echo base_url().$this->router->fetch_class().'/page/'.$value['research_alias']; ?>" class="btn btn-primary pull-right">Read More</a> </div>
                </div>
            </article>-->
        </li>
        <?php }?>
        </ul>
<?php }
    if ($publicationsList){?>
    <ul>
    <?php
        foreach ($publicationsList as $index => $value) {?>
            <li>
                <a href="<?php echo base_url().'publications/page/'.$value['prps_alias']; ?>">
                <?php echo ''.$value['prps_title'].'<br>'; ?>
                </a>
            </li>
    <?php }?>
        </ul>
<?php }
    ?>
</div>
