<?php keke_tpl_class::checkrefresh('shop/goods/tpl/default/index', '1455511981' );?><!DOCTYPE HTML>
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
<!-- 查看大图js -->
<link href="static/js/jqplugins/fancybox/jquery.fancybox.min.css" rel="stylesheet">
<script src="static/js/jqplugins/fancybox/jquery.fancybox.min.js"></script>
<link href="static/js/jqplugins/fancybox/helpers/jquery.fancybox-buttons.css" rel="stylesheet">
<script src="static/js/jqplugins/fancybox/helpers/jquery.fancybox-buttons.js"></script>
<script src="static/js/uploadify/jquery.uploadify.min.js?r=<?php echo RANDOM_PARA;?>" type="text/javascript"></script>
<link href="static/js/uploadify/uploadify.css" rel="stylesheet">
<!-- 滚动视图 -->
<script src="static/js/jqplugins/jcarousel/jquery.jcarousel.js"></script>
<script src="static/js/jqplugins/jcarousel/jquery.jcarousel.control.js"></script>
<div>
<?php /*
<div id="side">
<!-- 卖家名片 -->
<div class="poster-card">			
<div class="box-body">
<div class="poster-top">

<div class="post-content">
<h4 class="media-heading"><?php echo $arrOwnerInfo['username'];?></h4>
<!--卖家的认证信息-->
<p>
认证： <?php if(is_array($arrAuthItems)) { foreach($arrAuthItems as $v) { ?>
<a href="<?php echo $v['auth_url'];?>" title="<?php echo $v['auth_title'];?>" class="mr_5">
<img src="<?php if($v['auth_pass'] == '1') { ?><?php echo $v['auth_small_ico'];?><?php } else { ?><?php echo $v['auth_small_n_ico'];?><?php } ?>"  alt="<?php echo $v['auth_title'];?>" title="<?php echo $v['auth_title'];?>">
</a>
  <?php } } ?>
</p>
<p>
所在地：
<a href="javascript:showMap('<?php echo $arrOwnerInfo['uid'];?>');">
<i class="fa fa-map-marker"></i>
</a>
<?php echo $strAddress;?>
</p>
<!--<p>等级：<?php echo $strUserLevel['pic'];?></p>-->
</div>
</div>
<ul class="poster-num">
<li class="poster-num-item">
<p>
<!--好评率：
<span class="text-danger num">
<?php if($arrOwnerInfo['seller_total_num']) { ?>
{eval echo number_format(<?php echo $arrOwnerInfo['seller_good_num']?>/<?php echo $arrOwnerInfo['seller_total_num']?>,4)*100}
<?php } else { ?>0<?php } ?>%
</span>-->
</p>
</li>
<li class="poster-num-item">
<p>
出售作品：
<span class="num"><?php echo $intSellerGoodsNum;?></span>
</p>
</li>
</ul>
<ul class="poster-meta">
<?php if(is_array($arrShopAid)) { foreach($arrShopAid as $k => $v) { ?>
<li class="poster-meta-item">
<?php echo $v['aid_name'];?>
<span class="text-danger"><?php echo $v['avg'];?><?php echo $_lang['fen'];?></span>
<?php echo keke_user_mark_class::gen_star2($v['avg']); ?>
</li>
<?php } } ?>
</ul>
<div class="poster-ctrl">
<div class="row">
<?php if($gUid != $arrServiceInfo['uid']) { ?>
<div class="col-sm-12 mb_10">
<a href="index.php?do=gy&id=<?php echo $arrServiceInfo['uid'];?>" class="btn btn-primary btn-sm btn-block">雇佣TA</a>
</div>
<?php } ?>
<div class="col-sm-6">
<?php if($gUid != $arrServiceInfo['uid']) { ?>
<a href="javascript:sendMessage(<?php echo $arrServiceInfo['uid'];?>);void(0);" class="btn btn-default btn-sm btn-block">联系我</a>
<?php } ?>
</div>
<?php if($gUid != $arrServiceInfo['uid']) { ?>
<div class="col-sm-6">
<?php if($intFollow) { ?>
<a href="javascript:cancelCollect(<?php echo $arrServiceInfo['uid'];?>);void(0);" class="btn btn-success btn-sm" id="follow<?php echo $arrServiceInfo['uid'];?>">取消收藏</a>
<?php } else { ?>
<a href="javascript:addCollect(<?php echo $arrServiceInfo['uid'];?>);void(0);" class="btn btn-default btn-sm btn-block" id="follow<?php echo $arrServiceInfo['uid'];?>">
<i class="fa fa-plus"></i>
收藏店铺
</a>
<?php } ?>
<!--
                  <a href="index.php?do=seller&id=<?php echo $arrServiceInfo['uid'];?>" class="btn btn-default btn-sm btn-block">收藏店铺</a>-->
</div>
<?php } ?>
</div>
</div>
</div>
</div>
<div class="box-body site-security">
<h2 class="min-title">诚信威客网站，服务更放心</h2>
<ul>
<li class="col3">
<p>
<span class="fa-stack fa-2x">
<i class="fa fa-circle fa-stack-2x text-success"></i>
<i class="fa fa-yen fa-stack-1x fa-inverse"></i>
</span>
</p>
<p>担保交易</p>
</li>
<li class="col3">
<p>
<span class="fa-stack fa-2x">
<i class="fa fa-circle fa-stack-2x text-success"></i>
<i class="fa fa-shield fa-stack-1x fa-inverse"></i>
</span>
</p>
<p>诚信保障</p>
</li>
<li class="col3">
<p>
<span class="fa-stack fa-2x">
<i class="fa fa-circle fa-stack-2x text-success"></i>
<i class="fa fa-user fa-stack-1x fa-inverse"></i>
</span>
</p>
<p>威客认证</p>
</li>
</ul>
</div>
<?php if(TOOL === TRUE) { ?> <?php if($uid==$arrServiceInfo['uid']&&$arrPayitemLists&&$arrServiceInfo['service_status']==2) { ?>
<div class="box-header">
<h2 class="min-title">提升效果，你可能还需要</h2>
</div>
<div class="box-body apply-for-service">
<?php if(is_array($arrPayitemLists)) { foreach($arrPayitemLists as $k => $v) { ?>
<dl>
<dt>
<a href="javascript:payitem('goods','<?php echo $arrServiceInfo['service_id'];?>','<?php echo $arrServiceInfo['uid'];?>');void(0);" class="btn btn-success btn-sm" role="button"><?php echo $v['item_name']?></a>
（
<span class="money">
<sub>￥</sub>
<?php echo $v['item_cash']?> 元
</span>
/ <?php echo $v['item_standard']?>）
</dt>
<dd><?php echo $v['item_desc']?></dd>
</dl>
<?php } } ?>
</div>
<?php } ?> <?php } ?>
<!--  site-security end -->
<div class="box-header">
<h2 class="min-title">推荐摄影师</h2>
</div>
<div class="box-body">
<ul class="record-list img">
<?php if($arrRecommShops) { ?> <?php if(is_array($arrRecommShops)) { foreach($arrRecommShops as $k => $v) { ?>
<li>
<a href="index.php?do=seller&id=<?php echo $v['uid']?>" class="avatar" title="<?php echo $v['shop_name']?>">
<?php echo  keke_user_class::get_user_pic($v['uid'],'middle') ?>
</a>
<div class="avatar-detail">
<p class="record-list-title">
<a href="index.php?do=seller&id=<?php echo $v['uid']?>" title="<?php echo $v['shop_name']?>"> <?php echo $v['shop_name']?> </a>
</p>
<p class="record-list-meta">
<!--好评率
<span>
{eval echo <?php echo $v['good_rate']?>*100}
<sub>%</sub>
</span>-->
</p>
<p>
<span class="marked marked-tags"><?php echo $indus_p_arr[$v['indus_pid']]['indus_name'];?></span>
<span class="marked marked-tags"><?php echo $indus_c_arr[$v['indus_id']]['indus_name'];?></span>
</p>
</div>
</li>
<?php } } ?> <?php } else { ?> <li class="col-xs-6 col-sm-3 col-md-3 col-lg-2">暂无数据!</li><?php } ?>
</ul>
</div>
<!-- 推荐服务商 & box-body end -->
</div>
<!-- #side end -->
*/ ?>
<div id="main">
<div class="for-advertise" style="display:none">
<?php keke_loaddata_class::ad_show('GOODINFO_HEAD','goods','') ?>
</div>
        <div class="goods">
<img src="/data/uploads/sys/ad/794757318566c5c39250d9.jpg" style="visibility: hidden;"/>
            <iframe src="index.php?do=view&sid=<?php echo $arrServiceInfo['service_id'];?>" width="100%" height="100%" frameborder="0"></iframe>  
        </div>
        <div class="layout_center goods_data_panel">
<div class="user_photo_panel">
<a href="index.php?do=seller&id=<?php echo $arrServiceInfo['uid'];?>"><?php echo  keke_user_class::get_user_pic($arrSellerInfo['uid'],'larger') ?></a>
<div>
<?php if(is_array($arrPayitemShow)) { foreach($arrPayitemShow as $k => $v) { ?>
<span class="marked <?php echo $v['style']?>"><?php echo $v['abbr']?></span>
<?php } } ?>
</div>
</div>
<div class="goods_data">
<div>
<div class="bdsharebuttonbox share_links">
<a title="赞一个" href="javascript:" class="zan"></a>
<a title="收藏" href="javascript:" class="shoucang" onclick="collect();return false;"></a>
<a title="分享到腾讯微博" href="javascript:" class="bds_tqq" data-cmd="tqq"></a>									
<a title="分享到微信" href="javascript:" class="bds_weixin" data-cmd="weixin"></a>
<a title="全屏浏览" href="index.php?do=view&sid=<?php echo $arrServiceInfo['service_id'];?>" class="look_all" target="_blank" ></a>
<a title="更多" href="javascript:" style="display: none;"></a>
</div>
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<h3><?php echo $arrServiceInfo['title'];?></h3> 
</div>
<div class="user_name">
<i class="user_icon"></i>
<span><a href="index.php?do=seller&id=<?php echo $arrServiceInfo['uid'];?>"><?php if($arrSellerInfo['shop_name']) { ?><?php echo $arrSellerInfo['shop_name'];?><?php } else { ?><?php echo $arrSellerInfo['username'];?><?php } ?></a></span>
</div>
<div>
分类：
<a href="index.php?do=goodslist&pd=<?php echo $indus_p_arr[$arrServiceInfo['indus_pid']]['indus_id'];?>"><?php echo $indus_p_arr[$arrServiceInfo['indus_pid']]['indus_name'];?></a>
/
<a href="index.php?do=goodslist&pd=<?php echo $indus_arr[$arrServiceInfo['indus_id']]['indus_pid'];?>&i=<?php echo $indus_arr[$arrServiceInfo['indus_id']]['indus_id'];?>"></a>
</div>
<?php if($regionCfg['region_search_switch']== '1' && $regionCfg['region_search_shop']=='1') { ?>
<div>地点：<span><?php echo $province['name'];?></span><span><?php echo $city['name'];?></span><span><?php echo $area['name'];?></span></div>
<?php } ?>
<div>
<!-- 简介 -->
</div>
</div>
<div style="display: none;">
<a href="index.php?do=seller&id=<?php echo $arrServiceInfo['uid'];?>" class="btn btn-primary btn-sm">进入作者主页</a>
<?php if($gUid!=$arrServiceInfo['uid']) { ?> <?php if($intFavorite &&$gUid) { ?>
<a title='取消收藏' class='btn btn-default btn-sm' onclick="test();" href="javascript:void(0);">取消收藏</a>
<?php } else { ?>
<a title="收藏" onclick="collect();" class="btn btn-primary btn-sm" href="javascript:void(0);">我要收藏 </a>
<?php } ?>
<?php if($gUid&&$gUid!=$arrOwnerInfo['uid']) { ?>
<a href="javascript:report(2,'product','<?php echo $arrOwnerInfo['uid'];?>','<?php echo $arrServiceInfo['service_id'];?>','<?php echo $arrServiceInfo['service_id'];?>');void(0);" class="action-report btn btn-default btn-sm">
<i class="fa fa-bell"></i>
举报
</a>
<?php } ?>
</div>
<div><?php echo $indus_arr[$arrServiceInfo['indus_id']]['indus_name'];?></a></div>
<div class="clear"></div>
        </div>
<?php } ?>
<div class="layout_center">
<!-- detail end-->
<div class="tab tab-darken" id="pageT">
<a href="<?php echo $strUrl;?>&view=content#pageT" <?php if($view== 'content') { ?>class="selected"<?php } ?>>作品描述</a><a href="<?php echo $strUrl;?>&view=comment#pageT" <?php if($view== 'comment') { ?>class="selected"<?php } ?>>
留言（<?php echo $arrServiceInfo['leave_num'];?>）
</a>
</div>
<!-- tab end -->
<?php require keke_tpl_class::template ( "shop/" . $arrModelInfo ['model_code'] . "/tpl/" . $_K ['template'] . "/".$view ); ?>
<div class="photographer">
<h2 class="min-title">该摄影师的其他作品</h2>
</div>
<div class="box-body same-type mb_10">
<ul class="min-list img row">
<?php if($arrOtherGoods) { ?> <?php if(is_array($arrOtherGoods)) { foreach($arrOtherGoods as $k => $v) { ?>
<li class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
<a title="<?php echo $v['title']?>" href="index.php?do=goods&id=<?php echo $v['service_id']?>">
<div class="min-list-img"><?php $arrPic=explode(',',$v['pic']);$img=strstr($arrPic[0],'http'); ?>
<img alt="<?php echo $v['title']?>" onerror='$(this).attr("src","tpl/default/img/shop/shop_default_big.jpg")' alt="<?php echo $v['title']?>" <?php if($img) { ?>src="<?php echo $arrPic['0'];?>" style="width:210px;"<?php } else { ?>src="<?php echo keke_shop_class::output_pics($v['file_path'],210,1,1,$v['service_id']) ?>"<?php } ?>>
<!--<span class="money">
<sub>￥</sub>
<?php echo $v['price']?>
</span>-->
</div>
<div class="min-list-title"><?php echo $v['title']?></div>
</a>
</li>
<?php } } ?> <?php } else { ?><li class="col-xs-6 col-sm-3 col-md-3 col-lg-2">暂无数据!</li> <?php } ?>
</ul>
</div>

</div>
</div>
<!-- #main end -->
</div>
<!-- container end -->
<script type="text/javascript" src="shop/goods/tpl/default/order/order.js"></script>
<script type="text/javascript" src="shop/goods/tpl/default/goods.js"></script>
<script type="text/javascript">
function collect(){
if(checkLogin()){
$.ajax({
   type: "GET",
   url: "<?php echo $strUrl;?>&obj_type=service&service_id=<?php echo $arrServiceInfo['service_id'];?>&uid=<?php echo $arrServiceInfo['uid'];?>&type=get",
});
   $("#sc").empty();
   $("#sc").append("<a title='取消收藏' href='javascript:void(0);'  class='btn btn-default btn-sm' onclick='test();'  id='unsubscribe'>取消收藏</a>");
}
}
function test(){
if(checkLogin()){
$.ajax({
   type: "GET",
   url: "<?php echo $strUrl;?>&service_id=<?php echo $arrServiceInfo['service_id'];?>&uid=<?php echo $arrServiceInfo['uid'];?>&type=getno",
});
$("#sc").empty();
$("#sc").append("<a href='javascript:void(0);' onclick='collect();' title='我要收藏'  class='btn btn-primary btn-sm'>我要收藏</a>");
}
}

 /* $(function(){
    $('.detail-thumbnail-item a').fancybox({
      openEffect  : 'none',
      closeEffect : 'none',
      padding     : 5,
      closeBtn    : false,
      tpl:{
        error    : '<p class="fancybox-error">内容无法加载。<br/>请稍后重试。</p>'
      },
      helpers : {
        title : {
          type : 'over'
        },
        buttons : {}
      }
    });

    $('.detail-thumbnail-inner').jcarousel({});

    $('.jcarousel-control-prev').on('jcarouselcontrol:active', function() {
      $(this).removeClass('inactive');
    }).on('jcarouselcontrol:inactive', function() {
      $(this).addClass('inactive');
    }).jcarouselControl({
      // Options go here
      target: '-=1'
    });

     $('.jcarousel-control-next').on('jcarouselcontrol:active', function() {
      $(this).removeClass('inactive');
    }).on('jcarouselcontrol:inactive', function() {
      $(this).addClass('inactive');
    }).jcarouselControl({
      // Options go here
      target: '+=1'
    });
  })
*/
</script>
<div id="fix-box" style="display:none;">
  <a id="top" href="javascript:void(0);"><i class="fa fa-angle-up"></i></a>
</div>
<!-- #fix-box end -->
<link href="tpl/default/css/bootstrap.min.css" rel="stylesheet">
<link href="tpl/default/css/iyun720.css" rel="stylesheet" type="text/css">


<script src="tpl/default/js/bootstrap.min.js"></script>
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
</html>
<?php keke_tpl_class::ob_out();?>