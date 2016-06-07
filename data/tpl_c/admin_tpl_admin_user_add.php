<?php keke_tpl_class::checkrefresh('admin/tpl/admin_user_add', '1452670460' );?><!DOCTYPE HTML>
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
    	<h1><?php echo $_lang['user_manage'];?></h1>
        <div class="tool">
            <a href="index.php?do=user&view=list" ><?php echo $_lang['user_manage'];?></a>
            <a href="index.php?do=user&view=add" class="here"><?php if($edituid) { ?><?php echo $_lang['edit'];?><?php } else { ?><?php echo $_lang['add'];?><?php } ?><?php echo $_lang['user'];?></a>
    	    <a href="index.php?do=user&view=charge"><?php echo $_lang['charge'];?></a>
    	</div>
    </div>
<div class="box post">
        <div class="tabcon">
        	<div class="title"><h2><?php if($edituid) { ?><?php echo $_lang['edit_member_info'];?><?php } else { ?><?php echo $_lang['add_member_info'];?><?php } ?></h2></div>
            <div class="detail">
               <form action="index.php?do=user&view=add&edituid=<?php echo $edituid?>" method="post" name="frm_add" id="frm_add">
                    <input type="hidden" value="<?php echo $edituid;?>" name="edituid">
<input type="hidden" name="max" id="max" value="<?php echo date('Y-m-d',time()-15*365*24*3600) ?>">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tbody>
                      <tr>
                        <th scope="row" width="130">用户昵称<?php echo $_lang['zh_mh'];?></th>
                        <td>
                       <input type="text" class="txt" style=" width:260px;" <?php if($edituid) { ?>disabled="disabled" ignore="true"<?php } ?> value="<?php echo $member_arr['username'];?>" name="fds[username]" id="txt_username" maxlength="50" title="<?php echo $_lang['please_input_limit_char_username'];?>" limit="required:true;len:2-20" msg="<?php echo $_lang['please_input_limit_char_username'];?>" ajax="../index.php?do=register&check_username=" msgArea="txt_username_msg" valid="1"/><b style="color:red"> *</b><span id="txt_username_msg"></span>

  </td>
                      </tr>

  <tr>
                        <th scope="row">真实姓名<?php echo $_lang['zh_mh'];?></th>
                        <td> <input type="text" class="txt" style="width:260px;" name="fds[truename]" id="truename" value="<?php echo $member_arr['truename'];?>" limit="required:false;len:2-20" title="<?php echo $_lang['please_input_limit_char_username'];?>" msg="<?php echo $_lang['please_input_limit_char_username'];?>" msgArea="pwd_truename_msg"  class="input_t"/><span id="pwd_truename_msg"></span>
</td>
                      </tr>

  <tr>
                        <th scope="row">手机号码<?php echo $_lang['zh_mh'];?></th>
                        <td> <input type="text" class="txt" style="width:260px;" name="fds[mobile]" id="mobile" value="<?php echo $member_arr['mobile'];?>" limit="required:false;type:mobileCn" title="请填写正确的手机号码" msg="请填写正确的手机号码" msgArea="pwd_tel_msg"  class="input_t"/><span id="pwd_tel_msg"></span>
</td>
                      </tr>

   <tr>
                        <th scope="row">QQ号码<?php echo $_lang['zh_mh'];?></th>
                        <td> <input type="text" class="txt" style="width:260px;" name="fds[qq]" id="qq"  value="<?php echo $member_arr['qq'];?>" limit="required:false;type:int;len:5-13" title="请填写正确的QQ号码"  onkeyup="clearstr(this);" msg="请填写正确的QQ号码" msgArea="pwd_QQ_msg"  class="input_t"/><span id="pwd_QQ_msg"></span>
</td>
                      </tr>

  <tr>
                        <th scope="row">所属行业<?php echo $_lang['zh_mh'];?></th>
                        <td> <select class="form-control" name="fds[indus_pid]" id="indus_pid" onchange="getIndustry(this.value,'indus_id')">
                             <option value="">请选择父行业</option>
                             <?php if(is_array($arrTopIndustrys)) { foreach($arrTopIndustrys as $v) { ?>
                     	     <option value="<?php echo $v['indus_id'];?>" <?php if($member_arr['indus_pid'] ==$v['indus_id']) { ?> selected="selected"<?php } ?>><?php echo $v['indus_name'];?></option>
                             <?php } } ?>
                             </select>

                             <select class="form-control" name="fds[indus_id]" id="indus_id">
                             <option value="">请选择子行业</option>
  <?php if($member_arr['indus_id']) { ?>
                             <?php if(is_array($arrAllIndustrys)) { foreach($arrAllIndustrys as $v) { ?>
 <option value="<?php echo $v['indus_id'];?>" <?php if($member_arr['indus_id'] ==$v['indus_id']) { ?> selected="selected"<?php } ?>><?php echo $v['indus_name'];?></option>
 <?php } } ?>
 <?php } ?>
                             </select>
</td>
                      </tr>

  <tr>
                        <th scope="row">出生日期<?php echo $_lang['zh_mh'];?></th>
                        <td> <input name="fds[birthday]" onclick="showcalendar(event, this, 0)" size="30" name="fds[birthday]" id="birthday" title="出生日期不得大于<?php echo date('Y-m-d',time()-15*365*24*3600) ?>"
 												 limit="required:false;type:date;less:max" msg="错误的生日格式" value="<?php echo $member_arr['birthday'];?>" type="text" msgArea="span_birthday" onkeyup="clearstr(this)"   class="txt" style="width:260px;"/>
            <span id="span_birthday" class="ml_5"></span>
</td>
                      </tr>

  <tr>
                        <th scope="row"><?php echo $_lang['password'];?><?php echo $_lang['zh_mh'];?></th>
                        <td> <input type="password" class="txt" style="width:260px;" name="fds[password]" id="password"limit="<?php if(!$edituid) { ?>required:true;len:6-20<?php } else { ?>len:6-20<?php } ?>" title="<?php echo $_lang['please_input_password'];?>..." msg="<?php echo $_lang['password_limit'];?>" msgArea="pwd_pwd_msg"  class="input_t"/><?php if(!$edituid) { ?><b style="color:red">*</b><?php } ?><span id="pwd_pwd_msg"></span>
                        <span>(提示：更改此密码不会修改用户的支付密码)</span>
</td>
                      </tr>

  <tr>
                       <th scope="row"><?php echo $_lang['email'];?><?php echo $_lang['zh_mh'];?></th>
                        <td> <input type="text" class="txt" style="width:260px;" name="fds[email]" id="email"limit="required:true;type:email" value="<?php echo $member_arr['email'];?>" msg="<?php echo $_lang['format_error'];?>" title="<?php echo $_lang['please_input_right_email'];?>..."  ajax="index.php?do=user&view=add&check_email="  msgArea="txt_email_msg"/><b style="color:red"> *</b><span id="txt_email_msg"></span></td>
                      </tr>
  <?php if($edituid&&$shop_open) { ?>
 					   <tr>
                        <th scope="row"><?php echo $_lang['is_recommend'];?><?php echo $_lang['zh_mh'];?></th>
                        <td>
                          <p>

                           <label for="rdo_0">
                              <input type="radio" name="fds[recommend]" id="rdo_0" value="1"  <?php if($member_arr['recommend']==1) { ?>checked=checked<?php } ?>>
  <?php echo $_lang['yes'];?></label>
                            <label for="rdo_1">
                              <input type="radio" name="fds[recommend]" id="rdo_1" value="0" <?php if(!$member_arr['recommend']) { ?>checked=checked<?php } ?>>
   <?php echo $_lang['no'];?></label>
                            <br/>
                        </p></td>
                      </tr>
  <tr>
                        <th scope="row"><?php echo $_lang['is_disable'];?><?php echo $_lang['zh_mh'];?></th>
                        <td>
                          <p>

                           <label for="rdo_0">
                              <input type="radio" name="fds[status]" id="rdo_0" value="2"  <?php if($member_arr['static']==2) { ?>checked=checked<?php } ?>>
  <?php echo $_lang['yes'];?></label>
                            <label for="rdo_1">
                              <input type="radio" name="fds[status]" id="rdo_1" value="1" <?php if($member_arr['static']!=2) { ?>checked=checked<?php } ?>>
   <?php echo $_lang['no'];?></label>
                            <br/>
                        </p></td>
                      </tr>

  <?php } ?>
  <?php if($member_arr['uid']!=1) { ?>
  <tr>
 						 <th scope="row"><?php echo $_lang['user_group'];?><?php echo $_lang['zh_mh'];?></th>
                        <td>

  <select name="fds[group_id]">
  	 <option value="0" <?php if($member_arr['group_id']<0) { ?>selected="selected"<?php } ?>><?php echo $_lang['ordinary_user'];?></option>
   <?php if(is_array($member_group_arr)) { foreach($member_group_arr as $k => $v) { ?>
  	 <option value="<?php echo $v['group_id'];?>" <?php if($member_arr['group_id']== $v['group_id']) { ?>selected="selected"<?php } ?>><?php echo $v['groupname']?></option>
   <?php } } ?>
   </select><b style="color:red">*</b>

                      </td>
                      </tr>
  <?php } ?>
 </tbody>
 <tfoot>
                      <tr>
                        <th scope="row">&nbsp;</th>
                        <td>
                            <div class="clearfix padt10">
                            	<input type="hidden" name="is_submit" value="1">
                                <button class="positive primary pill button" type="submit" value="<?php echo $_lang['submit'];?>" onclick="return checkForm(document.getElementById('frm_add'));"><span class="check icon"></span><?php echo $_lang['submit'];?></button>
<a class="get-back" href="javascript:void(0);" id="zh-zf-pwd">重置支付密码</a>
<?php if($edituid) { ?><a class="botton" href="javascript:search_user();" id="search_user" >追踪用户</a><?php } ?>
                            </div>
                        </td>
                      </tr>
 </tfoot>
                    </table>

                </form>
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
<script type="text/javascript">

//重置支付密码
$("#zh-zf-pwd").click(function(){
if(confirm("确定重置支付密码?")){
$.post('index.php?do=user&view=add&op=getzfpwd&userid=<?php echo $edituid;?>',{},function(json){
confirm(json.status);
location.href="index.php?do=user&view=list";
},'json');
}
});

function getIndustry(id,element){
if(id&&element){
$.get('../index.php?do=ajax&view=industry',{id:id},function(text){
$('#'+element).html(text);
},'text')
}
}
function search_user(){
var uid = $("input[name=edituid]").val();
var username = $("#txt_username").val();
//alert('index.php?do=user&view=track&uid='+uid+'username='+username);
art.dialog.open('index.php?do=user&view=track&uid='+uid+'&username='+username,{
title:"用户"+username+"的信息",
height:400,
width:700,
},false);
}
</script><?php keke_tpl_class::ob_out();?>