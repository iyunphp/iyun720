<?php
kekezu::admin_check_role (207);
$url="index.php?do=config&view=zdhf";
if($is_submit){
	$auto_mail=array();
	$auto_mail['authlist']=$authlist;
	$auto_mail['renwulist']=$renwulist;
	$auto_mail['tian']=$tian;
	$auto_mail['title']=$title;
	$auto_mail['is_open']=$kg;
	$auto_mail['time']=intval($tian)*60*60*24+time();
	$auto_mail['content']=$content;
	$auto_mail_arr=var_export($auto_mail,true);
	$file=S_ROOT . "/data/data_cache/auto_mail.php";
	file_put_contents ($file, "<?php      return ".$auto_mail_arr.";");
	$aaa=getfile($file);
	$authlist=trim($authlist,",");
	$arrauth=explode(",", $authlist);
	kekezu::admin_show_msg ("操作成功!", $url,3,'','success' );
}else{
	$path = S_ROOT . "/data/data_cache/auto_mail.php";
	if(file_exists($path)){
		$arr_auto_mail=getfile($path);
	}
}
function getfile($dataPath){
	return include $dataPath;
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_config_' . $view );
