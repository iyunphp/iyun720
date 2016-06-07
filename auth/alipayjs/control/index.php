<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$intAlipayjsId  = intval($intAlipayjsId);
if($step){
    $step=$step;
}else{
    if($arrAuthInfo){
        if($arrAuthInfo['auth_status']){
            $step = 'step3';
        }else{
            $step = 'step2';
        }
    }else{
        $step='step1';
    }
}
$strUrl = "index.php?do=user&view=account&op=auth&code=".$code;
$strAlipayjsSql = sprintf("select * from %switkey_auth_alipayjs where uid=%d",TABLEPRE,$gUid);
$arrAlipayjsAuthLists = db_factory::query($strAlipayjsSql);
foreach($arrAlipayjsAuthLists as $k=>$v){
	$arrAccountLists[]=$v['alipayjs_a_id'];
}
switch ($step) {
	case "step1" :
	    $arrAuthRecord = db_factory::query("select * from ".TABLEPRE."witkey_auth_alipayjs where uid ='$gUid'");
	    if (isset($formhash)){
	        if($arrAuthRecord){
	        	db_factory::execute("delete from ".TABLEPRE."witkey_auth_alipayjs where uid ='$gUid'");
	        }
	        if (strtoupper ( CHARSET ) == 'GBK') {
	        	$real_name = kekezu::utftogbk($real_name );
	        }
	        $arrData = array(
	            'alipayjs_account'=>$account,
	            'real_name'=>$real_name
	        );
	        if($objAuth->add_auth($arrData)){
	            kekezu::show_msg('认证信息已提交',$strUrl.'&step=step2',NULL,NULL,'ok');
	        }else{
	            $tips['errors']['account'] = '认证信息提交失败';
	            kekezu::show_msg($tips,NULL,NULL,NULL,'error');
	        }
	    }
		break;
	case "step2" :
		if($arrAuthInfo['auth_status'] > 0){
			$step='step3';
			if($arrAuthInfo['auth_status']==1){
			    $auth_tips ='已通过';
			    $auth_style = 'success';
			}elseif($arrAuthInfo['auth_status']==2){
			    $auth_tips ='未通过';
			    $auth_style = 'error';
			}
		}else{
			$step='step2';
		}
		if (isset ( $formhash ) && kekezu::submitcheck ( $formhash )) {
			$floatUserGetCash   = floatval ( $user_get_cash );
			if($floatUserGetCash === floatval(0)){
				$tips['errors']['user_get_cash'] = '输入金额不正确哦';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			$floatPayToUserCash = floatval ( $arrAuthInfo['pay_to_user_cash'] );
			if($floatPayToUserCash === floatval(0)){
				$tips['errors']['user_get_cash'] = '后台打款金额不正确';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			if($floatPayToUserCash === $floatUserGetCash){
				$objAuth->auth_confirm($arrAuthInfo,$floatUserGetCash);
				$strTipsMsg = '认证成功';
			}else{
				$objAuth->authFail($arrAuthInfo,$floatUserGetCash);
				$strTipsMsg = '您填写的收款金额与管理员打款金额不相等';
			}
			kekezu::show_msg($strTipsMsg,$strUrl."&step=step3&intAlipayjsId=".$intAlipayjsId,NULL,NULL,'ok');
		 }else{
			 $arrAuthAlipayjsInfo = db_factory::get_one(sprintf("select * from %switkey_auth_alipayjs where alipayjs_a_id=%d",TABLEPRE,$arrAccountLists[0]));
			 if(empty($arrAuthAlipayjsInfo)&&!is_array($arrAuthAlipayjsInfo)){
			 	kekezu::show_msg('警告,非法进入,你还没有提交认证申请',$strUrl."&step=step1",'3','','warning');
			 	exit('警告,非法进入,你还没有提交认证申请');
			 }
		 }
		break;
	case "step3":
	    if(!$arrAccountLists){     
	        $step='step1';
	    }elseif($arrAuthInfo['auth_status']==1){
			$auth_tips ='已通过';
			$auth_style = 'success';
		}elseif($arrAuthInfo['auth_status']==2){
			$auth_tips ='未通过';
			$auth_style = 'error';
		}else{
			 $step='step2';
		}
		break;
}
