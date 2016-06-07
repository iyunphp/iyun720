<?php keke_tpl_class::checkrefresh('admin/tpl/admin_prom_config', '1452251333' );?><!DOCTYPE HTML>
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
    <h1><?php echo $_lang['prom_config_manage'];?></h1>
    <div class="tool">
        <a <?php if($op=="config"||!$op) { ?>class="here"<?php } ?> href="index.php?do=<?php echo $do?>&view=<?php echo $view?>&op=config"><?php echo $_lang['register_prom'];?></a>
        <a <?php if($op=="pub_task") { ?>class="here"<?php } ?> href="index.php?do=<?php echo $do?>&view=<?php echo $view?>&op=pub_task"><?php echo $_lang['task_prom'];?></a>
        <a <?php if($op=="bid_task") { ?>class="here"<?php } ?> href="index.php?do=<?php echo $do?>&view=<?php echo $view?>&op=bid_task"><?php echo $_lang['bid_prom'];?></a>
        <a <?php if($op=="service") { ?>class="here"<?php } ?> href="index.php?do=<?php echo $do?>&view=<?php echo $view?>&op=service"><?php echo $_lang['goods_prom'];?></a>
    </div>
</div> 
<?php if($op=='config'||!$op) { ?>
<div>
    <div class="box tip clearfix p_relative">
        <div class="control">
            <a href="javascript:void(0);" title="<?php echo $_lang['close'];?>"><b>&times;</b></a>
        </div>
        <div class="title">
            <h2><?php echo $_lang['tips'];?></h2>
        </div>
        <div class="detail pad10">
            <ul>
            	<li><?php echo $_lang['prom_config_notice'];?><?php echo $_lang['zh_jh'];?></li>
<li><?php echo $_lang['register_prom_must_one_auth'];?><?php echo $_lang['zh_jh'];?></li>
</ul>
        </div>
    </div>
    <div class="box post">
        <div class="tabcon">
            <div class="title">
                <h2><?php echo $_lang['register_prom'];?></h2>
            </div>
            <div class="detail">
                <form name="frm_config_basic" id="frm_config_basic" action="<?php echo $url;?>" method="post">
                    <input type="hidden" name="op" value="<?php echo $op;?>">
                    <input type="hidden" name="prom_id" value="<?php echo $reg_config['prom_id'];?>">
<input type="hidden" name="open_status" value="<?php echo $reg_config['is_open'];?>"><!-- 开启状态 -->
<div class="gut">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr><th scope="row">
                                    <?php echo $_lang['is_open_global_prom'];?><?php echo $_lang['zh_mh'];?>
                                </th><td>
                                 
                        	       <label for="prom_open"><input type="radio" id="prom_open"  name="prom_reg_is_open" value='1' <?php if($global_config['prom_open']['v']==1) { ?>checked="checked"<?php } ?>><?php echo $_lang['open_prom'];?></label>
                                   <label for="prom_close"><input type="radio" id="prom_close" name="prom_reg_is_open" value='0' <?php if($global_config['prom_open']['v']==0) { ?>checked="checked"<?php } ?>><?php echo $_lang['closed_prom'];?></label>
                                   (<?php echo $_lang['this_set_global_effective'];?>)
                                </td></tr>
                            <tr>
                            	<th scope="row"><?php echo $_lang['prom_period'];?><?php echo $_lang['zh_mh'];?></th>
                            		<td><input type="text" name="prom_period" class="txt" size="5" value="<?php echo $global_config['prom_period']['v'];?>" /><?php echo $_lang['day'];?>  (<?php echo $_lang['prom_upline_proift_notice'];?>)</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                  <?php echo $_lang['prom_reward'];?><?php echo $_lang['zh_mh'];?>
                                </th>
                                <td>
                                	<p id="effect_mode"><!-- 生效模式 -->
                                    	<?php echo $_lang['register_and_pass'];?>
<?php if(is_array($auth_info)) { foreach($auth_info as $k => $v) { ?>
<input type="checkbox" name="auth[]" value="<?php echo $k;?>"
<?php if(is_array($reg_mode['auth'])) { foreach($reg_mode['auth'] as $kk => $vv) { ?>
<?php if($vv==$k) { ?>
checked="checked"
<?php } ?>
<?php } } ?>
><?php echo $v['prom_item'];?>
<?php } } ?>
<?php echo $_lang['after_auth_promoter_will_get'];?>
                                    	<input type="text" size=5 name="prom_cash" class="txt" id="prom_cash" value="<?php echo $reg_config['cash'];?>"><?php echo $_lang['yuan_cash'];?>
</p>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    &nbsp;
                                </th>
                                <td>
                                    <button type="submit" name="sbt_edit" class="positive pill primary  button" value="<?php echo $_lang['submit'];?>"><span class="icon check"></span>
                                        <?php echo $_lang['submit'];?>
                                    </button>
                                  
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
<?php } else { ?>
    <div>
        <div class="box tip clearfix p_relative">
            <div class="control">
                <a href="javascript:void(0);" title="<?php echo $_lang['close'];?>"><b>&times;</b></a>
            </div>
            <div class="title">
                <h2><?php echo $_lang['tips'];?></h2>
            </div>
            <div class="detail pad10">
                <ul>
                    <li>
                    	<?php if($op=='pub_task') { ?>
                     	   <?php echo $_lang['task_prom_notice'];?><?php echo $_lang['zh_jh'];?>
<?php } elseif($op=='bid_task') { ?>
<?php echo $_lang['bid_prom_notice'];?>
<?php } elseif($op=='service') { ?>
<?php echo $_lang['goods_prom_notice'];?>
<?php } ?>
                    </li>
                </ul>
            </div>
        </div>
  <div class="box post">
    <div class="tabcon">
      <div class="title">
        <h2>
           <?php if($op=='pub_task') { ?>
<?php echo $_lang['task_prom'];?>
   <?php } elseif($op=='bid_task') { ?>
<?php echo $_lang['bid_prom'];?>
  <?php } elseif($op=='service') { ?>
<?php echo $_lang['goods_prom'];?>
  <?php } ?>
</h2>
      </div>
      <div class="detail">
       <form name="frm_config_basic" id="frm_config_basic" action="<?php echo $url;?>" method="post">
         <input type="hidden" name="op" value="<?php echo $op;?>">
            <div class="gut">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                    <th><font style="text-align:right"><?php echo $_lang['specified_task_model'];?></font></th>
                       <td>只有指定模型下的推广才能生效<br/>
                         <?php if(is_array($model_info)) { foreach($model_info as $k => $v) { ?>
<?php if($v['model_type']==$model_type) { ?>
<label for="model_<?php echo $k;?>">
<input type="checkbox" id="model_<?php echo $k;?>" name="ckb_model[]" value="<?php echo $v['model_id']?>" <?php if(in_array($v['model_id'],$config_model)) { ?>checked="checked"<?php } ?>>
                            		<?php echo $_lang['limit'];?><?php echo $v['model_name'];?>
</label><br>
<?php } ?>
                         <?php } } ?>
                       </td>
</tr>
           <?php if($op=='pub_task') { ?>
<tr>
<th><font><?php echo $_lang['task_release_prommoter_proift'];?></font></th>
<td>
<?php echo $_lang['task_release_prom_profit_model'];?><br/>
<label id="pub_task_rake_type">
<input type="radio" id="pub_task_rake_type"  name="pub_task_rake_type" value="1" <?php if($prom_config['pub_task_rake_type']==1) { ?>checked="checked"<?php } ?>><?php echo $_lang['according_to_fixed_money'];?></label><font color="red"><?php echo $_lang['according_to_task_reward_rate_tip'];?></font>
<div id="pub_task_rake_type_child">
<input type="text" size="5" class="txt" name="pub_task_cash" id="pub_task_cash" value="<?php echo $prom_config['cash'];?>" /><?php echo $_lang['cash'];?>
    </div>

<label id="rake_type2"><input type="radio" id="rake_type2" name="pub_task_rake_type" value="2" <?php if($prom_config['pub_task_rake_type']==2) { ?>checked="checked"<?php } ?>><?php echo $_lang['according_to_task_reward_rate'];?></label><br/>
<input type="text" size="5" class="txt" name="pub_task_rate" id="pub_task_rate" value="<?php echo $prom_config['rate'];?>">%
   </td>
</tr>
   <?php } elseif($op=='bid_task') { ?>
<tr><th><font><?php echo $_lang['undertake_task_prom_proift'];?></font></th>
<td>
<input type="text" size="5" class="txt" name="bid_task_rake" id="bid_task_rake" value="<?php echo $prom_config['rate'];?>" />%
(<?php echo $_lang['from_withdraw_to_promoter_rate'];?>)
</td>
</tr>
  <?php } elseif($op=='service') { ?>
 <tr>
                    <th scope="row">
                       <?php echo $_lang['goods_prom_proift'];?>
                    </th>
                    <td>
                        <input type="text" size="15" class="txt" name="service_rate" value="<?php echo $prom_config['rate'];?>" maxlength="5" />%
                          (<?php echo $_lang['website_withdraw_to_promoter_notice'];?>)
                    </td>
               </tr>
  <?php } ?>
                <tr>
                   <th scope="row"> &nbsp;</th>
                  <td>
                     <button type="submit" name="sbt_edit" class="positive primary pill button"><span class="icon check"></span>
                        <?php echo $_lang['submit'];?>
                    </button>
                  </td>
                </tr>
             </table>
           </div>
        </form>
      </div>
   </div>
  </div>
 </div>
<?php } ?>	 
 <script type="text/javascript">
<!--
$(function(){
$(".control").add(".title").click(function(){
$(".tip").children().not($(".control,.title")).slideToggle('200');
});
})

//-->
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