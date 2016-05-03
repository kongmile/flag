<!DOCTYPE html>
<html>
<head>	
	<title>缩略图生成</title>
	<meta charset=utf-8>
	<link rel="stylesheet" type="text/css" href="thumb.css">
</head>
<body>
	<div class="header">
		<h1>缩略图生成器</h1>
	</div>
	<form action="identify.php" method="post" enctype="multipart/form-data" id="from">
	<div class="box">
		<input type="file" id="img" name="pic"  accept="image/jpeg,image/gif,image/png" />
	</div>
	<div class="box">
		宽 <input type="text" name="width"  id="widthBox" class="inputbox"/>
		高 <input type="text" name="height" id="heightBox" class="inputbox"/>
		<input type="checkbox" checked="true" id="rate">保留比例
	</div>
	<div class="box">
		<img src="captcha.php">
		<input type="text" name="captcha" id="cap" placeholder="请输入验证码" />	
		<input type="submit" value="确定" class="btn" id="submit"/>	
	</div>	
	</form>
<script type="text/javascript" src="./jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="./imgSize.js"></script>   
</body>
</html>