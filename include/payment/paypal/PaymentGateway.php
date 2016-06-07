<?php
abstract class PaymentGateway
{
    public $lastError;
    public $logIpn;
    public $ipnLogFile;
    public $ipnResponse;
    public $testMode;
    public $fields = array();
    public $ipnData = array();
    public $gatewayUrl;
    public function __construct()
    {
        $this->lastError = '';
        $this->logIpn = TRUE;
        $this->ipnResponse = '';
        $this->testMode = FALSE;
    }
    public function addField($field, $value)
    {
        $this->fields["$field"] = $value;
    }
    public function submitPayment()
    {
        $this->prepareSubmit();
        echo "<html>\n";
        echo "<head><title>Processing Payment...</title></head>\n";
        echo "<body onLoad=\"document.forms['gateway_form'].submit();\">\n";
        echo "<p style=\"text-align:center;\"><h2>Please wait, your order is being processed and you";
        echo " will be redirected to the payment website.</h2></p>\n";
        echo "<form method=\"POST\" name=\"gateway_form\" ";
        echo "action=\"" . $this->gatewayUrl . "\">\n";
        foreach ($this->fields as $name => $value)
        {
             echo "<input type=\"hidden\" name=\"$name\" value=\"$value\"/>\n";
        }
        echo "<p style=\"text-align:center;\"><br/><br/>If you are not automatically redirected to ";
        echo "payment website within 5 seconds...<br/><br/>\n";
        echo "<input type=\"submit\" value=\"Click Here\"></p>\n";
        echo "</form>\n";
        echo "</body></html>\n";
    }
    protected function prepareSubmit()
    {
    }
    abstract protected function validateIpn();
    public function logResults($success)
    {
        if (!$this->logIpn) return;
        $text = '[' . date('m/d/Y g:i A').'] - ';
        $text .= ($success) ? "SUCCESS!\n" : 'FAIL: ' . $this->lastError . "\n";
        $text .= "IPN POST Vars from gateway:\n";
        foreach ($this->ipnData as $key=>$value)
        {
            $text .= "$key=$value, \n";
        }
        $text .= "\nIPN Response from gateway Server:\n " . $this->ipnResponse;
        $fp = fopen($this->ipnLogFile,'a');
        fwrite($fp, $text . "\n\n");
        fclose($fp);
    }
}
