<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role ( 142 );
if ($sbt_edit) {
	keke_backup_class::run_backup ();
}
if(isset($t)){
	$t == 1 and kekezu::admin_show_msg ( $_lang['backup_success'], "index.php?do=tool&view=dbrestore", 3,'','success' ) or kekezu::admin_show_msg ( $_lang['backup_fail'], "index.php?do=tool&view=dbbackup", 3,'','warning' );
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );