<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group extends MY_Controller {
    protected $_groupType = array(
                   "" =>'--',
                   "wf" =>'dmsolidwood',
                   "cl" =>'Calculator'
    ); 
    protected $_groupLevel = array(
                   "" =>'--',
                   "1" =>'High',
                   "2" =>'Middle',
                   "3" =>'Low'
    ); 
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('UTC'); 
        $this->load->helper('url');
        $this->load->model(array('group_model'));
    }

    function index(){
            
        $this->data['title'] = 'Master Data - Group';
        $this->data['content'] = 'group/index';
        $this->data['groupType'] = $this->_groupType;
        $this->data['groupLevel'] = $this->_groupLevel;
        $this->data['dataList'] = $this->group_model->getAll();
        $this->load->view('layout', $this->data);
        
    }
    
    function auth(){
            
        $this->data['title'] = 'Master Data - Hak Akses Group';
        $this->data['content'] = 'group/auth';
        $this->data['dataList'] = $this->group_model->getAll();
        $this->load->view('layout', $this->data);
        
    }
    
    function auth_edit() {
        $dataTables = array();
        if ($this->uri->segment(3)) { //edited
            //get data from database by id
            $where = array();
            $groupCode = $this->uri->segment(3);
//            $dataTables = $this->calculator_model->getByCategory($where);
            
            $acl = $this->acl_model->getAclDataByRole($groupCode);
            
//            $this->view->topMenu = $this->_makeMenuTable($menuService->getTopMenu(), $acl);
            $this->data['leftMenu'] = $this->_makeMenuTable($this->getAllMenuWeb('left'), $acl);
            $this->data['groupCode'] = $groupCode;
        }
        
        
        
        $this->data['title'] = 'Hak Akses Group - Edit';
        $this->data['content'] = 'group/auth_edit';
        
//        $this->data['dataRow'] = $dataTables;
        $this->load->view('layout', $this->data);
    }
        
    private function _makeMenuTable($menus, $acl, $level = 0) {
        $result = array();
        foreach ($menus as $item) {
            $line = array();
            $line['menu_name'] = '<div style="margin-left: ' . ($level*10) . 'px">' . $item['menu_name'] . '</div>';

            $check = '';
            if (isset($acl['menu' . $item['id']])) {
                $check = 'checked="checked"';
            }
            
            $line['menu_check'] = '<input type="checkbox" name="menuid[]" value="menu'. $item['id'] . '" ' . $check . '>';

            $result[] = $line;

            if (isset($item['child'])) {
                $children = $this->_makeMenuTable($item['child'], $acl, $level + 1);

                $result = array_merge($result, $children);
            }
        }
        return $result;
    }
    
    function save_auth() {
        $group = $this->input->post('group_code');
        $auth = $this->input->post('menuid');
        
        $data = array();
        foreach ($auth as $item) {
            $line = array('acl_resource'=>$item, 'acl_access'=>'*');
//            $line = $this->addBaseData($line);
            $data[] = $line;
        }
        $this->acl_model->saveAcl($group, $data);
        
        redirect('group/auth');
    }
    function save() {
        $postData = array();
        $new = true;
        if ($this->input->post('group_code') && $this->input->post('group_code') != '') { //edit
            $new = false;
            
        }
        $postData = $this->input->post();
        //check the group code first, if exist then update else insert
        $checkCode = $this->group_model->getByCategory(array('group_code'=>$postData['group_code']));
        if ($checkCode) {
            $this->group_model->update($postData);
        } else {
            $this->group_model->add($postData);
        }

        redirect('group/index');
    }
    
    //delete group table and update user table by group_code and delete acl
    function delete() {
        $this->load->model(array('acl_model','user_admin_model'));
        $data = $this->input->post('dataDelete');
        $result = array();
        if (sizeof($data) > 0) {
            foreach($data as $value) {
                //select into user_admin by group
                $dataUser = $this->user_admin_model->getByGroup($value["id"]);
                if ($dataUser) {
                    foreach($dataUser as $indexUser => $valueUser) {
                        $userGroup = explode(',',$valueUser['user_group']);
                        if ($key = array_search($value['id'],$userGroup)) {
                            unset($userGroup[$key]);
                            $userGroup = implode(',',$userGroup);
                            //update user_admin table
                            $this->user_admin_model->update(array('id'=>$valueUser["id"],'user_group'=>$userGroup));
                        }
                    }
                }
                $this->acl_model->delete($this->acl_model->_table,array('acl_role'=>$value["id"]));
                $this->group_model->delete($this->group_model->_table,array('group_code'=>$value["id"]));
            }
            $result['success'] = true;
            $result['message'] = 'Data Berhasil di hapus';
            $result['url'] = '';
        }
        echo json_encode($result);
    }
}
?>