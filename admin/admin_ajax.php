<?php
defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
switch ($frompage) {
	case 'finance_withdraw':
	$sbtUrl = "index.php?do=finance&view=withdraw&page={$page}&withdraw_id={$withdraw_id}&ac={$ac}";
	require $template_obj->template(ADMIN_DIRECTORY.'/tpl/ajax/finance_withdraw' );
	break;
	default:
		echo 'page not found';
	break;
}
die();
