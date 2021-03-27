<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('UTC'); 
        $this->load->helper('url');
        $this->load->model(array('contact_model'));
    }

    function index(){
        $this->load->model(array('menu_model'));
        $this->data['menus'] = $this->menu_model->getLeftMenu(0,'header','frontend');
        $this->data['menu_contact'] = 'active';
        $this->data['title'] = 'Contact Us | OFON';                
        $this->data['content'] = 'contact/index';
        $this->data['content_data'] = $this->contact_model->getContent();
        $this->load->view('layout_frontend', $this->data);
        
    }
        
    /* add menu*/
    function edit() { 
        if(isset($this->session->userdata['login'])){
            $this->data['content_data'] = $this->contact_model->getContent();
            $this->data['title'] = 'Edit Company Profile';
            $this->data['content'] = 'contact/edit';
            $this->load->view('layout', $this->data);
        }else{
            redirect('contact/index');
        }
    }
    
    function save() {
        if(isset($this->session->userdata['login'])){
            $postData = $this->input->post(); 
            $postData['address'] = nl2br($postData['address']);
            $this->contact_model->update_content($postData);
            redirect('contact/edit');
        }else{
            redirect('contact/index');
        }
    }
}
?>