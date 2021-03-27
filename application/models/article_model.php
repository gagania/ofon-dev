<?php

class Article_Model extends CI_Model {

    public $_table = 't_article';

    function __construct() {
        parent::__construct();
    }

    function getAll() {
        $query = $this->db->query('SELECT * FROM '.$this->_table);
        $resultQuery = $query->result_array();
        return $resultQuery;
    }
    
    function getAllData() {
        $this->db->select('a.*,ctgr.id as idCtgr')
                ->from($this->_table.' AS a')
                ->join('t_article_category AS ctgr', 'ctgr.id = a.artc_ctgr_id', 'left');
        $resultQuery = $this->db->get()->result_array();
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
    
    function getArticleData($limit='', $offset = 0,$where = array(),$order = 'DESC'){

        $this->db->select('a.*,ctgr.artc_ctgr_name,(select count(id) from t_comment cm where cm.cmmn_artc_id=a.id) as cmmnCount');
        $this->db->from("$this->_table as a");
        $this->db->join('t_article_category ctgr','ctgr.id=a.artc_ctgr_id','LEFT');
        $this->db->order_by('a.artc_date',$order);
        
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
    
    function countArticle($where = array()) {
        $this->db->select('count(id) as total,a.id');
        $this->db->from("$this->_table as a");
        
        if ($where) {
            foreach($where as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getArticle($where = array()) {
        $this->db->select('a.*');
        $this->db->from("$this->_table as a");
        $this->db->order_by('artc_date','DESC');
        
        if ($where) {
            foreach($where as $key => $value) {
                $this->db->where($key, $value);
            }
        }
        
        $query = $this->db->get();
        return $query->result_array();
    }
    
    function getArticleList($limit='', $offset=0, $where = array(),$order = 'ASC'){

        $this->db->select('a.*,b.artc_ctgr_name');
        $this->db->from("$this->_table as a");
        $this->db->join('t_article_category b', 'b.id=a.artc_ctgr_id','LEFT');
        
        if ($where) {
            foreach($where as $key => $value) {
                $this->db->like($key, $value);
            }
        }
        $this->db->order_by('a.id',$order);
        
        if ($limit != '') {
            $this->db->limit($limit,$offset);
        }
        $query = $this->db->get();
//        echo $this->db->last_query();
        return $query->result_array();

    }
}