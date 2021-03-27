<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Author extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('UTC'); 
        $this->load->helper('url');
        $this->load->model(array('author_model'));
    }

    
    function index(){
        $this->data['title'] = 'Auhor';
        $this->data['content'] = 'author/index';
//        $data['users'] = $this->util_model->get_all_data('user');
        $this->data['authorData'] = $this->author_model->getData($this->_limit);
        $this->data['totaldata'] = sizeof($this->author_model->getAll());
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
            
            $whereSearch["author_name"] = $searhDesc;
        }
        $totalData = $this->author_model->getData(0,$limit,$whereSearch);
        $result = $this->author_model->getData($this->_limit,$limit,$whereSearch);
        
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
                                <td><a href="#" onclick="javascript:add_data(\''.base_url().'\', \''.$this->router->fetch_class().'\', \''.$value['id'].'\');">'.$value['writer_name'].'</a></td>
                            </tr>';

        }
        return $template;
    }
    
    function add() {
        $dataTables = array();
        $parentName = $this->uri->segment(1);
        if ($this->uri->segment(3)) { //edited
            //get data from database by id
            $where = array();
            $where['id ='] = $this->uri->segment(3);
            $dataTables = $this->author_model->getByCategory($where);
        }
        
        $this->data['title'] = 'Author - Add';
        $this->data['content'] = 'author/add';
                
        $this->data['dataRow'] = $dataTables;
        $this->load->view('layout', $this->data);
    }
    
     public function save() {
        if ($this->input->post('btncancel')) {
             redirect('author/index');
             return;
        }
        
        $postData = array();
        $new = true;
        $success =  true;
        $message = 'Data berhasil tersimpan';
        if ($this->input->post('id') && $this->input->post('id') != '') { //edit
            $new = false;
        }
        $postData = $this->input->post();
        $postData['author_alias'] = str_replace(" ","_",strtolower($postData['author_name'])).'.html';
        if ($new) { // add
            $id = $this->author_model->add($postData);
            if (!$id) {
                $success = false;
                $message = 'Data gagal tersimpan';
            }
        } else {
            $postData['id'] = trim($this->input->post('id'));
            $this->author_model->update($postData);
        }
        
        redirect('author/index');
    }

    function delete() {
        $data = $this->input->post('dataDelete');
        $result = array();
        if (sizeof($data) > 0) {
            foreach($data as $value) {
                $this->author_model->delete($this->author_model->_table,array('id'=>$value['id']));
            }
            
            $result['success'] = true;
            $result['message'] = 'Data Berhasil di hapus';
            $result['url'] = '';
        }
        echo json_encode($result);
    }
        
    function upload(){
//        $this->load->model(array('user_admin_model','lokasi_model','divisi_model','jabatan_model'));
        $fileName= $_FILES['csvdata']['tmp_name'];
        $fh = fopen($fileName, "r");
        $amount = 0;
        $messages = array();
        $start = true;
        
        while (($fields = fgetcsv($fh, 0))) {
            $new = true;
            
            $fields = explode(';', $fields[0]);
//            if ($start) {
//                $start = false;
//                continue;
//            }
            
            $amount++;
            $saveData = array();
            
            $saveData['id'] = null;
            $saveData['author_name'] = trim($fields[0]);
            $alias = trim(preg_replace('/[^A-Za-z0-9\-]/', '_', strtolower($saveData['author_name'])));
            $saveData['author_alias'] = $alias.'.html';
            $saveData['input_date'] = trim($fields[0]);
            $saveData['last_update'] = trim($fields[0]);
            //check lokasi_id
            
            $checkData = $this->author_model->getByCategory(array('author_name'=>$saveData['author_name']));
            if ($checkData) { //update
                $saveData['id'] = $checkData[0]['id'];
                $new = false;
            }
            try {
                if ($new) {                    
                    $this->author_model->add($saveData);
                } else {
                    $this->author_model->update($saveData);
                }
                
            } catch (Exception $e) {
                $messages[] = array('id' => $amount, 'description' => $e->getMessage());
            }
        }

        redirect('author/index');
    }
}
?>