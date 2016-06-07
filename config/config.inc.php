<?php
error_reporting ( 10 );
define('ADMIN_UID','1');
define ( 'DBHOST', 'localhost');
define ( 'DBNAME', 'www.iyun720.com');
define ( 'DBUSER', 'root');
define ( 'DBPASS', 'Adminiyun720');
define('DBCHARSET','utf8');
define('CHARSET', 'utf-8');
define('DBTYPE','mysql');
define ( 'TABLEPRE', 'iyun_'); 
define('ENCODE_KEY','keke'); 
define('GZIP',TRUE ); 
define('KEKE_DEBUG', 1);    
define("TPL_CACHE",0);   
define('IS_CACHE',0);
define('CACHE_TYPE', 'file');  
define('ADMIN_DIRECTORY','admin');
define('COOKIE_DOMAIN',''); 
define ( 'COOKIE_PATH', ''); 
define('COOKIE_PRE', 'kekeWitkey' );
define('COOKIE_TTL', 0 ); 
define('SESSION_MODULE','files');
define('SYS_START_TIME', time());
$random = explode(' ', microtime());
define("RANDOM_PARA", $random[0]);
define('KEE_IM_URL',"http://localhost/kee");
function_exists ( 'date_default_timezone_set' ) and date_default_timezone_set ( 'PRC' );


