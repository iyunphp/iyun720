<?php
define ( "IN_KEKE", true );
require_once (dirname (dirname ( dirname ( dirname ( __FILE__ ) )) ) . DIRECTORY_SEPARATOR . 'app_comm.php');
$payment_config = kekezu::get_payment_config('yeepay');
include 'yeepayCommon.php';
##支付成功回调有两次，都会通知到在线支付请求参数中的p8_Url上：浏览器重定向;服务器点对点通讯.
$return = getCallBackValue($r0_Cmd,$r1_Code,$r2_TrxId,$r3_Amt,$r4_Cur,$r5_Pid,$r6_Order,$r7_Uid,$r8_MP,$r9_BType,$hmac);
#	判断返回签名是否正确（True/False）
$bRet = CheckHmac($r0_Cmd,$r1_Code,$r2_TrxId,$r3_Amt,$r4_Cur,$r5_Pid,$r6_Order,$r7_Uid,$r8_MP,$r9_BType,$hmac);
list ( $_, $charge_type, $uid, $obj_id, $order_id, $model_id ) = explode ( '-', $r8_MP, 6 );
$fac_obj = new pay_return_fac_class ( $charge_type, $model_id, $uid, $obj_id, $order_id, $r3_Amt, 'yeepay' ,$r8_MP);
if($bRet){
	if($r1_Code=="1"){
		if($r9_BType=="1"){
			echo "交易成功";
			echo  "<br />在线支付页面返回";
			$response = $fac_obj->load ( );
			if($charge_type=='user_charge'){
				$show_url = 'index.php?do=recharge&cash='.$r3_Amt.'&status=1';
			}elseif($charge_type=='payitem_charge'){
				if(! in_array($model_id, array(6,7))){
					$show_url = 'index.php?do=task&id='.$obj_id;
				}else{
					$show_url =  'index.php?do=goods&id='.$obj_id;
				}
			}else{
				if(! in_array($model_id, array(6,7))){
					$arrOrderDetail = keke_order_class::get_order_detail($order_id);
					if($arrOrderDetail[0]['obj_type']=='hosted'){
						$show_url = 'index.php?do=task&id='.$obj_id;
					}else{
						$show_url = 'index.php?do=pay&type=task&id='.$obj_id.'&status=1';
					}
				}else{
					$show_url =  'index.php?do=pay&type=order&id='.$order_id.'&status=1';
				}
			}
			$response['url'] =$_K['siteurl'].'/'.$show_url;
			$fac_obj->return_notify ( 'yeepay',$response);
		}elseif($r9_BType=="2"){
			#如果需要应答机制则必须回写流,以success开头,大小写不敏感.
			echo "success";
			echo "<br />交易成功";
			echo  "<br />在线支付服务器返回";
			$fac_obj->return_notify ( 'yeepay');
		}
	}
}else{
	echo "交易信息被篡改";
	$fac_obj->return_notify ( 'yeepay');
}
header('Location:'.$response['url']);
?>
<html>
<head>
<title>易宝支付返回页面</title>
</head>
<body>
</body>
</html>