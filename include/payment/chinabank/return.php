<?php
define ( "IN_KEKE", true );
require_once (dirname (dirname ( dirname ( dirname ( __FILE__ )) ) ) . DIRECTORY_SEPARATOR . 'app_comm.php');
$pay_arr = kekezu::get_payment_config ( 'chinabank' );
@extract ( $pay_arr );
$key = $safekey;
KEKE_DEBUG and  file_put_contents (S_ROOT.'data/log/chinabank_log.txt', var_export ( $_POST, 1 ) , FILE_APPEND ); 
$v_oid = trim ( $_POST ['v_oid'] ); 
$v_pmode = trim ( $_POST ['v_pmode'] ); 
$v_pstatus = trim ( $_POST ['v_pstatus'] ); 
$v_pstring = trim ( $_POST ['v_pstring'] ); 
$v_amount = trim ( $_POST ['v_amount'] ); 
$v_moneytype = trim ( $_POST ['v_moneytype'] ); 
$remark1 = trim ( $_POST ['remark1'] ); 
$remark2 = trim ( $_POST ['remark2'] ); 
$v_md5str = trim ( $_POST ['v_md5str'] ); 
$text = "{$v_oid}{$v_pstatus}{$v_amount}{$v_moneytype}{$key}";
$md5string = strtoupper ( md5 ( $text ) );
list ( $_, $charge_type, $uid, $obj_id, $order_id, $model_id ) = explode ( '-', $v_oid, 6 );
if ($v_md5str == $md5string) {
	if ($v_pstatus == "20" && $_ == 'charge') {
		$fac_obj = new pay_return_fac_class ( $charge_type, $model_id, $uid, $obj_id, $order_id, $v_amount, 'chinabank',$v_oid );
		$response = $fac_obj->load ( );
		if($charge_type=='user_charge'){
			$show_url = 'index.php?do=recharge&cash='.$v_amount.'&status=1';
			$_SESSION['chargecash'] = $v_amount;
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
	} else {
		$response ['url'] = 'index.php';
	}
} else {
	$response ['url'] = 'index.php';
}
header('Location:'.$response['url']);