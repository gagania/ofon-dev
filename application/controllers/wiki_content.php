<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wiki_Content extends MY_Controller {
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('UTC'); 
        $this->load->helper('url');
        $this->load->model(array('wiki_content_model','wiki_menu_model')); 
    }

    function index(){
        $this->data['title'] = 'Wiki - Content';
        $this->data['content'] = 'wiki_content/index';
        $this->data['contentData'] = $this->wiki_content_model->getAllData();
        $this->data['totaldata'] = sizeof($this->wiki_content_model->getAll());
        $this->data['pnumber'] = 1;
        $this->load->view('layout', $this->data);
        
    }
    
//    function admin() {
//        $this->data['title'] = 'Master Data - Content';
//        $this->data['content'] = 'content/admin';
//        $this->data['contentData'] = $this->wiki_content_model->getAllData();
//        $this->data['totaldata'] = sizeof($this->wiki_content_model->getAll());
//        $this->data['pnumber'] = 1;
//        $this->load->view('layout', $this->data);
//    }
    /* add menu*/
    function add() {
        $dataTables = array();
        $menuParent = '';
        if ($this->uri->segment(3)) { //edited
            //get data from database by id
            $where = array();
            $where['id ='] = $this->uri->segment(3);
            $dataTables = $this->wiki_content_model->getByCategory($where);
            $this->data['title'] = 'Content - Edit';
            //get menu
            $menuParent = $dataTables[0]['menu_id'];
//            $this->data['menuList'] = $this->parentAction($dataTables[0]['menu_alias']);
        } else {
            $this->data['title'] = 'Content - Add';
            //get menu
//            $this->data['menuList'] = $this->parentAction();
        }
        
        $menuList = $this->getAllMenu();
        $this->data['menuList'] = '<select id="menu_id" name="menu_id"><option value="">--PILIH SATU--</option>'.$this->menuSelect($menuList, $menuParent).'</select>';
        $this->data['content'] = 'wiki_content/add';
        $this->data['dataRow'] = $dataTables;
        $this->load->view('layout', $this->data);
    }
    
    public function parentAction($id=0) {
        $result = $this->_printParentSelect($id);
        
        
        return $result;
    }

    private function _printParentSelect($val) {
        $result = '<select style="height:30px; width:198px;" class="app_form_text upper_case" id="menu_id" name="menu_id" tabindex="1">';
//            $menus = $this->menu_model->getByCategory(array('menu_ctgr'=>$ctgr,'menu_type'=>$type));
        foreach ($ctgr as $value) {
            $menus = $this->getAllMenu($value);

            if ($menus) {

                $result .= '<option value="0">---</option>';
                $result .= $this->_printChild($menus, 1, $val);
            } else {
                $result .= '<option value="0">---</option>';
            }
        }
        
        $result .= '</select>';
        return $result;
    }

    function menuSelect($data, $select = '', $marker='-') {
        if ($data) {
            $selectMenu = '';
            $selected = '';
            foreach($data as $index => $item) {
                if ($item['menu_parent'] == 0) {
                    $marker = '-';
                }
                if ($select == $item['id']) {
                    $selected = 'selected=selected';
                } else {
                    $selected = '';
                }
                
                $selectMenu .= '<option value="'.$item['id'].'" '.$selected.'>'.$marker.' '.$item['menu_name'].'</option>';
                if (isset($item['child'])) {
                    $marker .= '-';
                    $selectMenu .= $this->menuSelect($item['child'], $select,  $marker);
                } 
            }
        }
        
        return $selectMenu;
    }
    
    private function _printChild($data, $level = 1, $val = null) {
        $padding = $level * 10;
        $result = '';
        foreach ($data as $item) {
            $selected = '';
            
            if ($val == $item['menu_alias']) {
                $selected = ' selected="selected" ';
               
            }
            $result .= '<option style="margin-left: ' . $padding . 'px" value="' . $item['menu_alias'] . '" '. $selected . '>' . $item['menu_name'] . '</option>';
            if (isset($item['child'])) {
                $result .= $this->_printChild($item['child'], $level + 1, $val);
            }
        }

        return $result;
    }
    
    function getAllMenu() {
        $result = $this->wiki_menu_model->getLeftMenu(0);
        
        $temp = array();
        if (count($result)) {
            foreach($result as $row => $value) {
                //get child
                $temp[] = $value;
                $child = $this->wiki_menu_model->getLeftMenu($value['id']);
                if (count($child)) {
                    foreach($child as $rowChild => $valueChild) {
                        $temp[$row]['child'][] = $valueChild;
                        
                        $childLevel = $this->wiki_menu_model->getLeftMenu($valueChild['id']);
                        if ($childLevel) {
                            foreach($childLevel as $rowChildLevel => $valueChildLevel) {
                                $temp[$row]['child'][$rowChild]['child'][] = $valueChildLevel;
                                $childLevel2 = $this->wiki_menu_model->getLeftMenu($valueChildLevel['id']);
                                if ($childLevel2) {
                                    foreach($childLevel2 as $rowChildLevel2 => $valueChildLevel2) {
                                        $temp[$row]['child'][$rowChild]['child'][$rowChildLevel]['child'][] = $valueChildLevel2;

                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        return $temp;
    }
    
    function save() {
        if ($this->input->post('btncancel')) {
             redirect('wiki_content/index');
             return;
        }
        $new = true;
        if ($this->input->post('id') && $this->input->post('id') != '') { //edit
            $new = false;
            
        }
        
        $postData = $this->input->post();
        if ($postData['menu_id'] == '0') {
            redirect('wiki_content/add');
            return;
        }
        
        //check content
        $where = array();
        $where['menu_id'] = $postData['menu_id'];
        $checkData = $this->wiki_content_model->getByCategory($where);
        if ($checkData) {
            
            $new = false;
            $postData['id'] = $checkData[0]['id'];
        }
        
        if ($new) { // add
            $id = $this->wiki_content_model->add($postData);
            if (!$id) {
                $success = false;
                $message = 'Data gagal tersimpan';
            }
        } else {
//            $postData['id'] = trim($this->input->post('id'));
            $this->wiki_content_model->update($postData);
        }
        
        redirect('wiki_content/index');
    }
    /*deleting menus and also deleting ACL by menu id*/
    function delete() {
        $data = $this->input->post('dataDelete');
        $result = array();
        if (sizeof($data) > 0) {
            foreach($data as $value) {
                $this->wiki_content_model->delete($this->wiki_content_model->_table,array('id'=>$value['id']));
            }
            $result['success'] = true;
            $result['message'] = 'Data Berhasil di hapus';
            $result['url'] = '';
        }
        echo json_encode($result);
    }
}
?>