<?php
$strUrl = 'index.php?do=seller&view=goods&id='.intval($id);
$intPage and $strUrl .= '&intPage=' . $intPage;
$intPagesize and $strUrl .= '&intPagesize=' . $intPagesize;
$objServiceT = keke_table_class::get_instance ( 'witkey_service' );
$strWhere .= " service_status = 2  and uid=".intval($id);
$page and $intPage = intval ( $page );
$intPage = intval ( $intPage ) ? $intPage : 1;
$intPagesize = intval ( $intPagesize ) ? $intPagesize : 15;
$strWhere .= " order by service_id desc";
$arrDatas = $objServiceT->get_grid ( $strWhere, $strUrl, $intPage, $intPagesize, null, null, null );

$arrServiceLists = $arrDatas ['data'];
if(is_array($arrServiceLists)){
	foreach ($arrServiceLists as $k=>$v) {
		$arrFavorite = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and obj_id = %d and keep_type = "service"',TABLEPRE.'witkey_favorite',intval($gUid),intval($v['service_id'])));
		if($arrFavorite){
			$arrServiceLists[$k]['favorite'] = true;
		}
		$file_type = strtolower(substr(strrchr($arrServiceLists[$k]['file_path'], '.'), 1));
		if(in_array($file_type,array('mp4','mov'))){
			$arrServiceLists[$k]['file_type'] = '<div class="file_type"></div>';
		}
		unset($arrFollow);
	}
}

$strPages = $arrDatas ['pages'];




//if(intval($views)>=1){
	//更新店铺浏览量
	if($_GET['act']=='test'){
		echo sprintf('update %s set views=views+1 where uid = %s ',TABLEPRE.'witkey_shop',intval($id));
		db_factory::query(sprintf('update %s set views=views+1 where uid = %s ',TABLEPRE.'witkey_shop',intval($id)));
		die();
	}
	db_factory::query(sprintf('update %s set views=views+1 where uid = %s ',TABLEPRE.'witkey_shop',intval($id)));
//}
