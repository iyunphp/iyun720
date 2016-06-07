<?php keke_tpl_class::checkrefresh('shop/goods/tpl/default/content', '1455511981' );?><?php if($arrShowCustoms && $c_open =='1') { ?> 
<div class="detail-custom" style=" display:none">
<h3 class="min-title">参数</h3>
<ul>
<?php if(is_array($arrShowCustoms)) { foreach($arrShowCustoms as $k => $v) { ?> 
<?php if($v['data']) { ?>
<?php if(is_array($v['data'])) { foreach($v['data'] as $kk => $vv) { ?> 
<?php if($vv['fieldname']&&$vv['content']) { ?>
<li title="<?php echo $vv['content'];?>"><strong><?php echo $vv['fieldname'];?>:</strong><?php echo $vv['content'];?></li>	
<?php } ?> 
<?php } } ?>
<?php } ?> 
<?php } } ?>
</ul>
</div>
<?php } ?>
<div class="detail-tab-body">
  


<div class="detail-desc ws_break">

     <?php echo htmlspecialchars_decode($arrServiceInfo['content']) ?>
  </div>


</div>
<!-- detail-body end --><?php keke_tpl_class::ob_out();?>