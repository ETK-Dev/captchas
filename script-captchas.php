<?php

$chaine='23456789ABCDEFGHJKLMOPQRSTUVWXYZ';
$image =imagecreatefrompng('Images/imagecaptcha.png');
$color =imagecolorallocate($image,200,0,100);
$font ='Fonts/captcha.ttf'; 

function getCode ($length, $chars) {
	$code = null;
	for ( $i=0; $i <$length; $i ++ )
	{
		$code .=$chars { mt_rand ( 0, strlen($chars) -1 ) };
	}
	return $code;
};
$code=getCode(5,$chaine);

$char1=substr($code,0,1);
$char2=substr($code,1,1);
$char3=substr($code,2,1);
$char4=substr($code,3,1);
$char5=substr($code,4,1);

imagettftext($image,38,-10,20,80,$color, $font, $char1);
imagettftext($image,38,20,80,80,$color, $font, $char2);
imagettftext($image,38,-35,100,80,$color, $font, $char3);
imagettftext($image,38,25,160,80,$color, $font, $char4);
imagettftext($image,38,-15,200,80,$color, $font, $char5);

header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);

?>