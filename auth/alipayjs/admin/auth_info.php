<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$alipayjs_obj = new Keke_witkey_auth_alipayjs_class(); 
$pay_tool_arr = array (1 =>$_lang['alipay'], 2 => $_lang['tenpay'], 3 => $_lang['payment_online'] );
$alipayjs_name_arr = keke_glob_class::get_bank();
if ($sbt_pay_to_user) {
	$alipayjs_obj->setWhere ( 'alipayjs_a_id=' . $fds['alipayjs_a_id'] );
	$alipayjs_obj->setPay_to_user_cash ( $fds['pay_to_user_cash'] );
	$alipayjs_obj->setPay_time ( time () );
	$res = $alipayjs_obj->edit_keke_witkey_auth_alipayjs();
	$alipayjs_info = db_factory::get_one(sprintf(" select uid,username from %switkey_auth_alipayjs where alipayjs_a_id = '%d'",TABLEPRE,$fds[alipayjs_a_id]));
	$v_arr = array($_lang['username']=>$alipayjs_info['username']);
	keke_msg_class::notify_user($alipayjs_info ['uid'],$alipayjs_info['username'],'alipayjs_auth',"支付宝认证通知",$v_arr,2);
	$res and kekezu::admin_show_msg ( $_lang['give_cach_success'],$_SERVER['HTTP_REFERER'],'3','','success');
}else{
	$alipayjs_a_id and $alipayjs_info = db_factory::get_one(sprintf(" select * from %switkey_auth_alipayjs where alipayjs_a_id = '%d'",TABLEPRE,$alipayjs_a_id));
}
require $template_obj->template ( 'auth/' . $auth_dir . '/admin/tpl/auth_info' );