<?php keke_tpl_class::checkrefresh('tpl/default/seller/goods', '1452673958' );?><!DOCTYPE HTML>
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
<script src="static/js/model/seller/seller.js" charset="<?php echo CHARSET;?>"></script>
<style>
.confirm_modal{z-index:1041;}
</style>
<!--<div id="space_bg" style="background-image:url(<?php echo $arrSellerInfo['shop_background'];?>);background-repeat:<?php echo $arrBackgroudStyle['repeat'];?>; background-position:<?php echo $arrBackgroudStyle['position'];?>;background-attachment:fixed}" class="container">-->
<div id="space_bg" class="container">

<?php if($uid != $arrSellerInfo['uid']) { ?>
<div class="dropzone fixed-top">
<a href="javascript:sendMessage(<?php echo $arrSellerInfo['uid'];?>);void(0);" class="dropzone-item"><i class="fa fa-paper-plane"></i> 联系我</a>
</div>
<?php } ?>
<!-- /.dropzone -->
    	<div class="space_body">
    <!--导航图片 -->
    <!--<div id="shop_banner" class="banner">
    	<?php if($gUid == $arrSellerInfo['uid']) { ?>
      	<a id="change_banner"  href="javascript:changeBanner('<?php echo $id;?>');void(0);" >点击更改图片</a>
<?php } ?>
<img onerror="this.src='tpl/default/img/store_banner.jpg'" style="width: 100%;height: auto;" src="<?php if($arrSellerInfo['banner']) { ?><?php echo $arrSellerInfo['banner'];?><?php } else { ?>tpl/default/img/store_banner.jpg<?php } ?>">
</div>-->
<!--导航图片 end-->

        <div class="store_detail ">


          <div class="store_adv" style="padding-left:10px;">
          	<div class="left_detail col-md-4 col-xs-12 " >
          			<div class="left_img col-md-6 col-xs-6 ">
        	<?php echo  keke_user_class::get_user_pic($arrSellerInfo['uid'],'larger') ?>
            </div>
                    <div class="col-md-6 col-xs-6">
                    	<h1 class="store_name"><?php if($arrSellerInfo['shop_name']) { ?><?php echo $arrSellerInfo['shop_name'];?><?php } else { ?><?php echo $arrSellerInfo['username'];?><?php } ?></h1>
                        <p><?php if($strAddress) { ?><?php echo $strAddress;?><?php } else { ?>暂无<?php } ?>　　<?php if($strAddress) { ?><a href="javascript:showMap('<?php echo $arrSellerInfo['uid'];?>');"></a><?php } ?>
</p>    
                        <p>作品：<?php echo $intGoodsCount;?> &nbsp; 人气：<?php echo $arrSellerInfo['views'];?></p>  
                    </div>
        

<!-- <?php if($arrMemberExts['mobile']['v1']==2) { ?>
<p>联系：<?php echo $arrSellerInfo['mobile']?></p>
<?php } ?> -->

        <div class="store_ctrl" >

        	 <?php if($gUid !=$arrSellerInfo['uid']) { ?>

        	 <div class="row mb_5">
        	 	<div class="col-sm-4">
        	 		<a href="javascript:sendMessage(<?php echo $arrSellerInfo['uid'];?>);void(0);" class="btn btn-default btn-xs btn-block" >联系我</a>
        	 	</div>
        	 	<div class="col-sm-8">
        	 		<?php if($arrSellerInfo['follow']==1) { ?>
         <span class="btn-group">
   <a href="javascript:void(0);" class="btn btn-success btn-xs disabled" role="button"><i class="fa fa-check"></i> 已关注</a>
  				  <a href="javascript:cancelFollow(<?php echo $arrSellerInfo['uid'];?>);void(0);"  class="btn btn-success btn-xs" id="follow<?php echo $arrSellerInfo['uid'];?>">取消</a>
          </span>
  <?php } else { ?>
              <a href="javascript:addFollow(<?php echo $arrSellerInfo['uid'];?>);void(0);" class="btn btn-default btn-xs btn-block" id="follow<?php echo $arrSellerInfo['uid'];?>"><i class="fa fa-plus"></i> 加关注</a>
  <?php } ?>

        	 	</div>
        	 </div>			        	

                


 <?php } ?>
<!-- <?php if($gUid == $arrSellerInfo['uid']) { ?>
 <?php if($arrSellerInfo['autoshop']==1) { ?>
 	<a href="javascript:closeshop(<?php echo $arrSellerInfo['uid']?>);" class="btn btn-success btn-xs" style="margin-right:8px;width: 76px; float: left;" >关店</a>
 <?php } else { ?>
 	<a href="javascript:openshop(<?php echo $arrSellerInfo['uid']?>);" class="btn btn-success btn-xs" >开店</a>
 <?php } ?>
 <?php } ?>
 <?php if($gUid == 1 && $gUid == $arrSellerInfo['uid']) { ?>
 	<?php if($arrSellerInfo['is_show'] == 1) { ?>
<a href="javascript:changeHide(<?php echo $arrSellerInfo['uid']?>);" class="btn btn-success btn-xs" style=" width: 76px;float: left;" >隐藏店铺</a>
<?php } else { ?>
<a href="javascript:changeShow(<?php echo $arrSellerInfo['uid']?>);" class="btn btn-success btn-xs" >显示店铺</a>
<?php } ?>
 <?php } ?>-->

              		</div>
              		<?php if($gUid !=$arrSellerInfo['uid']) { ?>
              		  <!--<a href="index.php?do=gy&id=<?php echo $arrSellerInfo['uid'];?>" class="btn btn-success btn-xs btn-block " >雇佣TA</a>--><?php } ?>

              		<div class="contact-way">
              			<?php if($arrMemberExts['email']['v1']==2) { ?>
              				<?php if($arrSellerInfo['email']) { ?>
              				<p><span>邮 箱：</span><?php echo $arrSellerInfo['email']?></p>
              				<?php } else { ?>
              				<p><span>邮 箱：</span>暂无信息</p>
              				<?php } ?>
              			<?php } ?>
              			<?php if($arrMemberExts['mobile']['v1']==2) { ?>
              				<?php if($arrSellerInfo['mobile']) { ?>
              				<p><span>电话：</span><?php echo $arrSellerInfo['mobile']?></p>
              				<?php } else { ?>
              				<p><span>电话：</span>暂无信息</p>
              				<?php } ?>
              			<?php } ?>
              			<?php if($arrMemberExts['qq']['v1']==2) { ?>
              				<?php if($arrSellerInfo['qq']) { ?>
              				<p><span>Q  Q：</span><?php echo $arrSellerInfo['qq']?></p>
              				<?php } else { ?>
              				<p><span>Q  Q：</span>暂无信息</p>
              				<?php } ?>
              			<?php } ?>
              			<?php if($arrMemberExts['msn']['v1']==2) { ?>
              				<?php if($arrSellerInfo['msn']) { ?>
              				<p><span>微  信：</span><?php echo $arrSellerInfo['msn']?></p>
              				<?php } else { ?>
              				<p><span>微  信：</span>暂无信息</p>
              				<?php } ?>
              			<?php } ?>
              			<?php if($arrMemberExts['phone']['v1']==2) { ?>
              				<?php if($arrSellerInfo['phone']) { ?>
              				<p><span>手 机：</span><?php echo $arrSellerInfo['phone']?></p>
              				<?php } else { ?>
              				<p><span>手 机：</span>暂无信息</p>
              				<?php } ?>
              			<?php } ?>
              		</div>
                    
                    <div class="rigth_detail">
<div class="store_skill">
        	擅长：

<?php if($arrSkill) { ?>
<?php if(is_array($arrSkill)) { foreach($arrSkill as $k => $v) { ?>
<span class="skill-item"><?php echo $v;?></span>
<?php } } ?>
<?php } else { ?>
<span class="skill-item">暂无</span>
<?php } ?>
        </div>
                
              		
          	<div class="store_desc">
          		简介：<?php if($arrSellerInfo['shop_slogans']) { ?>
          		<?php echo $arrSellerInfo['shop_slogans'];?>
<?php } else { ?>
这家伙很懒，啥都没有留下...
<?php } ?>
          	</div><!-- .store_desc end-->



        <div class="person-info">
        	<!--<p>等级： <?php echo $arrSellerLevel['pic'];?></p>
        <p>认证：
  <?php if(is_array($arrAuthItems)) { foreach($arrAuthItems as $v) { ?>
<a href="<?php echo $v['auth_url'];?>"><img class="mar0" src="<?php if($v['auth_pass'] == '1') { ?><?php echo $v['auth_small_ico'];?><?php } else { ?><?php echo $v['auth_small_n_ico'];?><?php } ?>" width="16px" height="16px" alt="" title="<?php echo $v['auth_title'];?>"></a>
  <?php } } ?>
            </p>-->
                    
                    <?php if($gUid == $arrSellerInfo['uid']) { ?>
                    <a href="index.php?do=pubgoods" class="btn btn-success"> 发布作品</a>
                    <?php } ?>
                </div>
<!--<p>最近三月收入：<span class="money"><sub>￥</sub>
<?php if($incomeCash) { ?>
<?php echo $incomeCash;?>
<?php } else { ?>
0.00
<?php } ?>
</span>
</p>-->

<hr>
                <ul class="user-meta" style="display:none">
<?php if(is_array($arrSellerMark)) { foreach($arrSellerMark as $k => $v) { ?>
<li>
<?php echo $v['aid_name'];?>
<span class="text-danger"><?php echo $v['avg'];?>分</span>
<?php echo keke_user_mark_class::gen_star2($v['avg']); ?>
</li>
<?php } } ?>
</ul>
</div>
    </div>
    
<div style="clear: both;"></div>
          </div>

  <div class="store_down" id="main_nav">
<nav class="page_nav">
    <a href="index.php?do=seller&id=<?php echo $id;?>" <?php if($view=='goods'||!$view) { ?>class="selected"<?php } ?>>作品 <?php if($intGoodsCount) { ?><span class="badge"><?php echo $intGoodsCount?></span><?php } ?></a>
<!--<?php if($task_open) { ?><a href="index.php?do=seller&view=task&id=<?php echo $id;?>" <?php if($view=='task') { ?>class="selected"<?php } ?>>任务 <?php if($intTaskCount) { ?><span class="badge"><?php echo $intTaskCount?></span><?php } ?></a>
    <a href="index.php?do=seller&view=case&id=<?php echo $id;?>" <?php if($view=='case') { ?>class="selected"<?php } ?>>案例 <?php if($intCaseCount) { ?><span class="badge"><?php echo $intCaseCount?></span><?php } ?></a><?php } ?>
    
    <a href="index.php?do=seller&view=mark&id=<?php echo $id;?>" <?php if($view=='mark') { ?>class="selected"<?php } ?>>评价详情<?php if($intMarkCount) { ?><span class="badge"><?php echo $intMarkCount?></span><?php } ?></a>-->
</nav><!-- page_nav end -->
<link href="/tpl/default/css/style2.css" rel="stylesheet">
            <div class="store_info_box ">
            	<?php if($arrServiceLists && $arrSellerInfo['autoshop']==1) { ?>   
            	<div class="box-body same-type mb_10">
                <ul class="min-list img row">
                  <?php if(is_array($arrServiceLists)) { foreach($arrServiceLists as $k => $v) { ?>
                    <li class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <a title="<?php echo $v['title']?>" href="index.php?do=goods&id=<?php echo $v['service_id']?>">
                            <div class="min-list-img"><?php $arrPic=explode(',',$v['pic']);$img=strstr($arrPic[0],'http'); ?>                               
                                <img alt="<?php echo $v['title']?>" onerror='$(this).attr("src","tpl/default/img/shop/shop_default_big.jpg")' alt="<?php echo $v['title']?>" <?php if($img) { ?>src="<?php echo $arrPic['0'];?>" width="600" height="200" style=" max-height:200px; overflow:hidden" <?php } else { ?>src="<?php echo keke_shop_class::output_pics($v['file_path'],210,1,1,$v['service_id']) ?>"  width="100%" height="200" style=" max-height:200px; overflow:hidden"<?php } ?>>
                                
                                <!--<span class="money">
                                    <sub>￥</sub>
                                    <?php echo $v['price']?>
                                </span>-->
                            </div>
                            <div class="min-list-title"><?php echo $v['title'];?></div>
                        </a>
                    </li>
                    <?php } } ?>
                </ul>
            </div>
   <?php } else { ?>
   <?php if($arrSellerInfo['autoshop']!=1) { ?>
   		<dd class="list-item text-center">
              <div class="no-data">
<p class="lead text-warning">暂无店铺</p>
</div>
                       </dd>
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
  <?php } ?>
  <!-- list list-img  end-->

  <div class="list-page">
    <div class="page-tips pull-left">
      显示 <?php echo $strPages['st'];?>~<?php echo $strPages['en'];?> 项 共 <?php echo $intGoodsCount;?> 个作品
    </div>
    <ul class="pagination pagination-sm pull-right">
       <?php echo $strPages['page'];?>
    </ul>
  </div>
  <!-- list-page end -->

            </div><!-- store_info_box end -->

</div><!-- store_down end-->
</div><!-- store_detail end -->
</div><!-- space_body end-->
</div><!-- #space_bg end-->
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