<?php
if($_K['css_auto_fit']){
    $_K['sitecss'] .= '-responsive'; 
}
if(THEME===TRUE){
	if($do=='user'){
		$css = '<link href="tpl/default/'.$_K['sitecss'].'/user.css" rel="stylesheet" type="text/css" id="active-style-user">';
	}elseif($do=='seller'){
		$css = '<link href="tpl/default/'.$_K['sitecss'].'/store.css" rel="stylesheet" type="text/css" id="active-style-store">';
	}elseif($do=='index'){
		$css = '<link href="static/js/jqplugins/fotorama/fotorama.css" rel="stylesheet" type="text/css">';
		$css.='<link href="tpl/default/'.$_K['sitecss'].'/home.css" rel="stylesheet" type="text/css" id="active-style-home">';
	}else{
		$css='<link href="tpl/default/'.$_K['sitecss'].'/style1.css" rel="stylesheet" type="text/css" id="active-style1">';
		$css .='<link href="tpl/default/'.$_K['sitecss'].'/style2.css" rel="stylesheet" type="text/css" id="active-style2">';
	}echo($css);
}else{
	if($do=='user'){
		$css = '<link href="tpl/default/css/user.css" rel="stylesheet" type="text/css" id="active-style-user">';
	}elseif($do=='seller'){
		$css = '<link href="tpl/default/css/store.css" rel="stylesheet" type="text/css" id="active-style-store">';
	}elseif($do=='index'){
		$css = '<link href="static/js/jqplugins/fotorama/fotorama.css" rel="stylesheet" type="text/css">';
		$css.='<link href="tpl/default/css/home.css" rel="stylesheet" type="text/css" id="active-style-home">';
	}else{
		$css='<link href="tpl/default/css/style1.css" rel="stylesheet" type="text/css" id="active-style1">';
		$css .='<link href="tpl/default/css/style2.css" rel="stylesheet" type="text/css" id="active-style2">';
	}echo($css);
}