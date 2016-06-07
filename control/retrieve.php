<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$uid and header ( "location:index.php" );
$strPageTitle = '找回密码' . '- ' . $_K ['html_title'];
$arrApiName = keke_glob_class::get_open_api ();
$strUrl = $_K ['siteurl'] . '/index.php?do=retrieve';
$http_agent = $_SERVER['HTTP_USER_AGENT'];

if (kekezu::submitcheck ( $formhash ) || ($json == 'json' && $ajax != 'sendcode')) {
	if($json == 'json')
	{
		if($subvalid == 'valid'){
			$validInfo = keke_user_class::getGetPwdLogByAuthsid($_SESSION['retrieve']['validinfo']['authsid']);
			if(!empty($tips)){
				arrayRecursive($tips, 'urlencode', true); 
				$json = json_encode($tips); 
				echo '{"data":[' . urldecode($json) . ']}';
			} else {
				$re = array(
					'type' => 'success'
				);
				arrayRecursive($re, 'urlencode', true); 
				$json = json_encode($re); 
				echo '{"data":[' . urldecode($json) . ']}';
			}
			die();
		}
		
		if (strtolower ( CHARSET ) == 'gbk') {
			$account = kekezu::utftogbk ( $account );
		}
		$user_login_obj = new keke_user_login_class();
		$user_login_obj->account_init($account);
		$accout_type = $user_login_obj->get_login_type();
		switch ($accout_type) {
			case 'mobile' :
				$tips ['account'] = '账号不存在';
				break;
			case 'email' :
				$arrUserInfo = keke_user_class::getUserInfoByEmail($account);
				break;
			case 'username' :
				$arrUserInfo = keke_user_class::getUserInfoByUsername($account);
				break;
		}
		if (! $arrUserInfo) {
			$tips ['account'] = '账号不存在';
		}
		
		if(!empty($tips)){
			arrayRecursive($tips, 'urlencode', true); 
			$json = json_encode($tips); 
			echo '{"data":[' . urldecode($json) . ']}';
		} else {
			$_SESSION['retrieve']['step']  =  $step;
			$_SESSION['retrieve']['userinfo']  =  $arrUserInfo;
			$re = array(
				'type' => 'success',
				'email' => kekezu::set_star($_SESSION['retrieve']['userinfo']['email'], 2, 9,3,'*')
			);
			arrayRecursive($re, 'urlencode', true); 
			$json = json_encode($re); 
			echo '{"data":[' . urldecode($json) . ']}';
		}
		die();
	}
	if($subvalid == 'valid'){
		$validInfo = keke_user_class::getGetPwdLogByAuthsid($_SESSION['retrieve']['validinfo']['authsid']);
		if ($valid_code != $validInfo['valid_code']) {
			$tips ['errors'] ['valid_code'] = '验证码错误';
			kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
		}
		kekezu::show_msg ( '', "index.php?do=getpassresetpwd&encrypteuid={$validInfo['encrypteuid']}&authsid={$validInfo['authsid']}", NULL, NULL, 'ok' );
	}else{
		if (strtolower ( CHARSET ) == 'gbk') {
			$account = kekezu::utftogbk ( $account );
		}
		$user_login_obj = new keke_user_login_class();
		$user_login_obj->account_init($account);
		$accout_type = $user_login_obj->get_login_type();
		switch ($accout_type) {
			case 'mobile' :
				$tips ['errors'] ['account'] = '账号不存在';
				kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
				break;
			case 'email' :
				$arrUserInfo = keke_user_class::getUserInfoByEmail($account);
				break;
			case 'username' :
				$arrUserInfo = keke_user_class::getUserInfoByUsername($account);
				break;
		}
		if (! $arrUserInfo) {
			$tips ['errors'] ['account'] = '账号不存在';
			kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
		}
		if ($getPasswordCode) {
			$strCodeCheck = kekezu::check_secode ( $getPasswordCode );
			if ($strCodeCheck != 1) {
				$tips ['errors'] ['code'] = $strCodeCheck;
				kekezu::show_msg ( $tips, NULL, NULL, NULL, 'error' );
			}
		}
		$_SESSION['retrieve']['step']  =  $step;
		$_SESSION['retrieve']['userinfo']  =  $arrUserInfo;
		kekezu::show_msg ( '', "index.php?do=retrieve", NULL, NULL, 'ok' );
	}
}else{
	if($ajax == 'sendcode'){
		$arrUserInfo = $_SESSION['retrieve']['userinfo'];
		if($account){
			$email = $account;
		}
		if($email){
			if(strrpos($email, '@') === false){
				$arrUserInfo = keke_user_class::getUserInfoByUsername($email);
			} else {
				$arrUserInfo = keke_user_class::getUserInfoByEmail($email);
			}
		}
		$validCode = kekezu::randomkeys(6,true);
		$sendtime = time();
		$arrNotifyArr = array ('网站名称' => $kekezu->_sys_config ['website_name'],'验证码' => $validCode);
		keke_shop_class::notify_user ( $arrUserInfo['uid'], $arrUserInfo['username'], 'get_password', '找回密码', $arrNotifyArr, 2 );
		$encrypteuid = md5(md5($arrUserInfo['uid']));
		$authsid = md5(md5($arrUserInfo['uid']).$http_agent.$sendtime);
		keke_user_class::createGetPwdLog('email', $arrUserInfo['uid'], $validCode, $_SESSION['retrieve']['userinfo']['email'], $encrypteuid, $authsid);
		$echodatas = array(
			'encrypteuid' => $encrypteuid,	
			'authsid' 	  => $authsid,
			'http_agent'  => $http_agent,
			'sendtime' 	  => $sendtime,
		);
		$_SESSION['retrieve']['validinfo']  =  $echodatas;
		if($json == 'json')
		{
			$json = array(
				'type'        => 'success',
				'encrypteuid' => $encrypteuid . '@@@' . $arrUserInfo['uid'],
				'authsid'     => $authsid,
				'validCode'   => $validCode
			);
			header("Content-Type: text/json; charset=utf-8");
			echo json_encode_u($json);
			die();
		}
		else
		{
			kekezu::echojson('发送成功',1,null);
		}
	}
}
