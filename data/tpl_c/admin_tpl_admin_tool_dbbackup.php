<?php keke_tpl_class::checkrefresh('admin/tpl/admin_tool_dbbackup', '1452251356' );?><!DOCTYPE HTML>
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
    	<h1><?php echo $_lang['db_mange'];?></h1>
         <div class="tool">         
            <a href="index.php?do=tool&view=dbbackup" class="here"><?php echo $_lang['backup'];?></a>
            <a href="index.php?do=tool&view=dbrestore"><?php echo $_lang['restore'];?></a>
<a href="index.php?do=tool&view=dboptim"><?php echo $_lang['optim'];?></a>
<a href="index.php?do=tool&view=dboptim&op=repair"><?php echo $_lang['repair'];?></a>
</div>
</div>
<div class="box list">
  <div class="detail">
    <div class="tabcon">
     <div class="title"><h2><?php echo $_lang['database_backup'];?></h2></div>
<form method="post" action="#" id="frm_cat_edit">
   			<input type="hidden" name="do" value="<?php echo $do;?>">
<input type="hidden" name="view" value="<?php echo $view;?>">
          	 <table cellpadding="0" cellspacing="0">
           	  <tbody>
            	  <tr class="item">
              		<td width="300"><img src="tpl/img/SQl15bg.gif"></td>
              		<td class="loading" align="center"><?php echo DBNAME;?></td>
              		<td width="300">
              			<button type="button" name="sbt_edit" id="backup" class="primary positive pill button">
              				<span class="book icon"></span><?php echo $_lang['backup_now'];?>
</button>
</td>
             	 </tr>
          	 </tbody>
             </table>
       </form>
    </div>
 </div><div class="backshow"></div>
</div>
<script type="text/javascript">
$("#backup").click(function(){
$.ajax({
url:"index.php?do=tool&view=dbbackup&sbt_edit=1",
dataType:'json',
beforeSend:function(){
$(".loading").html("<?php echo $_lang['building'];?></br><img src='tpl/img/loading.gif'>");
},
success:function(json){
if(json.status==1){
$.each(json.data,function(i,n){
str = "<p><?php echo $_lang['backup_table'];?>"+n+"<?php echo $_lang['success'];?></p>";
if(i==0){
$(".detail").html(str);
}else{
$(".detail").append(str);
}
$("html,body").animate({scrollTop:$(".backshow").offset().top},50);
if(i+1==json.data.length){
setTimeout("winReload(1)",6500);
}
})
}else{
setTimeout("winReload(0)",1500);
}
},
error:function(){
setTimeout("winReload(0)",1500);
}
})
})

function winReload(t){
window.location.replace("index.php?do=tool&view=dbbackup&t="+t);
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
</html>
<?php keke_tpl_class::ob_out();?>