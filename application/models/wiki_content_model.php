<?php

class Wiki_Content_Model extends CI_Model {

    public $_table = 't_wiki_content';

    function __construct() {
        parent::__construct();
    }

    function getAll() {
        $query = $this->db->query('SELECT * FROM '.$this->_table);
        $resultQuery = $query->result_array();
          
        return $resultQuery;
    }
    
    function getAllData() {
        $this->db->select('cntn.id, cntn.content_data,menu.menu_name')
                ->from($this->_table.' AS cntn')
                ->join('s_wiki_menu AS menu', 'menu.id = cntn.menu_id', 'left');
        $resultQuery = $this->db->get()->result_array();
        return $resultQuery;
    }
    function getByCategory($where = array()) {
        return $this->db->get_where($this->_table, $where)->result_array();
    }
    
    function add($data) {
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }
    
    function update($data) {
        $this->db->where(array('id'=>$data['id']));
        $this->db->update($this->_table, $data);
    }
}