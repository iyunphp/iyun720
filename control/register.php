<?php
($uid && ! isset ( $_SESSION ['auid'] )) and header ( "location:index.php" );
$strPageTitle = '注册-'.$_K ['html_title'];
$strPageKeyword = '注册,'.$_K ['html_title'];
$strPageDescription = $kekezu->_sys_config['index_seo_desc'];
$objReg = new keke_register_class ();
$arrApiNames = keke_glob_class::get_open_api ();

if($json == 'json'){
	if (strtoupper ( CHARSET ) == 'GBK') {
		$account = kekezu::utftogbk( $account );
	}
	$strNameCheck = keke_user_class::check_username ( $account );

	if ($strNameCheck != 1) {
		$tips ['account'] = $strNameCheck;
	}
	if(strlen($password) < 6){
		$tips ['password'] = '密码不能少于6位';
	} else if($password != $confirmPassword){
		$tips ['confirmPassword'] = '两次密码输入不一致';
	}
	$pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
	if(preg_match( $pattern, $email )){ //先用正则表达式验证email格式的有效性 
		if (keke_user_class::user_checkemail ( $email ) != 1) {
			$tips ['email'] = '该email已经被注册';
        }
    }else{ 
        $tips ['email'] = '该email非法';
    } 
	if (intval ( $agree ) == 0) {
		$tips ['agree'] = '请先同意注册协议';
	}
	if(!empty($tips))
	{
		$json = array(
			type => 'error',
			errors => $tips
		); 
	}
	else
	{
		$intRegUid = $objReg->user_register ( kekezu::escape($account), $password , $email, $code, 0, $password );
		$arrUserInfo = keke_user_class::get_user_info ( $intRegUid );
		$json = array(
			'type' => 'success',
			'data' => $arrUserInfo
		);
	}
	header("Content-Type: text/json; charset=utf-8");
	echo json_encode_u($json);	
	die();
}
if (isset ( $formhash ) && kekezu::submitcheck ( $formhash )) {
	if (keke_user_class::user_checkemail ( $email ) != 1) {
		$tips ['errors'] ['email'] = '该email非法或已经被注册';
		kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
	}
	if (strtoupper ( CHARSET ) == 'GBK') {
		$account = kekezu::utftogbk( $account );
	}
	$strNameCheck = keke_user_class::check_username ( $account );
	if ($strNameCheck != 1) {
		$tips ['errors'] ['account'] = $strNameCheck;
		kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
	}
	$strCodeCheck = kekezu::check_secode ( $code );
	if ($strCodeCheck != 1) {
		$tips ['errors'] ['code'] = $strCodeCheck;
		kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
	}
	if (intval ( $agree ) == 0) {
		$tips ['errors'] ['agree'] = '请先同意注册协议';
		kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
	}
	
	$intRegUid = $objReg->user_register ( kekezu::escape($account), $password , $email, $code, 1, $password );
	$arrUserInfo = keke_user_class::get_user_info ( $intRegUid );
	$objReg->register_login ( $arrUserInfo );
	
}
if (isset ( $check_username ) && ! empty ( $check_username )) {
	$res = keke_user_class::check_username ( $check_username );
	echo $res;
	die ();
}
$_SESSION ['spread'] = 'index.php?do=register';