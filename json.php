<?php
define ( "IN_KEKE", TRUE );
include 'app_comm.php';
$task_open = $kekezu->_task_open;
$shop_open = $kekezu->_shop_open;
$dos = $kekezu->route_output();//改造
$configDatas = db_factory::query("SELECT * from iyun_config");
$configs = [];
foreach($configDatas as $k=>$v){
	$configs[$v['ckey']] = $v['cvalue'];
}
//$dos = $kekezu->_route;
(! empty ( $do ) && (in_array ( $do, $dos ) || file_exists('json_control/' . $do . '.php'))) and $do or (! $_GET && ! $_POST and $do = $kekezu->_sys_config ['set_index'] or $do = 'index');
if(stristr($_SERVER["REQUEST_URI"],"index.html")){
	$do=index;
}
if($configs['view_wait'] == 1 && $do != 'login' && $do != 'user'){
	header("Location: /wait.php");
}
if($configs['login_wait'] == 1 && $do == 'login'){
	header("Location: /wait.php");
}
if($configs['user_wait'] == 1 && $do == 'user'){
	header("Location: /wait.php");
}
isset ( $m ) && $m == "user" and $do = "avatar";
keke_lang_class::package_init ( "index" );
keke_lang_class::loadlang ( $do );
$kekezu->init_lang ();
$strPageKeyword = $kekezu->_sys_config ['seo_keyword'];
$strPageDescription = $kekezu->_sys_config ['seo_desc'];
$strWebLogo = $kekezu->_sys_config ['web_logo'];
$gUid = $uid = intval ( $kekezu->_uid );
$gUsername = $username = $kekezu->_username;
$messagecount = kekezu::getmessagecount($uid);
$gUserInfo = $user_info = $kekezu->_userinfo;
$indus_p_arr = $kekezu->_indus_p_arr;
$indus_c_arr = $kekezu->_indus_c_arr;
$indus_arr = $kekezu->_indus_arr;
$indus_task_arr = $kekezu->_indus_task_arr;
$indus_goods_arr = $kekezu->_indus_goods_arr;
$arrModelList = $model_list = $kekezu->_model_list;
$nav_arr = kekezu::nav_list ( $kekezu->_nav_list ); 
$lang_list = $kekezu->_lang_list;
$language = $kekezu->_lang;
$currency = $kekezu->_currency; 
$curr_list = $kekezu->_curr_list; 
$api_open = $kekezu->_api_open;
$weibo_list = $kekezu->_weibo_list;
$f_c_list = keke_curren_class::get_curr_list ( 'code,title' );
$_currencies = keke_curren_class::get_curr_list ();
$_footerAbouts = CommonClass::getFooterPage();
$log_account = null;
if (isset ( $_COOKIE ['log_account'] )) {
	$log_account = $_COOKIE ['log_account'];
}
$wb_type = $_SESSION ['wb_type'];
if ($wb_type && $_SESSION ['auth_' . $wb_type] ['last_key']) {
	$oa = new keke_oauth_login_class ( $wb_type );
	$oauth_user_info = $oa->get_login_user_info ();
}
if(intval($u)){
	if(!isset ( $_COOKIE ['prom'] )){
		$objProm = keke_prom_class::get_instance ();
		$objProm->create_prom_cookie ( $_SERVER ['QUERY_STRING'] );
	}
}
$arrTopIndus = db_factory::query("SELECT count(task_id) as count ,indus_id FROM  ".TABLEPRE."witkey_task where task_status>=2 group by indus_id order by count desc limit 5");
kekezu::redirect_second_domain ();
$arrDisplaypro = CommonClass::getDistrictByPid('0','id,upid,name');
if($gUid){
    $intWaitPay = db_factory::query("select count(*) as count from ".TABLEPRE."witkey_task where uid=".intval($gUid)." and task_status=0");
    $intChoose = db_factory::query("select count(*) as count from ".TABLEPRE."witkey_task where uid=".intval($gUid)." and task_status=3");
    $intShopPay = db_factory::query("select count(*) as count from ".TABLEPRE."witkey_order a left join ".TABLEPRE."witkey_order_detail b on a.order_id=b.order_id
		 where a.order_uid=".intval($gUid)." and a.order_status='wait' and b.obj_type='service'");
    $intMarkG=db_factory::execute("select * from ".TABLEPRE."witkey_mark where mark_status=0 and mark_type=2 and by_uid=".intval($gUid));
    $intMarkW=db_factory::execute("select * from ".TABLEPRE."witkey_mark where mark_status=0 and mark_type=1 and by_uid=".intval($gUid));
    $intService = db_factory::get_count("SELECT COUNT(*) as count2 FROM `".TABLEPRE."witkey_order` AS a  LEFT JOIN ".TABLEPRE."witkey_order_detail AS b ON a.order_id = b.order_id  LEFT JOIN ".TABLEPRE."witkey_service_order AS c ON b.order_id = c.order_id  WHERE  1=1  and a.seller_uid = ".$gUid." and b.obj_type = 'service' and a.order_status ='seller_confirm' order by b.order_id desc");
    $intGy = db_factory::get_count("SELECT count(*) as count2 FROM `".TABLEPRE."witkey_service_order` as a LEFT JOIN ".TABLEPRE."witkey_order_detail as b ON a.order_id = b.order_id
			LEFT JOIN ".TABLEPRE."witkey_order as c ON a.order_id = c.order_id
			WHERE 1=1  and c.seller_uid= ".$gUid." and c.order_status!= 'close' and c.order_status ='seller_confirm' order by c.order_time desc");
}
require 'include/function.php';
require 'json_control/' . $do . '.php';