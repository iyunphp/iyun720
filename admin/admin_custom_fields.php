<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$objTable = keke_table_class::get_instance("witkey_custom_fields");
intval ( $page ) or $page = 1;
$url = "index.php?do=custom&view=fields&model_id={$model_id}&page=$page";
$id = intval($id);
$model_id = intval($model_id);
if($opajax =='setorder'){
	db_factory::execute("UPDATE `".TABLEPRE."witkey_custom_fields` SET `listorder`='".intval($ordernum)."' WHERE (`id`='".$id."')");
	die;
}
if($opajax =='setopen'){
	db_factory::execute("UPDATE `".TABLEPRE."witkey_model` SET `open_custom`='".intval($opennum)."' WHERE (`model_id`='".$model_id."')");
	die;
}
if ($ac == 'del') {
		CustomClass::delExtData($id);
		$res = $objTable->del ( 'id', $id );
		$res and kekezu::admin_show_msg ($_lang['delete_success'], $url,3,'','success' ) or kekezu::admin_show_msg ($_lang['delete_fail'], $url,3,'','warning' );
} else {
	$where = " 1 = 1 and model_id = ".$model_id;
	$where .= " order by listorder asc ";
	$d = $objTable->get_grid($where, $url,$page,10,null,1,'ajax_dom');
	$dataList = $d ['data'];
	$pages = $d ['pages'];
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );