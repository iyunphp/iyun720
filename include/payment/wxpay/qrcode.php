<?php
define ( "IN_KEKE", true );
require_once (dirname (dirname ( dirname ( dirname ( __FILE__ ) ) )) . DIRECTORY_SEPARATOR . 'app_comm.php');
require_once S_ROOT."/lib/helper/phpqrcode.php";
$url = urldecode($_GET["data"]);
QRcode::png($url,  false, 3,7);
