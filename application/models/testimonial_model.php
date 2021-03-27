<?php

class Testimonial_Model extends CI_Model {

    public $_table = 't_testimonial';

    function __construct() {
        parent::__construct();
    }

    function getAll() {
        $query = $this->db->query('SELECT * FROM '.$this->_table.' order by tstm_name ASC');
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
    
    function getTestimonial($limit=0, $offset=0, $where = array(),$condition='',$order = 'ASC'){
        $this->db->select('a.*');
        $this->db->from("$this->_table as a");
        
        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }
        if ($where) {
            foreach($where as $key => $value) {
                if ($value == '') {
                    $this->db->$condition($key, $value);
                }else {
                    if (is_int($value)) {
                        $this->db->where($key, $value);
                    } else {
                        $this->db->or_like($key, $value);
                    }
                    
                }
                
            }
        }
        $this->db->order_by('a.id',$order);
        
        if ($limit != '') {
            $this->db->limit($limit);
        }
        $query = $this->db->get();
//        echo $this->db->last_query();exit;
        return $query->result_array();

    }
}