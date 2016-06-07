<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 82 );
$suggest_obj = keke_table_class::get_instance ( "witkey_proposal" );
$page and $page=intval ( $page ) or $page = 1;
$slt_page_size and $slt_page_size=intval ( $slt_page_size ) or $slt_page_size = 10;

if ($ac == 'complete') {
	db_factory::execute("update iyun_proposal set status = 1 where id = '" . $id . "'");
	header("Location: /admin/index.php?do=user&view=BUG");
}else {
	$count = db_factory::query("select count(id) as count from iyun_proposal");
	$count = $count[0]->count;
	$datas = db_factory::query("select * from iyun_proposal where status = 0");
	
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_user_BUG' );