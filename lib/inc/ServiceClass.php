<?php
class ServiceClass {
	public static function getEnabledServiceModelList(){
		return db_factory::get_table_data('*','witkey_model',' model_status = 1 and model_type = "shop" ',' listorder asc','','','model_id',3600);
	}
	public static function getShopByObj_id($obj_id){
		return db_factory::get_one("select * from ".TABLEPRE."witkey_service where service_id=".intval($obj_id));
	}
	public static function getTaskByObj_id($obj_id){
		return db_factory::get_one("select * from ".TABLEPRE."witkey_task where task_id=".intval($obj_id));
	}
}
