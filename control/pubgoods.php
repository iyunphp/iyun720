<?php
kekezu::check_login();
$strPageTitle = '发布作品-'.$_K ['html_title'];
$strPageKeyword = '发布作品,'.$_K ['html_title'];
$strPageDescription = $kekezu->_sys_config['index_seo_desc'];
$id = intval($id);
$step = strval(trim($step));
keke_shop_release_class::checkShopStatus($uid);
if($gUserInfo['autoshop']!=1){
    kekezu::show_msg('店铺已关闭，不能发布！','index.php',3,null,'warning');
}
$strRandKf = kekezu::get_rand_kf ();
$arrModelLists = kekezu::get_table_data ( '*', 'witkey_model', " model_type = 'shop' and model_status='1'", 'listorder', '', '', 'model_id', 3600 );
if(0 === $id){
	$arrIds = array_keys($arrModelLists);
	$id = $arrIds['0'];
}
$arrModelInfo = $arrModelLists [$id];
if(empty($arrModelInfo)){
	kekezu::show_msg('不存在该任务模型,请重新选择','index.php?do=pubtask',3,null,'warning');
}
$arrTopIndustrys = $kekezu->_indus_goods_arr;
$arrPubProcess = array(
		1=>array('step'=>'step1','desc'=>'填写描述'),
		2=>array('step'=>'step2','desc'=>'核对信息'),
		3=>array('step'=>'step3','desc'=>'成功发布')
);
$arrPayitemLists = PayitemClass::getPayitemListForPub('goods');
$arrPayitemPriceLists = PayitemClass::getPayitemPriceList('goods');
$arrStep = array('step1','step2','step3','step4');
if(!in_array($step, $arrStep)){
	$step = 'step1';
}
$strUrl = "index.php?do=pubgoods&id=".$id;
if($arrModelInfo['open_custom'] =='1'){
	$c_open = 1;
	$arrCustoms = CustomClass::getFieldListsByModelId($arrModelInfo['model_id']);
	//改造 判断全景类型 用###切割f_warning
	if(count($arrCustoms)>1){
		$arrCustoms_new = array();
		foreach($arrCustoms as $k=>$v){
			foreach($v as $kk=>$vv){
				if(count(explode('###',$vv))>1) {
					$arrCustoms_new[$k][$kk] = explode('###',$vv);
					$arrCustoms_new[$k][$kk."_select"] = 1;
				} else {
					$arrCustoms_new[$k][$kk] = $vv;
				}				
			}
		} 
		$arrCustoms = $arrCustoms_new;
	}
	//改造完
}

$arrProvinces = CommonClass::getDistrictByPid('0','id,upid,name');
$gUserInfo['province'] and $arrCities = CommonClass::getDistrictByPid($gUserInfo['province'],'id,upid,name');
$gUserInfo['city'] and $arrAreas = CommonClass::getDistrictByPid($gUserInfo['city'],'id,upid,name');
$_SESSION['spread'] = 'index.php?do=pubgoods';
require S_ROOT . "/shop/" . $arrModelInfo['model_dir'] . "/control/pub.php";