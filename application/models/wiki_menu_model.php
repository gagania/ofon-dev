<?php

class Wiki_Menu_Model extends CI_Model {

    public $_table = 's_wiki_menu';

    function __construct() {
        parent::__construct();
    }
     
    function getAll() {
        $query = $this->db->query('SELECT * FROM '.$this->_table.' order by id ASC');
        $resultQuery = $query->result_array();
        return $resultQuery;
    }
    
    function getByCategory($where = array()) {
        return $this->db->get_where($this->_table, $where)->result_array();
//         echo $this->db->last_query();;exit;
    }
    
    function getData($limit=10, $offset = 0, $where=array()) {
        return $this->getListData($limit, $offset, $where);
    }
    
    function add($data) {
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }
    
    function update($data) {
        $this->db->where(array('id'=>$data['id']));
        $this->db->update($this->_table, $data);
    }
    
    function getMenuData($limit='', $offset = 0,$where = array(),$order = 'ASC'){

        $this->db->select('a.*,(select menu_name from s_wiki_menu pr where pr.id=a.menu_parent) as parent_name');
        $this->db->from("$this->_table as a");
        $this->db->order_by('a.id',$order);
        
        if ($where) {
            foreach($where as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        
        if ($limit != '') {
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get();
//        echo $this->db->last_query();exit;
        return $query->result_array();
    }
    
    function getLeftMenu ($parent = 0) {
        $this->db->select("menu.id, menu.menu_name, menu.menu_parent, menu.menu_order,menu.menu_alias,menu.menu_number");
        $this->db->from("$this->_table as menu");
        $this->db->where("menu.menu_parent = ", $parent);
//        $this->db->where("menu.menu_active = ", 'Y');
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