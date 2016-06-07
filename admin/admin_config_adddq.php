<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$url = 'index.php?do=config&view=adddq';
if($page){
	$page=$_R['page'];
	$url.='&page='.$page;
}else{
	$page=1;
}
if($_R[is_submit]==1){
	$objDistrict = keke_table_class::get_instance('witkey_district');
	$arrFields = array('name'=>$_R[one],upid=>0);
	$intResult = $objDistrict->save($arrFields);
	kekezu::admin_show_msg ( "添加成功", "index.php?do=config&view=dq&page=".$page, 2, '', 'success' );
}else{
	require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_config_' . $view );
}
