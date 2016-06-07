<?php
	header("Content-Type: text/json; charset=utf-8");
	$type += 0;
	if($_GET['uid'] ){
		$uid = $_GET['uid'] + 0;
	}
	if($_POST['uid']){
		$uid = $_POST['uid'] + 0;
	}
	if($zan_type == 'list'){
		$json  = db_factory::query("select iyun_shoucang.*, username from iyun_shoucang left join iyun_witkey_member on iyun_shoucang.uid = iyun_witkey_member.uid  where type = '" . $type . "' and obj_id = '" . $obj_id . "'");
		$json = array(
			'list' => $json
		);
	} else if($zan_type == 'count'){
		$json  = db_factory::get_one("select count(*) as count from iyun_shoucang where type = '" . $type . "' and obj_id = '" . $obj_id . "'");
	} else if($zan_type == 'add'){
		$json  = db_factory::get_one("select count(*) as count from iyun_shoucang where type = '" . $type . "' and obj_id = '" . $obj_id . "' and uid = '" . $uid . "'");
		if(empty($uid)){
			$json = array(
				'type' => 'error',
				'error' => '您还没有登录！'
			);
		}else if($json['count']  == 0){
			$uid = $uid + 0;
			$json  = db_factory::execute("insert into iyun_shoucang(obj_id,type,uid) values('" . $obj_id . "','" . $type . "','" . $uid . "')");
			$json = array(
				'type' => 'success'
			);
		}
		else
		{
			$json = array(
				'type' => 'error',
				'error' => '您已经收藏过了！'
			);
		}
	} else if($zan_type == 'del'){
		$json  = db_factory::get_one("select count(*) as count from iyun_shoucang where type = '" . $type . "' and obj_id = '" . $obj_id . "' and uid = '" . $uid . "'");
		if(empty($uid)){
			$json = array(
				'type' => 'error',
				'error' => '您还没有登录！'
			);
		}else if($json['count']  > 0){
			$json  = db_factory::execute("delete from iyun_shoucang where type='" . $type . "' and obj_id='" . $obj_id . "' and uid='" . $uid . "'");
			$json = array(
				'type' => 'success'
			);
		}
		else
		{
			$json = array(
				'type' => 'error',
				'error' => '您还没有收藏！'
			);

		}
	} else if($zan_type == 'user_list'){
		$json  = db_factory::query("select service_id as mid, title, iyun_witkey_service.uid, username, file_path, on_time, views as popular, content as summary from iyun_shoucang left join iyun_witkey_service on iyun_shoucang.obj_id = iyun_witkey_service.service_id  where type = '" . $type . "' and iyun_shoucang.uid = '" . $uid . "'");
		foreach($json as $k => $v){
			$json[$k]['file_path'] = explode(',', $json[$k]['file_path']);
			$json[$k]['file_path'] = $json[$k]['file_path'][0];
			
			$imgs = keke_shop_class::output_pics($v['file_path'],300,1,1,$v['mid']);
			$json[$k]['thumbnail'] = $imgs;
			$file_type = strtolower(substr(strrchr($json[$k]['file_path'], '.'), 1));
			if(in_array($file_type,array('mp4','mov'))){
				$json[$k]['type'] = 2;
				$json[$k]['high_resolution'] = add_last($json[$k]['file_path'], '1920_');
				$json[$k]['standard_resolution'] = add_last($json[$k]['file_path'], '1080_');
				$json[$k]['low_resolution'] = add_last($json[$k]['file_path'], '854_');
				
			}
			else
			{
				$json[$k]['type'] = 1;
				$json[$k]['high_resolution'] = $json[$k]['file_path'];
				$json[$k]['standard_resolution'] = get_short_img($json[$k]['file_path'], $json[$k]['mid']);
				$json[$k]['low_resolution'] = get_short_img($json[$k]['file_path'], $json[$k]['mid']);
			}

			$json[$k]['user_profile'] = "http://www.iyun720.com/data/avatar/000/00/00/" . $v['uid'] . "_avatar_middle.jpg";
			$json[$k]['is_my_favorite'] = 0;
			$json[$k]['favorite'] = 0;
			$json[$k]['popular'] = 0;	
			unset($json[$k]['file_path']);
		}
		$json = array(
			'list' => $json
		);
	}else{
		$json  = db_factory::get_one("select count(*) as count from iyun_shoucang where uid ='" . $uid . "' and type = '" . $type . "' and obj_id = '" . $obj_id . "'");
		$count  = db_factory::get_one("select count(*) as count from iyun_shoucang where type = '" . $type . "' and obj_id = '" . $obj_id . "'");
		$json = array(
			'collection' => $json['count'],
			'collectionCount' => $count['count']
		);
	}
	$json = json_encode_u($json);
	$json = str_replace('&lt;', '', $json);
	$json = str_replace('&gt;', '',  $json);
	$json = str_replace('\n', '',  $json);
	$json = strip_tags($json);
	echo $json;
	die();