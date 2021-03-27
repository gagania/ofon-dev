<?php
class Contact_Model extends CI_Model{  
    public $_table = 'm_contact';
    function __construct(){
        parent::__construct();    
    }
    
    function getAll() {
        $query = $this->db->query('SELECT * FROM '.$this->_table);
        $resultQuery = $query->result_array();
          
        return $resultQuery;
    }
    
    function getContent() {
        $query = $this->db->query('SELECT * FROM '.$this->_table);
        $resultQuery = $query->result_array();
          
        return $resultQuery;
    }
    
    function update_content($content){
        $this->db->where('id', 1);
        $this->db->update($this->_table, $content);
        return array('message' => '1');
    }
}
?>