<?php
  function menu_child($valueMenus){
    $view_menu = '';
    if( !empty($valueMenus['child'] ) ) { 
        $view_menu .= '<ul class="dropdown-menu">';
        foreach ($valueMenus['child'] as $keyChild => $valueChild) {
            if ($valueChild['menu_web_link'] != '') {         
                  $view_menu .= '<li class="dropdown">';
                  $view_menu .= '<a  href="'.base_url().$valueChild['menu_web_link'].'/'.$valueChild['menu_alias'].'">'.$valueChild['menu_name'].'</a>';
                  $view_menu .= '</li>';
            } else {
               if(!empty($valueChild['child'])){
                  $view_menu .= '<li class="dropdown-submenu"><a href="#">'.$valueChild['menu_name'].'</a>';
                  $view_menu .= '<ul class="dropdown-menu">';
                    foreach ($valueChild['child'] as $keySubChild => $valueSubChild) {
                      $view_menu .= '<li><a tabindex="-1" href="'.base_url().str_replace(' ','_',strtolower($valueMenus['menu_name'])).'/'.$valueSubChild['menu_alias'].'">'.$valueSubChild['menu_name'].'</a></li>';
                    }
                  $view_menu .= '</ul>';
                  $view_menu .= '</li>';
                }else{   
                  $view_menu .= '<li><a href="'.base_url().str_replace(' ','_',strtolower($valueMenus['menu_name'])).'/'.$valueChild['menu_alias'].'">'.$valueChild['menu_name'].'</a></li>';
                }
            }                          
        }
        $view_menu .= '</ul>';
    } else {
        $view_menu .= '<li>';
         if ($valueMenus['menu_web_link'] != '') { 
            $menuLink = explode('/',$valueMenus['menu_web_link']);
            $view_menu .= '<li>';
            $view_menu .= '<a  href="'.base_url().$valueMenus['menu_web_link'].'">'.$valueMenus['menu_name'].'</a>';
            $view_menu .= '</li>';
          } else {
            $view_menu .= '<li><a href="'.base_url().str_replace(".html","",strtolower($valueMenus['menu_alias'])).'/'.$valueMenus['menu_alias'].'">'.$valueMenus['menu_name'].'</a></li>';
          }
    }
    return $view_menu;
  }
?>