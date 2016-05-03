<?php
	header("Content-type:text/html;charset=utf-8");
	$errorinfo = $_FILES['pic']['error'];
	$temp_name = $_FILES['pic']['tmp_name'];
	$type =  $_FILES['pic']['type'];
	$filename = iconv("utf-8","gb2312",$_FILES['pic']['name']); 
	var_dump($_FILES['pic']);
	if($errorinfo == UPLOAD_ERR_OK)
	{
		move_uploaded_file($temp_name, $filename);
		
		$sizearr = getimagesize($filename);

		//缩略图尺寸
		$size = array('height' =>  $_POST['height'], 'weight' => $_POST['width'] );  
		var_dump($size);
	echo "11111";
		//载入图片
		$src = $filename;
		$info = getimagesize($src);
		print_r($info);
		$type = image_type_to_extension($info[2], false);
		$load = "imagecreatefrom{$type}";
		$srcimage = $load($src);
		var_dump($src);
	echo "22222";
		//制作缩略图
		$nail = imagecreatetruecolor($size['weight'], $size['height']);
		imagecopyresampled($nail, $srcimage, 0, 0, 0, 0, $size['weight'], $size['height'], $info[0], $info[1] );
		imagedestroy($srcimage);
	echo "44444";
		//输出缩略图
		ob_clean();
		header("Content-type:".$info['mime']);
		$output = "image{$type}";
		$output($nail);
		imagedestroy($nail);

		var_dump($_FILES['pic']);

	}
	else
	{
		echo "33333";
		switch($errorinfo)
		{
			case 1:
				echo "<script>alert('上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值');</script>";
				break;
			case 2:
				echo "<script>alert('上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。');</script>";
				break;			
			case 3:
				echo "<script>alert('文件只有部分被上传。');</script>";
				break;
			case 4:
				echo "<script>alert('没有文件被上传。');</script>";
				break;	
			case 6:
				echo "<script>alert('找不到临时文件夹');</script>";
				break;
			case 7:
				echo "<script>alert('文件写入失败');</script>";
				break;

		}
		echo "<script>window.location.href='../index.html';</script>";		
	}

?>