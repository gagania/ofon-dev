<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {
    public function __construct(){
        parent::__construct();
//        date_default_timezone_set('UTC'); 
        $this->load->helper('url');
        $this->load->model(array('content_model','contact_model','counter_page_model'));
    }

    function _remap(){       
        $segment_1 = $this->uri->segment(1);
        $segment_2 = $this->uri->segment(2);
        $this->data['menus'] = $this->getAllMenuWeb('header','frontend'); 
        $this->load->model(array('news_model','banner_model'));
        
        $contactData  = $this->contact_model->getAll();
        $this->data['contactData'] = $contactData;
        $this->data['content'] = 'product/index';
        
        if($segment_2 == '' && !strpos($segment_1,'.html')){ 

            $this->data['title'] = 'OFON';        
            $this->data['menu_active'] = 'Home'; 
//            $this->data['content'] = 'frontend/index';

            $home = $this->content_model->getByCategory(array('menu_alias'=>'home.html'));
            $about = $this->content_model->getByCategory(array('menu_alias'=>'tentang_ofon.html'));

//            $gallery = $this->gallery_model->getGallery('','',array('publish'=>'1'));
            $banner = $this->banner_model->getAll();
            $this->data['home'] = $home;
            $this->data['about'] = $about;
            $this->data['banner'] = $banner;
//            $this->setCounterPage();
        
            
        } else if ($segment_2 == 'home'){
            $this->data['content'] = 'product/home';
        } else if ($segment_2 == 'business'){
            $this->data['content'] = 'product/business';            
        }else if ($segment_2 == 'corporate'){
            $this->data['content'] = 'product/corporate';
            
        }
        
        $this->load->view('layout_frontend_product', $this->data);
    }   
}