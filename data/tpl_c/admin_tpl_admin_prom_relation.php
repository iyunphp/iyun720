<?php keke_tpl_class::checkrefresh('admin/tpl/admin_prom_relation', '1452251333' );?><!DOCTYPE HTML>
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
    <h1><?php echo $_lang['prom_relation_manage'];?></h1>
    <div class="tool">
        <a href="index.php?do=<?php echo $do;?>&&view=<?php echo $view;?>" class="here"><?php echo $_lang['relation_manage'];?></a>
    </div>
</div>
<div class="box search p_relative">
    <div class="title">
        <h2><?php echo $_lang['search'];?></h2>
    </div>
    <div class="detail">
        <form method="post" action="index.php?do=<?php echo $do;?>&view=<?php echo $view;?>" id="frm_art_search">
        <input type="hidden" name="page" value="<?php echo $page;?>">
        <table cellspacing="0" cellpadding="0">
         <tbody>
           <tr>
             <th>
          编号
             </th>
              <td>
                <input type="text" size='10' class="txt" name="w[relation_id]" value="<?php echo $w['relation_id'];?>" onkeyup="clearstr(this);">
              </td>
               <th>
                        <?php echo $_lang['upline'];?>
              </th>
                <td>
                  <input type="text" size="10" class="txt" name='w[prom_username]' value="<?php echo $w['prom_username'];?>">
                </td>
<th>
                        <?php echo $_lang['downline'];?>
              </th>
                <td>
                  <input type="text" size="10" class="txt" name='w[username]' value="<?php echo $w['username'];?>">
                </td>
              <th>
                         <?php echo $_lang['prom_type'];?>
               </th>
                <td>
                  <select name="w[prom_type]">
                      <option value="">--<?php echo $_lang['all'];?>--</option>
  <?php if(is_array($type_arr)) { foreach($type_arr as $k => $v) { ?>
   <?php if($v['type']!='auth') { ?>
  	<option <?php if($w['prom_type']==$v['prom_code']) { ?>selected="selected" <?php } ?>  value="<?php echo $v['prom_code'];?>"><?php echo $v['prom_item']?></option>
 <?php } ?>
  <?php } } ?>
                  </select>
               </td>
            </tr>
             <tr>
             	<th>
                        <?php echo $_lang['relation_status'];?>
               </th>
                <td>
                  <select name="w[relation_status]">
                      <option value="-1">--<?php echo $_lang['all'];?>--</option>
                      <?php if(is_array($status_arr)) { foreach($status_arr as $k => $v) { ?>
  <option value="<?php echo $k?>" <?php if($w['relation_status']==$k) { ?>selected="selected"<?php } ?>><?php echo $v;?></option>
  <?php } } ?>
                  </select>
               </td>
                 <th>
                     <?php echo $_lang['result_order'];?>
                 </th>
                  <td>
                     <select name="w[ord][]">
                           <option value="relation_id" <?php if($w['ord']['0']=='relation_id' or !isset($w['ord']['0'])) { ?> selected="selected"<?php } ?>><?php echo $_lang['default'];?><?php echo $_lang['order'];?></option>
                           <option value="on_time" <?php if($w['ord']['0']=='on_time' ) { ?> selected="selected"<?php } ?>><?php echo $_lang['end_time'];?></option>
                      </select>
                      <select name="w[ord][]">
                            <option <?php if($w['ord']['1']=='desc' or !isset($w['ord']['1'])) { ?>selected="selected" <?php } ?> value="desc"><?php echo $_lang['desc'];?></option>
                            <option <?php if($w['ord']['1']=='asc') { ?>selected="selected" <?php } ?> value="asc"><?php echo $_lang['asc'];?></option>
                      </select>
                   </td>
              <th>
                         <?php echo $_lang['show_reslut'];?>
               </th>
                   <td>
                     <select name="w[page_size]">
                          <option value="10" <?php if($w['page_size']=='10') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>10</option>
                          <option value="20" <?php if($w['page_size']=='20') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>20</option>
                          <option value="30" <?php if($w['page_size']=='30') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>30</option>
                     </select>
 <button class="pill" type="submit" value="<?php echo $_lang['search'];?>" name="sbt_search"><span class="icon magnifier">&nbsp;</span><?php echo $_lang['search'];?></button>
                   </td>

                <th>
                   &nbsp;
                </th>
                 <td>
                 	&nbsp;
                 </td>
             </tr>
          </tbody>
        </table>　
     </form>
   </div>
</div>
 <div class="box list">
 	<div class="title">
 	   <h2><?php echo $_lang['prom_relation_manage'];?></h2></div>
  <div class="detail">
  	 <form method="post" action="index.php?do=<?php echo $do;?>&view=<?php echo $view;?>" id="frm_list">
  	 	<input type="hidden" name="w[page_size]" value="<?php echo $page_size;?>">
<input type="hidden" name="page" value="<?php echo $page;?>">
<div  id="ajax_dom">
<table cellpadding="0" cellspacing="0">
               <tbody>
               	<tr>
               		<th>
<input type="checkbox" id="checkbox" onclick="checkall();" class="checkbox" >编号
</th>
<th><?php echo $_lang['upline'];?></th>
<th><?php echo $_lang['downline'];?></th>
<th><?php echo $_lang['prom_type'];?></th>
<th><?php echo $_lang['prom_time'];?></th>
<th><?php echo $_lang['relation_status'];?></th>
                    <th width="130"><?php echo $_lang['operate'];?> </th>
<tr>
 <?php if(is_array($prom_relation_arr)) { foreach($prom_relation_arr as $v) { ?>
               	<tr class="item">
               		<td><input type="checkbox" name="ckb[]" class="checkbox" value="<?php echo $v['relation_id'];?>"><?php echo $v['relation_id'];?>&nbsp;</td>
<td> <?php echo $v['prom_username']?>&nbsp;</td>
<td><?php echo $v['username']?>&nbsp;</td>
<td><?php echo $type_arr[$v['prom_type']]['prom_item']?>&nbsp;</td>
               		<td>
               			<?php if($v['on_time']){echo date('Y-m-d H:i:s',$v['on_time']); } ?>&nbsp;
</td>
                    <td>
                    	<?php echo $status_arr[$v['relation_status']];?>
</td>
<td>
                    <a  href="index.php?do=prom&view=relation_add&ac=edit&relation_id=<?php echo $v['relation_id']?>" class="button dbl_target"><span class="pen icon"></span>查看</a>
                    <a onclick="return cdel(this);" href="<?php echo $ac_url;?>&ac=del&relation_id=<?php echo $v['relation_id']?>" class="button"><span class="trash icon"></span><?php echo $_lang['delete'];?></a>
                    </td>
</tr>
<?php } } ?>
<tr>
                	<td colspan="8">
                	<div class="page fl_right"><?php echo $pages['page'];?></div>
                    <div class="clearfix">
                            <label for="checkbox" onclick="checkall(event);"><?php echo $_lang['select_all'];?></label>　
<input type="hidden" name="sbt_action" class="sbt_action"/>
<button type="submit" name="sbt_action" value="<?php echo $_lang['mulit_delete'];?>" onclick="return batch_act(this,'frm_list')" class="pill negative">
<span class="trash icon"></span><?php echo $_lang['mulit_delete'];?></button>&nbsp;&nbsp;
</div>
   </td>
            	 </tr>
               </tbody>
</table>
</div>
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
<?php keke_tpl_class::ob_out();?>