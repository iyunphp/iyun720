<?php keke_tpl_class::checkrefresh('admin/tpl/admin_config_basic', '1455866070' );?><!DOCTYPE HTML>
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
    	<h1><?php echo $_lang['global_config'];?></h1>
         <div class="tool">
            <a href="index.php?do=config&view=basic&op=info" <?php if($op == 'info') { ?>class="here"<?php } ?> > <?php echo $_lang['website_config'];?></a>
            <a href="index.php?do=config&view=basic&op=conf" <?php if($op == 'conf') { ?>class="here"<?php } ?> >	<?php echo $_lang['basic_config'];?></a>
<a href="index.php?do=config&view=basic&op=seo" <?php if($op == 'seo') { ?>class="here"<?php } ?> ><?php echo $_lang['seo_config'];?></a>
<a href="index.php?do=config&view=mail" <?php if($view == 'mail') { ?>class="here"<?php } ?> ><?php echo $_lang['mail_config'];?></a>
<a href="index.php?do=config&view=basic&op=smsinterface" <?php if($op == 'smsinterface') { ?>class="here"<?php } ?> ><?php echo $_lang['smsinterface'];?></a>
    	</div>
</div>
<div class="box post">
        <div class="tabcon">
        	<div class="title"><h2><?php if($op == 'info') { ?><?php echo $_lang['website_config'];?><?php } elseif($op == 'conf') { ?><?php echo $_lang['basic_config'];?><?php } elseif($op == 'seo') { ?>SEO配置<?php } elseif($op=='smsinterface') { ?><?php echo $_lang['smsinterface_config'];?><?php } ?></h2>
</div>
            <div class="detail">
            	<?php if($op=='smsinterface') { ?>
            	<form name="frm_config_smsinterface" id="frm_config_smsinterface" action="index.php?do=config&view=basic&op=smsinterface" method="post" accept-charset="<?php echo $_K['charset'];?>" enctype='multipart/form-data'>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
                        <td>是否开启短信接口&nbsp&nbsp&nbsp
<input type="radio" id="sms_close" name="sms_switch" onclick="closeSms();" value="close" <?php if($smsInterface['v']!='open') { ?> checked="checked" <?php } ?>>关闭
<input type="radio" id="sms_open" name="sms_switch" onclick="openSms();" value="open" title="开启短信功能" <?php if($smsInterface['v']=='open') { ?> checked="checked" <?php } ?>>开启
</td>
</tr>
<tr>
<td>
<span id='kekelic'></span>
</td>
</tr>
<tr id="mobile_username" <?php if($smsInterface['v']=='close') { ?>class="hidden"<?php } ?>>
        <th>短信账号：</th>
        <td>
        	<input type="text" name="mobile_username" value="<?php echo $config_arr['mobile_username'];?>" class="txt"/><b style="color:red">*</b>
            <span id="txt_max_size_msg"></span>
        </td>
    </tr>
    <tr id="mobile_password" <?php if($smsInterface['v']=='close') { ?>class="hidden"<?php } ?>>
    	<th>
        	短信密码：
        </th>
        <td>
            <input type="text" name="mobile_password" value="<?php echo $config_arr['mobile_password'];?>" class="txt"/><b style="color:red">*</b>
            <span id="txt_file_type_msg"></span>
        </td>
    </tr>
    <tr>
    <th scope="row">&nbsp;</th>
<td>
<div class="clearfix padt10">
                	<button class="positive pill primary button" type="submit" name='submit' value="<?php echo $_lang['submit'];?>"><span class="check icon"></span><?php echo $_lang['submit'];?></button>
                </div>
</td></tr>
</table>
<?php } else { ?>
                 <form name="frm_config_basic" id="frm_config_basic" action="index.php?do=config&view=basic&op=<?php echo $op;?>" method="post" accept-charset="<?php echo $_K['charset'];?>" enctype='multipart/form-data'>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                     <?php if($op=='info') { ?>
  <tr>
                        <th scope="row" width="130"> <?php echo $_lang['site_name'];?><?php echo $_lang['zh_mh'];?></th>
                        <td>
<input type="text" size="50" class="txt" name="website_name"
 value="<?php echo $config_arr['website_name']?>" maxlength="100"
 limit="required:true;len:3-100;general:false"
 msg="<?php echo $_lang['site_name_cannot_be_empty'];?><?php echo $_lang['zh_dh'];?><?php echo $_lang['length_3_100'];?>" title='<?php echo $_lang['please_input_the_website_name'];?>'
 msgArea="web_name_msg" />
                    	<span id="web_name_msg"></span>
<br/>&nbsp;&nbsp;<?php echo $_lang['site_name_description'];?>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><?php echo $_lang['website_URL'];?><?php echo $_lang['zh_mh'];?></th>
                        <td><input type="text" size="50" name="website_url"  value="<?php echo $config_arr['website_url']?>" maxlength="100" limit="required:true;len:3-100;general:false" msg="<?php echo $_lang['website_address_error'];?><?php echo $_lang['zh_dh'];?><?php echo $_lang['length'];?>3-100" msgArea="web_url_msg" class="txt"/>
                    <span id="web_url_msg"></span><br/>&nbsp;&nbsp;<?php echo $_lang['fill_in_your_site_complete_domain_name'];?><?php echo $_lang['zh_jh'];?><?php echo $_lang['for_example'];?>: http://www.iyun720.com<?php echo $_lang['zh_dh'];?><?php echo $_lang['not_slash_at_the_end_of'];?> (“/”) </td>
                      </tr>

                     <tr>
         <th scope="row">
                    <?php echo $_lang['website_logo'];?><?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                	<!--<input type="file" class="file" name="upload" id="upload">
<input type="hidden" name="fileid" id="fileid">-->
<div id="picker">上传LOGO</div>
<span id="span_msg" style="color:red"></span>
                    <input type="hidden" name = "web_logo" id="web_logo" value="<?php echo $web_logo_info['save_name'];?>">
 <?php if($web_logo_info['file_id']) { ?>
<ul class="upload-file-list-info" id="editfilelists">
<li id="edit-<?php echo $web_logo_info['file_id'];?>" class="affix-list-item" style="border: none;float: left;">
  
<div class="upload-file-info">

<span class="webuploader-pick-file-close" data-fileid="<?php echo $web_logo_info['file_id'];?>" data-queued-id="edit-<?php echo $web_logo_info['file_id'];?>" data-fileurl="<?php echo $web_logo_info['save_name'];?>">
<i class="close"></i>
</span>

<span class="fname" style="width:100%">
<img src="<?php echo imageClass::absUrl($web_logo_info['save_name']); ?>" width="210px;" height="65px;" id="logo_img">
</span>
</div>

</li>
</ul>
<?php } ?>


 <div style="clear:both;"></div>
<div class="form-group ">
<div class="col-sm-offset-2 col-sm-6">
<ul class="affix-list upload-file-list-info" id="fileList" style="width:210px;"></ul>
</div>
</div>
&nbsp;&nbsp;LOGO建议大小：<?php echo $_lang['height'];?>65px <?php echo $_lang['width'];?>210px <?php echo $_lang['map_type'];?>:jpeg,gif,png,jpg
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?php echo $_lang['company_name'];?><?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <input type="text" size="50" name="company" value="<?php echo $config_arr['company'];?>" limit="len:3-100" msg="<?php echo $_lang['company_name'];?><?php echo $_lang['length'];?><?php echo $_lang['zh_mh'];?>3-100,<?php echo $_lang['no_special_characters'];?>" msgArea="txt_company_msg" class="txt"/><span id="txt_company_msg"></span><br/>&nbsp;&nbsp;<?php echo $_lang['bottom_show_contact'];?>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?php echo $_lang['contact_address'];?><?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <input type="text" size="50" maxlength="200" name="address" value="<?php echo $config_arr['address'];?>" limit="len:3-200;general:false" msg="<?php echo $_lang['contact_address'];?><?php echo $_lang['length'];?><?php echo $_lang['zh_mh'];?>3-200" msgArea="txt_address_msg" class="txt"/><span id="txt_address_msg"></span><br/>&nbsp;&nbsp;<?php echo $_lang['bottom_show_contact'];?>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?php echo $_lang['contact_tel'];?><?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <input type="text" size="50" maxlength="20" name="phone" value="<?php echo $config_arr['phone'];?>" class="txt"/><br/>&nbsp;&nbsp;<?php echo $_lang['bottom_show_contact'];?>
                </td>
            </tr>


            <tr>
                <th scope="row">
                    <?php echo $_lang['zip_the_website_registration'];?><?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <input type="text" size="50" name="filing" value="<?php echo $config_arr['filing'];?>" limit="len:3-20;general:false" msg="<?php echo $_lang['record_number_length'];?>3-20" msgArea="txt_filing_msg" class="txt"/><span id="txt_filing_msg"></span><br/>&nbsp;&nbsp;<?php echo $_lang['icp_info'];?>
                </td>
            </tr>

    <tr>
                <th scope="row">
                                                      前台页脚版权信息修改<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                   <input type="text" size="50" name="copyright" value="<?php echo $config_arr['copyright'];?>" limit="len:3-100" msg="" msgArea="" class="txt"/><span id=""></span><br/>将显示在页面底部的版权信息处
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <?php echo $_lang['default_lang'];?><?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                <select name="lang">
                <?php if(is_array($lang_arr)) { foreach($lang_arr as $k => $v) { ?>
                	<option value="<?php echo $k;?>" <?php if($config_arr['lang']==$k) { ?>selected<?php } ?>><?php echo $v;?></option>
                <?php } } ?>
                </select>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?php echo $_lang['third_party_code_statistics'];?><?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <textarea cols="50" name="stats_code" msg="<?php echo $_lang['third_party_code_statistics'];?><?php echo $_lang['length'];?>3-500" msgArea="txt_stats_code_msg" rows="3" class="textarea"><?php echo stripslashes(stripslashes($config_arr['stats_code'])); ?></textarea>
                    <span id="txt_stats_code_msg"></span><br/>&nbsp;&nbsp;<?php echo $_lang['js_code'];?>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?php echo $_lang['is_close'];?><?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <label for="checkclose1">
                        <input type="radio" id="checkclose1" name="is_close" <?php if($config_arr['is_close']==1) { ?>checked="checked"<?php } ?> value="1" /><?php echo $_lang['close'];?>
                    </label>
                    <label for="checkclose2">
                        <input type="radio" id="checkclose2" name="is_close" <?php if($config_arr['is_close']==2) { ?>checked="checked"<?php } ?> value="2" /><?php echo $_lang['open'];?>
                    </label>
                </td>
            </tr>
            <tr id="close_true" style="display:none;">
                <th scope="row">
                    <?php echo $_lang['website_close_reason'];?><?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <textarea cols="52" name="close_reason" rows="3" class="textarea"><?php echo $config_arr['close_reason'];?></textarea>
                </td>
            </tr>
<?php } elseif($op=='conf') { ?>

     <!--    <tr>
                <th scope="row">
                    <?php echo $_lang['voucher_is_enabled'];?><?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <label for="rdo_credit_is_allow">
                        <input type="radio" id="rdo_credit_is_allow" onclick="if(this.checked){$('#sp_inp_credit_rename').hide();}else{$('#sp_inp_credit_rename').show()}" name="credit_is_allow" <?php if($config_arr['credit_is_allow']==2) { ?>checked="checked" <?php } ?> value="2"><?php echo $_lang['close'];?>
                    </label>
                    <label for="rdo_crdeit_is_allow2">
                        <input type="radio" id="rdo_crdeit_is_allow2" onclick="if(this.checked){$('#sp_inp_credit_rename').show();}else{$('#sp_inp_credit_rename').hide()}" name="credit_is_allow" <?php if($config_arr['credit_is_allow']==1) { ?>checked="checked" <?php } ?> value="1"><?php echo $_lang['open'];?>
                    </label><b style="font-weight:normal;" id="sp_inp_credit_rename" <?php if($credit_is_allow==2) { ?>style="display:none;"<?php } ?>><?php echo $_lang['vouchers_renamed'];?><?php echo $_lang['zh_mh'];?>  <input type="text"  class="txt" name="credit_rename" id="inp_credit_rename" value="<?php echo $config_arr['credit_rename']?>">(<?php echo $_lang['default_please_leave_blank'];?>)</b>
                </td>
            </tr> -->
<!-- 			<tr>
                <th scope="row">
                    附件大小限制<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <input type="text" size="50" name="max_size" value="<?php echo $config_arr['max_size'];?>" limit="required:true;type:int;len:1-2" value="2" msg="附件大小限制" msgArea="txt_max_size_msg" class="txt"/><b style="color:red">*</b>
                    <span id="txt_max_size_msg"></span><?php echo $_lang['attachment_cap_notice'];?>,该配置生效需配合php.ini,<a href="http://bbs.kppw.cn/thread-32292-1-1.html" target="_blank">查看详细</a>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?php echo $_lang['attachment_format'];?><?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <input type="text" size="50" name="file_type" value="<?php echo $config_arr['file_type'];?>" limit="required:true;len:3-100;general:false" msg="<?php echo $_lang['attachment_format_msg'];?><?php echo $_lang['zh_mh'];?>3-100" msgArea="txt_file_type_msg" class="txt"/><b style="color:red">*</b>
                    <span id="txt_file_type_msg"></span><?php echo $_lang['attachment_format_notice'];?>
                </td>
            </tr> -->
            <tr>
                <th scope="row">
                    <?php echo $_lang['user_disable_keyword'];?><?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <textarea cols="50" name="ban_users" rows="3" class="textarea"><?php echo $config_arr['ban_users'];?></textarea>
                   <?php echo $_lang['user_disable_keyword_msg'];?>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <?php echo $_lang['content_disable_keyword'];?><?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <textarea cols="50" name="ban_content" rows="3" class="textarea"><?php echo $config_arr['ban_content'];?></textarea>
                   <?php echo $_lang['content_disable_keyword_msg'];?>
                </td>
            </tr>
            <?php if(THEME === TRUE ) { ?>
<tr>
                <th scope="row">
                   <?php echo $_lang['css_auto_fit'];?><?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                	<label for="red_reg">
                        <input type="radio" id="rdo_reg" name="css_auto_fit" <?php if($config_arr['css_auto_fit']==1) { ?>checked="checked" <?php } ?>value="1" /><?php echo $_lang['open'];?>
                    </label>
                    <label for="rdo_reg2">
                        <input type="radio" id="rdo_reg2" name="css_auto_fit" <?php if($config_arr['css_auto_fit']==0) { ?>checked="checked" <?php } ?>value="0" /><?php echo $_lang['close'];?>
                    </label>
                </td>
            </tr>
<tr>
                <th scope="row">
                   开启IM<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                	<label for="rdo_open_im">
                        <input type="radio" id="rdo_open_im" name="open_im" <?php if($config_arr['open_im']==1) { ?>checked="checked" <?php } ?>value="1" /><?php echo $_lang['open'];?>
                    </label>
                    <label for="rdo_open_im2">
                        <input type="radio" id="rdo_open_im2" name="open_im" <?php if($config_arr['open_im']==0) { ?>checked="checked" <?php } ?>value="0" /><?php echo $_lang['close'];?>
                    </label>
(此功能需单独购买IM工具，否则无效	)
                </td>
            </tr>
            <?php } ?>
            <tr>
                <th scope="row">
                    <?php echo $_lang['register_time_limit'];?><?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <input type="text" size="51" name="reg_limit" value="<?php echo $config_arr['reg_limit'];?>" limit="type:int" msg="<?php echo $_lang['register_time_limit_msg'];?>" msgArea="txt_reg_limit_msg" class="txt"/><span id="txt_reg_limit_msg"></span><?php echo $_lang['register_time_limit_notice'];?>
                </td>
            </tr>
<tr>
                <th scope="row">
                   <?php echo $_lang['user_email_active'];?><?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                	<label for="red_reg">
                        <input type="radio" id="rdo_reg" name="allow_reg_action" <?php if($config_arr['allow_reg_action']==1) { ?>checked="checked" <?php } ?>value="1" /><?php echo $_lang['open'];?>
                    </label>
                    <label for="rdo_reg2">
                        <input type="radio" id="rdo_reg2" name="allow_reg_action" <?php if($config_arr['allow_reg_action']==0) { ?>checked="checked" <?php } ?>value="0" /><?php echo $_lang['close'];?>
                    </label>
<?php echo $_lang['user_email_active_notice'];?>

                </td>
            </tr>
<?php } elseif($op=='seo') { ?>

<tr>
               <th scope="row">
                      <?php echo $_lang['is_pseudo_static'];?><?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <label for="rdo_is_rewrite_1">
                        <input type="radio" id="rdo_is_rewrite_1" name="is_rewrite" <?php if($config_arr['is_rewrite']==0||!$config_arr['is_rewrite']) { ?> checked="checked" <?php } ?> value="0" /><?php echo $_lang['close'];?>
                    </label>
                    <label for="rdo_is_rewrite_2">
                        <input type="radio" id="rdo_is_rewrite_2" name="is_rewrite" <?php if($config_arr['is_rewrite']==1) { ?> checked="checked" <?php } ?> value="1" /><?php echo $_lang['open'];?>
                    </label>
<br>伪静态生效必须依赖服务器的支持.. 请先完成服务器配置再开启本开关
<span ><a href="http://bbs.kppw.cn/bbs_redirect.php?c=8" target="_blank" style="font-size:small;"><?php if($op == 'seo') { ?>查看伪静态配置说明<?php } ?></a></span>
                </td>
            </tr>

<tr>
               <th scope="row">
            <?php echo $_lang['second_domain'];?>
                </th>
                <td>
                    <label for="rdo_second_domain_1">
                        <input type="radio" id="rdo_second_domain_1" name="second_domain" <?php if($config_arr['second_domain']==0||!$config_arr['second_domain']) { ?> checked="checked" <?php } ?> value="0" /><?php echo $_lang['close'];?>
                    </label>
                    <label for="rdo_second_domain_2">
                        <input type="radio" id="rdo_second_domain_2" name="second_domain" <?php if($config_arr['second_domain']==1) { ?> checked="checked" <?php } ?> value="1" /><?php echo $_lang['open'];?>
                    </label>
<span id="t_domain" style='display:none;'>
<input type="text" size="20" name="top_domain" id="top_domain" value="<?php echo $config_arr['top_domain'];?>"
 class="txt"><b style="color:red">*</b><?php echo $_lang['top_domain_desc'];?>
              		</span>
<div>(<?php echo $_lang['pan_analytic'];?>)</div>
   </td>
            </tr>
            <tr>
                <th scope="row">
                    首页seo标题<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <input type="text" size="50" name="index_seo_title" value="<?php echo $config_arr['index_seo_title'];?>" limit="required:true;len:3-100;general:false" msg="<?php echo $_lang['website_title_msg'];?>" msgArea="index_seo_title_msg" maxlength="100" class="txt"/><b style="color:red">*</b>
                    <span id="index_seo_title_msg"></span><?php echo $_lang['website_title_notice'];?>
                </td>
            </tr>
<tr>
                <th scope="row">
                    首页seo关键字<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <input type="text" size="50" name="index_seo_keyword" value="<?php echo $config_arr['index_seo_keyword'];?>" limit="required:true;len:3-500;general:false" msg="<?php echo $_lang['meta_keywords_msg'];?>" msgArea = "index_seo_keywords_msg" class="txt"/>
                    <span id="index_seo_keywords_msg"></span><?php echo $_lang['meta_keywords_notice'];?>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    首页seo描述<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <textarea cols="50" rows="8" name="index_seo_desc" limit="required:true;len:3-500;general:false" msg="<?php echo $_lang['meta_description_msg'];?>" msgArea = "index_seo_description_msg" rows="3" class="textarea"><?php echo $config_arr['index_seo_desc'];?></textarea>
                    <span id="index_seo_description_msg"></span><?php echo $_lang['meta_description_notice'];?>
                </td>
            	</tr>
 <tr>
                <th scope="row">
                    任务大厅seo标题<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <input type="text" size="50" name="task_seo_title" value="<?php echo $config_arr['task_seo_title'];?>" limit="required:true;len:3-100;general:false" msg="<?php echo $_lang['website_title_msg'];?>" msgArea="task_seo_title_msg" maxlength="100" class="txt"/><b style="color:red">*</b>
                    <span id="task_seo_title_msg">(可用变量) {<?php echo 地区;?>}{<?php echo 行业;?>}{<?php echo 子行业;?>}{<?php echo 任务模式;?>}{<?php echo 赏金状态;?>}{<?php echo 任务状态;?>}</span>
                </td>
            </tr>
<tr>
                <th scope="row">
                    任务大厅seo关键字<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <input type="text" size="50" name="task_seo_keyword" value="<?php echo $config_arr['task_seo_keyword'];?>" limit="required:true;len:3-500;general:false" msg="<?php echo $_lang['meta_keywords_msg'];?>" msgArea = "task_seo_keywords_msg" class="txt"/>
                    <span id="task_seo_keywords_msg"></span>
                </td>
            </tr>
            <tr>
                <th scope="row">
                   任务大厅seo描述<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <textarea cols="50" rows="8" name="task_seo_desc" limit="required:true;len:3-500;general:false" msg="<?php echo $_lang['meta_description_msg'];?>" msgArea = "task_seo_description_msg" rows="3" class="textarea"><?php echo $config_arr['task_seo_desc'];?></textarea>
                    <span id="task_seo_description_msg"></span>
                </td>
            	</tr>
 <tr>
                <th scope="row">
                   作品seo标题<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <input type="text" size="50" name="goods_seo_title" value="<?php echo $config_arr['goods_seo_title'];?>" limit="required:true;len:3-100;general:false" msg="<?php echo $_lang['website_title_msg'];?>" msgArea="goods_seo_title_msg" maxlength="100" class="txt"/><b style="color:red">*</b>
                    <span id="goods_seo_title_msg">(可用变量) {<?php echo 地区;?>}{<?php echo 行业;?>}{<?php echo 子行业;?>}{<?php echo 作品类型;?>}</span>
                </td>
            </tr>
<tr>
                <th scope="row">
                    作品seo关键字<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <input type="text" size="50" name="goods_seo_keyword" value="<?php echo $config_arr['goods_seo_keyword'];?>" limit="required:true;len:3-500;general:false" msg="<?php echo $_lang['meta_keywords_msg'];?>" msgArea = "goods_seo_keywords_msg" class="txt"/>
                    <span id="goods_seo_keywords_msg"></span>
                </td>
            </tr>
            <tr>
                <th scope="row">
                  作品seo描述<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <textarea cols="50" rows="8" name="goods_seo_desc" limit="required:true;len:3-500;general:false" msg="<?php echo $_lang['meta_description_msg'];?>" msgArea = "goods_seo_description_msg" rows="3" class="textarea"><?php echo $config_arr['goods_seo_desc'];?></textarea>
                    <span id="goods_seo_description_msg"></span>
                </td>
            	</tr>
 <tr>
                <th scope="row">
                    服务商列表seo标题<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <input type="text" size="50" name="seller_seo_title" value="<?php echo $config_arr['seller_seo_title'];?>" limit="required:true;len:3-100;general:false" msg="<?php echo $_lang['website_title_msg'];?>" msgArea="seller_seo_title_msg" maxlength="100" class="txt"/><b style="color:red">*</b>
                    <span id="seller_seo_title_msg">(可用变量) {<?php echo 地区;?>}{<?php echo 店铺类型;?>}{<?php echo 行业;?>}{<?php echo 子行业;?>}</span>
                </td>
            </tr>
<tr>
                <th scope="row">
                    服务商列表seo关键字<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <input type="text" size="50" name="seller_seo_keyword" value="<?php echo $config_arr['seller_seo_keyword'];?>" limit="required:true;len:3-500;general:false" msg="<?php echo $_lang['meta_keywords_msg'];?>" msgArea = "seller_seo_keywords_msg" class="txt"/>
                    <span id="seller_seo_keywords_msg"></span>
                </td>
            </tr>
            <tr>
                <th scope="row">
                   服务商列表seo描述<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <textarea cols="50" rows="8" name="seller_seo_desc" limit="required:true;len:3-500;general:false" msg="<?php echo $_lang['meta_description_msg'];?>" msgArea = "seller_seo_description_msg" rows="3" class="textarea"><?php echo $config_arr['seller_seo_desc'];?></textarea>
                    <span id="seller_seo_description_msg"></span>
                </td>
            	</tr>
 <tr>
                <th scope="row">
                    成功案例seo标题<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <input type="text" size="50" name="case_seo_title" value="<?php echo $config_arr['case_seo_title'];?>" limit="required:true;len:3-100;general:false" msg="<?php echo $_lang['website_title_msg'];?>" msgArea="case_seo_title_msg" maxlength="100" class="txt"/><b style="color:red">*</b>
                    <span id="case_seo_title_msg">(可用变量){<?php echo 案例类型;?>}</span>
                </td>
            </tr>
<tr>
                <th scope="row">
                    成功案例seo关键字<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <input type="text" size="50" name="case_seo_keyword" value="<?php echo $config_arr['case_seo_keyword'];?>" limit="required:true;len:3-500;general:false" msg="<?php echo $_lang['meta_keywords_msg'];?>" msgArea = "case_seo_keywords_msg" class="txt"/>
                    <span id="case_seo_keywords_msg"></span>
                </td>
            </tr>
            <tr>
                <th scope="row">
                   成功案例seo描述<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <textarea cols="50" rows="8" name="case_seo_desc" limit="required:true;len:3-500;general:false" msg="<?php echo $_lang['meta_description_msg'];?>" msgArea = "case_seo_description_msg" rows="3" class="textarea"><?php echo $config_arr['case_seo_desc'];?></textarea>
                    <span id="case_seo_description_msg"></span>
                </td>
            	</tr>
 <tr>
                <th scope="row">
                    资讯中心seo标题<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <input type="text" size="50" name="article_seo_title" value="<?php echo $config_arr['article_seo_title'];?>" limit="required:true;len:3-100;general:false" msg="<?php echo $_lang['website_title_msg'];?>" msgArea="article_seo_title_msg" maxlength="100" class="txt"/><b style="color:red">*</b>
                    <span id="article_seo_title_msg">(可用变量){<?php echo 资讯分类;?>}</span>
                </td>
            </tr>
<tr>
                <th scope="row">
                    资讯中心seo关键字<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <input type="text" size="50" name="article_seo_keyword" value="<?php echo $config_arr['article_seo_keyword'];?>" limit="required:true;len:3-500;general:false" msg="<?php echo $_lang['meta_keywords_msg'];?>" msgArea = "article_seo_keywords_msg" class="txt"/>
                    <span id="article_seo_keywords_msg"></span>
                </td>
            </tr>
            <tr>
                <th scope="row">
                   资讯中心seo描述<?php echo $_lang['zh_mh'];?>
                </th>
                <td>
                    <textarea cols="50" rows="8" name="article_seo_desc" limit="required:true;len:3-500;general:false" msg="<?php echo $_lang['meta_description_msg'];?>" msgArea = "article_seo_description_msg" rows="3" class="textarea"><?php echo $config_arr['article_seo_desc'];?></textarea>
                    <span id="article_seo_description_msg"></span>
                </td>
            	</tr>
<?php } ?>
<th scope="row">&nbsp;</th>
<td>
<div class="clearfix padt10">
                                <button class="positive pill primary button" type="submit" name='submit' value="<?php echo $_lang['submit'];?>"><span class="check icon"></span><?php echo $_lang['submit'];?></button>

                </div>
</td>

                    </table>



        </form>
<?php } ?>
            </div>
        </div>


    </div>

<script src="../static/js/uploadify/jquery.uploadify.min.js?r=<?php echo RANDOM_PARA;?>" type="text/javascript">
        </script>

<script type="text/javascript" src="<?php echo $notice?>" charset="gbk">
</script>
<script type="text/javascript">

function openSms(){
if($("#kekelic").find("a")){
var str='<p>尊敬的用户:<p></span>鉴于短信服务的通信服务商的稳定性问题，我们暂时关闭了内置的通信服务商的配置您需要先自行和短信服务商接洽，再接入短信，然后才能开启短信服务。</span><p>关于短信服务的接入教程~  <a href="http://bbs.kppw.cn/bbs_redirect.php?c=6" target="_blank">参考教程</a></p>';
$("#kekelic").replaceWith("<span id='kekelic'>"+str+"</span>");
}else{
$("#kekelic").replaceWith("<span id='kekelic'><p>小提示:短信接口开启后，即可开通短信发送功能。点击信息模板可以配置短信提醒和模板内容</p></span>");
}
$.post('index.php?do=config&view=basic&op=smsinterface&s=open');
}
function closeSms(){
if('<?php echo $authOpen["auth_open"];?>' ==1){
if(confirm('关闭短信接口将同步关闭手机认证')){
$("#sms_close").attr("checked","checked");
$.post('index.php?do=config&view=basic&op=smsinterface&s=close');
}else{
$("#sms_open").attr("checked","checked");
}
}else{
$("#sms_close").attr("checked","checked");
$.post('index.php?do=config&view=basic&op=smsinterface&s=close');
}
}

$(function(){
//	$("#kekelic").addClass("hidden");
if($("#kekelic").find("a")){
$("#kekelic").replaceWith("<span id='kekelic'><a></a></span>");
}
})

</script>
<script type="text/javascript">
    $(function(){
    	$("#rdo_second_domain_2").click(function(){
$("#t_domain").show();
});
if($("#rdo_second_domain_2").is(":checked")){
$("#t_domain").show();
}
    	$("#rdo_second_domain_1").click(function(){
$("#t_domain").hide();
});
        $("#frm_config_basic").submit(function(){
            var value = $("#fle_web_logo").val();
            if (value) {
                s = value.lastIndexOf(".");
                lastname = value.substring(s, value.length);
                if (lastname.toLowerCase() != ".gif" && lastname.toLowerCase() != ".jpg" && lastname.toLowerCase() != ".png" && lastname.toLowerCase() != ".jpeg") {
                    alert("<?php echo $_lang['file_type_error'];?>")
                    $(this).focus();
                    return false;
                }
                else {
                    return true;
                }
            }

        });
        if ($("#checkclose1").attr("checked")) {
            $("#close_true").show();
        }
        else {
            $("#close_true").hide();
        }
        $("#checkclose1").click(function(){
            $("#close_true").show();
        });
        $("#checkclose2").click(function(){
            $("#close_true").hide();
        });

});
</script>

<script type="text/javascript">
var baseurl = "<?php echo $basic_config['website_url'];?>";
var uploadsize = parseInt("<?php echo $basic_config['max_size'];?>");
uploadsize =  isNaN(uploadsize)? 1 : uploadsize;
$(function(){
$("#picker").KKUploader({
accept: {
extensions : 'jpg,gif,png,jpeg'
},
fileNumLimit:1,
hiddenName:'web_logo',
hiddenValType:'2',
listName:'fileList',	
editListName:'editfilelists',	
fileSingleSizeLimit:uploadsize*1024*1024
},
{
fileType: 'sys',
        		objType: 'space',
filename : 'file',
});
});

</script>
<script type="text/javascript">
$(function(){
$("#sms_close").click(function(){
$("#mobile_username").addClass("hidden");
$("#mobile_password").addClass("hidden");
});
$("#sms_open").click(function(){
$("#mobile_username").removeClass("hidden");
$("#mobile_password").removeClass("hidden");
});
});
</script>
<link rel="stylesheet" type="text/css" href="tpl/js/webuploader/webuploader.css">
<script type="text/javascript" src="../static/js/jquery.min.js?r=<?php echo RANDOM_PARA;?>"></script>
<script type="text/javascript" src="tpl/js/webuploader/webuploader.js?r=<?php echo RANDOM_PARA;?>"></script>
<script type="text/javascript" src="tpl/js/webuploader/kppw.webuploader.js"></script>
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