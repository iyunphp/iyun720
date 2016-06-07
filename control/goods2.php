<?php
$albumDatas = db_factory::get_one("select * from iyun_album where id='" . $id . "'");

if($json == 'json'){
	$keywordDatas = db_factory::query("select service_id as mid, title, uid, username, file_path, on_time, views as popular, content as summary from iyun_witkey_service where title like '%" . $albumDatas['keywords'] . "%' and service_status=2 order by on_time desc");
	header("Content-Type: text/json; charset=utf-8"); 
	foreach($keywordDatas as $k => $v){
		$keywordDatas[$k]['file_path'] = explode(',', $keywordDatas[$k]['file_path']);
		$keywordDatas[$k]['file_path'] = $keywordDatas[$k]['file_path'][0];
		
		$imgs = keke_shop_class::output_pics($keywordDatas[$k]['file_path'],300,1,1,$v['mid']);
		$keywordDatas[$k]['thumbnail'] = $imgs;
		$file_type = strtolower(substr(strrchr($keywordDatas[$k]['file_path'], '.'), 1));
		if(in_array($file_type,array('mp4','mov'))){
			$keywordDatas[$k]['type'] = 2;
			$keywordDatas[$k]['high_resolution'] = add_last($keywordDatas[$k]['file_path'], '1920_');
			$keywordDatas[$k]['standard_resolution'] = add_last($keywordDatas[$k]['file_path'], '1080_');
			$keywordDatas[$k]['low_resolution'] = add_last($keywordDatas[$k]['file_path'], '854_');
			
		}
		else
		{
			$keywordDatas[$k]['type'] = 1;
			$keywordDatas[$k]['high_resolution'] = $keywordDatas[$k]['file_path'];
			$keywordDatas[$k]['standard_resolution'] = get_short_img($keywordDatas[$k]['file_path'], $keywordDatas[$k]['mid']);
			$keywordDatas[$k]['low_resolution'] = get_short_img($keywordDatas[$k]['file_path'], $keywordDatas[$k]['mid']);
		}

		$keywordDatas[$k]['user_profile'] = "http://www.iyun720.com/data/avatar/000/00/00/" . $v['uid'] . "_avatar_middle.jpg";
		$keywordDatas[$k]['is_my_favorite'] = 0;
		$keywordDatas[$k]['favorite'] = get_favorite($v['mid']);
		$keywordDatas[$k]['popular'] = 0;	
		unset($keywordDatas[$k]['file_path']);
	}
	
	$json = array(
		'type'  =>  'success',
		'datas' => $keywordDatas
	);
	$json = json_encode_u($json);
	$json = strip_tags($json);
	echo $json;
	die();
}
$keywordDatas = db_factory::query("select * from iyun_witkey_service where title like '%" . $albumDatas['keywords'] . "%' and service_status=2 order by on_time desc");
$keywordLength = count($keywordDatas);
if($keywordLength == 0){
	echo "select * from iyun_album where id='" . $id . "'";
}
$listLength = intval($keywordLength / 6);
$listLast = $keywordLength % 6;
$list = array();
for($i = 0; $i < $listLength; $i ++){
	$temp = array();
	for($j = 0; $j < 6; $j ++){
		$tempData = $keywordDatas[$i * 6 + $j];
		if(strpos($tempData['file_path'], ',') !== false){
			$file_path = explode(',', $tempData['file_path']);
			$tempData['file_path'] = $file_path[0];
		}
		$file_type = strtolower(substr(strrchr($tempData['file_path'], '.'), 1));
		if(in_array($file_type,array('mp4','mov'))){
			$tempData['file_type'] = '<div class="file_type"></div>';
		}
		$temp[] = $tempData;
	}
	$list[] = $temp;
}
$LastArray = array(); 
for($i = 0; $i < $listLast; $i++){
	$LastArray[] = $keywordDatas[$listLength * 6 + $i];
}
$strPageTitle = $albumDatas['name'];
if(empty($sid)){
	$sid = $keywordDatas[0]['service_id'];
}
require keke_tpl_class::template ( "shop/goods/tpl/" . $_K ['template'] . "/index2");
die();