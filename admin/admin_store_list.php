<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 170 );
$table_obj = keke_table_class::get_instance ( 'witkey_shop' );
$shop_obj = new Keke_witkey_shop_class (); 
intval ( $page ) or $page = 1;
intval ( $wh ['page_size'] ) or $wh ['page_size'] = 10;
$url = "index.php?do=$do&view=$view&txt_name=$txt_name&txt_shop_id=$txt_shop_id&page=$page&w[ord][0]={$w['ord']['0']}&w[ord][1]={$w['ord']['1']}&wh[page_size]={$wh['page_size']}&shop_status={$shop_status}";
$status_arr = array (
		"0" => "待审核",
		"1" => "开启",
		"2" => "审核不通过",
		"3" => "关闭" 
);
$shop_type_arr = array (
		"1" => "个人店铺",
		"2" => "企业店铺" 
);
$autoshoparr = db_factory::get_one ( "select * from " . TABLEPRE . "witkey_basic_config where k='autoshop'" );
$autoshop = $autoshoparr ['v'];
if ($changeautoshop) {
	db_factory::execute ( "update " . TABLEPRE . "witkey_basic_config set v='" . $chautoshop . "' where k='autoshop'" );
	die ();
}
switch ($ac) {
	case "del" : 
		$shop_info = db_factory::get_one ( sprintf ( "select * from %switkey_shop where shop_id=%d", TABLEPRE, $shop_id ) );
		$res = $table_obj->del ( 'shop_id', $shop_id );
		kekezu::admin_show_msg ( '操作提示', $url, 3, '删除成功！', 'success' );
		break;
	case "pass" : 
		$shop_info = db_factory::get_one ( sprintf ( "select * from %switkey_shop where shop_id=%d", TABLEPRE, $shop_id ) );
		$shop_obj->setWhere ( "shop_id=" . $shop_id );
		$shop_obj->setShop_status ( 1 );
		$shop_obj->edit_keke_witkey_shop ();
		kekezu::admin_show_msg ( $_lang ['operate_notice'], $url, 2, $_lang ['examine_successfully'], 'success' );
		break;
	case "nopass" : 
		$shop_info = db_factory::get_one ( sprintf ( "select * from %switkey_shop where shop_id=%d", TABLEPRE, $shop_id ) );
		$shop_obj->setWhere ( "shop_id=" . $shop_id );
		$shop_obj->setShop_status ( 2 );
		$shop_obj->edit_keke_witkey_shop ();
		kekezu::admin_show_msg ( $_lang ['operate_notice'], $url, 2, $_lang ['operate_success'], 'success' );
		break;
	case "open" : 
		$shop_info = db_factory::get_one ( sprintf ( "select * from %switkey_shop where shop_id=%d", TABLEPRE, $shop_id ) );
		keke_shop_release_class::updateShopStatus($shop_info['uid'], 1);
		kekezu::admin_show_msg ( $_lang ['operate_notice'], $url, 2, $_lang ['operate_success'], 'success' );
		break;
	case "close" : 
		$shop_info = db_factory::get_one ( sprintf ( "select * from %switkey_shop where shop_id=%d", TABLEPRE, $shop_id ) );
		keke_shop_release_class::closeShop($shop_info['uid'],3);
		kekezu::admin_show_msg ( $_lang ['operate_notice'], $url, 2, $_lang ['operate_success'], 'success' );
		break;
	case 'recommend' : 
		$sql = sprintf ( "update  %switkey_space set recommend=1 where uid =%d", TABLEPRE, $edituid );
		db_factory::execute ( $sql );
		kekezu::admin_system_log ( $_lang ['recommend'] . $memberinfo_arr ['username'] );
		kekezu::admin_show_msg ( $_lang ['operate_success'], $url, 3, '', 'success' );
		break;
	case 'move_recommend' : 
		$sql = sprintf ( "update  %switkey_space set recommend=0 where uid =%d", TABLEPRE, $edituid );
		db_factory::execute ( $sql );
		kekezu::admin_system_log ( $_lang ['move_recommend'] . $memberinfo_arr ['username'] );
		kekezu::admin_show_msg ( $_lang ['operate_success'], $url, 3, '', 'success' );
		break;
}
$sql = "select a.*,b.recommend from " . TABLEPRE . "witkey_shop a left join " . TABLEPRE . "witkey_space b on a.uid=b.uid ";
$where = ' where 1 = 1'; 
empty ( $txt_shop_id ) or $where .= " and a.shop_id =" . intval ( $txt_shop_id );
empty ( $shop_status ) or $where .= " and a.shop_status =" . intval ( $shop_status );
empty ( $txt_name ) or $where .= " and a.shop_name like '%$txt_name%'";
$w [ord] [1] && $w [ord] [0] and $where .= " order by {$w['ord']['0']} {$w['ord']['1']}" or $where .= " order by shop_id desc ";
$kekezu->_page_obj->setAjax ( 1 );
$kekezu->_page_obj->setAjaxDom ( "ajax_dom" );
$count = db_factory::execute ( $sql . $where );
$pages = $kekezu->_page_obj->getPages ( $count, $wh ['page_size'], $page, $url );
$sql .= $where . $pages ['where'];
$shop_data = db_factory::query ( $sql );
function get_on_sale($uid) {
	$order_count = db_factory::get_one ( sprintf ( "select count(order_id) as count from %switkey_order where seller_uid = '%d'", TABLEPRE, $uid ) );
	return $order_count ['count'];
}
function get_good_num($uid) {
	$order_count = db_factory::get_one ( sprintf ( "select count(service_id) as count from %switkey_service where uid = '%d'", TABLEPRE, $uid ) );
	return $order_count ['count'];
}
require $template_obj->template ( ADMIN_DIRECTORY . '/tpl/admin_' . $do . '_' . $view );