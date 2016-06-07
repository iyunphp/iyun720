<?php
class WxOAuthClass extends OAuthBase {
	const OAUTH_AUTHORIZE_URL = 'https://open.weixin.qq.com/connect/qrconnect?';
	const OAUTH_ACCESS_TOKEN_URL = 'https://api.weixin.qq.com/sns/oauth2/access_token';
	const OAUTH_API_URL = 'https://api.weixin.qq.com/sns/userinfo?';
	private $client_id; 
	private $client_secret; 
	private $redirect_uri; 
	private $grant_type; 
	private $access_token; 
	private $code; 
	private $scope; 
	private $state; 
	private $openid;
	private $access_token_info = array();
	function __construct($type) {
		$options = $this->getOAuthConfig($type);
		$this->client_id 	= isset ( $options ['client_id'] ) ? $options ['client_id'] : '';
		$this->client_secret= isset ( $options ['client_secret'] ) ? $options ['client_secret'] : '';
		$this->redirect_uri = isset ( $options ['redirect_uri'] ) ? $options ['redirect_uri'] : '';
	}
	public function requestAuthorize() {
		$keysArr = array(
			"response_type" => "code",
			"appid" 		=> $this->client_id,
			"redirect_uri" 	=> $this->redirect_uri,
			"scope" 		=> 'snsapi_login',
			"state" 		=> 'wx'
		);
		header('Location:'.$this->combineURL(self::OAUTH_AUTHORIZE_URL, $keysArr));
	}
	public function getAccessToken($code) {
		$keysArr = array(
			"appid" 	=> $this->client_id,
			"secret" 	=> $this->client_secret,
			"grant_type"=> "authorization_code",
			"code" 		=> $code
		);
		$response = $this->http_post($this->combineURL(self::OAUTH_ACCESS_TOKEN_URL, $keysArr));
		$token = json_decode($response, true);
		if ( is_array($token) && !isset($token['errcode']) ) {
			$this->access_token 		= $token['access_token'];
			$this->openid 				= $token['openid'];
			$this->access_token_info 	= $token;
		} else {
			exit("get access token failed." . $token['errmsg']);
		}
		return $token;
	}
	public function getAccountInfo(){
		$keysArr = array(
			"openid" 		=> $this->openid,
			"access_token" 	=> $this->access_token
		);
		$response = $this->http_get($this->combineURL(self::OAUTH_API_URL, $keysArr));
		$json = json_decode($response, true);
		if ( is_array($json) && !isset($json['errcode']) ) {
			return $json;
		} else {
			exit("get userinfo failed." . $json['errmsg']);
		}
	}
}
?>