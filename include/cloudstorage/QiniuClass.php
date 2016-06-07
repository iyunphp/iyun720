<?php
class QiniuClass {
	private $_AccessKey = '';
	private $_SecretKey = '';
	private $_Bucket 	= '';
	private $_Domain 	= '';
	private $_Token 	= '';
	private $_putPolicy = '';
	public function __construct(){
		global $kekezu;
		$cfg = $kekezu->upload_param();
		$this->_AccessKey 	= $cfg['qn_access_key'];
		$this->_SecretKey 	= $cfg['qn_secret_key'];
		$this->_Bucket 		= $cfg['qn_bucket'];
		$this->_Domain 		= $cfg['qn_domain'];
		$this->qiniuSetKey();
		$this->_putPolicy   = new Qiniu_RS_PutPolicy($this->_Bucket);
	}
	public function uptoken(){
		$this->_Token 	= $this->_putPolicy->Token(null);
		return $this->_Token;
	}
	public function valid($access_key,$secret_key,$bucket){
		$this->_AccessKey 	= $access_key;
		$this->_SecretKey 	= $secret_key;
		$this->_Bucket 		= $bucket;
		$this->qiniuSetKey();
		$this->_putPolicy   = new Qiniu_RS_PutPolicy($this->_Bucket);
	}
	public function upload($filename,$filepath){
		$putExtra 	= new Qiniu_PutExtra();
		$putExtra->Crc32 = 1;
		$filename = $this->newfilename($filename);
		list($ret, $err) = Qiniu_PutFile($this->uptoken(), $filename, $filepath, $putExtra);
		if ($err !== null) {
			return false;
		} else {
			return $ret;
		}
	}
	public function download($key){
		$getPolicy = new Qiniu_RS_GetPolicy();
		return $getPolicy->MakeRequest(Qiniu_RS_MakeBaseUrl($this->_Domain, $key), null);;
	}
	public function delete($key){
		$err = Qiniu_RS_Delete( new Qiniu_MacHttpClient(null), $this->_Bucket, $key);
		if ($err !== null) {
			return false;
		} 
		return  true;
	}
	public function newfilename($file){
		$ext =   strtolower(trim(substr(strrchr($file, '.'), 1)));
		$rand = kekezu::randomkeys(8);
		$time = microtime();
		$str = $file.$time.$rand;
		if(function_exists('sha1') ){
			return   sha1($str).'.'.$ext;
		}
		return   md5($str).'.'.$ext;
	}
	public function viewFileInfoByKey($key){
		list($ret, $err) = Qiniu_RS_Stat(new Qiniu_MacHttpClient(null), $this->_Bucket, $key);
		var_dump($ret,$err);
	} 
	public function qiniuSetKey(){
		Qiniu_SetKeys($this->_AccessKey, $this->_SecretKey);
	}
	public function save($key){
		$getPolicy = new Qiniu_Pfop();
		return $getPolicy->MakeRequest(Qiniu_RS_MakeBaseUrl($this->_Domain, $key), null);;
	}
}
?>