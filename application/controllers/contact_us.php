<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_Us extends CI_Controller {
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('UTC'); 
        $this->load->helper('url');
        $this->load->model(array('contact_model','acl_model','content_model')); 
    }

    function index(){
        $this->load->model(array('menu_model'));
        $this->data['menus'] = $this->getAllMenuWeb('header','frontend');
        $this->data['menu_active'] = 'Contact Us';      
        $this->data['mainMenuLabel'] = strtoupper('Contact Us');
        $this->data['contentLabel'] = '';
        $this->data['title'] = 'Contact Us';                
        $this->data['content'] = 'contact/index';
         $this->data['contentLabelTop'] = 'Contact Us';
        $this->data['kontak'] = $this->contact_model->getContent();
        
        if ($this->uri->segment(2)) {
            $this->sendemail();
        }
        $this->load->view('layout_frontend_contact', $this->data);
        
    }
    
//    function admin() {
//        $this->data['title'] = 'Master Data - Content';
//        $this->data['content'] = 'content/admin';
//        $this->data['contentData'] = $this->content_model->getAllData();
//        $this->data['totaldata'] = sizeof($this->content_model->getAll());
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
            $dataTables = $this->content_model->getByCategory($where);
            $this->data['title'] = 'Content - Edit';
            //get menu
            $this->data['menuList'] = $this->parentAction($dataTables[0]['menu_alias']);
        } else {
            $this->data['title'] = 'Content - Add';
            //get menu
            $this->data['menuList'] = $this->parentAction();
        }
        
        $this->data['content'] = 'content/add';
        $this->data['dataRow'] = $dataTables;
        $this->load->view('layout', $this->data);
    }

    function sendemail() {
        $this->data['first_name'] = $this->input->post('first_name');
        $this->data['last_name'] = $this->input->post('last_name');
        $this->data['email_from'] = $this->input->post('email');
        $this->data['website'] = $this->input->post('website');
        $this->data['message'] = $this->input->post('message');
        $this->data['subject'] = $this->input->post('subject');
        
//        $this->load->library('email'); 
//        $this->email->from('admin@wikagedung.co.id'); 
//        $this->email->to('tukangj4l4n@gmail.com'); 
//        $this->email->subject($subject);  
//
//        $message=$this->load->view('contact/email-template', $this->data, TRUE);
//        $this->email->message($message); 
//        $this->email->send();
        $email_to = 'info@cordovaedupartment.com,h4rh4ry@gmail.com';
        $body = $this->load->view('contact/email-template', $this->data, TRUE);

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <admin@cordovaedupartment.com>' . "\r\n";
        $success = @mail($email_to, $this->data['subject'], $body, $headers);
        redirect('contact_us');
    }
}
?>