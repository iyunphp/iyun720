<?php
define ( "IN_KEKE", true );
require_once (dirname ( dirname ( dirname ( __FILE__ ) ) ) . DIRECTORY_SEPARATOR . 'app_comm.php');
require_once ("alipay_notify.php");
$_input_charset = strtoupper ( CHARSET );
$payment_config = kekezu::get_payment_config ( 'alipayjs' );
$payment_config or die ( "支付配置错误，支付无法完成，请联系管理员。" );
$seller_id = $payment_config ['seller_id'];
$security_code = $payment_config ['safekey'];
$seller_email = $payment_config ['account']; 
$sign_type = "MD5";
$transport = "http";
$alipay = new alipay_notify ( $seller_id, $security_code, $sign_type, $_input_charset, $transport );
$verify_result = $alipay->notify_verify ();
$notify_type = $_POST ['notify_type']; 
$success_details = $_POST ['success_details']; 
$fail_details = $_POST ['fail_details']; 
KEKE_DEBUG and $fp = file_put_contents ( 'log.txt', var_export ( $_POST, 1 ), FILE_APPEND );
if ($verify_result) {
	echo "success";
	if ($notify_type == 'batch_trans_notify') {
		$batch_obj = pay_batch_fac_class::get_instance ( 'alipayjs' );
		$batch_obj->success_notify ( $success_details, $fail_details );
	}
} else {
	echo "error";
}