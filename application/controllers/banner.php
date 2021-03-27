<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends MY_Controller {
    public function __construct(){
        parent::__construct();
        date_default_timezone_set('UTC'); 
        $this->load->helper('url');
        $this->load->model(array('banner_model')); 
    }

    function index(){
        
        $this->data['title'] = 'Banner';
        $this->data['content'] = 'banner/index';
        $this->data['bannerData'] = $this->banner_model->getData($this->_limit);
        $this->data['totaldata'] = sizeof($this->banner_model->getAll());
        $this->data['pnumber'] = 1;
        $this->load->view('layout', $this->data);
    }
        
    function add() {
        $dataTables = array();
        if ($this->uri->segment(3)) { //edited
            //get data from database by id
            $where = array();
            $where['id ='] = $this->uri->segment(3);
            $dataTables = $this->banner_model->getByCategory($where);
        }
        
        
        $this->data['title'] = 'Banner - Add';
        $this->data['content'] = 'banner/add';
        
        $this->data['dataRow'] = $dataTables;
        $this->load->view('layout', $this->data);
    }
    
    
    
    public function save() {
        if ($this->input->post('btncancel')) {
             redirect('banner/index');
             return;
        }
        
        $new = true;
        $success =  true;
        $message = 'Data berhasil tersimpan';
        if ($this->input->post('id') && $this->input->post('id') != '') { //edit
            $new = false;
        }
        $postData = $this->input->post();
        
        $this->load->library('upload');
        $files = $_FILES;
        $ext = pathinfo($_FILES['banner_image']['name'], PATHINFO_EXTENSION); 
        if ($ext != '') {
            $_FILES['userfile']['name']= $files['banner_image']['name'];
            $_FILES['userfile']['type']= $files['banner_image']['type'];
            $_FILES['userfile']['tmp_name']= $files['banner_image']['tmp_name'];
            $_FILES['userfile']['error']= $files['banner_image']['error'];
            $_FILES['userfile']['size']= $files['banner_image']['size'];

            if (!file_exists('./uploaded_file/banner')) {
                mkdir('./uploaded_file/banner', 0777, true);
            }
            $pathFile = 'uploaded_file/banner';
            $this->upload->initialize($this->set_upload_options($files['banner_image']['name'],$pathFile)); 
            $this->upload->data(); 
            $dataImage = array();
            if ( ! $this->upload->do_upload()){
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {
                $dataImage = $this->upload->data(); 
            }

            $postData['image_path'] = $pathFile.'/'.$dataImage['file_name'];
            $postData['image_name'] = $dataImage['file_name'];
        }
        unset($postData['banner_image']);
        
        $postData['desc'] = htmlspecialchars(trim($postData['desc']));
        if ($new) { // add
            $id = $this->banner_model->add($postData);
            if (!$id) {
                $success = false;
                $message = 'Data gagal tersimpan';
            }
        } else {
//            $postData['id'] = trim($this->input->post('id'));
            $this->banner_model->update($postData);
        }
        
        redirect('banner/index');
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
                $this->banner_model->delete($this->banner_model->_table,array('id'=>$value['id']));
            }
            
            $result['success'] = true;
            $result['message'] = 'Data Berhasil di hapus';
            $result['url'] = '';
        }
        echo json_encode($result);
    }
    
    
    function saveImages ($dataImage) { //remove ($dataImage, $type, $eventId)
        $saveData = array();
        foreach($dataImage['files'] as $index => $value) {
            if (is_object($value)){
                $value = (array) $value;
            }
            //check into the database
            $checkData = $this->banner_model->getByCategory(array('image_name'=>$value['name']));
            if (sizeof($checkData) === 0) {
                $ext = $this->searchExtension($value['name']);
                $origName = explode('.'.$ext,$value['name']);
                
                $saveData['orig_name'] = $origName[0];
                $saveData['image_name'] = $value['name'];
                $saveData['upload_date'] = date('Y-m-d');
                $saveData['created_by'] = '';
                $this->banner_model->add($saveData);
            }
        }
    }
    
    function searchExtension($name) {
        $ext = array('jpg','jpeg','png','gif');
        
        foreach($ext as $value) {
            if (strpos($name,$value))
            return $value;
        }
    }
    function upload() {
        $this->load->model(array('banner_model')); 
        
        //save into database
        $upload_handler = new UploadHandler(null,true);
        $this->saveImages($upload_handler->get(false));
//        if ($this->uri->segment(4) && $this->uri->segment(6)) {
//            $upload_handler = new UploadHandler(null,true,$this->uri->segment(4),$this->uri->segment(6));
//            $this->saveImages($upload_handler->get(false),$this->uri->segment(4),$this->uri->segment(6));
//        } 
    }
    
    function getDesc() {
        $this->load->model(array('banner_model')); 
        $imgName = $this->input->post('img_name');
        $desc = '';
        $descData = $this->banner_model->getByCategory(array('image_name'=>$imgName));
        
        if ($descData) {
            $desc = $descData[0]['desc'];
        }
        echo json_encode(array('success'=>true,'desc'=>$desc));
    }
    function saveDesc() {
        $this->load->model(array('banner_model')); 
        $fName =$this->input->post('img_name');
        $desc = nl2br($this->input->post('desc'));
        
        $postData['desc'] = $desc;
        $postData['image_name'] = $fName;
        $this->banner_model->update($postData);
        
        echo json_encode(array('success'=>true,'message'=>'Description saved'));
    }
            
    function deleteImage($eventId = '') {
        
        $this->load->model(array('banner_model'));
        if ($eventId != '') {
            $this->banner_model->delete($this->banner_model->_table,array('event_id'=>$eventId));
                //unlink the image
            $realpath = str_replace("\\", "/", realpath('images'));
            unlink($realpath.'/'.$eventId.'');
            unlink($realpath.'/thumbnail/'.$eventId.'');
        } else {
            $fName  = $this->input->post('img_name');
            $eventId = $this->input->post('eventid');
            $this->banner_model->delete($this->banner_model->_table,array('image_name'=>$fName));
                //unlink the image
            $realpath = str_replace("\\", "/", realpath('images'));
            unlink($realpath.'/banner/'.$fName);
            unlink($realpath.'/thumbnail/banner/'.$fName);
            echo json_encode(array('success'=>true));
        }
        
    }
    
    function publishImage() {
        
        $this->load->model(array('banner_model'));
        
            $eventId = $this->input->post('eventid');
            $checked = $this->input->post('check');
            $where['image_name'] =  $this->input->post('img_name');
            $where['publish'] =  $checked;
            $this->banner_model->update($where);
            
            echo json_encode(array('success'=>true));
        
    }
    
    function moveimage() {
        $this->load->model(array('banner_model'));
        $realpath = str_replace("\\", "/", realpath('images'));
        $role  = $this->input->post('role');
        $fName  = $this->input->post('img_name');
        $oldCtgrId = $this->input->post('oldctgr');
        $newCtgrId = $this->input->post('newctgr');
        $where = array();
        $where['event_id'] = $oldCtgrId;
        $where['image_name'] = $fName;
        $postData['event_id'] = $newCtgrId;
        $this->banner_model->move_image($where,$postData);
        
        // we should check for the folder if exist, if not exist the create the folder
        if (!is_dir($realpath.'/'.$role.'/'.$newCtgrId)) {
            mkdir($realpath.'/'.$role.'/'.$newCtgrId,0755);
        }
        
        if (!is_dir($realpath.'/thumbnail/'.$role.'/'.$newCtgrId)) {
            mkdir($realpath.'/thumbnail/'.$role.'/'.$newCtgrId,0755);
        }
        //copy file in real path
        copy($realpath.'/'.$role.'/'.$oldCtgrId.'/'.$fName, $realpath.'/'.$role.'/'.$newCtgrId.'/'.$fName);
        copy($realpath.'/thumbnail/'.$role.'/'.$oldCtgrId.'/'.$fName, $realpath.'/thumbnail/'.$role.'/'.$newCtgrId.'/'.$fName);
        
        //delete the moved file
        unlink($realpath.'/'.$role.'/'.$oldCtgrId.'/'.$fName);
        unlink($realpath.'/thumbnail/'.$role.'/'.$oldCtgrId.'/'.$fName);
        echo json_encode(array('success'=>true));
    }
    
    function add_photo_category() {
        $this->load->model(array('photo_category_model'));
        $postData = array();
        $new = true;
        if ($this->input->post('id') && $this->input->post('id') != '') { //edit
            $new = false;
            
        }
        $postData = $this->input->post();
        $alias = str_replace(" ","_",strtolower($postData['ctgr_name']));
        $alias = str_replace('"',"",strtolower($alias));
        $alias = str_replace("?","",$alias);
        $alias = str_replace("'","",$alias);
        $alias = str_replace(':',"",$alias);
        $alias = str_replace(',',"",$alias);
        $alias = trim(preg_replace('/\s\s+/', '_', $alias));
        $postData['ctgr_alias'] = $alias.'.html';
        if ($new) { // add
            $id = $this->photo_category_model->add($postData);
            if (!$id) {
                $success = false;
                $message = 'Data gagal tersimpan';
            }
        } else {
            $postData['id'] = trim($this->input->post('id'));
            $this->photo_category_model->update($postData);
        }
        
        redirect('gallery_admin/index');
    }
    
    function delete_photo_category() {
        $eventId = $this->input->post('eventid');
        $this->load->model(array('photo_category_model'));
        $this->photo_category_model->delete($this->photo_category_model->_table,array('id'=>$eventId));
        
        $this->deleteImage($eventId);
    }
}
class UploadHandler
{
    protected $options;
    // PHP File Upload error message codes:
    // http://php.net/manual/en/features.file-upload.errors.php
    protected $error_messages = array(
        1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        3 => 'The uploaded file was only partially uploaded',
        4 => 'No file was uploaded',
        6 => 'Missing a temporary folder',
        7 => 'Failed to write file to disk',
        8 => 'A PHP extension stopped the file upload',
        'post_max_size' => 'The uploaded file exceeds the post_max_size directive in php.ini',
        'max_file_size' => 'File is too big',
        'min_file_size' => 'File is too small',
        'accept_file_types' => 'Filetype not allowed',
        'max_number_of_files' => 'Maximum number of files exceeded',
        'max_width' => 'Image exceeds maximum width',
        'min_width' => 'Image requires a minimum width',
        'max_height' => 'Image exceeds maximum height',
        'min_height' => 'Image requires a minimum height'
    );

    protected $category;
    function __construct($options = null, $initialize = true) {
        $this->options = array(
            'script_url' => $this->get_full_url().'/banner/upload/',
            'upload_dir' => dirname($_SERVER['SCRIPT_FILENAME']).'/images/',
            'upload_url' => $this->get_full_url().'/images/',
            'user_dirs' => false,
            'mkdir_mode' => 0755,
            'param_name' => 'files',
            // Set the following option to 'POST', if your server does not support
            // DELETE requests. This is a parameter sent to the client:
            'delete_type' => 'DELETE',
            'access_control_allow_origin' => '*',
            'access_control_allow_credentials' => false,
            'access_control_allow_methods' => array(
                'OPTIONS',
                'HEAD',
                'GET',
                'POST',
                'PUT',
                'PATCH',
                'DELETE'
            ),
            'access_control_allow_headers' => array(
                'Content-Type',
                'Content-Range',
                'Content-Disposition'
            ),
            // Enable to provide file downloads via GET requests to the PHP script:
            'download_via_php' => false,
            // Defines which files can be displayed inline when downloaded:
            'inline_file_types' => '/\.(gif|jpe?g|png)$/i',
            // Defines which files (based on their names) are accepted for upload:
            'accept_file_types' => '/.+$/i',
            // The php.ini settings upload_max_filesize and post_max_size
            // take precedence over the following max_file_size setting:
            'max_file_size' => null,
            'min_file_size' => 1,
            // The maximum number of files for the upload directory:
            'max_number_of_files' => null,
            // Image resolution restrictions:
            'max_width' => null,
            'max_height' => null,
            'min_width' => 1,
            'min_height' => 1,
            // Set the following option to false to enable resumable uploads:
            'discard_aborted_uploads' => true,
            // Set to true to rotate images based on EXIF meta data, if available:
            'orient_image' => false,
            'image_versions' => array(
                // Uncomment the following version to restrict the size of
                // uploaded images:
                
//                '' => array(
//                    'max_width' => 1354,
//                    'max_height' => 261,
//                    'jpeg_quality' => 95
//                ),
                
// Uncomment the following to create medium sized images:
                
//                'medium' => array(
//                    'max_width' => 800,
//                    'max_height' => 600,
//                    'jpeg_quality' => 80
//                ),
                
                'thumbnail' => array(
                    'max_width' => 280,
                    'max_height' => 280
                )
            )
        );
        if ($options) {
            $this->options = array_merge($this->options, $options);
        }
        
        $this->setCategory('banner');
        
        if ($initialize) {
            $this->initialize();
        }
    }

//    public function getGalleryType() {
//        return $this->type;
//    }
//    
//    public function setGalleryType($gllrType) {
//        $this->type = $gllrType;
//    }
    public function getCategory() {
        return $this->category;
    }
    
    public function setCategory($ctgr) {
        $this->category = $ctgr;
    }
    
    protected function initialize() {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'OPTIONS':
            case 'HEAD':
                $this->head();
                break;
            case 'GET':
                $this->get();
                break;
            case 'PATCH':
            case 'PUT':
            case 'POST':
                $this->post();
                break;
            case 'DELETE':
                $this->delete();
                break;
            default:
                $this->header('HTTP/1.1 405 Method Not Allowed');
        }
    }

    protected function get_full_url() {
        $https = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
        return
            ($https ? 'https://' : 'http://').
            (!empty($_SERVER['REMOTE_USER']) ? $_SERVER['REMOTE_USER'].'@' : '').
            (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ($_SERVER['SERVER_NAME'].
            ($https && $_SERVER['SERVER_PORT'] === 443 ||
            $_SERVER['SERVER_PORT'] === 80 ? '' : ':'.$_SERVER['SERVER_PORT']))).
            substr($_SERVER['SCRIPT_NAME'],0, strrpos($_SERVER['SCRIPT_NAME'], '/'));
    }

    protected function get_user_id() {
        @session_start();
        return session_id();
    }

    protected function get_user_path() {
        if ($this->options['user_dirs']) {
            return $this->get_user_id().'/';
        }
        return '';
    }

    
    protected function get_upload_path($file_name = null, $version = null, $ctgr='') { // erase gllrtype
        $file_name = $file_name ? $file_name : '';
        $version_path = empty($version) ? '' : $version.'/';
        $ctgr = empty($ctgr) ? '' : $ctgr.'/';
//        $gllrType = empty($gllrType) ? '' : $gllrType.'/';
//        return $this->options['upload_dir'].$this->get_user_path().$version_path.$gllrType.$ctgr.$file_name;
        return $this->options['upload_dir'].$this->get_user_path().$version_path.$ctgr.$file_name;
    }

    protected function get_query_separator($url) {
        return strpos($url, '?') === false ? '?' : '&';
    }

    protected function get_download_url($file_name, $version = null) {
        if ($this->options['download_via_php']) {
            $url = $this->options['script_url']
                .$this->get_query_separator($this->options['script_url'])
                .'file='.rawurlencode($file_name);
            if ($version) {
                $url .= '&version='.rawurlencode($version);
            }
            return $url.'&download=1';
        }
        $version_path = empty($version) ? '' : rawurlencode($version).'/';
//        return $this->options['upload_url'].$this->get_user_path()
//            .$version_path.$this->getGalleryType().'/'.$this->getCategory().'/'.rawurlencode($file_name);
        return $this->options['upload_url'].$this->get_user_path()
            .$version_path.$this->getCategory().'/'.rawurlencode($file_name);
    }

    protected function set_file_delete_properties($file) {
        $file->delete_url = $this->options['script_url']
            .$this->get_query_separator($this->options['script_url'])
            .'file='.rawurlencode($file->name);
        $file->delete_type = $this->options['delete_type'];
        if ($file->delete_type !== 'DELETE') {
            $file->delete_url .= '&_method=DELETE';
        }
        if ($this->options['access_control_allow_credentials']) {
            $file->delete_with_credentials = true;
        }
    }

    // Fix for overflowing signed 32 bit integers,
    // works for sizes up to 2^32-1 bytes (4 GiB - 1):
    protected function fix_integer_overflow($size) {
        if ($size < 0) {
            $size += 2.0 * (PHP_INT_MAX + 1);
        }
        return $size;
    }

    protected function get_file_size($file_path, $clear_stat_cache = false) {
        if ($clear_stat_cache) {
            clearstatcache(true, $file_path);
        }
        return $this->fix_integer_overflow(filesize($file_path));

    }

    protected function is_valid_file_object($file_name,$ctgr) { //remove ($file_name,$gllrType,$ctgr)
        $file_path = $this->get_upload_path($file_name,'',$ctgr); //remove ($file_name,$gllrType,$ctgr)
        if (is_file($file_path) && $file_name[0] !== '.') {
            return true;
        }
        return false;
    }

    protected function get_file_object($file_name) {
        if ($this->is_valid_file_object($file_name,$this->getCategory())) { //remove ($file_name,$this->getGalleryType(),$this->getCategory()))
            $file = new stdClass();
            $file->name = $file_name;
            $file->size = $this->get_file_size(
                $this->get_upload_path($file_name,'',$this->getCategory())); //remove ($file_name,'',$this->getGalleryType(),$this->getCategory())
            $file->url = $this->get_download_url($file->name);
            foreach($this->options['image_versions'] as $version => $options) {
               
                if (!empty($version)) {
                    if (is_file($this->get_upload_path($file_name, $version,$this->getCategory()))) { //remove ($file_name, $version,$this->getGalleryType(),$this->getCategory())))
                        $file->{$version.'_url'} = $this->get_download_url(
                            $file->name,
                            $version
                        );
                    }
                }
            }
            $this->set_file_delete_properties($file);
            return $file;
        }
        return null;
    }

    public function get_file_objects($iteration_method = 'get_file_object') {
        $upload_dir = $this->get_upload_path('','',$this->getCategory());  //remove ('','',$this->getGalleryType(),$this->getCategory());
        if (!is_dir($upload_dir)) {
            return array();
        }        
        return array_values(array_filter(array_map(
            array($this, $iteration_method),
            scandir($upload_dir)
        )));
    }

    protected function count_file_objects() {
        return count($this->get_file_objects('is_valid_file_object'));
    }

    protected function create_scaled_image($file_name, $version, $options) {
//        $file_path = $this->get_upload_path($file_name,'',$this->getGalleryType(),$this->getCategory());
        $file_path = $this->get_upload_path($file_name,'',$this->getCategory());
        
        if (!empty($version)) {
//            $version_dir = $this->get_upload_path(null, $version,$this->getGalleryType(),$this->getCategory());
            $version_dir = $this->get_upload_path(null, $version,$this->getCategory());
            if (!is_dir($version_dir)) {
                mkdir($version_dir, $this->options['mkdir_mode'], true);
            }
            $new_file_path = $version_dir.$file_name;
        } else {
            $new_file_path = $file_path;
        }
        list($img_width, $img_height) = @getimagesize($file_path);
        if (!$img_width || !$img_height) {
            return false;
        }
        $scale = min(
            $options['max_width'] / $img_width,
            $options['max_height'] / $img_height
        );
        if ($scale >= 1) {
            if ($file_path !== $new_file_path) {
                return copy($file_path, $new_file_path);
            }
            return true;
        }
        $new_width = $img_width * $scale;
        $new_height = $img_height * $scale;
        $new_img = @imagecreatetruecolor($new_width, $new_height);
        switch (strtolower(substr(strrchr($file_name, '.'), 1))) {
            case 'jpg':
            case 'jpeg':
                $src_img = @imagecreatefromjpeg($file_path);
                $write_image = 'imagejpeg';
                $image_quality = isset($options['jpeg_quality']) ?
                    $options['jpeg_quality'] : 75;
                break;
            case 'gif':
                @imagecolortransparent($new_img, @imagecolorallocate($new_img, 0, 0, 0));
                $src_img = @imagecreatefromgif($file_path);
                $write_image = 'imagegif';
                $image_quality = null;
                break;
            case 'png':
                @imagecolortransparent($new_img, @imagecolorallocate($new_img, 0, 0, 0));
                @imagealphablending($new_img, false);
                @imagesavealpha($new_img, true);
                $src_img = @imagecreatefrompng($file_path);
                $write_image = 'imagepng';
                $image_quality = isset($options['png_quality']) ?
                    $options['png_quality'] : 9;
                break;
            default:
                $src_img = null;
        }
        $success = $src_img && @imagecopyresampled(
            $new_img,
            $src_img,
            0, 0, 0, 0,
            $new_width,
            $new_height,
            $img_width,
            $img_height
        ) && $write_image($new_img, $new_file_path, $image_quality);
        // Free up memory (imagedestroy does not delete files):
        @imagedestroy($src_img);
        @imagedestroy($new_img);
        return $success;
    }

    protected function get_error_message($error) {
        return array_key_exists($error, $this->error_messages) ?
            $this->error_messages[$error] : $error;
    }

    function get_config_bytes($val) {
        $val = trim($val);
        $last = strtolower($val[strlen($val)-1]);
        switch($last) {
            case 'g':
                $val *= 1024;
            case 'm':
                $val *= 1024;
            case 'k':
                $val *= 1024;
        }
        return $this->fix_integer_overflow($val);
    }

    protected function validate($uploaded_file, $file, $error, $index) {
        if ($error) {
            $file->error = $this->get_error_message($error);
            return false;
        }
        $content_length = $this->fix_integer_overflow(intval($_SERVER['CONTENT_LENGTH']));
        $post_max_size = $this->get_config_bytes(ini_get('post_max_size'));
        if ($post_max_size && ($content_length > $post_max_size)) {
            $file->error = $this->get_error_message('post_max_size');
            return false;
        }
        if (!preg_match($this->options['accept_file_types'], $file->name)) {
            $file->error = $this->get_error_message('accept_file_types');
            return false;
        }
        if ($uploaded_file && is_uploaded_file($uploaded_file)) {
            $file_size = $this->get_file_size($uploaded_file);
        } else {
            $file_size = $content_length;
        }
        if ($this->options['max_file_size'] && (
                $file_size > $this->options['max_file_size'] ||
                $file->size > $this->options['max_file_size'])
            ) {
            $file->error = $this->get_error_message('max_file_size');
            return false;
        }
        if ($this->options['min_file_size'] &&
            $file_size < $this->options['min_file_size']) {
            $file->error = $this->get_error_message('min_file_size');
            return false;
        }
        if (is_int($this->options['max_number_of_files']) && (
                $this->count_file_objects() >= $this->options['max_number_of_files'])
            ) {
            $file->error = $this->get_error_message('max_number_of_files');
            return false;
        }
        list($img_width, $img_height) = @getimagesize($uploaded_file);
        if (is_int($img_width)) {
            if ($this->options['max_width'] && $img_width > $this->options['max_width']) {
                $file->error = $this->get_error_message('max_width');
                return false;
            }
            if ($this->options['max_height'] && $img_height > $this->options['max_height']) {
                $file->error = $this->get_error_message('max_height');
                return false;
            }
            if ($this->options['min_width'] && $img_width < $this->options['min_width']) {
                $file->error = $this->get_error_message('min_width');
                return false;
            }
            if ($this->options['min_height'] && $img_height < $this->options['min_height']) {
                $file->error = $this->get_error_message('min_height');
                return false;
            }
        }
        return true;
    }

    protected function upcount_name_callback($matches) {
        $index = isset($matches[1]) ? intval($matches[1]) + 1 : 1;
        $ext = isset($matches[2]) ? $matches[2] : '';
        return ' ('.$index.')'.$ext;
    }

    protected function upcount_name($name) {
        return preg_replace_callback(
            '/(?:(?: \(([\d]+)\))?(\.[^.]+))?$/',
            array($this, 'upcount_name_callback'),
            $name,
            1
        );
    }

    protected function get_unique_filename($name, $type, $index, $content_range) {
        while(is_dir($this->get_upload_path($name,'',$this->getCategory()))) {
            $name = $this->upcount_name($name);
        }
        // Keep an existing filename if this is part of a chunked upload:
        $uploaded_bytes = $this->fix_integer_overflow(intval($content_range[1]));
        while(is_file($this->get_upload_path($name,'',$this->getCategory()))) {
            if ($uploaded_bytes === $this->get_file_size(
                    $this->get_upload_path($name,'',$this->getCategory()))) {
                break;
            }
            $name = $this->upcount_name($name);
        }
        return $name;
    }

    protected function trim_file_name($name, $type, $index, $content_range) {
        // Remove path information and dots around the filename, to prevent uploading
        // into different directories or replacing hidden system files.
        // Also remove control characters and spaces (\x00..\x20) around the filename:
        $name = trim(basename(stripslashes($name)), ".\x00..\x20");
        // Use a timestamp for empty filenames:
        if (!$name) {
            $name = str_replace('.', '-', microtime(true));
        }
        // Add missing file extension for known image types:
        if (strpos($name, '.') === false &&
            preg_match('/^image\/(gif|jpe?g|png)/', $type, $matches)) {
            $name .= '.'.$matches[1];
        }
        return $name;
    }

    protected function get_file_name($name, $type, $index, $content_range) {
        return $this->get_unique_filename(
            $this->trim_file_name($name, $type, $index, $content_range),
            $type,
            $index,
            $content_range
        );
    }

    protected function handle_form_data($file, $index) {
        // Handle form data, e.g. $_REQUEST['description'][$index]
    }

    protected function orient_image($file_path) {
        if (!function_exists('exif_read_data')) {
            return false;
        }
        $exif = @exif_read_data($file_path);
        if ($exif === false) {
            return false;
        }
        $orientation = intval(@$exif['Orientation']);
        if (!in_array($orientation, array(3, 6, 8))) {
            return false;
        }
        $image = @imagecreatefromjpeg($file_path);
        switch ($orientation) {
            case 3:
                $image = @imagerotate($image, 180, 0);
                break;
            case 6:
                $image = @imagerotate($image, 270, 0);
                break;
            case 8:
                $image = @imagerotate($image, 90, 0);
                break;
            default:
                return false;
        }
        $success = imagejpeg($image, $file_path);
        // Free up memory (imagedestroy does not delete files):
        @imagedestroy($image);
        return $success;
    }

    protected function handle_file_upload($uploaded_file, $name, $size, $type, $error,
            $index = null, $content_range = null, $ctgr='') { //remove ($uploaded_file, $name, $size, $type, $error, $index = null, $content_range = null, $gllrType='',$ctgr='')
        //removing single quote
        
        $file = new stdClass();
        $file->name = $this->get_file_name($name, $type, $index, $content_range);
        $file->size = $this->fix_integer_overflow(intval($size));
        $file->type = $type;
        if ($this->validate($uploaded_file, $file, $error, $index)) {
            $this->handle_form_data($file, $index);
            $upload_dir = $this->get_upload_path('','',$ctgr); //remove ('','',$gllrType,$ctgr)
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, $this->options['mkdir_mode'], true);
            }
            $file_path = $this->get_upload_path($file->name,'',$ctgr); //remove ('','',$gllrType,$ctgr)
            $append_file = $content_range && is_file($file_path) &&
                $file->size > $this->get_file_size($file_path);
            if ($uploaded_file && is_uploaded_file($uploaded_file)) {
                // multipart/formdata uploads (POST method uploads)
                if ($append_file) {
                    file_put_contents(
                        $file_path,
                        fopen($uploaded_file, 'r'),
                        FILE_APPEND
                    );
                } else {
                    move_uploaded_file($uploaded_file, $file_path);
                }
            } else {
                // Non-multipart uploads (PUT method support)
                file_put_contents(
                    $file_path,
                    fopen('php://input', 'r'),
                    $append_file ? FILE_APPEND : 0
                );
            }
            $file_size = $this->get_file_size($file_path, $append_file);
            if ($file_size === $file->size) {
                if ($this->options['orient_image']) {
                    $this->orient_image($file_path);
                }
                $file->url = $this->get_download_url($file->name);
                foreach($this->options['image_versions'] as $version => $options) {
                    if ($this->create_scaled_image($file->name, $version, $options)) {
                        if (!empty($version)) {
                            $file->{$version.'_url'} = $this->get_download_url(
                                $file->name,
                                $version
                            );
                        } else {
                            $file_size = $this->get_file_size($file_path, true);
                        }
                    }
                }
            } else if (!$content_range && $this->options['discard_aborted_uploads']) {
                unlink($file_path);
                $file->error = 'abort';
            }
            $file->size = $file_size;
            $this->set_file_delete_properties($file);
        }
        return $file;
    }

    protected function readfile($file_path) {
        return readfile($file_path);
    }

    protected function body($str) {
        echo $str;
    }
    
    protected function header($str) {
        header($str);
    }

    protected function generate_response($content, $print_response = true) {
        if ($print_response) {
            $json = json_encode($content);
            $redirect = isset($_REQUEST['redirect']) ?
                stripslashes($_REQUEST['redirect']) : null;
            if ($redirect) {
                $this->header('Location: '.sprintf($redirect, rawurlencode($json)));
                return;
            }
            $this->head();
            if (isset($_SERVER['HTTP_CONTENT_RANGE'])) {
                $files = isset($content[$this->options['param_name']]) ?
                    $content[$this->options['param_name']] : null;
                if ($files && is_array($files) && is_object($files[0]) && $files[0]->size) {
                    $this->header('Range: 0-'.($this->fix_integer_overflow(intval($files[0]->size)) - 1));
                }
            }
            $this->body($json);
        }
        return $content;
    }

    protected function get_version_param() {
        return isset($_GET['version']) ? basename(stripslashes($_GET['version'])) : null;
    }

    protected function get_file_name_param() {
        return isset($_GET['file']) ? basename(stripslashes($_GET['file'])) : null;
    }

    protected function get_file_type($file_path) {
        switch (strtolower(pathinfo($file_path, PATHINFO_EXTENSION))) {
            case 'jpeg':
            case 'jpg':
                return 'image/jpeg';
            case 'png':
                return 'image/png';
            case 'gif':
                return 'image/gif';
            default:
                return '';
        }
    }

    protected function download() {
        if (!$this->options['download_via_php']) {
            $this->header('HTTP/1.1 403 Forbidden');
            return;
        }
        $file_name = $this->get_file_name_param();
        if ($this->is_valid_file_object($file_name,$this->getCategory())) { //remove ($file_name,$this->getGalleryType(),$this->getCategory()))
            $file_path = $this->get_upload_path($file_name, $this->get_version_param(), $this->getCategory()); //remove ($file_name, $this->get_version_param(), $this->getGalleryType(), $this->getCategory());
            if (is_file($file_path)) {
                if (!preg_match($this->options['inline_file_types'], $file_name)) {
                    $this->header('Content-Description: File Transfer');
                    $this->header('Content-Type: application/octet-stream');
                    $this->header('Content-Disposition: attachment; filename="'.$file_name.'"');
                    $this->header('Content-Transfer-Encoding: binary');
                } else {
                    // Prevent Internet Explorer from MIME-sniffing the content-type:
                    $this->header('X-Content-Type-Options: nosniff');
                    $this->header('Content-Type: '.$this->get_file_type($file_path));
                    $this->header('Content-Disposition: inline; filename="'.$file_name.'"');
                }
                $this->header('Content-Length: '.$this->get_file_size($file_path));
                $this->header('Last-Modified: '.gmdate('D, d M Y H:i:s T', filemtime($file_path)));
                $this->readfile($file_path);
            }
        }
    }

    protected function send_content_type_header() {
        $this->header('Vary: Accept');
        if (isset($_SERVER['HTTP_ACCEPT']) &&
            (strpos($_SERVER['HTTP_ACCEPT'], 'application/json') !== false)) {
            $this->header('Content-type: application/json');
        } else {
            $this->header('Content-type: text/plain');
        }
    }

    protected function send_access_control_headers() {
        $this->header('Access-Control-Allow-Origin: '.$this->options['access_control_allow_origin']);
        $this->header('Access-Control-Allow-Credentials: '
            .($this->options['access_control_allow_credentials'] ? 'true' : 'false'));
        $this->header('Access-Control-Allow-Methods: '
            .implode(', ', $this->options['access_control_allow_methods']));
        $this->header('Access-Control-Allow-Headers: '
            .implode(', ', $this->options['access_control_allow_headers']));
    }

    public function head() {
        $this->header('Pragma: no-cache');
        $this->header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->header('Content-Disposition: inline; filename="files.json"');
        // Prevent Internet Explorer from MIME-sniffing the content-type:
        $this->header('X-Content-Type-Options: nosniff');
        if ($this->options['access_control_allow_origin']) {
            $this->send_access_control_headers();
        }
        $this->send_content_type_header();
    }

    public function get($print_response = true) {
        if ($print_response && isset($_GET['download'])) {
            return $this->download();
        }
        $file_name = $this->get_file_name_param();
        if ($file_name) {
            $response = array(
                substr($this->options['param_name'], 0, -1) => $this->get_file_object($file_name)
            );
        } else {
            $response = array(
                $this->options['param_name'] => $this->get_file_objects()
            );
        }
        return $this->generate_response($response, $print_response);
    }

    public function post($print_response = true) {
        if (isset($_REQUEST['_method']) && $_REQUEST['_method'] === 'DELETE') {
            return $this->delete($print_response);
        }
        $upload = isset($_FILES[$this->options['param_name']]) ?
            $_FILES[$this->options['param_name']] : null;
        // Parse the Content-Disposition header, if available:
        $file_name = isset($_SERVER['HTTP_CONTENT_DISPOSITION']) ?
            rawurldecode(preg_replace(
                '/(^[^"]+")|("$)/',
                '',
                $_SERVER['HTTP_CONTENT_DISPOSITION']
            )) : null;
        // Parse the Content-Range header, which has the following form:
        // Content-Range: bytes 0-524287/2000000
        $content_range = isset($_SERVER['HTTP_CONTENT_RANGE']) ?
            preg_split('/[^0-9]+/', $_SERVER['HTTP_CONTENT_RANGE']) : null;
        $size =  $content_range ? $content_range[3] : null;
        $files = array();
        if ($upload && is_array($upload['tmp_name'])) {
            // param_name is an array identifier like "files[]",
            // $_FILES is a multi-dimensional array:
            foreach ($upload['tmp_name'] as $index => $value) {
                $files[] = $this->handle_file_upload(
                    $upload['tmp_name'][$index],
                    $file_name ? $file_name : str_replace('\'','',$upload['name'][$index]),
                    $size ? $size : $upload['size'][$index],
                    $upload['type'][$index],
                    $upload['error'][$index],
                    $index,
                    $content_range,
//                    $this->getGalleryType() ? $this->getGalleryType() : '', 
                    $this->getCategory() ? $this->getCategory() : ''
                      
                );
            }
        } else {
            // param_name is a single object identifier like "file",
            // $_FILES is a one-dimensional array:
            $files[] = $this->handle_file_upload(
                isset($upload['tmp_name']) ? $upload['tmp_name'] : null,
                $file_name ? $file_name : (isset($upload['name']) ?
                        str_replace('\'','',$upload['name'][$index]) : null),
                $size ? $size : (isset($upload['size']) ?
                        $upload['size'] : $_SERVER['CONTENT_LENGTH']),
                isset($upload['type']) ?
                        $upload['type'] : $_SERVER['CONTENT_TYPE'],
                isset($upload['error']) ? $upload['error'] : null,
                null,
                $content_range,
//                $this->getGalleryType() ? $this->getGalleryType() : '', 
                $this->getCategory() ? $this->getCategory() : ''
            );
        }
        return $this->generate_response(
            array($this->options['param_name'] => $files),
            $print_response
        );
    }

    public function delete($print_response = true) {
        $file_name = $this->get_file_name_param();
        $file_path = $this->get_upload_path($file_name,'',$this->getCategory()); //remove ($file_name,'',$this->getGalleryType(),$this->getCategory());
        $success = is_file($file_path) && $file_name[0] !== '.' && unlink($file_path);
        if ($success) {
            foreach($this->options['image_versions'] as $version => $options) {
                if (!empty($version)) {
//                    $file = $this->get_upload_path($file_name, $version,$this->getGalleryType(),$this->getCategory());
                    $file = $this->get_upload_path($file_name, $version,$this->getCategory());
                    if (is_file($file)) {
                        unlink($file);
                    }
                }
            }
        }
        return $this->generate_response(array('success' => $success), $print_response);
    }

}
?>