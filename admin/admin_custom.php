<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$views = array ('fields','editfields');
(! empty ( $view ) && in_array ( $view, $views )) and $view or  $view = 'fields';
if (file_exists ( ADMIN_ROOT . 'admin_custom_' . $view . '.php' )) {
	$model_id or kekezu::admin_show_msg ( $_lang['error_model_param'], "index.php?do=info",3,'','warning' );
	$model_info = db_factory::get_one ( " select * from " . TABLEPRE . "witkey_model where model_id = '$model_id'" );
	if (! $model_info ['model_status']) {
		header ( "location:index.php?do=config&view=model" );
		die ();
	}
	require ADMIN_ROOT . 'admin_custom_' . $view . '.php';
} else {
	kekezu::admin_show_msg ( $_lang['404_page'],'',3,'','warning' );
}
