<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wiki_Reference extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('UTC'); 
        $this->load->helper('url');
        $this->load->model(array('wiki_reference_model'));
    }
    
    function index(){
        $this->data['title'] = 'Wiki Reference';
        $this->data['content'] = 'wiki_reference/index';
        $this->data['wikiData'] = $this->wiki_reference_model->getData($this->_limit);
        $this->data['totaldata'] = sizeof($this->wiki_reference_model->getAll());
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
        
        $totalData = $this->wiki_reference_model->getData(0,$limit,$whereSearch);
        $result = $this->wiki_reference_model->getData($this->_limit,$limit,$whereSearch);
        
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
                                <td><a href="#" onclick="javascript:add_data(\''.base_url().'\', \''.$this->router->fetch_class().'\', \''.$value['id'].'\');">'.$value['event_name'].'</a></td>
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
            $dataTables = $this->wiki_reference_model->getByCategory($where);
            $this->data['title'] = 'List- Edit';
        }else {
            $this->data['title'] = 'List- Add';
        }
        
        
        
        $this->data['content'] = 'wiki_reference/add';
        
        $this->data['dataRow'] = $dataTables;
        $this->load->view('layout', $this->data);
    }
        
     public function save() {
        if ($this->input->post('btncancel')) {
             redirect('wiki_reference/index');
             return;
        }
        
        $new = true;
        $success =  true;
        $message = 'Data berhasil tersimpan';
        if ($this->input->post('id') && $this->input->post('id') != '') { //edit
            $new = false;
        }
        $postData = $this->input->post();
        if ($new) { // add
            $id = $this->wiki_reference_model->add($postData);
            if (!$id) {
                $success = false;
                $message = 'Data gagal tersimpan';
            }
        } else {
            $postData['id'] = trim($this->input->post('id'));
            $this->wiki_reference_model->update($postData);
        }
        
        redirect('wiki_reference/index');
    }

    function delete() {
        $data = $this->input->post('dataDelete');
        $result = array();
        if (sizeof($data) > 0) {
            foreach($data as $value) {
                $this->wiki_reference_model->delete($this->wiki_reference_model->_table,array('id'=>$value['id']));
            }
            
            $result['success'] = true;
            $result['message'] = 'Data Berhasil di hapus';
            $result['url'] = '';
        }
        echo json_encode($result);
    }
}
