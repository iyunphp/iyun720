<?php	defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role (34);
$config_basic_obj = new Keke_witkey_basic_config_class ();
$config_basic_arr = $config_basic_obj->query_keke_witkey_basic_config ();
$lang_arr = keke_lang_class::lang_type();
foreach ( $config_basic_arr as $k => $v ) {
	$config_arr [$v ['k']] = $v ['v'];
}
$picLists = CommonClass::getFileListsBySavename($config_arr['web_logo']);
$web_logo_info = $picLists[0];
isset ( $op ) and $url = "index.php?do=config&view=basic&op=$op" or $url = "index.php?do=config&view=basic&op=info";
$log_nav_arr = array (
		"info" => $_lang ['global_config'],
		"conf" => $_lang ['basic_config'],
		"seo" => $_lang ['seo_config']
);
$smsInterface = db_factory::get_one('select v from '.TABLEPRE.'witkey_basic_config where k="sms_interface"');
$basic_config = $kekezu->_sys_config;
if(DBTYPE=='mysql'){
    $mysql_ver = mysql_get_server_info (); 
}else{
    $db = db_factory::init();
    $mysql_ver = mysqli_get_server_info ($db->_mydb->_link); 
}
$pars = array (
    'ac' => 'run',
    'sitename' => urlencode ( $basic_config ['website_name'] ),
    'siteurl' => htmlentities ( $basic_config ['website_url'] ),
    'charset' => $_K ['charset'],
    'version' => KEKE_VERSION,
    'release' => KEKE_RELEASE,
    'os' => PHP_OS,
    'php' => $_SERVER ['SERVER_SOFTWARE'],
    'mysql' => $mysql_ver,
    'browser' => urlencode ( $_SERVER ['HTTP_USER_AGENT'] ),
    'username' => urlencode ( $_SESSION ['username'] ),
    'email' => $basic_config ['email'] ? $basic_config ['email'] : 'noemail',
    'p_name' => P_NAME
);
$data = http_build_query ( $pars );
$lic = $_K ['ci'];
$str_lic = kekezu::set_star($lic,5,5,'3','*');
$verify = md5 ( $data . $lic );
$notice = "http://www.iyun720.com/update.php?" . $data . "&lic=" . urlencode ( $lic ) . "&verify=" . $verify ;
$sys = array (
    "ac" => "sysinfo",
    'charset' => $_K ['charset'],
    'p_name' => P_NAME
);
$sysinfo = "http://www.iyun720.com/news.php?" . http_build_query ( $sys );
if($op == 'smsinterface'){
    if($s=='close'){
        db_factory::updatetable(TABLEPRE.'witkey_basic_config', array('v'=>'close'), array('k'=>'sms_interface'));
        db_factory::updatetable(TABLEPRE.'witkey_auth_item', array('auth_open'=>0), array('auth_code'=>'mobile'));
    }elseif($s == 'open'){
        db_factory::updatetable(TABLEPRE.'witkey_basic_config', array('v'=>'open'), array('k'=>'sms_interface'));
    }
}
$authOpen = db_factory::get_one('select auth_open from '.TABLEPRE.'witkey_auth_item where auth_code="mobile"');
if (isset ( $_POST ) && ! empty ( $_POST )) {
    if($_POST['sms_switch']=='close'){
        unset($_POST['mobile_username']);
        unset($_POST['mobile_password']);
    }
	foreach ( $_POST as $k => $v ) {
		$config_basic_obj->setWhere ( "k = '$k'" );
		$config_basic_obj->setV (kekezu::k_input($v));
		$res += $config_basic_obj->edit_keke_witkey_basic_config ();
	}
	if($_POST['credit_is_allow']==2){
		foreach ($model_list as $k => $v) {
			$config = unserialize($v['config']);
			$config['defeated'] = '1';
			keke_task_config::set_task_ext_config($v['model_id'],$config);
		}
	}
	kekezu::admin_system_log ( $_lang ['update'] . $log_nav_arr [$op] );
	$kekezu->_cache_obj->set ( "keke_witkey_basic_config", $config_basic_arr );
	kekezu::admin_show_msg ( $_lang ['submit_success'], $url, 3, '', 'success' );
}
function get_url_rule() {
	$service = array (
			'apache',
			'apache-hosts',
			'iis6',
			'iis7',
			'nginx'
	);
	$rule_arr = array ();
	foreach ( $service as $v ) {
		switch ($v) {
			case 'apache-hosts':
				$r = '
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteRule ^(.*)/index.html$ $1/index.php
RewriteRule ^(.*)/(\w+).html$ $1/index.php?do=$2
RewriteRule ^(.*)/(\w+)-(\w+)-(\w+).html$ $1/index.php?do=$2&$3=$4
RewriteRule ^(.*)/(\w+)-(\w+)-(\w+)-(\w+)-(\w+).html$ $1/index.php?do=$2&$3=$4&$5=$6
RewriteRule ^(.*)/(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+).html$ $1/index.php?do=$2&$3=$4&$5=$6&$7=$8
RewriteRule ^(.*)/(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+).html$ $1/index.php?do=$2&$3=$4&$5=$6&$7=$8&$9=$10
RewriteRule ^(.*)/(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+).html$ $1/index.php?do=$2&$3=$4&$5=$6&$7=$8&$9=$10&$11=$12
RewriteRule ^(.*)/(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+).html$ $1/index.php?do=$2&$3=$4&$5=$6&$7=$8&$9=$10&$11=$12&$13=$14
RewriteRule ^(.*)/(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+).html$ $1/index.php?do=$2&$3=$4&$5=$6&$7=$8&$9=$10&$11=$12&$13=$14&$15=$16
RewriteRule ^(.*)/(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+).html$ $1/index.php?do=$2&$3=$4&$5=$6&$7=$8&$9=$10&$11=$12&$13=$14&$15=$16&$17=$18
RewriteRule ^(.*)/(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+)-(\w+).html$ $1/index.php?do=$2&$3=$4&$5=$6&$7=$8&$9=$10&$11=$12&$13=$14&$15=$16&$17=$18&$19=$20
</IfModule>';
				$r = htmlspecialchars($r);
				$rule_arr [$v] = $r;
				break;
			case 'apache' :
				$r='';
				$r .= "RewriteEngine On \r";
				$r .= "RewriteRule ^index.html$ index.php\r";
				$p = '(\w+)';
				for($i = 1; $i < 20; $i = $i + 2) {
					$ps = '';
					$ks = '';
					for($j = 0; $j < $i; $j ++) {
						$j == 0 ? $ps .= '(\w+)' : $ps .= '-(\w+)';
						$k = $j + 1;
						$k % 2 != 0 ? $ks .= '=$' . $k : $ks .= '&$' . $k;
					}
					$r .= "RewriteRule ^{$ps}.html$ index.php?do{$ks}\r";
				}
				$rule_arr [$v] = $r;
				break;
			case 'iis6' :
				$r = "RewriteEngine On \r";
				$r .= "RewriteCompatibility2 On \r";
				$r .= "RepeatLimit 200 \r";
				$r .= "RewriteBase / \r";
				$r .= "RewriteRule ^.*(?:global.asa|default\.ida|root\.exe|\.\.).*\$ . [NC,F,O] \r ";
				$r .= "RewriteRule ^(.*)/index.html\$ \$1/index.php \r";
				$p = '(\w+)';
				$p = '(.*)';
				for($i = 2; $i <= 20; $i = $i + 2) {
					$ps = '';
					$ks = '';
					for($j = 0; $j < $i; $j ++) {
						if ($j == 0) {
							$ps .= $p . "/";
							$ks .= '$1/index.php\?do';
						} elseif ($j == 1) {
							$ps .= '(\w+)';
						} else {
							$ps .= '-(\w+)';
						}
						$k = $j + 2;
						if ($j < $i - 1) {
							$k % 2 == 0 ? $ks .= '=$' . $k : $ks .= '&$' . $k;
						}
					}
					$r .= "RewriteRule ^{$ps}.html$ {$ks}\r";
				}
				$rule_arr [$v] = $r;
				break;
			case 'iis7' :
				$r='';
				$p = '(.*/)*';
				$h = "<rewrite><rules>\r";
				for($i = 2; $i <= 20; $i = $i + 2) {
					$ps = '';
					$ks = '';
					for($j = 0; $j < $i; $j ++) {
						if ($j == 0) {
							$ps .= $p;
							$ks .= '{R:1}/index.php';
						} elseif ($j == 1) {
							$ps .= '(\w+)';
						} else {
							$ps .= '-(\w+)';
						}
						$k = $j + 2;
						if ($j < $i - 1) {
							$k % 2 == 0 ? $ks .= '={R:' . $k . '}' : $ks .= '&amp;{R:' . $k . '}';
						}
					}
					$r .= <<<EOT
<rule name="{$i}">
	<match url="^{$ps}.index.html$" />
	<action type="Rewrite" url="{$ks}" />
</rule>
EOT;
				}
				$r = $h . $r;
				$r .= "</rules> ";
				$r .= "</rewrite>";
				$rule_arr [$v] = htmlentities($r);
				break;
			case 'nginx' :
				$r = "rewrite ^(.*)/index.html$ $1/index.php last;\r";
				$p = '(.*)/';
				for($i = 2; $i <= 20; $i = $i + 2) {
					$ps = '';
					$ks = '';
					for($j = 0; $j < $i; $j ++) {
						if($j==0){
							$ps.= $p;
							$ks .= '$1/index.php?do';
						}elseif($j==1){
							$ps.= '(\w+)';
						}else{
							$ps.= '-(\w+)';
						}
						$k = $j+2;
						if($j<$i-1){
							$k%2==0?$ks.= '=$'.$k:$ks.= '&$'.$k;
						}
					}
					$r .=  "rewrite ^{$ps}.html$ $ks last; \r";
				}
				$rule_arr [$v] = $r;
				break;
		}
	}
	return $rule_arr;
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_config_' . $view );