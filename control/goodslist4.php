<?php
	$where = '';
	if(!empty($plat)){
		$where .= " and plat = '" . $plat . "'";
	}
	if($json == 'json'){
		header("Content-Type: text/json; charset=utf-8");
		$datas = db_factory::query("select id as xid, name, photo as thumbnail, file_url as down from iyun_witkey_game where 1=1" . $where . " order by id desc");
		/*foreach($datas as $k => $v){
			$datas[$k]['down'] = '/index.php?do=goods4&id=' . $v['xid'] . '&action=down';
		}
		*/
		$json = array(
			'datas' => $datas
		);
		echo json_encode_u($json);
		die();
	}
	//$datas = db_factory::query("select * from iyun_witkey_game order by id desc limit 0,9");
	$datas = db_factory::query("select * from iyun_witkey_game where 1=1" . $where . " order by id desc");
	
