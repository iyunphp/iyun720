<?php
class TaobaoOAuthClass extends OAuthBase {
	const OAUTH_AUTHORIZE_URL = ' https://oauth.taobao.com/authorize';
	const OAUTH_ACCESS_TOKEN_URL = 'https://oauth.taobao.com/token';
	const OAUTH_GET_TOKEN_INFO_URL = 'https://oauth.taobao.com/oauth2/get_token_info';
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
			"state" => 'taobao',
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
	        "view" => 'web',
	        "code" => $code
	    );
	    $response = $this->http_post(self::OAUTH_ACCESS_TOKEN_URL, $keysArr);
		$token = json_decode($response, true);
		if ( is_array($token) && !isset($token['error']) ) {
			$this->access_token = $token['access_token'];
		} else {
			exit("get access token failed." . $token['error']);
		}
		return $token;
	}
}
?>