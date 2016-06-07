<?php keke_tpl_class::checkrefresh('shop/goods/admin/tpl/goods_order', '1452586166' );?><!DOCTYPE HTML>
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
<h1><?php echo $_lang['goods_order_manage'];?></h1>
<div class="tool">
<a href="index.php?do=<?php echo $do;?>&model_id=<?php echo $model_id;?>&view=order"
class="here"><?php echo $_lang['order_list'];?></a>
<!--<a href="index.php?do=<?php echo $do;?>&model_id=<?php echo $model_id;?>&view=list"><?php echo $_lang['goods_list'];?></a> -->
</div>
</div>
<!--页头结束-->

<!--提示结束-->

<div class="box search p_relative">
<div class="title">
<h2><?php echo $_lang['search'];?></h2>
</div>
<div class="detail" id="detail">
<form method="post"
action="index.php?do=<?php echo $do;?>&model_id=<?php echo $model_id;?>&view=<?php echo $view;?>"
id="frm_art_search">
<input type="hidden" name="page" value="<?php echo $page;?>">
<table cellpadding="0" cellspacing="0">
<tbody>
<tr>
<th><?php echo $_lang['id'];?></th>
<td><input type="text" class="txt" name="w[order_id]"
id="order_id" value="<?php echo $w['order_id'];?>" onkeyup="clearstr(this);">
</td>
<th><?php echo $_lang['give_order_people'];?></th>
<td><input type="text" class="txt" name="w[order_username]"
id="title" value="<?php echo $w['order_username'];?>"></td>
<th><?php echo $_lang['order_status'];?></th>
<td><select name="w[order_status]">
<option value=""><?php echo $_lang['please_choose_order_status'];?></option>
<?php if(is_array($order_status_arr)) { foreach($order_status_arr as $k => $v) { ?>
<option <?php if($w['order_status']==$k) { ?>selected=
"selected" <?php } ?>  value="<?php echo $k?>"><?php echo $v?></option> <?php } } ?>
</select></td>
</tr>
<tr>
<th><?php echo $_lang['result_order'];?></th>
<td><select name="ord[]">
<option value="order_id" <?php if($ord['0']==
'order_id' or !isset($ord['0'])) { ?> selected="selected"<?php } ?>><?php echo $_lang['default'];?><?php echo $_lang['order'];?></option>
<option value="order_time" <?php if($ord['0']==
'order_time' ) { ?> selected="selected"<?php } ?>><?php echo $_lang['order_time'];?></option>
</select> <select name="ord[]">
<option <?php if($ord['1']==
'desc' or !isset($ord['1'])) { ?>selected="selected"
<?php } ?> value="desc"><?php echo $_lang['desc'];?></option>
<option <?php if($ord['1']== 'asc') { ?>selected="selected"
<?php } ?> value="asc"><?php echo $_lang['asc'];?></option>
</select></td>
<th><?php echo $_lang['list_result'];?></th>
<td colspan="3"><select name="w[page_size]">
<option value="10" <?php if($w['page_size']==
'10') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>10</option>
<option value="20" <?php if($w['page_size']==
'20') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>20</option>
<option value="30" <?php if($w['page_size']==
'30') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>30</option>
</select>
<button class="pill" type="submit" value="<?php echo $_lang['search'];?>"
name="sbt_search">
<span class="icon magnifier">&nbsp;</span><?php echo $_lang['search'];?>
</button></td>
</tr>
<tr>

</tr>
</tbody>
</table>
</form>
</div>
</div>
<!--搜索结束-->


<div class="box list">
<div class="title">
<h2><?php echo $_lang['order_list'];?></h2>
</div>
<div class="detail">
<form method="post" action="#" id="frm_art_search1">
<input type="hidden" name="w['page_size']" value="<?php echo $page_size;?>">
<div id="ajax_dom">
<input type="hidden" name="page" value="<?php echo $page;?>">
<table cellspacing="0" cellpadding="0">
<tr>
<th><input type="checkbox" id="checkbox" onclick="checkall();" class="checkbox" >编号</th>
<th><?php echo $_lang['order_name'];?></th>
<th><?php echo $_lang['order_money'];?></th>
<th><?php echo $_lang['order_status'];?></th>
<th><?php echo $_lang['give_order_people'];?></th>
<th><?php echo $_lang['order_time'];?></th>
<th><?php echo $_lang['operate'];?></th>
</tr>
<?php if(is_array($order_arr)) { foreach($order_arr as $k => $v) { ?>
<?php $method = get_submit_method($v['order_id']); ?>
<tr class="item">
<td><input type="checkbox" name="ckb[]"
value="<?php echo $v['order_id'];?>" class="checkbox"><?php echo $v['order_id'];?></td>
<td class="obj_link">
<?php echo $v['order_body'] ?>
</td>
<td><?php  echo keke_curren_class::output(floatval($v['order_amount']),-1);  ?></td>
<td><?php echo $order_status_arr[$v['order_status']]?></td>
<td><?php echo $v['order_username'];?></td>
<td>
<?php if($v['order_time']){echo date('Y-m-d H:i:s',$v['order_time']); } ?>
</td>
<td><a onclick="return cdel(this);"
href='<?php echo $url_str;?>&ac=del&order_id=<?php echo $v['order_id'];?>&page=<?php echo $page;?>'
class="button"><span class="trash icon"></span><?php echo $_lang['delete'];?></a>
<?php if($v['order_status']=='ok'&&$method == 'outside') { ?>
<a onclick="return cdel(this,'确认该订单已完成？');"
href='<?php echo $url_str;?>&ac=confirm&order_id=<?php echo $v['order_id'];?>&page=<?php echo $page;?>'
class="button"><span class="trash icon"></span>客服确认</a>
<?php } ?>
</td>
</tr>
<?php } } ?>
<tr>
<td colspan="9">
<div class="page fl_right"><?php echo $pages['page'];?></div>
<div class="clearfix"> 
     		<label for="checkbox" onclick="checkall(event);"><?php echo $_lang['select_all'];?></label>  
                     		<input type="hidden" name="sbt_action" class="sbt_action" id="sbt_action"/>　                   
                        		<button class="pill negative button" type="submit" value="<?php echo $_lang['mulit_delete'];?>" name="sbt_action" onclick="return batch_act(this,'frm_art_search1')"><span class="icon trash">&nbsp;</span><?php echo $_lang['mulit_delete'];?></button>
                    		</div>
</td>
</tr>
</table>
</div>
</form>
</div>
</div>
<!--主体结束-->
<script type="text/javascript">	
var url_link = "<?php echo $_K['siteurl'];?>/";
$(function(){
$(".obj_link a").each(function(){
this.href=this.href.replace(url_link+"admin/",url_link);
this.target="_blank";
})
})
function show_detail(order_id){
var url = 'index.php?do=model&model_id=6&view=order_detail&order_id='+order_id;
art.dialog.open(url,{title:"<?php echo $_lang['order'];?>#"+order_id+"<?php echo $_lang['number_detail'];?>",height:400,width:700});
}
function go_detail(order_id){
var url = 'index.php?do=model&model_id=6&view=order_detail&order_id='+order_id;
location.href = url;
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