<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
/* 说明：
 * 首页
 * @file  newfile.php
 * @author yangjuan <1907169041@qq.com>
 * @time  2014-2-16 上午10:02:31
 * @copyright (c) 2007-2014 http://www.iyun720.com All rights reserved.
 */


/**
 *任务所有子行业
 */
$arrIndusTask = $kekezu->get_classify_indus('task','child');
$arrIndusPt = $kekezu->_indus_task_arr;
/**
 * 任务子行业按父行业分组
 */
if(is_array($arrIndusTask)){
	$arrNewIndusCt = array();
	foreach($arrIndusTask as $k=>$v){
		$arrNewIndusCt[$v['indus_pid']][] = $v;
	}
}
/**
 *作品所有子行业
 */
$arrIndusShop = $kekezu->get_classify_indus('shop','child');
$arrIndusPs = $kekezu->_indus_goods_arr;
/**
 * 作品子行业按父行业分组
 */
if(is_array($arrIndusShop)){
	$arrNewIndusCs = array();
	foreach($arrIndusShop as $k=>$v){
		$arrNewIndusCs[$v['indus_pid']][] = $v;
	}
}
/**
 *公告
 */
$arrBulletins = db_factory::query(sprintf("select art_id,art_title,listorder,is_recommend,pub_time from %switkey_article where cat_type='article' and art_cat_id=17 order by is_recommend desc, listorder asc, pub_time desc limit 0,5",TABLEPRE),1,$intIndexCacheTime);
/**
 * 中标通知
*/
$arrDynamics = kekezu::get_feed ( "feedtype='work_accept'", "feed_time desc", 5 ); // 动态信息
/**
 * 提现
*/
$arrWithdraws = db_factory::query(sprintf("select * from %switkey_withdraw where withdraw_status=2 order by process_time desc limit 0,5",TABLEPRE),1,$intIndexCacheTime);
/**
 * 任务列表
*/
if ($task_open) {
	$arrCashCoverage = kekezu::get_cash_cove ( '', true );
	$final_task = kekezu::get_classify_indus();
	$arrRecommTaskLists = db_factory::query(sprintf("select task_id,task_title,task_cash,task_cash_coverage,username,work_num from %switkey_task where  task_status=2 order by  start_time desc limit 21",TABLEPRE),1,$intIndexCacheTime);
}
/**
 * 作品列表
 */
if ($shop_open) {
	$final_shop = kekezu::get_classify_indus('shop');
	//行业推荐任务
	$arrRecommGoodsLists = db_factory::query(sprintf("select service_id,title,price,unite_price,pic,username from %switkey_service where  service_status=2 order by  on_time desc limit 8",TABLEPRE),1,$intIndexCacheTime);;
}
/**
 * 首页案例
 */
$strSql   = ' select a.case_id,a.obj_id,a.obj_type,a.case_img,a.case_title,a.case_price ';
$task_open and $strSql.=',b.work_num,b.model_id,b.username,b.uid ';
$shop_open and $strSql.=' ,c.sale_num,c.model_id,c.username,b.uid ';
$strSql.=' from '.TABLEPRE.'witkey_case a ';
$task_open and $strSql.=' left join '.TABLEPRE.'witkey_task b ON a.obj_id = b.task_id ';
$shop_open or $strSql.=' where a.obj_type="task" ';
$shop_open and $strSql.=' left join '.TABLEPRE.'witkey_service c on  a.obj_id= c.service_id ';
$task_open or $strSql.=' where a.obj_type="service" ';
$strSql .= " order by a.on_time desc limit 9 ";
$arrCaseLists =  db_factory::query($strSql,1,$intIndexCacheTime);
if(!$basic_config['css_auto_fit']){
	$arrCaseLists = array_merge(array($arrCaseLists[0]),$arrCaseLists);
	if(count($arrCaseLists)>9){
		unset($arrCaseLists[9]);
	}
}

/**
 * 中标动态
*/
$arrDynamicPlays = kekezu::get_feed ( "feedtype='work_accept'", "feed_time desc", 10 ); // 动态信息
/**
 *推荐店铺
*/
$arrRecommShops = db_factory::query ( sprintf ( "select a.username,a.uid,b.indus_id,b.indus_pid,a.shop_name,if(b.seller_total_num>0,b.seller_good_num/b.seller_total_num,0) as good_rate from %switkey_shop a "
		." left join %switkey_space b on a.uid=b.uid  where b.recommend=1 and b.status=1 and IFNULL(a.is_close,0)=0 and shop_status=1 order by good_rate desc limit 0,5", TABLEPRE,TABLEPRE ), 1, $intIndexCacheTime );
/**
 * 资讯列表
*/
$arrArticleTop = db_factory::get_one("select * from ".TABLEPRE."witkey_article where cat_type='article' and  LENGTH(art_pic)>20 order by pub_time desc limit 1",1,$intIndexCacheTime);
	$arrArticleLists = db_factory::query("select * from ".TABLEPRE."witkey_article where cat_type='article' and art_id !='".$arrArticleTop['art_id']."' order by pub_time desc limit 5",1,$intIndexCacheTime);
/**
 * 今日发布任务
*/
$arrPubToday = db_factory::query("select count(*) as count from ".TABLEPRE."witkey_task where date(from_unixtime(start_time)) = curdate() and task_status>=2",1,$intIndexCacheTime);
/**
 *今日成交任务
*/
$arrAcceptTask = db_factory::query("SELECT obj_id FROM ".TABLEPRE."witkey_feed where obj_id>0 and feedtype='work_accept' and date(from_unixtime(feed_time)) = curdate() group by obj_id ; ",1,$intIndexCacheTime);
$arrAcceptToday = count($arrAcceptTask);
/**
 * 今日成交金额
*/
$arrCashToday = db_factory::query("SELECT sum(fina_cash) as cash FROM ".TABLEPRE."witkey_finance where (fina_action='task_bid' or fina_action='sale_service')  and date(from_unixtime(fina_time)) = curdate()  ;",1,$intIndexCacheTime);
/**
 * 总发布任务
*/
$arrPubAll = db_factory::query("select count(*) as count from ".TABLEPRE."witkey_task where task_status>=2",1,$intIndexCacheTime);
/**
 *总成交任务
*/
$arrAcceptTasks = db_factory::query("SELECT obj_id FROM ".TABLEPRE."witkey_feed where obj_id>0 and feedtype='work_accept'  group by obj_id  ;",1,$intIndexCacheTime);
$arrAcceptAll = count($arrAcceptTasks);
/**
 * 总成交金额
*/
$arrCashAll = db_factory::query("SELECT sum(fina_cash)  as cash FROM ".TABLEPRE."witkey_finance where (fina_action='task_bid' or fina_action='sale_service')  ;",1,$intIndexCacheTime);
/**
 * 友情链接
*/
$arrFlink = kekezu::get_table_data("link_id,link_name,link_url","witkey_link",""," link_id asc","","","",$intIndexCacheTime);

require $kekezu->_tpl_obj->template ('tpl/default/theme/'.$_K ['theme'].'/index' );