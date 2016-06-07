<?php
if($action=='delete'){
	$id = intval($id);
	$status = 0;
	$msg 	= '删除失败';
	if($id){
		$objFileT = keke_table_class::get_instance('witkey_file');
		$fileInfo = $objFileT->get_table_info('file_id',$id);
		if($fileInfo['uid']==$gUid||!$fileInfo['uid']){
			if(QN_UPLOAD_OPEN){
				$kekezu->include_qiniu_file();
				$qn 	= new QiniuClass();
				$qn->delete($fileInfo['file_name']);
			}else{
				keke_file_class::del_file($fileInfo['save_name']);
				$intFileLen = strrpos($fileInfo['save_name'], '/');
				$strFileName = substr($fileInfo['save_name'], intval($intFileLen+1));
				$strFileNamePre = substr($fileInfo['save_name'],0,intval($intFileLen+1));
				file_exists($strFileNamePre.'100_'.$strFileName) and keke_file_class::del_file($strFileNamePre.'100_'.$strFileName);
				file_exists($strFileNamePre.'210_'.$strFileName) and keke_file_class::del_file($strFileNamePre.'210_'.$strFileName);
			}
			$res = $objFileT->del('file_id', $id);
			if($res){
				$status = 1;
				$msg 	= '删除成功';
			}
		}
	}
	echo json_encode(array ('status'=>$status,'msg'=>$msg));
	die();
}elseif($action=='uptoken'){//改造-获取文件上传token，配合webuploader.js
	$kekezu->include_qiniu_file();
	$qn 	= new QiniuClass();	
	echo $qn->uptoken();	
	die();
}elseif($action=='getMsg'){//改造-获取文件上传返回值，配合webuploader.js
	$kekezu->include_qiniu_file();
	$qn 	= new QiniuClass();
	$cfg = $kekezu->upload_param();
	$data = array();
	$savefilename = $_POST['filename'];
	$path = "http://".$cfg['qn_domain']."/".$savefilename;
	$data ['file_name'] = $savefilename;
	$data ['save_name'] = $path;
	$data ['uid'] 		= $gUid;
	$data ['username'] 	= $gUsername;
	$data ['obj_type'] 	= $objType;
	$data ['task_id'] 	= $taskId;
	$data ['work_id'] 	= $workId;
	$data ['on_time'] 	= time();
	$fileId = saveToFiles($data);
	$msg = array ('url' => $path,'filename' => $filename, 'name' => $name,'fileid'=>intval($fileId));
	echo json_encode(array ('err' => $err, 'msg' => $msg));
	die();
}else{
	$err = 0;
	if(QN_UPLOAD_OPEN){		
		$kekezu->include_qiniu_file();
		$file 		= $_FILES[$filename]['name'];
		$filepath 	= $_FILES[$filename]['tmp_name'] ;
		$qn 	= new QiniuClass();
		
		//request_post			
		/*set_time_limit(0);	
		$url = 'http://up.qiniu.com?';      
		$post_data = array(); 
        $post_data['file'] = $_FILES[$filename];
        $post_data['token'] =  $qn->uptoken();
        $post_data['key'] = time()."000".rand(10000000,99999999).'.'.substr(strrchr($file , '.'), 1);
        $res = request_post($url, $post_data, $filepath );
		$res_array = json_decode($res,true);
		//print_r($res_array);
		//$cfg['qn_domain'];
		$cfg = $kekezu->upload_param();
		
		$savefilename = $res_array['key'];
		$path = "http://".$cfg['qn_domain']."/".$res_array['key'];*/
		
		
		$ret 	= $qn->upload($file,$filepath);
		if(!$ret){
			$err = $msg = 'upload error';
			echo json_encode(array ('err' => $err, 'msg' => $msg));
			die();
		}else{
			$url 	= $qn->download($ret['key']);
			$savefilename = $ret['key'];
			$urls = explode('?', $url);
			$path = $urls[0];			
		}
	}else{
		$___y = date ( 'Y' );$___m = date ( 'm' );$___d = date ( 'd' );
		define ( 'UPLOAD_RULE', "$___y/$___m/$___d/" );
		$fileFormat = explode('|',$kekezu->_sys_config['file_type']);
		$maxSize = intval($kekezu->_sys_config['max_size'])*1024*1024;
		$pathDir = setUploadPath($fileType, $objType);
		$upload = new keke_upload_class(S_ROOT.$pathDir ,$fileFormat,$maxSize);
		$savename = $upload->run( $filename , 1);
		if(!is_array ( $savename )){
			$err = $msg = $savename;
			echo json_encode(array ('err' => $err, 'msg' => $msg));
			die();
		}else{
			$name = $savename [0] ['name'];
			$path = $pathDir. $savename [0] ['saveName'];
			if($fileType == 'service'){
				$size_a = array (100, 100 );
				$size_b = array (210, 210 );
				$result = keke_img_class::resize ( $path, $size_a, $size_b, true ); 
			}
			if($fileType != 'sys'){     
				keke_glob_class::waterMark($path);
			}
			$savefilename = $savename [0] ['name'];
		}
	}
	if(strtoupper(CHARSET) =='GBK'){
		$savefilename = kekezu::utftogbk($savefilename);
	}
	$data = array();
	$data ['file_name'] = $savefilename;
	$data ['save_name'] = $path;
	$data ['uid'] 		= $gUid;
	$data ['username'] 	= $gUsername;
	$data ['obj_type'] 	= $objType;
	$data ['task_id'] 	= $taskId;
	$data ['work_id'] 	= $workId;
	$data ['on_time'] 	= time();
	$fileId = saveToFiles($data);
	$msg = array ('url' => $path,'filename' => $filename, 'name' => $name,'fileid'=>intval($fileId));
	echo json_encode(array ('err' => $err, 'msg' => $msg));
	die();
}
function setUploadPath($fileType,$objType){
	$pathDir = 'data/uploads/';
	if($fileType =='sys'&&$objType =='auth'){		
		$pathDir .= $fileType.'/'.$objType.'/';
	}elseif($fileType =='sys'&&$objType =='ad'){	
		$pathDir .= $fileType.'/'.$objType.'/';
	}elseif($fileType =='sys'&&$objType =='mark'){	
		$pathDir .= $fileType.'/'.$objType.'/';
	}elseif($fileType =='sys'&&$objType =='tools'){	
		$pathDir .= $fileType.'/'.$objType.'/';
	}elseif($fileType =='space'){					
		$pathDir .= $fileType.'/';
	}else{
		$pathDir .= UPLOAD_RULE;
	}
	return $pathDir;
}
function saveToFiles($data){
	$objFileT = keke_table_class::get_instance('witkey_file');
	return $objFileT->save ( $data);
}
/**
 * 模拟post进行url请求
 * @param string $url
 * @param array $post_data
 */
function request_post($url = '', $post_data = array(),$files) {
	if (empty($url) || empty($post_data)) {
		return false;
	}
	
	/*$o = "";
	foreach ( $post_data as $k => $v ) 
	{ 
		$o.= "$k=" . urlencode( $v ). "&" ;
	}
	
	$post_data = substr($o,0,-1);*/
	
	$postUrl = $url;
	$curlPost = $post_data;
	$curlPost ['file'] = '@' . $files;  
	$ch = curl_init();//初始化curl
	
	curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
	curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
	curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
	curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
	curl_setopt($ch, CURLOPT_TIMEOUT,0);//不超时
	curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
	$data = curl_exec($ch);//运行curl
	curl_close($ch);	
	return $data;
}

function request_post_form($url = '',$post_data = array()){
	foreach($post_data as $key=>$value){
		$values[]="$key=".urlencode($value);
	}
	$data_string=implode("&",$values);
	// Find out which port is needed - if not given use standard (=80)
	/*if(!isset($URL_Info["port"]))
	$URL_Info["port"]=80;*/
	// building POST-request:
	$request.="POST ".$URL_Info["path"]." HTTP/1.1\n";
	$request.="Host: ".$URL_Info["host"]."\n";
	$request.="Referer: $referrer\n";
	$request.="Content-type: application/x-www-form-urlencoded\n";
	$request.="Content-length: ".strlen($data_string)."\n";
	$request.="Connection: close\n";
	$request.="\n";
	$request.=$data_string."\n";
	$fp = fsockopen($url,80);
	fputs($fp, $request);
	while(!feof($fp)) {
		$result .= fgets($fp, 128);
	}
	fclose($fp);
	return $result;
		
}

