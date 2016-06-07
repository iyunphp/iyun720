<?php
class WxPayCfg
{
	public $_appid				= '';
	public $_appsecert			= '';
	public $_mchid				= '';
	public $_key				= '';
	public $_notify_url			= '';
	public $_sslcert_path		= '';
	public $_sslkey_path		= '';
	public $_curl_proxy_host 	= "0.0.0.0";
	public $_curl_proxy_port 	= 0;
	public $_report_levenl 		= 1;
	public function __construct()
	{
		global $kekezu;
		$cfg = kekezu::get_payment_config('wxpay');
		$this->_appid 			= $cfg['appid'];
		$this->_appsecert 		= $cfg['appsecert'];
		$this->_mchid 			= $cfg['mchid'];
		$this->_key				= $cfg['key'];
		$this->_sslcert_path	= S_ROOT.'/include/payment/wxpay/cert/apiclient_cert.pem';
		$this->_sslkey_path		= S_ROOT.'/include/payment/wxpay/cert/apiclient_key.pem';
	}
}
