<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('UTC'); 
        $this->load->helper('url');
        $this->load->model(array('menu_model'));
    }

    function index(){
            
        $this->data['title'] = 'Master Data - Menu';
        $this->data['content'] = 'menu/index';
//        $this->data['dataList'] = $this->menu_model->getByCategory(array('menu_ctgr'=>'left'));
        $this->data['dataList'] = $this->menu_model->getByCategory();
        $this->load->view('layout', $this->data);
        
    }
        
    /* add menu*/
    function add() {
        $dataTables = array();
        $menuParent = '';
        if ($this->uri->segment(3)) { //edited
            //get data from database by id
            $where = array();
            $where['id ='] = $this->uri->segment(3);
            $dataTables = $this->menu_model->getByCategory($where);
            $menuParent = $dataTables[0]->menu_parent;
            $this->data['title'] = 'Menu - Edit';
        } else {
            $this->data['title'] = 'Menu - Add';
        }
        
        //get jenis jaminan
        $menuList = array_merge($this->getAllMenuWeb('left'),$this->getAllMenuWeb('header','frontend'));
        $this->data['menuType'] = $this->menuType;
        $this->data['menuCtgr'] = $this->menuCtgr;
        $this->data['menuList'] = '<select id="menu_parent" name="menu_parent"><option value="">--PILIH SATU--</option>'.$this->menuSelect($menuList, $menuParent).'</select>';
        $this->data['content'] = 'menu/add';
        $this->data['dataRow'] = $dataTables;
        $this->load->view('layout', $this->data);
    }
    
    
    
    function save() {
        $postData = array();
        $new = true;
        if ($this->input->post('id') && $this->input->post('id') != '') { //edit
            $new = false;
            
        }
        $postData = $this->input->post();
        
        if (!isset($postData['menu_active'])) {
            $postData['menu_active'] = 'N';
        }
        
        if (!isset($postData['is_static'])) {
            $postData['is_static'] = 'N';
        }
        $postData['menu_alias'] = trim(preg_replace('/[^A-Za-z0-9\-]/', '_', strtolower($postData['menu_name']))).'.html';
        if ($new) { // add
            $id = $this->menu_model->add($postData);
            if (!$id) {
                $success = false;
                $message = 'Data gagal tersimpan';
            }
        } else {
            $postData['id'] = trim($this->input->post('id'));
            $this->menu_model->update($postData);
        }
        
        redirect('menu/index');
    }
    /*deleting menus and also deleting ACL by menu id*/
    function delete() {
        $this->load->model(array('acl_model'));
        $data = $this->input->post('dataDelete');
        $result = array();
        if (sizeof($data) > 0) {
            foreach($data as $value) {
                $this->menu_model->delete($this->menu_model->_table,array('id'=>$value['id']));
                $this->acl_model->delete($this->acl_model->_table,array('acl_resource'=>'menu'.$value['id']));
            }
            $result['success'] = true;
            $result['message'] = 'Data Berhasil di hapus';
            $result['url'] = '';
        }
        echo json_encode($result);
    }
    
    function menuSelect($data, $select = '', $margin=0) {
        if ($data) {
            $selectMenu = '';
            $selected = '';
            foreach($data as $index => $item) {
                if ($item['menu_parent'] == 0) {
                    $margin = 0;
                }
                if ($select == $item['id']) {
                    $selected = 'selected=selected';
                } else {
                    $selected = '';
                }
                
                $selectMenu .= '<option value="'.$item['id'].'" '.$selected.' style="margin-left:'.$margin.'px;">'.$item['menu_name'].'</option>';
                if (isset($item['child'])) {
                    $margin += 10;
                    $selectMenu .= $this->menuSelect($item['child'], $select,  $margin);
                    $margin -= 10;
                } 
            }
        }
        
        return $selectMenu;
    }
}
?>