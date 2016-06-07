<?php
if($_POST['uid']){
	$uid = $_POST['uid'] + 0;
}
if($_GET['uid']){
	$uid = $_GET['uid'] + 0;
}
if(empty($birthday)){
	$birthday = "null";
} else {
	$birthday = "'" . $birthday . "'"; 
}
$sql0 = "update iyun_witkey_space set mobile='" . $mobile . "', email='" . $email . "', birthday=" . $birthday . ", text='" . $text . "', province='" . $province . "', city='" . $city . "' where uid ='" . $uid . "'";
db_factory::execute($sql0);;
$sql1 = "update iyun_witkey_member set email='" . $email . "' where uid='" . $uid . "'";
db_factory::execute($sql1);
$json = array(
	'type' => 'success',
	'uid' => $uid,
	'mobile' => $mobile,
	'email' => $email,
	'birthday' => $birthday,
	'text' => $text,
	'province' => $province,
	'city' => $city
);
header("Content-Type: text/json; charset=utf-8");
echo json_encode_u($json);