<?php keke_tpl_class::checkrefresh('admin/tpl/admin_config_rss', '1452251330' );?><!DOCTYPE HTML>
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
<div class="page_title">
<h1>RSS订阅</h1>
</div>
<div class="box post">
<div class="tabcon">
<div class="title">
<h2>
<span>
站长通过RSS订阅设置，对选择的RSS订阅内容进行每<?php echo $config_arr['rss_day'];?>天向用户推送&nbsp&nbsp
<a href="http://bbs.kppw.cn/bbs_redirect.php?c=1" target="_blank" style="color:red;font-size:small;">什么是RSS</a>
</span>
</h2>
</div>
<div class="detail">
<form name="frm_config_rss" id="frm_config_rss" action="#" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tab_m t_l">
<tr>
<th scope="row" width="160">内容选择</th>
    <td>
        <label for="rdo_mail_server_cat_mail"> 
           <input type="checkbox" id="rss_choice_task" name="rss_choice_task" <?php if($config_arr['rss_choice_task'] == "1") { ?>checked="checked" <?php } ?> value="1" />任务
        </label> 
        <label for="rdo_mail_server_cat_smtp"> 
          <input type="checkbox" id="rss_choice_news" name="rss_choice_news" <?php if($config_arr['rss_choice_news'] == "1") { ?>checked="checked" <?php } ?> value="1" />资讯
        </label>
</td>
</tr>
<tr>
<th scope="row">RSS标题</th>
<td><input class="txt" type="text" name="rss_title" id="rss_title" value="<?php echo $config_arr['rss_title'];?>"></td>
</tr>
<tr>
<th scope="row">RSS描述</th>
<td><textarea cols="70" rows="2"  name="rss_content" id="rss_content"><?php echo $config_arr['rss_content'];?></textarea></td>
</tr>					
<tr>
<th scope="row">&nbsp;</th>
<td>
<button type="submit" name="submit" class="positive pill primary button">
<span class="check icon"></span>取消
</button>
<a href="index.php?do=config&view=rss&vi=1" class="positive pill primary button">
<span class="check icon"></span>效果预览
</a>
<button type="submit" name="submit" class="positive pill primary button">
<span class="check icon"></span>保存
</button>
</td>
</tr>
</table>
</form>
</div>
</div>
</div>
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
<script type="text/javascript">
 
</script><?php keke_tpl_class::ob_out();?>