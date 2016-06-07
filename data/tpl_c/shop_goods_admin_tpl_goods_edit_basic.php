<?php keke_tpl_class::checkrefresh('shop/goods/admin/tpl/goods_edit_basic', '1452589390' );?><!DOCTYPE HTML>
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
    	<h1><?php echo $_lang['witkey_goods'];?></h1>
        <div class="tool">
   <?php if(is_array($ops)) { foreach($ops as $v) { ?>
<a href="index.php?do=<?php echo $do?>&model_id=<?php echo $model_id;?>&view=edit&service_id=<?php echo $service_id;?>&op=<?php echo $v;?>" class="<?php if($op==$v) { ?>here<?php } ?>"><?php echo $_lang['b_shop_'.$v];?></a>
       		<?php } } ?>
        </div>
</div>
<!--页头结束-->

<div class="box post">
    <div class="tabcon">
        	<div class="title"><h2><?php echo $_lang['edit_witkey_goods'];?></h2></div>
            <div class="detail">
                <form method="post" action="index.php?do=model&view=edit&model_id=6" id="frm_art_edit" enctype="multipart/form-data">
                     <input type="hidden" name="pk[service_id]" value="<?php echo $service_id;?>">
                     <input type="hidden" name="model_id" value="<?php echo $model_id;?>">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<th scope="row" width="130"><?php echo $_lang['shopkeeper'];?><?php echo $_lang['zh_mh'];?></th>
<td>
<?php echo $username;?>
</td>
</tr>
                      <tr>
                        <th scope="row" width="130"><?php echo $_lang['goods_name'];?><?php echo $_lang['zh_mh'];?></th>
                        <td>
                         <input type="text" class="txt" name="fds[title]" value="<?php echo $title?>" size="50" limit="required:true" msg="<?php echo $_lang['goods_name_is_null'];?>" tips="<?php echo $_lang['please_input_goods_name'];?>" msgArea="title_msg">
 &nbsp;&nbsp;&nbsp;
                        </td>
                      </tr>
  
  <?php if($service_info['ext_fields']) { ?>
  <?php if(is_array($service_info['ext_fields'])) { foreach($service_info['ext_fields'] as $k => $v) { ?>
                      <tr>
                        <th scope="row" width="130"><?php echo $v['f_name'];?><?php echo $_lang['zh_mh'];?></th>
                        <td>
                            <?php if($v["f_warning_select"]==1) { ?>  
                                <select id="<?php echo $v['f_code'];?>" name="ext_fds[<?php echo $v['f_code'];?>]" class="form-control" >
                                <?php if(is_array($v['f_warning'])) { foreach($v['f_warning'] as $view_type_k => $type_v) { ?>
                                    <option value="<?php echo $type_v;?>"<?php if($v['data'][$v['f_code']]['content'] == $type_v) { ?> selected="selected"<?php } ?>><?php echo $type_v;?></option>
                                <?php } } ?>
                                </select>	
                             <?php } else { ?>
                         <input type="text" class="txt" name="ext_fds[<?php echo $v['f_code'];?>]" value="<?php echo $v['data'][$v['f_code']]['content'];?>" size="50" 
 <?php if($v['f_required']) { ?> limit="required:true"<?php } ?> 
 msg="<?php echo $v['f_warning'];?>" tips="<?php echo $v['f_tips'];?>" msgArea="<?php echo $v['f_code'];?>_msg">
                      	<?php } ?>
                            </td>
                      </tr>
  <?php } } ?>
  <?php } ?>
  
  
  <tr>
                        <th scope="row"><?php echo $_lang['goods_quotation'];?><?php echo $_lang['zh_mh'];?></th>
                        <td>
                        	<input type="text" class="txt" name="fds[price]" id="txt_price" size="5" value="<?php echo $price;?>" limit="type:float;required:true" msg="<?php echo $_lang['goods_single_price_input_error'];?>" title="<?php echo $_lang['goods_single_price_allow_decimal'];?>"  msgArea="price_msg"/>
                        	<?php echo $_lang['yuan'];?><span id="price_msg"></span>
</td>
                      </tr>
  <tr>
  	<th scope="row" ><?php echo $_lang['goods_status'];?><?php echo $_lang['zh_mh'];?></th>
<td>
<select name="fds[service_status]" id="slt_service_status">
<?php if(is_array($goods_status_arr)) { foreach($goods_status_arr as $k => $v) { ?>
<option <?php if($service_status==$k) { ?>selected=selected<?php } ?> data-service-status="<?php echo $service_status;?>" value="<?php echo $k;?>"><?php echo $v;?></option>
<?php } } ?>
</select>
</td>
  </tr>
<tr>
                        <th scope="row"><?php echo $_lang['pub_time'];?><?php echo $_lang['zh_mh'];?></th>
                        <td><?php if($on_time){echo date('Y-m-d H:i:s',$on_time); } ?></td>
                    </tr>

<tr>
                        <th scope="row"><?php echo $_lang['goods_desc'];?>:</th>
                        <td>
<textarea id="tar_content" name="fds[content]" cols="100"  ><?php echo $content?></textarea>
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
  <tr>
                        <th scope="row">SEO<?php echo $_lang['title'];?><?php echo $_lang['zh_mh'];?></th>
                        <td><textarea cols="70" rows="2"  name="fds[seo_title]" value="<?php echo $seo_title;?>"><?php echo $seo_title;?></textarea></td>
                     </tr>

                     <tr>
                        <th scope="row">SEO<?php echo $_lang['keywords'];?><?php echo $_lang['zh_mh'];?></th>
                        <td><textarea cols="70" rows="2"  name="fds[seo_keyword]" value="<?php echo $seo_keyword;?>"><?php echo $seo_keyword;?></textarea></td>
                     </tr>

                      <tr>
                        <th scope="row">SEO<?php echo $_lang['description'];?><?php echo $_lang['zh_mh'];?></th>
                        <td><textarea cols="70" rows="3" name="fds[seo_desc]" value="<?php echo $seo_desc;?>"><?php echo $seo_desc;?></textarea></td>
                     </tr>
                      <tr>
                        <th scope="row">推荐</th>
                        <td><select name="fds[is_top]"><option value="1"<?php if($is_top ==1) { ?> selected="selected"<?php } ?>>是</option><option value="0"<?php if($is_top ==0) { ?> selected="selected"<?php } ?>>否</option></option></select></td>
                     </tr>                     
                      <tr>
                        <th scope="row">图片列表<?php echo $_lang['zh_mh'];?></th>
                        <td>
                        	<?php if($servicePics) { ?> 
                        	<?php if(is_array($servicePics)) { foreach($servicePics as $k => $v) { ?>                                 
                        		<p id="pic_<?php echo $k;?>"><a href="<?php echo $v;?>" target="_blank"><?php echo $v;?></a><a href="javascript:void(0);" data-file="<?php echo $v;?>" data-id="<?php echo $k;?>" data-serviceid="<?php echo $service_id;?>" data-type="pic" class="service-file-del">删除</a></p>
<?php } } ?>
<?php } ?>

                        </td>
                     </tr>
                      <tr>
                        <th scope="row">附件列表<?php echo $_lang['zh_mh'];?></th>
                        <td>
                        	<?php if($serviceFiles) { ?> 
                        	<?php if(is_array($serviceFiles)) { foreach($serviceFiles as $k => $v) { ?>                                 	
                        		<p id="file_<?php echo $k;?>"><a href="<?php echo $v;?>" target="_blank"><?php echo $v;?></a><a href="javascript:void(0);" data-file="<?php echo $v;?>" data-id="<?php echo $k;?>" data-serviceid="<?php echo $service_id;?>"  data-type="file" class="service-file-del">删除</a></p>
<?php } } ?>
<?php } ?>

                        </td>
                     </tr>
                    <tr>
                        <th scope="row">&nbsp;</th>
                    	<td>
                    	<button name="sbt_edit" value="1" class="positive primary  button" type="submit">
                    	<span class="check icon"></span><?php echo $_lang['submit'];?></button>
                    	<button type="reset"  name="rst_edit" class="button" onclick="javascript:history.go(-1)"  /><span class="uparrow icon"></span><?php echo $_lang['return'];?></button>
                    	</td>
                    </tr>
                    </table>
                </form>
              </div>
       </div>
</div>
<!--主体结束-->
<script type="text/javascript">
function showIndus(indus_pid){
var service_id = parseInt(<?php echo $service_id?>)+0;
if(indus_pid){
$.post('index.php?do=model&model_id=6&view=edit&service_id='+service_id, {ajax:"show_indus",indus_pid: indus_pid}, function(html){
var str_data = html;
if (trim(str_data) == '') {
$("#indus_id").html("<option value='-1'> <?php echo $_lang['please_choose_son_industry'];?> </option>");
}
else {
$("#indus_id").html(str_data);
}
},'text');
}
}

$(function(){
$(".service-file-del").click(function(){
var serviceid= $(this).attr('data-serviceid');
var id	= $(this).attr('data-id');
var type = $(this).attr('data-type');
var filename = $(this).attr('data-file');
art.dialog({
    id: 'testID',
    content: '你确定要删除？',
    button: [
        {
            name: '确定',
            callback: function () {
$.post('index.php?do=model&model_id=6&view=edit', {
ajax:"delfile",
dataid:id,
serviceid:serviceid,
type:type,
filename:filename
}, function(json){
if(json.status == '1'){
if(json.data.type =='pic'){
$("#pic_"+json.data.dataid).closest('p').remove();
}else{
$("#file_"+json.data.dataid).closest('p').remove();
}
}
},'json');
this.close();
                return false;
            }
        },
        {
            name: '取消',
            focus: true
        }
    ]
});
});
});
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