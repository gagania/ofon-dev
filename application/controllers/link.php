<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Link extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('UTC'); 
        $this->load->helper('url');
        $this->load->model(array('link_model'));
    }

    
    function index() {
        $this->data['title'] = 'Link';
        $this->data['content'] = 'link/index';
//        $data['users'] = $this->util_model->get_all_data('user');
        $this->data['linkData'] = $this->link_model->getData($this->_limit);
        $this->data['totaldata'] = sizeof($this->link_model->getAll());
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
       
        if ($paging && $paging != 'page') {
            if ($paging == 'first') {
                $limit = 0;
                $page = $this->_limit;
                $pnumber = 1;
            } else if ($paging == 'last') {
                $limit = $totaldata-10;
                $page = $this->_limit;
                $pnumber = round($totaldata/10);
            } else if ($paging == 'next') {
                $page += 10;
                $limit = $page;
                $pnumber = $pnumber+1;
            } else if ($paging == 'prev') {
                if ($limit > 0) {
                    $page -= 10;
                }
                $limit = $page;
                if ($pnumber > 1) {
                    $pnumber = $pnumber-1;
                }
            } else {
                $limit = $totaldata;
                if ($pnumber > 1) {
                    $pnumber = 1;
                }
            }
        } else if ($paging == 'page') {
            if ($pnumber > 0){
                $limit = (($this->_limit*$pnumber) - $this->_limit);
            } else if ($pnumber == 0){
                $limit = 0;
            }
        }
        
        if ($searhDesc) {
            
            $whereSearch["ltgs_title"] = $searhDesc;
        }
        $totalData = $this->link_model->getData(0,$limit,$whereSearch);
        $result = $this->link_model->getData($this->_limit,$limit,$whereSearch);
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
                                <td><a href="#" onclick="javascript:add_data(\''.base_url().'\', \''.$this->router->fetch_class().'\', \''.$value['id'].'\');">'.$value['link_file_path'].'</a></td>
                                <td>'.$value['link_url'].'</td>
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
            $dataTables = $this->link_model->getByCategory($where);
        }
        
        
        $this->data['title'] = 'Link - Add';
        $this->data['content'] = 'link/add';
        $this->data['dataRow'] = $dataTables;
        $this->load->view('layout', $this->data);
    }
    
     public function save() {
        if ($this->input->post('btncancel')) {
             redirect('link/index');
             return;
        }
        
        $new = true;
        $success =  true;
        $message = 'Data berhasil tersimpan';
        
        $postData = $this->input->post();
        
        if ($this->input->post('id') && $this->input->post('id') != '') { //edit
            $new = false;
        }
        
        $ext = pathinfo($_FILES['link_image']['name'], PATHINFO_EXTENSION); 
        if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg') {
            $this->load->library('upload');
            $files = $_FILES;
            $fileName = str_replace(".$ext","",$_FILES['link_image']['name']);
            $fileName = str_replace(" ", "_", $fileName).'_'.date('Y-m-d').'.'.$ext;
            $_FILES['userfile']['name']= $files['link_image']['name'];
            $_FILES['userfile']['type']= $files['link_image']['type'];
            $_FILES['userfile']['tmp_name']= $files['link_image']['tmp_name'];
            $_FILES['userfile']['error']= $files['link_image']['error'];
            $_FILES['userfile']['size']= $files['link_image']['size'];

            if (!file_exists('./uploaded_file/link')) {
                mkdir('./uploaded_file/link', 0777, true);
            }
            $pathFile = 'uploaded_file/link';
            $this->upload->initialize($this->set_upload_options($fileName,$pathFile)); 
            $this->upload->data(); 
            if ( ! $this->upload->do_upload()){
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            }
            
            
            $postData['link_file_path'] = $pathFile.'/'.$fileName;
            $postData['link_file_name'] = $fileName;
            if ($postData['link_file_path_old'] != '') {
                if ($postData['link_file_path_old'] !=$postData['link_file_path'] ) { //then delete the old image
                    unlink($postData['link_file_path_old']);
                }
            }
                
        }
        unset($postData['link_file_path_old']);
        if ($new) { // add
	     unset($postData['id']);
            $id = $this->link_model->add($postData);
            if (!$id) {
                $success = false;
                $message = 'Data gagal tersimpan';
            }
            
        } else {
            $id = $postData['id'] = trim($this->input->post('id'));
            $this->link_model->update($postData);
        }
        
        redirect('link/index');
    }

    function set_upload_options($file_name,$pathFile){   
        //  upload an image and document options
        
        $config = array();
        $config['file_name'] = $file_name;
        $config['upload_path'] = './'.$pathFile;
        $config['allowed_types'] = '*';
        $config['max_size'] = '0'; // 0 = no file size limit
        $config['max_width']  = '0';
        $config['max_height']  = '0';
        $config['overwrite'] = TRUE; 

        return $config;
    }
    
    function delete() {
        $data = $this->input->post('dataDelete');
        $result = array();
        if (sizeof($data) > 0) {
            foreach($data as $value) {
                $dataTables = $this->link_model->getByCategory(array('id'=>$value['id']));
                $this->link_model->delete($this->link_model->_table,array('id'=>$value['id']));
                unlink($dataTables[0]['link_file_path']);
            }
            
            $result['success'] = true;
            $result['message'] = 'Data Berhasil di hapus';
            $result['url'] = '';
        }
        echo json_encode($result);
    }
}
?>