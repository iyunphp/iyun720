<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
if($is_submit){
	$shop_obj = new Keke_witkey_shop_class ();
	$shop_obj->setWhere ( 'shop_id=' . $shop_id );
	$shop_obj->setSeo_title ( $seo_title );
	$shop_obj->setSeo_keyword ( $seo_keyword );
	$shop_obj->setSeo_desc ( $seo_desc );
	$shop_obj->setViews ( intval($_POST['views']) );		
	$shop_obj->edit_keke_witkey_shop ();
	kekezu::admin_show_msg($_lang['operate_success'],"index.php?do=store&view=list",3,'','success');
}
intval ( $shop_id ) or kekezu::admin_show_msg ( $_lang ['param_error'], 'index.php?do=store&view=list', 3, '', 'warning' );
$shop_info = db_factory::get_one ( sprintf ( " select * from %switkey_shop where shop_id='%d'", TABLEPRE, $shop_id ) );
require $kekezu->_tpl_obj->template(ADMIN_DIRECTORY.'/tpl/admin_store_info' );