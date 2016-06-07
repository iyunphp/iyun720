<?php
$tasktemid = intval ( $tasktemid );
$userbrowser = $_SERVER['HTTP_USER_AGENT'];
if ( preg_match( '/MSIE/i', $userbrowser ) ) {
    $template_content = kekezu::escape($template_content);
    $template_name =kekezu::escape(kekezu::gbktoutf($template_name));
    $template_title = kekezu::escape(kekezu::gbktoutf($template_title));
}
if ($ac == 'edit') {
	$task_template_obj = new Keke_witkey_task_template_class ();
	$task_template_obj->setTemplate_content ( $template_content );
	$task_template_obj->setTemplate_name ( $template_name );
	$task_template_obj->setTemplate_title ( $template_title );
	$task_template_obj->setWhere ( "id=$tasktemid" );
	$task_template_obj->edit_keke_witkey_task_template ();
} elseif ($ac == 'add') {
	$task_template_obj = new Keke_witkey_task_template_class ();
	$task_template_obj->setTemplate_content ( $template_content );
	$task_template_obj->setTemplate_name ( $template_name );
	$task_template_obj->setTemplate_title ( $template_title );
	$task_template_obj->setOn_time ( time () );
	$task_template_obj->create_keke_witkey_task_template ();
}
$tasktemInfo = db_factory::get_one ( "select * from " . TABLEPRE . "witkey_task_template where id=$tasktemid" );
require $kekezu->_tpl_obj->template ( ADMIN_DIRECTORY . "/tpl/admin_task_$view" );