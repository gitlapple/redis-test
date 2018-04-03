<?php 
	include('redis.php');
	$uid = $_GET['id'];
	$res = $redis->hgetall('user:'.$uid);
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="doedit.php" method="post">
		<input type="hidden" name="id" value="<?=$uid?>">
		用户名：<input type="text" name="username" value="<?=$res['username']?>"><br/>
		年龄：<input type="text" name="age" value="<?=$res['age']?>"><br/>
		<input type="submit" value="提交">
	</form>
</body>
</html>