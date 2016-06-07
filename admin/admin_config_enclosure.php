<?php   defined ( 'ADMIN_KEKE' ) or exit ( 'Access Denied' );
kekezu::admin_check_role (220);
$lang_arr = keke_lang_class::lang_type();
$url = 'index.php?do=config&view=enclosure';
$objBasicConfigT = new Keke_witkey_basic_config_class ();
$config_basic_arr = $objBasicConfigT->query_keke_witkey_basic_config ();
foreach ( $config_basic_arr as $k => $v ) {
    $arrBasicConfig [$v ['k']] = $v ['v'];
}
if (isset ( $_POST ) && ! empty ( $_POST )) {
    if($_POST['upload_type']=='1'){
        unset($_POST['access_key']);
        unset($_POST['secret_key']);
        unset($_POST['qn_bucket']);
        unset($_POST['qn_domain']);
    }else{
        $res = kekezu::check_upload_access($_POST['access_key'],$_POST['secret_key'],$_POST['qn_bucket']);
        !$res and kekezu::admin_show_msg('请核对AccessKey、SecretKey和bucket是否准确！',$url,3,'','warning');
    }
    foreach ( $_POST as $k => $v ) {
        $objBasicConfigT->setWhere ( "k = '$k'" );
        $objBasicConfigT->setV (kekezu::k_input($v));
        $res += $objBasicConfigT->edit_keke_witkey_basic_config ();
    }
    kekezu::admin_show_msg ( '提交成功', $url, 3, '', 'success' );
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_config_' . $view );