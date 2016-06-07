<?php
defined('IN_KEKE') or 	exit('Access Denied');
function get_pay_url($charge_type,$pay_amount,$payment_config,$subject,$order_id,$model_id=null,$obj_id=null, $service ="create_direct_pay_by_user", $sign_type = 'MD5', $show_url='index.php?do=user&view=finance&op=details') {
	global $_K,$uid,$username;
	$partner = $payment_config['seller_id'];;
	$security_code = $payment_config['safekey'];
	$return_url = $_K ['siteurl'] . '/include/payment/chinabank/return.php';
	$notify_url = $_K ['siteurl'] . '/include/payment/chinabank/notify.php';
	$show_url = $_K ['siteurl'] . '/'.$show_url;
	$out_trade_no = "charge-{$charge_type}-{$uid}-{$obj_id}-{$order_id}-{$model_id}-".time();
	$total_money =$pay_amount ;
	$charge_type=='order_charge' and $t = "订单充值" or $t="余额充值";
	$body = $t."(from:".$username.")";
	$text = $pay_amount."CNY".$out_trade_no.$partner.$return_url.$security_code;        
	$v_md5info = strtoupper(md5($text));                             
    $p = array("v_mid"=>$partner,
    			"v_oid"=>$out_trade_no,
    			"v_amount"=>$pay_amount,
    			"v_moneytype"=>"CNY",
    			"remark2"=>'[url:='.$notify_url.']',
    			"v_url"=>$return_url,
    		 	"v_md5info"=>$v_md5info);
    keke_order_class::create_order_charge('online_charge', 'chinabank', null, $obj_id, $uid, $username, $pay_amount, 'wait', '用户充值',$out_trade_no);
	return  build_postform($p);
}
function build_postform($p) {
	$sHtml = "<form id='E_FORM' name='E_FORM' action='https://Pay3.chinabank.com.cn/PayGate' method='post'>";
	while (list ($key, $val) = each ($p)) {
		$sHtml.= "<input type='hidden' name='".$key."' value='".$val."'/>";
	}
	$sHtml = $sHtml."</form>";
	$sHtml = $sHtml."<button type='submit' style='display:none;' name='v_action' value='网银确认付款' onClick='document.forms[\"E_FORM\"].submit();'>网银确认付款</button>";
	$sHtml = $sHtml."<script>document.forms['E_FORM'].submit();</script>";
	return $sHtml;
}
