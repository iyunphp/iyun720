<?php defined ( 'IN_KEKE' ) or exit ( 'Access Denied' );
$arrRecommShops = db_factory::query ( sprintf ( "select a.username,a.uid,b.indus_id,b.indus_pid,a.shop_name,if(b.seller_total_num>0,b.seller_good_num/b.seller_total_num,0) as good_rate from %switkey_shop a "
		." left join %switkey_space b on a.uid=b.uid  where b.recommend=1 and b.status=1 and IFNULL(a.is_close,0)=0 and shop_status=1 order by  good_rate desc limit 0,5", TABLEPRE,TABLEPRE ), 1, $intIndexCacheTime );
$strUrl = 'index.php?do=bokelist';
$bokeType=db_factory::query("select * from ".TABLEPRE."witkey_blogtype");
$page=$page?$page:1;
$intPagesize=$intPagesize?$intPagesize:10;
$objBlog = keke_table_class::get_instance('witkey_blog');
if($uids){
	$where="uid=".$uids;
}else{
	$where=" 1=1 ";
}
if($blog_type){
	$where.=' and blog_type="'.$blog_type.'"';
}else{
	$where.=' and blog_type='.$bokeType[0]['type_id'];
}
$order=$order?$order:" order by add_time desc ";
$arrResult =$objBlog->get_grid($where,$strUrl, $page,$intPagesize,$order);
