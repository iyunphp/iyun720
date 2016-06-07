<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
$url = "index.php?do=custom&view=fields&model_id={$model_id}";
if ($is_submit == 1) {
	$id = intval($id);
	$model_id = intval($model_id);
	$fieldNum = getCusFieldsMaxId();
	if(in_array($model_id, array(6,7))){
		$tbfield = 'service_ext_'.$fieldNum;
	}else{
		$tbfield = 'task_ext_'.$fieldNum;
	}
	if($length_limit ){
		$arrlen  = getLength($length_limit);
		$fds['f_min_len']  = intval($arrlen['min']);
		$fds['f_max_len']  = intval($arrlen['max']);
		$fds['f_fixed_len']= intval($arrlen['fixed']);
	}
	if($fds['f_code']==''){
		$fds['f_code'] = $tbfield;
	}
	$fds['model_id'] = $model_id;
	$objTable = keke_table_class::get_instance("witkey_custom_fields");
	$result = $objTable->save($fds,array('id'=>$id));
	if($result){
		CustomClass::updateExtData($id);
	}
	kekezu::admin_show_msg ( '操作成功',$url, 3, '', 'success' );
}else{
	$arrInfo = db_factory::get_one("SELECT * FROM `".TABLEPRE."witkey_custom_fields` where id = '".intval($id)."' and model_id = ".intval($model_id));
}
if($check_f_name){
	if(!checkFieldName($check_f_name,$model_id)){
		echo 1;
	}else{
		echo '字段名已存在';
	}
	die;
}
function getCusFieldsMaxId(){
	$result = db_factory::get_one("SELECT id FROM `".TABLEPRE."witkey_custom_fields` ORDER BY id DESC LIMIT 1");
	if($result['id']){
		return  intval($result['id']) +1;
	}else{
		return 1;
	}
}
function checkFieldName($name,$model_id){
	$result = db_factory::get_one("SELECT f_name FROM `".TABLEPRE."witkey_custom_fields` where f_name = '".kekezu::escape($name)."' and model_id=".intval($model_id));
	if($result['f_name']){
		return  true;
	}else{
		return false;
	}
}
function getLength($value){
	$res = explode('-', $value);
	if($res){
		$r=array();
		if($res[0]&&$res[1]){
			if($res[0] > $res[1]){
				$r['min'] = $res[1];
				$r['max'] = $res[0];
			}else{
				$r['min'] = $res[0];
				$r['max'] = $res[1];
			}
			$r['fixed']= 0;
		}else{
			$r['fixed']= $res[0];
		}
		return $r ;
	}
	return false;
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );