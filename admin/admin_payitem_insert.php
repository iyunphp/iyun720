<?php
$url = "index.php?do=payitem&view=insert";
if ($sbt_edit== "sub_sec") {
	if(false === keke_glob_class::include_kee_client()){
		kekezu::admin_show_msg ( "验证失败，验证文件不存在", $url, 10, '', 'warning' );
	}
	$keeClient = new keeClient($kppw_id, $secret_key);
	$result = $keeClient->valid();
	if($result){
		db_factory::execute ( "update " . TABLEPRE . "witkey_basic_config set v =1 where k='kee_switch'" );
		db_factory::execute ( "update " . TABLEPRE . "witkey_basic_config set v ='".$secret_key."' where k='kee_app_secret'" );
		db_factory::execute ( "update " . TABLEPRE . "witkey_basic_config set v ='".$kppw_id."' where k='kee_api_id'" );
		kekezu::admin_show_msg ( "操作成功!", $url, 3, '', 'success' );
	}else{
		kekezu::admin_show_msg ( "验证失败", $url, 10, '', 'warning' );
	}
} else {
	if ($op == 'cancel') {
		db_factory::execute ( "update " . TABLEPRE . "witkey_basic_config set v = 0 where k='kee_switch'" );
		kekezu::admin_show_msg ( "操作成功!", $url, 3, '', 'success' );
	}
}
require $template_obj->template ( ADMIN_DIRECTORY . '/tpl/admin_payitem_' . $view );