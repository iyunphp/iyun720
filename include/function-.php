<?php
function createXML($intId){
	global $model_list;
	$arrServiceInfo = keke_shop_class::get_service_info ( $intId );
	keke_shop_class::plus_view_num($intId, $arrServiceInfo['uid']);
	$arrModelInfo = $model_list [$arrServiceInfo ['model_id']];
	$arrServiceInfo or kekezu::show_msg(kekezu::lang("operate_notice"),"index.php?do=goodslist",2,"对不起，您访问的页面没找到！","warning");
	if($arrModelInfo['open_custom'] =='1'){
		$c_open = 1;
		$arrShowCustoms = CustomClass::getExtData($arrServiceInfo['service_id'],$arrModelInfo['model_id']);
		foreach ($arrShowCustoms as $k=>$v){
			if($v['extdata']){
				$arrShowCustoms[$k]['data'] =unserialize($v['extdata']);
			}
		}
	}
		
	//获取预览文件路径
	$view = array();
	if(count($arrShowCustoms) > 1){
		foreach($arrShowCustoms as $v){
			foreach($v['data'] as $kk => $vv){
				$view[$kk] = $vv['content'];
			}
		}	
	}
	
	
	//生成全景图片  shell_exec $arrServiceInfo["file_path"]
	//$r = shell_exec('sh /home/wwwroot/krpano/qiqi.sh http://7xohbo.com2.z0.glb.qiniucdn.com/399A6766.jpg 1 /home/wwwroot/www.iyun720.com/720test/');	
	//sh /home/wwwroot/krpano/qiqi.sh http://7xohbo.com2.z0.glb.qiniucdn.com/399A6766.jpg 1 /home/wwwroot/www.iyun720.com/720test/
	
	
	//echo $arrServiceInfo['file_path']."<br>";
	//print_r($r);
	//die();
	//xml参数配置
	$all_music_str = '' ;//背景音乐-适合全景图片(VR)、全景漫游(VR)
	$pic_model_str = '';//全景视图(小行星、普通)- 适合全景图片(VR)、全景漫游(VR)
	$pic_rotation_str = '';//自动旋转-适合全景图片(VR)、全景漫游(VR)
	
	//xml文件
	$xml_str = '';
	
	//插入背景音乐
	if(trim($view['view_music'])!=''){
		$all_music_str = '
		
		<plugin name="soundinterface" url="http://view.iyun720.com/public/plugins/soundinterface.swf" alturl="http://view.iyun720.com/public/plugins/soundinterface.js" preload="true" keep="true" rootpath="" />
	
		<action name="bgsnd_action" autorun="onstart">playsound(bgsnd, "'.trim($view['view_music']).'", 0);</action>
				
		<plugin name="snd" url="http://view.iyun720.com/public/skin/spritesheet.png" keep="true" align="righttop" x="10" y="10" alpha="0.9" scale="0.5" onover="tween(alpha,1);" onout="tween(alpha,0.9);"
				crop="220|190|80|80"
				onloaded="if(ismobile,set(scale,0.5));"
				onclick="pausesoundtoggle(bgsnd); switch(crop, 220|190|80|80, 220|275|80|80);"
				/>
				
				';	
	}
	
	//开启小行星视图(适合全景图片和漫游)
	if(trim($view['view_model'])=='小行星'){
		$pic_model_str = '
		
		<view stereographic="true" fisheye="1.0" fov="155" fovtype="VFOV" fovmax="150" hlookat="-60" vlookat="77" />
			  
		<display flash10="off" details="24" />
		
		<events onloadcomplete="delayedcall(2.0, normalview());" />
	
	
		<action name="normalview">
			tween(view.hlookat, -40, 2.5, easeInOutQuad);
			tween(view.vlookat, -35, 2.5, easeInOutQuad);
			tween(view.fov,     85,  2.5, easeInOutQuad);
			tween(view.fisheye, 0.0, 2.5, easeInOutQuad);
			wait(2.7);
			set(display.flash10, on);
			showtext("[b][i]krpano[br]little planet intro example[/i][/b]")
		</action>
		
		';	
	}
	
	//开启自动旋转功能(适合全景图片和漫游)
	if(trim($view['view_rotation'])=='开启'){
		$pic_rotation_str = '
		
		<autorotate enabled="true" waittime="1.0" speed="-3.0" horizon="0.0" tofov="120.0" />
		
		';	
	}
	
	
	
	
	if($view['view_type']  == '全景图片')	{
		//全景图片xml
		$xml_str = '<krpano version="1.16">
			
			<include url="http://view.iyun720.com/public/skin/defaultskin.xml?date='.microtime().'" />
			
		'.$all_music_str.'
		
		<view stereographic="true"
				  fisheye="1.0"
				  fov="155"
				  fovtype="VFOV"
				  fovmax="150"
				  hlookat="-60"
				  vlookat="77"
				  />
				  
			<display flash10="off" details="24" />
			
			<events onloadcomplete="delayedcall(2.0, normalview());" />
		
		
			<action name="normalview">
				tween(view.hlookat, -40, 2.5, easeInOutQuad);
				tween(view.vlookat, -35, 2.5, easeInOutQuad);
				tween(view.fov,     85,  2.5, easeInOutQuad);
				tween(view.fisheye, 0.0, 2.5, easeInOutQuad);
				wait(2.7);
				set(display.flash10, on);
				showtext("[b][i]krpano[br]little planet intro example[/i][/b]")
			</action>	
			
		'.$pic_rotation_str.'
		
			<preview url="iyun720/preview.jpg" />
		
			<image>
				<cube url="iyun720/pano_%s.jpg" />
				<mobile>
					<cube url="iyun720/mobile_%s.jpg" />
				</mobile>
			</image>
		
		</krpano>';
	}elseif($view['view_type'] == '全景图片VR'){
		//全景图片VR xml
		$littleplanetintro = '';
		if(trim($view['view_model'])=='小行星'){
			$littleplanetintro = 'true';
		}else{
			$littleplanetintro = 'false';
		}
		$xml_str = '<krpano version="1.19" title="Virtual Tour">
		
			<include url="http://view.iyun720.com/public/skin/vtourskin.xml?date='.microtime().'" />
		'.$all_music_str.$pic_rotation_str.'
		
			<skin_settings maps="false"
						   maps_type="bing"
						   maps_bing_api_key=""
						   maps_zoombuttons="false"
						   gyro="true"				   
						   littleplanetintro="'.$littleplanetintro.'"
						   title="true"
						   thumbs="true"
						   thumbs_width="120" thumbs_height="80" thumbs_padding="10" thumbs_crop="0|40|240|160"
						   thumbs_opened="false"
						   thumbs_text="false"
						   thumbs_dragging="true"
						   thumbs_onhoverscrolling="false"
						   thumbs_scrollbuttons="false"
						   thumbs_scrollindicator="false"
						   thumbs_loop="false"
						   tooltips_buttons="false"
						   tooltips_thumbs="false"
						   tooltips_hotspots="false"
						   tooltips_mapspots="false"
						   deeplinking="false"
						   loadscene_flags="MERGE"
						   loadscene_blend="OPENBLEND(0.5, 0.0, 0.75, 0.05, linear)"
						   loadscene_blend_prev="SLIDEBLEND(0.5, 180, 0.75, linear)"
						   loadscene_blend_next="SLIDEBLEND(0.5,   0, 0.75, linear)"
						   loadingtext="loading..."
						   layout_width="100%"
						   layout_maxwidth.normal="900"
						   layout_maxwidth.mobile=""
						   controlbar_width.normal="-44"
						   controlbar_width.mobile="100%"
						   controlbar_height.normal="38"
						   controlbar_height.mobile="34"
						   controlbar_offset.normal="22"
						   controlbar_offset.mobile="0"
						   controlbar_offset_closed="-40"
						   controlbar_overlap.normal="7"
						   controlbar_overlap.mobile="2"
						   design_skin_images="vtourskin.png"
						   design_bgcolor="0x000000"
						   design_bgalpha="0.5"
						   design_bgborder="0 0xFFFFFF 1.0"
						   design_bgroundedge.normal="9"
						   design_bgroundedge.mobile="1"
						   design_bgshadow="0 0 9 0xFFFFFF 0.5"
						   design_thumbborder_bgborder="4 0xFFFFFF 1.0"
						   design_thumbborder_padding="2"
						   design_thumbborder_bgroundedge="5"
						   design_text_css="color:#FFFFFF; font-family:Arial; font-weight:bold;"
						   design_text_shadow="1"
						   />
		
			
			<include url="http://view.iyun720.com/public/skin/vtourskin_design_glass.xml"       if="design === \'glass\'"       />
			<include url="http://view.iyun720.com/public/skin/vtourskin_design_flat.xml"        if="design === \'flat\'"        />
			<include url="http://view.iyun720.com/public/skin/vtourskin_design_flat_light.xml"  if="design === \'flat_light\'"  />
			<include url="http://view.iyun720.com/public/skin/vtourskin_design_ultra_light.xml" if="design === \'ultra_light\'" />
			<include url="http://view.iyun720.com/public/skin/vtourskin_design_117.xml"         if="design === \'117\'"         />
		
		
			<action name="startup" autorun="onstart">
				if(startscene === null OR !scene[get(startscene)], copy(startscene,scene[0].name); );
				loadscene(get(startscene), null, MERGE);
				if(startactions !== null, startactions() );
			</action>
		
			
			<scene name="iyun720" title="'.$arrServiceInfo['title'].'" onstart="" thumburl="panos/iyun720/thumb.jpg" lat="" lng="" heading="">
		
				<view hlookat="0" vlookat="0" fovtype="MFOV" fov="120" maxpixelzoom="2.0" fovmin="70" fovmax="140" limitview="auto" />
		
				<preview url="panos/iyun720/preview.jpg" />
		
				<image>
					<cube url="panos/iyun720/pano_%s.jpg" />
					<mobile>
						<cube url="panos/iyun720/mobile_%s.jpg" />
					</mobile>
				</image>
		
				<!-- place your scene hotspots here -->
		
			</scene>
		
		
		</krpano>
		';
	}elseif($view['view_type'] == '全景视频'){
		//全景视频		
		$suffix = strtolower(substr(strrchr($arrServiceInfo['file_path'], '.'), 1));
		$video_suffix = array('mp4','mov');
		if(in_array($suffix,$video_suffix)){
			$videourl = $arrServiceInfo['file_path'];
		}
		$xml_str = '<krpano version="1.18" bgcolor="0x000000">
		
			<!-- the videoplayer interface skin -->
			<include url="http://view.iyun720.com/public/skin/videointerface.xml?date='.microtime().'" />
		
			<!-- include the videoplayer plugin and load the video (use a low res video for iOS) -->
			<plugin name="video"
					url.flash="%SWFPATH%/plugins/videoplayer.swf"
					url.html5="%SWFPATH%/plugins/videoplayer.js"
		
					posterurl.ios="video-1920x960-poster.jpg"
					videourl.ios="'.$videourl.'|'.$videourl.'"
		
					posterurl.no-ios="video-1920x960-poster.jpg"
					videourl.no-ios="'.$videourl.'|'.$videourl.'"
		
					pausedonstart="true"
					loop="true"
					enabled="ture"
					zorder="0"
					align="center" ox="0" oy="0"
		
					width.no-panovideosupport="100%"
					height.no-panovideosupport="prop"
		
					onloaded="videointerface_setup_interface(get(name)); setup_video_controls();"
					onvideoready="videointerface_videoready();"
					/>
		
		
			<action name="setup_video_controls">
				<!-- add  items to the control menu of the videointerface skin -->
				videointerface_addmenuitem(configmenu, vqtitle, "Select Video Quality", true, videointerface_toggle_configmenu() );
				videointerface_addmenuitem(configmenu, q1, "1024x512",  false, change_video_file(q1, "'.$videourl.'|'.$videourl.'"); );
				videointerface_addmenuitem(configmenu, q2, "1920x960",  false, change_video_file(q2, "'.$videourl.'|'.$videourl.'"); );
		
				if(device.ios,
					videointerface_selectmenuitem(configmenu, q1);
				  ,
					videointerface_selectmenuitem(configmenu, q2);
				  );
			</action>
		
		
			<action name="change_video_file">
				plugin[video].playvideo("%CURRENTXML%/%2", null, get(plugin[video].ispaused), get(plugin[video].time));
				videointerface_deselectmenuitem(configmenu, q1);
				videointerface_deselectmenuitem(configmenu, q2);
				videointerface_selectmenuitem(configmenu, %1);
			</action>
		
		
			<image devices="panovideosupport">
				<sphere url="plugin:video" />
			</image>
		
		
			<view hlookat="0" vlookat="0" fovtype="DFOV" fov="130" fovmin="75" fovmax="150" fisheye="0.35" />
		
		</krpano>
		';
	}	
	
	//漫游 - 直接调取远程文件
	//生成xml文件
	switch($view['view_type']){
		case '全景图片':
			createdirlist(S_ROOT."view.iyun720.com/pic/".$arrServiceInfo['service_id']."/",'0777');
			@unlink(S_ROOT."view.iyun720.com/pic/".$arrServiceInfo['service_id']."/pic.xml");	
			$xmlfile = fopen(S_ROOT."view.iyun720.com/pic/".$arrServiceInfo['service_id']."/pic.xml", "w") or die("Unable to open file!");
		break;	
		case '全景图片VR':
			createdirlist(S_ROOT."view.iyun720.com/pic/".$arrServiceInfo['service_id']."/",'0777');
			@unlink(S_ROOT."view.iyun720.com/pic/".$arrServiceInfo['service_id']."/tour.xml");			
			$xmlfile = fopen(S_ROOT."view.iyun720.com/pic/".$arrServiceInfo['service_id']."/tour.xml", "w") or die("Unable to open file!");				
		break;	
		case '全景视频':
			createdirlist(S_ROOT."view.iyun720.com/video/".$arrServiceInfo['service_id']."/",'0777');
			@unlink(S_ROOT."view.iyun720.com/video/".$arrServiceInfo['service_id']."/video.xml");			
			$xmlfile = fopen(S_ROOT."view.iyun720.com/video/".$arrServiceInfo['service_id']."/video.xml", "w") or die("Unable to open file!");		
		break;
	}
	fwrite($xmlfile, $xml_str);
	fclose($xmlfile);
}

/**
　　* 按指定路径生成目录
　　* @param string $path 路径
　　*/
function createdirlist($path,$mode='0777'){
	$adir = explode('/',$path);
	$dirlist = '';
	$rootdir = array_shift($adir);
	if(($rootdir!='.'||$rootdir!='')&&!file_exists($rootdir)){
		@mkdir($rootdir);
	}
	foreach($adir as $key=>$val){
		$dirlist .= "/".$val;
		$dirpath = $rootdir.$dirlist;
		if(!file_exists($dirpath)){
			@mkdir($dirpath);
			@chmod($dirpath,0777);
		}
	}
}

//生成文件夹
/*function createdirlist($path,$mode){
	if (is_dir($path)){
		//判断目录存在否，存在不创建
		//echo "目录'" . $path . "'已经存在";
		//已经存在则输入路径
	}else{ //不存在则创建目录
		$re=mkdir($path,$mode,true);
		//第三个参数为true即可以创建多极目录
		if ($re){
			//echo "目录创建成功";//目录创建成功
		}else{
			//echo "目录创建失败";
		}
	}
}*/

?>