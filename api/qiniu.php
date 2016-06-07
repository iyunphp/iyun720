<?php

require_once "autoload.php";


use Qiniu\Auth;
use Qiniu\Processing\PersistentFop;




//ת����Ƶ 1920*960  1080*520  854*427  ����Ҫת���key ��������key
function transcodingVideo($key){
	$accessKey = 'Tjq0v1JwBqtHnYSuNbMBAHG28J1cA9To2S-fuLOX';
	$secretKey = 'pBb9MqGbYilk_36OxvP8HEQcOtGCLJHKpyL-AqDF';
	$auth = new Auth($accessKey, $secretKey);
	//global $auth,$accessKey,$secretKey;
/*	print_r($auth);
die();*/
	if($key == "") die();
	
	$file_type = substr($key, strrpos($key, '.') + 1);
	$allow_type = array("mp4","mov");//�������Ƶ��ʽ
	if(!in_array($file_type,$allow_type)) die();
	
	$name_arr = explode(".",$key);
	$new_key = $name_arr[0].'.mp4';
	
	// Ҫת����ļ����ڵĿռ�
	$bucket = 'view';
	
	// ת��ʱʹ�õĶ������� 
	$pipeline = 'test';
	
	// ��ʼ��
	$pfop = new PersistentFop($auth, $bucket, $pipeline);
	
	//$key = 'baofeng.mp4';
	//$fops = 'imageView2/0/w/480/h/480/format/jpg|saveas/' . Qiniu\base64_urlSafeEncode("demo:a.jpg"); //����ͼƬ
	
	//������Ƶ  1920*960  1080*520  854*427
	$fops = 'avthumb/mp4/ab/160k/ar/44100/acodec/libfaac/r/30/vb/5400k/vcodec/libx264/s/1920x1080/autoscale/1/strpmeta/0|saveas/' . Qiniu\base64_urlSafeEncode("view:1920_".$new_key);
	$pfop->execute($key, $fops);
	
	
	$fops = 'avthumb/mp4/ab/160k/ar/44100/acodec/libfaac/r/30/vb/2400k/vcodec/libx264/s/1280x720/autoscale/1/stripmeta/0|saveas/' . Qiniu\base64_urlSafeEncode("view:1080_".$new_key);
	$pfop->execute($key, $fops);
	
	
	$fops = 'avthumb/mp4/ab/128k/ar/44100/acodec/libfaac/r/30/vb/1200k/vcodec/libx264/s/854x480/autoscale/1/stripmeta/0|saveas/' . Qiniu\base64_urlSafeEncode("view:854_".$new_key);
	$pfop->execute($key, $fops);
	/*list($id, $error) = $pfop->execute($key, $fops);
	echo "<pre>";
	print_r($error);
	die();*/
	return $new_key;
	
	/*$pfop->assertNull($error);*/
	//list($status, $error) = PersistentFop::status($id);
	
	/*$pfop->assertNotNull($status);
	$pfop->assertNull($error);*/

}




?>