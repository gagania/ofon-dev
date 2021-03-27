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
 * CodeIgniter Model Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/config.html
 */
class CI_Model {

	/**
	 * Constructor
	 *
	 * @access public
	 */
	function __construct()
	{
		log_message('debug', "Model Class Initialized");
	}

	/**
	 * __get
	 *
	 * Allows models to access CI's loaded classes using the same
	 * syntax as controllers.
	 *
	 * @param	string
	 * @access private
	 */
	function __get($key)
	{
		$CI =& get_instance();
		return $CI->$key;
	}
        
        function delete($tableName,$where) {
            $this->db->delete($tableName, $where);
        }
        
        function getListData($limit=10, $offset = 0, $where=array()) {
            $this->db->select("*");
            $this->db->from($this->_table);
        
            if ($limit > 0) {
                $this->db->limit($limit, $offset);
            }

            if ($where && sizeof($where) > 0) {
                foreach($where as $key => $value) {
                    $this->db->like($key, $value);
                }
            }
            
            
            $query = $this->db->get()->result_array();
            return $query;
        }
}
// END Model Class

/* End of file Model.php */
/* Location: ./system/core/Model.php */