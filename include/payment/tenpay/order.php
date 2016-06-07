<?php
defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
require 'PayRequestHandler.php';
function get_pay_url($charge_type,$pay_amount, $payment_config, $subject, $order_id, $model_id = null, $obj_id = null, $service = "DEFAULT", $sign_type = 'MD5',$show_url='index.php?do=user&view=finance&op=details') {
	global $_K, $uid,$username;
	$tenpayid = $payment_config['seller_id'];
	$tenpaykey = $payment_config['safekey'];
 	$tenpay_return_url = $_K ['siteurl'] . '/include/payment/tenpay/return.php';  
	$order_no = $order_id;
	$product_name = $subject;
	$order_price = $pay_amount;
	$out_trade_no = "charge-{$charge_type}-{$uid}-{$obj_id}-{$order_id}-{$model_id}-".time();
	$remarkexplain = $out_trade_no;
	$bargainor_id = $tenpayid;
	$key = $tenpaykey;
	$return_url = $tenpay_return_url;
	$strDate = date("Ymd");
	$strTime = date("His");
	$randNum = rand(1000, 9999);
	$strReq = $strTime . $randNum;
	$sp_billno = $order_no;
	$transaction_id = $bargainor_id . $strDate . $strReq;
	$total_fee = $order_price*100;
	$desc = $product_name;
	$reqHandler = new PayRequestHandler();
	$reqHandler->init();
	$reqHandler->setKey($key);
	$reqHandler->setParameter("bargainor_id", $bargainor_id);			
	$reqHandler->setParameter("sp_billno", $sp_billno);					
	$reqHandler->setParameter("transaction_id", $transaction_id);		
	$reqHandler->setParameter("total_fee", $total_fee);					
	$reqHandler->setParameter("return_url", $return_url);				
	$reqHandler->setParameter("desc", $desc);	
	$reqHandler->setParameter("attach", $remarkexplain);
	$reqHandler->setParameter("bank_type", $service);    
	$reqHandler->setParameter('cs',CHARSET);
	$reqHandler->setParameter("spbill_create_ip", kekezu::get_ip());
	$reqUrl = $reqHandler->getRequestURL();
	keke_order_class::create_order_charge('online_charge', 'tenpay', null, $obj_id, $uid, $username, $pay_amount, 'wait', '用户充值',$out_trade_no);
	return build_postform ( $reqUrl );
}
function build_postform($p) {
	$sHtml = "<form id='E_FORM' name='E_FORM' action='$p' method='post' enctype='application/x-www-form-urlencoded'>";
	$sHtml = $sHtml."</form>";
	$sHtml = $sHtml."<button type='submit' style='display:none;' name='v_action' value='财付通确认付款' onClick='document.forms[\"E_FORM\"].submit();'>财付通确认付款</button>";
	$sHtml = $sHtml."<script>document.forms['E_FORM'].submit();</script>";
	return $sHtml;
}