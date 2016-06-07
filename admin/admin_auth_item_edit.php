<?php defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$code or kekezu::admin_show_msg ( $_lang['error_param'], "index.php?do=auth",3,'','warning');
if ($sbt_edit){
	if($code=='mobile'){
	    $smsInterface = db_factory::get_one('select v from '.TABLEPRE.'witkey_basic_config where k="sms_interface"');
	    if($smsInterface['v']!='open'){
	        kekezu::admin_show_msg('请先开启短信接口','index.php?do=config&view=basic&op=smsinterface');
	    }
	}
	$big_icon = $filepath1;
	$small_before_icon = $filepath2;
	$small_after_icon = $filepath3;
	keke_auth_fac_class::edit_item($code, $fds,$pk,$big_icon,$small_after_icon,$small_before_icon);
}
$auth_item['small_info']    = CommonClass::getFileListsBySavename($auth_item['auth_small_ico']);
$auth_item['small_n_info']  = CommonClass::getFileListsBySavename($auth_item['auth_small_n_ico']);
$auth_item['big_info']      = CommonClass::getFileListsBySavename($auth_item['auth_big_ico']);
kekezu::admin_system_log($_lang['edit_auth'] . $code);
if($code!='weibo')
	require  $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_'. $do .'_'. $view);
else
	require  S_ROOT.'./auth/'.$auth_item['auth_dir'].'/admin/auth_config.php';
function get_fid($path){
	if(!path){
		return false;
	}
	$querystring = substr(strstr($path, '?'), 1);
	parse_str($querystring, $query);
	return $query['fid'];
}