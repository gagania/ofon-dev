<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wiki_Menu extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('UTC'); 
        $this->load->helper('url');
        $this->load->model(array('wiki_menu_model'));
    }

    function index(){
            
        $this->data['title'] = 'Wiki - Menu';
        $this->data['content'] = 'wiki_menu/index';
//        $this->data['dataList'] = $this->wiki_menu->getByCategory(array('menu_ctgr'=>'left'));
        $this->data['dataList'] = $this->wiki_menu_model->getMenuData($this->_limit);
        $this->data['totaldata'] = sizeof($this->wiki_menu_model->getMenuData('',''));
        $this->data['pnumber'] = 1;
        $this->load->view('layout', $this->data);
        
    }
        
    function paging() {
        $whereSearch = array();
        $pnumber = ($this->input->post('pnum')) ? $this->input->post('pnum') : 0;
        $paging = strtolower($this->input->post('page'));
        $limit = $this->input->post('limit');
        $totaldata = $this->input->post('totaldata');
        $searhDesc = $this->input->post('search');
        $page = $limit;
        if ($paging && $paging != '') {
            if ($paging == 'first') {
                $limit = 0;
                $page = $this->_limit;
//                $pnumber = 1;
            } else if ($paging == 'last') {
                $limit = $totaldata-10;
                $page = $this->_limit;
                
            } else if ($paging == 'next') {
                $page += 10;
                $limit = $page;
            } else if ($paging == 'prev') {
                if ($limit > 0) {
                    $page -= 10;
                }
                $limit = $page;
            } else {
                $limit = $totaldata;
            }
        } else {
            if ($pnumber > 0){
                $limit = (($this->_limit*$pnumber) - $this->_limit);
            } else if ($pnumber == 0){
                $limit = 0;
            }
        } 
        
        if ($searhDesc) {
            
            $whereSearch["menu_name"] = $searhDesc;
        }
        $totalData = $this->wiki_menu_model->getMenuData(0,$limit,$whereSearch);
        $result = $this->wiki_menu_model->getMenuData($this->_limit,$limit,$whereSearch);
        
        $newData = '';
        if ($result) {
            $newData .= $this->searchTemplate($result);
        }
        
        $jsonData['result'] = 'success';
        $jsonData['pnumber'] = $pnumber;
        $jsonData['limit'] = $limit;
        $jsonData['totaldata'] = sizeof($totalData);
        $jsonData['template'] = $newData;
        echo json_encode($jsonData,true);
    }
    
    function searchTemplate($data) {
        $template = '';
        foreach($data as $index => $value) {
            $template .= '<tr class="odd gradeX">
                                <td><input type="checkbox" class="delcheck" value="'.$value['id'].'" /></td>
                                <td><a href="#" onclick="javascript:add_data(\''.base_url().'\', \''.$this->router->fetch_class().'\', \''.$value['id'].'\');">'.$value['menu_name'].'</a></td>
                                <td>'.$value['parent_name'].'</td>
                            </tr>';
        }
        return $template;
    }
    
    /* add menu*/
    function add() {
        $dataTables = array();
        $menuParent = '';
        if ($this->uri->segment(3)) { //edited
            //get data from database by id
            $where = array();
            $where['id ='] = $this->uri->segment(3);
            $dataTables = $this->wiki_menu_model->getByCategory($where);
            $menuParent = $dataTables[0]['menu_parent'];
            $this->data['title'] = 'Menu - Edit';
        } else {
            $this->data['title'] = 'Menu - Add';
        }
        
        $menuList = $this->getAllMenu();
        $this->data['menuList'] = '<select id="menu_parent" name="menu_parent"><option value="">--PILIH SATU--</option>'.$this->menuSelect($menuList, $menuParent).'</select>';
        $this->data['content'] = 'wiki_menu/add';
        $this->data['dataRow'] = $dataTables;
        $this->load->view('layout', $this->data);
    }
    
    
    
    function save() {
        if ($this->input->post('btncancel')) {
             redirect('wiki_menu/index');
             return;
        }
        $new = true;
        if ($this->input->post('id') && $this->input->post('id') != '') { //edit
            $new = false;
            
        }
        $orderParent = '';
        $postData = $this->input->post();
        //get menu order from parent
        if ($postData['menu_parent'] != '') {
            $parent = $this->wiki_menu_model->getByCategory(array('id'=>$postData['menu_parent']));
            if ($parent) {
                if ($parent[0]['menu_parent'] == 0) {
                    $orderParent = $parent[0]['menu_order'].'.'.$postData['menu_order'];
                } else if ($parent[0]['menu_parent'] > 0) {
                    $orderParent = $parent[0]['menu_number'].'.'.$postData['menu_order'];
                }
            }
        } else {
            $orderParent = $postData['menu_order'];
        }
        
        $postData['menu_number'] = $orderParent;
        $postData['menu_alias'] = trim(preg_replace('/[^A-Za-z0-9\-]/', '_', strtolower($postData['menu_name']))).'.html';
        if ($new) { // add
            $id = $this->wiki_menu_model->add($postData);
            if (!$id) {
                $success = false;
                $message = 'Data gagal tersimpan';
            }
        } else {
            $postData['id'] = trim($this->input->post('id'));
            $this->wiki_menu_model->update($postData);
        }
        
        redirect('wiki_menu/index');
    }
    /*deleting menus and also deleting ACL by menu id*/
    function delete() {
        $data = $this->input->post('dataDelete');
        $result = array();
        if (sizeof($data) > 0) {
            foreach($data as $value) {
                $this->wiki_menu_model->delete($this->wiki_menu_model->_table,array('id'=>$value['id']));
            }
            $result['success'] = true;
            $result['message'] = 'Data Berhasil di hapus';
            $result['url'] = '';
        }
        echo json_encode($result);
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
    
    function menuSelect($data, $select = '', $marker='') {
        if ($data) {
            $selectMenu = '';
            $selected = '';
            foreach($data as $index => $item) {
//                if ($item['menu_parent'] == 0) {
//                    $marker='-';
//                }
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
}
?>