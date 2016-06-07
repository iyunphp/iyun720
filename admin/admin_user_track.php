<?php   defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$uid = intval($_R['uid']);
$username = $_R['username'];
$intCountTask = db_factory::get_count('select count(task_id) from '.TABLEPRE.'witkey_task where uid = '.$uid);
$strSql = "SELECT count(*) count FROM `"
    .TABLEPRE."witkey_task` WHERE ( task_id IN ( SELECT task_id FROM "
        .TABLEPRE."witkey_task_bid WHERE uid = ".$uid." ) OR task_id IN ( SELECT task_id FROM "
            .TABLEPRE."witkey_task_work WHERE uid = ".$uid." ) )";
$intParrtTask = intval ( db_factory::get_count( $strSql ) );
$intCountSj = db_factory::get_count('select count(service_id) from '.TABLEPRE.'witkey_service where uid = '.$uid.' and service_status = 2');
$strWhere  = ' 1=1 ';
$strWhere .= ' and a.order_uid = '.$uid;
$strWhere .= ' and b.obj_type = '."'service'";
$strSql1 = ' SELECT count(*) count FROM `'.TABLEPRE.'witkey_order` AS a '
            .' LEFT JOIN '.TABLEPRE.'witkey_order_detail AS b ON a.order_id = b.order_id '
                .' LEFT JOIN '.TABLEPRE.'witkey_service AS c ON b.obj_id = c.service_id '
                    .' LEFT JOIN '.TABLEPRE.'witkey_service_order AS d ON b.order_id = d.order_id '
                        .' WHERE '.$strWhere;
$intCountGm = intval ( db_factory::get_count( $strSql1 ) );
$strSql2 = "SELECT count(*) count FROM `".TABLEPRE."witkey_service_order` as a
			LEFT JOIN ".TABLEPRE."witkey_order_detail as b on a.order_id = b.order_id
			LEFT JOIN ".TABLEPRE."witkey_order as c on a.order_id = c.order_id where b.obj_type ='gy' and c.order_uid= ".$uid;
$intCountGzgy = intval ( db_factory::get_count( $strSql2 ) );
$strSql3 = "SELECT count(*) count FROM `".TABLEPRE."witkey_service_order` as a 
		    LEFT JOIN ".TABLEPRE."witkey_order_detail as b ON a.order_id = b.order_id		
		    LEFT JOIN ".TABLEPRE."witkey_order as c ON a.order_id = c.order_id where c.seller_uid = ".$uid. " and b.obj_type ='gy' and c.order_status!= 'close' ";
$intCountWkgy = intval ( db_factory::get_count( $strSql3 ) );
$identy_auth_list = keke_auth_fac_class::getAuthItemListByUid($uid);
$intWithdraw = db_factory::get_count('select count(withdraw_id) from '.TABLEPRE.'witkey_withdraw where uid = '.$uid );
$intCharge = db_factory::get_count('select count(order_id) from '.TABLEPRE.'witkey_order_charge where uid = '.$uid);
$intFinance = db_factory::get_count('select count(fina_id) from '.TABLEPRE.'witkey_finance where uid = '.$uid);
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );