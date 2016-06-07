<?php
if(intval($id)){
	$arrZones = CommonClass::getDistrictByPid($id,'id,upid,name');
	if($arrZones){
		foreach ($arrZones as $k=>$v) {
			$html.='<option value='.$v['id'].'>'.$v['name'].'</option>';
		}
	}else{
		$html.='<option value="">没有了</option>';
	}
}else{
	$id = strval($id);
	if($id == 'p'){
		$html.='<option value="c">选择城市</option>';
	}elseif($id == 'c'){
		$html.='<option value="a">选择区域</option>';
	}
}
echo($html);
die();