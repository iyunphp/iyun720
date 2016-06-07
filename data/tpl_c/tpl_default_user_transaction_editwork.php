<?php keke_tpl_class::checkrefresh('tpl/default/user/transaction_editwork', '1452505525' );?><div class="modal-body">
<form role="form" action="<?php echo $strUrl;?>" method="post" class="form-horizontal" name="editWorkForm" id="editWorkForm">
          	<input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>">
<input type="hidden" name="objId"  value="<?php echo $objId;?>">
<input type="hidden" name="pk[service_id]"  value="<?php echo $arrServiceInfo['service_id'];?>">

            <div class="form-group">
              <label class="col-sm-2 control-label" for="goodsname"><?php echo $strServiceName;?>名称：</label>
                <div class="col-sm-8 row">
                  <input type="text"  name="goodsname" id="goodsname"  class="form-control" value="<?php echo $arrServiceInfo['title'];?>">
                </div>
            </div>
            
    <div class="form-group">
              <label class="col-sm-2 control-label" for="goodsdesc"><?php echo $strServiceName;?>描述：</label>
              <div class="col-sm-8 row">
                 <textarea id="goodsdesc" name="goodsdesc" rows="10" class=" "><?php echo $arrServiceInfo['content'];?></textarea>
              </div>
            </div>

           
            <!--<div class="form-group">
              <label class="col-sm-2 control-label" for="picker">缩略图：</label>
                <div class="col-sm-8 row">
                <div id="picker_1">上传缩略图</div>
                	  
  <p class="form-control-static">建议您上传尺寸为 380*380px 大小 的图片。</p>
  <input type="hidden"  name="fileid_1"  id="fileid_1">
              <input type="hidden"  name="file_ids" id="file_ids"  class="form-control" value="<?php echo $arrServiceInfo['pic'];?>">					 
                </div>
            </div>
<div class="form-group ">
            <div class="col-sm-offset-2 col-sm-8">
              <ul class="affix-list upload-file-list-info" id="editfileList_1">
<?php if(!empty($arrImageLists)) { ?>
              <?php if(is_array($arrImageLists)) { foreach($arrImageLists as $v) { ?>
              	<li class="affix-list-item" delete-image-id="<?php echo $v['file_id'];?>"><?php echo $v['file_name'];?>
              	<a href="javascript:void(0);" delete-image-id="<?php echo $v['file_id'];?>" data-class="delete-image">删除</a></li>
              <?php } } ?>
              <?php } ?>
              </ul>
              <ul class="affix-list upload-file-list-info" id="fileList_1"></ul>
            </div>
          </div>-->

            
<?php if($arrServiceInfo['model_id'] == '7') { ?>


<div class="form-group">
            <label for="service_time" class="col-sm-2 control-label">完成时间 ：</label>
            <div class="col-sm-3">
               <input type="text" class="form-control" id="service_time" name="service_time" placeholder="承诺完成时间" value="<?php echo $arrServiceInfo['service_time'];?>">
            </div>
<div class="col-sm-3">
<select name="unit_time" id="unit_time" class="form-control">
<?php if(is_array($arrServiceUnit)) { foreach($arrServiceUnit as $v) { ?>
<option value="<?php echo $v;?>" <?php if($arrServiceInfo['unit_time']==$v) { ?>selected<?php } ?>><?php echo $v;?></option>
<?php } } ?>
           		</select>
            </div>
       </div>

<?php } else { ?>            
       
       <input type="hidden" name="submit_method" value="inside" />
       <div class="form-group" id="submit_method">
            <label for="upload" class="col-sm-2 control-label"><?php echo $strServiceName;?>源件：</label>
            <div class="col-sm-6 row">
              <p class="form-control-static">
              	  <div id="picker_2">上传原稿（全景图片/视频）</div>
              <!-- <input type="file" id="file_upload_i" name="file_upload_i"> -->
              <input type="hidden"  name="fileid_2"  id="fileid_2">
              <input type="hidden"  name="file_path_2" id="file_path_2"  class="form-control" value="<?php echo $arrServiceInfo['file_path'];?>">
              </p>
            </div>
            <!--<div class="col-sm-7">
              <p class="form-control-static">最多1个附件，不得超过<?php echo $basic_config['max_size'];?>M。</p>
   <p class="hidden" style="color: red" id="">请上传<?php echo $strServiceName;?>源件</p>
            </div>-->

          </div>
          <!-- 上传附件 end -->

          <div class="form-group ">
            <div class="col-sm-offset-2 col-sm-8">
              <ul class="affix-list upload-file-list-info" id="editfileList_2">
<?php if(!empty($arrFileLists)) { ?>
              <?php if(is_array($arrFileLists)) { foreach($arrFileLists as $v) { ?>
              	<li class="affix-list-item" delete-goodsfile-id="<?php echo $v['file_id'];?>"><?php echo $v['file_name'];?>
              	<a href="javascript:void(0);" delete-goodsfile-id="<?php echo $v['file_id'];?>" data-class="delete-goodsfile">删除</a></li>
              <?php } } ?>
              <?php } ?>
              </ul>
              <ul class="affix-list upload-file-list-info" id="fileList_2"></ul>
            </div>
          </div>


<?php } ?>


<!--改造-->
             <div class="panel-group" id="accordion">
<div class="panel panel-default">
    <div class="panel-heading">
      <a data-toggle="collapse" data-parent="#accordion" 
          href="#collapseOne"><h4 class="panel-title" style="text-align:center">
        
         配置作品参数
        
      </h4></a>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
<?php if(is_array($arrCustomInfo)) { foreach($arrCustomInfo as $k => $v) { ?>         
            
<?php if($v['listorder'] > 0) { ?>
<div class="form-group">
<label for="txt_title" class="col-sm-2 control-label">
<?php echo $v['f_name'];?> <?php if($v['f_required'] =='1') { ?>
<span class="text-danger">*</span>
<?php } ?>
</label>
<div class="col-sm-7">
    <?php if($v["f_warning_select"]==1) { ?>  
    	<select id="<?php echo $v['f_code'];?>" name="extdata[]" class="form-control" >
    	<?php if(is_array($v['f_warning'])) { foreach($v['f_warning'] as $view_type_k => $type_v) { ?>
        	<option value="<?php echo $type_v;?>"<?php if($v['extdata']==$type_v) { ?> selected="selected"<?php } ?>><?php echo $type_v;?></option>
        <?php } } ?>
        </select>		
    <?php } elseif($v['f_code']=='view_music') { ?>
<div id="picker_3">上传音乐</div>
         <input type="hidden" name="extdata[]" id="file_path_3" class="form-control" value="<?php echo $v['extdata'];?>" >
         <div class="form-group ">
            <div class="col-sm-10">
              <ul class="affix-list upload-file-list-info" id="editfileList_3">
<?php if(!empty($v['arrFileLists'])) { ?>
              <?php if(is_array($v['arrFileLists'])) { foreach($v['arrFileLists'] as $vs) { ?>
              	<li class="affix-list-item" delete-goodsfile-id="<?php echo $vs['file_id'];?>"><?php echo $vs['file_name'];?>
              	<a href="javascript:void(0);" delete-goodsfile-id="<?php echo $vs['file_id'];?>" data-class="delete-goodsfile" onclick="document.getElementById('file_path_3').value=''">删除</a></li>
              <?php } } ?>
               <?php } elseif(!empty($v['extdata'])) { ?>
                  <li class="affix-list-item" ><?php echo $v['extdata'];?>
              <a href="javascript:void(0);" delete-goodsfile-id="<?php echo $vs['file_id'];?>" data-class="delete-goodsfile" onclick="document.getElementById('file_path_3').value='';this.parentNode.style.display='none'">删除</a></li>
             
              <?php } ?>
              
              </ul>
              <ul class="affix-list upload-file-list-info" id="fileList_3"></ul>
            </div>
          </div>        
         
    <?php } else { ?>
    	<input type="text" class="form-control" id="<?php echo $v['f_code'];?>" name="extdata[]" minlength="<?php echo $v['f_min_len'];?>" placeholder="请输入<?php echo $v['f_name'];?>" value="<?php echo $v['extdata'];?>" maxlength="<?php if($v['f_fixed_len']) { ?><?php echo $v['f_fixed_len'];?> <?php } else { ?> <?php if($v['f_max_len']) { ?><?php echo $v['f_max_len'];?><?php } else { ?>255<?php } ?><?php } ?>" >
    <?php } ?>    
</div>
<div class="col-sm-3">
<p class="form-control-static"><?php echo $v['f_tips'];?><?php if($v['f_fixed_len']) { ?> <?php echo $v['f_fixed_len'];?>字符<?php } else { ?> <?php if($v['f_min_len']) { ?><?php echo $v['f_min_len'];?><?php } ?><?php if($v['f_max_len']) { ?>-<?php echo $v['f_max_len'];?><?php } ?><?php if($v['f_min_len']) { ?>字符<?php } ?><?php } ?></p>
</div>
</div>
<?php } else { ?>
<input type="hidden" class="form-control" id="<?php echo $v['f_code'];?>" name="extdata[]" minlength="<?php echo $v['f_min_len'];?>" placeholder="请输入<?php echo $v['f_name'];?>" value="<?php echo $v['extdata'];?>" maxlength="<?php if($v['f_fixed_len']) { ?><?php echo $v['f_fixed_len'];?> <?php } else { ?> <?php if($v['f_max_len']) { ?><?php echo $v['f_max_len'];?><?php } else { ?>255<?php } ?><?php } ?>" >
<?php } ?><input type="hidden" name="id[]" value="<?php echo $v['id'];?>">                                  
<?php } } ?>
             </div>
    </div>
  </div>
</div>
            
            <!--改造完毕-->   

<div class="form-group">
              <label class="col-sm-2 control-label">所属分类：</label>
                   <div class="col-sm-4 row">
                   <select class="form-control" name="indus_pid" id="indus_pid" onchange="getIndustry(this.value,'indus_id')">
                     <option value="-1">请选择大分类</option>
                     <?php if(is_array($arrTopIndustrys)) { foreach($arrTopIndustrys as $v) { ?>
                     	<option value="<?php echo $v['indus_id'];?>" <?php if($arrTaskInfo['indus_pid'] ==$v['indus_id']||$arrServiceInfo['indus_pid'] ==$v['indus_id']) { ?> selected="selected"<?php } ?>>
                     	<?php echo $v['indus_name'];?>
                     	</option>
                     <?php } } ?>
                   </select>
                 </div>
                 <!--<div class="col-sm-4">
                   <select class="form-control" name="indus_id" id="indus_id">
                     <option value="-1">请选择子分类</option>
                     <?php if($arrTaskInfo['indus_id']||$arrServiceInfo['indus_id']) { ?>
                      <?php if(is_array($arrAllIndustrys)) { foreach($arrAllIndustrys as $v) { ?>
<option value="<?php echo $v['indus_id'];?>" <?php if($arrTaskInfo['indus_id'] == $v['indus_id']||$arrServiceInfo['indus_id'] ==$v['indus_id']) { ?> selected="selected"<?php } ?>>
<?php echo $v['indus_name'];?>
</option>
                      <?php } } ?>
                     <?php } ?>
                   </select>
                 </div>-->
                 <div class="col-sm-offset-2 col-sm-8">
                   <span class="help-block"></span>
                 </div>
           </div>
<div class="form-group">
            <label for="goodsprice" class="col-sm-2 control-label">授权价 ：</label>
            <div class="col-sm-4 row">
              <div class="input-group">
                <span class="input-group-addon">￥</span>
                <input type="text" class="form-control" id="goodsprice" name="goodsprice" placeholder="授权使用价" value="<?php echo $arrServiceInfo['price'];?>">
              </div>
        </div>
            <div class="col-sm-4">
    <select name="unite_price" id="unite_price" class="form-control">
                    <?php if(is_array($arrPriceUnit)) { foreach($arrPriceUnit as $v) { ?><option value="<?php echo $v;?>" <?php if($arrServiceInfo['unite_price']==$v) { ?>selected<?php } ?>>/<?php echo $v;?> </option>
                    <?php } } ?>
                </select>
            </div>
       		</div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-default" type="submit" value="1" onclick="return isNextChecked();" >确定</button>
                <span class="text-success" id="tipsUser"></span>
              </div>
            </div>
          </form>
          </div>
          
          <link rel="stylesheet" type="text/css" href="static/js/webuploader/webuploader.css">
<script type="text/javascript" src="static/js/webuploader/webuploader.js?r=<?php echo RANDOM_PARA;?>"></script>
<script type="text/javascript" src="static/js/webuploader/kppw.webuploader.js"></script>
<script type="text/javascript">
var uploadsize = parseInt("<?php echo $basic_config['max_size'];?>");
uploadsize =  isNaN(uploadsize)? 1 : uploadsize;
$(function(){
var uploadsize = parseInt("<?php echo $basic_config['max_size'];?>");
uploadsize =  isNaN(uploadsize)? 1 : uploadsize;
$("#picker_1").KKUploader({
accept: {
extensions : '<?php echo $strExtTypes;?>'
},
fileNumLimit:1,
separator:',',
fileSingleSizeLimit:uploadsize*1024*1024,
hiddenName: 'file_ids',
hiddenValType: 2,
listName: 'fileList_1',
editListName: 'editfileList_1'
},
{
filename : 'file',
fileType : 'service'
});


$("#picker_2").KKUploader({
accept: {
extensions : '<?php echo $strExtTypes;?>'
},
fileNumLimit:1,
uploadEvents: {
uploadComplete:function(file){
var url = $("#"+file.id).find('.webuploader-pick-file-close').attr('data-fileurl');
$("#file_path_2").val(url);
$("#fileList_file_path_2").append('<li class="affix-list-item">'+json.msg.name+'</li>');
}
},
//separator:'|',
hiddenName: 'file_path_2',
hiddenValType: 2,
fileSingleSizeLimit:uploadsize*1024*1024,
listName: 'fileList_2',
editListName : 'editfileList_2'
},
{
filename : 'file',
fileType:'service'
});

//改造官方上传插件 背景音乐
$("#picker_3").KKUploader({
accept: {
extensions : 'mp3'
},
fileNumLimit:1,
uploadEvents: {
uploadComplete:function(file){
var url = $("#"+file.id).find('.webuploader-pick-file-close').attr('data-fileurl');
$("#file_path_3").val(url);
$("#fileList_file_path_3").append('<li class="affix-list-item">'+json.msg.name+'</li>');
}
},
//separator:'|',
hiddenName: 'file_path_3',
hiddenValType: 2,
fileSingleSizeLimit:uploadsize*1024*1024,
listName: 'fileList_3',
editListName : 'editfileList_3'
},
{
filename : 'file',
fileType:'service'
});

});
</script>
          
          
          <script src="static/js/model/user/editwork.js"></script>
          <script type="text/javascript">
var strUrl = "<?php echo $strUrl;?>";
var splitStr = ",";
window.UEDITOR_HOME_URL = "<?php echo $basic_config['website_url'];?>/static/js/ueditor/"; 
  </script>
  <script type="text/javascript" src="static/js/ueditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="static/js/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="static/js/ueditor/lang/zh-cn/zh-cn.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
var ue = UE.getEditor('goodsdesc', {
//这里可以选择自己需要的工具按钮名称,此处仅选择如下五个
initialFrameWidth : '100%',
initialFrameHeight : '200',
toolbars: [[
'source', '|', 'undo', 'redo', '|',
'bold', 'italic', 'underline',  'superscript', 'subscript', 'removeformat',  'pasteplain', '|', 'forecolor', 'backcolor', 'cleardoc', '|',
'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
'touppercase', 'tolowercase', '|',
'emotion','wordimage',
            'simpleupload'
]]
});
</script>


<?php keke_tpl_class::ob_out();?>