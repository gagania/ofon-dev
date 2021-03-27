<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend extends CI_Controller {
    public function __construct(){
        parent::__construct();
//        date_default_timezone_set('UTC'); 
        $this->load->helper('url');
        $this->load->model(array('content_model','contact_model','counter_page_model','faq_model','link_model',
            'milestone_model','testimonial_model'));
    }

    function _remap(){       
        $segment_1 = $this->uri->segment(1);
        $segment_2 = $this->uri->segment(2);
        $this->data['menus'] = $this->getAllMenuWeb('header','frontend'); 
        $this->load->model(array('news_model','banner_model'));
        
        $contactData  = $this->contact_model->getAll();
        $faqData  = $this->faq_model->getFaq('','');
        $this->data['contactData'] = $contactData;
        $this->data['linkData'] = $this->link_model->getAll();
        $this->data['milestoneData'] = $this->milestone_model->getAll();
        $this->data['testimonialData'] = $this->testimonial_model->getAll();
        $this->data['faqData'] = $faqData;
        $this->data['faqCategory'] = $this->_faq_category;
        
        
        if($segment_2 == '' && !strpos($segment_1,'.html')){ 

            $this->data['title'] = 'OFON';        
            $this->data['menu_active'] = 'Home'; 
            $this->data['content'] = 'frontend/index';

            $home = $this->content_model->getByCategory(array('menu_alias'=>'home.html'));
            $about = $this->content_model->getByCategory(array('menu_alias'=>'tentang_ofon.html'));

//            $gallery = $this->gallery_model->getGallery('','',array('publish'=>'1'));
            $banner = $this->banner_model->getAll();
            $this->data['home'] = $home;
            $this->data['about'] = $about;
            $this->data['banner'] = $banner;
            $this->setCounterPage();
        
            $this->load->view('layout_frontend_home', $this->data);     
        }else{ 

            $upTitle = ucwords($segment_1);
            $this->data['title'] = 'OFON - '.$upTitle;  
            $this->data['menu_active'] = $upTitle;        
            if (strpos($segment_1,'.html')) {
                $menuAlias =  $segment_1;
            } else {
                $menuAlias =  $segment_2;
            }

            $label = str_replace('_', ' ', ucwords($menuAlias));
            $contentLabel = str_replace('.html', '', $label);
            $this->data['contentLabel'] = strtoupper($contentLabel);
            $this->load->model(array('content_model'));
            $this->data['content'] = $this->content_model->getByCategory(array('menu_alias'=>$menuAlias));

            if ($menuAlias =='home.html') {
               $home = $this->content_model->getByCategory(array('menu_alias'=>'home.html'));

//               $gallery = $this->gallery_model->getGallery('','',array('publish'=>'1'));
               $banner = $this->banner_model->getAll();
               $this->data['home'] = $home;
               $this->data['banner'] = $banner;
               $this->load->view('layout_frontend_home', $this->data); 
           } else {
               $this->load->view('layout_frontend_content', $this->data); 
           } 
        }
    }   
    
    function setCounterPage() {
        $this->load->model(array('counter_page_model'));
        $curPage = htmlspecialchars($_SERVER['PHP_SELF']);
        //do not recount if page currently loaded
        if($this->session->userdata('page_counter') != $curPage) {
           //set current page as session variable
           $this->session->set_userdata(array('page_counter'=> $curPage));
            //get current click count for page from database;
            //output error message on failure
           $getCounterPage = $this->counter_page_model->getByCategory(array('page_url'=>$curPage));
//           if (!$getCounterPage) {
               $this->counter_page_model->add(array('page_url'=>$curPage,'page_count'=>1,'page_date'=>date('Y-m-d')));
//           } else if ($getCounterPage){
//               $this->counter_page_model->update(array('page_url'=>$curPage,'page_count'=>$getCounterPage[0]['page_count']+1));
//           }
        }
    }
}