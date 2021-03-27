<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_admin extends MY_Controller {
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('UTC'); 
        $this->load->helper('url');
        $this->load->model(array('article_model','article_category_model','comment_model')); 
    }

    function index(){
        $this->data['title'] = 'Master Data - Article';
        $this->data['content'] = 'article_admin/index';
        $where = array();
        if ($this->session->userdata('user_alias')) {
            $where['artc_author_alias'] = $this->session->userdata('user_alias');
        }
        $this->data['articleData'] = $this->article_model->getArticleList($this->_limit,'',$where);
        $this->data['totaldata'] = sizeof($this->article_model->getAll('','',$where));
        $this->data['pnumber'] = 1;
        $this->load->view('layout', $this->data);
        
    }
    
//    function admin() {
//        $this->data['title'] = 'Master Data - Article';
//        $this->data['article'] = 'article/admin';
//        $this->data['articleData'] = $this->article_model->getAllData();
//        $this->data['totaldata'] = sizeof($this->article_model->getAll());
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
            $dataTables = $this->article_model->getByCategory($where);
            $this->data['title'] = 'Article - Edit';
            $dataTables[0]['artc_date'] = date('d-m-Y', strtotime($dataTables[0]['artc_date']));
            if ($dataTables) {
            //comment
                $comments = $this->comment_model->getComment(array('cmmn_artc_alias'=> $dataTables[0]['artc_alias']));
                $this->data['comments'] =$comments;
                $this->data['totaldataComments'] =sizeof($comments);
                $this->data['pnumber'] = 1;
            }
        } 
        $category = $this->article_category_model->getAll();
        $this->data['category'] = $category;
        $this->data['title'] = 'Article - Add';
        $this->data['content'] = 'article_admin/add';
        $this->data['dataRow'] = $dataTables;
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
                $pnumber = 1;
            } else if ($paging == 'last') {
                $limit = $totaldata-10;
                $page = $this->_limit;
                
            } else if ($paging == 'next') {
                $page += 10;
                $limit = $page;
                $pnumber = $pnumber+1;
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
        $totalData = $this->article_model->getArticleList(0,$limit,$whereSearch);
        $result = $this->article_model->getArticleList($this->_limit,$limit,$whereSearch);
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
                                <td><a href="#" onclick="javascript:add_data(\''.base_url().'\',\''.$this->router->fetch_class().'\', \''.$value['id'].'\');">'.(($value['artc_name']== '') ? $value['artc_name_en']:$value['artc_name']).'</a></td>
                                <td>'.(isset($value['artc_ctgr_name']) ? $value['artc_ctgr_name'] : '').'</td>
                                <td>'.(isset($value['artc_date']) ? date('d-m-Y',strtotime($value['artc_date'])) : '').'</td>
                            </tr>';

        }
        return $template;
    }
    
    function save() {
        if ($this->input->post('btncancel')) {
             redirect('article_admin/index');
             return;
        }
        $postData = array();
        $new = true;
        if ($this->input->post('id') && $this->input->post('id') != '') { //edit
            $new = false;
            
        }
        $postData = $this->input->post();
        $alias = trim(preg_replace('/[^A-Za-z0-9\-]/', '_', strtolower($postData['artc_name'])));
        $postData['artc_alias'] = $alias.'.html';
        $postData['artc_date'] = date('Y-m-d',strtotime($postData['artc_date']));
        if ($postData['artc_author_alias'] == '') {
            $postData['artc_author_alias'] = $this->session->userdata('user_alias');
        }
        
        $ext = pathinfo($_FILES['artc_image']['name'], PATHINFO_EXTENSION); 
        if ($ext != '') {
            $this->load->library('upload');
            $files = $_FILES;
            $articleImageName = $_FILES['artc_image']['name'];
            $_FILES['userfile']['name']= $files['artc_image']['name'];
            $_FILES['userfile']['type']= $files['artc_image']['type'];
            $_FILES['userfile']['tmp_name']= $files['artc_image']['tmp_name'];
            $_FILES['userfile']['error']= $files['artc_image']['error'];
            $_FILES['userfile']['size']= $files['artc_image']['size'];
        
            if (!file_exists('./uploaded_file/article')) {
                mkdir('./uploaded_file/article', 0777, true);
            }
            $pathFile = 'uploaded_file/article';
            $this->upload->initialize($this->set_upload_options($articleImageName,$pathFile)); 
            $this->upload->data(); 
            $dataImage = array();
            if ( ! $this->upload->do_upload()){
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                $dataImage = $this->upload->data(); 
            }

            unset($postData['artc_image']);
            $postData['artc_image_path'] = $pathFile.'/'.$dataImage['file_name'];
            $postData['artc_image_name'] = $articleImageName;
            
        }
        
        if (!isset($postData['allow_comment'])){
            $postData['allow_comment'] = 'N';
        }
        if ($new) { // add
            $id = $this->article_model->add($postData);
            if (!$id) {
                $success = false;
                $message = 'Data gagal tersimpan';
            }
        } else {
//            $postData['id'] = trim($this->input->post('id'));
            //compare login with researcher
//            if ($this->session->userdata('user_alias') =='') {
//                
//            }
            $this->article_model->update($postData);
        }
        
        redirect('article_admin/index');
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
    
    /*deleting article*/
    function delete() {
        $data = $this->input->post('dataDelete');
        $result = array();
        if (sizeof($data) > 0) {
            foreach($data as $value) {
                $this->article_model->delete($this->article_model->_table,array('id'=>$value['id']));
            }
            $result['success'] = true;
            $result['message'] = 'Data Berhasil di hapus';
            $result['url'] = '';
        }
        echo json_encode($result);
    }
    
    /*deleting article*/
    function delete_comment() {
        $data = $this->input->post('dataDeleteComment');
        $result = array();
        if (sizeof($data) > 0) {
            foreach($data as $value) {
                $this->comment_model->delete($this->comment_model->_table,array('id'=>$value['id']));
            }
            $result['success'] = true;
            $result['message'] = 'Data Berhasil di hapus';
            $result['url'] = 'add';
        }
        echo json_encode($result);
    }
    
    function publish_comment() {
        $id = $this->input->post('cmmnid');
        $result = array();
        if ($id != '') {
            $data = array();
            $data['id'] = $id;
            $data['cmmn_publish'] = $this->input->post('status');
            $this->comment_model->update($data);
            if ($this->input->post('status') == 0) {
                $temp = '<button class="btn green" onclick="javascript:publish_comment(\''.base_url().'\', \''.$this->router->fetch_class().'\', \''.$id.'\',1);">
                                        Publish 
                                    </button>';
            } else {
                $temp = '<button class="btn green" onclick="javascript:publish_comment(\''.base_url().'\', \''.$this->router->fetch_class().'\', \''.$id.'\',0);">
                                        UnPublish 
                                    </button>';
            }
            $result['htmldata'] = $temp;
        }
        echo json_encode($result);
    }
}
?>