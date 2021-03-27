<?php

class Menu_Model extends CI_Model {

    public $_table = 's_menu';

    function __construct() {
        parent::__construct();
    }
        
    function getByCategory($where = array()) {
        return $this->db->get_where($this->_table, $where)->result();
//         echo $this->db->last_query();;exit;
    }
    
    function add($data) {
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }
    
    function update($data) {
        $this->db->where(array('id'=>$data['id']));
        $this->db->update($this->_table, $data);
    }
    
    function getLeftMenu ($parent = 0, $ctgr = 'left', $type='backend') {
        $this->db->select("menu.id, menu.menu_name, menu.is_static,menu.menu_link, menu.menu_web_link, menu.menu_parent, menu.menu_ctgr, menu.menu_order,menu.menu_alias");
        $this->db->from("$this->_table as menu");
        $this->db->where("menu.menu_ctgr = ", $ctgr);
        $this->db->where("menu.menu_parent = ", $parent);
        $this->db->where("menu.menu_active = ", 'Y');
        $this->db->where("menu.menu_type = ", $type);
        $this->db->order_by('menu.menu_order asc');

        // For Analyze
        // echo $this->db->_compile_select();

        // Execute SQL Query
        $query = $this->db->get();

        // Check the result
        if ($query) {
            $resultQuery = $query->result_array();
            return $resultQuery;
        } else {
            $ErrMsg = 'The searched item records requested cannot be retrieved because';
            return false;
        }
    }
    
    function get_data_user($user_id) {
        $this->db->select('user.username, user.status, user.email, user.address, user.telp');
        $this->db->from('user');
        $this->db->where('user.id', $user_id);
        $query = $this->db->get();

        return $query->row_array();
    }
}