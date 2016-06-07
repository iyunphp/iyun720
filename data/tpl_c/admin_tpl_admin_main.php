<?php keke_tpl_class::checkrefresh('admin/tpl/admin_main', '1455866004' );?><!DOCTYPE HTML>
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
<!--
<div class="po_ab fixed-right adv ">
<a href="#"><?php echo $_lang['ad_leasing'];?>w150xh90</a>
</div>
-->
<div class="page_title clearfix">
    <h1><?php echo $_lang['manage_index'];?></h1>
    <div class="tool">
    </div>
</div>
<!--<div class="box tip clearfix p_relative" id="man_tips">
    <div class="control">
        <a href="javascript:void(0);" onclick="$('#man_tips').fadeOut();" title="<?php echo $_lang['close'];?>"><b>&times;</b></a>
    </div>
    <div class="title">
        <h2><?php echo $_lang['safe_report'];?></h2>
    </div>
    <div class="detail pad10">
        <ul>
            <li>
                <?php echo $_lang['suggest_rename_notice'];?>
            </li>
            <li>
                <?php echo $_lang['suggest_hide_notice'];?>
            </li>
        </ul>
    </div>
</div>-->
<div class="box user_quick clearfix">
    <div class="detail pad10">
        <ul>
            <li class="avatar">
                <a href="#" title="admin"><?php echo  keke_user_class::get_user_pic($admin_info['uid'],'small') ?></a>
            </li>
            <li class="name">
                <span><?php echo $_lang['good_morning'];?></span>，<?php echo $_lang['public_admin_uid'];?><b><?php echo $admin_info['username'];?></b>
                <span class="clock"> - <?php echo $_lang['today_is'];?><span id="date"><?php if(time()){echo date('Y-m-d H:i:s',time()); } ?></span></span>
            </li>
            <li class="statistics clearfix">
                <ul>
                    <li>
                        <a href="index.php?do=user&view=list" class="button"><span class="icon check">&nbsp;</span><?php echo $_lang['new_member'];?>(<?php echo $user_count?>)</a>
                    </li>
                    <li>
                    	<select id="task_add" onchange="jump_list(this.value);">
                    		<option id="task_add_option">新增任务(<?php echo $task_all_count;?>)</option>
<?php if(is_array($model_list)) { foreach($model_list as $k => $v) { ?>
                    		<option value="<?php echo $k;?>" ><?php echo $v['model_name']?>(<?php if($task_count[$k]['count']) { ?><?php echo $task_count[$k]['count'];?><?php } else { ?>0<?php } ?>)</option>
<?php } } ?>

                    	</select>
                    </li>
<li>
                        <a href="index.php?do=store&view=list" class="button"><span class="icon book">&nbsp;</span>店铺申请(<?php echo $apply_shop_count;?>)</a>
                    </li>
<li>
<select id="service_add" onchange="jump_list(this.value);">
                    		<option id="service_add_option" value="0">新增作品(<?php echo $shop_all_count;?>)</option>
<?php if(is_array($shop_list)) { foreach($shop_list as $k => $v) { ?>
                    		<option value="<?php echo $k;?>" ><?php echo $v['model_name']?>(<?php if($shop_count[$k]['count']) { ?><?php echo $shop_count[$k]['count'];?><?php } else { ?>0<?php } ?>)</option>
<?php } } ?>
<?php if(is_array($shop_list)) { foreach($shop_list as $k => $v) { ?>
                    		<option value="<?php echo $k;?>" ><?php echo $v['model_name']?>待审(<?php if($shop_count_dai[$k]['count']) { ?><?php echo $shop_count_dai[$k]['count'];?><?php } else { ?>0<?php } ?>)</option>
<?php } } ?>
<?php if(is_array($shop_list)) { foreach($shop_list as $k => $v) { ?>
                    		<option value="<?php echo $k;?>" ><?php echo $v['model_name']?>编辑待审(<?php if($shop_count_edit[$k]['count']) { ?><?php echo $shop_count_edit[$k]['count'];?><?php } else { ?>0<?php } ?>)</option>
<?php } } ?>

                    	</select>
                    </li>
                    <li>
                        <a href="index.php?do=finance&view=withdraw" class="button"><span class="icon home">&nbsp;</span><?php echo $_lang['withdraw_apply'];?>(<?php echo $withdraw_count?>)</a>
                    </li>
                    <li>
                        <a href="index.php?do=finance&view=recharge" class="button"><span class="icon rss">&nbsp;</span><?php echo $_lang['user_recharge'];?>(<?php echo $charge_count?>)</a>
                    </li>
                    <li>
                        <a href="index.php?do=user&view=suggest" class="button"><span class="icon mail">&nbsp;</span>建议(<?php echo $proposal_count?>)</a>
                    </li>
<li>
                        <a href="index.php?do=trans&view=report" class="button"><span class="icon mail">&nbsp;</span>举报(<?php echo $report_count?>)</a>
                    </li>
<li>
                        <a href="index.php?do=trans&view=rights" class="button"><span class="icon mail">&nbsp;</span>维权(<?php echo $right_count?>)</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>



<style type="text/css">
.hide{
display:none;
}
</style>
<script type="text/javascript" src="<?php echo $notice?>" charset="gbk">
</script>
<script type="text/javascript">
$(function(){
$("#task_add_option").addClass("hide");
$("#service_add_option").addClass("hide");
})
function jump_list(model_id){
if(model_id ==  '6' ||model_id ==  '7'  ){
window.location.href = 'index.php?do=model&model_id='+model_id+'&view=list';
}else{
window.location.href = 'index.php?do=model&model_id='+model_id+'&view=list';
}
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