<?php
	kekezu::admin_check_role (210);
	$tasktem_obj = new keke_table_class ( "witkey_task_template" );
	$url = "index.php?do=$do&view=$view&page_size=$page_size&page=$page";
	$page_size  and $page_size = intval ( $page_size ) or $page_size = 10;
	$page and $page = intval ( $page ) or $page = 1;
	if($ac=='freshen'){
		kekezu::admin_show_msg($_lang['operate_success'],"index.php?do=task&view=tasktemplet&page_size=$page_size&page=$page",3,'','success');
	}
	if($ac=='edit'){
		$tasktemInfo=db_factory::get_one("select * from ".TABLEPRE."witkey_task_template where id=".intval($tasktemid));
		require $kekezu->_tpl_obj->template(ADMIN_DIRECTORY."/tpl/admin_task_tasktemplet_edit" );die;
	}elseif($ac=='add'){
		require $kekezu->_tpl_obj->template(ADMIN_DIRECTORY."/tpl/admin_task_tasktemplet_edit" );die;
	}elseif($ac=='del'){
		db_factory::execute("delete from ".TABLEPRE."witkey_task_template where id=".intval($tasktemid));
		kekezu::admin_show_msg($_lang['operate_success'],"index.php?do=task&view=tasktemplet&page_size=$page_size&page=$page",3,'','success');
	}elseif($ckb){
		$strtem=implode(",",$ckb);
		db_factory::execute("delete from ".TABLEPRE."witkey_task_template where id in ($strtem)");
		kekezu::admin_show_msg($_lang['operate_success'],"index.php?do=task&view=tasktemplet&page_size=$page_size&page=$page",3,'','success');
	}
	$where=" 1=1";
	$w [art_id] and $where .= " and art_id = ".intval ( $w [art_id] );
	strval ( $w [art_title] ) and $where .= " and art_title like '%$w[art_title]%'";
	$w [art_cat_id] and $w [art_cat_id]=intval ( $w [art_cat_id] ) and $where .= " and art_cat_id in  (select art_cat_id from " . TABLEPRE . "witkey_article_category where art_index like '%{{$w [art_cat_id] }}%')";
	strval ( $w [username] ) and $where .= " and username like '%$w[username]%' ";
	$where.=" order by id desc";
	$r = $tasktem_obj->get_grid ( $where, $url, $page, $page_size,null,1,'ajax_dom');
	$tasktem_arr = $r [data];
	$pages = $r [pages];
require $kekezu->_tpl_obj->template(ADMIN_DIRECTORY."/tpl/admin_task_$view" );