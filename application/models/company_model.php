<?php
class Company_Model extends CI_Model{  
    public $_table = 'm_company';
    function __construct(){
        parent::__construct();    
    }
    
    function getAll() {
        $query = $this->db->query('SELECT * FROM '.$this->_table);
        $resultQuery = $query->result_array();
          
        return $resultQuery;
    }
    
    function getContent() {
        $query = $this->db->query('SELECT content FROM '.$this->_table);
        $resultQuery = $query->result_array();
          
        return $resultQuery;
    }
    
    function update_content($content){
        $this->db->where('id', 1);
        $this->db->update($this->_table, array('content' => $content));
        return array('message' => '1');
    }
}
?>