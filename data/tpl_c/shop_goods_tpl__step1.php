<?php keke_tpl_class::checkrefresh('shop/goods/tpl/default/step1', '1452668298' );?><div class="release-form">
          <form class="form-horizontal" role="form" action="<?php echo $strUrl;?>&step=<?php echo $step;?>" method="post"  id="pubGoodsForm<?php echo $step;?>" name="pubGoodsForm<?php echo $step;?>">
  			<input type="hidden" name="<?php echo $step;?>" value="<?php echo $step;?>">
  			<input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>">

         

          <div class="form-group">
            <label for="txt_title" class="col-sm-2 control-label">作品名称：</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="txt_title" name="txt_title" placeholder="作品名称" value="<?php echo $arrPubInfo['txt_title'];?>">
            </div>
            <!--<div class="col-sm-3">
              <p class="form-control-static">标题最多50字符</p>
            </div>-->

          </div>
          <!-- 标题名称 end -->
  
          <div class="form-group">
            <label for="tar_content" class="col-sm-2 control-label">作品描述：</label>
            <div class="col-sm-9">
              <textarea id="tar_content" name="tar_content"   placeholder="需求描述"><?php echo $arrPubInfo['tar_content'];?></textarea>
          		 <script type="text/javascript" src="<?php echo $_K['siteurl'];?>/static/js/ueditor/ueditor.config.js"></script>
                  <!--<script type="text/javascript" src="<?php echo $_K['siteurl'];?>/static/js/ueditor/ueditor.config.admin.js"></script>-->
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="<?php echo $_K['siteurl'];?>/static/js/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="<?php echo $_K['siteurl'];?>/static/js/ueditor/lang/zh-cn/zh-cn.js"></script>
 <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('tar_content', {
            //这里可以选择自己需要的工具按钮名称,此处仅选择如下五个
        	initialFrameWidth: '100%',
        	initialFrameHeight: '200'
        });
    </script>
</div>
           <!-- <div class="col-sm-3">
              <p class="form-control-static">内容不的少于20字</p>
            </div>-->

          </div>
          <!-- 需求描述 end -->

          <!--<div class="form-group">
            <label for="upload" class="col-sm-2 control-label">全景缩略图：</label>
            <div class="col-sm-8">
 				  <div id="picker">上传缩略图</div>
              <input type="hidden"  name="fileid1" id="fileid1"  class="form-control" value="<?php if(!empty($arrImageLists)) { ?><?php echo $arrPubInfo['fileids'];?><?php } ?>">                         
            </div>     
             
          </div>-->
          <!-- 上传附件 end -->

          <div class="form-group ">
            <div class="col-sm-offset-2 col-sm-7">              
              <ul class="affix-list upload-file-list-info" id="edit_fileList_upload">
              <?php if(!empty($arrImageLists)) { ?>
              <?php if(is_array($arrImageLists)) { foreach($arrImageLists as $v) { ?>
<li id="edit-<?php echo $v['file_id'];?>" class="affix-list-item">
<div class="upload-file-info">
<span class="webuploader-pick-file-close" data-fileid="<?php echo $v['file_id'];?>" data-fileurl="<?php echo $v['save_name'];?>" data-queued-id="edit-<?php echo $v['file_id'];?>"><i class="close"></i></span>
<span class="fname"><?php echo $v['file_name'];?></span>
<span class="fsize">大小:<?php echo kekezu::fsize($v['save_name']); ?></span>
<div class="clearfix"></div>
</div>
</li>
              <?php } } ?>
              <?php } ?>
              </ul>
  <ul class="affix-list upload-file-list-info" id="fileList_upload"></ul>
            </div>
          </div>
          <!-- 附件列表 end -->
             
       
    <!--<div class="form-group">
                    
         
            <label for="submit_method" class="col-sm-2 control-label">交付方式 </label>
            <div class="col-sm-6 form-control-static">
              <input class="border_n" type="radio" id="pay_out" name="submit_method" value="outside" <?php if($arrPubInfo['submit_method']=='outside' ||!$arrPubInfo['submit_method']) { ?>checked<?php } ?>>
                <label for="pay_out">
                    联系客服
                </label>
                <input class="border_n" type="radio" id="pay_down" name="submit_method" value="inside" <?php if($arrPubInfo['submit_method']=='inside') { ?>checked<?php } ?>>
                <label for="pay_down">
                    直接下载
                </label>
            </div>

       </div>-->


       <div class="form-group" id="submit_method">
       	   <input class="border_n" type="hidden" id="pay_down" name="submit_method" value="inside" />
            <label for="upload" class="col-sm-2 control-label">作品原稿：</label>
            <div class="col-sm-8">
 				  <div id="picker1">上传原稿（全景图片/视频）</div>
              <input type="hidden"  name="file_path_2" id="file_path_2"  class="form-control" value="<?php if(!empty($arrFileLists)) { ?><?php echo $arrPubInfo['file_path_2'];?><?php } ?>">
            </div>
            <!--<div class="col-sm-3">
              <p class="form-control-static">最多1个原稿，不得超过<?php echo $basic_config['max_size'];?>M。</p>
   <span class="btn red hidden" style="color:red;"  id="uploadShopFile">请上传作品原稿</span>
            </div>-->
          </div>
          <!-- 上传附件 end -->

          <div class="form-group ">
            <div class="col-sm-offset-2 col-sm-7">
              
              <ul class="affix-list upload-file-list-info" id="edit_fileList_file_path_2">
              <?php if(!empty($arrFileLists)) { ?>
              <?php if(is_array($arrFileLists)) { foreach($arrFileLists as $v) { ?>
<li id="edit-<?php echo $v['file_id'];?>" class="affix-list-item">
<div class="upload-file-info">
<span class="webuploader-pick-file-close" data-fileid="<?php echo $v['file_id'];?>" data-fileurl="<?php echo $v['save_name'];?>" data-queued-id="edit-<?php echo $v['file_id'];?>"><i class="close"></i></span>
<span class="fname"><?php echo $v['file_name'];?></span>
<span class="fsize">大小:<?php echo kekezu::fsize($v['save_name']); ?></span>
<div class="clearfix"></div>
</div>
</li>
              <?php } } ?>
              <?php } ?>
              </ul>
  <ul class="affix-list upload-file-list-info" id="fileList_file_path_2"></ul>
            </div>
          </div>
          <!-- 附件列表 end -->

      <div class="form-group">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
              <?php if($arrCustoms && $c_open =='1') { ?> 
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
       <?php if(is_array($arrCustoms)) { foreach($arrCustoms as $k => $v) { ?><?php if($v['listorder'] > 0) { ?>
<div class="form-group">
<label for="txt_title" class="col-sm-2 control-label">
<?php echo $v['f_name'];?> <?php if($v['f_required'] =='1') { ?>
<span class="text-danger">*</span>
<?php } ?>
</label>
<div class="col-sm-7">
    <?php if($v["f_warning_select"]==1) { ?>  
    	<select id="<?php echo $v['f_code'];?>" name="<?php echo $v['f_code'];?>" class="form-control" >
    	<?php if(is_array($v['f_warning'])) { foreach($v['f_warning'] as $view_type_k => $type_v) { ?>
        	<option value="<?php echo $type_v;?>"><?php echo $type_v;?></option>
        <?php } } ?>
        </select>		
    <?php } elseif($v['f_code']=='view_music') { ?>
<div id="picker2">上传音乐</div>
    	<input type="hidden" class="form-control" id="<?php echo $v['f_code'];?>" name="<?php echo $v['f_code'];?>" minlength="<?php echo $v['f_min_len'];?>" placeholder="请输入<?php echo $v['f_name'];?>" value="<?php echo $arrPubInfo[$v['f_code']];?>" maxlength="<?php if($v['f_fixed_len']) { ?><?php echo $v['f_fixed_len'];?> <?php } else { ?> <?php if($v['f_max_len']) { ?><?php echo $v['f_max_len'];?><?php } else { ?>255<?php } ?><?php } ?>" />
        <div class="form-group ">     
            <div class="">              
              <ul class="affix-list upload-file-list-info" id="edit_fileList_file_path_3">
              <?php if(!empty($arrFileLists)) { ?>
              <?php if(is_array($arrFileLists)) { foreach($arrFileLists as $v) { ?>
<li id="edit-<?php echo $v['file_id'];?>" class="affix-list-item">
<div class="upload-file-info">
<span class="webuploader-pick-file-close" data-fileid="<?php echo $v['file_id'];?>" data-fileurl="<?php echo $v['save_name'];?>" data-queued-id="edit-<?php echo $v['file_id'];?>"><i class="close"></i></span>
<span class="fname"><?php echo $v['file_name'];?></span>
<span class="fsize">大小:<?php echo kekezu::fsize($v['save_name']); ?></span>
<div class="clearfix"></div>
</div>
</li>
              <?php } } ?>
              <?php } ?>
              </ul>
  <ul class="affix-list upload-file-list-info" id="fileList_file_path_3"></ul>
            </div>
          </div>
        
    <?php } else { ?>
    	<input type="text" class="form-control" id="<?php echo $v['f_code'];?>" name="<?php echo $v['f_code'];?>" minlength="<?php echo $v['f_min_len'];?>" placeholder="请输入<?php echo $v['f_name'];?>" value="<?php echo $arrPubInfo[$v['f_code']];?>" maxlength="<?php if($v['f_fixed_len']) { ?><?php echo $v['f_fixed_len'];?> <?php } else { ?> <?php if($v['f_max_len']) { ?><?php echo $v['f_max_len'];?><?php } else { ?>255<?php } ?><?php } ?>" >
    <?php } ?>    
</div>
<div class="col-sm-3">
<p class="form-control-static"><?php echo $v['f_tips'];?><?php if($v['f_fixed_len']) { ?> <?php echo $v['f_fixed_len'];?>字符<?php } else { ?> <?php if($v['f_min_len']) { ?><?php echo $v['f_min_len'];?><?php } ?><?php if($v['f_max_len']) { ?>-<?php echo $v['f_max_len'];?><?php } ?><?php if($v['f_min_len']) { ?>字符<?php } ?><?php } ?></p>
</div>
</div>
<?php } else { ?>
<input type="hidden" class="form-control" id="<?php echo $v['f_code'];?>" name="<?php echo $v['f_code'];?>" minlength="<?php echo $v['f_min_len'];?>" placeholder="请输入<?php echo $v['f_name'];?>" value="<?php echo $arrPubInfo[$v['f_code']];?>" maxlength="<?php if($v['f_fixed_len']) { ?><?php echo $v['f_fixed_len'];?> <?php } else { ?> <?php if($v['f_max_len']) { ?><?php echo $v['f_max_len'];?><?php } else { ?>255<?php } ?><?php } ?>" >
<?php } ?>
<?php } } ?>
      </div>
    </div>
  </div>
</div>

 <?php } ?>
            </div>
            
          </div>
          
          <div class="form-group">          
            <label class="col-xs-12 col-sm-2 control-label ">作品分类：</label>

              <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2 ">
                  <select class="form-control" name="indus_pid" id="indus_pid" onchange="getIndustry(this.value,'indus_id')">
                     <option value="">请选择分类</option>
                     <?php if(is_array($arrTopIndustrys)) { foreach($arrTopIndustrys as $v) { ?>
                     	<option value="<?php echo $v['indus_id'];?>" <?php if($arrPubInfo['indus_pid'] ==$v['indus_id']) { ?> selected="selected"<?php } ?>><?php echo $v['indus_name'];?></option>
                     <?php } } ?>
                   </select>
              </div>
              <!--<div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
                <select class="form-control" name="indus_id" id="indus_id">
                     <option value="">请选择子分类</option>
                     <?php if($arrPubInfo['indus_id']) { ?>
                      <?php if(is_array($arrAllIndustrys)) { foreach($arrAllIndustrys as $v) { ?>
<option value="<?php echo $v['indus_id'];?>" <?php if($arrPubInfo['indus_id'] == $v['indus_id']) { ?> selected="selected"<?php } ?>><?php echo $v['indus_name'];?></option>
                      <?php } } ?>
                     <?php } ?>
                   </select>
              </div>-->
              <!--<div class="col-sm-offset-2 col-sm-8">
                   <span class="help-block"></span>
                 </div>-->

          </div>
   <?php if($regionCfg['region_search_shop'] =='1') { ?>
<div class="form-group">
<label class="col-xs-12 col-sm-2 control-label">
地区分类：

</label>
<div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
<select class="form-control" name="province" id="province" onchange="getZone(this.value,'city');">
<option value="p">选择省份</option> 
<?php if(is_array($arrProvinces)) { foreach($arrProvinces as $k => $v) { ?>
<option value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option>
<?php } } ?>
</select>
</div>
<div class="col-xs-6 col-sm-3 col-md-3 col-lg-2">
<select class="form-control" name="city" id="city" onchange="getZone(this.value,'area');">
<option value="c">选择城市</option> 
<?php if(is_array($arrCities)) { foreach($arrCities as $k => $v) { ?>
<option value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option>
<?php } } ?>
</select>
</div>
<div class="col-xs-6 col-sm-3 col-md-4 col-lg-2">
<select class="form-control" name="area" id="area">
<option value="a">选择区域</option> 
<?php if(is_array($arrAreas)) { foreach($arrAreas as $k => $v) { ?>
<option value="<?php echo $v['id'];?>"><?php echo $v['name'];?></option>
<?php } } ?>
</select>
</div>
</div>
<?php } ?>
          <!-- 行业分类 end -->
          
          <div class="form-group">
            <label for="txt_price" class="col-xs-12 col-sm-2 control-label ">授权使用价： </label>
            <div class="col-sm-3 col-xs-6 col-sm-4 col-md-3 col-lg-3">
              <div class="input-group">
                <span class="input-group-addon">￥</span>
                <input type="text" class="form-control" id="txt_price" name="txt_price" placeholder="授权价格" value="<?php echo $arrPubInfo['txt_price'];?>" onkeyup="clearstr(this);">
              </div>
        </div>
            <div class="col-sm-3 col-xs-6 col-sm-4 col-md-3 col-lg-3">
    <select name="unite_price" id="unite_price" class="form-control">
                    <?php if(is_array($arrPriceUnit)) { foreach($arrPriceUnit as $v) { ?><option value="<?php echo $v;?>" <?php if($arrPubInfo['unite_price']==$v) { ?>selected<?php } ?>>/<?php echo $v;?> </option>
                    <?php } } ?>
                </select>
            </div>
            
            

       </div>
        

          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
              <button type="submit" class="btn btn-primary" value="下一步" >下一步</button>
            </div>
          </div>
          <!-- form-group end -->

          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
              <div class="checkbox">
              <label>
                <input type="checkbox" checked="checked" value="true" name="agreementchecked" id="agreementchecked"> 同意 <a href="javascript:void(0);" id="viewPubAgreement">《知识产权申明》 </a>
              </label>
            </div>
            </div>
          </div>
          <!-- form-group end -->

        </form>
        <div class="release-agreement hidden">
          <div class="agreement-header">
            <h2 class="agreement-title">《知识产权申明》</h2>
          </div>
          <p>  <?php keke_loaddata_class::readtag('作品出售协议') ?></p>
        </div>
      </div>
<link rel="stylesheet" type="text/css" href="static/js/webuploader/webuploader.css">
<script type="text/javascript" src="static/js/webuploader/webuploader.js?r=<?php echo RANDOM_PARA;?>"></script>
<script type="text/javascript" src="static/js/webuploader/kppw.webuploader.js"></script>
<script type="text/jscript">
$(function(){
var uploadsize = parseInt("<?php echo $basic_config['max_size'];?>");
uploadsize =  isNaN(uploadsize)? 1 : uploadsize;




$("#picker").KKUploader(
{
accept: {
extensions 		: 'jpg,jpeg,gif,png,bmp'
},
fileNumLimit		: 1,
separator			: '|',
fileSingleSizeLimit	: uploadsize*1024*1024,
fileVal				: 'upload',
listName			: "fileList_upload",
hiddenName 			: 'fileid1',
//hiddenValType       : 2,
editListName		:'edit_fileList_upload'
},
{
filename 			: 'upload',
fileType			: 'service'
}
);


//官方上传插件
$("#picker1").KKUploader(
{
accept: {
extensions 		: '<?php echo $strExtTypes2;?>'
},
fileNumLimit		: 1,
separator			: '|',
fileSingleSizeLimit	: uploadsize*1024*1024,
fileVal				: 'upload2',
listName			: "fileList_file_path_2",
editListName		: 'edit_fileList_upload2',
hiddenName 			: 'file_path_2',
hiddenValType 		: '2'
},
{
filename 			: 'upload2',
fileType			: 'service'
}
);	

//官方上传插件 背景音乐
$("#picker2").KKUploader(
{
accept: {
extensions 		: 'mp3'
},
fileNumLimit		: 1,
separator			: '|',
fileSingleSizeLimit	: uploadsize*1024*1024,
fileVal				: 'upload3',
listName			: "fileList_file_path_3",
editListName		: 'edit_fileList_upload3',
hiddenName 			: 'view_music',
hiddenValType 		: '2'
},
{
filename 			: 'upload3',
fileType			: 'service'
}
);	

});


</script><?php keke_tpl_class::ob_out();?>