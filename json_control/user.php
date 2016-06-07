<?php
$uid = $_GET['uid'] + 0;	
$json = db_factory::get_one("select mobile, email, birthday, text, province, city from iyun_witkey_space where uid='" . $uid . "'");
header("Content-Type: text/json; charset=utf-8");
echo json_encode_u($json);
