<?php defined ( 'IN_KEKE' ) or exit('Access Denied');
$strUrl = 'index.php?do=bokeinfo';
$bokeInfo=db_factory::query("select * from ".TABLEPRE."witkey_blog where blog_id=".$blog_id);
$conectBoke=db_factory::query('select * from '.TABLEPRE.'witkey_blog where blog_type='.$bokeInfo[0]["blog_type"]);
$arrRecommShops = db_factory::query ( sprintf ( "select a.username,a.uid,b.indus_id,b.indus_pid,a.shop_name,if(b.seller_total_num>0,b.seller_good_num/b.seller_total_num,0) as good_rate from %switkey_shop a "
		." left join %switkey_space b on a.uid=b.uid  where b.recommend=1 and b.status=1 and IFNULL(a.is_close,0)=0 and shop_status=1 order by  good_rate desc limit 0,5", TABLEPRE,TABLEPRE ), 1, $intIndexCacheTime );