<?php

class Author_Model extends CI_Model {

    public $_table = 'm_author';

    function __construct() {
        parent::__construct();
    }

    function getAll() {
        $query = $this->db->query('SELECT * FROM '.$this->_table);
        $resultQuery = $query->result_array();
        return $resultQuery;
    }
    
    function getData($limit=10, $offset = 0, $where=array()) {
        return $this->getListData($limit, $offset, $where);
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
    
    function getBod($limit='',$order = 'ASC', $where = array()){

        $this->db->select('*');
        $this->db->from("$this->_table as a");
        
        if ($where) {
            foreach($where as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        $this->db->order_by('id',$order);
        
        if ($limit != '') {
            $this->db->limit($limit);
        }
        
        $query = $this->db->get();
        return $query->result_array();

    }
}