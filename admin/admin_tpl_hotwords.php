<?php defined ( 'ADMIN_KEKE' ) or die ( 'Access Denied' );
kekezu::admin_check_role ( 208 );
$sqlHw = "select v from ".TABLEPRE."witkey_basic_config where k = 'hot_words_status'";
$arrHw = db_factory::query($sqlHw);
$sqlUpdate = "select v from ".TABLEPRE."witkey_basic_config where k = 'update_status'";
$arrUpdate = db_factory::query($sqlUpdate);
$obj_HotWords = new Keke_witkey_hotwords_class ();
$pageSize and $pageSize=intval ( $pageSize ) or $pageSize = 10;
$page and $page=intval ( $page ) or $page = 1;
$url = "index.php?do=$do&view=$view&id=$id&title=$title&pageSize=$pageSize&page=$page&ord=$ord";
if ($op == 'del') {
    $delid = $delid ? $delid : kekezu::admin_show_msg ($_lang['wrong_parameters'], $url,3,'','warning' );
    $obj_HotWords->setWhere ( "id='{$delid}'" );
    $obj_HotWords->del_keke_witkey_hotwords ();
    $kekezu->_cache_obj->del ( 'tag_list_cache' );
    kekezu::admin_system_log ( $_lang['delete_tag']."$delid" );
    kekezu::admin_show_msg ($_lang['operate_success'], $url,3,'','success' );
} elseif (isset ( $sbt_action )) { 
    if (is_array ( $ckb )) {
        $ids = implode ( ',', array_filter ( $ckb ) );
    }
    if (count ( $ids )) {
        $obj_HotWords->setWhere ( ' id in (' . $ids . ') ' );
        $obj_HotWords->del_keke_witkey_hotwords ();
        $kekezu->_cache_obj->del ( 'tag_list_cache' );
        kekezu::admin_system_log ($_lang['delete_tag']. "$ids" );
        kekezu::admin_show_msg ($_lang['mulit_operate_success'], $url,3,'','success' );
    } else {
        kekezu::admin_show_msg ( $_lang['choose_operate_item'], $url,3,'','warning' );
    }
} elseif (isset($sbt_add)){
    $time = time();
    $obj_HotWords = new Keke_witkey_hotwords_class();
    $obj_HotWords->setWords($words_add);
    $obj_HotWords->setTime(time());
    $obj_HotWords->setCount($count_add);
    $obj_HotWords->create_keke_witkey_hotwords();
    kekezu::admin_show_msg("添加成功","index.php?do=tpl&view=hotwords","3","","success");
} elseif ($ac == 'editlistorder') { 
    $obj_HotWords = new Keke_witkey_hotwords_class();
    $obj_HotWords->setWhere('id='.$id);
    $obj_HotWords->setSort($sort);
    $obj_HotWords->edit_keke_witkey_hotwords();
}elseif ($ac == 'open') { 
    db_factory::updatetable(TABLEPRE."witkey_basic_config", array('v'=>$status), array('k'=>'hot_words_status'));
}elseif ($ac == 'handle') { 
    db_factory::updatetable(TABLEPRE."witkey_basic_config", array('v'=>$status), array('k'=>'update_status'));
} else {
    $w = " 1 = 1 ";
    $id and $w.=" and id = '$id'";
    $title and $w.=" and words like '%$title%'";
    if($ord){
        switch ($ord){
            case 1 : $w.=" order by id asc";break;
            case 2 : $w.=" order by id desc";break;
            case 3 : $w.=" order by count asc";break;
            case 4 : $w.=" order by count desc";break;
        }
    }else{
        $w .= 'order by id desc';
    }
    $obj_Hw = keke_table_class::get_instance("witkey_hotwords");
    $d = $obj_Hw->get_grid ( $w, $url, $page, $pageSize );
    $arrHotWords = $d ['data'];
    $pages = $d ['pages'];
}
require $template_obj->template(ADMIN_DIRECTORY.'/tpl/admin_' . $do . '_' . $view );