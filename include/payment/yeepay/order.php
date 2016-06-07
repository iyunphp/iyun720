<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
require_once (dirname (dirname ( dirname ( dirname ( __FILE__ ) )) ) . DIRECTORY_SEPARATOR . 'app_comm.php');
include 'yeepayCommon.php';
function get_pay_url($charge_type, $pay_amount, $payment_config, $subject, $order_id, $model_id = null, $obj_id = null, $service = '', $sign_type = 'MD5', $show_url='index.php?do=user&view=finance&op=details') {
	global $_K, $uid, $username,$kekezu;
	$out_trade_no = "charge-{$charge_type}-{$uid}-{$obj_id}-{$order_id}-{$model_id}-".time();
	$return_url = $_K ['siteurl'] . '/include/payment/yeepay/callback.php'; 
	keke_order_class::create_order_charge('online_charge', 'yeepay', null, $obj_id, $uid, $username, $pay_amount, 'wait', '用户充值',$out_trade_no);
	$p1_MerId = $payment_config ['seller_id']; 
	$merchantKey = $payment_config ['safekey']; 
	$logName = "YeePay_HTML.log";
	$reqURL_onLine = "https://www.yeepay.com/app-merchant-proxy/node";
	$p0_Cmd = "Buy";
	$p9_SAF = "0";
	$p2_Order = $order_id;
	$p3_Amt = $pay_amount;
	$p4_Cur = "CNY";
	$subject = 'kppwpay'.$order_id;
	$p5_Pid = mb_substr ( $subject, 0, 20, CHARSET );
	$p6_Pcat = "";
	$p7_Pdesc = $p5_Pid;
	$p8_Url = $return_url;
	$pa_MP = $out_trade_no;
	$pd_FrpId = "";
	$pr_NeedResponse = "1";
	$hmac = getReqHmacString ( $p2_Order, $p3_Amt, $p4_Cur, $p5_Pid, $p6_Pcat, $p7_Pdesc, $p8_Url, $pa_MP, $pd_FrpId, $pr_NeedResponse );
	$form = <<<EOT
<form  id='yeepaysubmit' name='yeepaysubmit' action='$reqURL_onLine' method='post'>
<input type='hidden' name='p0_Cmd'					value='$p0_Cmd'>
<input type='hidden' name='p1_MerId'				value='$p1_MerId'>
<input type='hidden' name='p2_Order'				value='$p2_Order'>
<input type='hidden' name='p3_Amt'					value='$p3_Amt'>
<input type='hidden' name='p4_Cur'					value='$p4_Cur'>
<input type='hidden' name='p5_Pid'					value='$p5_Pid'>
<input type='hidden' name='p6_Pcat'					value='$p6_Pcat'>
<input type='hidden' name='p7_Pdesc'				value='$p7_Pdesc'>
<input type='hidden' name='p8_Url'					value='$p8_Url'>
<input type='hidden' name='p9_SAF'					value='$p9_SAF'>
<input type='hidden' name='pa_MP'						value='$pa_MP'>
<input type='hidden' name='pd_FrpId'				value='$pd_FrpId'>
<input type='hidden' name='pr_NeedResponse'	value='$pr_NeedResponse'>
<input type='hidden' name='hmac'						value='$hmac'>
<button type='submit' class='hidden' name='v_action' value='确认付款' onClick='document.forms["yeepay"].submit();'  style='display:none;'>确认付款</button>
</form>
<script>document.forms['yeepaysubmit'].submit();</script>
EOT;
	return $form;
}
