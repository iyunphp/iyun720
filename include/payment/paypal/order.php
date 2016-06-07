<?php
defined('IN_KEKE') or exit('Access Denied');
function get_pay_url($charge_type,$pay_amount,$payment_config,$subject,$order_id,$model_id=null,$obj_id=null, $service ="_xclick", $sign_type = 'MD5',$show_url='index.php?do=user&view=finance&op=details') {
	global $_K,$uid,$username;
	$subject = 'paypal online pay(UID='.$uid.')';
	$seller_account = $payment_config['account'];
	$return_url = $_K ['siteurl'] . '/include/payment/paypal/return.php';
	$notify_url = $_K ['siteurl'] . '/include/payment/paypal/notify.php';
	$show_url = $_K ['siteurl'] . '/'.$show_url;
	$out_trade_no = "charge-{$charge_type}-{$uid}-{$obj_id}-{$order_id}-{$model_id}-".time();
	$total_money =$pay_amount ;
	if($_SESSION['currency']){
		$currency_code = $_SESSION['currency'];
	}else{
		$currency_code = 'CNY';
	}
    $p = array("business"=>$seller_account,
    			"cmd"=>'_xclick',
    			"custom"=>$out_trade_no,
    			"amount"=>$pay_amount,
    			"v_moneytype"=>"CNY",
    			"notify_url"=>$notify_url,
    			"return"=>$return_url,
    			"cancel_return"=>$show_url,
    		 	"currency_code"=>$currency_code,
    		 	"item_name"=>$subject,);
    keke_order_class::create_order_charge('online_charge', 'paypal', null, $obj_id, $uid, $username, $pay_amount, 'wait', '用户充值',$out_trade_no);
	return  build_postform($p);
}
function build_postform($p) {
	$sHtml = "<form id='E_FORM' name='frm_paypal'  action='https://www.paypal.com/cgi-bin/webscr' enctype=\"application/x-www-form-urlencoded\" method='post'>";
	while (list ($key, $val) = each ($p)) {
		$sHtml.= "<input type='hidden' name='".$key."' value='".$val."'/>";
	}
	$sHtml = $sHtml."</form>";
	$sHtml = $sHtml."<button type='submit' class='hidden' name='v_action' value='Paypal确认付款' onClick='document.forms[\"frm_paypal\"].submit();'>Paypal确认付款</button>";
	$sHtml = $sHtml."<script>document.forms['E_FORM'].submit();</script>";
	return $sHtml;
}
