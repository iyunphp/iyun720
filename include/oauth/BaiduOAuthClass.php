<?php
class BaiduOAuthClass extends OAuthBase {
	const OAUTH_AUTHORIZE_URL = 'https://openapi.baidu.com/oauth/2.0/authorize';
	const OAUTH_ACCESS_TOKEN_URL = 'https://openapi.baidu.com/oauth/2.0/token';
	const OAUTH_API_URL = 'https://openapi.baidu.com/rest/2.0/passport/users/getInfo';
	private $client_id; 
	private $client_secret; 
	private $redirect_uri; 
	private $grant_type; 
	private $access_token; 
	private $code; 
	private $scope; 
	private $state; 
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
			"state" => 'baidu'
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
	public function getAccountInfo($token){
		$keysArr = array(
			"access_token" => $token['access_token']
		);
		$response = $this->http_get($this->combineURL(self::OAUTH_API_URL, $keysArr));
		$json = json_decode($response, true);
		if ( is_array($json) && !isset($json['error']) ) {
			return $json;
		} else {
			exit("get userinfo failed." . $json['error']);
		}
	}
}
?>