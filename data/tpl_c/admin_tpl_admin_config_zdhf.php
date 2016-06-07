<?php keke_tpl_class::checkrefresh('admin/tpl/admin_config_zdhf', '1452251327' );?><!DOCTYPE HTML>
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
    	<h1>邮件自动回访</h1>
        <div class="tool">
        </div>
</div>
<!--页头结束-->
<div class="box post">
    <div class="tabcon">
        	<div class="title"><h2>邮件自动回访</h2></div>
            <div class="detail">
                <form method="post" action="index.php?do=config&view=zdhf" id="frm_art_edit" name="frm_art_edit" >
                <input type="hidden" name="service_id" value="<?php echo $service_info['service_id']?>">
<input type="hidden" name="hdn_act" value="1">
<input type="hidden" name="is_submit" value="1" />
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <th scope="row" width="130">功能开启</th>
                        <td>
<input type="radio" name="kg" id="kq" value="1" />开启&nbsp;&nbsp;<input type="radio" name="kg" id="gb" value="0" />关闭
                        </td>
                      </tr>
  <tr>
                        <th scope="row">用户筛选</th>
                        <td>
                        	只发送给<input type="text" class="txt" name="tian" id="tian" value="<?php echo $arr_auto_mail['tian'];?>"/>天未登录的用户
</td>
  </tr>
  <tr>
  	<th scope="row"></th>
  	<input type="hidden" name="authlist"  id="authlist" />
  	<input type="hidden" name="renwulist" id="renwulist" />
  	<td>通过了<input type="checkbox" name="auth" id="realname" value="realname,enterprise" />实名或者企业&nbsp;&nbsp;<input type="checkbox" name="auth" id="bank" value="bank" />银行认证&nbsp;&nbsp;<input type="checkbox" name="auth"  id="mobile" value="mobile" />手机认证&nbsp;&nbsp;<input type="checkbox" name="auth"  id="email" value="email" />邮箱认证&nbsp;&nbsp;的用户<br />
  	并且需要<input type="checkbox" name="renwu" id="pubtask" value="1" />发布过任务&nbsp;&nbsp;<input type="checkbox" name="renwu"  id="task_work" value="2" />承接过任务
  	 </td>
  </tr>
                      <tr>
                        <th scope="row">邮件内容</th>
                        <td>

</td>
                      </tr>
  					  <tr>
                        <th scope="row">标题</th>
                        <td>
<input type="text" class="txt" name="title" id="title"  value="<?php echo $arr_auto_mail['title'];?>"/>
</td>
  </tr>
   <tr>
                        <th scope="row">内容</th>
                        <td>
<textarea name="content"  cols="100" id="tar_content"><?php echo $arr_auto_mail['content'];?></textarea>
</td>
 <script type="text/javascript" src="<?php echo $_K['siteurl'];?>/static/js/ueditor/ueditor.config.admin.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="<?php echo $_K['siteurl'];?>/static/js/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="<?php echo $_K['siteurl'];?>/static/js/ueditor/lang/zh-cn/zh-cn.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('tar_content', {
            //这里可以选择自己需要的工具按钮名称,此处仅选择如下五个
        	initialFrameWidth: '80%',
        	initialFrameHeight: '400'
        });
    </script>
  </tr>
                    <tr>
                        <th scope="row">&nbsp;</th>
                    	<td>
                    	<button name="sbt_edit" value="1" class="positive primary  button" type="submit" onclick="return  tijiao();">
                    		<span class="check icon"></span><?php echo $_lang['submit'];?></button>

                    	</td>
                    </tr>
                    </table>
                </form>
              </div>
       </div>
</div>
<!--主体结束-->
<script type="text/javascript">
function tijiao(){
var auth="";
var renwu="";
var tianshu=$("#tian").val();
var title=$("#title").val();
var content = $("#tar_content").val();
if(!tianshu){
alert('请输入天数！');
return false;
}
if(!title){
alert('请输入标题！');
return false;
}
if(!content){
alert('请输入内容！');
return false;
}
$('input[name="auth"]:checked').each(function(){
auth=auth+$(this).val()+',';
})
$("#authlist").val(auth);
$('input[name="renwu"]:checked').each(function(){
renwu=renwu+$(this).val()+',';
})
$("#renwulist").val(renwu);
}
</script>
<?php if($arr_auto_mail) { ?>
<script type="text/javascript">
var strauthlist="<?php echo $arr_auto_mail['authlist'];?>";
var strtasklist="<?php echo $arr_auto_mail['renwulist'];?>";
var kg="<?php echo $arr_auto_mail['is_open'];?>";
$(function(){
if(kg){
$("#kq").attr("checked","checked");
}else{
$("#gb").attr("checked","checked");
}
var arrauth= new Array(); //定义一数组
arrauth=strauthlist.split(","); //字符分割
var arrtask = new Array();
arrtask= strtasklist.split(",");
for (i=0;i<arrauth.length ;i++ )
{
if(arrauth[i]=='realname' || arrauth[i]=='enterprise'){
$("#realname").attr("checked","checked");
}else if(arrauth[i]=='bank'){
$("#bank").attr("checked","checked");
}else if(arrauth[i]=='mobile'){
$("#mobile").attr("checked","checked");
}else if(arrauth[i]=='email'){
$("#email").attr("checked","checked");
}
}
for(n=0;n<arrtask.length;n++){
if(arrtask[n]=='1'){
$("#pubtask").attr("checked","checked");
}
if(arrtask[n]=='2'){
$("#task_work").attr("checked","checked");
}
}
})
</script>
<?php } ?>
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