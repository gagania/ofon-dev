<?php

class Counter_Page_Model extends CI_Model {

    public $_table = 't_page_counter';

    function __construct() {
        parent::__construct();
    }

    function getAll() {
        $query = $this->db->query('SELECT * FROM '.$this->_table);
        $resultQuery = $query->result_array();
          
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
        $this->db->where(array('page_url'=>$data['page_url']));
        $this->db->update($this->_table, $data);
    }
    
    function getVisit($where=array()) {
        $this->db->select('count(a.page_count) as page_count');
        $this->db->from("$this->_table as a");
        
        if ($where) {
            foreach($where as $key => $value) {
                if ($value == '') {
                    $this->db->where($key);
                } else {
                    $this->db->where($key, $value);
                }
            }
        }
        $query = $this->db->get();
//        echo $this->db->last_query();exit;
        return $query->result_array();
    }
}