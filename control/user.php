<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
$_K ['is_rewrite'] = 0;
$do = trim($do);
$view = trim($view);
$gUid = intval($uid);
$op = trim($op);
$gUserInfo = $user_info;
$arrView = array('index','account','message','transaction','shop','collect','focus','prom','finance','added','prom','finance','gz','wk','demo');
if(false === in_array($view,$arrView)){
	$view ='account';
}
$gUid or header ( "location:index.php?do=login" );
$intCountTrends = db_factory::get_count("select count(msg_id) from ".TABLEPRE."witkey_msg where uid<1 and view_status!=1 and type=1 and  to_uid=".intval($gUid));
$intCountNotice = db_factory::get_count("select count(msg_id) from ".TABLEPRE."witkey_msg where uid<1 and view_status!=1 and type=2 and  to_uid=".intval($gUid));
$intCountPrivate = db_factory::get_count("select count(msg_id) from ".TABLEPRE."witkey_msg where to_uid = ".intval($gUid)." and view_status!=1 and uid>0 and msg_status<>2 ");
$intCountTask = db_factory::get_count('select count(task_id) from '.TABLEPRE.'witkey_task where uid = '.$gUid);
$intCountService = db_factory::get_count('select count(order_id) from '.TABLEPRE.'witkey_service_order where uid = '.$gUid);
$intCountFavoriteService = db_factory::get_count('select count(f_id) from '.TABLEPRE.'witkey_favorite where uid = '.$gUid." and keep_type = 'service'");
$intCountFavoriteWork = db_factory::get_count('select count(f_id) from '.TABLEPRE.'witkey_favorite where uid = '.$gUid." and keep_type = 'work'");
$intCountFavoriteTask = db_factory::get_count('select count(f_id) from '.TABLEPRE.'witkey_favorite where uid = '.$gUid." and keep_type = 'task'");
$intCountUnderTask = db_factory::get_count("SELECT count(*) count FROM `".TABLEPRE."witkey_task` WHERE ( task_id IN ( SELECT task_id FROM ".TABLEPRE."witkey_task_bid WHERE uid = ".$gUid." ) OR task_id IN ( SELECT task_id FROM ".TABLEPRE."witkey_task_work WHERE uid = ".$gUid." ) )");
$intCountSold = db_factory::get_count(' SELECT count(c.service_id) FROM `'.TABLEPRE.'witkey_order` AS a '
	                .' LEFT JOIN '.TABLEPRE.'witkey_order_detail AS b ON a.order_id = b.order_id '
                    .' LEFT JOIN '.TABLEPRE.'witkey_service AS c ON b.obj_id = c.service_id '
                    .' LEFT JOIN '.TABLEPRE.'witkey_service_order AS d ON b.order_id = d.order_id '
                    .' WHERE 1=1 and a.seller_uid = '.$gUid.' and b.obj_type = '."'service'");
$strUsersUrl='index.php?do='.$do.'&view='.$view;
$strPageTitle='用户中心';
$arrAuthRecords = kekezu::get_table_data('auth_code,auth_status','witkey_auth_record',"uid='{$gUid}'",'','','','auth_code');
if(!$op){
	switch ($view){
		case 'finance':
			$op = 'basic';
			break;
		default:
			$op = 'index';
			break;
	}
}
$autoshop=$gUserInfo['autoshop'];
$phpUrlStr = $do.'/'.$view.'_'.$op;
if($ed){
	$phpUrlStr = $phpUrlStr . '_' . $ed;
}
if(file_exists(S_ROOT.'/control/' . $phpUrlStr . '.php') && file_exists(S_ROOT.'/tpl/default/' . $phpUrlStr . '.htm')){
	require $phpUrlStr.'.php';
	require  $kekezu->_tpl_obj->template($phpUrlStr);
	die();
};
kekezu::show_msg('您访问的页面不存在','index.php?do=user&view=account',null,null,'danger');
