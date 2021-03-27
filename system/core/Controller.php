<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	private static $instance;
        protected $_limit = 10;
        protected $_faq_category = array(''=>'',
                                    '1'=>'Pertanyaan Umum',
                                    '2'=>'Pertanyaan Lainnya');
	/**
	 * Constructor
	 */
	public function __construct()
	{
		self::$instance =& $this;
		
		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');

		$this->load->initialize();
		
		log_message('debug', "Controller Class Initialized");
                
                //get contact data
                $this->load->model(array('contact_model'));
                $this->data['contactData'] = $this->contact_model->getAll();
	}

	public static function &get_instance()
	{
		return self::$instance;
	}
        
        public function encrypt_password($pw) {
            $salt=$this->config->item('secure_salt');
            return crypt($pw, $salt);
        }
        
        function getAllMenuWeb($ctgr,$type = 'backend') {
            $this->load->model(array('menu_model'));
            $result = $this->menu_model->getLeftMenu('',$ctgr,$type);

            $temp = array();
            if (count($result)) {
                foreach($result as $row => $value) {
                    //get child
                    $temp[] = $value;
                    $child = $this->menu_model->getLeftMenu($value['id'],$ctgr,$type);
                    if (count($child)) {
                        foreach($child as $rowChild => $valueChild) {
                            $temp[$row]['child'][] = $valueChild;

                            $childLevel = $this->menu_model->getLeftMenu($valueChild['id'],$ctgr,$type);
                            if ($childLevel) {
                                foreach($childLevel as $rowChildLevel => $valueChildLevel) {
                                    $temp[$row]['child'][$rowChild]['child'][] = $valueChildLevel;
                                }
                            }
                        }
                    }
                }
            }
            return $temp;
        }
        
        public function prepareList($data, $key, $value, $allowNull = false) {
            $result = array();
            if ($allowNull) {
                $result[''] = '-- PILIH SATU --';
            }

            if ($data) {
                if (is_string($value)) {
                    $value = array($value);
                }

                foreach ($data as $item) {

                    if ($item instanceof stdClass) {
                        $item = (array) $item;
                    }

                    if (is_array($key)) {
                        $textKey = '';
                        $flag = false;
                        foreach ($key as $indexKey) {
                            if ($textKey) {
                                $textKey .= '-';
                            }
                            if (isset($indexKey)) {
                                $textKey .= $item[$indexKey];
                            }

                            if (isset($item[$indexKey])) {
                                $flag = true;
                            } else {
                                $flag = false;
                            }
                        }

                        if ($flag) {

                            $text = '';
                            foreach ($value as $val) {
                                if ($text) {
                                    $text .= ' | ';
                                }

                                if (isset($item[$val])) {
                                    $text .= $item[$val];
                                }
                            }
                            $result[$textKey] = $text;
                        }
                    } else {
                        if (isset($item[$key])) {

                            $text = '';
                            foreach ($value as $val) {
                                if ($text) {
                                    $text .= ' | ';
                                }

                                if (isset($item[$val])) {
                                    $text .= $item[$val];
                                }
                            }
                            $result[$item[$key]] = $text;
                        }
                    }
                }
            }

            return $result;
        }
}
// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */