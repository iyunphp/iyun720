<?php
include_once ('PaymentGateway.php');
class Paypal extends PaymentGateway
{
	public function __construct()
	{
		$this->gatewayUrl = 'https://www.paypal.com/cgi-bin/webscr';
		$this->ipnLogFile = 'log.txt';
		$this->addField('rm', '2');           
		$this->addField('cmd', '_xclick');
	}
    public function enableTestMode()
    {
        $this->testMode = TRUE;
        $this->gatewayUrl = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
    }
	public function validateIpn()
	{
		$urlParsed = parse_url($this->gatewayUrl);
		$postString = '';
		foreach ($_POST as $field=>$value)
		{
			$this->ipnData["$field"] = $value;
			$postString .= $field .'=' . urlencode(stripslashes($value)) . '&';
		}
		$postString .="cmd=_notify-validate"; 
		$fp = fsockopen("ssl://".$urlParsed[host], "443", $errNum, $errStr, 30);
		if(!$fp)
		{
			$this->lastError = "fsockopen error no. $errNum: $errStr";
			$this->logResults(false);
			return false;
		}
		else
		{
			fputs($fp, "POST $urlParsed[path] HTTP/1.1\r\n");
			fputs($fp, "Host: $urlParsed[host]\r\n");
			fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
			fputs($fp, "Content-length: " . strlen($postString) . "\r\n");
			fputs($fp, "Connection: close\r\n\r\n");
			fputs($fp, $postString . "\r\n\r\n");
			while(!feof($fp))
			{
				$this->ipnResponse .= fgets($fp, 1024);
			}
		 	fclose($fp); 
		}
		if (eregi("VERIFIED", $this->ipnResponse))
		{
		 	$this->logResults(true);
		 	return true;
		}
		else
		{
			$this->lastError = "IPN Validation Failed . $urlParsed[path] : $urlParsed[host]";
			$this->logResults(false);
			return false;
		}
	}
}
