<script type="text/javascript" src="<?= base_url() ?>assets/paging.js"></script>
<!--<link href="<?= base_url() ?>assets/metronic/css/style.css" rel="stylesheet" type="text/css"/>-->
<section id="page-content" style="margin-top:95px;">
    <div class="container">
        <div class="page-title">
            <h1>WIKI</h1>
        </div>
        <div class="row">
            <div class="col-lg-2" style="border-right:1px solid #eee">
                <?php if ($wikilist) {
                        foreach($wikilist as $index => $value) {?>
                            <?=$value['wiki_name']?>
                    <?php }
                }
?>
            </div>
            <div class="col-lg-10">
                <div class="col-lg-12">
                    <div class="col-lg-6" style="border:1px solid #eeeeee">
                    <ul id="" class="" style="list-style:none;">
                    <?php if (sizeof($wikiMenus) > 0) {
                        foreach($wikiMenus as $index => $value) {?>
                            <li><a href="#<?=$value['id']?>"><?=$value['menu_number'].'  '.$value['menu_name']?></a>
                       <?php 
                            if (isset($value['child'])) {
                                echo getChildMenu($value['child']);
                            }
                        }?>
                            </li>
                    <?php }?>

                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <?php if (sizeof($wikiMenus) > 0) {
                        foreach($wikiMenus as $indexMenu => $valueMenu) {?>
                        <h3><div id="<?=$valueMenu['id']?>"><?=$valueMenu['menu_number'].'  '.$valueMenu['menu_name']?></div></h3>
                            <p>
                                <?php  
                                if (isset($valueMenu['child'])) {
                                    $keys =  array_search($value['id'], array_column($wikiContent, 'menu_id'));
                                    if ($keys) {
                                        echo $wikiContent[$keys]['content_data'];
                                    }
                                    echo getChildMenuContent($valueMenu['child'],$wikiContent);
                                } else {
                                    
                                    $keys =  array_search($valueMenu['id'], array_column($wikiContent, 'menu_id'));
                                    
                                    if ($keys || $value['menu_parent'] == 0) {
                                        echo (isset($wikiContent[$keys])) ?$wikiContent[$keys]['content_data']:'';
                                    }
                                }
                                
                                ?>
                            </p>
                       <?php 
                        }?>
                            </li>
                    <?php }?>
                </div>
                <div class="col-lg-12">
                    <?php if ($wikiReference) {
                        foreach($wikiReference as $index => $value) {?>
                            <div class="col-lg-1">[<?=$value['number']?>]</div>
                            <div class="col-lg-11"><?=$value['ref_desc']?></div>
                        <?php }
                    }
?>
                </div>
            </div>
        </div>
        
    </div>
</section>
<?php 
function getChildMenu($parent) {
    $temp = '';
    if (sizeof($parent) > 0) {
        $temp .='<ul style="list-style:none;">';
        foreach($parent as $index => $value) {
            $temp .="<li><a href='#".$value['id']."'>".$value['menu_number'].'  '.$value['menu_name']."</a>";
            if (isset($value['child'])) {
                $temp .= getChildMenu($value['child']);
            }
            $temp .='</li>';
        }
        $temp .='</ul>';
    }
    
    return $temp;
}

function getChildMenuContent($parent,$content) {
    $temp = '';
    if (sizeof($parent) > 0) {
        $temp .='<p>';
        foreach($parent as $index => $value) {
            $temp .="<h4><div id=".$value['id'].">".$value['menu_number'].'  '.$value['menu_name']."</div></h4>";
            if (isset($value['child'])) {
                $keys =  array_search($value['id'], array_column($content, 'menu_id'));
                if ($keys) {
                    $temp .= '"'.(isset($content[$keys])) ?$content[$keys]['content_data']:''.'"';
                }
                $temp .= getChildMenuContent($value['child'],$content);
            } else {
                $keys =  array_search($value['id'], array_column($content, 'menu_id'));
                if ($keys) {
                    $temp .= '"'.(isset($content[$keys])) ?$content[$keys]['content_data']:''.'"';
                }
            }
        }
        $temp .='</p>';
    }
    
    return $temp;
}

?>