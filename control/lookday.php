<?php
$id = intval($id);
$objRelease = sreward_release_class::get_instance ($id,$pub_mode);
$currentday=date("Y-m-d",time());
$model_detail=db_factory::get_one("select * from ".TABLEPRE."witkey_model where model_id = $id");
$model_detail_config=unserialize($model_detail['config']);
$strMaxDay = $objRelease->getMaxDay ( $model_detail_config[min_cash] );
$day=strtotime($strMaxDay)-strtotime($currentday);
$day=$day/3600/24;
$task_time_rule=db_factory::query("select * from ".TABLEPRE."witkey_task_time_rule where model_id =$id order by rule_cash");