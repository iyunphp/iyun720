<?php 


$img = "../upload.iyun720.com/pic/".getImage($_GET['img']);


image_png_size_add($img ,'123.jpg');

/** 
* desription 压缩图片 
* @param sting $imgsrc 图片路径 
* @param string $imgdst 压缩后保存路径 
*/
function image_png_size_add($imgsrc,$imgdst){ 
  list($width,$height,$type)=getimagesize($imgsrc); 
 
  $new_width = $width>6000?6000:$width; 
  $new_height =$height>3000?3000:$height; 
 //Array ( [0] => 8000 [1] => 4000 [2] => 2 [3] => width="8000" height="4000" [bits] => 8 [channels] => 3 [mime] => image/jpeg )
  switch($type){ 
    case 1: 
      $giftype=check_gifcartoon($imgsrc); 
      if($giftype){ 
        header('Content-Type:image/gif'); 
        $image_wp=imagecreatetruecolor($new_width, $new_height); 
        $image = imagecreatefromgif($imgsrc); 
        imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height); 
        imagejpeg($image_wp, $imgdst,75); 
        imagedestroy($image_wp); 
      } 
      break; 
    case 2: 
	//die($new_width."x".$new_height);
      header('Content-Type:image/jpeg'); 
      $image_wp=imagecreatetruecolor($new_width, $new_height);       
	  die($imgsrc);
	  $image = imagecreatefromjpeg($imgsrc); 
	
      imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height); 
      imagejpeg($image_wp, $imgdst,75); 
      imagedestroy($image_wp); 
      break; 
    case 3: 
      header('Content-Type:image/png'); 
      $image_wp=imagecreatetruecolor($new_width, $new_height); 
      $image = imagecreatefrompng($imgsrc); 
      imagecopyresampled($image_wp, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height); 
      imagejpeg($image_wp, $imgdst,75); 
      imagedestroy($image_wp); 
      break; 
  } 
} 


/** 
* desription 判断是否gif动画 
* @param sting $image_file图片路径 
* @return boolean t 是 f 否 
*/
function check_gifcartoon($image_file){ 
  $fp = fopen($image_file,'rb'); 
  $image_head = fread($fp,1024); 
  fclose($fp); 
  return preg_match("/".chr(0x21).chr(0xff).chr(0x0b).'NETSCAPE2.0'."/",$image_head)?false:true; 
} 


function getImage($url,$filename='',$type=0){
    if($url==''){return false;}
    if($filename==''){
        $ext=strrchr($url,'.');
        if($ext!='.gif' && $ext!='.jpg'){return false;}
        $filename=time().rand(10000,90000).$ext;
    }
    //文件保存路径 
    if($type){
  $ch=curl_init();
  $timeout=5;
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
  $img=curl_exec($ch);
  curl_close($ch);
    }else{
     ob_start(); 
     readfile($url);
     $img=ob_get_contents(); 
     ob_end_clean(); 
    }
    $size=strlen($img);
	
    //文件大小 
    $fp2=fopen("../upload.iyun720.com/pic/".$filename,'a');
    fwrite($fp2,$img);
    fclose($fp2);
    return $filename;
}
?>