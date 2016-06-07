<?php keke_tpl_class::checkrefresh('shop/goods/tpl/default/comment', '1452671631' );?>  <div class="comment" id="commentArea1">

    <div class="comment-post <?php if($gUid) { ?> hidden <?php } ?>">
      <label>请 <a  href="index.php?do=login" class="btn btn-default">登录</a>
      		   或 <a  href="index.php?do=register"   class="btn btn-default">注册</a> 再发留言。
      </label>
    </div>
    <!-- comment-post 未登录-->

<div id="comment_page">
    <div class="comment-post <?php if(!$gUid) { ?> hidden <?php } ?>" id="commentArea" >
      <div class="media-object comment-avatar">
        <?php echo  keke_user_class::get_user_pic($gUserInfo['uid'],'small') ?>
      </div>
      <div class="media-body" style="width:100%">
        <div class="media-heading">
          <strong class="comment-name"><?php echo $gUserInfo['username'];?></strong>
          <time class="comment-time">留言不得超过100字</time>
        </div>
        <div class="form-group">
          <textarea name="addcontent" class="form-control" id="addcontent" rows="1" ></textarea>
        </div>
        <button class="btn btn-default" type="button" id="addcomment" onclick="addComment('<?php echo $intId;?>','<?php echo $intId;?>','service',0)"><i class="fa fa-comments"></i> 发表留言</button>
      </div>
    </div>
    <!-- comment-post 已登录-->

<?php if(is_array($arrCommentLists)) { foreach($arrCommentLists as $k => $v) { ?>
    <div class="media comment-item" id="replyCommentList_<?php echo $v['comment_id'];?>">
      <div class="media-object comment-avatar">
        <a href="index.php?do=space&id=<?php echo $v['uid'];?>">
          <?php echo  keke_user_class::get_user_pic($v['uid'],'small') ?>
        </a>
      </div>
      <div class="media-body">

        <div class="media-heading">
          <strong class="comment-name"><?php echo $v['username'];?></strong>
          <time class="comment-time"><?php echo date('Y-m-d H:i:s',$v['on_time']) ?></time>
        </div>
        <div class="comment-content">
          <span class="caret"></span>
          	<?php echo htmlspecialchars_decode($v['content']) ?>
        </div>
        <div class="comment-ctrl">
          <a href="javascript:toggleReplyArea('<?php echo $v['comment_id'];?>');void(0);"  class="ctrl-item"><i class="fa fa-comment"></i> 回复</a>
          <?php if($v['uid'] == $gUid&&$gUid) { ?><a href="javascript:delComment('<?php echo $v['comment_id'];?>');void(0);" class="ctrl-item"><i class="fa fa-times"></i> 删除</a><?php } ?>
        </div>


        <div class="comment-post hidden" id="replyComment_<?php echo $v['comment_id'];?>">
          <div class="media-object comment-avatar">
            <?php echo  keke_user_class::get_user_pic($gUserInfo['uid'],'small') ?>
          </div>
          <div class="media-body">
            <div class="media-heading">
              <strong class="comment-name">回复 <?php echo $v['username'];?></strong>
              <time class="comment-time">不得超过100字</time>
            </div>
            <div class="form-group">
              <textarea name="replyAddContent_<?php echo $v['comment_id'];?>" class="form-control" id="replyAddContent_<?php echo $v['comment_id'];?>" rows="1" ></textarea>
            </div>
            <button class="btn btn-default" onclick="replyAddComment('<?php echo $v['comment_id'];?>','<?php echo $intId;?>','<?php echo $intId;?>','service','<?php echo $v['comment_id'];?>');" ><i class="fa fa-comments"></i> 发表</button>
          </div>
         </div>

<?php if($arrReplyLists) { ?>
        <?php if(is_array($arrReplyLists)) { foreach($arrReplyLists as $k1 => $v1) { ?>

        <?php if($v1['p_id'] == $v['comment_id']) { ?>
        <div class="media comment-item <?php if($v1['uid'] !== $v['uid']) { ?>reply<?php } ?>" id="replyCommentList_<?php echo $v1['comment_id'];?>">
          <div class="media-object comment-avatar">
            <a href="index.php?do=space&id=<?php echo $v1['uid'];?>">
          		<?php echo  keke_user_class::get_user_pic($v1['uid'],'small') ?>
        	</a>
          </div>
          <div class="media-body">
            <div class="media-heading">
              <?php if($v1['uid'] === $v['uid']) { ?>
              	<strong class="comment-name"><?php echo $v['username'];?> 回复 </strong>
              <?php } else { ?>
              	<strong class="comment-name"><?php echo $v1['username'];?> 回复 <?php echo $v['username'];?></strong>
              <?php } ?>
              <time class="comment-time"><?php echo date('Y-m-d H:i:s',$v1['on_time']) ?></time>
            </div>

            <div class="comment-content">
              <span class="caret"></span>
             <?php echo htmlspecialchars_decode($v1['content']) ?>
            </div>
            <div class="comment-ctrl">
              <a href="javascript:toggleReplyArea('<?php echo $v1['comment_id'];?>');void(0);"  class="ctrl-item"><i class="fa fa-comment"></i> 回复</a>
              <?php if($v1['uid'] == $gUid&&$gUid) { ?><a href="javascript:delComment('<?php echo $v1['comment_id'];?>');void(0);"  class="ctrl-item"><i class="fa fa-times"></i> 删除</a><?php } ?>
            </div>

         <div class="comment-post hidden" id="replyComment_<?php echo $v1['comment_id'];?>">
          <div class="media-object comment-avatar">
            <?php echo  keke_user_class::get_user_pic($gUserInfo['uid'],'small') ?>
          </div>
          <div class="media-body">
            <div class="media-heading">
              <strong class="comment-name">回复
              <?php if($v['uid'] === $v1['uid']) { ?>
              <?php echo $v['username'];?>
              <?php } else { ?>
              <?php echo $v1['username'];?>
              <?php } ?>
              </strong>
              <time class="comment-time">不得超过100字</time>
            </div>
            <div class="form-group">
              <textarea name="replyAddContent_<?php echo $v1['comment_id'];?>" class="form-control" id="replyAddContent_<?php echo $v1['comment_id'];?>" rows="1" ></textarea>
            </div>
            <button class="btn btn-default" onclick="replyAddComment('<?php echo $v1['comment_id'];?>','<?php echo $intId;?>','<?php echo $intId;?>','service','<?php echo $v['comment_id'];?>');" ><i class="fa fa-comments"></i> 发表</button>
          </div>
         </div>

            <!-- comment-post 已登录-->

          </div>

        </div>
        <?php } ?>
        <?php } } ?>
        <?php } ?>
</div>

    </div>
    <?php } } ?>

    <!-- comment-item end-->


  <!-- comment end -->
<?php if($strPage['page']) { ?>
  <div class="list-page">
    <div class="page-tips pull-left">
      <!-- 显示 1~20 项 共 42 个留言 -->
    </div>
    <ul class="pagination pagination-sm pull-right">
        <?php echo $strPage['page'];?>
    </ul>
  </div>
  <?php } ?>

  </div>
</div>
  <script type="text/javascript" src="static/js/model/task/comment.js"></script><?php keke_tpl_class::ob_out();?>