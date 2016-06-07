<?php
$id = 210;
if(intval($_GET['id'])){
	$id = intval($_GET['id']);
}

$arrServiceInfo = keke_shop_class::get_service_info ( $id  );
$arrOwnerInfo  = kekezu::get_user_info($arrServiceInfo['uid']);
$arrOtherGoods = db_factory::query("select * from ".TABLEPRE."witkey_service where uid=".intval($arrOwnerInfo['uid'])." and service_id!='".$arrServiceInfo['service_id']."' and service_status=2 order by on_time desc limit 12");
require 'view.htm';