<?php keke_tpl_class::checkrefresh('tpl/default/user/account_chooseavatar', '1452556775' );?><!DOCTYPE HTML>
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
        <link rel="shortcut icon" href="favicon.ico" />
        <link rel="apple-touch-icon" href="favicon.ico"/>
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

<div class="form-group search-input po_re" id="div_search_input">
<input type="text" name="ky" id="search"  class="form-control" placeholder="搜索你喜欢的" value="<?php if($ky) { ?><?php echo $ky;?><?php } ?>" onkeyup="searchlist();" onfocus="searchlist();" data-toggle="dropdown"  x-webkit-speech="" x-webkit-grammar="bUIltin:search" lang="zh-CN"  aria-haspopup="true" aria-expanded="false" autocomplete="off">
<ul class="dropdown-menu" role="menu" id="hotsearch" aria-labelledby="dLabel" style="display:none">

</ul>
</div><button type="submit" class="btn btn-primary">
搜索
</button>
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
<script src="static/js/model/user/user.js"></script>
<script src="static/js/model/user/transaction.js"></script>
<!-- 首页 start -->
<nav class="top-nav">
<div class="container">
<div class="nav-header">
<a class="nav-brand" href="index.php?do=user&view=account">用户中心</a>
</div>
<!-- nav-header end -->
<ul class="menu">
<li class="line"></li>
<!-- <li><a href="index.php?do=user" <?php if($view=='collect'||$view=='finance'||$view=='focus'||$view=='prom'||$view=='shop'||$view=='transaction'||$view=='index') { ?>class="selected"<?php } ?>><i class="fa fa-tachometer"></i> <span>首页</span></a></li> -->
<li class="line"></li>
            <li>
<a href="index.php?do=user&view=wk" <?php if($view== 'wk') { ?>class="selected"<?php } ?>>
<span>我是摄影师</span>
</a>
</li>
<li class="line"></li>
<li>
<a href="index.php?do=user&view=account" <?php if($view== 'account' || $view=='finance' || $view=='focus' || $view=='prom') { ?>class="selected"<?php } ?>>
<i class="fa fa-cogs"></i>
<span>帐号设置</span>
</a>
</li>
<li class="line"></li>
<!--<li>
<a href="index.php?do=user&view=gz" <?php if($view== 'gz') { ?>class="selected"<?php } ?>>
<span>我是雇主</span>
</a>
</li>-->
<li class="line"></li>


<!-- 	<li>
<a href="index.php?do=user&view=message&op=trends" <?php if($view== 'message') { ?>class="selected"<?php } ?>>
<i class="fa fa-envelope"></i>
<span>我的消息</span>
<?php if($messagecount) { ?>
<span class="badge"><?php echo $messagecount;?></span>
<?php } ?>
</a>
</li>
<li class="line"></li>
<li>
<a href="index.php?do=seller&id=<?php echo $gUid;?>" target="_blank">
<i class="fa fa-home"></i>
<span>我的主页</span>
</a>
</li>
<li class="line"></li> -->
</ul>
<!-- menu end -->

</div>
<!-- container end -->
</nav>
<!-- nav end -->
<div class="container">
  <div class="nav-action">
<?php if(($view=='account' && !in_array($op,array('report','rights')) )||$view=='finance'||$view=='prom'||$view=='focus') { ?>
<a href="javascript:void(0);" class="nav-toggle"><i class="fa fa-reorder"></i></a>
<dl class="nav-list">
      <dt class="nav-list-title"><i class="fa fa-minus"></i> 基本资料</dt>
      <dd class="nav-list-body">
        <a href="index.php?do=user&view=account&op=basic" <?php if(($op=='basic'||$op=='contact')&&$view=='account') { ?>class="selected"<?php } ?> >资料完善</a>
        <a href="index.php?do=user&view=account&op=chooseavatar" <?php if($op=='uploadavatar'||$op=='chooseavatar') { ?>class="selected"<?php } ?> >用户头像</a>
       
      </dd>
  <dt class="nav-list-title"><i class="fa fa-minus"></i> 账号安全</dt>
  <dd class="nav-list-body">
  	<a href="index.php?do=user&view=account&op=password" <?php if($op=='password') { ?>class="selected"<?php } ?> >登录密码</a>
  	<!--<a href="index.php?do=user&view=account&op=security" <?php if($op=='security') { ?>class="selected"<?php } ?> >支付密码</a>
        <a href="index.php?do=user&view=account&op=binding" <?php if($op=='binding') { ?>class="selected"<?php } ?> >账号绑定</a>
        <a href="index.php?do=user&view=account&op=auth" <?php if($op=='auth') { ?>class="selected"<?php } ?> >账号认证</a>-->
<!-- <a href="index.php?do=user&view=account&op=report" <?php if($op=='report') { ?>class="selected"<?php } ?> >交易维权</a> -->
  </dd>
         <!-- <dt class="nav-list-title"><i class="fa fa-minus"></i> 财务管理</dt>
      <dd class="nav-list-body">
        <a href="index.php?do=user&view=finance&op=basic" <?php if(in_array($op,array('basic','details','rechargelog','withdrawlog')) &&$view=='finance') { ?>class="selected"<?php } ?>>收支明细</a>
        <a href="index.php?do=user&view=finance&op=withdraw"  <?php if($op=='withdraw') { ?>class="selected"<?php } ?>>我要提现</a>
        <a href="index.php?do=user&view=finance&op=rechargeonline" <?php if(in_array($op,array('rechargeonline','rechargeoffline'))) { ?>class="selected"<?php } ?>>账号充值</a>
      </dd>
          <dt class="nav-list-title"><i class="fa fa-minus"></i> 我的推广</dt>
      <dd class="nav-list-body">

        <a href="index.php?do=user&view=prom&op=code"  <?php if($op=='code') { ?>class="selected"<?php } ?>>推广代码</a>
        <a href="index.php?do=user&view=prom&op=benefit" <?php if($op=='benefit') { ?>class="selected"<?php } ?>>推广收益</a>
      </dd>
            <dt class="nav-list-title"><i class="fa fa-minus"></i> 我的关注</dt>
      <dd class="nav-list-body">

        <a href="index.php?do=user&view=focus&op=attention"  <?php if($op=='attention') { ?>class="selected"<?php } ?>>全部关注</a>
        <a href="index.php?do=user&view=focus&op=fans"  <?php if($op=='fans') { ?>class="selected"<?php } ?>>我的粉丝</a>
        <a href="index.php?do=user&view=focus&op=each" <?php if($op=='each') { ?>class="selected"<?php } ?>>相互关注</a>
      </dd>-->
</dl>
<?php } elseif($view=='message'||($view=='account' && in_array($op,array('report','rights')) )) { ?>
<a href="javascript:void(0);" class="nav-toggle"><i class="fa fa-reorder"></i></a>
    <dl class="nav-list">
      <dt class="nav-list-title"><i class="fa fa-minus"></i> 我的消息</dt>
      <dd class="nav-list-body">
        <a href="index.php?do=user&view=message&op=trends" <?php if($op=='trends') { ?>class="selected"<?php } ?> ><?php if($intCountTrends) { ?><span class="badge"><?php echo $intCountTrends;?></span><?php } ?> 交易动态</a>
        <a href="index.php?do=user&view=message&op=notice" <?php if($op=='notice') { ?>class="selected"<?php } ?> ><?php if($intCountNotice) { ?><span class="badge"><?php echo $intCountNotice;?></span><?php } ?> 系统通知</a>
        <a href="index.php?do=user&view=message&op=private"  <?php if($op=='private') { ?>class="selected"<?php } ?> ><?php if($intCountPrivate) { ?><span class="badge"><?php echo $intCountPrivate;?></span><?php } ?>我的私信</a>
        <a href="index.php?do=user&view=message&op=send"  <?php if($op=='send') { ?>class="selected"<?php } ?> >写消息</a>
        <a href="index.php?do=user&view=message&op=outbox"  <?php if($op=='outbox') { ?>class="selected"<?php } ?> >发件箱</a>

      </dd>
      <dt class="nav-list-title"><i class="fa fa-minus"></i> 交易维权</dt>
      <dd class="nav-list-body">
        <a href="index.php?do=user&view=account&op=report"  <?php if($op=='report') { ?>class="selected"<?php } ?> >举报管理</a>
        <a href="index.php?do=user&view=account&op=rights"  <?php if($op=='rights') { ?>class="selected"<?php } ?> >维权管理</a>

      </dd>
    </dl>

<?php } elseif($view=='gz'|| ($view=='transaction'&&in_array($op,array('released','orders','gy')))||($view=='collect' && in_array($op,array('goods','work')) )) { ?>
<a href="javascript:void(0);" class="nav-toggle"><i class="fa fa-reorder"></i></a>
<dl class="nav-list">
      <dt class="nav-list-title"><i class="fa fa-minus"></i> 交易管理</dt>
      <dd class="nav-list-body">
        <a href="index.php?do=pubtask" target="pubpage">快速发布任务</a>
        <a href="index.php?do=user&view=transaction&op=released" <?php if($op=='released') { ?> class="selected"<?php } ?>><?php if($intCountTask) { ?><span class="badge"><?php echo $intCountTask;?></span><?php } ?>我发布的任务</a>
        <a href="index.php?do=user&view=transaction&op=orders" <?php if($op=='orders') { ?> class="selected"<?php } ?>><?php if($intCountService) { ?><span class="badge"><?php echo $intCountService;?></span><?php } ?>我买入的作品</a>
        <a href="index.php?do=user&view=gz&op=gy" <?php if($op=='gy') { ?> class="selected"<?php } ?>>我发起的雇佣</a>
        <a href="index.php?do=user&view=gz&op=mark" <?php if($op=='mark') { ?> class="selected"<?php } ?>>交易评价</a>
      </dd>
            <dt class="nav-list-title"><i class="fa fa-minus"></i> 我的收藏</dt>
      <dd class="nav-list-body">
        <a href="index.php?do=user&view=collect&op=goods" <?php if($op=='goods') { ?>class="selected"<?php } ?>><?php if($intCountFavoriteService) { ?><span class="badge"><?php echo $intCountFavoriteService;?></span><?php } ?>我收藏的作品</a>
        <a href="index.php?do=user&view=collect&op=work" <?php if($op=='work') { ?>class="selected"<?php } ?>><?php if($intCountFavoriteWork) { ?><span class="badge"><?php echo $intCountFavoriteWork;?></span><?php } ?>我收藏的稿件</a>
      </dd>
    </dl>
<?php } elseif($view=='wk'|| ($view=='transaction'&&in_array($op,array('undertake','sold','bygy','works','service')))||($view=='collect' && in_array($op,array('goods','task','service')) )||($view=='shop' && in_array($op,array('setting','caselist','caseadd')) )) { ?>
<a href="javascript:void(0);" class="nav-toggle"><i class="fa fa-reorder"></i></a>
<dl class="nav-list">
     <!-- <dt class="nav-list-title"><i class="fa fa-minus"></i> 交易管理</dt>
      <dd class="nav-list-body">
        <a href="index.php?do=user&view=transaction&op=undertake" <?php if($op=='undertake') { ?>class="selected"<?php } ?>><?php if($intCountUnderTask) { ?><span class="badge"><?php echo $intCountUnderTask;?></span><?php } ?>我承接的任务</a>
        <a href="index.php?do=user&view=transaction&op=sold" <?php if($op=='sold') { ?>class="selected"<?php } ?>><?php if($intCountSold) { ?><span class="badge"><?php echo $intCountSold;?></span><?php } ?>我卖出的作品</a>
        <a href="index.php?do=user&view=wk&op=gy" <?php if($op=='gy') { ?>class="selected"<?php } ?>>我接受的雇佣</a>
        <a href="index.php?do=user&view=transaction&op=works" <?php if($op=='works') { ?>class="selected"<?php } ?>>我的投稿记录</a>
        <a href="index.php?do=user&view=wk&op=mark" <?php if($op=='mark') { ?> class="selected"<?php } ?>>交易评价</a>
      </dd>-->
            <dt class="nav-list-title"><i class="fa fa-minus"></i> 作品管理</dt>
      <dd class="nav-list-body">
      	<a href="index.php?do=pubgoods" target="pubpage">快速发布作品</a>
        <a href="index.php?do=seller&id=<?php echo $gUid;?>" target="_blank">我的主页</a>
        <a href="index.php?do=user&view=shop&op=setting" <?php if($op=='setting') { ?>class="selected"<?php } ?>>主页设置</a>
        <a href="index.php?do=user&view=account&op=skill" <?php if($op=='skill') { ?>class="selected"<?php } ?> >擅长</a>
        <a href="index.php?do=user&view=transaction&op=service" <?php if($op=='service') { ?>class="selected"<?php } ?>>作品管理</a>
        <!--<a href="index.php?do=user&view=shop&op=caselist" <?php if($op=='caselist'||$op=='caseadd') { ?>class="selected"<?php } ?>>案例管理</a>-->
      </dd>
      <!-- <dt class="nav-list-title"><i class="fa fa-minus"></i> 我的收藏</dt>
      <dd class="nav-list-body">
         <a href="index.php?do=user&view=collect&op=task" <?php if($op=='task') { ?>class="selected"<?php } ?>><?php if($intCountFavoriteTask) { ?><span class="badge"><?php echo $intCountFavoriteTask;?></span><?php } ?>收藏的任务</a>
      </dd>-->
    </dl>
    <?php } ?>
  </div>
  <!-- nav-action end -->
  <div class="content-panel">
      <div class="tab">
      	<a <?php if($op === 'chooseavatar') { ?>class="selected"<?php } ?> href="index.php?do=user&view=account&op=chooseavatar" >选择头像</a>
        <a <?php if($op === 'uploadavatar') { ?>class="selected"<?php } ?> href="index.php?do=user&view=account&op=uploadavatar" >上传头像</a>
      </div>
      <div class="tab_detail">
      		<!-- 基本资料 start -->
          <form role="form" action="<?php echo $strUrl;?>" method="post" class="form-horizontal" name="editChooseavatarForm" id="editChooseavatarForm">

          	  <div class="form-group">

                  <h2 class="min-title">系统头像</h2>


                  <div class="clearfix">
                    <?php if(is_array($arrSystemPic)) { foreach($arrSystemPic as $k => $v) { ?>
                    <div class="col-xs-2 col-md-1">
                      <a href="javascript:formSubmit('<?php echo $strUrl;?>&action=chooseAvatar&intPicId=<?php echo $v?>','url');void(0);" class="thumbnail" title="就选这个" onclick="">
                        <img src="data/avatar/system/<?php echo $v;?>_small.jpg" class="pic_small" alt="KPPW2.5系统头像"/>
                      </a>
                    </div>
                    <?php } } ?>
                  </div>

              </div>

              <h2 class="min-title">头像预览</h2>


              <ul class="clearfix">
              	<li class="thumbnail fl_l mr_10">
                    <?php echo  keke_user_class::get_user_pic($uid,larger) ?>
<p><small>150x150像素</small></p>
</li>
<li class="thumbnail fl_l mr_10">
<?php echo  keke_user_class::get_user_pic($uid,middle) ?>
<p><small>100x100像素</small></p>
</li>
<li class="thumbnail fl_l mr_10">
<?php echo  keke_user_class::get_user_pic($uid,small) ?>
<p><small>50x50像素</small></p>
</li>
              </ul>
          </form>
      		<!-- 基本资料 end -->
      </div>
  </div>
  </div>
<script type="text/javascript" src="static/js/model/user/account.js" ></script>
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
<a href="/index.php?do=article&id=348&page=1">活动</a>
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