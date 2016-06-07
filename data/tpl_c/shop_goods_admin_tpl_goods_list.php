<?php keke_tpl_class::checkrefresh('shop/goods/admin/tpl/goods_list', '1452670766' );?><!DOCTYPE HTML>
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
    	<h1><?php echo $_lang['witkey_goods_manage'];?></h1>
        <div class="tool">
         <!--  <a href="index.php?do=<?php echo $do;?>&model_id=<?php echo $model_id;?>&view=order"><?php echo $_lang['goods_list'];?></a>-->
  <a href="index.php?do=<?php echo $do;?>&model_id=<?php echo $model_id;?>&view=list" class="here" ><?php echo $_lang['goods_list'];?></a>
        </div>
</div>
<!--页头结束-->

<!--提示结束-->

<div class="box search p_relative">
    	<div class="title"><h2><?php echo $_lang['search'];?></h2></div>
    	<div class="detail" id="detail">
<form method="post" action="index.php?do=<?php echo $do;?>&model_id=<?php echo $model_id;?>&view=<?php echo $view;?>" id="frm_art_search">
<input type="hidden" name="page" value="<?php echo $page;?>">
    		<table cellspacing="0" cellpadding="0">
<tbody>
<tr>
<th><?php echo $_lang['goods_id'];?></th>
                <td><input type="text" class="txt" name="w[service_id]" id="service_id" value="<?php echo $w['service_id']?>" onkeyup="clearstr(this);"  ></td>
                <th><?php echo $_lang['goods_name'];?></th>
                <td>
                <input type="text" class="txt" name='w[title]' id="title" value="<?php echo $w['title']?>">
</td>
<th><?php echo $_lang['shopkeeper'];?></th>
<td>
<input type="text" class="txt" name="w[username]" id="username" value="<?php echo $w['username']?>" tips="">
</td>
</tr>
<tr>
<th><?php echo $_lang['goods_status'];?></th>
<td>
 <select name="w[service_status]" id="catid" onchange="statusJump(this.value)">
 	<option value=""><?php echo $_lang['goods_status'];?></option>
 	<option value="a1" <?php if($w['service_status']==='a1') { ?> selected="selected" <?php } ?> >更新待审核</option>
<?php if(is_array($status_arr)) { foreach($status_arr as $k => $v) { ?>
 <?php $k = strval($k); ?>
<option value="<?php echo $k?>" <?php if($w['service_status']===$k) { ?> selected="selected" <?php } ?> ><?php echo $v;?></option>
<?php } } ?>
             			 </select>
 </td>
<th><?php echo $_lang['result_order'];?></th>
<td>
 <select name="ord" onchange="orderJump(this.value)">
                     		 	 <option <?php if($ord=='default' or !isset($ord['1'])) { ?> selected="selected" <?php } ?>  value="default">默认排序</option>
                     		 	 <option <?php if($ord=='id-desc') { ?> selected="selected" <?php } ?>  value="id-desc">编号降序</option>
                     		 	 <option <?php if($ord=='id-asc') { ?> selected="selected" <?php } ?>  value="id-asc">编号升序</option>
                     		 </select>
</td>
<th><?php echo $_lang['result_show'];?></th>
<td colspan="3">
<select name="size"  onchange="pageJump(this.value)">
                			<option value="10" <?php if($size=='10') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>10</option>
                			<option value="20" <?php if($size=='20') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>20</option>
                			<option value="30" <?php if($size=='30') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>30</option>
            			</select>
<button class="pill" type="submit" value="<?php echo $_lang['search'];?>" name="sbt_search"><span class="icon magnifier">&nbsp;</span><?php echo $_lang['search'];?></button>
</td>
</tr>
           		</tbody>
</table>
</form>
    	</div>
    </div>
<!--搜索结束-->

<div class="box list">
    <div class="title"><h2><?php echo $_lang['goods_list'];?></h2></div>
    <div class="detail">
<form action="" method="post" id="frm_list">
<input type="hidden" name="w[page_size]" value="<?php echo $page_size;?>">
<div id="ajax_dom">
<input type="hidden" name="page" value="<?php echo $page;?>">
    	<table cellpadding="0" cellspacing="0">
    		<tbody>
        	<tr>
        		<th width="10%">编号</th>
           		<th width="25%"><?php echo $_lang['goods_name'];?></th>
           		<th width="15%"><?php echo $_lang['quotation_yuan_unit'];?></th>
<th width="15%"><?php echo $_lang['shopkeeper'];?></th>
              	<th width="5%"><?php echo $_lang['goods_status'];?></th>
                <th width="30%"><?php echo $_lang['operate'];?></th>
            </tr>

            <?php if(is_array($goods_arr)) { foreach($goods_arr as $k => $v) { ?>
            <tr class="item">
            	<td ><?php echo $v['service_id'];?></td>
                <td><a target="_blank" href="<?php echo $_K['siteurl'];?>/index.php?do=goods&id=<?php echo $v['service_id'];?>">
                	<?php echo kekezu::cutstr($v['title'],44) ?></a><?php if($v['edit_status'] =='1') { ?><span style="color: red">(更新待审核)</span><?php } ?></td>
                <td><?php if($v['price']) { ?><?php  echo keke_curren_class::output(floatval($v['price']),-1);  ?> / <?php echo $v['unite_price']?><?php } else { ?><?php echo $_lang['no_quotation'];?><?php } ?></td>
<td><?php echo $v['username'];?></td>
                <td><?php echo $status_arr[$v['service_status']];?></td>
                <td>
                <?php if($v['edit_status'] =='1') { ?>
<a href="javascript:viewUpdateInfo('<?php echo $url_str;?>&ac=view_info&service_id=<?php echo $v['service_id'];?>&page=<?php echo $page;?>&uid=<?php echo $v['uid'];?>');" class="button"><span class="check icon"></span>查看更新</a>
<?php } else { ?>
                <?php if($v['service_status']==1) { ?>
<a href="<?php echo $url_str;?>&ac=pass&service_id=<?php echo $v['service_id'];?>&page=<?php echo $page;?>" onclick="return cpass(this,'',1);" class="button"><span class="check icon"></span>审核通过</a>
<!-- <a href="<?php echo $url_str;?>&ac=nopass&service_id=<?php echo $v['service_id'];?>&page=<?php echo $page;?>" onclick="return cpass(this,'',2);" class="button"><span class="check icon"></span>审核失败</a> -->
<a href=javascript:lookinfo("<?php echo $url_str;?>&ac=nopass&service_id=<?php echo $v['service_id'];?>&page=<?php echo $page;?>&uid=<?php echo $v['uid'];?>");  class="button"><span class="check icon"></span>审核失败</a>
<?php } ?>
<?php } ?>
<a href="index.php?do=<?php echo $do?>&model_id=<?php echo $model_id?>&view=edit&service_id=<?php echo $v['service_id']?>&page=<?php echo $page;?>" class="button dbl_target"><span class="pen icon"></span><?php echo $_lang['edit'];?></a>
<?php if($v['service_status']!=2&&$v['service_status'] !=1) { ?>
<a href="<?php echo $url_str;?>&ac=del&service_id=<?php echo $v['service_id'];?>&page=<?php echo $page;?>"  onclick="return cdel(this);" class="button"><span class="trash icon"></span><?php echo $_lang['delete'];?></a>
<?php } ?>
<?php if($v['service_status']==3) { ?>
<a href="<?php echo $url_str;?>&ac=shelves&service_id=<?php echo $v['service_id'];?>&page=<?php echo $page;?>" onclick="return  cdel(this,'<?php echo $_lang['shelves_this_product'];?><?php echo $_lang['zh_wh'];?>');" class="button"><span class="check icon"></span><?php echo $_lang['shelves'];?></a>
<?php } ?>
<?php if($v['service_status']==2) { ?>
<a href=javascript:off_shelf("<?php echo $url_str;?>&ac=off_shelf&service_id=<?php echo $v['service_id'];?>&page=<?php echo $page;?>"); class="button"><span class="lock icon"></span><?php echo $_lang['off_the_shelf'];?></a>
<?php } ?>
                <?php if($v['service_status']==2) { ?>
<?php if(!$v['is_top']) { ?>
<a class="button" href="<?php echo $url_str;?>&ac=recommend&service_id=<?php echo $v['service_id'];?>&page=<?php echo $page;?>" onclick="return cdel(this,'确认推荐？');">
<span class="uparrow icon"></span>推荐</a>
<?php } else { ?>
<a class="button" href="<?php echo $url_str;?>&ac=move_recommend&service_id=<?php echo $v['service_id'];?>&page=<?php echo $page;?>" onclick="return cdel(this,'确认取消推荐？');">
<span class="downarrow icon"></span>取消推荐</a>
<?php } ?>
<?php } ?>
</td>
            </tr>
            <?php } } ?>
          	<tr>
            	<td colspan="9">
                    <div class="page fl_right"><?php echo $pages['page'];?></div>
                   
                 </td>
        	</tr>
 </tbody>
        </table></div>
     </form>
    </div>
</div>
<!--主体结束-->
<script type="text/javascript">
var url = '<?php echo $url_str;?>';
function statusJump(service_status){
window.location.href = url+'&w[service_status]='+service_status;
}
function orderJump(value){
window.location.href= url+'&ord='+value;
}
function pageJump(value){
window.location.href = url+'&size='+value;
}
function lookinfo(url){
art.dialog.open(url,{
title:"审核不通过的原因",
height:380,
width:500,
closeFn:function (){
var ispass=art.dialog.data('ispass');
if(ispass=='ok'){
var reason = art.dialog.data('reason');
var username = art.dialog.data('username');
var title = art.dialog.data('title');
art.dialog.data('ispass','no');
 	window.location.href=url+'&is_submit=1'+'&reason='+reason; 
} 

}
},false); 
}
function viewUpdateInfo(url){
art.dialog.open(url,{
title:"查看更新",
height:380,
width:500,
closeFn:function (){
var ispass=art.dialog.data('ispass');
if(ispass == '1'){
window.location.href ="index.php?do=<?php echo $do;?>&model_id=<?php echo $model_id;?>&view=list";
}
}
},false); 
}
function off_shelf(url){
art.dialog.open(url,{
title:"下架原因",
height:300,
width:360,
closeFn:function (){
var ispass=art.dialog.data('ispass');
if(ispass=='ok'){
var reason = art.dialog.data('reason');
var username = art.dialog.data('username');
var title = art.dialog.data('title');
art.dialog.data('ispass','no');
 	window.location.href=url+'&is_submit=1'+'&reason='+reason+'&name='+username+'&title='+title; 
} 

}
},false); 
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