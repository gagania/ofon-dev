<?php
class User_model extends CI_Model{
    protected $_table = 'a_user';

	  function __construct(){
        parent::__construct();    
  	}

    function getAll() {
        $query = $this->db->query('SELECT * FROM '.$this->_table);
        $resultQuery = $query->result_array();
        return $resultQuery;
    }
    
    function getUserApproval($divisi_id, $lokasi_id){
        $query = $this->db->query('SELECT id, user_name, user_real_name, user_divisi_id, user_lokasi_id FROM a_user WHERE FIND_IN_SET("05", user_group) AND user_divisi_id = '.$divisi_id.' AND user_lokasi_id = '.$lokasi_id);
        return $query->result_array();
    }

        
//        function check_password($encpassword) {
//            return $password===encrypt_password($password);
//        }
        
    function update_password($oldPassword, $newPassword, $id_user){
        $query = $this->db->get_where('a_user', array('id' => $id_user));
        $result = $query->row_array();

        if($result['user_pass'] == md5($oldPassword)){
            $this->db->where('id', $id_user);
            $this->db->update('a_user', array('user_pass' => md5($newPassword)));
            $msg = array('message' => '1'); 
        }else{
             $msg = array('message' => '2'); 
        }
        return $msg;
    }
    
    function update_image($userId, $userImageName){
        $this->db->where('id', $userId);
        $this->db->update('a_user', array('user_image' => $userImageName));
        return array('message' => '1');
    }
}
