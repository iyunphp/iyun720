<?php
kekezu::check_login();
$strPageTitle = '反馈BUG-'.$_K ['html_title'];
$strPageKeyword = '反馈BUG,'.$_K ['html_title'];
if($_POST){
	
	db_factory::execute("insert into iyun_proposal(title, model, environmental_science, browser, text) values('" . $title . "','" . $model . "','" . $environmental_science . "','" . $browser . "','" . $text . "')");
	header("Location: /index.php?do=bug&complete=true");
	die();
}


