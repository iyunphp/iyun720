<?php keke_tpl_class::checkrefresh('admin/tpl/admin_finance_revenue', '1452504981' );?><?php if($op=='in') { ?>
<!DOCTYPE HTML>
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
    <h1><?php echo $_lang['financial_model'];?></h1>
    <div class="tool">
    	 <a href="index.php?do=<?php echo $do;?>&view=revenue" class="here">财务概况</a>
<a href="index.php?do=<?php echo $do;?>&&view=budget">网站收支</a>
<a href="index.php?do=<?php echo $do;?>&view=all"><?php echo $_lang['flow_record'];?></a>
    <a href="index.php?do=<?php echo $do;?>&view=recharge"><?php echo $_lang['recharge_audit'];?></a>
   <a href="index.php?do=<?php echo $do;?>&view=withdraw"><?php echo $_lang['withdraw_audit'];?></a>
    </div>
</div>
<div class="box search p_relative">
    <div class="title">
        <h2><?php echo $_lang['search'];?></h2>
    </div>
    <div>
        <form action="index.php?do=<?php echo $do;?>&view=<?php echo $view;?>" method="post" id=frm_search name='frm_search'>
        	 <table cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                    	<th width="100"><?php echo $_lang['time_coverage'];?> </th>
<td>
                            <input type="text" value="<?php echo $st;?>" name="st" class="txt"
  onclick="showcalendar(event, this, 0)" limit='required:false;type:date;less:<?php echo $today;?>'
   msg="<?php echo $_lang['time_tips'];?>" msgArea='span_notice' id='start_time'/>~
                            <input type="text" value="<?php echo $ed;?>" name="ed" class="txt"
  onclick="showcalendar(event, this, 0)"  limit='required:false;type:date;less:<?php echo $today;?>;than:start_time'
   msg="<?php echo $_lang['time_tips'];?>" msgArea='span_notice' id='end_time'/>

                             <button class="pill" type="submit" value="<?php echo $_lang['search'];?>" name="sbt_search" onclick="return checkForm(document.getElementById('frm_search'));">
                                <span class="icon magnifier">&nbsp;</span><?php echo $_lang['search'];?>
                              </button>
  <span id='span_notice' style='color:#ff0000'></span>
                        </td>
   </tr>
                  </tbody>
            </table>
        </form>
    </div>
 </div>
<!--搜索结束-->
<div class="box list">
    <div class="title" style="margin-bottom:10px;">
        <h2><?php echo $_lang['fina_overview'];?>(<?php echo $desc;?>)</h2>
    </div>

<div class="tab">
        	<a class="select" href="#" onclick="swaptab('cont','select','','4','1',{mpre:'td_',spre:'tb_',hide:1});" class='select' id='td_cont_1' style="width:23%;"><strong>流水统计</strong> </a>
            <a href="#" onclick="swaptab('cont','select','','4','4',{mpre:'td_',spre:'tb_',hide:1,ajax:1,url:'index.php?do=<?php echo $do;?>&view=<?php echo $view;?>&op=charge&st=<?php echo $st;?>&ed=<?php echo $ed;?>'});" id='td_cont_4' style="width:23%;"><strong>充值总计</strong></a>
<a href="#" onclick="swaptab('cont','select','','4','3',{mpre:'td_',spre:'tb_',hide:1,ajax:1,url:'index.php?do=<?php echo $do;?>&view=<?php echo $view;?>&op=withdraw&st=<?php echo $st;?>&ed=<?php echo $ed;?>'});" id='td_cont_3' style="width:23%;"><strong>提现总计</strong></a>
<a href="#" onclick="swaptab('cont','select','','4','2',{mpre:'td_',spre:'tb_',hide:1,ajax:1,url:'index.php?do=<?php echo $do;?>&view=<?php echo $view;?>&op=profit&st=<?php echo $st;?>&ed=<?php echo $ed;?>'});" id='td_cont_2' style="width:23%;"><strong>网站纯利</strong></a>


    </div>
<div class="tabcon">

<table id='tb_cont_1' class='t_sub clear_l clear_b'>
<thead align="center">
<th> <?php echo $_lang['category'];?> </th>
<th> <?php echo $_lang['detail'];?> </th>
<th> <?php echo $_lang['cash'];?> </th>
<th> <?php echo $_lang['total'];?> </th>
</thead>
<tbody>
<tr>
<td><?php echo $_lang['reward_host'];?></td>
<td>
<?php if($task) { ?>
  <ul>
<?php if(is_array($task)) { foreach($task as $v) { ?>
<li><?php echo $model_list[$v['model_id']]['model_name'];?>(<?php echo $v['count'];?><?php echo $_lang['ci'];?>)</li>
<?php } } ?>
  </ul>
<?php } else { ?>
<?php echo $_lang['no_data'];?>
<?php } ?>
</td>
<td>
<?php if($task) { ?>
  <ul>
<?php $t = 0; ?>
<?php if(is_array($task)) { foreach($task as $v) { ?>
<?php $tc = $v['cash']+$v['credit']; ?>
<?php $t+=$tc; ?>
<li><?php  echo keke_curren_class::output(floatval($tc),-1);  ?></li>
<?php } } ?>
  </ul>
<?php } else { ?>
<?php echo $_lang['no_data'];?>
<?php } ?>
</td>
<td><?php  echo keke_curren_class::output(floatval($t),-1);  ?></td>
</tr>
<tr>
<td><?php echo $_lang['payitem'];?></td>
<td>
<?php $p = $payitem['cash']+$payitem['credit']; ?>
<?php if($p) { ?>
<?php echo $payitem['count'];?><?php echo $_lang['ci'];?>
<?php } else { ?>
<?php echo $_lang['no_data'];?>
<?php } ?>
</td>
<td>
<?php if($p) { ?>
<?php  echo keke_curren_class::output(floatval($p),-1);  ?>
<?php } else { ?>
<?php echo $_lang['no_data'];?>
<?php } ?>
</td>
<td><?php  echo keke_curren_class::output(floatval($p),-1);  ?></td>
</tr>
<tr>
<td><?php echo $_lang['sal_service'];?></td>
<td>
<?php if($service) { ?>
  <ul>
<?php if(is_array($service)) { foreach($service as $v) { ?>

<li><?php echo $model_list[$v['model_id']]['model_name'];?>(<?php echo $v['count'];?><?php echo $_lang['ci'];?>)</li>
<?php } } ?>
  </ul>
<?php } else { ?>
<?php echo $_lang['no_data'];?>
<?php } ?>
</td>
<td>
<?php if($service) { ?>
  <ul>
<?php $s = 0; ?>
<?php if(is_array($service)) { foreach($service as $v) { ?>
<?php $sc = $v['cash']+$v['credit']; ?>
<?php $s+=$sc; ?>
<li><?php  echo keke_curren_class::output(floatval($sc),-1);  ?></li>
<?php } } ?>
  </ul>
<?php } else { ?>
<?php echo $_lang['no_data'];?>
<?php } ?>
</td>
<td><?php  echo keke_curren_class::output(floatval($s),-1);  ?></td>
</tr>

</tbody>

</table>
<div class='tip'><div class='title'><?php echo $desc;?><?php echo $_lang['in_description'];?></div></div>

<table id='tb_cont_2' class='t_sub hidden clear_l clear_b'></table>
<div class='tip hidden'><div class='title'><?php echo $desc;?><?php echo $_lang['profit_description'];?></div></div>

<table id='tb_cont_3' class='t_sub hidden clear_l clear_b'></table>
<div class='tip hidden'><div class='title'><?php echo $desc;?><?php echo $_lang['withdraw_description'];?></div></div>
<table id='tb_cont_4' class='t_sub hidden clear_l clear_b'></table>
<div class='tip hidden'><div class='title'><?php echo $desc;?><?php echo $_lang['charge_description'];?></div></div>

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
<?php } elseif($op=='profit') { ?>
<thead align="center">
<th> <?php echo $_lang['from'];?> </th>
<th> <?php echo $_lang['cash'];?> </th>
</thead>
<tbody>
<tr>
<td >任务佣金</td>
<td ><?php  echo keke_curren_class::output(floatval($task),-1);  ?></td>
</tr>
<tr>
<td >作品抽成</td>
<td><?php  echo keke_curren_class::output(floatval($service),-1);  ?></td>
</tr>
<tr>
<td ><?php echo $_lang['payitem'];?></td>
<td><?php  echo keke_curren_class::output(floatval($payitem),-1);  ?></td>
</tr>
<tr>
<td ><?php echo $_lang['user_auth'];?></td>
<td><?php  echo keke_curren_class::output(floatval($auth),-1);  ?></td>
</tr>
<tr>
<td ><?php echo $_lang['user_withdraw'];?></td>
<td><?php  echo keke_curren_class::output(floatval($withdraw),-1);  ?></td>
</tr>

</tbody>
<tfoot>
<tr>
<td></td>
<td ><strong><?php echo $_lang['total'];?></strong> <strong style="color:red"> <?php  echo keke_curren_class::output(floatval($p_all),-1);  ?></strong></td>
</tr>
</tfoot>
<?php } elseif($op=='withdraw') { ?>
<thead align="center">
<th> <?php echo $_lang['category'];?> </th>
<th> <?php echo $_lang['cash'];?> </th>
<th> <?php echo $_lang['profit'];?> </th>
</thead>
<tbody>
<tr>
<td ><?php echo $_lang['third_party'];?></td>
<td>
<ul>
<?php $w_c=0; ?>
<?php if(sizeof($list)>0) { ?>
<?php if(is_array($pay_online)) { foreach($pay_online as $k => $v) { ?>
  <?php if($list[$k]) { ?>
<?php $w_c+=$list[$k]['cash']; ?>
<li>
<?php echo $v['pay_name'];?>
(<?php echo intval($list[$k]['count']) ?>
<?php echo $_lang['ci'];?>)<?php echo $_lang['zh_mh'];?><?php  echo keke_curren_class::output(floatval($list[$k]['cash']),-1);  ?>
</li>
   <?php } ?>
<?php } } ?>
<?php } else { ?>
<?php echo $_lang['no_data'];?>
<?php } ?>
</ul>
</td>
<td>
<ul>
<?php $w_f=0; ?>
<?php if(sizeof($list)>0) { ?>
<?php if(is_array($pay_online)) { foreach($pay_online as $k => $v) { ?>
  <?php if($list[$k]) { ?>
<?php $w_f+=$list[$k]['fee']; ?>
<li>
<?php  echo keke_curren_class::output(floatval($list[$k]['fee']),-1);  ?>
</li>
   <?php } ?>
<?php } } ?>
<?php } else { ?>
<?php echo $_lang['no_data'];?>
<?php } ?>
</ul>
</td>
</tr>
<tr>
<td ><?php echo $_lang['offline_bank'];?></td>
<td>
<ul>
<?php if(sizeof($list)>0) { ?>
<?php if(is_array($bank_arr)) { foreach($bank_arr as $k => $v) { ?>
  <?php if($list[$k]) { ?>
<?php $w_c+=$list[$k]['cash']; ?>
<li>
<?php echo $v;?>
(<?php echo intval($list[$k]['count']) ?>
<?php echo $_lang['ci'];?>)<?php echo $_lang['zh_mh'];?><?php  echo keke_curren_class::output(floatval($list[$k]['cash']),-1);  ?>
</li>
   <?php } ?>
<?php } } ?>
<?php } else { ?>
<?php echo $_lang['no_data'];?>
<?php } ?>
</ul>
</td>
<td>
<ul>
<?php if(sizeof($list)>0) { ?>
<?php if(is_array($bank_arr)) { foreach($bank_arr as $k => $v) { ?>
  <?php if($list[$k]) { ?>
<?php $w_f+=$list[$k]['fee']; ?>
<li>
<?php  echo keke_curren_class::output(floatval($list[$k]['fee']),-1);  ?>
</li>
   <?php } ?>
<?php } } ?>
<?php } else { ?>
<?php echo $_lang['no_data'];?>
<?php } ?>
</ul>
</td>
</tr>
</tbody>
<tfoot>
<tr>
<td><strong><?php echo $_lang['total'];?></strong></td>
<td><strong style="color:red"><?php  echo keke_curren_class::output(floatval($w_c),-1);  ?></strong></td>
<td ><strong style="color:red"><?php  echo keke_curren_class::output(floatval($w_f),-1);  ?></strong></td>
</tr>
</tfoot>
<?php } elseif($op=='charge') { ?>
<thead align="center">
<th> <?php echo $_lang['charge_type'];?> </th>
<th> <?php echo $_lang['charge_ci'];?>(<?php echo $_lang['ci'];?>) </th>
<th> <?php echo $_lang['charge_cash'];?> </th>
</thead>
<tbody>
<?php $d = 0; ?>
<?php if(is_array($fina_type)) { foreach($fina_type as $k => $v) { ?>
<tr>
<td><?php echo $v;?></td>
<td>
<?php if($charge[$k]['count']) { ?><?php echo $charge[$k]['count'];?><?php } else { ?><?php echo $_lang['no_data'];?><?php } ?>
</td>
<td>
<?php $ca = $charge[$k]['cash']; ?>
<?php $d+=abs($ca); ?>
<?php if($ca) { ?><?php  echo keke_curren_class::output(floatval($ca),-1);  ?><?php } else { ?><?php echo $_lang['no_data'];?><?php } ?>
</td>
</td>
</tr>
<?php } } ?>
</tbody>
<tfoot>
<tr>
<td><strong><?php echo $_lang['total'];?></strong></td>
<td colspan=2><strong style="color:red"><?php  echo keke_curren_class::output(floatval($d),-1);  ?></strong></td>
</tr>
</tfoot>
<?php } ?><?php keke_tpl_class::ob_out();?>