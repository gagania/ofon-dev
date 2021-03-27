<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
    public $data = array();
//    protected $_limit = 10;
    
    protected $menuCtgr = array(''=>'-- PILIH SATU --','header'=>'HEADER',
                                'left'=>'LEFT','right'=>'RIGHT','footer'=>'FOOTER');
    protected $menuType = array(''=>'-- PILIH SATU --','backend'=>'BACKEND',
                                'frontend'=>'FRONTEND');
    protected $languageType = array('id'=>'Indonesia',
                                'en'=>'English');
    
    public function __construct() {
        parent::__construct();
//        date_default_timezone_set('UTC');
        
        $this->load->helper('form');
        $this->load->helper('url');
        $login_status = $this->check_login();
        $this->load->model(array('menu_model', 'acl_model'));
        $this->data['menus'] = $this->getMenus();
    }
    
    function getMenus() {
        $acl = $this->getAcl($this->session->userdata('user_group')); 
        $menus = $this->getAllMenuWeb('left');
        $menuList = $this->getMenuList($menus, $this->session->userdata('user_name'), $acl);
        
        return $menuList;
    }
    
    function getAcl($groups) {
        $groups = str_replace(',', "','", $groups);
        $groups = "'$groups'";
        $aclData = array();
        $acls = $this->acl_model->getAclsMenu($groups);
        if ($acls) {
            foreach($acls as $value){
                $aclData[] = $value['acl_resource'];
            }
            return $aclData;
        } else {
            return '';
        }

    }
    
    public function getMenuList($data, $user, $acl = null) {
        $result = '';
        if ($acl) {
            $checkAcl = false;
            if ($user and $acl) {
                $checkAcl = true;
            }

            
            foreach ($data as $item) {
                $resourceKey = 'menu'. $item['id'];
                if ($checkAcl) {
                    if (!in_array($resourceKey,$acl)) {
                        continue;
                    }
                }

                if (isset($item['child'])) {
                    $result .= '<li class="">
                                <a class="active" href="javascript:;">
                                <i class="icon-sitemap"></i> 
                                <span class="title">'.$item['menu_name'].'</span>
                                <span class="arrow"></span>
                                </a>
                                ';
                    $result .= $this->getMenuListChildren($item['child'], $user, $acl);
                } else {
                    
                    if ($item['menu_link'] != '') {
                        $result .= '<li><a href="'.base_url().$item['menu_link'].'">'.$item['menu_name'].'</a>';
                    } else {
                        $result .= '<li><a href="'.$item['menu_web_link'].'" target="_blank">'.$item['menu_name'].'</a>';
                    }
                }
                $result .= '</li>';
            }
        }
        return $result;
    }
    
    public function getMenuListChildren($data, $user, $acl = null) {
        $checkAcl = false;
        if ($user and $acl) {
            $checkAcl = true;
        }
        
        $result = '<ul class="sub-menu">';
        foreach ($data as $index => $item) {
            
            $resourceKey = 'menu'. $item['id'];
            if ($checkAcl) {
                if (!in_array($resourceKey,$acl)) {
                    continue;
                }
            }

            

            if (isset($item['child'])) {
                $result .= '<li class="">
                            <a class="active" href="'.base_url().$item['menu_link'].'">
                            <i class="icon-sitemap"></i> 
                            <span class="title">'.$item['menu_name'].'</span>
                            <span class="arrow"></span>
                            </a>
                            ';
                $result .= $this->getMenuListChildren($item['child'], $user, $acl);
            } else {
                if ($item['menu_link'] != '') {
                    $result .= '<li><a href="'.base_url().$item['menu_link'].'">'.$item['menu_name'].'</a>';
                } else {
                    $result .= '<li><a href="'.$item['menu_web_link'].'">'.$item['menu_name'].'</a>';
                }
                
            }
            $result .= '</li>';
        }
        $result .= '</ul>';
        
        return $result;
    }
    
    function getAllMenuWeb($ctgr,$type = 'backend') {
        $result = $this->menu_model->getLeftMenu(0,$ctgr,$type);
        
        $temp = array();
        if (count($result)) {
            foreach($result as $row => $value) {
                //get child
                $temp[] = $value;
                $child = $this->menu_model->getLeftMenu($value['id'],$ctgr,$type);
                if (count($child)) {
                    foreach($child as $rowChild => $valueChild) {
                        $temp[$row]['child'][] = $valueChild;
                        
                        $childLevel = $this->menu_model->getLeftMenu($valueChild['id'],$ctgr,$type);
                        if ($childLevel) {
                            foreach($childLevel as $rowChildLevel => $valueChildLevel) {
                                $temp[$row]['child'][$rowChild]['child'][] = '     '.$valueChildLevel;
                            }
                        }
                    }
                }
            }
        }
        return $temp;
    }
    
    function getChildMenu($id,$ctgr,$type) {
        $child = $this->menu_model->getLeftMenu($id,$ctgr,$type);
        if (count($child)) {
            foreach($child as $rowChild => $valueChild) {
                $temp[$row]['child'][] = $valueChild;

                $childLevel = $this->menu_model->getLeftMenu($valueChild['id'],$ctgr);
                if ($childLevel) {
                    foreach($childLevel as $rowChildLevel => $valueChildLevel) {
                        $temp[$row]['child'][$rowChild]['child'][] = $valueChildLevel;
                    }
                }
            }
        }
    }
    
    function check_login() {
        
        if ($this->session->userdata('login') == TRUE) {
            return TRUE;
        } else {
            redirect('/login/index');
        }
    }   
}