<?php keke_tpl_class::checkrefresh('tpl/default/tasklist', '1452663342' );?><!DOCTYPE HTML>
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


<div class="container">


<div id="side">
      <div class="category-list category-lg">
      <a href="javascript:void(0);" class="category-title"><i class="fa fa-list-ul"></i> 分类 <i class="fa fa-angle-down"></i></a>
      <ul class="category-down">
        <?php if(is_array($arrNewIndusC)) { foreach($arrNewIndusC as $key => $value) { ?>
        <li class="category-item">
          <div class="category-top">
            <?php if(is_array($value)) { foreach($value as $k1 => $v1) { ?>
<?php if($k1<2) { ?>
<a href="<?php echo $strUrl;?>&pd=<?php echo $arrIndusP[$key]['indus_id'];?>&i=<?php echo $v1['indus_id']?>"  <?php if($v1['is_recommend']==1) { ?>class="hot"<?php } ?> tabindex="-1"><?php echo $v1['indus_name']?></a>、
<?php } ?>
<?php } } ?>
            <i class="fa fa-angle-right"></i>
          </div>
          <div class="category-inner">
            <h3 class="category-inner-title"><a href="<?php echo $strUrl;?>&pd=<?php echo $arrIndusP[$key]['indus_id'];?>&i=0">全部<?php echo $arrIndusP[$key]['indus_name'];?></a></h3>
        <?php if(is_array($value)) { foreach($value as $k2 => $v2) { ?>
       <a href="<?php echo $strUrl;?>&pd=<?php echo $arrIndusP[$key]['indus_id'];?>&i=<?php echo $v2['indus_id']?>" tabindex="-1" <?php if($v2['is_recommend']==1) { ?>class="hot"<?php } ?>><?php echo $v2['indus_name']?></a>
       <?php } } ?>
          </div>
        </li>
    <?php } } ?>
      </ul>
  </div>
  <!-- category-list end -->

  <div class="box-header">
    <h2 class="min-title">最新发布动态</h2>
  </div>
  <div class="box-body">
    <ul class="record-list">
    	<?php if($arrFeedPubs) { ?>
    	<?php if(is_array($arrFeedPubs)) { foreach($arrFeedPubs as $k => $v) { ?>
        <li>
          <p class="record-list-title">
            <a href="<?php echo $v['event']['url']?>"><span class="marked marked-shop"><?php echo $arrModelLabel[$v['event']['model_id']];?></span> <span class="money"><sub>￥</sub>
 <?php if($v['event']['model_id']=='4'||$v['event']['model_id']=='5') { ?>
               	 <?php echo $arrCashCoves[$v['event']['cash']]['start_cove'];?>-<sub>￥</sub><?php echo $arrCashCoves[$v['event']['cash']]['end_cove'];?>
             <?php } else { ?>
               	 <?php echo $v['event']['cash'];?>
             <?php } ?></span> <?php echo $v['event']['content']?></a>
          </p>
          <p>
          	<?php $timeDesc = kekezu::time2Units(time()-$v['feed_time'],'hour'); ?>
            <time datetime="2008-02-14"><?php if($timeDesc) { ?><?php echo $timeDesc;?>前<?php } else { ?>刚刚<?php } ?></time>
            <a href="<?php echo $v['feed_username']['url']?>"><?php echo $v['username'];?></a> 发布
          </p>
        </li>
<?php } } ?>
<?php } else { ?>
暂无数据
<?php } ?>
      </ul>
  </div>
  <!-- 最新发布动态 & box-body end -->


  <div class="box-header">
    <h2 class="min-title">推荐服务商</h2>
  </div>
  <div class="box-body">
    <ul class="record-list img">
    	<?php if($arrRecommShops) { ?>
    	<?php if(is_array($arrRecommShops)) { foreach($arrRecommShops as $k => $v) { ?>
        <li>
          <a href="index.php?do=seller&id=<?php echo $v['uid']?>" class="avatar" title="<?php echo $v['shop_name']?>">
           <?php echo  keke_user_class::get_user_pic($v['uid'],'middle') ?>
          </a>

          <div class="avatar-detail">
            <p class="record-list-title">
              <a href="index.php?do=seller&id=<?php echo $v['uid']?>" title="<?php echo $v['shop_name']?>">
               <?php echo $v['shop_name']?>
              </a>
            </p>
            <p class="record-list-meta">好评率 <span><?php echo $v['good_rate']*100 ?><sub>%</sub></span></p>
            <p>
              <span class="marked marked-tags"><?php echo $indus_p_arr[$v['indus_pid']]['indus_name'];?></span>
              <span class="marked marked-tags"><?php echo $indus_c_arr[$v['indus_id']]['indus_name'];?></span>
            </p>
          </div>
        </li>
<?php } } ?>
<?php } else { ?>
暂无数据
<?php } ?>
      </ul>
  </div><!-- 推荐服务商 & box-body end -->
</div>
<!-- #side end -->



<div id="main">

  <div class="for-advertise">
  	<?php keke_loaddata_class::ad_show('TASKLIST_HEAD','tasklist','') ?>
  <!-- <img src="" data-src="holder.js/950x50/#f8f8f8:#ddd/text:AD">-->
  </div>
  <!-- for-advertise end -->

  <div class="category-list category-xs">
      <a href="javascript:void(0);" class="category-title"><i class="fa fa-list-ul"></i> 分类 <i class="fa fa-angle-down"></i></a>
      <ul class="category-down">
      	<?php if(is_array($arrNewIndusC)) { foreach($arrNewIndusC as $key => $value) { ?>
        <li class="category-item">
          <div class="category-top">
          	<?php if(is_array($value)) { foreach($value as $k1 => $v1) { ?>
<?php if($k1<2) { ?>
            <a href="<?php echo $strUrl;?>&pd=<?php echo $arrIndusP[$key]['indus_id'];?>&i=<?php echo $v1['indus_id']?>"  <?php if($v1['is_recommend']==1) { ?>class="hot"<?php } ?> tabindex="-1"><?php echo $v1['indus_name']?></a>、
<?php } ?>
<?php } } ?>
            <i class="fa fa-angle-right"></i>
          </div>
          <div class="category-inner">
          	<h3 class="category-inner-title"><a href="<?php echo $strUrl;?>&pd=<?php echo $arrIndusP[$key]['indus_id'];?>&i=0">全部<?php echo $arrIndusP[$key]['indus_name'];?></h3></h3>
  <?php if(is_array($value)) { foreach($value as $k2 => $v2) { ?>
 <a href="<?php echo $strUrl;?>&pd=<?php echo $arrIndusP[$key]['indus_id'];?>&i=<?php echo $v2['indus_id']?>" tabindex="-1" <?php if($v2['is_recommend']==1) { ?>class="hot"<?php } ?>><?php echo $v2['indus_name']?></a>
 <?php } } ?>
          </div>
        </li>
<?php } } ?>
      </ul>
  </div>
  <!-- category-list end -->

  <div class="tab tab-darken">
    <a href="index.php?do=tasklist" class="selected">所有任务</a>
  </div>
  <!-- tab end -->

<?php if($pd||$i||$ky) { ?>

  <ul class="nav nav-pills second-nav">
    <?php if($pd) { ?><li class="active"><a href="<?php echo $strUrl;?>&pd=0"><?php echo $arrIndusPInfo['indus_name'];?> <i class="fa fa-times"></i></a></li><?php } ?>
    <?php if($i) { ?><li class="active"><a href="<?php echo $strUrl;?>&i=0"><?php echo $arrIndusInfo['indus_name'];?> <i class="fa fa-times"></i></a></li><?php } ?>
    <?php if($ky) { ?><li class="active"><a href="<?php echo $strUrl;?>&ky=0"><?php echo $ky;?> <i class="fa fa-times"></i></a></li><?php } ?>
    <li>共<?php echo intval($intCount); ?>条类似任务</li>
  </ul>


  <?php } ?>

  <!-- second-nav end -->

  <ul class="list-filter">
    <li>
      <label class="col-xs-1">任务模式</label>
      <div class="col-xs-11 condition">
        <a href="<?php echo $strUrl;?>&m=0" <?php if(!$m) { ?> class="selected" <?php } ?>>全部</a>
        <?php if(is_array($arrTaskNavs)) { foreach($arrTaskNavs as $k => $v) { ?>
        	<a href="<?php echo $strUrl;?>&m=<?php echo $v['model_id'];?>" <?php if($v['model_id'] == $m) { ?> class="selected" <?php } ?>><?php echo $v['model_name']?></a>
        <?php } } ?>

      </div>
    </li>
    <li>
      <label class="col-xs-1">赏金状态</label>
      <div class="col-xs-11 condition">
        <a href="<?php echo $strUrl;?>&r=0" <?php if(!$r) { ?> class="selected" <?php } ?>>全部</a>
        <a href="<?php echo $strUrl;?>&r=1" <?php if(1==$r) { ?> class="selected" <?php } ?>>未托管</a>
        <a href="<?php echo $strUrl;?>&r=2" <?php if(2==$r) { ?> class="selected" <?php } ?>>已托管</a>
      </div>
    </li>
    <li>
      <label class="col-xs-1">任务状态</label>
      <div class="col-xs-11 condition">
        <a href="<?php echo $strUrl;?>&s=0" <?php if(!$s) { ?> class="selected" <?php } ?>>全部</a>
        <a href="<?php echo $strUrl;?>&s=1" <?php if(1==$s) { ?> class="selected" <?php } ?>>工作中</a>
        <a href="<?php echo $strUrl;?>&s=2" <?php if(2==$s) { ?> class="selected" <?php } ?>>选稿中</a>
<a href="<?php echo $strUrl;?>&s=3" <?php if(3==$s) { ?> class="selected" <?php } ?>>交付中</a>
        <a href="<?php echo $strUrl;?>&s=4" <?php if(4==$s) { ?> class="selected" <?php } ?>>已结束</a>
      </div>
    </li>
  </ul>
  <!-- filter end -->


  <div class="tool-bar">
    <div class="actions">
    <?php if($o == 1) { ?>
    	<a href="<?php echo $strUrl;?>&o=2" class="tool-bar-item selected">剩余时间  <i class="fa fa-sort-amount-desc"></i></a>
    <?php } elseif($o == 2) { ?>
    	<a href="<?php echo $strUrl;?>&o=1" class="tool-bar-item selected">剩余时间 <i class="fa fa-sort-amount-asc"></i></a>
    <?php } else { ?>
    	<a href="<?php echo $strUrl;?>&o=1" class="tool-bar-item ">剩余时间</a>
    <?php } ?>

    <?php if($o == 3) { ?>
    	<a href="<?php echo $strUrl;?>&o=4" class="tool-bar-item selected">金额  <i class="fa fa-sort-numeric-desc"></i></a>
    <?php } elseif($o == 4) { ?>
    	<a href="<?php echo $strUrl;?>&o=3" class="tool-bar-item selected">金额 <i class="fa fa-sort-numeric-asc"></i></a>
    <?php } else { ?>
    	<a href="<?php echo $strUrl;?>&o=3" class="tool-bar-item ">金额</a>
    <?php } ?>
    <?php if($o == 5) { ?>
    	<a href="<?php echo $strUrl;?>&o=6" class="tool-bar-item selected">稿件数  <i class="fa fa-sort-numeric-desc"></i></a>
    <?php } elseif($o == 6) { ?>
    	<a href="<?php echo $strUrl;?>&o=5" class="tool-bar-item selected">稿件数 <i class="fa fa-sort-numeric-asc"></i></a>
    <?php } else { ?>
    	<a href="<?php echo $strUrl;?>&o=5" class="tool-bar-item ">稿件数</a>
    <?php } ?>
    </div>
 <?php if($regionCfg['region_search_task'] =='1') { ?>
<div class="actions">
      <a href="javascript:void(0);" class="tool-bar-item" data-toggle="dropdown" ><?php if($arrCityInfo['name']) { ?> <?php echo $arrCityInfo['name'];?> <?php } else { ?>所在地区<?php } ?> <span class="caret"></span></a>
      <ul class="dropdown-menu for-city" role="menu" aria-labelledby="dLabel"  >
        <li <?php if(!$p) { ?>class="active"<?php } ?>><a href="<?php echo $strUrl;?>&p=0">所有地区</a></li>
<?php if(is_array($arrDisplaypro)) { foreach($arrDisplaypro as $k => $v) { ?>
       		 <li <?php if($p==$v['id']) { ?>class="active"<?php } ?>><a href="<?php echo $strUrl;?>&p=<?php echo $v['id'];?>&twoid=0"  role="menuitem" tabindex="-1"  ><?php echo $v['name']?></a></li>
<?php } } ?>
      </ul>
    </div>
<?php if($two) { ?>
<div class="actions">
      <a href="javascript:void(0);" class="tool-bar-item" data-toggle="dropdown" ><?php if($arrCitytwo['name']) { ?> <?php echo $arrCitytwo['name'];?> <?php } else { ?>所在地区<?php } ?> <span class="caret"></span></a>
      <ul class="dropdown-menu for-city" role="menu" aria-labelledby="dLabel" >
<?php if(is_array($two)) { foreach($two as $k => $v) { ?>
        <li <?php if($twoid==$v['id']) { ?>class="active"<?php } ?>><a href="<?php echo $strUrl;?>&twoid=<?php echo $v['id']?>" role="menuitem" tabindex="-1" ><?php echo $v['name']?></a></li>
<?php } } ?>
      </ul>
    </div>
<?php } ?>
<?php if($three) { ?>
<div class="actions">
      <a href="javascript:void(0);" class="tool-bar-item" data-toggle="dropdown" ><?php if($arrCitythree['name']) { ?> <?php echo $arrCitythree['name'];?> <?php } else { ?>所在地区<?php } ?> <span class="caret"></span></a>
      <ul class="dropdown-menu for-city" role="menu" aria-labelledby="dLabel" >
<?php if(is_array($three)) { foreach($three as $k => $v) { ?>
        <li <?php if($threeid==$v['id']) { ?>class="active"<?php } ?>><a href="<?php echo $strUrl;?>&threeid=<?php echo $v['id']?>" role="menuitem" tabindex="-1" ><?php echo $v['name']?></a></li>
<?php } } ?>
      </ul>
    </div>
<?php } ?>
<?php } ?>
  </div>
  <!-- tool-bar end -->

  <div class="list list-dl">
    <dl class="list-body"  id="ajax_dom">
      <dt class="list-label">
        <ul>
          <li class="w3">名称</li>
          <?php if($regionCfg['region_search_switch']== '1' && $regionCfg['region_search_task']=='1') { ?>
          <li class="w2">地区</li>
          <?php } ?>
          <li class="w1">赏金</li>
          <li class="w1">模式</li>
          <li class="w1">查看/投稿</li>
          <li class="w1d5">状态</li>
          <li class="wd5"></li>
        </ul>
      </dt>
      <?php if($arrTaskLists) { ?>
      <?php if(is_array($arrTaskLists)) { foreach($arrTaskLists as $k => $v) { ?>
      <dd class="list-item">
        <ul class="list-item-body">

          <li class="w3">
            <a href="index.php?do=task&id=<?php echo $v['task_id'];?>" class="list-title"  title="<?php echo kekezu::cutstr($v['task_title'],50) ?>">
            <!-- 增值工具显示区域 start --> <!-- <span class="marked marked-speed">加急</span> -->
<?php if($v['task_status']==2) { ?>
               <?php if($v['is_delay'] == '1') { ?><span class="marked marked-map">延期</span><?php } ?>
               <?php if($v['urgent'] == '1') { ?><span class="marked marked-speed">加急</span><?php } ?>
               <?php if($v['tasktop'] == '1') { ?><span class="marked marked-spread">置顶</span><?php } ?>
<?php } ?>
            <!-- 增值工具显示区域 start -->

              <?php echo kekezu::cutstr($v['task_title'],50) ?>
            </a>
          </li>
          <!-- 地区 START -->  
          <?php if($regionCfg['region_search_switch']== '1' && $regionCfg['region_search_task']=='1') { ?>
  <li class="w2">
            <?php echo $v['province_name'];?><?php echo $v['city_name'];?><?php echo $v['area_name'];?>
          </li>
          <?php } ?>
<!-- 地区 END -->  
<!-- 赏金 START  -->
          <li class="w1">
            <span class="money">
            	<?php echo  keke_glob_class::showTaskCash($v['task_id']); ?>
              </span>
          </li>
<!-- 赏金 END  -->
          <li class="w1"><?php echo $arrTaskNavs[$v['model_id']]['model_name'];?></li>
          <li class="w1"><?php echo intval($v['view_num']); ?>/<?php echo intval($v['work_num']); ?></li>
          <li class="w1d5">
          <!-- 2天后投稿截止 -->&nbsp;
          <?php $end_time = $arrTaskTimeDesc[$v[task_status]]['time']; ?>
          	<?php echo keke_search_class::task_time_desc($v['task_status'],$v[$end_time]) ?>

          </li>

        <!-- 收藏  START-->
        <li class="wd5" >
<?php if($v['favorite']) { ?>

          	<a href="javascript:cancelFavorite('task',<?php echo $v['task_id'];?>);" id="favorite<?php echo $v['task_id'];?>" title="取消收藏" class="action-collect on"><i class="fa fa-star"></i></a>
  <?php } else { ?>

          	<a href="javascript:addFavorite('task',<?php echo $v['task_id'];?>);" id="favorite<?php echo $v['task_id'];?>" title="收藏" class="action-collect"><i class="fa fa-star"></i></a>

 <?php } ?>
  </li>
        <!-- 收藏 END -->

        </ul>
        <ul class="list-item-body list-visible">
          <li class="w8">
            <div class="list-desc">
            	<?php echo kekezu::chinesesubstr($v['task_desc'],0,300) ?>
            </div>
          </li>
          <li class="w2">
            <a href="index.php?do=pubtask&id=<?php echo $v['model_id'];?>"  class="btn btn-primary btn-sm">发布一个类似任务</a>
          </li>
        </ul>
      </dd>
      <?php } } ?>
      <?php } else { ?>
<dd class="list-item text-center">

<?php if($do=='tasklist') { ?>
<div class="no-data">
<p class="lead text-warning"><i class="fa fa-frown-o fa-lg"></i> 暂无任务显示  <a href="index.php?do=pubtask">我来发布</a></p>
</div>
<?php } ?>
<?php if($do=='goodslist') { ?>
<div class="no-data">
<p class="lead text-warning"><i class="fa fa-frown-o fa-lg"></i> 暂无作品显示  <a href="index.php?do=pubgoods">我来发布</a></p>
</div>
<?php } ?>
<?php if($do=='case') { ?>
<div class="no-data">
<p class="lead text-warning"><i class="fa fa-frown-o fa-lg"></i> 暂无成功案例，去<?php if($t =='1') { ?><a href="index.php?do=tasklist">任务大厅</a><?php } else { ?><a href="index.php?do=goodslist">作品</a><?php } ?>看看</p>
</div>
<?php } ?>
<?php if($do=='task') { ?>
<div class="no-data">
<p class="lead text-warning"><i class="fa fa-frown-o fa-lg"></i> 还没有人投稿，赶快来投稿吧！</p>
</div>
<?php } ?>

<?php if($do!='tasklist'&&$do!='goodslist'&&$do!='case'&&$do!='task') { ?>
<div class="no-data">
<p class="lead text-warning"><i class="fa fa-frown-o fa-lg"></i> 暂无相关记录</p>
</div>
<?php } ?>
        </dd>
      <?php } ?>

    </dl>
  </div>
  <!-- list end-->

  <div class="list-page">
    <div class="page-tips pull-left">
      	显示 <?php echo $arrDatas['st'];?>~<?php echo $arrDatas['en'];?> 项 共  <?php echo intval($intCount); ?> 个任务
    </div>

   	<?php if($strPages) { ?>
      <ul class="pagination pagination-sm pull-right">
       <?php echo $strPages;?>
      </ul>
    <?php } ?>


  </div>
  <!-- list-page end -->

  <div class="for-advertise">
   <?php keke_loaddata_class::ad_show('TASKLIST_BOTTOM','tasklist','') ?>
  </div>
  <!-- for-advertise end -->


</div>
</div>
<!-- container end -->

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
</html>
<?php keke_tpl_class::ob_out();?>