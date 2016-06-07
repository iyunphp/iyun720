<?php
	//header("Content-Type: text/json; charset=utf-8");
	$type += 0;
	if($_GET['uid'] == ''){
		$uid = $_GET['uid'] + 0;
	}
	if($_POST['uid'] == ''){
		$uid = $_POST['uid'] + 0;
	}
	if($zan_type == 'list'){
		$json  = db_factory::query("select iyun_zan.*, username from iyun_zan left join iyun_witkey_member on iyun_zan.uid = iyun_witkey_member.uid  where type = '" . $type . "' and obj_id = '" . $obj_id . "'");
		$json = array(
			'list' => $json
		);
	} else if($zan_type == 'count'){
		$json  = db_factory::get_one("select count(*) as count from iyun_zan where type = '" . $type . "' and obj_id = '" . $obj_id . "'");
	} else if($zan_type == 'add'){
		$json  = db_factory::get_one("select count(*) as count from iyun_zan where type = '" . $type . "' and obj_id = '" . $obj_id . "' and uid = '" . $uid . "'");
		if(empty($uid)){
			$json = array(
				'type' => 'error',
				'error' => '您还没有登录！'
			);
		}else if($json['count']  == 0){
			$json  = db_factory::execute("insert into iyun_zan(obj_id,type,uid) values('" . $obj_id . "','" . $type . "','" . $uid . "')");
			$json = array(
				'type' => 'success'
			);
		}
		else
		{
			$json = array(
				'type' => 'error',
				'error' => '您已经赞过了！'
			);
		}
	} else if($zan_type == 'del'){
		$json  = db_factory::get_one("select count(*) as count from iyun_zan where type = '" . $type . "' and obj_id = '" . $obj_id . "' and uid = '" . $uid . "'");
		if(empty($uid)){
			$json = array(
				'type' => 'error',
				'error' => '您还没有登录！'
			);
		}else if($json['count']  > 0){
			$json  = db_factory::execute("delete from iyun_zan where type='" . $type . "' and obj_id='" . $obj_id . "' and uid='" . $uid . "'");
			$json = array(
				'type' => 'success'
			);
		}
		else
		{
			$json = array(
				'type' => 'error',
				'error' => '您还没有赞过！'
			);

		}
	}
	$json = json_encode_u($json);
	$json = str_replace('&lt;', '', $json);
	$json = str_replace('&gt;', '',  $json);
	$json = str_replace('\n', '',  $json);
	$json = strip_tags($json);
	echo $json;
	die();