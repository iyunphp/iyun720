<?php
$strPageTitle = '专辑列表-云游VR';
$strPageKeyword = '专辑列表-云游VR';
$strPageDescription = '专辑列表-云游VR';
$regionCfg =  keke_glob_class::getRegionConfig();
$sql = "select * from iyun_album";
$where = '';
if($search){
	$where = " where name like '%" . $search . "%'";
}
$sql .= $where;
$datas = db_factory::query($sql);

if($json == 'json'){
	header("Content-Type: text/json; charset=utf-8");  
	$type = 'success';
	if(empty($datas)){
		$type = 'error';
		$datas = db_factory::query("select * from iyun_album");
	}
	//print_r($datas);
	$json = array(
		type  => $type,
		datas => $datas
	);
	echo json_encode_u($json);
	die();
}