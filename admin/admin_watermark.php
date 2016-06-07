<?php
kekezu::admin_check_role (219);
$waterMark = db_factory::get_one('select * from '.TABLEPRE.'witkey_basic_config where k="watermark"');
$config = unserialize($waterMark['v']);
if($submit){
    $data['switch'] = $switch;
    $data['hight'] = $hight;
    $data['width'] = $width;
    $data['img'] = $filepath1;
    $d = serialize($data);
    $res = db_factory::updatetable(TABLEPRE.'witkey_basic_config', array('v'=>$d), array('k'=>'watermark'));
    $res and kekezu::admin_show_msg('修改成功','index.php?do=watermark',3,'','success');
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do);