<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 10 );
$basic_config = $kekezu->_sys_config;
$reg_obj = new keke_register_class ();
$member_class = new keke_table_class ( 'witkey_member' );
$space_class = new keke_table_class ( 'witkey_space' );
$arrTopIndustrys = $kekezu->_indus_p_arr;
$arrAllIndustrys = $kekezu->_indus_arr;
if ($edituid) {
	$member_arr = kekezu::get_user_info ( $edituid );
	$shop_open = db_factory::get_count ( 'select shop_id from ' . TABLEPRE . 'witkey_shop where uid=' . $edituid );
}
$member_group_arr = db_factory::query ( sprintf ( "select group_id,groupname from %switkey_member_group", TABLEPRE ) );
if($op=='getzfpwd'){
    $userInfo = keke_user_class::get_user_info(intval($userid));
    $email = $userInfo['email'];
    $strNewCode = kekezu::randomkeys(8);
    $strNewMd5Pwd =  keke_user_class::get_password ( $strNewCode, $userInfo ['rand_code'] );
    $intRes = db_factory::updatetable(TABLEPRE.'witkey_space', array('sec_code'=>$strNewMd5Pwd), array('uid'=>intval($userid)));
    if($intRes){
        $message_obj = new keke_msg_class ();
        $message_obj->send_message (
            $userInfo ['uid'],
            $userInfo ['username'],
            'update_sec_code','找回支付密码',array ('支付密码' => $strNewCode ),
            $userInfo ['email'],
            $userInfo ['mobile'],2
        );
        $system_log_obj = new Keke_witkey_system_log_class ();
        $system_log_obj->setLog_content ( 'admin于'.date("Y-m-d H:i:s").'重置了'.$userInfo['username'].'的支付密码' );
        $system_log_obj->setLog_ip ( kekezu::get_ip () );
        $system_log_obj->setLog_time ( time () );
        $system_log_obj->setUser_type ( $userInfo ['group_id'] );
        $system_log_obj->setUid ( $userInfo ['uid']  );
        $system_log_obj->setUsername ( $userInfo ['username'] );
        $system_log_obj->create_keke_witkey_system_log ();
        $status = '重置成功';
    }else{
        $status = '重置失败';
    }
    echo json_encode(array('status'=>$status));die;
}
if ($is_submit == 1) {
	if (! $edituid) {
		$regClass = new keke_register_class();
		$result = $regClass->check_email(trim($fds ['email']));
		if($result !==true){
			kekezu::admin_show_msg ( '操作提示', "index.php?do=user&view=add", 3, $result, 'warning' );
		}
		$reg_uid = $reg_obj->user_register ( $fds ['username'], $fds ['password'], $fds ['email'], null, false, $fds ['password'] );
		unset ( $fds [repassword] );
		$arrAddUserInfo = array ();
		$fds ['truename'] and $arrAddUserInfo ['truename'] = $fds ['truename'];
		$fds ['mobile'] and $arrAddUserInfo ['mobile'] = $fds ['mobile'];
		$fds ['indus_id'] and $arrAddUserInfo ['indus_id'] = $fds ['indus_id'];
		$fds ['indus_pid'] and $arrAddUserInfo ['indus_pid'] = $fds ['indus_pid'];
		$fds ['birthday'] and $arrAddUserInfo ['birthday'] = $fds ['birthday'];
		! empty ( $arrAddUserInfo ) and db_factory::updatetable ( TABLEPRE . 'witkey_space', $arrAddUserInfo, array (
				'uid' => $reg_uid 
		) );
		is_null ( $fds ['group_id'] ) or db_factory::execute ( sprintf ( "update %switkey_space set group_id={$fds['group_id']} where uid=$reg_uid", TABLEPRE ) );
		kekezu::admin_system_log ( $_lang ['add_member'] . $fds ['username'] );
		kekezu::admin_show_msg ( $_lang ['operate_notice'], "index.php?do=user&view=add", 3, $_lang ['user_creat_success'], 'success' );
	} else { 
		$uinfo = kekezu::get_user_info ( $edituid );
		if ($fds ['password']) {
			$slt = db_factory::get_count ( sprintf ( "select rand_code from %switkey_member where uid = '%d'", TABLEPRE, $edituid ) );
			$sec_code = keke_user_class::get_password ( $fds ['password'], $slt );
			$fds ['sec_code'] = $sec_code;
			$newpwd = $fds ['password'];
			$pwd = md5 ( $fds ['password'] );
			$fds [password] = $pwd;
			db_factory::execute ( sprintf ( "update %switkey_member set password ='%s' where uid=%d", TABLEPRE, $pwd, $edituid ) );
		} else {
			unset ( $fds ['password'] );
		}
		keke_user_class::user_edit ( $uinfo ['username'], '', $newpwd, '', 1 );
		$space_class->save ( $fds, array (
				"uid" => "$edituid" 
		) ); 
		kekezu::admin_system_log ( $_lang ['edit_member'] . $member_arr [username] );
		kekezu::admin_show_msg ( $_lang ['edit_success'], "index.php?do=user&view=add&edituid=".$edituid, 3, '', 'success' );
	}
}
if($check_email){
	$regClass = new keke_register_class();
	$result = $regClass->check_email($check_email);
	if($result !==true){
		echo $result;
	}else{
		echo 1;
	}
	die ();
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_user_add' );