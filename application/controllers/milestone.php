<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Milestone extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('UTC'); 
        $this->load->helper('url');
        $this->load->model(array('milestone_model'));
    }

    
    function index(){
        
        $this->data['title'] = 'Milestone';
        $this->data['content'] = 'milestone/index';
//        $data['users'] = $this->util_model->get_all_data('user');
        $this->data['milestoneData'] = $this->milestone_model->getData($this->_limit);
        $this->data['totaldata'] = sizeof($this->milestone_model->getAll());
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
        if ($paging && $paging != '' && $pnumber == 0) {
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
            
            $whereSearch["user_name"] = $searhDesc;
        }
        $totalData = $this->milestone_model->getData(0,$limit,$whereSearch);
        $result = $this->milestone_model->getData($this->_limit,$limit,$whereSearch);
        
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
                                <td><a href="#" onclick="javascript:add_data(\''.base_url().'\', \''.$this->router->fetch_class().'\', \''.$value['id'].'\');">'.$value['news_title'].'</a></td>
                            </tr>';

        }
        return $template;
    }
    
    function add() {
        $dataTables = array();
        if ($this->uri->segment(3)) { //edited
            //get data from database by id
            $where = array();
            $where['id ='] = $this->uri->segment(3);
            $dataTables = $this->milestone_model->getByCategory($where);
        }
        
        
        $this->data['title'] = 'Milestone - Add';
        $this->data['content'] = 'milestone/add';
        
        $this->data['dataRow'] = $dataTables;
        $this->load->view('layout', $this->data);
    }
    
     public function save() {
        if ($this->input->post('btncancel')) {
             redirect('milestone/index');
             return;
        }
        
        $new = true;
        $success =  true;
        $message = 'Data berhasil tersimpan';
        if ($this->input->post('id') && $this->input->post('id') != '') { //edit
            $new = false;
        }
        $alias = '';
        $postData = $this->input->post();
        if ($new) { // add
            unset($postData['id']);
            $id = $this->milestone_model->add($postData);
            if (!$id) {
                $success = false;
                $message = 'Data gagal tersimpan';
            }
        } else {
            $postData['id'] = trim($this->input->post('id'));
            $this->milestone_model->update($postData);
        }
        
        redirect('milestone/index');
    }

    function delete() {
        $data = $this->input->post('dataDelete');
        $result = array();
        if (sizeof($data) > 0) {
            foreach($data as $value) {
                $this->milestone_model->delete($this->milestone_model->_table,array('id'=>$value['id']));
            }
            
            $result['success'] = true;
            $result['message'] = 'Data Berhasil di hapus';
            $result['url'] = '';
        }
        echo json_encode($result);
    }
        
    function upload(){
        $this->load->model(array('user_admin_model','lokasi_model','divisi_model','jabatan_model'));
        $fileName= $_FILES['csvdata']['tmp_name'];
        $fh = fopen($fileName, "r");
        $amount = 0;
        $messages = array();
        $start = true;
        
        while (($fields = fgetcsv($fh, 0))) {
            $new = true;
            
            //$fields = explode('|', $rows[$i]);
            if ($start) {
                $start = false;
                continue;
            }
            
            $amount++;
            $saveData = array();
            
            $saveData['id'] = null;
            $saveData['user_real_name'] = strtoupper(trim($fields[0]));
            //check lokasi_id
            $dataLokasi = $this->lokasi_model->getByCategory(array('lks_name'=>trim($fields[1])));
            $dataDivisi = $this->divisi_model->getByCategory(array('dvs_name'=>strtoupper(trim($fields[2]))));
            $dataJabatan = $this->jabatan_model->getByCategory(array('jbtn_name'=>strtoupper(trim($fields[3]))));
            if ($dataLokasi && sizeof($dataLokasi) > 0) {
                $saveData['user_lokasi_id'] = $dataLokasi[0]->id;
            }
            if ($dataDivisi && sizeof($dataDivisi) > 0) {
                $saveData['user_divisi_id'] = $dataDivisi[0]->id;
            }
            if ($dataJabatan && sizeof($dataJabatan) > 0) {
                $saveData['user_jbtn_id'] = $dataJabatan[0]->id;
            }
            
            $saveData['user_email'] = trim($fields[4]);
            $loginData = explode('@',$saveData['user_email']);
            if($loginData) {
                $saveData['user_name'] = $loginData[0];
            }
            
            $saveData['user_type'] = 'wf';
           
            if ($this->input->post('pass_default') != '') {
                $saveData['user_pass'] = md5($this->input->post('pass_default'));
            }
            
            if ($fields[5] != '') {
                
                $this->load->model(array('group_model'));
                $dataGroup = explode(',',$fields[5]);
                $group = '';
                
                foreach($dataGroup as $value) {
                    $groupCode = $this->group_model->getByCategory(array('group_name'=>strtoupper(trim($value))));
                    if ($groupCode) {
                        if ($group == '') {
                            $group = $groupCode[0]['group_code'];
                        } else {
                            $group .= ','.$groupCode[0]['group_code'];
                        }
                    }
                }
                $saveData['user_group'] = $group;
            } else {
                $saveData['user_group'] = '06';
            }
            $saveData['user_ctgr_wf'] = '1,2';
            $checkData = $this->milestone_model->getByCategory(array('user_name'=>$saveData['user_name']));
            if ($checkData) { //update
                $saveData['id'] = $checkData[0]->id;
                $new = false;
            }
            try {
                if ($new) {                    
                    $this->milestone_model->add($saveData);
                } else {
                    $this->milestone_model->update($saveData);
                }
                
            } catch (Exception $e) {
                $messages[] = array('id' => $amount, 'description' => $e->getMessage());
            }
        }

        redirect('milestone/index');
    }
}
