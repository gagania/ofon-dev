<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

/*

| -------------------------------------------------------------------

| EMAIL CONFIG

| -------------------------------------------------------------------

| Konfigurasi email keluar melalui mail server

| */  

$config['protocol']='smtp'; 

$config['smtp_host'] = "ssl://arjuna2.spkhost.net";

$config['smtp_port'] = "465";

$config['smtp_user']='info.dmsolidwood@alphasite.indonet.co.id'; 

$config['smtp_pass']='adminW0rkFl0w'; 

$config['charset']='utf-8'; 

$config['newline']="\r\n";

$config['mailtype']="html";

$config['charset']="utf-8";

$config['priority']="1";   

/* End of file email.php */ 

/* Location: ./system/application/config/email.php */