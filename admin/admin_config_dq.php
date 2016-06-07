<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role (213);
$objDistrict = keke_table_class::get_instance('witkey_district');
$url = 'index.php?do=config&view=dq';
if($page){
	$page=$_R['page'];
	$url.='&page='.$page;
}else{
	$page=1;
}
$region_config =  keke_glob_class::getRegionConfig();
$objDq = keke_table_class::get_instance('witkey_basic_config');
if($_R['op']=='del'){
	$intResult = $objDistrict->del('id',$_R[id]);
	kekezu::admin_show_msg ( $_lang['operate_success'], "index.php?do=config&view=dq&page=".$page, 3, '', 'success' );
}
if($_R['op'] == 'region_switch'){
	$result = keke_glob_class::updateRegionConfig('region_search_switch', $_R['val']);
	$result and kekezu::echojson('',$_R['val']) or kekezu::echojson('',$_R['val']); 
}
if($_R['op'] == 'region_checkbox'){
	if($_R['dtype'] =='shop'){
		keke_glob_class::updateRegionConfig('region_search_shop', $_R['val']);
	}else{
		keke_glob_class::updateRegionConfig('region_search_task', $_R['val']);
	}
	kekezu::echojson('',$_R['val']);
}
$one=$objDistrict->get_grid('upid=0', $url,$page,10,' order by id asc','1','ajax_dom');
if($_R['is_submit']==1){
	foreach($_R[id] as $key =>$val){
		$arrFields = array('name'=>$_R[name][$key],'displayorder'=>$_R[displayorder][$key]);
		$arrWhere = array('id'=>$_R[id][$key]);
		$intResult = $objDistrict->save($arrFields,$arrWhere);
	}
		kekezu::admin_show_msg ( "修改成功", "index.php?do=config&view=dq&page=".$page, 2, '', 'success' );
}else{
	require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_config_' . $view );
}
