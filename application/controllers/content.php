<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends MY_Controller {
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('UTC'); 
        $this->load->helper('url');
        $this->load->model(array('content_model')); 
    }

    function index(){
        $this->data['title'] = 'Master Data - Content';
        $this->data['content'] = 'content/index';
        $this->data['contentData'] = $this->content_model->getAllData();
        $this->data['totaldata'] = sizeof($this->content_model->getAll());
        $this->data['pnumber'] = 1;
        $this->load->view('layout', $this->data);
        
    }
    
//    function admin() {
//        $this->data['title'] = 'Master Data - Content';
//        $this->data['content'] = 'content/admin';
//        $this->data['contentData'] = $this->content_model->getAllData();
//        $this->data['totaldata'] = sizeof($this->content_model->getAll());
//        $this->data['pnumber'] = 1;
//        $this->load->view('layout', $this->data);
//    }
    /* add menu*/
    function add() {
        $dataTables = array();
        if ($this->uri->segment(3)) { //edited
            //get data from database by id
            $where = array();
            $where['id ='] = $this->uri->segment(3);
            $dataTables = $this->content_model->getByCategory($where);
            $this->data['title'] = 'Content - Edit';
            //get menu
            $this->data['menuList'] = $this->parentAction($dataTables[0]['menu_alias']);
        } else {
            $this->data['title'] = 'Content - Add';
            //get menu
            $this->data['menuList'] = $this->parentAction();
        }
        
        $this->data['content'] = 'content/add';
        $this->data['dataRow'] = $dataTables;
        $this->load->view('layout', $this->data);
    }
    
    public function parentAction($id=0) {
        $ctgr = 'header';
        $ctgr = array('1'=>'header','2'=>'left');
        $type = 'frontend';
        $result = $this->_printParentSelect($type, $ctgr, $id);
        
        
        return $result;
    }

    private function _printParentSelect($type, $ctgr, $val) {
        $this->load->model(array('menu_model')); 
        $result = '<select style="height:30px; width:198px;" class="app_form_text upper_case" id="menu_alias" name="menu_alias" tabindex="1">';
        if ($ctgr && $type) {
//            $menus = $this->menu_model->getByCategory(array('menu_ctgr'=>$ctgr,'menu_type'=>$type));
            foreach ($ctgr as $value) {
                $menus = $this->getAllMenuWeb($value,'frontend');
            
                if ($menus) {

                    $result .= '<option value="0">---</option>';
                    $result .= $this->_printChild($menus, 1, $val);
                } else {
                    $result .= '<option value="0">---</option>';
                }
            }
            
        }
        
        $result .= '</select>';
        return $result;
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
    
    function save() {
        if ($this->input->post('btncancel')) {
             redirect('content/index');
             return;
        }
        $postData = array();
        $new = true;
        if ($this->input->post('id') && $this->input->post('id') != '') { //edit
            $new = false;
            
        }
        
        
        
        $postData = $this->input->post();
        
        if ($postData['menu_alias'] == '0') {
            redirect('content/add');
            return;
        }
        
        //check content
        $where = array();
        $where['menu_alias'] = $postData['menu_alias'];
        $checkData = $this->content_model->getByCategory($where);
        if ($checkData) {
            
            $new = false;
            $postData['id'] = $checkData[0]['id'];
        }
        
        if ($new) { // add
            $id = $this->content_model->add($postData);
            if (!$id) {
                $success = false;
                $message = 'Data gagal tersimpan';
            }
        } else {
//            $postData['id'] = trim($this->input->post('id'));
            $this->content_model->update($postData);
        }
        
        redirect('content/index');
    }
    /*deleting menus and also deleting ACL by menu id*/
    function delete() {
        $data = $this->input->post('dataDelete');
        $result = array();
        if (sizeof($data) > 0) {
            foreach($data as $value) {
                $this->content_model->delete($this->content_model->_table,array('id'=>$value['id']));
            }
            $result['success'] = true;
            $result['message'] = 'Data Berhasil di hapus';
            $result['url'] = '';
        }
        echo json_encode($result);
    }
}
?>