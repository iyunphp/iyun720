<?php
$intId = intval($_REQUEST['sid']);
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


if($arrServiceInfo['service_status'] != '2' && false){
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
		$js .= 'tour.js?v=84';
		$swf .= 'tour.swf?v=84';	
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
		$js .= 'tour.js?v=84';
		$swf .= 'tour.swf?v=84';	
		$xml .= 'pic/'.$intId.'/tour_my.xml?date='.microtime();
		$xml_local_url = 'pic/'.$intId.'/tour_my.xml?date='.microtime();
	break;	
	default://默认为全景图片
		$js .= 'tour.js?v=84';
		$swf .= 'tour.swf?v=84';	
		$xml .= 'pic/'.$intId.'/tour.xml?date='.microtime();
		$xml_local_url =  'pic/'.$intId.'/tour.xml?date='.microtime();
	break;	
}
//die();

//1、获取原始xml文件	
$old_xml = file_get_contents("http://www.iyun720.com/view.iyun720.com/".$xml_local_url); 
$new_xml = $old_xml;
$new_xml = str_replace('<skin_settings maps="false"','
<layer name="box1" type="container"  keep="true" align="lefttop" x="10" y="10" width="250" height="250" bgcolor="0x000000" bgalpha="0.5" bgcapture="true" text="dsfdsfdsf" maskchildren="true" ondown="draglayer();">		
	<layer name="skin_btn_left3"  style="skin_base|skin_glow" crop="0|192|64|64"  align="center"      x="-100" y="0"  scale="0.5" onclick="add_host()" showtext="dsfdsfdsf" />
</layer>
	<action name="draglayer">
		if(%1 != dragging,
			copy(drag_currentx, x);
			copy(drag_currenty, y);
			copy(drag_stagex, mouse.stagex);
			copy(drag_stagey, mouse.stagey);
			set(drag_sx, +1);
			set(drag_sy, +1);
			if(align == righttop,    set(drag_sx,-1); );
			if(align == right,       set(drag_sx,-1); );
			if(align == rightbottom, set(drag_sx,-1); set(drag_sy,-1); );
			if(align == bottom,      set(drag_sy,-1); );
			if(align == leftbottom,  set(drag_sy,-1); );
			draglayer(dragging);
		  ,
			if(pressed,
				sub(dx, mouse.stagex, drag_stagex);
				sub(dy, mouse.stagey, drag_stagey);
				mul(dx, drag_sx);
				mul(dy, drag_sy);
				add(x, drag_currentx, dx);
				add(y, drag_currenty, dy);
				delayedcall(0, draglayer(dragging) );
			  );
		  );
	</action>
 
<action name="add_host">
	 jscall("alert(\'uuuu\')");
   screentosphere(x, y, h, v);
   txtadd(hs, "hs_", get(hotspot.count));
   addhotspot(get(hs));
   set(hotspot[get(hs)].url, "http://view.iyun720.com/public/skin/vtourskin_hotspot.png");
   copy(hotspot[get(hs)].ath, h);
   copy(hotspot[get(hs)].atv, v);
   copy(hotspot[get(hs)].ondown, "draglayer()");
   jscall("alert(\'ddddddd\')");

</action>
<skin_settings maps="false"',$new_xml);

$new_xml_url = S_ROOT."view.iyun720.com/pic/".$intId."/tour_close_edit.xml";
$xmlfile = fopen($new_xml_url, "w") or die("Unable to open file!");	
fwrite($xmlfile, $new_xml);	
//参数   url=http://view.iyun720.com/pic/1/tour.xml&dir=/pic/1/
fclose($xmlfile);

//2、同步文件到七牛
$url = 'http://106.185.26.189:11221/';	
$post_str = 'url='.$new_xml_url.'&mode=4&target='.$intId;
$g = file_get_contents($url.'?'.$post_str);
$xml = "http://view.iyun720.com/pic/".$intId."/tour_close_edit.xml?date=".time();

//查询全景图相关信息
$arrServiceInfo = keke_shop_class::get_service_info ( $intId );

//查询作者信息
$arrSellerInfo = db_factory::get_one(sprintf('select * from %s a left join %s b on a.uid = b.uid where a.uid =%s',TABLEPRE.'witkey_space',TABLEPRE.'witkey_shop',intval($arrServiceInfo['uid'])));
require keke_tpl_class::template ( "shop/" . $arrModelInfo ['model_code'] . "/tpl/" . $_K ['template'] . "/view2");die;