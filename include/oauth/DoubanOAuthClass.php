<?php
class DoubanOAuthClass extends OAuthBase {
	const OAUTH_AUTHORIZE_URL = 'https://www.douban.com/service/auth2/auth';
	const OAUTH_ACCESS_TOKEN_URL = 'https://www.douban.com/service/auth2/token';
	const OAUTH_API_URL = 'https://api.douban.com';
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
			'response_type' => 'code',
			'client_id' => $this->client_id,
			'redirect_uri' => $this->redirect_uri,
			'scope' => 'douban_basic_common,shuo_basic_r',
			'state' => 'douban'
		);
		header('Location:'.$this->combineURL(self::OAUTH_AUTHORIZE_URL, $keysArr));
	}
	public function getAccessToken($code) {
		$keysArr = array(
			'grant_type' => 'authorization_code',
			'code' => $code,
			'client_id' => $this->client_id,
			'client_secret' => $this->client_secret,
			'redirect_uri' => $this->redirect_uri
		);
		$response = $this->http_post($this->combineURL(self::OAUTH_ACCESS_TOKEN_URL, $keysArr));
		$token = json_decode($response, true);
		if ( is_array($token) && isset($token['access_token']) && $token['access_token'] ) {
			$this->access_token = $token['access_token'];
			$this->userId = $token['douban_user_id'];
		} else {
			exit("get access token failed." . $token['error']);
		}
		return $token;
	}
	public function getAccountInfo($access_token=''){
		if($access_token){
			$this->access_token = $access_token;
		}
		$keysArr = array(
				"access_token" => $this->access_token
		);
		$response = $this->http_get(self::OAUTH_API_URL.'/v2/user/'.$this->userId);
		$json = json_decode($response, true);
		if ( is_array($json) && $json['id']) {
			return $json;
		} else {
			exit("get userId failed.非法的测试用户，无法调用接口。" . $json['error']['code']);
		}
	}
}
?>