<?php
$datas = db_factory::query("select id,name,plat,type,photo,file_url,text from iyun_witkey_game where uid='" . $uid . "'");