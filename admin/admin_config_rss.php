<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role (206);
$config_basic_obj = new Keke_witkey_basic_config_class ();
$config_basic_arr = $config_basic_obj->query_keke_witkey_basic_config ();
foreach ( $config_basic_arr as $k => $v ) {
	$config_arr [$v ['k']] = $v ['v'];
}
$url = 'index.php?do=config&view=rss';
if (isset ( $submit )) {
	$_POST ['rss_choice_task'] = isset ( $_POST ['rss_choice_task'] ) ? '1' : '0';
	$_POST ['rss_choice_news'] = isset ( $_POST ['rss_choice_news'] ) ? '1' : '0';
	foreach ( $_POST as $k => $v ) {
		$config_basic_obj->setWhere ( "k = '$k'" );
		$config_basic_obj->setV ( $v );
		$res += $config_basic_obj->edit_keke_witkey_basic_config ();
	}
	$config_basic_obj->setWhere ( "k = 'rss_star_date'" );
	$config_basic_obj->setV ( time () );
	$config_basic_obj->edit_keke_witkey_basic_config ();
	$kekezu->_cache_obj->gc ();
	$kekezu->_cache_obj->set ( "keke_witkey_basic_config", $config_basic_arr );
	if ($res) {
		kekezu::admin_show_msg ( '操作成功！', $url, 3, '', 'success' );
	} else {
		kekezu::admin_show_msg ( '操作失败！', $url, 3, '', 'fail' );
	}
}
if (isset ( $vi )) {
$objRss = new keke_rss_class ();
$objRss->title = $kekezu->_sys_config ['rss_title'];
$objRss->link = $kekezu->_sys_config ['website_url'];
$objRss->description = $kekezu->_sys_config ['rss_content'];
if ($kekezu->_sys_config ['rss_choice_task'] == '1') {
	$arrTask = db_factory::query ( sprintf ( "select * from %switkey_task where task_status>=2 order by task_id desc limit 10", TABLEPRE ) );	
	foreach ( $arrTask as $k => $v ) {
		$arrRss [$v ['start_time']] ['title'] = '[任务]' . $v ['task_title'];
		$arrRss [$v ['start_time']] ['link'] = $kekezu->_sys_config ['website_url'] . '/index.php?do=task&id=' . $v ['task_id'];
		$arrRss [$v ['start_time']] ['description'] = $v ['task_desc'] . '...';
	}
}
if ($kekezu->_sys_config ['rss_choice_news'] == '1') {
	$arrAct = db_factory::query ( sprintf ( "select * from %switkey_article order by art_id desc limit 10", TABLEPRE ) );
	foreach ( $arrAct as $k => $v ) {
		$arrRss [$v ['pub_time']] ['title'] = '[资讯]' . $v ['art_title'];
		$arrRss [$v ['pub_time']] ['link'] = $kekezu->_sys_config ['website_url'] . '/index.php?do=article&id=' . $v ['art_id'];
		$arrRss [$v ['pub_time']] ['description'] = kekezu::cutstr ( kekezu::escape ( strip_tags ( $v ['content'] ) ), 100 ) . '...';
	}
}
  krsort ( $arrRss );
  $arr=array_slice($arrRss,0,10);
foreach ( $arr as $v ) {
	$objItem = new FeedItem ();
	$objItem->title = $v ['title'];
	$objItem->link = $v ['link'];
	$objItem->description = $v ['description'];
	$objRss->addItem ( $objItem );
} 
$objRss->saveFeed ( "RSS2.0", "../data/index.xml" );
}
require $template_obj->template ( ADMIN_DIRECTORY . '/tpl/admin_config_' . $view );