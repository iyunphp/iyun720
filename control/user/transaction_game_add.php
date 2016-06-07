<?php
if($ct == 'del'){
	db_factory::execute("delete from iyun_witkey_game where id = '" . $id . "'");
	header("Location: /index.php?do=user&view=transaction&op=game");
	die();
}
$tips = array();
if($ct == 'edit'){
	$data = db_factory::get_one("select * from iyun_witkey_game where id = '" . $id . "'");
	if(!empty($p)){
		$re = true;
		if(empty($name)){
			$re = false;
			$tips['name'] = '游戏名称不能为空！';
		}
		if(empty($plat)){
			$re = false;
			$tips['plat'] = '平台不能为空！';
		}
		if(empty($type)){
			$re = false;
			$tips['type'] = '所属类型不能为空！';
		}
		if(empty($_FILES['upload_photo']) || empty($_FILES["upload_photo"]["tmp_name"])){
			if($default_upload_photo){
				$photo = $default_upload_photo; 
			} else {
				$re = false;
				$tips['type'] = '游戏界面展示图不能为空！';
			}
		}
		if(empty($_FILES['upload_package']) || empty($_FILES["upload_package"]["tmp_name"]) && empty($file_url)){
			if($default_file_url){
				$file_url = $default_file_url;
			} else {
				$re = false;
				$tips['file'] = '游戏安装包不能为空！';
			}
		}
		if($re){
			$file_size = $data['file_size'];
			if(!empty($_FILES["upload_package"]) && !empty($_FILES["upload_photo"]["tmp_name"])){
				move_uploaded_file($_FILES["upload_photo"]["tmp_name"], "./upload/game/img/" . $_FILES["upload_photo"]["name"]);
				$photo = "/upload/game/img/" . $_FILES["upload_photo"]["name"];
			}
			if(empty($file_url) && !empty($_FILES["upload_package"]) && !empty($_FILES["upload_package"]["tmp_name"])){
				move_uploaded_file($_FILES["upload_package"]["tmp_name"], "./upload/game/file/" . $_FILES["upload_package"]["name"]);
				$file_url = "/upload/game/file/" . $_FILES["upload_package"]["name"];
				$file_size = $_FILES["upload_package"]["size"] / 1024 /1024;
			}
			db_factory::execute("update iyun_witkey_game set name = '" . $name . "', plat = '" . $plat . "', type = '" . $type . "', photo = '" . $photo . "', file_url = '" . $file_url . "', file_size = " . $file_size .  ", text = '" . $text . "' where id = '" . $id . "'");
			header("Location: /index.php?do=user&view=transaction&op=game");
			die();
		}
	}
	
}

if(!empty($p))
{
	$re = true;
	if(empty($name)){
		$re = false;
		$tips['name'] = '游戏名称不能为空！';
	}
	if(empty($plat)){
		$re = false;
		$tips['plat'] = '平台不能为空！';
	}
	if(empty($type)){
		$re = false;
		$tips['type'] = '所属类型不能为空！';
	}
	if(empty($_FILES['upload_photo'])){
		$re = false;
		$tips['type'] = '游戏界面展示图不能为空！';
	}
	if(empty($_FILES['upload_package']) && empty($file_url)){
		$re = false;
		$tips['file'] = '游戏安装包不能为空！';
	}
	if($re)
	{
		$file_size = 0;
		move_uploaded_file($_FILES["upload_photo"]["tmp_name"], "./upload/game/img/" . $_FILES["upload_photo"]["name"]);
		$photo = "/upload/game/img/" . $_FILES["upload_photo"]["name"];
		if(empty($file_url) && !empty($_FILES["upload_package"])){
			move_uploaded_file($_FILES["upload_package"]["tmp_name"], "./upload/game/file/" . $_FILES["upload_package"]["name"]);
			$file_url = "/upload/game/file/" . $_FILES["upload_package"]["name"];
			$file_size = $_FILES['upload_package']['size'] / 1024 /1024;
		}
		db_factory::execute("insert into iyun_witkey_game(name, plat, type, photo, file_url,file_size, text, uid) values('" . $name . "', '" . $plat . "', '" . $type . "', '" . $photo . "', '" . $file_url . "', '" . $file_size . "', '" . $text . "', '" . $uid . "')");
		header("Location: /index.php?do=user&view=transaction&op=game");
		die();
	}
}