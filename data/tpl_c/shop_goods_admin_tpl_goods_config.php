<?php keke_tpl_class::checkrefresh('shop/goods/admin/tpl/goods_config', '1452586169' );?><!DOCTYPE HTML>
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
    	<h1><?php echo $_lang['witkey_goods_config'];?></h1>
        <div class="tool">
            <a href="index.php?do=model&model_id=<?php echo $model_id;?>&view=config&op=config" <?php if($op=="config"||!$op) { ?>class="here"<?php } ?> id="tab_cont_1"><?php echo $_lang['basic_config'];?></a>
            <a href="index.php?do=model&model_id=<?php echo $model_id;?>&view=config&op=control" <?php if($op=="control") { ?>class="here"<?php } ?> id="tab_cont_2"><?php echo $_lang['control_config'];?></a>
            <a href="index.php?do=custom&view=fields&model_id=<?php echo $model_id;?>">自定义输入字段</a>
          <!--  <a href="index.php?do=model&model_id=<?php echo $model_id;?>&view=config&op=rule" <?php if($op=="rule") { ?>class="here"<?php } ?> id="tab_cont_3"><?php echo $_lang['private_config'];?></a>-->
    	</div>
</div>
<div class="box tip clearfix p_relative" id="man_tips">
   <div class="control"><a href="javascript:void(0);" title=<?php echo $_lang['close'];?> onclick="$('#man_tips').fadeOut();"><b>&times;</b></a></div>
   <div class="title"><h2><?php echo $_lang['tips'];?></h2></div>
   <div class="detail pad10">
      <ul>
         <li>*基本配置中的模型描述显示在威客上传作品时的提示界面</li>
      </ul>
   </div>
</div>
<div class="box post" id="div_cont_1" style="display:<?php if($op=='config'||!$op) { ?>block<?php } else { ?>none<?php } ?>">
<div class="tabcon">
    	<div class="title"><h2><?php echo $_lang['task_config'];?></h2></div>
        <div class="detail">
        	<form name="frm_config_employ" action="index.php?do=model&model_id=<?php echo $model_id;?>&view=config" method="post">
        	<input type="hidden" name="pk[model_id]" value="<?php echo $model_id;?>">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                      	 <th scope="row" width="130"><?php echo $_lang['model_name'];?><?php echo $_lang['zh_mh'];?></th>
                        <td>
                        <input type="text" value="<?php echo $model_info['model_name']?>" name="fds[model_name]" class="txt" style=" width:260px;"/>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><?php echo $_lang['is_open'];?><?php echo $_lang['zh_mh'];?></th>
                        <td>
<label><input type="radio" name="fds[model_status]" <?php if($model_info['model_status']) { ?>checked<?php } ?> value="1" id="model_status_0" /> <?php echo $_lang['yes'];?></label>
                            <label><input name="fds[model_status]" type="radio" <?php if(!$model_info['model_status']) { ?>checked<?php } ?> value="0"id="model_status_1" /><?php echo $_lang['no'];?></label>
                        </td>
                      </tr>
                      <tr>

                      </tr>
      <!--                <tr>
  <th scope="row" width="200"><?php echo $_lang['bind_industry_shop'];?></th>
    <td><?php $milist = explode(',',$model_info['indus_bid']); ?>

   <!--           <select onchange="p_indus_add(this.value)" style="margin-bottom:5px;">
   <option value=""><?php echo $_lang['choose_industry'];?></option>
<?php if(is_array($indus_index['0'])) { foreach($indus_index['0'] as $indus) { ?>
<option value="<?php echo $indus['indus_id']?>"><?php echo $indus['indus_name']?></option>
<?php } } ?>
  </select>
 <br class="clear">
 <select name="p_indus_select" id="p_indus_select" multiple=multiple style="width:160px;float:left;height:200px;overflow-y:scroll;background:white;border:#ccc solid 1px" ></select>
<div style="width:80px;float:left;height:160px;overflow:hidden;margin-left:20px; text-align:center;padding-top:40px;">
<button onclick = "moveitems()" type="button" class="input_but"><<</button><br><br>
<button onclick = "additems()" type="button" class="input_but">>></button><br>
</div>
<select name="fds[indus_bid][]" id="s_indus_select" multiple=multiple style="width:160px;float:left;height:200px;overflow-y:scroll;background:white;border:#ccc solid 1px;margin-left:20px;">
<?php if(is_array($milist)) { foreach($milist as $k => $m) { ?>
<?php if(!empty($m)) { ?>
<option id="s_indus_select_op_<?php echo $m;?>" value="<?php echo $m?>" selected="selected"> <?php echo $indus_arr[$m]['indus_name']?></option>
<?php } ?>
<?php } } ?>
</select>
<br class="clear"><?php echo $_lang['choose_industry_nitice'];?>
</td>
         </tr> -->
  <!--<tr>
    <th scope="row" width="200"><?php echo $_lang['model_about'];?><?php echo $_lang['zh_mh'];?></th>
      <td>
         <textarea cols=80 rows=8 name="fds[model_intro]"><?php echo $model_info['model_intro']?></textarea><br>(<?php echo $_lang['limit_50_bytes'];?>)
  </td>
         </tr>-->
 <tr>
    <th scope="row" width="200"><?php echo $_lang['model_description'];?><?php echo $_lang['zh_mh'];?></th>
      <td>
        <textarea cols="100"  name="fds[model_desc]"  id="tar_content"   ><?php echo $model_info['model_desc']?></textarea>
  </td>
  <script type="text/javascript" src="<?php echo $_K['siteurl'];?>/static/js/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="<?php echo $_K['siteurl'];?>/static/js/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="<?php echo $_K['siteurl'];?>/static/js/ueditor/lang/zh-cn/zh-cn.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('tar_content', {
            //这里可以选择自己需要的工具按钮名称,此处仅选择如下五个
        	initialFrameWidth: '80%',
        	initialFrameHeight: '400'
        });
    </script>
         </tr>
 <?php if($on_time) { ?>
    <tr>
      <th scope="row" width="200"><?php echo $_lang['last_modify'];?><?php echo $_lang['zh_mh'];?></th>
        <td><?php echo date('Y-m-d H:i:s',$on_time) ?></td>
    </tr>
         <?php } ?>
                      <tr>
                        <th scope="row"></th>
                        <td>
                            <div class="clearfix padt10">
                                <button class="positive primary pill button" type="submit" name="sbt_edit" value="<?php echo $_lang['submit'];?>"><span class="pen icon"></span><?php echo $_lang['submit'];?></button>
                                <button class="pill button" type="reset" name="rst_edit" value="<?php echo $_lang['return'];?>" onclick="window.history.go(-1)"><span class="uparrow icon"></span><?php echo $_lang['return'];?></button>
                             </div>
                        </td>
                      </tr>
                    </table>
        	</form>
        </div>
   </div>
</div>
<div class="box post" id="div_cont_2" style="display:<?php if($op!='control') { ?>none<?php } else { ?>block<?php } ?>">
<div class="tabcon">
    	<div class="title"><h2><?php echo $_lang['control_config'];?></h2></div>
        <div class="detail">
        	<form name="frm_config_pay" action="index.php?do=model&model_id=<?php echo $model_id;?>&view=config&op=control" method="post" id="frm_config_pay">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
               	<!--  <tr>
                        <th scope="row"><?php echo $_lang['audit_money'];?><?php echo $_lang['zh_mh'];?></th>
                        <td>
<input type="text" value="<?php echo $audit_cash?>" name="cont[audit_cash]" id="audit_cash" class="txt" style=" width:260px;" maxlength="100" limit="type:int;required:true;len:1-6" msg="<?php echo $_lang['goods_audit_money'];?>" tips="<?php echo $_lang['please_input_goods_aduita_money'];?>" msgArea="audit_cash_msg" class="txt"/><?php echo $_lang['yuan'];?><b style="color:red">*</b>
                    <span id="audit_cash_msg"></span>
 <div class="padt10 direct">
                        <p>
                        	(<?php echo $_lang['money_less_this_need_audit'];?>)
                        </p>
                     </div>

    </td>
                      </tr>-->
  <tr>
                      	 <th scope="row" width="150"><?php echo $_lang['goods_min_deal_total_money'];?><?php echo $_lang['zh_mh'];?></th>
                        <td>
                        <input type="text" value="<?php echo $min_cash?>" name="cont[min_cash]" id="min_account" class="txt" style=" width:260px;" maxlength="100" limit="type:int;required:true;len:1-6" msg="<?php echo $_lang['goods_min_deal_money'];?>" tips="<?php echo $_lang['please_input_min_deal_money'];?>" msgArea="min_account_msg" class="txt"/><?php echo $_lang['yuan'];?><b style="color:red">*</b>
                         <span id="min_account_msg"></span>
  <div class="padt10 direct">
                            <p>
                            	(<?php echo $_lang['zero_is_no_limit'];?>)
                            </p>
                        </div>
    </td>
                  	  </tr>
  <tr>
                      	 <th scope="row" width="150">设定自动确认时间<?php echo $_lang['zh_mh'];?></th>
                        <td>
                        <input type="text" value="<?php echo $confirm_max_day?>" name="cont[confirm_max_day]" id="confirm_max_day" class="txt" style=" width:260px;" maxlength="100" limit="type:int;required:true;len:-2;between:1-100" msg="请填写正整数" tips="" msgArea="confirm_max_day_account_msg" class="txt"/>天<b style="color:red">*</b>
                         <span id="confirm_max_day_account_msg"></span>
  <div class="padt10 direct">
                            <p>
                            	设置在付款之后多少天内没有确认作品的话那就自动确认作品
                            	(最少为1天)
                            </p>
                        </div>
    </td>
                  	  </tr>
  <tr>
                        <th scope="row"><?php echo $_lang['goods_royalty_rate'];?><?php echo $_lang['zh_mh'];?></th>
                        <td>
<input type="text" size="10" name="cont[service_profit]" value="<?php echo $service_profit;?>" limit="type:int;len:1-2;between:1-100" msg="<?php echo $_lang['goods_royalty_rate_msg'];?><?php echo $_lang['zh_mh'];?>1-2" title="<?php echo $_lang['goods_royalty_rate_positive_integer'];?>,1-100" msgArea="goods_rate_msg" class="txt"/>%<span id="goods_rate_msg"></span>
    </td>
                      </tr>
   <tr>
                      	 <th scope="row" width="150"><?php echo $_lang['service_attachment_number_limit'];?><?php echo $_lang['zh_mh'];?></th>
                        <td>
                        <input type="text" value="<?php echo $max_filecount;?>" name="cont[max_filecount]" id="max_filecount" size="10" limit="required:true;type:int;between:1-20" msg="<?php echo $_lang['service_attachment_number_can_not_null'];?>" title="<?php echo $_lang['please_input_allow_attachment_number'];?>" msgArea="max_filecount_msg" class="txt"/><?php echo $_lang['counts'];?>
                         <span id="max_filecount_msg"></span>
    </td>
                  </tr>
<tr>
                      	 <th scope="row" width="150">上传默认图片</th>
                        <td>
<!--<input type="file" class="file" name="upload1" id="upload1">-->
<div id="picker">上传图片</div>
<input type="hidden" name="filepath" id="filepath" />
<div id="list" class="affix-list upload-file-list-info" style="width:210px;"></div>
<p>图片建议大小：高210px 宽210px 图片类型:jpeg,gif,png,jpg </p>
  <div class="padt10 direct">
                        </div>
    </td>
                  </tr>
                    <tr>
                  		<th scope="row" width="150">图片</th>
                  		<td>
                  			<img src="../tpl/default/img/shop/shop_default_big.png"  name="imgPreview1"  id="imgPreview1" height="100" width="100" />
                  		</td>
                  </tr>
                      <tr>
                        <th scope="row">&nbsp;</th>
                        <td>
                            <div class="clearfix padt10">
                                <button class="positive primary pill button" type="submit" name="sbt_edit" value="<?php echo $_lang['submit'];?>" onclick="return checkForm(document.getElementById('frm_config_pay'))"><span class="pen icon"></span><?php echo $_lang['submit'];?></button>
                          		<button type="reset" name="rst_edit"  class="positive primary pill button"  value="<?php echo $_lang['reset'];?>"/><span class="reload icon"></span><?php echo $_lang['reset'];?></button>
   </div>
                        </td>
                      </tr>
                </table>
        	</form>
        </div>
        </div>
    </div>

<script>
    	function p_indus_add(id){
mod = "";
<?php if(is_array($indus_index)) { foreach($indus_index as $k => $si) { ?>
if(id=='<?php echo $k?>'){
<?php if(is_array($si)) { foreach($si as $i) { ?>
if(!$('#s_indus_select_op_<?php echo $i['indus_id'];?>').val()){
mod +="<option id=\"p_indus_select_op_<?php echo $i['indus_id'];?>\" value=\"<?php echo $i['indus_id'];?>\"><?php echo $i['indus_name'];?></option>";
}
<?php } } ?>
}
<?php } } ?>
$('#p_indus_select').html(mod);
}

function moveitems(){
vs = $('#s_indus_select').val()+'';
vs = vs.split(",");
var mod = '';
for(v=0;v<vs.length;v++){

if(String(vs[v]) == "null"){
continue;
}
mod+="<option value="+vs[v]+" id=\"p_indus_select_op_"+vs[v]+"\">"+$('#s_indus_select_op_'+vs[v]).html()+"</option>";
$('#s_indus_select_op_'+vs[v]).remove();
};
if(mod!='')
$('#p_indus_select').append(mod);
}
$(function(){
if($("#hdn_indus_id").val()!=''){
p_indus_add($("#hdn_indus_id").val());
}
})
function additems(){
vs = $('#p_indus_select').val()+'';
vs = vs.split(",");
var mod = '';
for(v=0;v<vs.length;v++){
if(String(vs[v]) == "null"){
continue;
}
mod+="<option value="+vs[v]+" id=\"s_indus_select_op_"+vs[v]+"\" selected=\"selected\">"+$('#p_indus_select_op_'+vs[v]).html()+"</option>";
$('#p_indus_select_op_'+vs[v]).remove();
};
if(mod!='')
$('#s_indus_select').append(mod);
}
</script>




<script type="text/javascript">
var baseurl = "<?php echo $basic_config['website_url'];?>";
var uploadsize = parseInt("<?php echo $basic_config['max_size'];?>");
uploadsize =  isNaN(uploadsize)? 1 : uploadsize;
$(function(){
$("#picker").KKUploader({
accept: {
extensions : 'jpg,jpeg,gif,png,bmp'
},
uploadEvents: {
uploadComplete:function(file){
var url = $("#"+file.id).find('.webuploader-pick-file-close').attr('data-fileurl');
$("#filepath").val(url);
        				$('#imgPreview1').removeClass('hidden');
        				$('#imgPreview1').attr('src','<?php echo REVIEW_BACKEND_PATH;?>'+url);
}
},
fileNumLimit:1,
fileSingleSizeLimit:uploadsize*1024*1024,,
listName:'list',
hiddenName:'filepath',
hiddenValType: 2
},
{
fileType:'sys',
  		objType:'auth',
filename : 'file',
});
});

</script>
<link rel="stylesheet" type="text/css" href="../static/js/webuploader/webuploader.css">
<script type="text/javascript" src="../static/js/jquery.min.js?r=<?php echo RANDOM_PARA;?>"></script>
<script type="text/javascript" src="../static/js/webuploader/webuploader.js?r=<?php echo RANDOM_PARA;?>"></script>
<script type="text/javascript" src="../static/js/webuploader/kppw.webuploader.js"></script>					
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