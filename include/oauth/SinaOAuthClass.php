<?php
class SinaOAuthClass extends OAuthBase {
	const OAUTH_AUTHORIZE_URL = 'https://api.weibo.com/oauth2/authorize';
	const OAUTH_ACCESS_TOKEN_URL = 'https://api.weibo.com/oauth2/access_token';
	const OAUTH_API_URL = 'https://api.weibo.com/2/';
	private $client_id; 
	private $client_secret; 
	private $redirect_uri; 
	private $grant_type; 
	private $access_token; 
	private $code; 
	private $scope; 
	private $state; 
	private $uid;
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
			"state" => 'sina'
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
	public function getAccountInfo($uid=''){
		if($uid){
			$this->uid = $uid;
		}
		$keysArr = array(
			"uid" => $this->uid,
			"access_token" => $this->access_token
		);
		$response = $this->http_get($this->combineURL(self::OAUTH_API_URL.'users/show.json', $keysArr));
		$json = json_decode($response, true);
		if ( is_array($json) && !isset($json['error']) ) {
			return $json;
		} else {
			exit("get userinfo failed." . $json['error']);
		}
	}
	public function getAccountUid($access_token=''){
		if($access_token){
			$this->access_token = $access_token;
		}
		$keysArr = array(
				"access_token" => $this->access_token
		);
		$response = $this->http_get($this->combineURL(self::OAUTH_API_URL.'account/get_uid.json', $keysArr));
		$json = json_decode($response, true);
		if ( is_array($json) && !isset($json['error']) ) {
			$this->uid = $json['uid'];
		} else {
			exit("get uid failed." . $json['error']);
		}
		return $json;
	}
}
?>