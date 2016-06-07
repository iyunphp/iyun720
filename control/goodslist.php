<?php
if(empty($start)){
	$start = 0;
}
if(empty($limit)){
	$limit = 14;
}
$where = '';
if($search){
	$where .= " and title like '%" . $search . "%'";
}
if($json == 'json'){
	header("Content-Type: text/json; charset=utf-8"); 
	$slide = array();
	$type = 'success';
	$sql = "select service_id as mid, title, uid, username, file_path, on_time, views as popular, content as summary from iyun_witkey_service where service_status=2 and file_path like '%.jpg%' " . $where . "  order by goodstop desc, on_time desc limit " . $start . "," . $limit;
	$keywordDatas = db_factory::query($sql);
	if(empty($keywordDatas)){
		$type = 'error';
		$keywordDatas = db_factory::query("select service_id as mid, title, uid, username, file_path, on_time, views as popular, content as summary from iyun_witkey_service where service_status=2 and (file_path like '%.mp4%' or file_path like '%.mov%')  order by goodstop desc, on_time desc limit 5, 10");
	}
	foreach($keywordDatas as $k => $v){
		$keywordDatas[$k]['file_path'] = explode(',', $keywordDatas[$k]['file_path']);
		$keywordDatas[$k]['file_path'] = $keywordDatas[$k]['file_path'][0];
		
		$imgs = keke_shop_class::output_pics($v['file_path'],300,1,1,$v['mid']);
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
		$keywordDatas[$k]['favorite'] = 0;
		$keywordDatas[$k]['popular'] = 0;	
		unset($keywordDatas[$k]['file_path']);
	}
	$json = array(
		'type' => $type,
		'list' => $keywordDatas
	);
	$json = json_encode_u($json);
	$json = str_replace('&lt;', '', $json);
	$json = str_replace('&gt;', '',  $json);
	$json = str_replace('\n', '',  $json);
	$json = strip_tags($json);
	echo $json;
	die();
}
$regionCfg =  keke_glob_class::getRegionConfig();
$strNavActive = 'goodslist';
$i = intval($i);
$pd = intval($pd);
$strUrl = "index.php?do=goodslist";
$m and $strUrl .="&m=".intval($m);
$intPage and $strUrl .="&intPage=".intval($intPage);
$i and $strUrl .="&i=".intval($i);
$pd and $strUrl .="&pd=".intval($pd);
$o and $strUrl .="&o=".strval($o);
$p and $strUrl .="&p=".intval($p);
$ky and  $strUrl .="&ky=".$ky;
$arrCashCoves = TaskClass::getTaskCashCove();
$pd and $arrIndusPInfo = kekezu::get_indus_info($pd);
$i and $arrIndusInfo = kekezu::get_indus_info($i);
$arrCityInfo =  CommonClass::getDistrictById($p);
$arrDisplaypro = CommonClass::getDistrictByPid('0','id,upid,name');
$arrItemConfig = PayitemClass::getPayitemConfig ( null, null, null, 'item_id' );
$arrIndusP = $kekezu->_indus_goods_arr;
$arrIndusC = $kekezu->get_classify_indus('shop','child');
if(is_array($arrIndusC)){
	$arrNewIndusC = array();
	foreach($arrIndusC as $k=>$v){
		$arrNewIndusC[$v['indus_pid']][] = $v;
	}
}
if (isset ( $ky )) {
	$ky = htmlspecialchars ( $ky );
	$ky = kekezu::escape ( $ky );
	$arrHwStatus = db_factory::query("select v from ".TABLEPRE."witkey_basic_config where k='hot_words_status'");
	$arrUpdateStatus = db_factory::query("select v from ".TABLEPRE."witkey_basic_config where k='update_status'");
	$arrSearch = db_factory::query("select * from ".TABLEPRE."witkey_hotwords where words = '$ky'");
	if($arrHwStatus[0]['v'] == 'open'){
	    if($arrUpdateStatus[0]['v'] == 'auto'){
	        if(count($arrSearch)){
	            db_factory::updatetable(TABLEPRE."witkey_hotwords", array('count'=>$arrSearch[0]['count']+1,'time'=>time()), array('words'=>$arrSearch[0]['words']));
	        }else{
	            db_factory::inserttable(TABLEPRE."witkey_hotwords", array('words'=>$ky,'time'=>time(),'auto'=>'1'));
	        }
	    }else{
	        if(count($arrSearch)){
	            db_factory::updatetable(TABLEPRE."witkey_hotwords", array('count'=>$arrSearch[0]['count']+1,'time'=>time()), array('words'=>$arrSearch[0]['words'],'auto'=>'0'));
	        }
	    }
	}
}
$arrPayitemConfig = keke_payitem_class::get_payitem_config ( null, null, null, 'item_id' );
$arrIndusAll = $kekezu->_indus_arr;
$arrModelLabel = array(	0 =>'未知',1=>'单人',	2=>'多人',	3=>'计件',	4=>'招标',	5=>'订金',	6=>'文件',	7=>'服务');
$page and $intPage = intval($page);
$intPage = intval ( $intPage ) ? $intPage : 1;
$intPagesize = intval ( $intPagesize ) ? $intPagesize : $limit;
if(trim($ky) != ''){
$strSql = "select a.*,substring(payitem_time,instr(a.payitem_time,'top')+4+LENGTH('top'),10) as top_time
		   from " . TABLEPRE . "witkey_service as a," . TABLEPRE . "witkey_custom_fields_ext as b where ";
}else{
$strSql = "select a.*,substring(payitem_time,instr(a.payitem_time,'top')+4+LENGTH('top'),10) as top_time
		   from " . TABLEPRE . "witkey_service as a where ";
}
$strWhere = " service_status=2 ";
$strWhere .= " and (file_path like '%.jpg')";
if (intval ( $i )) {
	$strWhere .= " and a.indus_id = ".intval($i);
}
if (intval ( $pd )) {
	$strWhere .= " and a.indus_pid = ".intval($pd);
}
if (intval ( $m )) {
	$strWhere .= " and a.model_id = ".intval($m);
}
if (intval ( $p )) {
	$arrCityone =  CommonClass::getDistrictById($p);
	$strWhere .= " and a.province = ".intval($p);
	$two=db_factory::get_table_data("*","witkey_district","upid=".intval($p));
}
if (intval ( $twoid )) {
	$arrCitytwo =  CommonClass::getDistrictById($twoid);
	$strWhere .= " and a.city = ".intval($twoid);
	$three=db_factory::get_table_data("*","witkey_district","upid=".intval($twoid));
	$twoid and $strUrl .="&twoid=".intval($twoid);
}
if (intval ( $threeid )) {
	$arrCitythree =  CommonClass::getDistrictById($threeid);
	$strWhere .= " and a.area = ".intval($threeid);
}
if(trim($ky) != ''){
	$ky and $strWhere .= " and a.service_id = b.objid  and (a.title like '%$ky%' or (b.extdata like '%$ky%' and b.c_id = 5)) ";
}
$intCount = db_factory::execute ( $strSql . $strWhere );
if(isset($o)){
	switch(intval($o)){
		case '1':
			$strWhere .=" order by a.sale_num desc ";
			break;
		case '2':
			$strWhere .=" order by a.sale_num asc ";
			break;
		case '3':
			$strWhere .=" order by a.price desc ";
			break;
		case '4':
			$strWhere .=" order by a.price asc ";
			break;
	}
}else{
	$strWhere .= " order by a.goodstop desc, a.on_time desc ";
}
$strPages = $kekezu->_page_obj->getPages ( $intCount, $intPagesize, $intPage, $strUrl );
$strWhere .= $strPages ['where'];
$arrServices = db_factory::query ( $strSql . $strWhere );
$tempArr = array();
$newArrServices =array();
foreach($arrServices as $k => $v){
	if(!in_array($v['title'], $tempArr)){
		$tempArr[] = $v['title'];
		$newArrServices[] = $v;
	}
	
}
$arrServices = ($newArrServices);

if(is_array($arrServices)){
	foreach ($arrServices as $k=>$v) {
		$arrFavorite = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and obj_id = %d and keep_type = "service"',TABLEPRE.'witkey_favorite',intval($gUid),intval($v['service_id'])));
		if($arrFavorite){
			$arrServices[$k]['favorite'] = true;
		}
		$province = CommonClass::getDistrictById($v['province']);
		$city = CommonClass::getDistrictById($v['city']);
		$area = CommonClass::getDistrictById($v['area']);
		$arrServices[$k]['province_name'] = $province['name'];
		$arrServices[$k]['city_name'] = $city['name'];
		$arrServices[$k]['area_name'] = $area['name'];
		
		$imgs = keke_shop_class::output_pics($v['file_path'],300,1,1,$v['service_id']);
		$arrServices[$k]['thumbnail'] = $imgs;
		
		//判断文件类型，如果是视频，在图片上添加视频图标		
		$file_type = strtolower(substr(strrchr($arrServices[$k]['file_path'], '.'), 1));
		if(in_array($file_type,array('mp4','mov'))){
			$arrServices[$k]['file_type'] = '<div class="file_type"></div>';
		}
		unset($arrFollow);
	}
}
//echo "<pre>";
//print_r($arrServices);
//die();

$arrFeedPubs = kekezu::get_feed("(feedtype='pub_task' or feedtype='pub_service')", "feed_time desc", 8 );
$arrRecommShops = db_factory::query ( sprintf ( "select a.username,a.uid,b.indus_id,b.indus_pid,a.shop_name,if(b.seller_total_num>0,b.seller_good_num/b.seller_total_num,0) as good_rate from %switkey_shop a "
		." left join %switkey_space b on a.uid=b.uid  where b.recommend=1 and b.status=1 and IFNULL(a.is_close,0)=0 and shop_status=1 order by good_rate desc limit " . $start . "," . $limit, TABLEPRE,TABLEPRE ), 1, $intIndexCacheTime );
$arrGoodsType = array('6'=>'文件','7'=>'服务');
$data = array(
	'地区'=>$arrCityone['name'].$arrCitytwo['name'].$arrCitythree['name'],
	'作品类型'=>$arrGoodsType[$m],
	'行业'=>$arrIndusPInfo['indus_name'],
	'子行业'=>$arrIndusInfo['indus_name']
);
list($strPageTitle,$strPageKeyword,$strPageDescription) =  keke_seo_class::getListSEO($pd, $i, $data,'goods',true);
$_SESSION['spread'] = 'index.php?do=goodslist';

function get_good_rate($rateuid){
	$good_rate=db_factory::get_one("select if(seller_total_num>0,seller_good_num/seller_total_num,0) as good_rate from ".TABLEPRE."witkey_space where uid=".intval($rateuid));
	return $good_rate[good_rate];
}

