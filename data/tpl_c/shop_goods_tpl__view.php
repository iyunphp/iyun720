<?php keke_tpl_class::checkrefresh('shop/goods/tpl/default/view', '1455866304' );?><!DOCTYPE html>
<html>
<head>
<title><?php echo $strPageTitle;?></title>
    <meta name="keywords" content="<?php echo $strPageKeyword;?>">
    <meta name="description" content="<?php echo $strPageDescription;?>">    
<meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="IE=edge" />
<link href="/tpl/default/css/p.css" rel="stylesheet" type="text/css">
<script src="static/js/jquery.min.js"></script>
<style>
@-ms-viewport { width:device-width; }
@media only screen and (min-device-width:800px) { html { overflow:hidden; } }
html { height:100%; }
body { height:100%; overflow:hidden; margin:0; padding:0; font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#FFFFFF; background-color:#000000; }
.pano{
position:relative;
width:100%;
height:100%; 
}
</style>
<script>
var isClick = false;
var panoTag = 0;
var mLeft = 0;
var mTop = 0;
function init(){
document.getElementById('pano').onmousedown = function(ev){
down_pano(ev);
}

document.getElementById('pano').onmouseup = function(ev){
up_pano(ev);
}
}

function down_pano(ev){
clearTimeout(panoTag);
isClick = true;
panoTag = setTimeout(function(){
isClick = false;
}, 1000);

var oEvent=ev||event;
var oLeft = mLeft = oEvent.clientX;
var oTop = mTop = oEvent.clientY;
}

function up_pano(ev){
clearTimeout(panoTag);

var oEvent=ev||event;
var oLeft=oEvent.clientX;
var oTop=oEvent.clientY;
if(isClick && oLeft == mLeft && oTop == mTop && ev.button == 1){
isClick = false;
pano_callback();
}
}

function pano_callback(){
var parent = window.parent;
if(parent.iframe_callback){
parent.iframe_callback();
}
}
</script>
</head>
<body onload="init()">
<script src="<?php echo $js;?>"></script>
<div id="pano" class="pano">
<?php if($_GET['nouser']) { ?>
<?php } else { ?>
<span id="iframeInfoPanel" class="iframe_info_panel">
<span class="iframe_info">
<span class="iframe_info_user_data">
<a href="/index.php?do=goods&id=<?php echo $arrSellerInfo['service_id'];?>">
<?php echo  keke_user_class::get_user_pic($arrSellerInfo['uid'],'larger') ?><span>作者：<?php if($arrSellerInfo['shop_name']) { ?><?php echo $arrSellerInfo['shop_name'];?><?php } else { ?><?php echo $arrSellerInfo['username'];?><?php } ?></span>
</a>
</span>
</span>
</span>
<?php } ?> 
<noscript><table style="width:100%;height:100%;"><tr style="vertical-align:middle;"><td><div style="text-align:center;">ERROR:<br/><br/>Javascript not activated<br/><br/></div></td></tr></table></noscript>
<script>
function selecthtml5usage()
{
// check for Android MQQBrowser:
if( navigator.userAgent.indexOf("Android") >= 0 && navigator.userAgent.indexOf("QQ") >= 0 )
return "auto+css3d";
// for all other cases use html5=auto:
return "auto";
}
embedpano({swf:"<?php echo $swf;?>", xml:"<?php echo $xml;?>", target:"pano", html5:selecthtml5usage(), initvars:{design:"flat"}, passQueryParameters:true});
</script>

</div>
</body>
</html><?php keke_tpl_class::ob_out();?>