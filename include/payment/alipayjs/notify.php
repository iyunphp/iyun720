<?php
define ( "IN_KEKE", true );
require_once (dirname (dirname ( dirname ( dirname ( __FILE__ ) ) )) . DIRECTORY_SEPARATOR . 'app_comm.php');
require_once("alipay_notify.class.php");
$_input_charset = strtoupper(CHARSET);
$payment_config = kekezu::get_payment_config ( 'alipayjs' );
$payment_config or die ( "支付配置错误，支付无法完成，请联系管理员。" );
$alipay_config['partner']		= $payment_config['seller_id'];
$alipay_config['key']			= $payment_config ['safekey'];
$alipay_config['sign_type']    = strtoupper('MD5');
$alipay_config['input_charset']= strtolower(CHARSET);
$alipay_config['cacert']    = getcwd().'\\cacert.pem';
$alipay_config['transport']    = 'http';
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyNotify();
KEKE_DEBUG and  file_put_contents (S_ROOT.'data/log/alipayjs_notify_log.txt', var_export ( $_POST, 1 ) , FILE_APPEND ); 
$echomsg = 'fail';
if ($verify_result) {
	if ($_POST ['trade_status'] == 'TRADE_FINISHED' || $_POST ['trade_status'] == 'TRADE_SUCCESS') {
		$out_trade_no = $_POST ['out_trade_no']; 
		$total_fee = $_POST ['total_fee']; 
		list ( $_, $charge_type, $uid, $obj_id, $order_id, $model_id,$url ) = explode ( '-', $out_trade_no, 6 );
		$fac_obj = new pay_return_fac_class ( $charge_type, $model_id, $uid, $obj_id, $order_id, $total_fee,'alipayjs',$out_trade_no);
		$response = $fac_obj->load ( );
		$echomsg = 'success';
	}
} 
echo $echomsg;
die();