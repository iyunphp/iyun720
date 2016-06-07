<?php
class CommonClass {
	public static function changehongbao($task_id,$moneys,$uid,$money,$title,$g) {
		$uid = intval($uid);
		$task_id = intval($task_id);
		$result=db_factory::get_one('select * from '.TABLEPRE.'witkey_space where uid='.$uid);
		if($g){
			$newbalance=$result['balance']-$money+$moneys;
			db_factory::query('update '.TABLEPRE.'witkey_space set balance="'.$newbalance.'" where uid='.$uid);
			keke_finance_class::insert_trust("in", "task_xg", $uid, -$money+$moneys, $newbalance);
		}else{
			$newbalance=$result['balance']+$money;
			keke_finance_class::insert_trust("in", "finish_task", $uid,$money, $newbalance,$task_id);
			db_factory::query('update '.TABLEPRE.'witkey_space set balance="'.$newbalance.'" where uid='.$uid);
			db_factory::query('update '.TABLEPRE.'witkey_space set is_hongbao=1 where uid='.$uid);
			db_factory::query('update '.TABLEPRE.'witkey_task_work set work_status=4 where uid='.$uid.' and task_id='.$task_id);
		}
		if(!$g){
			$v_arr = array (
				"福袋任务" => '【'.$title.'】',
				"福袋金额" => $money
		);
			keke_msg_class::notify_user($uid, $result['username'], 'select', '福袋任务完成通知',$v_arr);
		}
		return true;
	}
	public static function getuseName($uid) {
		$result=db_factory::get_one("select * from ".TABLEPRE."witkey_space where uid='$uid'");
		return $result['username'];
	}
	public static function getAllDistrict($fields = '*') {
		$fields = strval ( trim ( $fields ) );
		return db_factory::get_table_data ( $fields, 'witkey_district', ' 1=1 ', 'displayorder asc', NULL, NULL, 'id', null );
	}
	public static function getDistrictName($upid) {
		$districtinfo= db_factory::get_one('select * from '.TABLEPRE.'witkey_district where id='.$upid);
		return $districtinfo['name'];
	}
	public static function getDistrictNames($upid) {
		$districtinfo= db_factory::get_one('select * from '.TABLEPRE.'witkey_district where id='.$upid);
		$districtinfos= db_factory::get_one('select * from '.TABLEPRE.'witkey_district where id='.$districtinfo['upid']);
		return $districtinfos['name'];
	}
	public static function getDistrictInfo($id){
	    $districtinfo=db_factory::get_one("select * from ".TABLEPRE."witkey_district where id=".intval($id));
	    return $districtinfo;
	}
	public static function getUpid($nameone) {
		$districtinfo= db_factory::get_one('select * from '.TABLEPRE.'witkey_district where name="'.$nameone.'"');
		if($districtinfo){
			$twoupid=$districtinfo['id'];
		}else{
			$insertsqlarr['name']=$nameone;
			$insertsqlarr['upid']="0";
			$intResult=db_factory::inserttable(TABLEPRE.'witkey_district', $insertsqlarr);
			$twoupid=$intResult;
		}
		return $twoupid;
	}
	public static function getDistrictById($id, $fields = '*') {
		$fields = strval ( trim ( $fields ) );
		return db_factory::get_one ( sprintf ( 'select %s from %s where id = %d', $fields, TABLEPRE . 'witkey_district', intval ( $id ) ) );
	}
	public static function getIndustryById($id, $fields = '*') {
		$fields = strval ( trim ( $fields ) );
		return db_factory::get_one ( sprintf ( 'select %s from %s where indus_id = %d', $fields, TABLEPRE . 'witkey_industry', intval ( $id ) ) );
	}
	public static function getDistrictByPid($pid, $fields = '*') {
		$fields = strval ( trim ( $fields ) );
		return db_factory::get_table_data ( $fields, 'witkey_district', '1=1 and upid =' . intval ( $pid ), ' displayorder asc', NULL, NULL, 'id', NULL );
	}
	public static function getIndustryByPid($pid, $fields = '*') {
		return kekezu::get_table_data ( $fields, 'witkey_industry', 'indus_type =1 and indus_pid =' . intval ( $pid ), ' CASE WHEN listorder = 0 THEN 9999999 WHEN listorder > 0 THEN listorder END ', '', '', 'indus_id', 60 );
	}
	public static function getNearlyIncomeForDays($uid, $days = 30) {
		$sqlIncome = "SELECT SUM(fina_cash) FROM `" . TABLEPRE . "witkey_finance`
				WHERE uid = " . intval ( $uid ) . " AND (fina_action = 'task_bid' or fina_action = 'sale_service')
				AND fina_type = 'in' AND DATE_SUB(CURDATE(),INTERVAL 30 day) <= date(from_unixtime(fina_time))";
		return $nearlyIncome = number_format ( floatval ( db_factory::get_count ( $sqlIncome ) ), 2 );
	}
	public static function getFileArray($delimiter, $string) {
		$arrFileLists = array ();
		if ($string) {
			$arrFilePath = explode ( $delimiter, $string );
			if (is_array ( $arrFilePath )) {
				$strSql = sprintf ( "select file_id,file_name,save_name from %switkey_file where file_id in(%s)", TABLEPRE, implode ( ',', array_filter ( $arrFilePath ) ) );
				$arrFileLists = db_factory::query ( $strSql );
			}
		}
		return $arrFileLists;
	}
	public static function getFileArrayByPath($delimiter, $string) {
		$arrFileLists = array ();
		if ($string) {
			$arrFilePath = explode ( $delimiter, $string );
			if (is_array ( $arrFilePath )) {
				$arrFilePath = "'" . implode ( "','", array_filter ( $arrFilePath ) ) . "'";
				$strSql = sprintf ( "select file_id,file_name,save_name from %switkey_file where save_name in(%s)", TABLEPRE, $arrFilePath );
				$arrFileLists = db_factory::query ( $strSql );
			}
		}
		return $arrFileLists;
	}
	public static function delFileByFileId($fileId) {
		$strSql = sprintf ( "select file_id,file_name,save_name from %switkey_file where file_id in(%s)", TABLEPRE, intval ( $fileId ) );
		$arrFileInfo = db_factory::get_one ( $strSql );
		$filename = S_ROOT . $arrFileInfo ['save_name'];
		if (file_exists ( $filename )) {
			unlink ( $filename );
		}
		return db_factory::execute ( "delete from " . TABLEPRE . "witkey_file where file_id = " . intval ( $fileId ) );
	}
	public static function returnNewArr($val, $array) {
		$newArr = array ();
		foreach ( $array as $v ) {
			if ($v != $val) {
				$newArr [] = $v;
			}
		}
		return $newArr;
	}
	public static function getGoodsMark($intId) {
		$intGoodsMarks = db_factory::execute ( sprintf ( "select * from %switkey_mark where mark_type=2 and origin_id=%d", TABLEPRE, $intId ) );
		$intGoodsMark = db_factory::execute ( sprintf ( "select * from %switkey_mark where mark_type=2 and mark_status=1 and origin_id=%d", TABLEPRE, $intId ) );
		if (! empty ( $intGoodsMark ) && ! empty ( $intGoodsMarks )) {
			$floatMark = round ( $intGoodsMark / $intGoodsMarks, 4 ) * 100;
		} else {
			$floatMark = 0;
		}
		return $floatMark;
	}
	public static function getMemberFocus($intId) {
		$arrData = array ();
		$intFocusNum = db_factory::get_count ( "select count(*) from " . TABLEPRE . "witkey_free_follow  where uid=" . intval ( $intId ) );
		$intFensiNum = db_factory::get_count ( "select count(*) from " . TABLEPRE . "witkey_free_follow  where fuid=" . intval ( $intId ) );
		$arrData ['focusnum'] = $intFocusNum;
		$arrData ['fensinum'] = $intFensiNum;
		return $arrData;
	}
	public static function getShopInfo($intId) {
		return db_factory::get_one ( "select * from " . TABLEPRE . "witkey_shop where uid=" . intval ( $intId ) );
	}
	public static function getTradeRecord() {
		global $gUid;
		$arrTaskStatus = '3,4,5,6,7,8';
		$strSql = "select * from " . TABLEPRE . "witkey_task where task_status in (" . $arrTaskStatus . ") and uid=" . intval ( $gUid );
		$arrTaskInfo = db_factory::query ( $strSql );
		$strSql .= 'SELECT a.id,a.price,c.order_id,c.order_uid,c.order_username,c.seller_uid,c.seller_username,c.order_status,c.order_time FROM `' . TABLEPRE . 'witkey_service_order` as a LEFT JOIN ' . TABLEPRE . 'witkey_order_detail as b ON a.order_id = b.order_id LEFT JOIN ' . TABLEPRE . 'witkey_order as c ON a.order_id = c.order_id	WHERE 1=1 ' . " and c.order_status ='" . strval ( $s ) . "'";
		$arrServiceInfo = db_factory::query ( $strSql );
	}
	public static function getStatus($iTime) {
		$iTime = intval ( $iTime );
		$iCurrentTime = time ();
		$dur = $iCurrentTime - $iTime;
		if ($dur < 0) {
			return $iTime;
		} else {
			if ($dur < 60) {
				return '刚刚';
			} else {
				if ($dur < 3600) {
					return floor ( $dur / 60 ) . '分钟前';
				} else {
					if ($dur < 86400) {
						if (date ( 'd', $iCurrentTime ) == date ( 'd', $iTime )) {
							return date ( 'H:i', $iTime );
						} else {
							return '昨日 ' . date ( 'H:i', $iTime );
						}
					} else {
						if ($dur < 2592000) { 
							return floor ( $dur / 86400 ) . '天前';
						} else {
							return floor ( $dur / 2592000 ) . '月前';
						}
					}
				}
			}
		}
	}
	public static function getFooterPage($limit = 10){
		return db_factory::query("SELECT art_id,art_title,art_source FROM `".TABLEPRE."witkey_article` WHERE cat_type = 'about' ORDER BY listorder ASC,art_id DESC limit 0,".intval($limit));
	}
	public static function cancleEdit($objid,$objtype){
		$logInfo =self::getEditLogInfoByLogTypeAndObjId($objid, $objtype);
		if($logInfo){
			return db_factory::execute("UPDATE `".TABLEPRE."witkey_service_editlog` SET `status`='0' WHERE (`log_id`='".intval($logInfo['log_id'])."')");
		}
		return false;
	}
	public static function applyEdit($logInfo,$objid){
		if(1 != $logInfo['status']){
			return false;
		}
		if($logInfo['log_content']){
			if($logInfo['log_type'] =='6'||$logInfo['log_type'] =='7' ){
			    $logDatas = $logInfo['log_content'];
			    if($logDatas['title']){
			        unset($logDatas['old_title']);
			    }
			    if($logDatas['indus_id']){
			        unset($logDatas['old_indus_id']);
			    }
			    if($logDatas['indus_pid']){
			        unset($logDatas['old_indus_pid']);
			    }
			    if($logDatas['price']){
			        unset($logDatas['old_price']);
			    }
			    if($logDatas['pic']){
			        unset($logDatas['old_pic']);
			    }
			    if($logDatas['content']){
			        unset($logDatas['old_content']);
			    }
			    if($logDatas['unite_price']){
			        unset($logDatas['old_unite_price']);
			    }
			    if($logDatas['submit_method']){
			        unset($logDatas['old_submit_method']);
			    }
			    if($logDatas['file_path']){
			        unset($logDatas['old_file_path']);
			    }
			    if($logDatas['unit_time']){
			        unset($logDatas['old_unit_time']);
			    }
			    if($logDatas['service_time']){
			        unset($logDatas['old_service_time']);
			    }
			    if($logDatas['unite_price']){
			        unset($logDatas['old_unite_price']);
			    }
				$serviceObj= keke_table_class::get_instance("witkey_service");
				return $serviceObj->save($logDatas,array('service_id'=>intval($objid)));
			}
		}
		return false;
	}
	public static function createEditLog($objid,$objtype,$log_content){
		$logInfo =  db_factory::get_one("SELECT * FROM `".TABLEPRE."witkey_service_editlog` WHERE log_objid =".intval($objid)." and  log_type = '".$objtype."' ");
		if($logInfo['status'] =='1'){
			$tableObj = keke_table_class::get_instance("witkey_service_editlog");
			$fields['log_content'] = $log_content;
			$fields['log_time'] = time();
			return $tableObj->save($fields,array('log_id'=>intval($logInfo['log_id'])));
		}else{
			$tableObj = keke_table_class::get_instance("witkey_service_editlog");
			$fields['log_objid'] = $objid;
			$fields['log_type'] = $objtype;
			$fields['log_content'] = $log_content;
			$fields['log_time'] = time();
			$fields['status'] = 1;
			return $tableObj->save($fields);
		}
	}
	public static function getEditLogInfoByLogId($logid){
		return db_factory::get_one("SELECT * FROM `".TABLEPRE."witkey_service_editlog` WHERE log_id = ".intval($logid));
	}
	public static function getEditLogInfoByLogTypeAndObjId($objid,$objtype){
		$returnInfo = db_factory::get_one("SELECT * FROM `".TABLEPRE."witkey_service_editlog` WHERE log_objid =".intval($objid)." and status ='1' and  log_type = '".$objtype."' ");
		$returnInfo['log_content_data'] = unserialize($returnInfo['log_content']);
		return $returnInfo;
	}
	public static function delFileBySavename($savename){
		if(!$savename){
			return false;
		}
		db_factory::execute("DELETE FROM `".TABLEPRE."witkey_file` WHERE (`save_name`='{$savename}')");
		$filename = S_ROOT.'/'.$savename;
		if(file_exists($filename)){
			unlink($filename);
		}
		return true;
	}
	public static function timeTool($time){
        if($time < 60){
            $str = $time.'秒';
        }elseif($time < 3600){
            $str = round($time/60).'分钟';
        }else{
            $str = round($time/3600).'小时';
        }
        return $str;
    }
    public static function getFileId($url){
        $url = trim($url);
        $res = db_factory::get_one('select file_id from '.TABLEPRE.'witkey_file where save_name = "'.$url.'"');
        return $res['file_id'];
    }
    public static function getFileListsBySavename($save_name){
        return db_factory::query('select * from '.TABLEPRE.'witkey_file where save_name = "'.$save_name.'"');
    }
    public static function getFileInfoBySavename($save_name){
        return db_factory::get_one('select * from '.TABLEPRE.'witkey_file where save_name = "'.$save_name.'"');
    }
    public static function getFileListsByFileId($fileid){
        return db_factory::query('select * from '.TABLEPRE.'witkey_file where file_id = "'.$fileid.'"');
    }
    public static function getFileInfoByFileId($fileid){
        return db_factory::get_one('select * from '.TABLEPRE.'witkey_file where file_id = "'.$fileid.'"');
    }
}
?>