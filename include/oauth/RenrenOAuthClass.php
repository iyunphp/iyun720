<?php
class RenrenOAuthClass extends OAuthBase {
	const OAUTH_AUTHORIZE_URL = 'https://graph.renren.com/oauth/authorize';
	const OAUTH_ACCESS_TOKEN_URL = 'https://graph.renren.com/oauth/token';
	const OAUTH_API_URL = 'https://api.renren.com';
	private $client_id; 
	private $client_secret; 
	private $redirect_uri; 
	private $grant_type; 
	private $access_token; 
	private $code; 
	private $scope; 
	private $state; 
	private $userId;
	function __construct($type) {
		$options = $this->getOAuthConfig($type);
		$this->client_id = isset ( $options ['client_id'] ) ? $options ['client_id'] : '';
		$this->client_secret = isset ( $options ['client_secret'] ) ? $options ['client_secret'] : '';
		$this->redirect_uri = isset ( $options ['redirect_uri'] ) ? $options ['redirect_uri'] : '';
	}
	public function requestAuthorize() {
		$keysArr = array(
			"client_id" => $this->client_id,
			"redirect_uri" => $this->redirect_uri,
			"response_type" => "code",
			"scope"=>'',
			"display"=>'page',
			"state" => 'renren'
		);
		header('Location:'.$this->combineURL(self::OAUTH_AUTHORIZE_URL, $keysArr));
	}
	public function getAccessToken($code) {
		$keysArr = array(
			"client_id" => $this->client_id,
			"client_secret" => $this->client_secret,
			"redirect_uri" => $this->redirect_uri,
			"grant_type" => "authorization_code",
			"code" => $code
		);
		$response = $this->http_post($this->combineURL(self::OAUTH_ACCESS_TOKEN_URL, $keysArr));
		$token = json_decode($response, true);
		if ( is_array($token) && !isset($token['error']) ) {
			$this->access_token = $token['access_token'];
		} else {
			exit("get access token failed." . $token['error']);
		}
		return $token;
	}
	public function getAccountInfo($userId=''){
		if($userId){
			$this->userId = $userId;
		}
		$keysArr = array(
			"userId" => $this->userId,
			"access_token" => $this->access_token
		);
		$response = $this->http_get($this->combineURL(self::OAUTH_API_URL.'/v2/user/get', $keysArr));
		$json = json_decode($response, true);
		if ( is_array($json) && isset($json['response']['id']) ) {
			return $json['response'];
		} else {
			exit("get userinfo failed." . $json['error']);
		}
	}
	public function getUserId($access_token=''){
		if($access_token){
			$this->access_token = $access_token;
		}
		$keysArr = array(
				"access_token" => $this->access_token
		);
		$response = $this->http_get($this->combineURL(self::OAUTH_API_URL.'/v2/user/login/get', $keysArr));
		$json = json_decode($response, true);
		if ( is_array($json) && $json['response']['id'] ) {
			$this->userId = $json['response']['id'];
		} else {
			exit("get userId failed.非法的测试用户，无法调用接口。" . $json['error']['code']);
		}
		return $json;
	}
}
?>