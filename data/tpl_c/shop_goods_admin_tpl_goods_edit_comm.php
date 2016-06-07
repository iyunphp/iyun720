<?php keke_tpl_class::checkrefresh('shop/goods/admin/tpl/goods_edit_comm', '1452501849' );?><!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_K['charset'];?>">
<title>keke admin</title>


<link href="tpl/css/admin_management.css" rel="stylesheet" type="text/css" />
<link href="tpl/css/button/stylesheets/css3buttons.css" rel="stylesheet" type="text/css" />
<link title="style1" href="tpl/skin/default/style.css" rel="stylesheet" type="text/css" />
<!--<link title="style2" href="tpl/skin/light/style.css" rel="stylesheet" type="text/css" />-->
<!-- <link href="tpl/js/jquery.qtip.min.css" rel="stylesheet" type="text/css" /> -->
<script type="text/javascript" src="tpl/js/jquery.js"></script>
<script type="text/javascript" src="tpl/js/keke.js"></script>
</head>
<body class="frame_body">
<div class="frame_content">
<div id="append_parent"></div>
<div class="page_title" id="taskScroll">
    <h1><?php echo $model_info['model_name'];?><?php echo $_lang['manage'];?></h1>
    <div class="tool">
   <?php if(is_array($ops)) { foreach($ops as $v) { ?>
<a href="index.php?do=<?php echo $do?>&model_id=<?php echo $model_id;?>&view=edit&service_id=<?php echo $service_id;?>&op=<?php echo $v;?>" class="<?php if($op==$v) { ?>here<?php } ?>"><?php echo $_lang['b_shop_'.$v];?></a>
       		<?php } } ?>
        </div>
</div>
<!--页头结束-->
<div class="box post">
    <div class="tabcon">
        <div class="title">
            <h2><?php echo $_lang['b_shop_'.$op];?></h2>
        </div>
        <div class="detail">
            <div id="ajax_dom">
            	<?php if($list) { ?>
                <table width="100%" border="0" cellpadding="5">
                    <?php if(is_array($list)) { foreach($list as $v) { ?>
                    <tbody id="c_<?php echo $v['comment_id'];?>">
                        <tr>
                            <td width="70">
                                <a href="<?php echo $_K['siteurl'];?>/index.php?do=seller&id=<?php echo $v['uid'];?>" target="_blank" title="<?php echo $v['username'];?>"><?php echo  keke_user_class::get_user_pic($v['uid'],'small') ?></a>
                                <div class="t_c">
                                    <a href="<?php echo $_K['siteurl'];?>/index.php?do=seller&id=<?php echo $v['uid'];?>" target="_blank"><?php echo $v['username'];?></a>
                                </div>
                            </td>
                            <td style="padding:0">
                                <div class="ws_break pad10 fl_l" style="width:69%;"><?php echo $v['content'];?></div>
                                <div class="pad10 fl_l clearfix" style="width:100%;">
  <span class="fl_l"><?php echo $_lang['comm_time'];?><?php echo $_lang['zh_mh'];?><?php if($v['on_time']){echo date('Y-m-d H:i:s',$v['on_time']); } ?></span>
                                 <div class='fl_l' style="padding-left:15px">
                                 <a href='javascript:void(0);' onclick="loadFloor('<?php echo $v['comment_id'];?>');" class='button'>
                                  	<span class="icon loop ">&nbsp;</span><?php echo $_lang['load_floor'];?>
  </a>
                                  <a href='javascript:void(0);' onclick="Cdel('<?php echo $v['comment_id'];?>',1);" class='button'>
                                  	<span class="icon trash">&nbsp;</span><?php echo $_lang['delete_comm'];?>
  </a>
  </div>
                                </div>
<div class="clear"></div>
<div id="f_<?php echo $v['comment_id'];?>" class='pad10' style="display:none;"></div>
                            </td>
                        </tr>
                    </tbody>
                    <?php } } ?>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="page fl_right">
                                    <?php echo $pages['page'];?>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
<?php } else { ?>
<div class='t_c'><?php echo $_lang['no_data'];?></div>
<?php } ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var url = '<?php echo $url;?>';
    function Cdel(i,t){
    	art.dialog({
title:"<?php echo $_lang['operate_notice'];?>",
content:"<?php echo $_lang['are_you_sure'];?>",
icon: 'succeed',
yesFn:function(){
$.getJSON(url,{ac:'del',comm_id:i,type:t},function(json){
if(json.status==1){
$("#c_"+i).slideUp('slow').remove();
art.dialog.tips("<?php echo $_lang['task_operate_successfully'];?>",1.5);
}else{
art.dialog.tips("<?php echo $_lang['task_operate_fail'];?>",1.5);
}
})
},
noFn:function(){this.close();return false;}
})
    }
    function loadFloor(i){
var c = $.trim($('#f_'+i).html());
$("[id*='f_']").hide();
if(!c){
$('#f_'+i).load(url+'&ac=load&comm_id='+i).slideDown();
}else{
$('#f_'+i).slideDown();
}
}
</script>
<!--主体结束-->
</div>
<script type="text/javascript" src="../lang/<?php echo $language?>/script/lang.js"></script>
<script type="text/javascript" src="tpl/js/form_and_validation.js"></script>
<!-- <script type="text/javascript" src="tpl/js/jquery.qtip.min.js"></script> -->
<script type="text/javascript" src="tpl/js/script_calendar.js"></script>
<script type="text/javascript" src="tpl/js/artdialog/artDialog.js"></script>
<script type="text/javascript" src="tpl/js/artdialog/jquery.artDialog.js?skin=default"></script>
<script type="text/javascript" src="tpl/js/artdialog/artDialog.iframeTools.source.js"></script>
<script type="text/javascript" src="tpl/js/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="tpl/js/styleswitch.js"></script>
<script type="text/javascript" src="tpl/js/table.js"></script>
<script type="text/javascript">
var sessionId = "<?php echo $xyq = session_id(); ?>";
function cdel(o, s) {
d = art.dialog;
var c = "<?php echo $_lang['you_comfirm_delete_operate'];?>";
if (s) {
c = s;
}
d.confirm(c, function() {
window.location.href = o.href;
});
return false;
}
function cpass(o, s, type,pay=1) {
d = art.dialog;
if (type == 1) {
if(pay){
var c = "确认审核通过？";
}else{
var c = "<font color='red'>该任务尚未付款</font>,确认审核通过？";
}
} else {
var c = "确认审核失败？";
}
if (s) {
c = s;
}
d.confirm(c, function() {
window.location.href = o.href;
});
return false;
}
function cfreeze(o, s, type) {
d = art.dialog;
if (type == 1) {
var c = "确认冻结？";
}
if (s) {
c = s;
}
d.confirm(c, function() {
window.location.href = o.href;
});
return false;
}
function crecomm(o, s, type) {
d = art.dialog;
if (type == 1) {
var c = "确认推荐？";
} else {
var c = "确认取消推荐？";
}
if (s) {
c = s;
}
d.confirm(c, function() {
window.location.href = o.href;
});
return false;
}
function pdel(frm) {
d = art.dialog;
var frm = frm;
var c = "<?php echo $_lang['you_comfirm_delete_operate'];?>";
d.confirm(c, function() {
$("#" + frm).submit();
});
return false;
}
function fdel(frm) {
d = art.dialog;
var frm = frm;
var c = "<?php echo $_lang['you_comfirm_delete_operate'];?>";
d.confirm(c, function() {
$("#" + frm).submit();
});
return false;
}
function batch_act(obj, frm) {
d = art.dialog;
var frm = frm;
var c = $(obj).val();
var conf = $(":checkbox[name='ckb[]']:checked").length;
if (conf > 0) {
d.confirm("<?php echo $_lang['confirm'];?>" + c + '?', function() {
$(".sbt_action").val(c);
$("#" + frm).submit();
});
} else {
d.alert("<?php echo $_lang['has_none_being_choose'];?>");
}
return false;
}
</script>
<!-- <?php if(KEKE_DEBUG) { ?>
<div
style="background-color: red; color: #fff; width: 400px; text-align: center;">
querys:
{eval echo db_factory::create()->get_query_num()}
&nbsp; times:
{eval echo kekezu::execute_time()}
</div>

<?php } ?> -->
</body>
</html>
<?php keke_tpl_class::ob_out();?>