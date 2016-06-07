<?php keke_tpl_class::checkrefresh('tpl/default/index', '1455866970' );?><!DOCTYPE HTML>
<!--[if lt IE 7]> <html dir="ltr" lang="zh-cn" id="ie6"> <![endif]--><!--[if IE 7]>    <html dir="ltr" lang="zh-cn" id="ie7"> <![endif]--><!--[if IE 8]>    <html dir="ltr" lang="zh-cn" id="ie8"> <![endif]-->
<!--[if gt IE 8]><!-->
    <html dir="ltr" lang="zh-cn">
    <!--<![endif]-->
    <head>
        <title><?php echo $strPageTitle;?></title>
        <meta charset="<?php echo CHARSET;?>">
        <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />        
        <meta name="keywords" content="<?php echo $strPageKeyword;?>">
        <meta name="description" content="<?php echo $strPageDescription;?>">       
        <meta name="viewport" content="width=device-width,initial-scale=1 ,user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style” content=black" />
        <meta name="author" content="iyun720" />
        <meta name="copyright" content="<?php echo $basic_config['copyright'];?>" />	
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="/favicon.ico" type="image/x-icon"/> 
<!--[if lt IE 9]>
    <script src="static/js/html5.js" type="text/javascript"></script>
    <script src="static/js/respond.min.js" type="text/javascript"></script>
<![endif]-->

<?php if($do=='index') { ?>
<script src="static/js/jquery.min.1.8.3.js"></script>
<!-- 幻灯片 -->
<script src="static/js/jqplugins/fotorama/fotorama.js"></script>
<!-- 滚动视图 -->
<script src="static/js/jqplugins/jcarousel/jquery.jcarousel.js"></script>
<script src="static/js/jqplugins/jcarousel/jquery.jcarousel.control.js"></script>
<script src="static/js/jqplugins/jcarousel/jquery.jcarousel.autoscroll.js"></script>
<?php } else { ?>
<script src="static/js/jquery.min.js"></script>
<?php } ?>
<script src="static/js/bootstrap.min.js"></script>
<script src="static/js/jquery.form.js"></script>
<script src="static/js/jquery.lazyload.js"></script>
<script src="static/js/bootstrap-datetimepicker.js"></script>
<script src="static/js/bootstrap-datetimepicker.zh-CN.js"></script>
<script src="static/js/sco.confirm.js"></script>
<script src="static/js/sco.modal.js"></script>
<script src="static/js/sco.valid.js"></script>
<script src="static/js/holder.min.js"></script>
<script src="static/js/model/common/base.js"></script>
<script src="static/js/jquery.bgiframe.pack.js"></script>
<script src="static/js/jqplugins/jscroll/jquery.mousewheel.js"></script>
<script src="static/js/jqplugins/jscroll/jquery.jscrollpane.min.js"></script>
<script src="static/js/jquery.placeholder-enhanced.min.js" type="text/javascript"></script>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=HlkMGAhFgon122p5ucBmnoEG"></script>

<?php include(S_ROOT.'/control/include.php'); ?>

<link href="tpl/default/css/animate.css" rel="stylesheet" type="text/css">
<link href="tpl/default/css/rework.css" rel="stylesheet" type="text/css">
<link href="tpl/default/css/hongb.css" rel="stylesheet" type="text/css">
<link href="tpl/default/css/p.css" rel="stylesheet" type="text/css">
<!-- js超酷消息警告框插件  -->
<script type="text/javascript" src="static/js/swal/js/sweet-alert.min.js?r=<?php echo RANDOM_PARA;?>"></script>
<link rel="stylesheet" type="text/css" href="static/js/swal/css/sweet-alert.css">

<!--[if IE 7]>
<link rel="stylesheet" href="tpl/default/css/font-awesome-ie7.min.css">
<link href="tpl/default/css/ie7.css" rel="stylesheet" type="text/css">
<![endif]-->

<!--[if IE 8]>
  <link href="tpl/default/css/ie8.css" rel="stylesheet" type="text/css">
  <script src="static/js/IE8.js" type="text/javascript"></script>
<![endif]-->
        <script type="text/javascript">
            var SITEURL = '<?php echo $_K['siteurl'];?>', SKIN_PATH = '<?php echo SKIN_PATH;?>', LANG = '<?php echo $language;?>', INDEX = '<?php echo $do;?>', CHARSET = '<?php echo CHARSET;?>';
            function   closeErrors()   {
              return   true;
            }
            window.onerror=closeErrors;

$(function(){
init_footer();
$(window).resize(function(){
init_footer();
});
});

function init_footer(){
/*if($(window).height() > $('body').height()){
$('.footer').addClass('fixed');
} else {
$('.footer').removeClass('fixed');
}*/
}

        </script>


    </head>
    <body id="<?php echo $do;?>">
    <div class="header">
<nav class="navbar navbar-default navbar-fixed-top top">
<div class="container-fluid">
<div class="layout_center">
<div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="<?php echo SITEURL;?>/index.php"><img src="<?php echo $strWebLogo;?>?s" alt="<?php echo $strPageTitle;?>" height="100%"/></a>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav">
<?php if(is_array($nav_arr)) { foreach($nav_arr as $k => $v) { ?>
<li <?php if($v['nav_style']==$do ||$v['nav_style']==$strNavActive) { ?>class="active"<?php } ?> ><a href="<?php echo $v['nav_url'];?>" <?php if($v['newwindow']) { ?>target="_blank"<?php } ?>><span><?php echo $v['nav_title'];?></span></a></li>
<?php } } ?>           
  </ul>
  
  <ul class="nav navbar-nav navbar-right">          	
<?php $uid=$_SESSION ['uid']; ?>
<?php $username=$_SESSION['username']; ?>
<?php if($uid) { ?>            
<li class="nav-item">
<a href="index.php?do=user&view=wk" class="nav-item-link">欢迎您，<?php echo $username;?></a>
</li>
<li class="nav-item">
<a href="index.php?do=seller&id=<?php echo $uid;?>" class="nav-item-link">我的主页</a>
</li>
<!--<li class="nav-item">
<a href="index.php?do=user&view=message&op=notice"> <i class="fa fa-envelope"></i><?php if($messagecount) { ?>消息(<?php echo $messagecount;?>)<?php } ?></a> 
</li>-->
 <li class="nav-item">
   <a href="index.php?do=pubgoods" class="nav-item-link">发布作品</a>
</li>
<li class="nav-item">
<a href="index.php?do=logout" class="nav-item-link active">退出</a>
</li>
<?php } else { ?>
<li class="nav-item">
<a href="index.php?do=login" class="nav-item-link active">登录</a>
</li>
<li class="nav-item">
<a href="index.php?do=register" class="nav-item-link active">注册</a>
</li>
 
   
<?php } ?>          
  </ul>
  
  <form action="<?php if($do =='tasklist'||$do =='goodslist'||$do =='sellerlist') { ?><?php echo $strUrl;?><?php } else { ?>index.php?do=goodslist<?php } ?>" role="search" id="topHeaderSearch" method="post" class="navbar-form navbar-right top-form" >
<!--<div class="btn-group">
<button type="button" id="searchType" class="btn btn-default dropdown-toggle " data-toggle="dropdown">
<?php if($do == 'goodslist') { ?>作品
<?php } elseif($do == 'tasklist') { ?>任务
<?php } elseif($do == 'sellerlist') { ?>服务
<?php } else { ?>
<?php if($task_open) { ?>任务
<?php } elseif(!$task_open&&$shop_open) { ?>作品
<?php } ?>
<?php } ?><span class="caret"></span>
</button>
<ul class="dropdown-menu" id="searchOption">
<?php if($task_open) { ?>
<li <?php if($do  == 'tasklist'||($do !=  'goodslist'&&$do !=  'sellerlist')) { ?>class="active"<?php } ?>>
<a href="javascript:void(0);" rel="tasklist">任务</a>
</li>
<?php } ?>
<?php if($shop_open) { ?>
<li <?php if($do  == 'goodslist') { ?>class="active"<?php } ?>>
<a href="javascript:void(0);" rel="goodslist">作品</a>
</li>
<?php } ?>
<li <?php if($do  == 'sellerlist') { ?>class="active"<?php } ?>>
<a href="javascript:void(0);" rel="sellerlist">服务</a>
</li>
</ul>
</div>-->
<button type="submit" class="btn btn-primary">搜索</button>
<div class="form-group search-input po_re" id="div_search_input">

<input type="text" name="ky" id="search"  class="form-control" placeholder="搜索你喜欢的" value="<?php if($ky) { ?><?php echo $ky;?><?php } ?>" onkeyup="searchlist();" onfocus="searchlist();" data-toggle="dropdown"  x-webkit-speech="" x-webkit-grammar="bUIltin:search" lang="zh-CN"  aria-haspopup="true" aria-expanded="false" autocomplete="off">
<ul class="dropdown-menu" role="menu" id="hotsearch" aria-labelledby="dLabel" style="display:none">

</ul>
</div>

</form>

<script type="text/javascript">
function searchlist(){
var ky=$("#search").val();
var searchvalue1=$("#searchOption li:first").hasClass('active');
var searchvalue2=$("#searchOption li:eq(1)").hasClass('active');
var searchvalue3=$("#searchOption li:eq(2)").hasClass('active');
var ky=$("#search").val();
if(searchvalue2==true){
search='2';
}else if(searchvalue3==true){
search='3';
}else{
search = '1';
}			
$.post("index.php?do=searchlist&ky="+ky,{search:search},function(data){
if(data){
$("#hotsearch").replaceWith(data);
$("#div_search_input").addClass('open');
}else{
$("#hotsearch").hide();
}

})
 $("#searchOption>li").click(function(){
if($(this).hasClass('active')==true){
if($(this).text().contains('作品')){						
$.post("index.php?do=searchlist&ky="+ky,{search:2},function(data){
$("#hotsearch").replaceWith(data);
})
}else if($(this).text().contains('服务')){
$.post("index.php?do=searchlist&ky="+ky,{search:3},function(data){
$("#hotsearch").replaceWith(data);
})
}else{
$.post("index.php?do=searchlist&ky="+ky,{search:1},function(data){
$("#hotsearch").replaceWith(data);
})
}
}
});
}
</script>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
</div>
    
        <div class="header-top" style="display:none">
<?php if($gUserInfo['is_hongbao']==1 && $do=="index") { ?>
        	<div class="show-hb-mask" ></div>
<div class="show-hb-close" id="hb3" style="">
<a href="javascript:colse('index.php?do=user&view=message&op=notice&ajax=1');"><img src="static/img/hb/close.png"></a>
</div>
<div class="show-hb-open" style="display:none;" id='hb1' >
<img src="static/img/hb/03.png"  usemap="#show-hb-open-map">
<a href="index.php?do=user&view=message&op=notice" class=""><img src="static/img/hb/04.png" ></a>
</div>
<div class="show-hb-money" id='hb2'  style="">
<img src="static/img/hb/01.png"  usemap="#show-hb-money-map">
<a href="javascript:get_money();" class=""><img src="static/img/hb/02.png" ></a>
</div>

<script>
function get_money(){
$("#hb1").removeAttr("style");
$("#hb2").attr("style","display:none;");
}
function colse(url){
$("#hb2").attr("style","display:none;");
$("#hb3").attr("style","display:none;");
$(".show-hb-mask").removeClass();
    var url =url;
   $.ajax({
  type: "POST",
  url: url,
});
}
</script>
<?php } ?>
            <div class="container">
                <ul class="left-nav">
                    <?php if($do!='index'||!$do) { ?>
                    <li class="nav-item">
                        <a href="index.php?do=index" class="nav-item-link active">回到首页</a>
                    </li>
                    <?php } ?>
                    <?php $uid=$_SESSION ['uid']; ?>
                    <?php $username=$_SESSION['username']; ?>
                    <?php if($uid) { ?>
                    <li class="nav-item">
                        <a href="index.php?do=user" class="nav-item-link">欢迎您， <?php echo $username;?></a>
                    </li>
<li class="nav-item">
<a href="index.php?do=user&view=message&op=notice"> <i class="fa fa-envelope"></i><?php if($messagecount) { ?>(<?php echo $messagecount;?>)<?php } ?></a>
</li>
                    <li class="nav-item">
                        <a href="index.php?do=logout" class="nav-item-link active">退出</a>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        欢迎您，<a href="index.php?do=login" class="nav-item-link active">请登录</a>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?do=register" class="nav-item-link active">免费注册</a>
                    </li>
                    <?php } ?>
                </ul>

                
                <ul class="right-nav">
                    <!--<li class="nav-item has-sub">
                        <a href="#"  class="nav-item-link ">我是雇主<span class="caret"></span></a>
<ul class="nav-item-sub nav-sub-list">
                            <li><a href="index.php?do=sellerlist">找服务商</a></li>
                            <li><a href="index.php?do=pubtask">发布任务</a></li>
                            <li><a href="index.php?do=user&view=transaction&op=released&intTaskStatus=0"><span class="badge"><?php echo $intWaitPay['0']['count'];?></span>待付款任务</a></li>
                            <li><a href="index.php?do=user&view=transaction&op=released&intTaskStatus=3"><span class="badge"><?php echo $intChoose['0']['count'];?></span>待选稿</a></li>
                            <li><a href="index.php?do=user&view=transaction&op=orders&strStatus=wait"><span class="badge"><?php echo $intShopPay['0']['count'];?></span>待付款作品</a></li>
                            <li><a href="index.php?do=user&view=gz&op=mark&type=1"><span class="badge"><?php echo $intMarkG;?></span>待评价</a></li>

                        </ul>
                    </li>-->
                    <li class="nav-item has-sub">
                        <a href="index.php?do=user&view=wk" class="nav-item-link ">我是摄影师<span class="caret"></span></a>
<ul class="nav-item-sub nav-sub-list">
                            <li><a href="index.php?do=pubgoods">发布作品</a></li>
                            <li><a href="index.php?do=seller&id=<?php echo $uid;?>">我的主页</a></li>
                            <!--<li><a href="index.php?do=user&view=wk&op=gy&s=seller_confirm"><span class="badge"><?php echo $intGy;?></span>新的雇佣</a></li>
                            <li><a href="index.php?do=user&view=transaction&op=sold&intModelId=7&strStatus=seller_confirm"><span class="badge"><?php echo $intService;?></span>新服务订单 </a></li>-->
                            <li><a href="index.php?do=user&view=wk&op=mark&type=1"><span class="badge"><?php echo $intMarkW;?></span>待评价</a></li>


                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?do=help" class="nav-item-link">帮助中心</a>
                    </li>
                    <li class="nav-item has-sub">
                        <a href="javascript:void(0);" class="nav-item-link">分类导航 <span class="caret"></span></a>
                        <div class="nav-item-sub">
                            <dl>
                                <dt>
                                    任务
                                </dt>
                                <dd>
                                    <ul>
                                        <?php if(is_array($indus_task_arr)) { foreach($indus_task_arr as $k => $v) { ?>
                                        <li>
                                            <a href="index.php?do=tasklist&pd=<?php echo $v['indus_id']?>"><?php echo $v['indus_name']?></a>
                                        </li>
                                        <?php } } ?>
                                    </ul>
                                </dd>
                            </dl>
                            <div class="line">
                            </div>
                            <dl>
                                <dt>
                                    作品
                                </dt>
                                <dd>
                                    <ul>
                                        <?php if(is_array($indus_goods_arr)) { foreach($indus_goods_arr as $k => $v) { ?>
                                        <li>
                                            <a href="index.php?do=goodslist&pd=<?php echo $v['indus_id']?>"><?php echo $v['indus_name']?></a>
                                        </li>
                                        <?php } } ?>
                                    </ul>
                                </dd>
                            </dl>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:spread(<?php if($do=='article') { ?>true<?php } else { ?>false<?php } ?>);void(0);" class="nav-item-link">推广</a>
                    </li>
                </ul>
            </div>
        </div>

<!-- 幻灯片 -->
<?php /*
<div class="carousel slide">
        <div class="fotorama" data-autoplay="true" data-width="100%"  data-fit="cover" data-stopautoplayontouch="false"  data-loop="true" data-arrows="false" data-click="false" data-swipe="true">
            <?php keke_loaddata_class::ad_show('HOME_TOP_SLIDE','index','1') ?>
        </div>
        <!-- fotorama end -->
</div>
*/ ?>
<!--
<div id="indexSlidePanel" class="index_slide_panel">
<div class="index_slide">
<img src="/data/uploads/sys/ad/794757318566c5c39250d9.jpg" style="visibility: hidden;"/>
<div class="iframe_panel slide_mery">
<img style="display: none;" src="http://view.iyun720.com/pic/212/137fb76b5296046007a76fff524d9f8b.jpg"/>
<a href="/index.php?do=goods&id=212"></a>
<iframe src="index.php?do=view&sid=212" width="100%" height="680" frameborder="0"></iframe>
</div>
<a href="index.php?do=article&id=348&page=1"><img class="slide_mery" src="/data/uploads/sys/ad/93367617566e806a3f1f6.jpg" /></a>
<a href="index.php?do=pubgoods"><img class="slide_mery" src="/data/uploads/sys/ad/794757318566c5c39250d9.jpg" style="display: none;" /></a>
<div class="iframe_panel slide_mery" style="display: none;">
<img src="http://view.iyun720.com/pic/172/14ee2773791188a50c07bec10ccebaf1.jpg?r=2016011202"/>
<a href="/index.php?do=goods&id=172"></a>
<iframe src="index.php?do=view&sid=172" width="100%" height="680" frameborder="0"></iframe>
</div>
<div class="iframe_panel slide_mery" style="display: none;">
<img src="http://view.iyun720.com/pic/169/faa8be032904693c334a36004973ee33.jpg?r=2016011202"/>
<a href="/index.php?do=goods&id=169"></a>
<iframe src="index.php?do=view&sid=169" width="100%" height="680" frameborder="0"></iframe>
</div>
<div class="iframe_panel slide_mery" style="display: none;">
<img src="http://view.iyun720.com/pic/96/87b08bce74b9900f7ed204a99d64dc41.jpg?r=2016010703"/>
<a href="/index.php?do=goods&id=96"></a>
<iframe src="index.php?do=view&sid=96" width="100%" height="680" frameborder="0"></iframe>
</div>
<div id="indexSlideLeft" class="index_slide_left"></div>
<div id="indexSlideRight" class="index_slide_right"></div>
<div class="clear"></div>
</div>
<div id="buttons" class="buttons">    
<a id="buttonsLeft" class="left" href="javascript:"></a>
<a id="buttonsRight" class="right" href="javascript:"></a>
<div class="button_main_panel">
<div class="button_main">

</div>
</div>
</div>
</div>
-->
<div id="indexSlidePanel" class="index_slide_panel" style="min-height: 180px;">
<div class="index_slide">
<img src="http://view.iyun720.com/pic/236/35039b1ca650d9bc56f6b79d79ee5df5.jpg?r=2016021502" style="visibility: hidden;"/>
<div class="iframe_panel slide_mery">
<img src="http://view.iyun720.com/pic/212/137fb76b5296046007a76fff524d9f8b.jpg"/>
<a href="/index.php?do=goods&id=212"></a>
<iframe sid="212" src="index.php?do=view&sid=212" width="100%" height="680" frameborder="0"></iframe>
</div>

<a href="index.php?do=article&id=348&page=1"><img class="slide_mery" src="http://www.iyun720.com/data/uploads/sys/ad/93367617566e806a3f1f6.jpg?r=1" /></a>

<!--
<a href="index.php?do=article&id=348&page=1"><img class="slide_mery" src="http://view.iyun720.com/pic/236/35039b1ca650d9bc56f6b79d79ee5df5.jpg?r=2016021502" /></a>
-->
<a href="index.php?do=pubgoods"><img class="slide_mery" src="http://www.iyun720.com/data/uploads/sys/ad/794757318566c5c39250d9.jpg?r=1" /></a>
<div class="iframe_panel slide_mery" style="display: none;">
<img src="http://view.iyun720.com/pic/172/14ee2773791188a50c07bec10ccebaf1.jpg?r=2016011202"/>
<a href="/index.php?do=goods&id=172"></a>
<iframe sid="172" src="" width="100%" height="680" frameborder="0"></iframe>
</div>
<div class="iframe_panel slide_mery" style="display: none;">
<img src="http://view.iyun720.com/pic/169/faa8be032904693c334a36004973ee33.jpg?r=2016011202"/>
<a href="/index.php?do=goods&id=169"></a>
<iframe sid="169" src="" width="100%" height="680" frameborder="0"></iframe>
</div>
<div class="iframe_panel slide_mery" style="display: none;">
<img src="http://view.iyun720.com/pic/96/87b08bce74b9900f7ed204a99d64dc41.jpg?r=2016010703"/>
<a href="/index.php?do=goods&id=96"></a>
<iframe sid="96" src="" width="100%" height="680" frameborder="0"></iframe>
</div>
<div class="iframe_panel slide_mery" style="display: none;">
<img src="http://view.iyun720.com/pic/236/35039b1ca650d9bc56f6b79d79ee5df5.jpg?r=2016021512"/>
<a href="/index.php?do=goods&id=236"></a>
<iframe sid="236" src="" width="100%" height="680" frameborder="0"></iframe>
</div>
<div class="iframe_panel slide_mery" style="display: none;">
<img src="http://view.iyun720.com/pic/232/c5b182ee56cb367e840eac95ff06f8fe.jpg?r=2016021512"/>
<a href="/index.php?do=goods&id=232"></a>
<iframe sid="232" src="" width="100%" height="680" frameborder="0"></iframe>
</div>
<div class="iframe_panel slide_mery" style="display: none;">
<img src="http://view.iyun720.com/pic/218/2f9448b9935a1a4e70e757c8630e2880.jpg?r=2016021512"/>
<a href="/index.php?do=goods&id=218"></a>
<iframe sid="218" src="" width="100%" height="680" frameborder="0"></iframe>
</div>
<div class="iframe_panel slide_mery" style="display: none;">
<img src="http://view.iyun720.com/pic/204/94faba453d8d6701dbb69dde4753b382.jpg?r=2016021512"/>
<a href="/index.php?do=goods&id=204"></a>
<iframe sid="204" src="" width="100%" height="680" frameborder="0"></iframe>
</div>
<div class="iframe_panel slide_mery" style="display: none;">
<img src="http://view.iyun720.com/pic/188/5296a579f47fa442034076a9d69a3bf8.jpg?r=2016021512"/>
<a href="/index.php?do=goods&id=188"></a>
<iframe sid="188" src="" width="100%" height="680" frameborder="0"></iframe>
</div>
<div id="indexSlideLeft" class="index_slide_left"></div>
<div id="indexSlideRight" class="index_slide_right"></div>
<div class="clear"></div>
</div>
<div id="buttons" class="buttons">    
<a id="buttonsLeft" class="left" href="javascript:"></a>
<a id="buttonsRight" class="right" href="javascript:"></a>
<div class="button_main_panel">
<div class="button_main">

</div>
</div>
</div>
</div>

<script>
var indexSlideTag = 0;
var indexObj = null;
$(function(){
if($(window).width() < 800){
$('#indexSlidePanel').children('.index_slide').find('.iframe_panel:not(:first)').remove();
}
indexObj = new (function(){
this.focus = 0;
this.imgElements = $('#indexSlidePanel').children('.index_slide').find('.slide_mery');
this.clock = false;
this.showWidth = 0;

this.init = function(){
var imgElements = this.imgElements;
var length = imgElements.length;
var aElement = null;
var imgElement = null;
//alert(buttonMainWidth);
for(var i = 0; i < length; i++){
imgElement = imgElements.eq(i);
aElement = $('<a>').attr('src', 'javascript:').appendTo('.buttons .button_main').click(function(){
indexObj.change_img($(this).index());
});
//alert('a');
if(imgElement.find('img').length > 0){
$('<img>').attr('src', imgElement.find('img').attr('src')).appendTo(aElement);
} else {
$('<img>').attr('src', imgElement.attr('src')).appendTo(aElement);
}

}
this.init_buttons();
$(window).resize(function(){
indexObj.init_buttons();
});

$('#indexSlideLeft').click(function(){
indexObj.change(-1);
});
$('#indexSlideRight').click(function(){
indexObj.change(1);
});
$('#buttonsLeft').click(function(){
indexObj.change(-1);
});
$('#buttonsRight').click(function(){
indexObj.change(1);
});
};

this.init_buttons = function(){
var buttonMainWidth = $('.buttons .button_main_panel').width();
var showLength = parseInt((buttonMainWidth) / 157, 10);
var showWidth = (buttonMainWidth) / showLength;
var imgElements = this.imgElements;
if($(window).width() < 600){
$('#indexSlideLeft').show();
$('#indexSlideRight').show();
$('#buttons').hide();
} else {
$('#indexSlideLeft').hide();
$('#indexSlideRight').hide();
$('#buttons').show();
this.showWidth = showWidth;
$('.buttons .button_main_panel a').css('width', showWidth - 3);
}
imgElements.css('left', $(window).width() * -1);
imgElements.eq(this.focus).css('left', 0);

};

this.change = function(_num){
var focus = this.focus;
var length = this.imgElements.length;
focus += _num;
focus = (focus + length) % length;
this.change_img(focus);
};

this.change_img = function(_num){
if(_num != this.focus && !this.clock)
{
var imgElements = this.imgElements;
var windowWidth = $(window).width();
var that = this;
var newElement = imgElements.eq(_num);
var oldElement = imgElements.eq(this.focus);
if(newElement.children('iframe').length > 0){
newElement.children('iframe').attr('src', 'index.php?do=view&sid=' + newElement.children('iframe').attr('sid'));
}
newElement.css('left', windowWidth).show();
newElement.animate({'left': 0}, 800);
oldElement.animate({'left': windowWidth * -1}, 800);
this.focus = _num;
this.clock = true;
setTimeout(function(){
that.clock = false;
if(oldElement.children('iframe').length > 0){
oldElement.children('iframe').attr('src', '');
}
}, 800);
clearTimeout(indexSlideTag);
indexSlideTag = setTimeout(function(){
indexObj.change(1);
}, 10000);
}
};

this.set_location = function(){
var ele = this.imgElements.eq(this.focus);
if(ele.find('a').length > 0){
location.href = ele.find('a').attr('href');
} else {
location.href = ele.attr('href');
}
}

this.init();
})();
indexSlideTag = setTimeout(function(){
//indexObj.change(1);
}, 10000);

});

function iframe_callback(){
indexObj.set_location();
}
</script>
<div class="main">
<div class="layout_center">
<h2 class="index_hot">热门作品推荐<a href="/index.php?do=goodslist" target="_blank">更<span style="position:relative;top: 1px;">多</span></a></h2>    
<div class="row" id="post-list" >  
<?php if(is_array($arrRecommGoodsLists)) { foreach($arrRecommGoodsLists as $k => $v) { ?>
<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
<article class="post tag-foreign-website tag-bootstrap-v3">
<div class="post-featured-image">
<a class="thumbnail loaded" href="index.php?do=goods&id=<?php echo $v['service_id']?>" onclick="_hmt.push(['_trackEvent', 'imagelink', 'click', 'LayoutPress'])" target="_blank">
<img alt="<?php echo $v['title']?>" onerror='$(this).attr("src","tpl/default/img/shop/shop_default_big.jpg")' alt="<?php echo $v['title']?>" <?php if($img) { ?>src="<?php echo $arrPic['0'];?>" width="600" height="200" style=" max-height:200px; overflow:hidden" <?php } else { ?>src="<?php echo keke_shop_class::output_pics($v['file_path'],210,1,1,$v['service_id']) ?>" width="600" height="200"  style=" max-height:200px; overflow:hidden" <?php } ?>>
<div class="author">作者：<?php echo $v['username']?></div> 
</a>
</div>
<div class="goods_info">
<div class="col-xs-2">
<a href="index.php?do=seller&id=<?php echo $v['uid'];?>" class="thumbnail loaded">  <?php echo  keke_user_class::get_user_pic($v['uid'],'middle') ?>  </a>
</div>
<div class="col-xs-8 col-sm-9 col-md-9 col-lg-9 good_title">
<a href="index.php?do=goods&id=<?php echo $v['service_id']?>"><?php echo $v['title']?></a><br>
<a href="index.php?do=goodslist&ky=<?php echo $v['tag']['goods_tag']['content']?>" class="tag"><?php echo $v['tag']['goods_tag']['content']?></a>
</div>
</div>
</article>
</div>
<?php } } ?>
</div>   
</div>
<!--
<div class="zhlv_panel">
<div id="zhlv"	class="layout_center">
<h2 class="index_hot"><a></a>智慧旅游<a></a></h2>         
<div>
<section class="hot_zj">
<a href="">
<img src="tpl/default/images/albums1.jpg" alt="LayoutPress">                          
<div class="caption">
<h3>上海</h3>
<p>简称“沪”或“申”，中华人民共和国直辖市，中国国家中心城市，中国经济、金融、贸易、航运中心。地处长江入海口，隔东中国海与日本九州岛相望，南濒杭州湾，西与江苏、浙江两省相接。上海是一座国家历史文化名城。</p>
</div>
</a>
</section>
<section class="hot_zj">
<a href="">
<img src="tpl/default/images/albums2.jpg" alt="LayoutPress" onload="imgLoaded(this)">                          
<div class="caption">
<h3>上海</h3>
<p>简称“沪”或“申”，中华人民共和国直辖市，中国国家中心城市，中国经济、金融、贸易、航运中心。地处长江入海口，隔东中国海与日本九州岛相望，南濒杭州湾，西与江苏、浙江两省相接。上海是一座国家历史文化名城。</p>
</div>
</a>
</section>
<section class="hot_zj">
<a href="">
<img src="tpl/default/images/albums1.jpg" alt="LayoutPress" onload="imgLoaded(this)">                          
<div class="caption">
<h3>上海</h3>
<p>称“沪”或“申”，中华人民共和国直辖市，中国国家中心城市，中国经济、金融、贸易、航运中心。地处长江入海口，隔东中国海与日本九州岛相望，南濒杭州湾，西与江苏、浙江两省相接。上海是一座国家历史文化名城。</p>
</div>
</a>
</section>
<section class="hot_zj">
<a href="">
<img src="tpl/default/images/albums2.jpg" alt="LayoutPress" onload="imgLoaded(this)">                          
<div class="caption">
<h3>上海</h3>
<p>简称“沪”或“申”，中华人民共和国直辖市，中国国家中心城市，中国经济、金融、贸易、航运中心。地处长江入海口，隔东中国海与日本九州岛相望，南濒杭州湾，西与江苏、浙江两省相接。上海是一座国家历史文化名城。</p>
</div>
</a>
</section>
<section class="hot_zj">
<a href="">
<img src="tpl/default/images/albums1.jpg" alt="LayoutPress" onload="imgLoaded(this)">                          
<div class="caption">
<h3>上海</h3>
<p>简称“沪”或“申”，中华人民共和国直辖市，中国国家中心城市，中国经济、金融、贸易、航运中心。地处长江入海口，隔东中国海与日本九州岛相望，南濒杭州湾，西与江苏、浙江两省相接。上海是一座国家历史文化名城。</p>
</div>
</a>
</section>
<section class="hot_zj">
<a href="">
<img src="tpl/default/images/albums2.jpg" alt="LayoutPress" onload="imgLoaded(this)">                          
<div class="caption">
<h3>上海</h3>
<p>简称“沪”或“申”，中华人民共和国直辖市，中国国家中心城市，中国经济、金融、贸易、航运中心。地处长江入海口，隔东中国海与日本九州岛相望，南濒杭州湾，西与江苏、浙江两省相接。上海是一座国家历史文化名城。</p>
</div>
</a>
</section>               
</div>
<div class="clear"></div>
    </div>
<script>
$(function(){
init_zhlv();
});

$(window).resize(function(){
init_zhlv();
});

function init_zhlv(){
var panelWidth = $('#zhlv').width();
if(panelWidth > 860){
$('.hot_zj').removeClass('last');
$('.hot_zj:nth-child(4n)').addClass('last');
$('.hot_zj').css('width', (panelWidth - 60) / 4);
} else if(panelWidth > 490){
$('.hot_zj').removeClass('last');
$('.hot_zj:nth-child(3n)').addClass('last');
$('.hot_zj').css('width', (panelWidth - 40) / 3);
} else {
$('.hot_zj').removeClass('last');
$('.hot_zj:nth-child(2n)').addClass('last');
$('.hot_zj').css('width', (panelWidth - 20) / 2);
}
}
</script>
</div>
-->
<div class="layout_center">  
        <h2 class="index_hot">活跃摄影师<a href="">更多</a></h2>
<div>
<?php if(is_array($arrNerLists)) { foreach($arrNerLists as $k => $v) { ?>       
<div class="author_row">
<div class="author_data">                                           
<?php $creditLevel = unserialize($v['seller_level']) ?>
<a class="thumbnail loaded" href="index.php?do=seller&id=<?php echo $v['uid']?>" onclick="_hmt.push(['_trackEvent', 'imagelink', 'click', 'LayoutPress'])" target="_blank">
 <?php echo  keke_user_class::get_user_pic($v['uid'],'middle') ?> 
</a>
<div class="author_info">
<div>
<a class="list-title" href="index.php?do=seller&id=<?php echo $v['uid'];?>" title="<?php echo $v['shop_name'];?>"><?php echo $v['username']?></a>
</div>
<div><img style="vertical-align: middle;margin-right: 5px;" src="/tpl/default/images/address.png" /><?php echo $v['name'];?></div>
<p><?php echo $v['shop_slogans'];?></p>
<div><span>热度：<font><?php echo $v['views'];?></font></span>  &nbsp; <span>作品：<font><?php echo $v['service_num'];?></font></span></div>
</div>                                        
</div>

<div class="author_goods" >
<?php if(is_array($v['service'])) { foreach($v['service'] as $k1 => $v1) { ?>
<div>
<a class="thumbnail loaded loaded<?php echo $k1;?>" title="<?php echo $v1['title'];?>" href="index.php?do=goods&id=<?php echo $v1['service_id']?>" onclick="_hmt.push(['_trackEvent', 'imagelink', 'click', 'LayoutPress'])" target="_blank">
  <img src="<?php echo keke_shop_class::output_pics($v1['file_path'],210,1,1,$v1['service_id']) ?>" alt="<?php echo $v1['title'];?>" onload="imgLoaded(this)">
</a>
</div>                        
<?php } } ?>                        
</div>
<div class="clear"></div>
</div>
<?php } } ?>                  
 </div>  
    </div>
</div>

<!-- container end -->
<script type="text/javascript">
    $(function(){

        $('#jcarousel_bid').jcarousel({
            wrap: 'circular',
            animation: 500,
            vertical: true
        }).jcarouselAutoscroll({
            scroll: '+=1',
            interval: 3000
        }).mouseenter(function(){
            $(this).jcarouselAutoscroll('stop');
        }).mouseleave(function(){
            $(this).jcarouselAutoscroll('start');
        });

        $('#jcarousel_stats').jcarousel({
            wrap: 'circular',
            vertical: true
        }).jcarouselAutoscroll({
            scroll: '+=1'
        }).mouseenter(function(){
            $(this).jcarouselAutoscroll('stop');
        }).mouseleave(function(){
            $(this).jcarouselAutoscroll('start');
        });
    });

</script>
<div id="fix-box" style="display:none;">
  <a id="top" href="javascript:void(0);"><i class="fa fa-angle-up"></i></a>
</div>
<!-- #fix-box end -->
<link href="tpl/default/css/bootstrap.min.css" rel="stylesheet">
<link href="tpl/default/css/iyun720.css" rel="stylesheet" type="text/css">
<script src="tpl/default/js/bootstrap.min.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<div class="footer">
<div>
<a href="/index.php?do=index">首页</a>
<span>|</span>
<a href="/index.php?do=goodslist">作品</a>
<span>|</span>
<a href="/index.php?do=article&id=349">活动</a>
<span>|</span>
<a href="/index.php?do=single&id=300">联系我们</a>
</div>
<div>All rights reserved.   Powered by 虚拟现实  技术支持：云游720 粤ICP备15089970号 
<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1257140389'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1257140389' type='text/javascript'%3E%3C/script%3E"));</script>
</div>
</div>     

     <script type="text/javascript">

$(document).ready(function(){
//$('#post-list .post-featured-image img').load(function(){

$('#post-list .post-featured-image img').height($('#post-list .post-featured-image img').width()/4);
$('.min-list-img img').height($('.min-list-img img').width()/4);
$('.albums').height($('#example img').height());

//});
//$('#example img').load(function(){
  // 加载完成  
  
$('#example img').load(function(){
$('.albums').height($('#example img').height());

var move = -15;
//缩放比例，1.2 =120％
var zoom = 1.2;
oldwidth = $('#example img').height();
oldheight = $('#example img').height();
width = $('#example img').height() * zoom;
height = $('#example img').height() * zoom;

//在对这些缩略图的鼠标滑过事件
$('.albums').hover(function(){
//根据缩放百分比设置宽度和高度
//移动和缩放图像
$(this).find('img').stop(false,true).animate({'width':width, 'height':height, 'top':move, 'left':move}, {duration:200});
//显示标题
$(this).find('div.caption').stop(false,true).fadeIn(200);
},function(){
//复位图像
$(this).find('img').stop(false,true).animate({'width':oldwidth, 'height':oldheight, 'top':'0', 'left':'0'}, {duration:100});	
//隐藏标题
$(this).find('div.caption').stop(false,true).fadeOut(200);
});	  

});		
 
  
  //移动像素的图像
var move = -15;
//缩放比例，1.2 =120％
var zoom = 1.2;
oldwidth = $('#example img').height();
oldheight = $('#example img').height();
width = $('#example img').height() * zoom;
height = $('#example img').height() * zoom;

//在对这些缩略图的鼠标滑过事件
$('.albums').hover(function(){
//根据缩放百分比设置宽度和高度
//移动和缩放图像
$(this).find('img').stop(false,true).animate({'width':width, 'height':height, 'top':move, 'left':move}, {duration:200});
//显示标题
$(this).find('div.caption').stop(false,true).fadeIn(200);
},function(){
//复位图像
$(this).find('img').stop(false,true).animate({'width':oldwidth, 'height':oldheight, 'top':'0', 'left':'0'}, {duration:100});	
//隐藏标题
$(this).find('div.caption').stop(false,true).fadeOut(200);
});	  
//});
});
$(window).resize(function(){
$('#post-list .post-featured-image img').width('100%');
$('.min-list-img img').width('100%');
$('.albums').width('100%');
$('.pic_middle').width('100%');

     		$('#post-list .post-featured-image img').height($('#post-list .post-featured-image img').width()/4);
$('.min-list-img img').height($('.min-list-img img').width()/4);
$('.albums').height($('.albums').width());
$('.pic_middle').height($('.pic_middle').width());
$('.pic_middle').height('100%');
$('.goods_info .pic_middle').height($('.goods_info .pic_middle').width());

   });
</script>
    



<?php if($uid) { ?>
  <?php kekezu::update_oltime($uid,$username) ?>
<?php } ?>




<script type="text/javascript">
$(function(){
  $('.color-selected .nav-sub-list a').click(function() {
    var css = $(this).attr('data-css');
    var color = $(this).attr('data-rel');
    $('.nav-item-link span.style-color').removeClass().addClass('style-color '+ color);
    $('#active-style').attr('href', 'tpl/default/'+ css +'/style.css');
    $('#active-style-user').attr('href', 'tpl/default/'+ css +'/user.css');
    $('#active-style-store').attr('href', 'tpl/default/'+ css +'/store.css');
    $('#active-style-home').attr('href', 'tpl/default/'+ css +'/home.css');
  });
  
  var divWidth = $('.goods_info .pic_middle').width();
$('.goods_info .pic_middle').css({'height':divWidth});
})



</script>


<script type="text/javascript">
var uid='<?php echo $uid;?>';
var UseIm= '<?php echo OPEN_IM;?>';
var actionDo = '<?php echo $do;?>';
var username='<?php echo $username;?>';
var auid = '<?php echo $oauth_user_info['account'];?>';
var atype ='<?php echo $wb_type;?>';
var sessionId = "<?php echo session_id(); ?>";

$(function(){
    $("img.lazy").lazyload({
        effect: "fadeIn"
    });
});

<?php if($exec_time_traver) { ?>
$(function(){
   $.get('js.php?op=time&r='+Math.random());
})
<?php } ?>
</script>
</body>
</html><?php keke_tpl_class::ob_out();?>