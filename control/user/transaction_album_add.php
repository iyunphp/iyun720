<?php
if($ct == 'del'){
	db_factory::execute("delete from iyun_album where id = '" . $id . "'");
	header("Location: /index.php?do=user&view=transaction&op=album");
	die();
}
if(!empty($name))
{
	$saveUid = $uid;
	if(!empty($text) && !empty($txt_upload) && !empty($keywords))
	{
		if($type == 0 && $uid == 1){
			$saveUid = -1;
		}
		db_factory::execute("insert into iyun_album(name, text, photo, uid, keywords) values('" . $name . "', '" . $text . "', '" . $txt_upload . "', '" . $saveUid . "', '" . $keywords . "')");
	}
	header("Location: /index.php?do=user&view=transaction&op=album");
	die();
}