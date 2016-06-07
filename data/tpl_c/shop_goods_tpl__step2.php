<?php keke_tpl_class::checkrefresh('shop/goods/tpl/default/step2', '1452668457' );?><div class="release-statistics">
        <!--<h2 class="statistics-title">作品详情</h2>-->
        <div class="statistics-body">

            <div class="panel-heading">
              <h3 class="panel-title">
                  <div class="pull-right">授权价：<span class="money"><sub></sub><?php  echo keke_curren_class::output(floatval($arrPubInfo['txt_price']),-1);  ?></span></div>
                  	标题：<?php echo $arrPubInfo['txt_title'];?><!--<br>
                  	<button type="button" class="btn btn-default" onclick="history.back();">修改</button>-->
              </h3>
            </div>
            <div class="panel-body ">
                <!--<ul class="release-meta">
                  <li class="release-meta-item">作品模式：<?php echo $arrModelInfo['model_name'];?></li>
                  <li class="release-meta-item">行业分类：<?php echo $arrTopIndustrys[$arrPubInfo['indus_pid']]['indus_name'];?>-<?php echo $arrAllIndustrys[$arrPubInfo['indus_id']]['indus_name'];?></li>
                </ul><div class="release-detail">
-->
                	<div id="partContent" <?php if(!$strPartComment) { ?> class="hidden"<?php } ?> >
                		<?php echo $strPartComment;?>
                	</div>
                	<div id="fullContent" <?php if($strPartComment) { ?> class="hidden"<?php } ?>>
                		<?php echo $strTarComment;?>
                	</div>

                </div>
                <!-- release-detail end -->
                <?php if($strPartComment) { ?>
                <div class="release-detail-ctrl">
                  <a href="javascript:void(0);" id="viewMoreContent">查看更多</a>
                </div>
                <?php } ?>
            </div>

        </div>
        <!-- statistics-body end -->


       <!-- <h2 class="statistics-title">您可能会需要</h2>-->
        <form class="form-horizontal" role="form" action="<?php echo $strUrl;?>&step=<?php echo $step;?>" method="post"  id="pubGoodsForm<?php echo $step;?>" name="pubGoodsForm<?php echo $step;?>">
<input type="hidden" name="<?php echo $step;?>" value="<?php echo $step;?>">
<input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>">
       		       
        <div class="statistics-footer">
          <a href="javascript:history.back();" >返回修改</a> &nbsp;          
          <button type="submit" class="btn btn-primary">提交作品</button>
        </div>
</form>
      </div><?php keke_tpl_class::ob_out();?>