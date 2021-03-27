<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
//        date_default_timezone_set('UTC'); 
        $this->load->helper('url');
        $this->load->model(array('content_model','contact_model','counter_page_model','pelanggan_model','cdr_model'));
    }

    function _remap(){                 
        $segment_2 = $this->uri->segment(2);
        $this->data['menus'] = $this->getAllMenuWeb('header','frontend'); 
        
        
//        if (!isset($this->session->userdata['cstm_id'])) {
//            $this->loginUser();
//        } else {
//            $userName = $this->session->userdata['cstm_name'];
//            $user = $this->pelanggan_model->check_user(array('user_name'=>trim($userName)));
//            $this->data['cstmData'] = $user;
//        }
//        $this->data['cstmData'] = $user;
//        exit;
        $this->data['content'] = 'user/dashboard';
        if($segment_2 =='login') {
            $this->login();
        }else if($segment_2 =='paging') {
            $this->paging();exit;
        }else if($segment_2 =='security') {
            $this->data['content'] = 'user/security';
//            $this->load->view('layout_frontend_user', $this->data);
        }else if($segment_2 =='laporan_rincian') {
            $token = $this->api_login($this->session->userdata('cstm_id'),$this->session->userdata('pass'));
	    print_r($token);exit;
            $cid = substr($this->session->userdata('cstm_id'),2);
            $account = '0'.$cid;
            $voipdb = $this->load->database('voip', TRUE);
            $cdrquery = $voipdb->select('*')->get_where('cdr',array('account'=>$account),$this->_limit);
            $totalDataQuery = $voipdb->select('*')->get_where('cdr',array('account'=>$account));
                //02139700001
            $totalData = $totalDataQuery->result_array();
            $cdrData = $cdrquery->result_array();
            $this->data['dataList'] = $cdrData;
            $this->data['totaldata'] = sizeof($totalData);
            $this->data['pnumber'] = 1;
            $this->data['content'] = 'user/laporan_rincian';
//            $this->load->view('layout_frontend_user', $this->data);
        }else if($segment_2 =='logout') {
                $this->session->unset_userdata('cstm_id');
                $this->session->unset_userdata('cstm_full_name');
                $this->session->unset_userdata('cstm_name');
                $this->session->unset_userdata('cstm_telp');
                $this->session->unset_userdata('pass');
                redirect('/');
        } else if($segment_2 =='change_pass') {
            $oldPassword = $this->input->post('user_pass_old');
            $newPassword = $this->input->post('user_pass');
            $retypePassword = $this->input->post('user_pass_retype');
            if ($newPassword != $retypePassword) {
                $this->data['content'] = 'user/security';
                $this->session->set_flashdata('message_success', 'Password tidak sama');
                redirect('user/security');
            } else {
                $id_user = $this->session->userdata('cstm_id');
                $voipdb = $this->load->database('voip', TRUE);
                
                $voipdb->set('password', md5($newPassword)); //value that used to update column  
                $voipdb->where('cid', $id_user); //which row want to upgrade  
                $flag = $voipdb->update('user');  //table name

                if (!$flag) {
                    $this->session->set_flashdata('message_success', 'Password lama salah');
                } else if($flag){
                    $this->session->set_flashdata('message_success', 'Ganti Password Sukses');
                }
                redirect('user/security');
            }
        }
        
        if($this->session->userdata('cstm_id')){
            $this->load->view('layout_frontend_user', $this->data);
        }else{
//            $this->data['content'] = 'user/login';
            $this->load->view('user/login');
        }
        
        
    }   
    
    function api_login($user,$pass) {
        $response = '';
        $link = 'http://cdrbilling.ofon.co.id/api/apibilling.php';
//        $data = array('command'=>'gettiket',"userid" => $user,'pass'=>md5($pass)); 
        $post = [
            'command' => 'gettiket',
            'userid' => $user,
            'pass'   => md5($pass),
        ];
//        $data_string = json_encode($data);
        $ch = curl_init($link);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");      
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);                                                                  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen($data_string))                                                                       
        );
        if (curl_errno($ch)) {
        // moving to display page to display curl errors
            $info = curl_getinfo($ch);
            curl_close($ch);
            die('error occured during curl exec. Additioanl info: ' . var_export($info));
        } 
        else {
            //getting response from server
            $response = curl_exec($ch);
             print_r(json_decode($response,true));
             curl_close($ch);
        }
        
        return $response;
//        $result = curl_exec($curl);
//        curl_close($curl);
//        // if download failed
//        if ($result === false) {
//            $info = curl_getinfo($curl);
//            curl_close($curl);
//            die('error occured during curl exec. Additioanl info: ' . var_export($info));
//        } else {
//            print_r($result);exit;
//        }
    }
    
    function login() {
        $userName = $this->input->post('cstm_name');
        $pass = $this->input->post('cstm_pass');
        
        $voipdb = $this->load->database('voip', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
        $query = $voipdb->select('*')->get_where('user',array('cid'=>$userName,'password'=>md5($pass)));
        $userData = $query->result_array();
        $pelangganData = array();

        if (sizeof($userData) > 0) {
            //select data pelanggan
            $pelangganQuery = $voipdb->select('*')->get_where('pelanggan',array('cid'=>$userData[0]['cid']));
            $input_session = array('cstm_id' => $userData[0]['cid'],'pass'=>$pass);
            $this->session->set_userdata($input_session);
            $pelangganData = $pelangganQuery->result_array();
        }
        
        if (sizeof($pelangganData) > 0) {
            $input_session = array('cstm_name' => $pelangganData[0]['nama']);
            $this->session->set_userdata($input_session);
            $this->data['cstmData'] = $pelangganData[0];
        }
    }
    function loginUser() {
        $userName = $this->input->post('cstm_name');
        $userPass = $this->input->post('cstm_pass');
        $login = false;
        //checkUserName
        $user = $this->pelanggan_model->check_user(array('user_name'=>trim($userName)));
        if (sizeof($user) > 0) {
            if ($user['user_pass'] == '') {
                //create password temp
                $options = array('cost' => 11);
                $password = password_hash((string)$userPass, PASSWORD_BCRYPT, $options);
                $this->pelanggan_model->update(array('id'=>$user['id'],'user_pass'=>$password));
                $login = true;
            } else {
                if(password_verify($userPass,$user['user_pass'])){
                    $input_session = array('cstm_id' => $user['id'],'cstm_name' => $user['user_name'],
                        'cstm_full_name'=>$user['nama'],'cstm_telp'=>$user['cid']);
                    $this->session->set_userdata($input_session);
                    $login = true;
                    $this->data['cstmData'] = $user;
                }
            }

        }
        //asumsi sukses login
        if ($login) {
            $this->data['content'] = 'user/dashboard';

        }
    }
    
    function paging() {
        $voipdb = $this->load->database('voip', TRUE);
        $whereSearch = array();
        $pnumber = ($this->input->post('pnum')) ? $this->input->post('pnum') : 0;
        $paging = strtolower($this->input->post('page'));
        $limit = $this->input->post('limit');
        $totaldata = $this->input->post('totaldata');
        $searhDesc = $this->input->post('search');
        $page = $limit;
        if ($paging && $paging != '') {
            if ($paging == 'first') {
                $limit = 0;
                $page = $this->_limit;
                $pnumber = 1;
            } else if ($paging == 'last') {
                $limit = $totaldata-10;
                $page = $this->_limit;
                $pnumber = round($totaldata/10);
                
            } else if ($paging == 'next') {
                $page += 10;
                $limit = $page;
                $pnumber = $pnumber+1;
            } else if ($paging == 'prev') {
                if ($limit > 0) {
                    $page -= 10;
                }
                $limit = $page;
                if ($pnumber > 1) {
                    $pnumber = $pnumber-1;
                }
                
            } else {
                $limit = $totaldata;
            }
        } else {
            if ($pnumber > 0){
                $limit = (($this->_limit*$pnumber) - $this->_limit);
            } else if ($pnumber == 0){
                $limit = 0;
            }
        } 

        if ($this->session->userdata('cstm_id')) {
            $cid = substr($this->session->userdata('cstm_id'),2);
            $account = '0'.$cid;
//            $account = '02139700001';
            $whereSearch["account"] = $account;
        }
        if ($searhDesc) {
            $whereSearch["starttime"] = date('Y-m-d',strtotime(str_replace('/','-',$searhDesc)));
        }

        $cdrquery = $voipdb->select('*')->get_where('cdr',$whereSearch,$this->_limit);
        $totalDataQuery = $voipdb->select('*')->get_where('cdr',$whereSearch);
        $totalData = $totalDataQuery->result_array();
        $result = $cdrquery->result_array();
        

        $newData = '';
        if ($result) {
            $newData .= $this->searchTemplate($result,$limit);
        }
        
        $jsonData['result'] = 'success';
        $jsonData['pnumber'] = $pnumber;
        $jsonData['limit'] = $limit;
        $jsonData['totaldata'] = sizeof($totalData);
        $jsonData['template'] = $newData;
        echo json_encode($jsonData,true);
    }

    function searchTemplate($data,$limit) {
        $template = '';
        foreach($data as $index => $value) {
            $template .='<tr class="odd" role="row">
                            <td>'.($limit+1).'</td>
                            <td>'.$value['source'].'</a></td>
                            <td>'.$value['destination'].'</a></td>
                            <td>'.$value['starttime'].'</td>
                            <td>'.$value['stoptime'].'</td>
                            <td>'.$value['label'].'</td>
                            <td>'.$value['duration'].'</td>
                            <td>'.$value['sellcost'].'</td>
                        </tr>';
            $limit++;
        }
        return $template;
    }
    
    function setCounterPage() {
        $this->load->model(array('counter_page_model'));
        $curPage = htmlspecialchars($_SERVER['PHP_SELF']);
        //do not recount if page currently loaded
        if($this->session->userdata('page_counter') != $curPage) {
           //set current page as session variable
           $this->session->set_userdata(array('page_counter'=> $curPage));
            //get current click count for page from database;
            //output error message on failure
           $getCounterPage = $this->counter_page_model->getByCategory(array('page_url'=>$curPage));
//           if (!$getCounterPage) {
               $this->counter_page_model->add(array('page_url'=>$curPage,'page_count'=>1,'page_date'=>date('Y-m-d')));
//           } else if ($getCounterPage){
//               $this->counter_page_model->update(array('page_url'=>$curPage,'page_count'=>$getCounterPage[0]['page_count']+1));
//           }
        }
    }
}
