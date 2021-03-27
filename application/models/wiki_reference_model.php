<?php

class Wiki_Reference_Model extends CI_Model {

    public $_table = 't_wiki_reference';

    function __construct() {
        parent::__construct();
    }

    function getAll() {
        $query = $this->db->query('SELECT * FROM '.$this->_table);
        $resultQuery = $query->result_array();
        return $resultQuery;
    }
    
    function getData($limit=10, $offset = 0, $where=array(),$order='ASC') {
        return $this->getListData($limit, $offset, $where,$order);
    }
    
     function getByCategory($where = array()) {
//        return 
         
         return $this->db->get_where($this->_table, $where)->result_array();
//         echo $this->db->last_query();exit;
    }
    
    function add($data) {
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }
    
    function update($data) {
        $this->db->where(array('id'=>$data['id']));
        $this->db->update($this->_table, $data);
    }
    
    function getWikiReference($where = array()) {
        $this->db->select('a.*,(select count(id) from t_article ar where ar.artc_ctgr_id=a.id) as artc_total');
        $this->db->from("$this->_table as a");
        
        if ($where) {
            foreach($where as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        
        $query = $this->db->get();
        return $query->result_array();
    }
}