<?php keke_tpl_class::checkrefresh('shop/goods/admin/tpl/goods_updateinfo', '1452505572' );?><!DOCTYPE HTML>
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
<div class="box list">
<div class="title">
<h2><?php echo $_lang['case_search'];?></h2>
</div>
<div class="detail">
<table cellpadding="0" cellspacing="0">
<tbody>
<tr>
<th>修改字段</th>
<th>修改前</th>
<th>修改后</th>
</tr>
<?php if($editInfo['log_content_data']['title']) { ?>
<tr>
<td>标题</td>
<td><?php echo $editInfo['log_content_data']['old_title'];?></td>
<td><?php echo $editInfo['log_content_data']['title'];?></td>
</tr>
<?php } ?>

<?php if($editInfo['log_content_data']['custom']) { ?>
<tr>
<td>自定义字段</td>
<?php if(is_array($editInfo['log_content_data']['old_custom'])) { foreach($editInfo['log_content_data']['old_custom'] as $k => $v) { ?>
<td><?php echo $v;?></td>
<?php } } ?>
<?php if(is_array($editInfo['log_content_data']['custom'])) { foreach($editInfo['log_content_data']['custom'] as $k => $v) { ?>
<td><?php echo $v;?></td>
<?php } } ?>
</tr>
<?php } ?>

<?php if($editInfo['log_content_data']['content']) { ?>
<tr>
<td>内容</td>
<td width="210" style="word-break:break-all;"><?php echo htmlspecialchars_decode($editInfo['log_content_data']['old_content']); ?></td>
<td width="210" style="word-break:break-all;"><?php echo htmlspecialchars_decode($editInfo['log_content_data']['content']); ?></td>
</tr>
<?php } ?>
<?php if($editInfo['log_content_data']['indus_pid']) { ?>
<tr>
<td>所属行业</td>
<td><?php echo $arrTopIndustrys[$editInfo['log_content_data']['old_indus_pid']]['indus_name'];?> <?php echo $arrIndustrys[$editInfo['log_content_data']['old_indus_id']]['indus_name'];?></td>
<td><?php echo $arrTopIndustrys[$editInfo['log_content_data']['indus_pid']]['indus_name'];?> <?php echo $arrIndustrys[$editInfo['log_content_data']['indus_id']]['indus_name'];?></td>
</tr>
<?php } ?>
<?php if($editInfo['log_content_data']['price']) { ?>
<tr>
<td>出售价格 </td>
<td><?php echo $editInfo['log_content_data']['old_price'];?></td>
<td><?php echo $editInfo['log_content_data']['price'];?></td>
</tr>
<?php } ?>
<?php if($arrImageLists) { ?>
<tr>
<td>上传图片 </td>
<td>
 <?php if($arrOldImageLists) { ?>
 <?php if(is_array($arrOldImageLists)) { foreach($arrOldImageLists as $v) { ?>
<a href="<?php echo $v['save_name'];?>" target="_blank"><?php echo $v['file_name'];?></a>
<?php } } ?>
<?php } else { ?>
--
<?php } ?>

</td>
<td>
 <?php if(is_array($arrImageLists)) { foreach($arrImageLists as $v) { ?>
<a href="<?php echo $v['save_name'];?>" target="_blank"><?php echo $v['file_name'];?></a>
<?php } } ?>

</td>
</tr>
<?php } ?>
<?php if($arrFileLists) { ?>
<tr>
<td>上传附件 </td>
<td>
<?php if($arrOldFileLists) { ?>
 <?php if(is_array($arrOldFileLists)) { foreach($arrOldFileLists as $v) { ?>
<a href="<?php echo $v['save_name'];?>" target="_blank"><?php echo $v['file_name'];?></a>
<?php } } ?>
<?php } else { ?>
--
<?php } ?>
</td>
<td>
 <?php if(is_array($arrFileLists)) { foreach($arrFileLists as $v) { ?>
<a href="<?php echo $v['save_name'];?>" target="_blank"><?php echo $v['file_name'];?></a>
<?php } } ?>
</td>
</tr>
<?php } ?>
<tr>
<td>
<button class="btn" type="button" onclick="service_pass();">审核通过</button> </td>
<td>
 	<button class="btn" type="button" onclick="service_refuse();">拒绝审核</button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<script type="text/javascript">
var tourl= "index.php?do=model&model_id=6&view=list&ac=view_info&logId=<?php echo $editInfo['log_id'];?>&service_id=<?php echo $service_id;?>";
function service_pass() {
d = art.dialog;
d.confirm("确认审核通过？", function() {
$.post(tourl+"&acc=spass",{},function(){
art.dialog.data("ispass", 1);

art.dialog.close();
},'json');
});
return false;
}
function service_refuse(i) {
d = art.dialog;
d.confirm("确认拒绝审核？", function() {
$.post(tourl+"&acc=snopass",{},function(){
art.dialog.data("ispass", 1);

art.dialog.close();
},'json');
});
return false;
}
</script>
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
</html><?php keke_tpl_class::ob_out();?>