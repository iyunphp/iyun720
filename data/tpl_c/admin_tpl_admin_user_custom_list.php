<?php keke_tpl_class::checkrefresh('admin/tpl/admin_user_custom_list', '1452173989' );?><!DOCTYPE HTML>
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
    <h1><?php echo $_lang['kf_manage'];?></h1>
    <div class="tool">
        <a href="index.php?do=user&view=custom_list" class="here"><?php echo $_lang['kf_list'];?></a>
        <a href="index.php?do=user&view=custom_add"><?php echo $_lang['add_new_kf'];?></a>
    </div>
</div>
<div class="box search p_relative">
    <div class="title">
        <h2><?php echo $_lang['search'];?></h2>
    </div>
    <div class="detail" id="detail">
        <form action="index.php?do=user&view=custom_list" method="post" >
            <input type="hidden" name="do" value="<?php echo $do?>">
<input type="hidden" name="view" value="<?php echo $view?>">
<input type="hidden" name="page" value="<?php echo $page?>">
            <table cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <th>
                            <?php echo $_lang['user'];?> 编号
                        </th>
                        <td>
                            <input type="text" value="<?php echo $w['uid'];?>" name="w[uid]" class="txt" onkeyup="clearstr(this);"/>
                        </td>
                        <th>
                            <?php echo $_lang['username'];?>
                        </th>
                        <td>
                            <input type="text" name='w[username]' value="<?php echo $w['username'];?>" onkeyup="clearspecial(this);" class="txt"/>&nbsp;&nbsp;<?php echo $_lang['search_by_like'];?>
                        </td>
                        <th>
                            &nbsp;
                        </th>
                        <td>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <?php echo $_lang['user_status'];?>
                        </th>
                        <td>
                            <select class="ps vm" name="w[status]" id="catid">
                                <option value="0" <?php if($w['status']=='1') { ?>selected="selected"<?php } ?>> <?php echo $_lang['all'];?></option>
                                <option value="1" <?php if($w['status']=='1') { ?>selected="selected"<?php } ?>> <?php echo $_lang['normal'];?></option>
                                <option value="2" <?php if($w['status']=='2') { ?>selected="selected"<?php } ?>> <?php echo $_lang['disable'];?></option>
                            </select>
                        </td>
                        <th>
                            <?php echo $_lang['result_order'];?>
                        </th>
                        <td>
                            <select name="ord[uid]">
                                <option <?php if($ord['uid']=='desc'  or !isset($ord)) { ?>selected="selected" <?php } ?>  value="desc"><?php echo $_lang['order_id_desc'];?></option>
                                <option <?php if($ord['uid']=='asc') { ?>selected="selected" <?php } ?>  value="asc"><?php echo $_lang['order_id_asc'];?></option>
                            </select>
                        </td>
                        <th>
                            <?php echo $_lang['list_result'];?>
                        </th>
                        <td>
                            <select name="w[page_size]">
                                <option value="10" <?php if($w['page_size']=='10') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>10</option>
                                <option value="20" <?php if($w['page_size']=='20') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>20</option>
                                <option value="30" <?php if($w['page_size']=='30') { ?>selected="selected"<?php } ?>><?php echo $_lang['page_size'];?>30</option>
                            </select>
                            <button class="pill" type="submit" value="<?php echo $_lang['search'];?>" name="sbt_search">
                                <span class="icon magnifier">&nbsp;</span><?php echo $_lang['search'];?>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<!--搜索结束-->
<div class="box list">
    <div class="title">
        <h2><?php echo $_lang['kf_manage'];?></h2>
    </div>
    <div class="detail">
    	<form name="frm_list" id="frm_list" action="index.php?do=user&view=custom_list" method="post" >
    	<div id="ajax_dom"><input type="hidden" name="page" value="<?php echo $page;?>" />
        <table cellpadding="0" cellspacing="0">
            <tr>
            	<th width="15">
            		<input type="checkbox" onclick="checkall();" id="checkbox" name="checkbox"/>UID
            	</th>
               
                <th width="100" class="motif">
                    <?php echo $_lang['username'];?>
                </th>
                <th>
                    <?php echo $_lang['users'];?>
                </th>
                <th>
                    <?php echo $_lang['contact_tel'];?>
                </th>
                <th>
                    E-mail
                </th>
                <th>
                    QQ
                </th>
                <th>
                    <?php echo $_lang['edit'];?>
                </th>
                <th>
                    <?php echo $_lang['delete'];?>
                </th>
            </tr>
            <?php if(is_array($userlist_arr)) { foreach($userlist_arr as $k => $v) { ?>
            <tr class="item">
            	<td>
                   <input type="checkbox" <?php if($admin_info['uid'] == $v['uid']) { ?> disabled="disabled" <?php } ?> name="ckb[]" class="checkbox" value="<?php echo $v['uid'];?>">  <?php echo $v['uid'];?>
                </td>
             
                <td class="motif">
                    <a href="javascript:void(0)"><?php echo $v['username'];?></a>
                </td>
                <td>
                    <?php echo $grouplist_arr[$v['group_id']]['groupname']?>
                </td>
                <td>
                    <?php echo $v['phone'];?>
                </td>
                <td>
                    <?php echo $v['email'];?>
                </td>
                <td>
                    <?php echo $v['qq'];?>
                </td>
                <td>
<?php if($admin_info['uid']!=$v['uid']) { ?>
                    <a class="button dbl_target" href="index.php?do=user&view=custom_add&op=add&edituid=<?php echo $v['uid'];?>&page=<?php echo $page;?>"><span class="pen icon"></span><?php echo $_lang['edit'];?></a>
                
<?php } ?>
</td>
                <td>
                <?php if($admin_info['uid']!=$v['uid']) { ?>
                    <a class="button" href="index.php?do=user&view=custom_list&op=del&delid=<?php echo $v['uid'];?>&page=<?php echo $page;?>" onclick="return cdel(this);">
                    	<span class="trash icon"></span><?php echo $_lang['delete'];?></a>
                    	<?php } ?>
                </td>
            </tr><?php } } ?>
            <tr>
                <td colspan="8">
                    <div class="clearfix">
<label for="checkbox" onclick="checkall(event);"><?php echo $_lang['select_all'];?></label>
<input type="hidden" name="sbt_action" class="sbt_action">
                    <button name="sbt_action" type="submit" value="<?php echo $_lang['mulit_delete'];?>" onclick="return batch_act(this,'frm_list');" class="pill negative">
                        <span class="icon trash"></span><?php echo $_lang['mulit_delete'];?>
                    </button>
                    <a name="sbt_action" value="<?php echo $_lang['add_new_kf'];?> " class="positive pill button" href="index.php?do=user&view=custom_add">
<span class="plus icon"></span><?php echo $_lang['add_new_kf'];?>
                    </a>
                </div>
                </td>
            </tr>
        </table>
<div class="page"><?php echo $pages['page'];?></div>
</div>
</form>
    </div>
</div>
<script type="text/javascript">
    function showpl(){
        $('#sbt_del').show();
        $('#slt_action').show();
    }

function has_selecte(action){
var count = $("#frm_list input:checked:not([id=checkbox])");
var len = count.length;
if(len>0){
return confirm("<?php echo $_lang['confirm'];?>"+action+"<?php echo $_lang['ma'];?>?") 
}else{
alert("<?php echo $_lang['choose_operate_item'];?>");return false;
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