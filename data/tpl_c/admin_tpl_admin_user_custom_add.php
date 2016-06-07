<?php keke_tpl_class::checkrefresh('admin/tpl/admin_user_custom_add', '1452665926' );?><!DOCTYPE HTML>
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
    <h1><?php echo $_lang['rights_set'];?></h1>
    <div class="tool">
  		<a href="index.php?do=user&view=custom_list" <?php if($view=='custom_list') { ?> class="here" <?php } ?>><?php echo $_lang['customer_service_manage'];?></a>
        <a href="index.php?do=user&view=custom_add" <?php if($view=='custom_add') { ?> class="here" <?php } ?> ><?php echo $_lang['add_customer_service'];?></a>
    </div>
</div>
<div class="box post">
    <div class="title">
        <h2><?php echo $_lang['set_rights'];?></h2>
    </div>
    <div class="detail">
        <form action="index.php?do=user&op=add&view=custom_add&edituid=<?php echo $edituid;?>" method="post" id="userCustonAdd">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
                 <th scope="row" width="70">
                    <span class="bg1 t_r"><?php echo $_lang['user'];?>ID<?php echo $_lang['zh_mh'];?></span>
                 </th>
                 <td>
                 	<input type="text" name="fds[uid]" value="<?php echo $edituid?>"  id="uid"  style="width:260px;" limit="required:true;len:1-10" msg="请输入用户编号1-10位" msgArea="txt_uid_msg" class="txt"><b style="color:red"> *</b><span id="txt_uid_msg"></span>
 
 </td>
             </tr>
 <tr>
                <th  scope="row" width="70">
                    <?php echo $_lang['username'];?><?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <input type="text" name="fds[username]" id="username" value="<?php echo $spaceinfo['username'];?>" style="width:260px;" limit="required:true;len:2-20" msg="请输入用户昵称2-10位" msgArea="txt_username_msg" class="txt"><b style="color:red"> *</b><span id="txt_username_msg"></span>
                </td>
            </tr>

<tr>
                <th  scope="row">
                    <?php echo $_lang['contact_tel'];?><?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <input type="text" name="fds[phone]"  id="phone" style="width:260px;"  value="<?php echo $spaceinfo['phone'];?>" class="txt" limit="type:tel" msg="<?php echo $_lang['format_error'];?>" title="<?php echo $_lang['please_input_right_phone'];?>" msgArea="txt_phone_msg"><span id="txt_phone_msg"></span>
                </td>
            </tr>
<tr>
                <th  scope="row">
                    E-mail<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                	<input type="text" class="txt" style="width:260px;" name="fds[email]" id="email"limit="type:email" value="<?php echo $spaceinfo['email'];?>" msg="<?php echo $_lang['format_error'];?>" title="<?php echo $_lang['please_input_right_email'];?>" msgArea="txt_email_msg" /><span id="txt_email_msg"></span>
                    
                </td>
            </tr>
<tr>
                <th  scope="row">
                   QQ<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
<input type="text" name="fds[qq]" id="qq" style="width:260px;" value="<?php echo $spaceinfo['qq'];?>" class="txt">
                </td>
            </tr>
    <tr>
                <th  scope="row">
                   <?php echo $_lang['user_group'];?><?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                     <select name="fds[group_id]" id="group_id">
  	 <option value="0" <?php if($spaceinfo['group_id']<0) { ?> selected="selected"<?php } ?>><?php echo $_lang['normal_member_group'];?></option>
   <?php if(is_array($member_group_arr)) { foreach($member_group_arr as $k => $v) { ?>
  	 <option value="<?php echo $v['group_id'];?>" <?php if($spaceinfo['group_id']== $v['group_id']) { ?>selected="selected"<?php } ?>><?php echo $v['groupname']?></option>
   <?php } } ?>
   </select><b style="color:red">*</b>
                </td>
            </tr>
              
                <tr>
                    <th scope="row">
                        &nbsp;
                    </th>
                    <td>
                        <div class="clearfix padt10">
                        	<input type="hidden" name="is_submit" value="1"/>

                            <button class="positive primary pill button" type="submit" onclick="return checkForm(document.getElementById('userCustonAdd'));" name="sbt_edit" value="<?php echo $_lang['submit'];?>">
                                <span class="check icon"></span><?php echo $_lang['submit'];?>
                            </button>
                          
                        </div>
                    </td>
                </tr>
            </table>
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
</html><?php keke_tpl_class::ob_out();?>