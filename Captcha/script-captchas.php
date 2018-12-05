<?php

	$chaine = "23456789ABCDEFGHJKLMNOPQRSTUVWXYZ";

	$image = imagecreatefrompng('Images/captcha.png');

	$color = imagecolorallocate($image, 40, 124, 172);

	$font = "Fonts/madstyle.ttf";

	function getCode($length, $chars){
		$code = null;
		for ($i=0; $i < $length; $i++) { 
			
			$code .= $chars{ mt_rand(0, strlen($chars) - 1)};
		}
		return $code;
	}

	$code = getCode(5, $chaine);

	$char1 = substr($code,0,1);
	$char2 = substr($code,1,1);
	$char3 = substr($code,2,1);
	$char4 = substr($code,3,1);
	$char5 = substr($code,4,1);

	imagettftext($image, 35, -10, 0, 37, $color, $font, $char1);
	imagettftext($image, 35, 20, 37, 37, $color, $font, $char2);
	imagettftext($image, 35, -35, 55, 37, $color, $font, $char3);
	imagettftext($image, 35, 20, 100, 37, $color, $font, $char4);
	imagettftext($image, 35, -40, 120, 37, $color, $font, $char5);

	header('Content-Type: image/png');

	imagepng($image);

	imagedestroy($image);
	

?>