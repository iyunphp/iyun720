<?php keke_tpl_class::checkrefresh('tpl/default/user/shop_setting', '1452484094' );?><!DOCTYPE HTML>
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
        <a class="selected"  data-toggle="tab">主页设置</a>　　
      </div>

      <div class="tab_detail">



<div class="form-horizontal">
<div class="alert alert-success" id="shop_status1_desc" <?php if($shopInfo['shop_status'] =='3'||!$shopInfo['shop_status']) { ?>style="display:none"<?php } ?>>
<p>
<i class="fa"></i> 关闭主页之后您将不再出现在服务商列表，同时您的作品将全部下架
</p>
    </div>
<div class="alert alert-success" id="shop_status2_desc" <?php if($shopInfo['shop_status'] =='1') { ?>style="display:none"<?php } ?>>
<p>
<i class="fa fa-check-circle"></i> 您需要先开启主页之后才能作品发布操作
</p>
    </div>


<div class="form-group">
<label class="col-sm-2 control-label" for="shop_name">主页状态：</label>
<div class="col-sm-8">
<label class="radio-inline">
  <input type="radio" name="shop_status" id="shop_status1" value="open"　<?php if($shopInfo['shop_status'] =='1') { ?> checked="checked" <?php } ?>> 开启
</label>
<label class="radio-inline">
  <input type="radio" name="shop_status" id="shop_status2" value="close" <?php if($shopInfo['shop_status'] =='3'||!$shopInfo['shop_status']) { ?> checked="checked" <?php } ?>> 关闭
</label>
</div>
</div>
</div>




      		<!-- 主页设置 start -->
          <form role="form" action="<?php echo $strUrl;?>" method="post" class="form-horizontal" name="editShopForm" id="editShopForm" <?php if($shopInfo['shop_status'] =='3'||!$shopInfo['shop_status']) { ?>style="display:none;"<?php } ?>>
          	<input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>">
            



<div class="form-group">
              <label class="col-sm-2 control-label" for="shop_name">主页名称：</label>
                <div class="col-sm-8">
                  <input type="text"  name="shop_name" id="shop_name"  class="form-control" value="<?php echo $shopInfo['shop_name'];?>">
                </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" for="shop_slogans">简介：</label>
              <div class="col-sm-8">
                 <textarea id="shop_slogans" name="shop_slogans" maxlength="50" rows="5" class="form-control"><?php echo $shopInfo['shop_slogans'];?></textarea>
 <span class="help-block"><i class="fa"></i>您的主页广告语直接影响到他人对您的第一印象，请慎重对待。最多50字。</span>
              </div>
            </div>
<div class="form-group">
              <label class="col-sm-2 control-label">所在地：</label>
              <div class="col-sm-10 row">
                <div class="col-sm-3">
                  <select class="form-control" name="province" id="province" onchange="getZone(this.value,'city');">
                  	<option>选择省份</option>
<?php if(is_array($arrProvinces)) { foreach($arrProvinces as $k => $v) { ?>
<option value="<?php echo $v['id'];?>" <?php if($shopInfo['province']==$v['id']) { ?>selected="selected"<?php } ?>><?php echo $v['name'];?></option>
<?php } } ?>
                  </select>
                  </div>
                <div class="col-sm-3">
                  <select class="form-control" name="city" id="city" onchange="getZone(this.value,'area');">
                  	<option>选择城市</option>
<?php if($shopInfo['city']) { ?>
<option value="<?php echo $arrCity['id'];?>" selected="selected"><?php echo $arrCity['name'];?></option>
<?php } ?>
                  </select>
                </div>
               <div class="col-sm-3">
                  <select class="form-control" name="area" id="area" >
                  	<option>选择区域</option>
<?php if($shopInfo['area']) { ?>
<option value="<?php echo $arrArea['id'];?>" selected="selected"><?php echo $arrArea['name'];?></option>
<?php } ?>
                  </select>
                </div>
              </div>
            </div>
<div class="form-group">
      	<label class="col-sm-2 control-label" for="address">详细地址：</label>
        <div class="col-sm-4">
          <input type="hidden"  name="address" id="address"  class="form-control" value="<?php echo $shopInfo['address'];?>">
  <div id="span_address" style="padding-top:8px;"><?php echo $shopInfo['address'];?></div>
    	</div>
<div class="col-sm-4">
<input type="hidden" name="coordinate" id="coordinate" value="<?php echo $shopInfo['coordinate'];?>">
<?php if($shopInfo['coordinate']) { ?>
          <a href="javascript:showMap('<?php echo $gUserInfo['uid'];?>');" class="btn btn-default btn-sm">查看地图</a><a href="javascript:setMap('<?php echo $gUserInfo['uid'];?>');" class="btn btn-default btn-sm">重新定位</a>
  <?php } else { ?>
  <a href="javascript:setMap('<?php echo $gUserInfo['uid'];?>');" class="btn btn-default btn-sm">标注地图</a>
  <?php } ?>
    	</div>
  	</div>
<div class="form-group">
      	<label class="col-sm-2 control-label" for="address">主页头部图片:</label>
        <div class="col-sm-6">
       <!--   <a href="javascript:changeBanner('<?php echo $uid;?>');void(0);" id="change_banner">点击更改图片</a>-->
<img id="banner_img" onerror="this.src='tpl/default/img/store_banner.jpg'" src="<?php if($shopInfo['banner']) { ?><?php echo $shopInfo['banner'];?><?php } else { ?>tpl/default/img/store_banner.jpg<?php } ?>" alt="banner" class="img-responsive mb_20">
<!--<input type="file" class="file" name="upload1" id="upload1">
 	<input type="hidden"  name="file_id" id="fileid"  class="form-control">-->

<div id="picker">上传图片</div>
<input type="hidden"  name="fileid" id="fileid"  class="form-control">
 	<input type="hidden"  name="banner" id="banner_path"  class="form-control">
</div>
<div class="col-sm-4"><p class="text-info mb_10"><i class="fa fa-info-circle"></i> <strong>提示</strong> 最佳图片尺寸：1200*280像素</p></div>

</div>
<div class="form-group ">
<div class="col-sm-offset-2 col-sm-6">
<ul class="affix-list upload-file-list-info" id="fileList">

</ul>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label" for="address">主页背景图片:</label>
<div id="bground" class="col-sm-6">
<img id="background_img" class="img-responsive mb_20" onerror="this.src='tpl/default/img/store_banner.jpg'" src="<?php if($shopInfo['shop_background']) { ?><?php echo $shopInfo['shop_background'];?><?php } else { ?>tpl/default/img/store_banner.jpg<?php } ?>">
<div class="form-inline pull-right">
                    <div class="checkbox">
                        <label>
                          <input type="checkbox" name="repeat" value="repeat-x" <?php if($arrBackgroudStyle['repeat']=='repeat-x') { ?>checked="checked"<?php } ?>> 平铺
                        </label>
                      </div>
                    <select id="position" name="position" class="form-control">
                        <option value="left top" <?php if($arrBackgroudStyle['position']=='left top') { ?>selected="selected"<?php } ?>>居中对齐</option>
                        <option value="center top" <?php if($arrBackgroudStyle['position']=='center top') { ?>selected="selected"<?php } ?>>居左对齐</option>
                        <option value="right top" <?php if($arrBackgroudStyle['position']=='right top') { ?>selected="selected"<?php } ?>>居右对齐</option>
                     </select>
                </div>
 <!--<input type="file" class="file" name="upload2" id="upload2">
 <input type="hidden"  name="file_id" id="fileid"  class="form-control">-->
 
 <div id="picker1" style="width:88px;">上传图片</div>
 <input type="hidden"  name="fileid1" id="fileid1"  class="form-control">
 		 <input type="hidden"  name="background" id="background_path"  class="form-control">
            </div>
<div class="col-sm-4">
<p class="text-info mb_10">
                    <i class="fa fa-info-circle"></i> <strong>提示</strong>
                    主页背景图片,宽度必须为950px。支持.jpg,.gif,.png,.jpeg格式。
                </p>
</div>
    	</div>
<div class="form-group ">
<div class="col-sm-offset-2 col-sm-6">
<ul class="affix-list upload-file-list-info" id="fileList1">

</ul>
</div>
</div>
<!-- 
<div class="form-group">
              <label class="col-sm-2 control-label" for="seo_title">SEO标题：</label>
                <div class="col-sm-8">
                  <input type="text"  name="seo_title" id="seo_title"  class="form-control" value="<?php echo $shopInfo['seo_title'];?>">
                </div>
            </div>

<div class="form-group">
              <label class="col-sm-2 control-label" for="seo_keyword">SEO关键词：</label>
                <div class="col-sm-8">
                  <input type="text"  name="seo_keyword" id="seo_keyword"  class="form-control" value="<?php echo $shopInfo['seo_keyword'];?>">
                </div>
            </div>
  <div class="form-group">
              <label class="col-sm-2 control-label" for="seo_desc">SEO描述：</label>
              <div class="col-sm-8">
                 <textarea id="seo_desc" name="seo_desc" rows="5"   class="form-control"> <?php echo $shopInfo['seo_desc'];?></textarea>
              </div>
-->
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-default" type="submit" value="1" >保存</button>
                <span class="text-success" id="tipsUser"></span>
              </div>
            </div>
          </form>
      		<!-- 基本资料 end -->
      </div>
  </div>
  </div>
<script src="static/js/model/user/shop.js"></script>
<script type="text/javascript">
        $(function(){
        	$("input[name='shop_status']").click(function(){
var flag = false;

if($(this).val() == 'close'){
var confirm = $.scojs_confirm({
  content: "关闭主页的同时会将您的作品下架，确定要关店吗？",
  action: function() {
    flag = true;
  },
  onClose: function() {
    flag = false;
this.destroy();
$('#shop_status1').prop('checked',true);
$('#shop_status2').prop('checked',false);
  }
});
confirm.show();
}else{
flag = true;
}

if(flag == true){
$.post('index.php?do=user&view=shop&op=setting',{ajaxop:'setstatus',setstatus:$(this).val()},function(){
if($('#shop_status1').attr('checked')){
$('#editShopForm').show();
$('#shop_status2_desc').hide();
$('#shop_status1_desc').show();
}
else{
$('#editShopForm').hide();
$('#shop_status2_desc').show();
$('#shop_status1_desc').hide();
}
});
}

});
        });
</script>

<link rel="stylesheet" type="text/css" href="static/js/webuploader/webuploader.css">
<script type="text/javascript" src="static/js/webuploader/webuploader.js?r=<?php echo RANDOM_PARA;?>"></script>
<script type="text/javascript" src="static/js/webuploader/kppw.webuploader.js"></script>
<script type="text/javascript">




$(function(){
var uploadsize = parseInt("<?php echo $basic_config['max_size'];?>");
uploadsize =  isNaN(uploadsize)? 1 : uploadsize;
$("#picker").KKUploader({
accept: {
extensions : 'jpg,gif,png,jpeg'
},
fileNumLimit:1,
hiddenName: 'fileid',
uploadEvents: {
uploadComplete:function(file){
var url = $("#"+file.id).find('.webuploader-pick-file-close').attr('data-fileurl');
$('#banner_path').val(url);
$('#banner_img').prop('src',url);
$('.webuploader-pick-file-close').on('click','.close',function(){
$('#banner_img').prop('src','tpl/default/img/store_banner.jpg');
});
}
},
separator:',',
fileSingleSizeLimit:uploadsize*1024*1024,
},
{
filename : 'file',
});

$("#picker1").KKUploader({
accept: {
extensions : 'jpg,gif,png,jpeg'
},
fileNumLimit:1,
hiddenName: 'fileid1',
uploadEvents: {
uploadComplete:function(file){
var url = $("#"+file.id).find('.webuploader-pick-file-close').attr('data-fileurl');
$('#background_path').val(url);
$('#background_img').prop('src',url);
$('.webuploader-pick-file-close').on('click','.close',function(){
$('#background_img').prop('src','tpl/default/img/store_banner.jpg');
});
}
},
separator:',',
fileSingleSizeLimit:uploadsize*1024*1024,
listName: 'fileList1'
},
{
filename : 'file',
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
 <div class="footer">
        <div class="jumbotron">
            <div class="container">
            	<ul class="col-xs-4">
                	<li class="title"><a href="">云游720首页</a></li>
                    <li><a href="#">官方微博</a></li>
                    <li><a href="#">免责声明</a></li>
                    <li><a href="#">版权声明</a></li>
                </ul>
                
                <ul class="col-xs-4">
                	<li class="title"><a href="">联系与合作</a></li>
                    <li><a href="index.php?do=single&id=300">联系我们</a></li>
                    <li><a href="index.php?do=single&id=300">用户反馈</a></li>
                </ul>
                
                <ul class="col-xs-4 right blr1">
                	<li class="title"><a href="">关于我们</a></li>
                    <li><a href="http://weibo.com/u/5774218276">新浪微博：@云游720</a></li>
                    <li><a href="http://wpa.qq.com/msgrd?v=3&uin=3281740739&site=qq&menu=yes">官方QQ：3281740739</a></li>
                    <li><a href="index.php?do=single&id=300">加入我们</a></li>
                </ul>
            </div>
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