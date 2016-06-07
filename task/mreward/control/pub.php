<?php
$stdCacheName = 'task_cache_'.$id.'_' . substr ( md5 ( $gUid ), 0, 6 );
$objRelease = mreward_release_class::get_instance ($id,$pub_mode);
$arrConfig = $objRelease->_task_config;
$regionCfg =  keke_glob_class::getRegionConfig();
$objRelease->get_task_obj ( $stdCacheName ); 
$objRelease->pub_mode_init( $stdCacheName,$init_info);
$arrPubInfo = $objRelease->_std_obj->_release_info; 
$userInfo=db_factory::get_one("select * from ".TABLEPRE."witkey_space where uid=".intval($gUid));
$arrPubInfo['indus_pid'] and $arrAllIndustrys = CommonClass::getIndustryByPid($arrPubInfo['indus_pid'],'indus_id,indus_pid,indus_name');
$arrPubInfo['province'] and $arrCities = CommonClass::getDistrictByPid($arrPubInfo['province'],'id,upid,name');
$arrPubInfo['city'] and $arrAreas = CommonClass::getDistrictByPid($arrPubInfo['city'],'id,upid,name');
switch ($step) {
	case 'step1':
		$strMinDate = date('Y-m-d',time()+ $arrConfig['min_day']*3600*24);
		$strDefaultMaxDay = $objRelease->_default_max_day;
		$floatBudget = $arrPubInfo['txt_task_cash']?$arrPubInfo['txt_task_cash']:$arrConfig['min_cash'];
		$strDate = $arrPubInfo['txt_task_day']?$arrPubInfo['txt_task_day']:$strDefaultMaxDay;
		$arrAwards = array(
			1=>array(
				'name'=>'一等奖',
				'num'=>$arrPubInfo['txt_prize1_num'],
				'cash'=>$arrPubInfo['txt_prize1_cash'],
				'isdel'=>'0'
			),
			2=>array(
				'name'=>'二等奖',
				'num'=>$arrPubInfo['txt_prize2_num'],
				'cash'=>$arrPubInfo['txt_prize2_cash'],
				'isdel'=>'1'
			),
			3=>array(
				'name'=>'三等奖',
				'num'=>$arrPubInfo['txt_prize3_num'],
				'cash'=>$arrPubInfo['txt_prize3_cash'],
				'isdel'=>'1'
			)
		);
		if (isset($formhash)&&kekezu::submitcheck($formhash)) {
			$floatTaskCash = floatval($txt_task_cash);
			$floatMinCash = floatval($arrConfig['min_cash']);
			$strMaxDay = $objRelease->getMaxDay ( $floatTaskCash );
			$intMaxDay = strtotime($strMaxDay);
			$strEndDate = strval(trim($txt_task_day));
			$intEndDate = strtotime($strEndDate);
			$intMinDay = strtotime($strMinDate);
			$strText = $objRelease->check_pub_priv('','json');
			if($strText !== true){
				kekezu::show_msg($strText,NULL,NULL,NULL,'fail');
			}
			$floatMaxCash = floatval($arrConfig['max_cash']);
			if($floatMaxCash && $floatTaskCash > $floatMaxCash){
				$tips['errors']['txt_task_cash'] = "您的预算金额不能超过￥{$floatMaxCash}元";
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			if ($floatTaskCash < $floatMinCash) {
				$tips['errors']['txt_task_cash'] = '你的预算不能少于￥'.$floatMinCash.'元';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			if ($floatTaskCash <= 0 ) {
				$tips['errors']['txt_task_cash'] = '您的预算金额必须大于￥0元';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			$intPriceNum1 		= intval($txt_prize1_num);
			$floatPriceCash1 	= floatval($txt_prize1_cash);
			$floatTotalPriceCash1 = $intPriceNum1 * $floatPriceCash1;
			$intPriceNum2 		= intval($txt_prize2_num);
			$floatPriceCash2 	= floatval($txt_prize2_cash);
			$floatTotalPriceCash2 = $intPriceNum2 * $floatPriceCash2;
			$intPriceNum3 		= intval($txt_prize3_num);
			$floatPriceCash3 	= floatval($txt_prize3_cash);
			$floatTotalPriceCash3 = $intPriceNum3 * $floatPriceCash3;
			$floatPrize = $floatTotalPriceCash1 + $floatTotalPriceCash2 + $floatTotalPriceCash3;
			if($floatPrize != $floatTaskCash){
				$tips['errors']['txt_task_cash'] = '任务预算和奖金总和不相等，其中预算为￥'.$floatTaskCash.'元，分配奖金总和为'.$floatPrize.'元';
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			if (($intEndDate < $intMinDay)||($intEndDate > $intMaxDay)) {
				$tips['errors']['txt_task_day'] = '当前预算允许最小天数为:'.intval($arrConfig['min_day']).'天,最大截止时间：'.$strMaxDay;
				kekezu::show_msg($tips,NULL,NULL,NULL,'error');
			}
			$arrPubInfo and $_POST = array_merge ( $arrPubInfo, $_POST );
			$_POST['txt_task_cash'] = keke_curren_class::convert($_POST['txt_task_cash'],0,true);
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
		if($action == 'delete_file'){
			$resText = CommonClass::delFileByFileId($fileid);
			if($resText){
				$array = explode('|', $arrPubInfo['file_ids']);
				$newArr = CommonClass::returnNewArr($fileid, $array);
				$_POST['file_ids'] = implode("|", $newArr);
				$arrPubInfo and $_POST = array_merge ( $arrPubInfo, $_POST);
				$objRelease->save_task_obj ($_POST, $stdCacheName ); 
				kekezu::echojson('删除成功',1,array('fileid'=>$fileid,'a'=>$arrPubInfo));die;
			}
		}
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
				$strPartComment = kekezu::cutstr($strTarComment, 1000);
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