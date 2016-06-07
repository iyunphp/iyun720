<?php keke_tpl_class::checkrefresh('admin/tpl/show_msg', '1455866065' );?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_K['charset'];?>">
<meta http-equiv="refresh" content="<?php echo $time?>;url=<?php echo $url?>">
<title><?php echo $_lang['jump_notice'];?></title>
</head>
<link href="tpl/css/admin_management.css" rel="stylesheet" type="text/css" />
<link title="style1" href="tpl/skin/default/style.css" rel="stylesheet" type="text/css" />
<link title="style2" href="tpl/skin/light/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="systips">
        <div class="systips_detail <?php echo $type;?>">
            	<div class="tip_icon">&nbsp;</div>
                <div class="tip_title"><?php echo $title;?> ，<?php echo $_lang['page_jump'];?>...</div>
                <div class="tip_messages"><?php echo $content;?><span id="time"><?php echo $time?></span> <?php echo $_lang['auto_location_later'];?></div>
                <div class="tip_help"><?php echo $_lang['click_jump'];?><a href="<?php echo $url;?>" class="button"><span class="icon rightarrow">&nbsp;</span><?php echo $_lang['here'];?></a></div>
            
        </div>
    </div>
<script type='text/javascript'>
window.onload=function(){
setInterval(show_time, 1000);
}
function show_time(){
var time = document.getElementById("time").innerHTML;
time = parseInt(time);
if (time > 0)
{
time -= 1; 
}

document.getElementById("time").innerHTML = time;
}
</script>
</body>
</html><?php keke_tpl_class::ob_out();?>