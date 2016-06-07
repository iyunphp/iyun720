<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$region_config =  keke_glob_class::getRegionConfig();
$objDistrict = keke_table_class::get_instance('witkey_district');
$url = 'index.php?do=config&view=dqthree';
if($page){
	$page=$_R['page'];
	$url.='&page='.$page;
}else{
	$page=1;
}
if($_R['id']){
	$id=intval($_R[id]);
	$url.='&id='.$id;
}
if($_R['is_submit']==1){
	foreach($_R[id] as $key =>$val){
		$arrFields = array('name'=>$_R[nametwo][$key]);
		$arrWhere = array('id'=>$_R[id][$key]);
		$intResult = $objDistrict->save($arrFields,$arrWhere);
	}
		kekezu::admin_show_msg ( "修改成功", "index.php?do=config&view=dqthree&page=".$page.'&id='.$_R['upid1'], 2, '', 'success' );
}else{
	$three=$objDistrict->get_grid('upid='.$id, $url,$page,10,' order by id desc');
	require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_config_' . $view );
}
if($_R[op]=='del'){
	$intResult = $objDistrict->del('id',$_R[id2]);
	kekezu::admin_show_msg ( "删除成功", "index.php?do=config&view=dqthree&page=".$page.'&id='.$_R['id'], 2, '', 'success' );
}