<?php keke_tpl_class::checkrefresh('admin/tpl/admin_user_list', '1452670449' );?><!DOCTYPE HTML>
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
<h1><?php echo $_lang['member_manage'];?></h1>
     <div class="tool"> 
        <a href="index.php?do=<?php echo $do?>&view=list" class="here"><?php echo $_lang['member_manage'];?></a>
        <a href="index.php?do=<?php echo $do?>&view=add"><?php echo $_lang['add_member'];?></a>
    	<a href="index.php?do=user&view=charge"><?php echo $_lang['charge'];?></a>
</div>
</div>
<!--页头结束--> 

      <div class="box search p_relative">
    	<div class="title"><h2><?php echo $_lang['search'];?></h2></div>
        <div class="detail" id="detail">
<form action="#" method="post">
        	<input type="hidden" name="do"   value="<?php echo $do?>">
<input type="hidden" name="view" value="<?php echo $view?>">
<input type="hidden" name="type" value="<?php echo $type?>">
<input type="hidden" name="page" value="<?php echo $page?>">
<table cellspacing="0" cellpadding="0">
 <tbody>
 	<tr>
 		<th><?php echo $_lang['user'];?>编号</th>
<td><input type="text" class="txt" name="space[uid]" value="<?php echo $space['uid'];?>" onkeyup="clearstr(this);"></td>
<th><?php echo $_lang['username'];?></th>
<td><input type="text" class="txt" name='space[username]' value="<?php echo $space['username'];?>" onkeyup="clearspecial(this);"></td>
 	</tr>

<tr>
<th>注册邮箱</th>
<td><input type="text" class="txt" name="space[email]" value="<?php echo $space['email'];?>"></td>
<th><?php echo $_lang['show_number'];?></th>
<td>
<select name="slt_page_size" class="ps vm">
<option value="10" <?php if($slt_page_size=='10') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>10</option>
<option value="20" <?php if($slt_page_size=='20') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>20</option>
<option value="30" <?php if($slt_page_size=='30') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>30</option>
</select>
</td>

</tr>

<tr>
<th>注册手机</th>
<td><input type="text" class="txt" name="space[mobile]" value="<?php echo $space['mobile'];?>"></td>					
</tr>

<tr>
<th><?php echo $_lang['result_order'];?></th>
<td>


<select name="ord[]">
                           <option value="uid" <?php if($ord['0']=='uid' or !isset($ord['0'])) { ?> selected="selected"<?php } ?>><?php echo $_lang['default'];?><?php echo $_lang['order'];?></option>
                           <option value="reg_time" <?php if($ord['0']=='reg_time' ) { ?> selected="selected"<?php } ?>>时间</option>
                      </select>
                      <select name="ord[]">
                            <option <?php if($ord['1']=='desc' or !isset($ord['1'])) { ?>selected="selected" <?php } ?> value="desc"><?php echo $_lang['desc'];?></option>
                            <option <?php if($ord['1']=='asc') { ?>selected="selected" <?php } ?> value="asc"><?php echo $_lang['asc'];?></option>
                      </select>
</td>
<th><?php echo $_lang['user_status'];?></th>
<td>
<select name="slt_static" style="width:60px;">
      		<option value="0" <?php if(!$slt_static) { ?>selected="selected"<?php } ?>> <?php echo $_lang['all'];?> </option>
<option value="1" <?php if($slt_static=='1') { ?>selected="selected"<?php } ?>> <?php echo $_lang['normal'];?> </option>
<option value="2" <?php if($slt_static=='2') { ?>selected="selected"<?php } ?>> <?php echo $_lang['disable'];?> </option>
<option value="3" <?php if($slt_static=='3') { ?>selected="selected"<?php } ?>> <?php echo $_lang['to_activate'];?> </option>
</select>
<button type="submit" name="sbt_search" value="<?php echo $_lang['search']?>" class="pill" />
<span class=icon magnifier>&nbsp;</span><?php echo $_lang['search'];?></button>
</td>
</tr>
 </tbody>
</table>
</form>
        </div>
 </div>

    <div class="box list">
    	<div class="title"><h2><?php echo $_lang['user_list'];?></h2></div>
        <div class="detail">
<form method="post" action="#" id="frm_user_search">
<div id="ajax_dom">
<input type="hidden" name="page" value="<?php echo $page;?>" />
  		<table cellpadding="0" cellspacing="0">
  		<thead>
          <tr>
          	<th width="15"><input type="checkbox" id="checkbox" onclick="checkall()">UID</th>
            <th style="width:40px;"><?php echo $_lang['username'];?></th>
<th width="45"  class="wraphide"><?php echo $_lang['user_group'];?></th>
<th width="60"  class="wraphide" ><?php echo $_lang['user_status'];?></th>
<th width="90"><?php echo $_lang['register_time'];?></th>
<th width="45" ><?php echo $_lang['register'];?>ip</th>

<th width="45"><?php echo $_lang['balance'];?></th>
<th width="25%"><?php echo $_lang['operate'];?></th>
 
         </tr>
 </thead>
 <tbody> 
<?php if(is_array($userlist_arr)) { foreach($userlist_arr as $key => $value) { ?>
        <tr class="item">
        	<td class="td25"><input type="checkbox" <?php if($admin_info['uid'] == $value['uid']) { ?> disabled="disabled" <?php } ?> name="ckb[]" class="checkbox" value="<?php echo $value['uid'];?>"><?php echo $value['uid'];?></td>
            <td class="td25 wraphide"><a href="javascript:void(0)" ><?php echo $value['username'];?></a></td>
            <td class="wraphide"><?php if($grouplist_arr[$value['group_id']]['groupname']) { ?> <?php echo $grouplist_arr[$value['group_id']]['groupname']?> <?php } else { ?><?php echo $_lang['normal'];?><?php } ?></td>
<td class="wraphide"><?php if($value['status']==1) { ?><?php echo $_lang['normal'];?><?php } elseif($value['status']==2) { ?><?php echo $_lang['disable'];?><?php } else { ?><?php echo $_lang['to_activate'];?><?php } ?></td>
<td><?php if($value['reg_time']){echo date('Y-m-d',$value['reg_time']); } ?></td>
            <td><div class="ws_break" style="width:70%;"><?php echo $value['reg_ip'];?></div></td>
           
<td><div class="ws_break" style="width:70%;"><?php  echo keke_curren_class::output(floatval($value['balance']),-1);  ?></div></td>
 
<td>
<a class="button dbl_target" href="index.php?do=user&view=add&edituid=<?php echo $value['uid'];?>&page=<?php echo $page;?>"><span class="pen icon"></span><?php echo $_lang['edit'];?></a>
<!--
<?php if($shop_open[$v['uid']]) { ?>
<?php if(!$value['recommend']) { ?>
<a class="button" href="<?php echo $url_str;?>&op=recommend&edituid=<?php echo $value['uid'];?>&page=<?php echo $page;?>" onclick="return cdel(this,'<?php echo $_lang['sure_to_recommend'];?>');">
<span class="uparrow icon"></span><?php echo $_lang['recommend'];?></a>
<?php } else { ?>
<a class="button" href="<?php echo $url_str;?>&op=move_recommend&edituid=<?php echo $value['uid'];?>&page=<?php echo $page;?>" onclick="return cdel(this,'<?php echo $_lang['sure_to_move_recommend'];?>');">
<span class="downarrow icon"></span><?php echo $_lang['move_recommend'];?></a>
<?php } ?>
<?php } ?>
-->
<?php if($value['uid']!=1) { ?>
<a class="button" href="index.php?do=user&view=custom_add&op=add&edituid=<?php echo $value['uid'];?>&page=<?php echo $page;?>"><span class="cog icon"></span><?php echo $_lang['rights_set'];?></a>
 							<?php if($value['status']!=2) { ?><a class="button" href="index.php?do=user&view=list&op=disable&edituid=<?php echo $value['uid'];?>&page=<?php echo $page;?>"><span class="lock icon"></span><?php echo $_lang['disable'];?></a><?php } else { ?> 
<a class="button" href="index.php?do=user&view=list&op=able&edituid=<?php echo $value['uid'];?>&page=<?php echo $page;?>"><span class="unlock icon"></span><?php echo $_lang['use'];?></a><?php } ?> 
 							<a class="button" href="index.php?do=user&view=list&op=del&edituid=<?php echo $value['uid'];?>" onclick="return <?php if($basic_config['user_intergration']>1) { ?> cdel(this,'<?php echo $_lang['open_user_integration_confirm_notice'];?>'); <?php } else { ?>cdel(this);<?php } ?>"><span class="trash icon"></span><?php echo $_lang['delete'];?></a>
<?php } ?>
</td>
 			        </tr>
<?php } } ?>
 </tbody>
 <tfoot>
          <tr>
           <td colspan="10">
<div class="clearfix">
<label for="checkbox" onclick="checkall(event);"><?php echo $_lang['select_all'];?></label>　
<input type="hidden" name="sbt_action" class="sbt_action" />
<button type="submit" name="sbt_action" value="<?php echo $_lang['mulit_disable'];?>" class="pill negative" onclick="return batch_act(this,'frm_user_search');" ><span class="lock icon"></span><?php echo $_lang['mulit_disable'];?></button>
<button type="submit" name="sbt_action" value="<?php echo $_lang['mulit_use'];?>" class="pill positive" onclick="return batch_act(this,'frm_user_search');" ><span class="unlock icon"></span><?php echo $_lang['mulit_use'];?></button>
<button type="submit" name="sbt_action" value="<?php echo $_lang['mulit_delete'];?>" class="pill negative" onclick="return batch_act(this,'frm_user_search');" ><span class="icon trash"></span><?php echo $_lang['mulit_delete'];?></button>
 
<button type="button" name="sbt_add"    value="<?php echo $_lang['add_new_user'];?>" class="positive primary pill button" onclick="document.location.href='index.php?do=user&view=add'"><span class="check icon"></span><?php echo $_lang['add_new_user'];?></button>
 
    </div>

   </td>
 </tr>
 </tfoot>
        </table>
<div class="page"><?php echo $pages['page'];?></div>
</div>
</form>
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
<?php keke_tpl_class::ob_out();?>