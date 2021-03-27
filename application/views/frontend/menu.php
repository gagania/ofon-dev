<div id="navbar-collapse-grid" class="navbar-collapse collapse">
    <ul class="nav navbar-nav" style="margin:10px">
        <li class="<?php if(isset($menu_home)){ echo 'active';}?>"> 
            <a href="<?=base_url()?>frontend"><i class="fa fa-home"></i> Home</a>
        </li>
        <?php if(isset($menus)) { 
            $x = 1;
              foreach($menus as $index =>$value) {  
                  ?>
                <li class="dropdown"> 
                <?php   if($x == 1){
                            $image_icon = 'fa fa-file-image-o';
                        }else if($x == 2){
                            $image_icon = 'fa fa-building-o';
                        }else{
                            $image_icon = 'fa fa-user';
                        }?>
                    
                    <?php
                        if (isset($value['child'])) {?>
                            <a class="dropdown-toggle js-activated" data-toggle="dropdown" href="#"><?=$value['menu_name']?><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                    <?php
                            foreach($value['child'] as $indexChild =>$valueChild) {  ?>
                                
                                <li><a href="<?=base_url().$valueChild['menu_web_link']?>"><i class="<?=$image_icon?>"></i> <?=$valueChild['menu_name']?></a></li>
                                
                <?php       }?>
                            </ul>
                <?php
                        } else {?>
                           <a href="<?=base_url().$value['menu_web_link'].'/'.$value['id']?>"><i class="<?=$image_icon?>"></i> <?=$value['menu_name']?></a>   
                <?php   }
                ?>  
                    
                    
                
                </li>
        <?php 
        $x = $x+1;
        }
        }?>
    </ul>
</div> 