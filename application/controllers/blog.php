<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {
    public function __construct(){
        parent::__construct();
//        date_default_timezone_set('UTC'); 
        $this->load->helper('url');
        $this->load->model(array('article_model','contact_model','comment_model'));
    }

    function _remap(){       
        $segment_1 = $this->uri->segment(1);
        $segment_2 = $this->uri->segment(2);
//        $this->data['menus'] = $this->getAllMenuWeb('header','frontend'); 
        
        $contactData  = $this->contact_model->getAll();
        $this->data['contactData'] = $contactData;
        $recentArticle = $this->article_model->getArticleData('5','',array('a.id'=>$this->uri->segment(3)));
        $this->data['recentArticle'] = $recentArticle;
        
        if($segment_2 == '' && !strpos($segment_1,'.html')){ 

            $this->data['title'] = 'OFON';        
            $this->data['menu_active'] = 'Blog'; 
            $this->data['content'] = 'article_admin/list';

//            $articleCategory = $this->article_category_model->getAll();
//            $latestArticle = $this->article_model->getData(10,'',array(),'DESC'); 

//            $this->data['latestArticle'] = $latestArticle;
//            $this->data['categoryList'] = $this->article_category_model->getArticleByCategory();
            $articleData = $this->article_model->getArticleData(9,'',array(),'DESC');
            $this->data['totaldata'] = sizeof($this->article_model->getArticleData('','',array(),''));
            $pages = ceil($this->data['totaldata']/9);
            //get archieve data
            $this->data['pages'] = $pages;
            $this->data['pnumber'] = 1;
            $this->data['articleData'] = $articleData;
            $this->data['content'] = 'article_admin/list';
                 
        } else {
            if ($this->uri->segment(2) == 'paging') {
                $this->paging();
            } else if ($this->uri->segment(2) == 'detail') {
                $articleData = $this->article_model->getArticleData('','',array('a.id'=>$this->uri->segment(3)));
                $articleData[0]['artc_date'] = date('d F Y', strtotime($articleData[0]['artc_date']));
                $this->data['article'] = $articleData[0];
                $comments = $this->comment_model->getComment(array('cmmn_artc_id'=> $articleData[0]['id']));
                $this->data['comments'] =$comments;
                $this->data['totaldataComments'] =sizeof($comments);
                $this->data['content'] = 'article_admin/detail';
                
            } else if ($this->uri->segment(2) == 'save_comment') {
                $this->save_comment();
            }
        }
        $this->load->view('layout_frontend_blog', $this->data);
    }
    
    function save_comment() {
        $this->load->model(array('comment_model'));
        $data = $this->input->post();
        $data['cmmn_date'] = date('Y-m-d');
        $this->comment_model->add($data);
        
        redirect('blog/detail/'.$data['cmmn_artc_id']);
    }
    
    function paging() {
        $whereSearch = array();
        $paging = strtolower($this->input->post('page'));
//        $ctgrId = $this->input->post('ctgrid');
        if ($paging == 'first') {
            $paging = 0;
        } else if ($paging == 'last') {
            $total = $this->article_model->getArticleData('','');
            $paging = ceil(sizeof($total)/9)-1;
        } else {
            $paging -=1;
        }
        $result = array();
        
//        if ($paging) {
//            if ($paging == 1) {
//                $paging = 0;
//            }
            $result = $this->article_model->getArticleData(9,($paging*9));
//            $totalData = $this->legislasi_model->getByProvince(0,($paging*$this->_limit),$whereSearch,'DESC');
//        }
        
        $newData = '';
        if ($result) {
            $newData .= $this->searchTemplate($result);
            
        }
        
        $jsonData['success'] = true;
        $jsonData['pnum'] = $paging;
//        $jsonData['limit'] = $limit;
//        $jsonData['totaldata'] = sizeof($totalData);
        $jsonData['template'] = $newData;
        echo json_encode($jsonData,true);exit;
    }
    
    function searchTemplate($data) {
        $template = '';
        
        foreach($data as $index => $value) {
            $value['artc_date'] = date('d F Y', strtotime($value['artc_date']));
            $template .='<div class="post-item border" >
            <div class="post-item-wrap">
                <div class="post-image">
                    <a href="#">
                        <img alt="" style="height:308px;" src="'.base_url().$value['artc_image_path'].'">
                    </a>
                    <span class="post-meta-category"><a href="">'.$value['artc_ctgr_name'].'</a></span>
                </div>
                <div class="post-item-description">
                    <span class="post-meta-date"><i class="fa fa-calendar-o"></i>'.$value['artc_date'].'</span>
                    <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>'.$value['cmmnCount'].' Comments</a></span>
                    <h2><a href="#">'.$value['artc_name'].'</a></h2>
                    <div class="col-lg-12" style="margin-bottom:20x;word-wrap:break-word">'.$value['artc_foreword'].'</div>

                    <a href="'.base_url().$this->router->fetch_class().'/detail/'.$value['id'].'" class="item-link">Read More <i class="fa fa-arrow-right"></i></a>

                </div>
            </div>
        </div>';
                            
        }
        return $template;
    }
}