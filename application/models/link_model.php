<?php

class Link_Model extends CI_Model {

    public $_table = 't_link';

    function __construct() {
        parent::__construct();
    }

    function getAll() {
        $query = $this->db->query('SELECT * FROM '.$this->_table);
        $resultQuery = $query->result_array();
        return $resultQuery;
    }
    
    function getData($limit='', $offset = 0, $where=array()) {
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
    
    function getLitigasiData($limit=10, $offset = 0, $where=array(),$order='DESC') {
        $this->db->select('a.*,(select count(ld.ltgs_cntn_parent) from t_litigasi_detail ld where ld.ltgs_cntn_parent = a.id)as detail ');
        $this->db->from("$this->_table as a");
        $this->db->order_by('create_on',$order);
        
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
}