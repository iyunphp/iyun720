<?php keke_tpl_class::checkrefresh('admin/tpl/admin_config_integration', '1452225787' );?><!DOCTYPE HTML>
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

<div class="box tip clearfix p_relative" id="msg_box">
<div class="control"><a href="javascript:void(0);" title="<?php echo $_lang['close'];?>" id="toggle"><b>△</b></a></div>
    <div class="title"><h2><?php echo $_lang['how_to_use'];?><?php echo $_lang['zh_mh'];?></h2></div>
    <div class="detail pad10">
        <ul>
            <li><?php echo $_lang['if_need_integrate_other_system'];?></li>
            <li><?php echo $_lang['if_need_integrate_exchange_system'];?></li>
<li><?php echo $_lang['if_dont_need_can_uninstall'];?></li>
        </ul>
    </div>
</div>


<div class="box list">
<div class="title"><h2><?php echo $_lang['uc_user_integrate'];?></h2></div>
    <div class="detail">
    	 <table cellspacing="0" cellpadding="0">
    	 <tbody>
    	 	
          <tr>
            <th width="30%"><?php echo $_lang['uc_name'];?></th>
            <th width="20%"><?php echo $_lang['uc_version'];?></th>
            <th width="30%"><?php echo $_lang['uc_author'];?></th>
            <th><?php echo $_lang['operate'];?></th>
          </tr>
  
          <tr>
            <td><?php if($basic_config['user_intergration']==2) { ?>
            	<b class='c396'>Ucenter(<?php echo $_lang['steps_has_been_install'];?>)</b><?php } else { ?>Ucenter<?php } ?>
            </td>
            <td>1.5/1.6</td>
            <td><a href="javascript:;"><?php echo $_lang['keke_official_website'];?></a></td>
            	<td>
            	
            	<?php if($basic_config['user_intergration']==2) { ?>
            	<a href="index.php?do=config&view=integration&setting=del&by=2"  class="button">
            	<span class="trash icon"></span><?php echo $_lang['close'];?>
            	</a>
 <a href="index.php?do=config&view=integration&type=uc" class="button">
            	<span class="reload  icon"></span><?php echo $_lang['config'];?></a> 
<?php } else { ?>
 <a href="index.php?do=config&view=integration&type=uc" class="button">
            	<span class="cog icon"></span><?php echo $_lang['open'];?></a> 
            	<?php } ?>
            	</td>
          </tr>
  
 <!--         <tr>
            <td><?php if($basic_config['user_intergration']==3) { ?><b class='c396'>PhpWind(<?php echo $_lang['steps_has_been_install'];?>)</b><?php } else { ?>phpWind<?php } ?></td>
            <td><?php echo $_lang['up_8'];?></td>
            <td><a href="javascript:;"><?php echo $_lang['keke_official_website'];?></a></td>
            <td> 
            <?php if($basic_config['user_intergration']==3) { ?>
            	<a href="index.php?do=config&view=integration&setting=del&by=3"  class="button">
            		<span class="trash icon"></span><?php echo $_lang['close'];?></a>
 <a href="index.php?do=config&view=integration&type=uc" class="button">
            	<span class="reload  icon"></span><?php echo $_lang['config'];?></a> 
<?php } else { ?>
<a href="index.php?do=config&view=integration&type=pw" class="button">
<span class="cog icon"></span><?php echo $_lang['open'];?></a>	
            <?php } ?>
            </td>
          </tr> -->
  
  </tbody>
        </table>
    </div>
</div>

<script src="js/css.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
$("#toggle").add(".title").click(function(){
$("#msg_box").children().not($(".control,.title")).slideToggle('800');
var v=$(this).text();
if(v=="▽") $(this).html("<b>△</b>").andSelf().attr("title","<?php echo $_lang['close'];?>");
if(v=="△") $(this).html("<b>▽</b>").andSelf().attr("title","<?php echo $_lang['open'];?>");
});
})
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