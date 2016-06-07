<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$views = array("add","list","charge","custom_list","group_add","group_list","custom_add","suggest","suggest_reply","check","track","search","BUG");
$view = (! empty ( $view ) && in_array ( $view, $views )) ? $view : 'add';
require "admin_user_$view.php";