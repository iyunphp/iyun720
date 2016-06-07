<?php
header("Content-Type: text/json; charset=utf-8"); 
if($json == 'json')
{	
	if($_GET['uid']){
		$uid = intval($_GET['uid']);
	}
	if($_POST['uid']){
		$uid = intval($_POST['uid']);
	}
	if($_GET['guid']){
		$fuid = intval($_GET['guid']);
	}
	if($_POST['guid']){
		$fuid = intval($_POST['guid']);
	}
	if($type == 'add'){
		$follow = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and fuid = %d',TABLEPRE.'witkey_free_follow',intval($uid),intval($fuid)));
		if($follow > 0){
			$json = array(
				'type'  => 'invalid',
				'error' => '您已经关注了该用户！'
			);
			echo $json;
			return;
		}
		$json = db_factory::execute("insert into " . TABLEPRE.'witkey_free_follow' . "(uid, fuid, on_time) values(" . $uid . ", " . $fuid . "," . time() . ")");
		$json = array(
			'type' => 'success'
		);
		$json = json_encode_u($json);
		$json = str_replace('&lt;', '', $json);
		$json = str_replace('&gt;', '',  $json);
		$json = str_replace('\n', '',  $json);
		$json = strip_tags($json);
		echo $json;
		die();
	}
	if($type == 'del'){
		$json = db_factory::execute("delete from " . TABLEPRE.'witkey_free_follow' . " where uid='" . $uid . "' and fuid='" . $fuid . "'");
		$json = array(
			'type' => 'success'
		);
		$json = json_encode_u($json);
		$json = str_replace('&lt;', '', $json);
		$json = str_replace('&gt;', '',  $json);
		$json = str_replace('\n', '',  $json);
		$json = strip_tags($json);
		echo $json;
		die();
	}
	if($type == 'fs'){
		$follow = db_factory::query('select follow.uid, member.username from ' . TABLEPRE.'witkey_free_follow as follow left join iyun_witkey_member as member on follow.uid = member.uid  where fuid = ' . intval($uid));
		foreach($follow as $k => $v){
			$follow[$k]['user_profile'] = "http://www.iyun720.com/data/avatar/000/00/00/" . $v['uid'] . "_avatar_middle.jpg";
		}
		$json = array(
			'list' => $follow
		);
		$json = json_encode_u($json);
		echo $json;
		die();
	}
	if($type == 'gz'){
		$follow = db_factory::query('select follow.fuid, member.username from ' . TABLEPRE.'witkey_free_follow as follow left join iyun_witkey_member as member on follow.fuid = member.uid  where follow.uid = ' . intval($uid));
		foreach($follow as $k => $v){
			$follow[$k]['user_profile'] = "http://www.iyun720.com/data/avatar/000/00/00/" . $v['fuid'] . "_avatar_middle.jpg";
			$count = db_factory::query('select count(uid) as count from iyun_witkey_free_follow as follow where fuid =' . $v['fuid']);
			$follow[$k]['fs_count'] = $count[0]['count'];
			$service = db_factory::get_one('select service_id as mid,file_path from iyun_witkey_service where file_path like \'%.jpg%\' and uid = ' . $v['fuid'] . ' order by mid desc');
			if($service)
			{
				//$follow[$k]['service'] = $service;
				$follow[$k]['low_resolution'] = get_short_img($service['file_path'], $service['mid']);
			}
			else
			{
				$follow[$k]['low_resolution'] = '';
			}
		}
		$json = array(
			'list' => $follow
		);
		$json = json_encode_u($json);
		echo $json;
		die();
	}
	$follow = db_factory::get_count(sprintf('select count(*) from %s where uid = %d and fuid = %d',TABLEPRE.'witkey_free_follow',intval($uid),intval($fuid)));
	$followCount = db_factory::get_count(sprintf('select count(*) from %s where fuid = %d',TABLEPRE.'witkey_free_follow',intval($fuid)));
	$json = array(
		'follow' => $follow,
		'followCount' => $followCount
	);

	$json = json_encode_u($json);
	$json = str_replace('&lt;', '', $json);
	$json = str_replace('&gt;', '',  $json);
	$json = str_replace('\n', '',  $json);
	$json = strip_tags($json);
	echo $json;
	die();
}


