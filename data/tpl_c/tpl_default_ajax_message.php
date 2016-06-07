<?php keke_tpl_class::checkrefresh('tpl/default/ajax/message', '1452312249' );?>	<form role="form" action="index.php?do=ajax&view=message" method="post" class="form-horizontal" name="sendMsgForm" id="sendMsgForm">
        	<input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>">
<input type="hidden" name="id" value="<?php echo $id;?>">
        	 <div class="form-group">
          <label class="col-sm-2 control-label" for="birthday">收件人:</label>
          <div class="col-sm-10 row">
            <div class="col-sm-8">
            	<input type="text" name="to_username" id="to_username" value="<?php echo $userArrData['username'];?>"  size="39"  class="form-control " readonly="readonly"/>
            </div>
          </div>
        </div>
         <div class="form-group">
          <label class="col-sm-2 control-label" for="birthday">消息标题：</label>
          <div class="col-sm-10 row">
            <div class="col-sm-8">
             <input type="text" name="title" id="title"  size="39"   class="form-control "/>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label" for="birthday">消息内容：</label>
          <div class="col-sm-10 row">
            <div class="col-sm-8">
              <textarea  rows="12" name="content" id="content"  style="width:390px;"  class="form-control "></textarea>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
          	 <button class="btn btn-default" type="submit" value="1" >发送</button>
            <span class="text-success" id="tipsUser"></span>
          </div>
        </div>
</form>
    
<script type="text/javascript">
$(function(){
//发送消息
$('#sendMsgForm').scojs_valid({
rules: {
    	to_username : ['not_empty'],
    	title: ['not_empty',{'min_length': 4}],
    	content:['not_empty']
    },
    messages: {
    	to_username:{
    		not_empty:"请输入收件人"
    	},
    	title: {
not_empty: "请输入信息标题",
min_length: "最少输入四位字符"
},
content:{
not_empty: "信息内容",
min_length: "最少输入10位字符，最多输入500位字符"
}
    },
wrapper:'.form-group',onSuccess: function(response, validator) {
    	  tipsUser(response.data,response.status);
    		setTimeout(function(){
$('.close').trigger('click');
},2000);
}
});
});
</script><?php keke_tpl_class::ob_out();?>