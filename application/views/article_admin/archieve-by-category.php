<?php if ($articleData) {
    $i=0;
    $background = '';
    foreach($articleData as $index => $value) {
        if ($i% 2 == 0) {
            $background = '#d3d3d3';
        } else {
            $background = '#ffffff';
        }
?>
        <div class="col-sm-12 col-xs-12 meta" style="padding-bottom: 5px;padding-top:5px; background: <?=$background?>"> 
            <div style="padding-left: 0px" class="col-sm-3 col-xs-3 meta"><?=$value['artc_date']?></div>
            <div class="col-sm-9 col-xs-9 meta">
        <a href="<?=base_url()?>article/page/<?=$value['artc_alias']?>"><?=$value['artc_name']?></a> </div>
        </div>
<?php 
        $i++;
    }
}
?>
