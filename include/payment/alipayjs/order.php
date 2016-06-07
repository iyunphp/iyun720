<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
require_once (dirname (dirname ( dirname ( dirname ( __FILE__ ) )) ) . DIRECTORY_SEPARATOR . 'app_comm.php');
require_once("alipay_submit.class.php");
function get_pay_url($charge_type, $pay_amount, $payment_config, $subject, $order_id, $model_id = null, $obj_id = null, $service = null, $sign_type = 'MD5', $show_url='index.php?do=user&view=finance&op=details') {
	global $_K, $uid, $username;
	$charge_type == 'order_charge' and $t = "订单充值" or $t = "余额充值";
	if($service===null){
		$service =  "create_direct_pay_by_user";
	}
	$body = $t . "(from:" . $username . ")";
	$parameter = array ("service" => $service,
			 "partner" => $payment_config ['seller_id'],
			"return_url" => $_K ['siteurl'] . '/include/payment/alipayjs/return.php',
			"notify_url" => $_K ['siteurl'] . '/include/payment/alipayjs/notify.php',
			"_input_charset" => CHARSET, "subject" => $subject,
			 "body" => $body,
			 "out_trade_no" => "charge-{$charge_type}-{$uid}-{$obj_id}-{$order_id}-{$model_id}-".time(),
			"total_fee" => $pay_amount, "payment_type" => "1",
			 "show_url" => $_K ['siteurl'] . $show_url,
			 "seller_email" => $payment_config ['account'],
			"extend_param"=>"isv^kk11");
	keke_order_class::create_order_charge('online_charge', 'alipayjs', null, $obj_id, $uid, $username, $pay_amount, 'wait', '用户充值',$parameter['out_trade_no']);
	$alipay_config['partner']		= $payment_config['seller_id'];
	$alipay_config['key']			= $payment_config ['safekey'];
	$alipay_config['sign_type']    = strtoupper('MD5');
	$alipay_config['input_charset']= strtolower(CHARSET);
	$alipay_config['cacert']    = getcwd().'\\cacert.pem';
	$alipay_config['transport']    = 'http';
	$alipaySubmit = new AlipaySubmit($alipay_config);
	$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
	return $html_text;
}