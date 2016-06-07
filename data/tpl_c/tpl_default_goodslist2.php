<?php keke_tpl_class::checkrefresh('tpl/default/goodslist2', '1455511269' );?><?php if(is_array($arrServices)) { foreach($arrServices as $k => $v) { ?>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<article class="post tag-foreign-website tag-bootstrap-v3">
<div class="post-featured-image">
<a class="thumbnail loaded" href="index.php?do=goods&id=<?php echo $v['service_id']?>" title="<?php echo $v['title']?>"> 
   <!--<img src="tpl/default/img/grey.gif" class="lazy" width="600" height="200" data-original="{eval echo keke_shop_class::output_pics(<?php echo $v['file_path']?>,210,1,1,<?php echo $v['service_id']?>)}"  alt="<?php echo $v['title']?>">-->
   <?php $arrPic=explode(',',$v['pic']);$img=strstr($arrPic[0],'http'); ?>
<img alt="<?php echo $v['title']?>" onerror='$(this).attr("src","tpl/default/img/shop/shop_default_big.jpg")' alt="<?php echo $v['title']?>" <?php if($img) { ?>src="<?php echo $arrPic['0'];?>" width="600" height="200" <?php } else { ?>src="<?php echo keke_shop_class::output_pics($v['file_path'],210,1,1,$v['service_id']) ?>"  width="600" height="200"  style=" max-height:200px; overflow:hidden" <?php } ?>>
   <?php echo $v['file_type'];?></a>
   <div class="author">作者：<a href="index.php?do=seller&id=<?php echo $v['uid'];?>" class="poster" title="<?php echo $v['username']?>"><?php echo $v['username'];?></a></div> 

</div>
<div class="goods_info">
<div class="col-xs-2 col-sm-1 col-md-1 col-lg-1"><a href="index.php?do=seller&id=<?php echo $v['uid'];?>" class="thumbnail loaded"><?php echo  keke_user_class::get_user_pic($v['uid'],'middle') ?> </a></div>
<div class="col-xs-8 col-sm-9 col-md-9 col-lg-9 good_title">
<a href="index.php?do=goods&id=<?php echo $v['service_id']?>"><?php echo $v['title'];?></a><br>
<a href="" class="tag"></a>
</div>
</div>
</article>
</div>
<?php } } ?>


<?php keke_tpl_class::ob_out();?>