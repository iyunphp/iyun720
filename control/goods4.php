<?php
$data = db_factory::get_one("select * from iyun_witkey_game where id = '" . $id . "'");
if($action == 'down'){
	db_factory::execute("update iyun_witkey_game set down_num = '" . ($data['down_num'] + 1) . "' where id='" . $id . "'");
	header('Location: ' . $data['file_url']);
	die();
}
if($action == 'add_comment'){
	if($_GET['uid']){
		$uid = $_GET['uid'];
	}
	if($_POST['uid']){
		$uid = $_POST['uid'];
	}
	db_factory::execute("insert into iyun_g_pinglun(gid, uid, text) values('" . $xid . "','" . $uid . "','" . $currentCommentTitle . "')");
	if($json == 'json'){
		header("Content-Type: text/json; charset=utf-8");
		$json = array(
			'type' => 'success'
		);
		$json = json_encode_u($json);
		echo $json;
		die();
	}
	die();
}
db_factory::execute("update iyun_witkey_game set views = '" . ($data['views'] + 1) . "' where id='" . $id . "'");
$userData = db_factory::get_one("select * from iyun_witkey_member where uid = '" . $data['uid'] . "'");
$hotData = db_factory::query("select * from iyun_witkey_game order by id desc limit 3");
$mobile = isMobile();
$scCount = db_factory::query("select count(id) as count from iyun_shoucang where obj_id = '" . $id . "' and type = '2'");
$scCount = $scCount[0]['count'];

$comments = db_factory::query("SELECT * FROM iyun_g_pinglun as pinglun left join iyun_witkey_member as member on pinglun.uid = member.uid where gid = '" . $id . "' order by id desc");
$commentLength = count($comments);
foreach($comments as $k=>$v)
{
	if($v['uid'] < 10){
		$v['buid'] = '0' . $v['uid'];
	}
	$comments[$k]['commenterIcon'] = "http://" . $_SERVER['SERVER_NAME'] . "/data/avatar/000/00/00/" . $v['buid'] . "_avatar_middle.jpg";
}
if($json == 'json'){
	header("Content-Type: text/json; charset=utf-8");
	
	$data = db_factory::get_one("select file_size as size, type, username as userName,down_num as downloadCount, text as introduction  from iyun_witkey_game as game left join iyun_witkey_member as member on game.uid = member.uid where id = '" . $id . "'");
	$commenter = db_factory::query("select text as commentedTitle, username as commenterName, member.uid from iyun_g_pinglun as pinglun left join iyun_witkey_member as member on pinglun.uid = member.uid where gid = '" . $id . "'");
	foreach($commenter as $k=>$v)
	{
		if($v['uid'] < 10){
			$v['uid'] = '0' . $v['uid'];
		}
		$commenter[$k]['commenterIcon'] = "http://" . $_SERVER['SERVER_NAME'] . "/data/avatar/000/00/00/" . $v['uid'] . "_avatar_middle.jpg";
		unset($commenter[$k]['uid']);
	}
	
	$data['commenter'] = $commenter;
	$json = $data;
	$json = json_encode_u($json);
	echo $json;
	die();
}
require keke_tpl_class::template ( "shop/goods/tpl/" . $_K ['template'] . "/index4");
die();