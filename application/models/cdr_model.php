<?php

class Cdr_Model extends CI_Model {

    public $_table = 'cdr';

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
        return $this->db->get_where($this->_table, $where)->result();
    }
    
    function getByGroup($groupId) {
        $query1 = $this->db->query("SELECT * FROM ".$this->_table." WHERE FIND_IN_SET('$groupId',user_group)");
        $result = $query1->result_array();
//        $query2 =  $this->db->last_query();
//       echo 'halo = '.$query2;exit;
        return $result;
    }
    
    function check_user($data) {
        $query = $this->db->get_where($this->_table, $data);
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            return $result;
        } else {
            return '';
        }
        
    }

    function add($data) {
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }
    
    function update($data) {
        $this->db->where(array('id'=>$data['id']));
        $this->db->update($this->_table, $data);
    }
    
    function getCdr($limit='', $offset = 0,$where = array()){
        $this->db->select('*');
        $this->db->from("$this->_table as a");
//        $this->db->join('t_event b', 'b.id=a.event_id','LEFT');

        if ($where) {
            foreach($where as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        $this->db->order_by('a.id','ASC');
        
        if ($limit != '') {
            $this->db->limit($limit,$offset);
        }
       
        $query = $this->db->get(); 
        return $query->result_array();

    }
}