<?php
define ( "IN_KEKE", true );
require_once (dirname (dirname ( dirname ( dirname ( __FILE__ ) ) )) . DIRECTORY_SEPARATOR . 'app_comm.php');
ini_set('date.timezone','Asia/Shanghai');
require_once "lib/WxPay.Cfg.php";
require_once "lib/WxPay.Exception.php";
require_once "lib/WxPay.Data.php";
require_once "lib/WxPay.Api.php";
require_once "WxPay.NativePay.php";
require_once "lib/WxPay.Notify.php";
require_once "log.php";
$logHandler= new CLogFileHandler(S_ROOT."/data/wxpaylogs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);
class PayNotifyCallBack extends WxPayNotify
{
	public function Queryorder($transaction_id)
	{
		$input = new WxPayOrderQuery();
		$input->SetTransaction_id($transaction_id);
		$result = WxPayApi::orderQuery($input);
		Log::DEBUG("query:" . json_encode($result));
		if(array_key_exists("return_code", $result)
			&& array_key_exists("result_code", $result)
			&& $result["return_code"] == "SUCCESS"
			&& $result["result_code"] == "SUCCESS")
		{
			return true;
		}
		return false;
	}
	public function NotifyProcess($data, &$msg)
	{
		Log::DEBUG("call back:" . json_encode($data));
		$notfiyOutput = array();
		if(!array_key_exists("transaction_id", $data)){
			$msg = "输入参数不正确";
			return false;
		}
		if(!$this->Queryorder($data["transaction_id"])){
			$msg = "订单查询失败";
			return false;
		}
		if(!array_key_exists("out_trade_no", $data)){
			$msg = "输入参数不正确";
			return false;
		}
		$out_trade_no 	= $data['out_trade_no'];
		$attach 	= $data['attach'];
		list ( $_, $charge_type, $uid, $obj_id, $order_id, $model_id ) = explode ( '-', $attach, 6 );
		$echomsg = 'error';
		if ($_ == 'charge') {
			$fac_obj = new pay_return_fac_class ( $charge_type, $model_id, $uid, $obj_id, $order_id, floatval($data['total_fee']/100), 'wxpay' ,$out_trade_no);
			$response = $fac_obj->load ( );
		}
		return true;
	}
}
Log::DEBUG("begin notify");
$notify = new PayNotifyCallBack();
$notify->Handle(false);
