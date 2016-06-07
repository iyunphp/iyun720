<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$url = 'index.php?do=config&view=adddqtwo';
if($page){
	$page=$_R['page'];
	$url.='&page='.$page;
}else{
	$page=1;
}
if($_R[is_submit]==1){
	$objDistrict = keke_table_class::get_instance('witkey_district');
	$arrFields = array('name'=>$_R['twocity'],upid=>$_R['onecity']);
	$intResult = $objDistrict->save($arrFields);
	kekezu::admin_show_msg ( "添加成功", "index.php?do=config&view=dqtwo&page=".$page.'&id='.$_R['ones'], 2, '', 'success' );
}else{
	$one=db_factory::get_table_data("*",'witkey_district','upid=0');
	require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_config_' . $view );
}
