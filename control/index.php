<?php

if($json == 'json'){
	header("Content-Type: text/json; charset=utf-8"); 
	$slide = array();
	$keywordDatas = db_factory::query("select service_id as mid, title, uid, username, file_path, on_time, views as popular, content as summary from iyun_witkey_service where service_status=2  order by goodstop desc, on_time desc limit 5, 15");

	foreach($keywordDatas as $k => $v){
		
		$keywordDatas[$k]['file_path'] = explode(',', $keywordDatas[$k]['file_path']);
		$keywordDatas[$k]['file_path'] = $keywordDatas[$k]['file_path'][0];
		
		$imgs = keke_shop_class::output_pics($v['file_path'],300,1,1,$v['mid']);
		$keywordDatas[$k]['thumbnail'] = $imgs;
		//$keywordDatas[$k]['thumbnail'] = $v['file_path'];
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
		
		
		$keywordDatas[$k]['user_profile'] = "http://" . $_SERVER['SERVER_NAME'] . "/data/avatar/000/00/00/" . $v['uid'] . "_avatar_middle.jpg";
		$keywordDatas[$k]['is_my_favorite'] = 0;
	
		
		$keywordDatas[$k]['favorite'] = get_favorite($v['mid']);
		$keywordDatas[$k]['popular'] = 0;

		$keywordDatas[$k]['comment'] = get_comment($v['mid']);

		unset($keywordDatas[$k]['file_path']);

	}
	
	$datas = db_factory::query("select * from iyun_album order by pr desc");
	$json = array(
		'slide' => array_slice($keywordDatas, 0, 5),
		'hot' => array_slice($keywordDatas, 5, 5),
		'album' => $datas 
	);
	$json = json_encode_u($json);
	$json = str_replace('&lt;', '', $json);
	$json = str_replace('&gt;', '',  $json);
	$json = str_replace('\n', '',  $json);
	$json = strip_tags($json);
	echo $json;
	die();
}

defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );

function get_file_type($file_type){
	
	$file_type = strtolower(substr(strrchr($file_type, '.'), 1));

	if(in_array($file_type,array('mp4','mov'))){
		return '<div class="file_type"></div>';
	}
	return '';
}

$strNavActive ='index';
$intIndexCacheTime = 3600;
$strPageTitle = $kekezu->_sys_config['index_seo_title'];
$strPageKeyword = $kekezu->_sys_config['index_seo_keyword'];
$strPageDescription = $kekezu->_sys_config['index_seo_desc'];
$_SESSION['spread'] = 'index.php?do=index';
$strThemePath = S_ROOT . SKIN_PATH . '/theme/';
if ($_K ['theme']) {
	require S_ROOT.'/tpl/default/theme/'.$_K ['theme'].'/index.php';die;
}else{
	$arrIndusTask = $kekezu->get_classify_indus('task','child');
	$arrIndusPt = $kekezu->_indus_task_arr;
	if(is_array($arrIndusTask)){
		$arrNewIndusCt = array();
		foreach($arrIndusTask as $k=>$v){
			$arrNewIndusCt[$v['indus_pid']][] = $v;
		}
	}
	$arrIndusShop = $kekezu->get_classify_indus('shop','child');
	$arrIndusPs = $kekezu->_indus_goods_arr;
	if(is_array($arrIndusShop)){
		$arrNewIndusCs = array();
		foreach($arrIndusShop as $k=>$v){
			$arrNewIndusCs[$v['indus_pid']][] = $v;
		}
	}
	$arrBulletins = db_factory::query(sprintf("select art_id,art_title,listorder,is_recommend,pub_time from %switkey_article where cat_type='article' and art_cat_id=17 order by is_recommend desc, listorder asc, pub_time desc limit 0,5",TABLEPRE),1,$intIndexCacheTime);
	$arrDynamics = kekezu::get_feed ( "feedtype='work_accept'", "feed_time desc", 5 ); 
	$arrWithdraws = db_factory::query(sprintf("select * from %switkey_withdraw where withdraw_status=2 order by process_time desc limit 0,5",TABLEPRE),1,$intIndexCacheTime);
	if ($task_open) {
		$arrCashCoverage = kekezu::get_cash_cove ( '', true );
		$final_task = kekezu::get_classify_indus();
		$arrRecommTaskLists = db_factory::query(sprintf("select task_id,task_title,task_cash,task_cash_coverage,username,work_num from %switkey_task where  task_status=2 order by start_time desc limit 21",TABLEPRE),1,$intIndexCacheTime);
	}
	if ($shop_open) {
		$final_shop = kekezu::get_classify_indus('shop');		
		//$arrRecommGoodsLists = db_factory::query(sprintf("select service_id,title,price,unite_price,pic,username from %switkey_service where  service_status=2 order by  on_time desc limit 12",TABLEPRE),1,$intIndexCacheTime);
		//改造 新增扩展字段
		$arrRecommGoodsLists = db_factory::query(sprintf("select a.service_id,a.title,a.price,a.file_path,a.unite_price,a.pic,a.username,a.uid,b.extdata from %switkey_service a left join  %switkey_custom_fields_ext b on a.service_id=b.objid and b.c_id=5 where a.service_status=2 and a.is_top=1 order by a.on_time desc limit 7",TABLEPRE,TABLEPRE),1,$intIndexCacheTime);
		foreach($arrRecommGoodsLists as $k=>$v){
			$arrRecommGoodsLists[$k]['tag'] = unserialize($v['extdata']); 
			$file_type = strtolower(substr(strrchr($arrRecommGoodsLists[$k]['file_path'], '.'), 1));
			if(in_array($file_type,array('mp4','mov'))){
				$arrRecommGoodsLists[$k]['file_type'] = '<div class="file_type"></div>';
			}
		}	
	}
	$strSql   = ' select a.case_id,a.obj_id,a.obj_type,a.case_img,a.case_title,a.case_price ';
	$task_open and $strSql.=',b.work_num,b.model_id,b.username,b.uid ';
	$task_open and $strSql.=' ,c.sale_num,c.model_id,c.username,b.uid ';
	$strSql.=' from '.TABLEPRE.'witkey_case a ';
	$task_open and $strSql.=' left join '.TABLEPRE.'witkey_task b ON a.obj_id = b.task_id ';
	$shop_open or $strSql.=' where a.obj_type="task" ';
	$shop_open and $strSql.=' left join '.TABLEPRE.'witkey_service c on  a.obj_id= c.service_id ';
	$task_open or $strSql.=' where a.obj_type="service" ';
	$strSql .= " order by a.on_time desc limit 9 ";
	//echo $strSql;
	
	//select a.case_id,a.obj_id,a.obj_type,a.case_img,a.case_title,a.case_price ,b.work_num,b.model_id,b.username,b.uid ,c.sale_num,c.model_id,c.username,b.uid from iyun_witkey_case a left join iyun_witkey_task b ON a.obj_id = b.task_id left join iyun_witkey_service c on a.obj_id= c.service_id order by a.on_time desc limit 9
	
	//select a.case_id,a.obj_id,a.obj_type,a.case_img,a.case_title,a.case_price ,c.sale_num,c.model_id,c.username,b.uid from iyun_witkey_case a left join iyun_witkey_service c on a.obj_id= c.service_id where a.obj_type="service" order by a.on_time desc limit 9
	$arrCaseLists =  db_factory::query($strSql,1,$intIndexCacheTime);
	if(!$basic_config['css_auto_fit']){
		$arrCaseLists = array_merge(array($arrCaseLists[0]),$arrCaseLists);
		if(count($arrCaseLists)>9){
			unset($arrCaseLists[9]);
		}
	}
	$arrDynamicPlays = kekezu::get_feed ( "feedtype='work_accept'", "feed_time desc", 10 ); 
	$arrRecommShops = db_factory::query ( sprintf ( "select a.username,a.uid,a.shop_slogans,a.focus_num,a.views,b.indus_id,b.indus_pid,a.shop_name,c.name,if(b.seller_total_num>0,b.seller_good_num/b.seller_total_num,0) as good_rate from %switkey_shop a "
			." left join %switkey_space b on a.uid=b.uid left join %switkey_district c on c.id=a.city  where b.recommend=1 and b.status=1 and IFNULL(a.is_close,0)=0 and shop_status=1 order by good_rate desc limit 0,4", TABLEPRE,TABLEPRE,TABLEPRE), 1, $intIndexCacheTime );
	/*echo "<pre>";
	print_r($arrRecommShops);*/
	foreach($arrRecommShops as $k=>$v){
		$arrService = db_factory::query("select service_id,title,pic,file_path from ".TABLEPRE."witkey_service where service_status=2 and uid=".intval($v['uid'])." order by on_time desc limit 0,2");
		$arrNerLists[$k] = $v;
		$arrNerLists[$k]['service'] = $arrService;
		$intGoodsCount =db_factory::get_one(sprintf('select count(*) as num from %s where uid = %d and service_status = 2 ',TABLEPRE.'witkey_service ',intval($v['uid'])));	
		$arrNerLists[$k]['service_num'] = $intGoodsCount['num'];

	}
	foreach($arrNerLists as $k => $v){
		$arrNerLists[$k]['follow'] = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and fuid = %d',TABLEPRE.'witkey_free_follow',intval($uid),intval($arrNerLists[$k]['uid'])));
	}
	
	/*echo "<pre>";
	print_r($arrNerLists);
	die();*/
	
	$arrArticleTop = db_factory::get_one("select * from ".TABLEPRE."witkey_article where cat_type='article' and  LENGTH(art_pic)>20 order by pub_time desc limit 1",1,$intIndexCacheTime);
	$arrArticleLists = db_factory::query("select * from ".TABLEPRE."witkey_article where cat_type='article' and art_id !='".$arrArticleTop['art_id']."' order by pub_time desc limit 6",1,$intIndexCacheTime);
	$arrPubToday = db_factory::query("select count(*) as count from ".TABLEPRE."witkey_task where date(from_unixtime(start_time)) = curdate() and task_status>=2",1,$intIndexCacheTime);
	$arrAcceptTask = db_factory::query("SELECT obj_id FROM ".TABLEPRE."witkey_feed where obj_id>0 and feedtype='work_accept' and date(from_unixtime(feed_time)) = curdate() group by obj_id ; ",1,$intIndexCacheTime);
	$arrAcceptToday = count($arrAcceptTask);
	$arrCashToday = db_factory::query("SELECT sum(fina_cash) as cash FROM ".TABLEPRE."witkey_finance where (fina_action='task_bid' or fina_action='sale_service')  and date(from_unixtime(fina_time)) = curdate()  ;",1,$intIndexCacheTime);
	$arrPubAll = db_factory::query("select count(*) as count from ".TABLEPRE."witkey_task where task_status>=2",1,$intIndexCacheTime);
	$arrAcceptTasks = db_factory::query("SELECT obj_id FROM ".TABLEPRE."witkey_feed where obj_id>0 and feedtype='work_accept'  group by obj_id  ;",1,$intIndexCacheTime);
	$arrAcceptAll = count($arrAcceptTasks);
	$arrCashAll = db_factory::query("SELECT sum(fina_cash)  as cash FROM ".TABLEPRE."witkey_finance where (fina_action='task_bid' or fina_action='sale_service')  ;",1,$intIndexCacheTime);
	$arrFlink = kekezu::get_table_data("link_id,link_name,link_url,listorder","witkey_link",""," listorder asc","","","",$intIndexCacheTime);
	
	$links = db_factory::query("select link_name,link_url from iyun_witkey_link order by listorder desc");
} 
