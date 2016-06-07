<?php
$id = intval($id);
$k = trim($key);
$k_old = md5(date("Ymd")."iyun720");
echo $k."<br>";
echo $k_old;
if($k == $k_old){
	if($id >=1){
		$data = db_factory::query("select * from " . TABLEPRE . "witkey_service where service_id = '$id'");
		$data = $data[0];
		$callback = $data['callback']; 
		$callback --;
		if($callback > 0)
		{
			db_factory::execute("update ".TABLEPRE."witkey_service set callback='" . $callback . "' where service_id = '$id'");
		}
		else
		{
			db_factory::execute("update ".TABLEPRE."witkey_service set service_status = 2 where service_id = '$id'");
		}
	}
}
die();
?>

