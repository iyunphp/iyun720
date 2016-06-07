<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role (34);
$config_basic_obj = new Keke_witkey_basic_config_class ();
$config_basic_arr = $config_basic_obj->query_keke_witkey_basic_config ();
$lang_arr = keke_lang_class::lang_type();
foreach ( $config_basic_arr as $k => $v ) {
	$config_arr [$v ['k']] = $v ['v'];
}
if($id){
	if($status != 1){
		$status = 0;
	}
	db_factory::execute("update iyun_config set cvalue = " . $cvalue . " where id = '" . $id . "'");
}

$configDatas = db_factory::query("SELECT * from iyun_config"); 
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_config_wait' );