<?php keke_tpl_class::checkrefresh('tpl/default/gy/buyer_step1', '1452599003' );?><div class="buy-body">
<form class="form-horizontal" role="form" action="<?php echo $strUrl;?>&step=<?php echo $step;?>" method="post"  id="submitOrderForm<?php echo $step;?>" name="submitOrderForm<?php echo $step;?>">
  			<input type="hidden" name="<?php echo $step;?>" value="<?php echo $step;?>">
  			<!-- <input type="hidden" name="service_id" id="service_id" value=""> -->
  			<input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>">


<div class="form-group">
<label class="min-title" for="title">请一句话描述您需要的服务：</label>
<div class="dropdown">
    <input type="text" id="title" name="title" class="form-control"  placeholder="需求标题不得超过50字"
    		value="<?php echo $arrServiceInfo['title'];?>" <?php if($arrServiceLists) { ?> data-toggle="dropdown" <?php } ?>>
    		<?php if($arrServiceLists) { ?>
 <ul class="dropdown-menu " role="menu" aria-labelledby="dropdownMenu1">
 	<?php if(is_array($arrServiceLists)) { foreach($arrServiceLists as $k=>$v) { ?>
    <li role="presentation" class="col-xs-12">
    	<a role="menuitem" tabindex="-<?php echo $k;?>" href="javascript:void(0);" class="service-selected"
    		data-price="<?php echo floatval($v['price']); ?>"
    		title="<?php echo $v['title'];?>" >
    		<span class="pull-right money"><sub>￥</sub><?php echo $v['price'];?></span> <?php echo $v['title'];?>
    	</a>
    </li>
    <?php } } ?>
  </ul>
  		<?php } ?>
</div>
</div>

<div class="form-group">
<label class="min-title">您需要的服务类型：</label>
<div class="row">
<div class="col-sm-3">
<select class="form-control" name="indus_pid" id="indus_pid" onchange="getIndustry(this.value,'indus_id')">
                     <option value="">请选择父行业</option>
                     <?php if(is_array($arrTopIndustrys)) { foreach($arrTopIndustrys as $v) { ?>
                     	<option value="<?php echo $v['indus_id'];?>" <?php if($arrServiceInfo['indus_pid'] ==$v['indus_id']) { ?> selected="selected"<?php } ?>><?php echo $v['indus_name'];?></option>
                     <?php } } ?>
                   </select>
                   </div>
                   <div class="col-sm-3">
  <select class="form-control" name="indus_id" id="indus_id">
                     <option value="">请选择子行业</option>
                     <?php if($arrServiceInfo['indus_id']) { ?>
                      <?php if(is_array($arrAllIndustrys)) { foreach($arrAllIndustrys as $v) { ?>
<option value="<?php echo $v['indus_id'];?>" <?php if($arrServiceInfo['indus_id'] == $v['indus_id']) { ?> selected="selected"<?php } ?>><?php echo $v['indus_name'];?></option>
                      <?php } } ?>
                     <?php } ?>
                   </select>
                   </div>
</div>
</div>

<div class="form-group">
<label class="min-title" for="content">详细描述您的要求：</label>
<textarea  id="content" name="content"  placeholder="需求描述不得超过1000字"><?php echo $arrServiceInfo['content'];?></textarea>
</div>

<div class="form-group">
<label class="min-title">添加附件：</label>
<div class="">
<div id="picker1">上传图片</div>
              <input type="hidden"  name="file_ids" id="file_ids"  class="form-control" value="">
<p class="help-block">最多可添加五个附件，每个大小不超过<?php echo $basic_config['max_size'];?>M.</p>
<ul class="affix-list upload-file-list-info" id="fileList1" style="width:30%"></ul>
</div>
</div>

<div class="form-group">
<label class="min-title">您的预算：</label>
<div class="input-group">
  				<span class="input-group-addon">￥</span>
<input type="text" id="price" name="price" class="form-control"  placeholder="输入您的预算" value="<?php echo $arrServiceInfo['price'];?>" onkeyup="clearstr(this);">
</div>
</div>

<div class="form-group">
<button type="submit" class="btn btn-primary">下一步</button>
</div>

</form>
</div>
 <script type="text/javascript" src="<?php echo $_K['siteurl'];?>/static/js/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="<?php echo $_K['siteurl'];?>/static/js/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="<?php echo $_K['siteurl'];?>/static/js/ueditor/lang/zh-cn/zh-cn.js"></script>
 <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('content', {
            //这里可以选择自己需要的工具按钮名称,此处仅选择如下五个
        	initialFrameWidth: '100%',
        	initialFrameHeight: '400'
        });
    </script>

<link rel="stylesheet" type="text/css" href="static/js/webuploader/webuploader.css">
<script type="text/javascript" src="static/js/webuploader/webuploader.js?r=<?php echo RANDOM_PARA;?>"></script>
<script type="text/javascript" src="static/js/webuploader/kppw.webuploader.js"></script>
<script type="text/javascript">
//指定网站URL，后台是必须要定义的，前台不必定义
var baseurl = "<?php echo $basic_config['website_url'];?>";
var uploadsize = parseInt("<?php echo $basic_config['max_size'];?>");
uploadsize =  isNaN(uploadsize)? 1 : uploadsize;
$(function(){
$("#picker1").KKUploader({
accept: {
extensions : '<?php echo $strExtTypes;?>'  //可上传文件格式
},
fileVal:'upload',		//指定上传文本域的name  如不指定，默认是file
fileNumLimit:5,			//上传数量限制
hiddenName:'file_ids',	//表单隐藏域id
hiddenValType:'1',		//指定隐藏域保存值的类型   1=是保存file_id ，2=保存save_name
listName:'fileList1',	//指定上传文件列表ID，如果不指定，则默认为fileList
editListName:'editfileList1',	//指定上传文件编辑列表ID，如果不指定，默认为editfileList
separator:',',			//多文件上传时，指定分隔符，如不指定，默认为","
fileSingleSizeLimit:uploadsize*1024*1024			//上传大小限制
},
{
fileType: 'service',//传递给服务端的参数
filename : 'upload'//传递给服务端的参数指定上传文本域的name，如果未指定，上传不成功
});

});

</script>

<?php keke_tpl_class::ob_out();?>