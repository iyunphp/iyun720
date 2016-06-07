<?php keke_tpl_class::checkrefresh('admin/tpl/admin_config_dq', '1452225789' );?><!DOCTYPE HTML>
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
<h1>地区配置</h1>
   		<input type="radio" value="1" <?php if($region_config['region_search_switch']=="1") { ?>  checked="checked"<?php } ?> name="region_switch" >开启
<input type="radio" value="0" <?php if($region_config['region_search_switch']!="1") { ?>  checked="checked"<?php } ?> name="region_switch" >关闭
<div id="open_search_cfg" <?php if($region_config['region_search_switch']!="1") { ?> style="display:none;" <?php } ?>>
 <input type="checkbox" <?php if($region_config['region_search_shop']=="1") { ?> checked="checked" <?php } ?> value="1" datatype="region_checkbox" dtype="shop" >作品
 <input type="checkbox" <?php if($region_config['region_search_task']=="1") { ?> checked="checked" <?php } ?> value="1" datatype="region_checkbox" dtype="task" >任务
</div>
</div>


<div class="page_title">
<h1>地区管理</h1>
   	<a href="#">一级</a>&nbsp>&nbsp
<a href="index.php?do=config&view=dqtwo&id=1">二级</a>&nbsp>&nbsp
    <a href="#">三级</a>&nbsp>&nbsp
</div>
<!--页头结束-->

<div class="box list">
        <div class="detail">
<form method="post" action="<?php echo $url;?>" id="ajax_dom">
  		<table cellpadding="0" cellspacing="0">
  		  <tbody>
          <tr>
            <th>一级</th>
<th>排序</th>
<th><?php echo $_lang['operate'];?></th>
          </tr>
  
<?php if(is_array($one['data'])) { foreach($one['data'] as $key => $value) { ?>
        <tr class="item">
        	<input type="hidden" value="<?php echo $value['id'];?>" name="id[]">
            <td width="20%"><input type="text" class="txt" value="<?php echo $value['name'];?>" name="name[]"></td>
            <td width="20%"><input type="text" class="txt" value="<?php echo $value['displayorder'];?>" name="displayorder[]"></td>
<td>
<a href="index.php?do=config&view=dqtwo&id=<?php echo $value['id'];?>" class="button dbl_target"><span class="book icon"></span>查看</a>
<a href="<?php echo $url;?>&id=<?php echo $value['id'];?>&op=del" class="button" onclick="return cdel(this);"><span class="trash icon"></span><?php echo $_lang['delete'];?></a>
</td>
          </tr>
 <?php } } ?>
          <tr>
          	<td colspan="4">
            <div class="clearfix">
<a href=javascript:adddq("index.php?do=config&view=adddq&page=<?php echo $_R['page'];?>"); class="button">添加</a>
            	<button type="submit" name="is_submit" value="1" class="positive pill button" /><span class="check icon"></span>提交更改</button>
</div>
</td>
          </tr>
  </tbody>
        </table>
<div class="page">

<?php echo $one['pages']['page'];?>
</div>
</form>
        </div>
</div>
<script type="text/javascript">
function adddq(url){
art.dialog.open(url,{
title:"添加菜单",
height:150,
width:300,
closeFn:function (){
var ispass=art.dialog.data('ispass');
if(ispass=='ok'){
var reason = art.dialog.data('reason');
var is_submit = art.dialog.data('is_submit');
var one = art.dialog.data('one');
art.dialog.data('ispass','no');
 		window.location.href='index.php?do=config&view=adddq&is_submit=1'+'&one='+one; 
} 

}
},false); 
}

$(function(){
$("input[name='region_switch']").click(function(){
var v = $(this).val();
$.post('index.php?do=config&view=dq',{op:'region_switch',val:v},function(json){
if(json.status == '1'){
$("#open_search_cfg").show();
}else{
$("#open_search_cfg").hide();
}
},'json');
});

$("input[datatype='region_checkbox']").click(function(){
var v = 0;
var dtype = $(this).attr('dtype');
$(this).is(':checked')?v=1:v=0;
$.post('index.php?do=config&view=dq',{op:'region_checkbox',val:v,dtype:dtype},function(json){
},'json');
});
});
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