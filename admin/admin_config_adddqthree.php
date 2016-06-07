<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$url = 'index.php?do=config&view=adddqthree';
$cnm=db_factory::get_one("select * from ".TABLEPRE."witkey_district where id='".$_R[upid2]."'");
if($_R[fc]==1){
	$msg=db_factory::get_table_data("*","witkey_district","upid=".$_R['one']);
	$dis='';
	foreach($msg as $v){
		if($_R["upid2"]==$v[id]){ 
			$a="";
			$a.=' selected="selected" ';
		}
		$dis.='<option  value="'.$v[id].$a.'">'.$v[name].'</option>';
	}
	echo $dis;
	die;
}
if($page){
	$page=$_R['page'];
	$url.='&page='.$page;
}else{
	$page=1;
}
if($_R[is_submit]==1){
	$objDistrict = keke_table_class::get_instance('witkey_district');
	$arrFields = array('name'=>$_R['threecity'],upid=>$_R['twocity']);
	$intResult = $objDistrict->save($arrFields);
	kekezu::admin_show_msg ( "添加成功", "index.php?do=config&view=dqthree&page=".$page.'&id='.$_R['ones'], 2, '', 'success' );
}else{
	$one=db_factory::get_table_data("*",'witkey_district','upid=0');
	require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_config_' . $view );
}
