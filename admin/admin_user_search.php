<?php   defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$uid = $_R['uid'];
$userinfo = keke_user_class::get_user_info($uid);
$username = $userinfo['username'];
switch($type){
    case 'task':
        $arrData = db_factory::query('select task_id,task_title from '.TABLEPRE.'witkey_task where uid = '.$uid);
        break;
    case 'parrt':
        $strSql = "SELECT task_title,task_id FROM `"
            .TABLEPRE."witkey_task` WHERE ( task_id IN ( SELECT task_id FROM "
                .TABLEPRE."witkey_task_bid WHERE uid = ".$uid." ) OR task_id IN ( SELECT task_id FROM "
                    .TABLEPRE."witkey_task_work WHERE uid = ".$uid." ) )";
        $arrData = db_factory::query($strSql); 
        break;
    case 'added':
        $arrData = db_factory::query('select title,service_id from '.TABLEPRE.'witkey_service where uid = '.$uid.' and service_status = 2');
        break;
    case 'buy':
        $strWhere  = ' 1=1 ';
        $strWhere .= ' and a.order_uid = '.$uid;
        $strWhere .= ' and b.obj_type = '."'service'";
        $strSql = ' SELECT c.title,c.service_id FROM `'.TABLEPRE.'witkey_order` AS a '
            .' LEFT JOIN '.TABLEPRE.'witkey_order_detail AS b ON a.order_id = b.order_id '
                .' LEFT JOIN '.TABLEPRE.'witkey_service AS c ON b.obj_id = c.service_id '
                    .' LEFT JOIN '.TABLEPRE.'witkey_service_order AS d ON b.order_id = d.order_id '
                        .' WHERE '.$strWhere;
        $arrData = db_factory::query( $strSql );
        break;
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );