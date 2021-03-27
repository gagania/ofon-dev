<?php
class Banner_Model extends CI_Model{  
    public $_table = 't_banner';
    function __construct(){
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
    
    function move_image($where, $data) {
        $this->db->where($where);
//        $this->db->_compile_select(); 
        $this->db->update($this->_table, $data);
        
    }    
    
    function getRecentUpdate () {
        $this->db->select("gallery.*");
        $this->db->from("$this->_table as gallery");
        $this->db->order_by('gallery.id desc');
        $this->db->limit('6');

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
    
    function getGallery($limit='',$order = 'ASC', $where = array()){
        $this->db->select('*','b.event_alias');
        $this->db->from("$this->_table as a");
        $this->db->join('t_event b', 'b.id=a.event_id','LEFT');

        if ($where) {
            foreach($where as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        $this->db->order_by('a.id',$order);
        
        if ($limit != '') {
            $this->db->limit($limit);
        }
       
        $query = $this->db->get(); 
        return $query->result_array();

    }
}
?>