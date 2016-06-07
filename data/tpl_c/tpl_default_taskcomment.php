<?php keke_tpl_class::checkrefresh('tpl/default/taskcomment', '1452664951' );?><?php if($action == 'add') { ?>


    <div class="media comment-item">
      <div class="media-object comment-avatar">
        <a href="index.php?do=seller&id=<?php echo $arrCommentInfo['uid'];?>">
          <?php echo  keke_user_class::get_user_pic($arrCommentInfo['uid'],'small') ?>
        </a>
      </div>
      <div class="media-body">

        <div class="media-heading">
          <strong class="comment-name"><?php echo $arrCommentInfo['username'];?></strong>
          <time class="comment-time"><?php echo date('Y-m-d H:i:s',$arrCommentInfo['on_time']) ?></time>
        </div>
        <div class="comment-content">
          <span class="caret"></span>
          	<?php echo htmlspecialchars_decode($arrCommentInfo['content']) ?>
        </div>
</div>
    </div>
<?php } ?>

<?php if($action == 'reply') { ?>
<div class="media comment-item <?php if($arrCommentInfo['uid'] !== $arrCommentInfo['parentcomment']['uid']) { ?>reply<?php } ?>">
     <div class="media-object comment-avatar">
       	<a href="index.php?do=seller&id=<?php echo $arrCommentInfo['uid'];?>">
     		<?php echo  keke_user_class::get_user_pic($arrCommentInfo['uid'],'small') ?>
   		</a>
     </div>
         <div class="media-body">
           <div class="media-heading">

              <?php if($arrCommentInfo['uid'] === $arrCommentInfo['parentcomment']['uid']) { ?>
              	<strong class="comment-name"><?php echo $arrCommentInfo['parentcomment']['username'];?> 回复 </strong>
              <?php } else { ?>
              	<strong class="comment-name"><?php echo $arrCommentInfo['username'];?> 回复 <?php echo $arrCommentInfo['parentcomment']['username'];?></strong>
              <?php } ?>

             <time class="comment-time"><?php echo date('Y-m-d H:i:s',$arrCommentInfo['on_time']) ?></time>
           </div>
         <div class="comment-content">
           <span class="caret"></span>
          	<?php echo htmlspecialchars_decode($arrCommentInfo['content']) ?>
         </div>
       </div>
</div>

<?php } ?>
<?php keke_tpl_class::ob_out();?>