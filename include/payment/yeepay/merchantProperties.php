<?php
define ( "IN_KEKE", true );
require_once (dirname (dirname ( dirname ( dirname ( __FILE__ ) )) ) . DIRECTORY_SEPARATOR . 'app_comm.php');
$payment_config = kekezu::get_payment_config('yeepay');
$p1_MerId			= $payment_config['seller_id'];																										#测试使用
$merchantKey	= $payment_config['safekey'];
$logName	= "YeePay_HTML.log";
