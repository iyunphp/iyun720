<?php
class OAuthBase {
	protected function getOAuthConfig($type){
		global $basic_config;
		$config = array();
		$config['client_id'] 	 = $basic_config[strtolower($type).'_app_id'];
		$config['client_secret'] = $basic_config[strtolower($type).'_app_secret'];
		$config['redirect_uri']  = $basic_config['website_url'].'/control/oauth_redirect.php';
		if($config['client_id'] && $config['client_secret']){
			return $config;
		}
		exit(strtolower($type).'config is null');
	}
	protected function http_get($url){
		$oCurl = curl_init();
		if(stripos($url,"https://")!==FALSE){
			curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, FALSE);
			curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); 
		}
		curl_setopt($oCurl, CURLOPT_URL, $url);
		curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
		$sContent = curl_exec($oCurl);
		$aStatus = curl_getinfo($oCurl);
		curl_close($oCurl);
		return $sContent;
	}
	protected function http_post($url,$param,$headers=array(),$post_file=false){
		$oCurl = curl_init();
		if(stripos($url,"https://")!==FALSE){
			curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); 
		}
		if (is_string($param) || $post_file) {
			$strPOST = $param;
		} else {
			$aPOST = array();
			foreach($param as $key=>$val){
				$aPOST[] = $key."=".urlencode($val);
			}
			$strPOST =  join("&", $aPOST);
		}
		curl_setopt($oCurl, CURLOPT_URL, $url);
		curl_setopt( $oCurl,CURLOPT_HTTPHEADER, $headers );
		curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt($oCurl, CURLOPT_POST,true);
		curl_setopt($oCurl, CURLOPT_POSTFIELDS,$strPOST);
		$sContent = curl_exec($oCurl);
		$aStatus = curl_getinfo($oCurl);
		curl_close($oCurl);
		return $sContent;
	}
	function combineURL($baseURL,$keysArr){
		$combined = $baseURL."?";
		$valueArr = array();
		foreach($keysArr as $key => $val){
			$valueArr[] = "$key=$val";
		}
		$keyStr = implode("&",$valueArr);
		$combined .= ($keyStr);
		return $combined;
	}
}
?>