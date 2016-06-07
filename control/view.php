<?php
$intId = intval($_REQUEST['sid']);
if(isMobile() && false){
	if($_GET['n'] != 'f')
	{
		header("Location: /index.php?do=view3&sid=" . $intId);
		die();
	}
	else
	{
		if($_GET['test'] != 'test')
		{
			$no_menu = true;
		}
	}
}
$arrServiceInfo = keke_shop_class::get_service_info ( $intId );
keke_shop_class::plus_view_num($intId, $arrServiceInfo['uid']);
$arrModelInfo = $model_list [$arrServiceInfo ['model_id']];
$arrServiceInfo or kekezu::show_msg(kekezu::lang("operate_notice"),"index.php?do=goodslist",2,"对不起，您访问的页面没找到！","warning");
$arrView = array('sale','comment','mark','content');


$strUrl = "index.php?do=goods&id=".$intId; 
if(!in_array($view, $arrView)){
	$view = 'content';
}
if($arrServiceInfo['indus_id']){
	$indusInfo = CommonClass::getIndustryById($arrServiceInfo['indus_id']);
}elseif ($arrServiceInfo['indus_pid']){
	$indusInfo = CommonClass::getIndustryById($arrServiceInfo['indus_pid']);
}
if($arrServiceInfo['seo_title']){
	$strPageTitle = $arrServiceInfo['seo_title'];
}else{
	if($indusInfo['seo_title']){
		$strPageTitle = $indusInfo['seo_title'];
	}else{
		$strPageTitle = $arrServiceInfo['title'].'-'.$indus_arr[$arrServiceInfo['indus_id']]['indus_name'].','.$indus_p_arr[$arrServiceInfo['indus_pid']]['indus_name'].'-'.$_K['html_title'];
	}
}
if($arrServiceInfo['seo_keyword']){
	$strPageKeyword = $arrServiceInfo['seo_keyword'];
}else{
	if($indusInfo['seo_keyword']){
		$strPageTitle = $indusInfo['seo_keyword'];
	}else{
	$strPageKeyword = $indus_arr[$arrServiceInfo['indus_id']]['indus_name'].','.$indus_p_arr[$arrServiceInfo['indus_pid']]['indus_name'];
	}
}
if($arrServiceInfo['seo_desc']){
	$strPageDescription =  $arrServiceInfo['seo_desc'];
}else{
	if($indusInfo['seo_desc']){
		$strPageTitle = $indusInfo['seo_desc'];
	}else{
		$strPageDescription = kekezu::cutstr($arrServiceInfo['content'],100);
	}
}

if($arrModelInfo['open_custom'] =='1'){
	$c_open = 1;
	$arrShowCustoms = CustomClass::getExtData($arrServiceInfo['service_id'],$arrModelInfo['model_id']);
	foreach ($arrShowCustoms as $k=>$v){
		if($v['extdata']){
			$arrShowCustoms[$k]['data'] =unserialize($v['extdata']);
		}
	}
}

//获取预览文件路径
$view = array();
if(count($arrShowCustoms) > 1){
	foreach($arrShowCustoms as $v){
		foreach($v['data'] as $kk => $vv){
			$view[$kk] = $vv['content'];
		}
	}	
}

if(trim($view['view_url']) != ''){
	header("location:".$view['view_url']);
	die();
}



/*$img_dir = '';	
$array = explode('/',$arrServiceInfo["file_path"]);
$k = array_slice($array,-1,1);
$array = explode('.',$k[0]);
$k = array_slice($array,0,1);
if($view['view_type'] == "全景图片"  || $view['view_type'] == "全景图片VR"){		
	
	$img_dir = "vtour/panos/".$k[0].".tiles";
	echo 'http://view.iyun720.com/pic/'.$intId.'/'.$img_dir.'/thumb.jpg';
	if(!file_exists('http://view.iyun720.com/pic/'.$intId.'/'.$img_dir.'/thumb.jpg')){
		die('<h1 style="text-align:center; margin:3em auto;">作品审核中,请稍后访问！</h1>');
	}
	

}	*/
if($arrServiceInfo['service_status'] != '2'){
		die('<h1 style="text-align:center; margin:3em auto;">作品审核中,请稍后访问！</h1>');
}

//createXML($intId);
/**
 *重新生成全景XML文件（仅支持:全景图片，全景图片VR，全景视频，暂不支持全景漫游）
 *参数一：$view = array('view_type'=>'全景图片','view_music'=>'','view_rotation'=>'小行星');
 *参数二：$arrServiceInfo = array('service_id'=>8,'file_path'=>'http://7xo6os.com2.z0.glb.qiniucdn.com/iyun720_1447835862000_47704361.jpg');
**/



//生成js、swf、xml地址
$js = 'http://view.iyun720.com/public/';
$swf = 'http://view.iyun720.com/public/';
$xml = 'http://view.iyun720.com/';
$xml_local_url = '';

//判断是否为全景视频
$video_type = array('mp4','mov');	
$up_video_type = substr(strrchr($arrServiceInfo["file_path"], '.'), 1);
if(in_array($up_video_type,$video_type)){	
	$view['view_type'] = '全景视频';
}

switch($view['view_type']){
	case '全景图片':		
		/*$js .= 'iyun720.js';
		$swf .= 'iyun720.swf';	
		$xml .= 'pic/'.$intId.'/pic.xml?date='.microtime();
	break;	*/
	case '全景图片VR':		
		$js .= 'krpano.js?v=88';
		$swf .= 'krpano.swf?v=88';	
		$xml .= 'pic/'.$intId.'/tour.xml?date='.microtime();
		$xml_local_url = 'pic/'.$intId.'/tour.xml?date='.microtime();
	break;	
	case '全景视频':
		$js .= 'embedpano.js';
		$swf .= 'iyun720.swf';
		$xml .= 'video/'.$intId.'/video.xml?date='.microtime();
		$xml_local_url = 'video/'.$intId.'/video.xml?date='.microtime();
	break;	
	case '全景漫游':
		/*$js = 'tour.js';
		$swf = 'tour.swf';	
		$dir = 'tour'.$intId.'/tour.xml?date='.microtime();
	break;	*/
	case '全景漫游VR':
		$js .= 'krpano.js?v=88';
		$swf .= 'krpano.swf?v=88';	
		$xml .= 'pic/'.$intId.'/tour_my.xml?date='.microtime();
		$xml_local_url = 'pic/'.$intId.'/tour_my.xml?date='.microtime();
	break;	
	default://默认为全景图片
		$js .= 'krpano.js?v=88';
		$swf .= 'krpano.swf?v=88';	
		$xml .= 'pic/'.$intId.'/tour.xml?date='.microtime();
		$xml_local_url =  'pic/'.$intId.'/tour.xml?date='.microtime();
	break;	
}
//die();

$view = $arrServiceInfo['view'];
$view ++;
db_factory::execute("update iyun_witkey_service set view = '" . $view . "' where service_id = " . $arrServiceInfo['service_id']);

//是否关闭音乐
$music = intval($_REQUEST['music']);


//查询全景图相关信息
$arrServiceInfo = keke_shop_class::get_service_info ( $intId );

$datas = db_factory::query("SELECT * FROM iyun_v_pinglun where vid = " . $intId . ' order by id desc limit 5');
$count = db_factory::query("SELECT count(*) as count FROM iyun_v_pinglun where vid = " . $intId);
$count = $count[0]['count'];
$bd_xml = str_replace('http://view.iyun720.com/', 'http://www.iyun720.com/view.iyun720.com/', $xml);
/*
$url = 'http://106.185.26.189:11221/';	
$post_str = 'url='.$bd_xml.'&mode=4&target='.$arrServiceInfo['service_id'];
file_get_contents($url.'?'.$post_str);
*/
//查询作者信息
$arrSellerInfo = db_factory::get_one(sprintf('select * from %s a left join %s b on a.uid = b.uid where a.uid =%s',TABLEPRE.'witkey_space',TABLEPRE.'witkey_shop',intval($arrServiceInfo['uid'])));
if($n != 'f'){
	require keke_tpl_class::template ( "shop/" . $arrModelInfo ['model_code'] . "/tpl/" . $_K ['template'] . "/view3");die;
}else{
	require keke_tpl_class::template ( "shop/" . $arrModelInfo ['model_code'] . "/tpl/" . $_K ['template'] . "/view");die;
}

