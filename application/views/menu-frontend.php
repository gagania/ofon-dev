<?php
require_once('menu-function.php');
//$lang = '';
//if ($this->session->userdata('lang') != '') {
//    $lang = $this->session->userdata('lang');
//}
//?>
<ul id="menu" class="sf-menu">
    <li><a href="<?=base_url()?>">BERANDA</a></li>
    <?php foreach ($menus as $keyMenus => $valueMenus) {?>
            <?php echo menu_child($valueMenus);
        }?>
    <!--<li><a href="#" class="nav_searchFrom" style="background-color:#40a1c3"><i class="fa fa-search"></i></a></li>-->
</ul>