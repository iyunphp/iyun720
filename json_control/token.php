<?php	
require 'api/autoload.php';

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

$accessKey = 'Tjq0v1JwBqtHnYSuNbMBAHG28J1cA9To2S-fuLOX';
$secretKey = 'pBb9MqGbYilk_36OxvP8HEQcOtGCLJHKpyL-AqDF';
$auth = new Auth($accessKey, $secretKey);

// 空间名  http://developer.qiniu.com/docs/v6/api/overview/concepts.html#bucket
$bucket = 'upload';

// 生成上传Token
$token = $auth->uploadToken($bucket);
echo $token;

// 构建 UploadManager 对象
//$uploadMgr = new UploadManager();
//print_r($uploadMgr);
