<?php
	session_start();
	header("Content-type:text/html;charset=utf-8");
	var_dump($_POST);
	if(strtolower($_POST['captcha']) == strtolower($_SESSION['cap_code']))
	{
		include("upload.php");
	}
	else
	{
		echo "<script>alert('验证码错误');</script>";
		echo "<script>window.location.href='../index.php';</script>";	
	}