<?php
$act = $_POST["act"];

if($act == '' || $act == 'lookat'){
//保存初始视图
	$vlookat = $_POST['vlookat'];//垂直坐标
	$hlookat = $_POST['hlookat'];//水平坐标
	
	$edit_str = '';
	//组装xml文件
	$xml_str = '<krpano version="1.19" title="Virtual Tour" bgcolor="0x000000" >
		<!--<include url="skin/vtourskin.xml" />	-->
		<layer name="help" alpha="0" keep="true" url="skin/logo_white.png" align="center" visible="false" onclick="tween(alpha,0);delayedcall(0.5,set(visible,false))"/>
		<!--edit_str-->
		<skin_settings maps="false"
					   maps_type="bing"
					   maps_bing_api_key=""
					   maps_zoombuttons="false"
					   gyro="true"
					   littleplanetintro="false"
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
	
		
		<include url="skin/vtourskin_design_glass.xml"       if="design === \'glass\'"       />
		<include url="skin/vtourskin_design_flat.xml"        if="design === \'flat\'"        />
		<include url="skin/vtourskin_design_flat_light.xml"  if="design === \'flat_light\'"  />
		<include url="skin/vtourskin_design_ultra_light.xml" if="design === \'ultra_light\'" />
		<include url="skin/vtourskin_design_117.xml"         if="design === \'117\'"         />
	
		<action name="startup" autorun="onstart">
			if(startscene === null OR !scene[get(startscene)], copy(startscene,scene[0].name); );
			loadscene(get(startscene), null, MERGE);
			if(startactions !== null, startactions() );
		</action>
		
		<scene name="scene_1" title="1" onstart="" thumburl="panos/1.tiles/thumb.jpg" lat="" lng="" heading="">
	
			<view hlookat="'.$hlookat.'" vlookat="'.$vlookat.'" fovtype="MFOV" fov="120" maxpixelzoom="2.0" fovmin="70" fovmax="140" limitview="auto" />
	
			<preview url="panos/1.tiles/preview.jpg" />
	
			<image>
				<cube url="panos/1.tiles/pano_%s.jpg" />
				<mobile>
					<cube url="panos/1.tiles/mobile_%s.jpg" />
				</mobile>
			</image>
	
			<!-- place your scene hotspots here -->
	
		</scene>
	
		<scene name="scene_2" title="2" onstart="" thumburl="panos/2.tiles/thumb.jpg" lat="" lng="" heading="">
	
			<view hlookat="0" vlookat="0" fovtype="MFOV" fov="120" maxpixelzoom="2.0" fovmin="70" fovmax="140" limitview="auto" />
	
			<preview url="panos/2.tiles/preview.jpg" />
	
			<image>
				<cube url="panos/2.tiles/pano_%s.jpg" />
				<mobile>
					<cube url="panos/2.tiles/mobile_%s.jpg" />
				</mobile>
			</image>
	
			<!-- place your scene hotspots here -->
	
		</scene>
	
		<scene name="scene_3" title="3" onstart="" thumburl="panos/3.tiles/thumb.jpg" lat="" lng="" heading="">
	
			<view hlookat="0" vlookat="0" fovtype="MFOV" fov="120" maxpixelzoom="2.0" fovmin="70" fovmax="140" limitview="auto" />
	
			<preview url="panos/3.tiles/preview.jpg" />
	
			<image>
				<cube url="panos/3.tiles/pano_%s.jpg" />
				<mobile>
					<cube url="panos/3.tiles/mobile_%s.jpg" />
				</mobile>
			</image>
	
			<!-- place your scene hotspots here -->
	
		</scene>
	
		<scene name="scene_4" title="4" onstart="" thumburl="panos/4.tiles/thumb.jpg" lat="" lng="" heading="">
	
			<view hlookat="0" vlookat="0" fovtype="MFOV" fov="120" maxpixelzoom="2.0" fovmin="70" fovmax="140" limitview="auto" />
	
			<preview url="panos/4.tiles/preview.jpg" />
	
			<image>
				<cube url="panos/4.tiles/pano_%s.jpg" />
				<mobile>
					<cube url="panos/4.tiles/mobile_%s.jpg" />
				</mobile>
			</image>
		</scene>
	</krpano>
	';
	
	
	
	//写xml文件
	$fp = fopen("tour2.xml","w");
	fwrite($fp,$xml_str);
	fclose($fp);
	
	//写入编辑xml文件
	$edit_str = '	
		<plugin name="snd" url="skin/initial_view.png" keep="true" align="leftttop" x="10" y="10" alpha="0.9" scale="0.5" onover="tween(alpha,1);" onout="tween(alpha,0.9);"
			onloaded="if(ismobile,set(scale,0.5));"
			onclick="location_View()"
			/>
		<plugin name="snd" url="skin/initial_view.png" keep="true" align="leftttop" x="50" y="10" alpha="0.9" scale="0.5" onover="tween(alpha,1);" onout="tween(alpha,0.9);"
			onloaded="if(ismobile,set(scale,0.5));"
			onclick="location_View()"
			/>
		<plugin name="snd" url="skin/initial_view.png" keep="true" align="leftttop" x="100" y="10" alpha="0.9" scale="0.5" onover="tween(alpha,1);" onout="tween(alpha,0.9);"
			onloaded="if(ismobile,set(scale,0.5));"
			onclick="location_View()"
			/>
		
		<!--<hotspot name="spot1" style="skin_hotspotstyle" ath="0.000"  align="righttop"  alpha="1" scale="0.5"  x="10" y="10" onclick="location_View()" />-->
	
		<layer name="skin_control_help" type="container" thumbs_width="250" url="skin/initial_view.png" keep="true" onclick="location_View()" align="lefttop"  alpha="1" scale="0.5"  x="10" y="10" />
	
		<textstyle name="infostyle" origin="center" fontsize="20" showtime="1.0" fadetime="1.0" />
	
		<style name="hotspot_ani_black" origin="center" fontsize="20" showtime="1.0" fadetime="1.0" />
	
		<action name="location_View">		    
			jscall(calc(\'$.post("act.php",{act:"lookat",hlookat:"\'+view.hlookat+\'",vlookat:"\'+view.vlookat+\'"},function (data) {  })\'));
		</action>
	
		<action name="main" >		
			location_View(view.hlookat,view.vlookat);
		</action>';
	$xml_str  = str_replace("<!--edit_str-->",$edit_str,$xml_str );
	$fp = fopen("tour.xml","w");
	fwrite($fp,$xml_str);
	fclose($fp);
	
	echo "初始视图保存成功";
	die();
}elseif($act == "imglist"){
	//添加全景图片,1、搜索出用户上传的全景图
	
	
	
	
}elseif($act == "imgadd"){
	//添加全景图片,2、点击后添加全景图到漫游中
	
	
	
	
}

//按目录生成文件
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



?>