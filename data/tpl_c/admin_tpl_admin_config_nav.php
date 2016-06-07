<?php keke_tpl_class::checkrefresh('admin/tpl/admin_config_nav', '1452225788' );?><!DOCTYPE HTML>
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
<div class="title"><h2><?php echo $_lang['nav_menu'];?></h2></div>
        <div class="detail">
        	<form name="frm_config_basic" id="frm_config_basic" action="index.php?do=config&view=nav" method="post" enctype='application/x-www-form-urlencoded'>
            <table cellspacing="0" cellpadding="0">
            
<tr>
                <th width="150"><?php echo $_lang['title'];?></th>
                <th width="200" ><?php echo $_lang['link'];?></th>
               <th width="12%"><?php echo $_lang['style'];?></th>
                <th width="100"><?php echo $_lang['order'];?></th>
                <th width="120"><?php echo $_lang['open_new_window'];?></th>
                <th width="100"><?php echo $_lang['display_mode'];?></th>
                <th width="200"><?php echo $_lang['operate'];?></th>
            </tr>

            <?php if(is_array($nav_list)) { foreach($nav_list as $k => $v) { ?>
            <tr id="olditem_<?php echo $k?>" class="item">
            	<?php if($v['nav_style']==$kekezu->_sys_config['set_index']) { ?>
               	 	<td style='font-weight:bold'>
              			<input type="text" value="<?php echo $v['nav_title'];?>" name="nav[<?php echo $k?>][nav_title]" class='txt' size='12'>
(<?php echo $_lang['default_index'];?>)
 	</td>
                <?php } else { ?>
                	<td>
              			<input type="text" value="<?php echo $v['nav_title'];?>" name="nav[<?php echo $k?>][nav_title]" class='txt' size='12'>
</td>
                <?php } ?>
                <td><?php $readonly = nav_analysis($v['nav_url']); ?>
                	<?php if($readonly) { ?>
<?php echo $v['nav_url']?>
<?php } else { ?>
<input type="text" value="<?php echo $v['nav_url'];?>" name="nav[<?php echo $k?>][nav_url]" class='txt' size="30">
<?php } ?>
</td>
                <td style="width:80px;">
<input type="text" value="<?php echo $v['nav_style'];?>" name="nav[<?php echo $k?>][nav_style]" class='txt' size='10'>
</td>
               	<td style="width:30px;">
<input type="text" value="<?php echo $v['listorder'];?>" name="nav[<?php echo $k?>][listorder]" class='txt' size='3'>
</td>
                <td class="wraphide">
                	<label><?php if($v['newwindow']) { ?><?php echo $_lang['yes'];?>&nbsp;<?php } else { ?><?php echo $_lang['no'];?><?php } ?></label>
</td>
                <td class="wraphide">
                	<label><?php if(!$v['ishide']) { ?><?php echo $_lang['show'];?><?php } else { ?><?php echo $_lang['hide'];?><?php } ?></label>
                </td>
                <td>
                <a href="<?php echo $url?>&nav_id=<?php echo $v['nav_id']?>&ac=edit" class="button dbl_target"><span class="pen icon"></span><?php echo $_lang['edit'];?></a>
                <a href="<?php echo $url?>&nav_id=<?php echo $v['nav_id']?>&ac=del"  onclick="return cdel(this);" class="button"><span class="trash icon"></span><?php echo $_lang['delete'];?></a>
            	<a href="<?php echo $url?>&nav_style=<?php echo $v['nav_style']?>&ac=set_index" class="button"><span class="check icon"></span><?php echo $_lang['set_index'];?></a>
            </td>
            </tr>
<?php } } ?>
            <tbody id='newitemlist'></tbody>

            <tr>
            	<td colspan="6">
<div class="clearfix">
                  <button onclick="location.href='index.php?do=config&view=nav&ac=edit'" class="positive pill negative" type="button"><span class="plus icon"></span><?php echo $_lang['add'];?></button>
           		  <input type="hidden" name="sbt_edit" value="1">
  <button onclick="modify();" class="positive pill negative" type="button"><span class="check icon"></span>提交更改</button>
           		</div>
</td>
   </tr>
           </table>
   </form>
      </div>
</div>
<!--主体结束-->

    
<script type="text/javascript">
function modify(){
art.dialog.confirm('确定提交更改吗?',function(){
$('#frm_config_basic').submit();
});
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