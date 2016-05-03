<?php
	session_start();
    $code_length = 5;//验证码长度
    $image_args = [
		'width'  => 150, //验证码宽
		'height' => 30 //高	
	];

	//背景
	$captcha = imagecreatetruecolor($image_args['width'], $image_args['height']);
	$bgcolor = imagecolorallocate($captcha, 255, 255, 255);
    imagefill($captcha, 0, 0, $bgcolor);

    //验证码参数
    $optcode = "3456789abcdefghijkmnopqrstuvwxyzABCD3456789EFGHJKLMNPQRSTUVWXY3456789"; //可选字符
	
    $rescode = "";

	for ($i=0; $i < $code_length; $i++)
	{ 
		$font = 30;
		$fontColor = imagecolorallocate($captcha, rand(0,150), rand(0,150), rand(0,150));//字符颜色

		$cap_x = $i*$image_args['width']/$code_length+rand(0,15);//字符位置
		$cap_y = rand(5,10);

		$code = substr($optcode, rand(0, strlen($optcode)), 1);//取字符
		$cap_code .= $code;//验证码

		imagestring($captcha, $font, $cap_x, $cap_y, $code, $fontColor);//字符输出到图片
    }

    $_SESSION['cap_code'] = $cap_code;//保存验证码

    for ($i=0; $i < 400; $i++) {
    	$pixelColor = imagecolorallocate($captcha, rand(100,255), rand(100,200), rand(100,200));//杂点颜色 
    	imagesetpixel($captcha, rand(0,$image_args['width']), rand(0,$image_args['height']), $pixelColor);
    }
    ob_clean();
	header("Content-type:image/png;charset=utf-8");
	imagepng($captcha);
	imagedestroy($captcha);