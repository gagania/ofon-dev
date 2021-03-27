<?php

class Pelanggan_Model extends CI_Model {

    public $_table = 'pelanggan';

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
    
    function get_data_user($user_id) {
        $this->db->select('a_user.user_name, a_user.user_email');
        $this->db->from('a_user');
        $this->db->where('a_user.id', $user_id);
        $query = $this->db->get();

        return $query->row_array();
    }

    function update_password($oldPassword='', $newPassword, $id_user) {
        $flagPass = false;
        if ($oldPassword != ''){
            $query = $this->db->get_where("$this->_table", array('id' => $id_user));
            $result = $query->row_array();
            if(password_verify($oldPassword,$result['user_pass'])){
                $flagPass = true;
            } else {
                $flagPass = false;
            }
        }
        if ($flagPass) {
            $options = array('cost' => 11);
            $password = password_hash((string)$newPassword, PASSWORD_BCRYPT, $options);
            $this->db->where('id', $id_user);
            $this->db->update("$this->_table", array('user_pass' => $password));
        } 
        
        return $flagPass;
    }

    function updateByProfile($where, $data) {
        $this->db->where($where);
        $this->db->update($this->_table, $data);
    }
}