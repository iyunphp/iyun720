<?php
$stdCacheName = 'task_cache_'.$id.'_' . substr ( md5 ( $gUid ), 0, 6 );
$regionCfg =  keke_glob_class::getRegionConfig();
$objRelease = dtender_release_class::get_instance ($id,$pub_mode);
$arrConfig = $objRelease->_task_config;
$objRelease->get_task_obj ( $stdCacheName ); 
$objRelease->pub_mode_init( $stdCacheName,$init_info);
$arrPubInfo = $objRelease->_std_obj->_release_info; 
$arrPubInfo['indus_pid'] and $arrAllIndustrys = CommonClass::getIndustryByPid($arrPubInfo['indus_pid'],'indus_id,indus_pid,indus_name');
$arrPubInfo['txt_task_cash']=  $objRelease->get_dtender_realcash();
$arrCashCove = $objRelease->_cash_cove;
$userInfo=db_factory::get_one("select * from ".TABLEPRE."witkey_space where uid=".intval($gUid));
$arrPubInfo['province'] and $arrCities = CommonClass::getDistrictByPid($arrPubInfo['province'],'id,upid,name');
$arrPubInfo['city'] and $arrAreas = CommonClass::getDistrictByPid($arrPubInfo['city'],'id,upid,name');
switch ($step) {
	case 'step1':
		$intTaskCove = intval($task_cash_cove);
		$intMinDay = time()+ $arrConfig['bid_min_time']*3600*24;
		$strMinDate = date('Y-m-d',$intMinDay);
		$intMaxDay = time()+ 24*3600*$arrConfig['bid_max_time'];
		$strMaxDay = date('Y-m-d',$intMaxDay);
		$strDate = $arrPubInfo['txt_task_day']?$arrPubInfo['txt_task_day']:$strMaxDay;
		$intCover = $arrPubInfo['task_cash_cove']?$arrPubInfo['task_cash_cove']:0;
		if (isset($formhash)&&kekezu::submitcheck($formhash)) {
			$strEndDate = strval(trim($txt_task_day));
			$intEndDate = strtotime($strEndDate);
			$strText = $objRelease->check_pub_priv('','json');
			if($strText !== true){
				kekezu::show_msg($strText,NULL,NULL,NULL,'fail');
			}
			if($budget_radio =='1'){
				if ($intTaskCove <= 0) {
					$tips['errors']['task_cash_cove'] = '请选择您的预算';
					kekezu::show_msg($tips,NULL,NULL,NULL,'error');
				}
			}else{
				if ($txt_budget<=0) {
					$tips['errors']['txt_budget'] = '请填写您的预算';
					kekezu::show_msg($tips,NULL,NULL,NULL,'error');
				}
			}
			if (($intEndDate < $intMinDay)||($intEndDate > $intMaxDay)) {
				$tips['errors']['txt_task_day'] = '当前预算允许最小天数为:'.intval($arrConfig['bid_min_time']).'天,最大截止时间：'.$strMaxDay;
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			$arrPubInfo and $_POST = array_merge ( $arrPubInfo, $_POST );
			$objRelease->save_task_obj ( $_POST, $stdCacheName ); 
			kekezu::show_msg($tips,$strUrl.'&step=step2',NULL,NULL,'ok');
		}
		break;
	case 'step2':
		if (isset($formhash)&&kekezu::submitcheck($formhash)) {
			if (strtoupper ( CHARSET ) == 'GBK') {
				$_POST = kekezu::utftogbk($_POST );
			}
			if($_POST['province'] == 'p'){
				$tips['errors']['province'] = '请选择省份';
				kekezu::show_msg($tips,null,null,null,'error');
			}
			$_POST['tar_content'] = kekezu::escape($tar_content);
			if (!$_POST['tar_content']) {
				$tips['errors']['tar_content'] = '请输入需求描述';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			$arrPubInfo and $_POST = array_merge ( $arrPubInfo, $_POST);
			$objRelease->save_task_obj ($_POST, $stdCacheName ); 
			kekezu::show_msg($tips,$strUrl.'&step=step3',NULL,NULL,'ok');
		}else{
			!$_SESSION[$stdCacheName] and kekezu::show_msg($_lang ['friendly_notice'],"index.php?do=pubtask&id=$id",2,"任务已提交，不可再返回修改！","warning");
			$objRelease->check_access($step, $id, $arrPubInfo);
			$strExtTypes   = kekezu::get_ext_type (); 
		}
		$arrFileLists = CommonClass::getFileArray('|', $arrPubInfo['file_ids']);
		break;
	case 'step3':
		$intFileCount = 0;
		if($arrPubInfo['file_ids']){
			$intFileCount = count(explode('|',$arrPubInfo['file_ids']));;
		}
		if (isset($formhash)&&kekezu::submitcheck($formhash)) {
			$arrPayitems = array(
					'urgent'=>intval($txt_urgent),
					'tasktop'=>intval($txt_tasktop)&&intval($text_tasktop) ?intval($text_tasktop):0,
					'workhide'=>intval($txt_workhide),
					'seohide'=>intval($txt_seohide),
			);
			$arrPayitems = array_filter($arrPayitems);
			PayitemClass::validPayitemCount($arrPayitems, $arrPubInfo['txt_task_day']);
			$_POST['payitem'] = $arrPayitems;
			$arrPubInfo and $_POST = array_merge ( $arrPubInfo, $_POST );
			$objRelease->save_task_obj ( $_POST, $stdCacheName ); 
			$intTaskId = $objRelease->pub_task (); 
			$objRelease->update_task_info ( $intTaskId, $stdCacheName ); 
			kekezu::show_msg($tips,$strUrl.'&step=step4&taskId='.$intTaskId,NULL,NULL,'ok');
		}else{
			!$_SESSION[$stdCacheName] and kekezu::show_msg($_lang ['friendly_notice'],"index.php?do=pubtask&id=$id",2,"任务已提交，不可再返回修改！","warning");
			$objRelease->check_access($step, $id, $arrPubInfo);
			$strTarComment = htmlspecialchars_decode($arrPubInfo['tar_content']);
			$strCommentLen = strlen($strTarComment);
			if($strCommentLen > 1000 ){
				$strPartComment = kekezu::cutstr($strTarComment,1000);
			}
		}
		break;
	case 'step4':
		$taskId = intval($taskId);
		if(0 === $taskId){
			kekezu::show_msg('无权访问',$strUrl,3,NULL,'warning');
		}
		$arrTaskInfo = $objRelease->check_access($step, $id, $arrPubInfo,$taskId);
		$arrPayInfo = $objRelease->checkWhetherToPay($taskId);
		$boolValue = $arrPayInfo['balance_pay'];
		$floatPayCash = $arrPayInfo['total_cash'];
		break;
}
require keke_tpl_class::template ( 'pubtask' );
die();