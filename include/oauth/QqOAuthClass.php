<?php
class QqOAuthClass extends OAuthBase {
	const OAUTH_AUTHORIZE_URL = "https://graph.qq.com/oauth2.0/authorize";
	const OAUTH_ACCESS_TOKEN_URL = 'https://graph.qq.com/oauth2.0/token';
	const OAUTH_API_URL = 'https://graph.qq.com/user/get_user_info';
	const GET_OPENID_URL = "https://graph.qq.com/oauth2.0/me";
	private $client_id; 
	private $client_secret; 
	private $redirect_uri; 
	private $grant_type; 
	private $access_token; 
	private $code; 
	private $scope ='get_user_info'; 
	private $state; 
	private $openid;
	private $format ='json';
	function __construct($type) {
		$options = $this->getOAuthConfig($type);
		$this->client_id = isset ( $options ['client_id'] ) ? $options ['client_id'] : '';
		$this->client_secret = isset ( $options ['client_secret'] ) ? $options ['client_secret'] : '';
		$this->redirect_uri = isset ( $options ['redirect_uri'] ) ? $options ['redirect_uri'] : '';
	}
	public function requestAuthorize() {
		$keysArr = array(
			"response_type" => "code",
			"client_id" => $this->client_id,
			"redirect_uri" => $this->redirect_uri,
			"state" => 'qq',
			"scope" => $this->scope
		);
		header('Location:'.$this->combineURL(self::OAUTH_AUTHORIZE_URL, $keysArr));
	}
	public function getAccessToken($code) {
		$keysArr = array(
			"grant_type" => "authorization_code",
			"client_id" => $this->client_id,
			"redirect_uri" => urlencode($this->redirect_uri),
			"client_secret" => $this->client_secret,
			"code" => $code
		);
		$response = $this->http_get($this->combineURL(self::OAUTH_ACCESS_TOKEN_URL, $keysArr));
		if(strpos($response, "callback") !== false){
			$lpos = strpos($response, "(");
			$rpos = strrpos($response, ")");
			$response  = substr($response, $lpos + 1, $rpos - $lpos -1);
			$msg = json_decode($response);
			if(isset($msg->error)){
				var_dump($msg->error, $msg->error_description);die;
			}
		}
		$token = array();
		parse_str($response, $token);
		if ( is_array($token) && !isset($token['error']) ) {
			$this->access_token = $token['access_token'];
		} else {
			exit("get access token failed." . $token['error']);
		}
		return $token;
	}
	public function getAccountInfo($openid=''){
		if($openid){
			$this->openid = $openid;
		}
		$keysArr = array(
				"oauth_consumer_key" => $this->client_id,
				"access_token" => $this->access_token,
				"openid" => $this->openid,
				"format" => $this->format
		);
		$response = $this->http_get($this->combineURL(self::OAUTH_API_URL, $keysArr));
		$json = json_decode($response, true);
		if ( is_array($json) && !isset($json['error']) ) {
			return $json;
		} else {
			exit("get userinfo failed." . $json['error']);
		}
	}
	public function getOpenid($access_token=''){
		if($access_token){
			$this->access_token = $access_token;
		}
		$keysArr = array(
			"access_token" => $this->access_token
		);
		$response = $this->http_get($this->combineURL(self::GET_OPENID_URL, $keysArr));
		if(strpos($response, "callback") !== false){
			$lpos = strpos($response, "(");
			$rpos = strrpos($response, ")");
			$response  = substr($response, $lpos + 1, $rpos - $lpos -1);
			$msg = json_decode($response);
			if(isset($msg->error)){
				var_dump($msg->error, $msg->error_description);die;
			}
			if($msg->openid){
				$this->openid = $msg->openid;
				return $msg->openid;
			}
		}
		exit("get openid failed." . $result['error']);
	}
}
?>