<?php if ($legislasiList) {
        foreach ($legislasiList as $index => $value) {
            ?>
            <article> 
                <div class="row">
                    <div class="col-sm-11 col-xs-10 meta">
                        <!--<a href="<?php echo base_url().$this->router->fetch_class().'/page/'.$value['prps_alias']; ?>">-->
                            <?php 
                            if (strpos($value['lgls_title'],':') !== false) {                                    
                                $str = explode(":",$value['lgls_title']);
                                echo '<h4>'.$str[0].'</h4><br>';
                                echo '<h3>'.$str[1].'</h3><br>';
                            }else{
                                echo '<h3>'.$value['lgls_title'].'</h3><br>';
                            }

                            ?>
                        <i class="fa fa-calendar"></i><?=date("D M d Y", strtotime($value['lgls_date']))?></p>
                        <p class="intro"><?=$value['lgls_desc']?></p>
                        <a href="#" onclick="javascript:history.back();return false;" class="btn btn-primary pull-right">Back</a>
                </div>
            </article>
<?php if ($value['lgls_file_path'] != '') {?>
            <br/>
            <article> 
                <div class="row">
                    <div class="col-sm-11 col-xs-10 meta">Download Attachments : <a href="<?=base_url().$value['lgls_file_path']?>" target="_blank"><?=$value['lgls_file_name']?></a>
                </div>
            </article>
<?php }
    }
}
?>