<?php 
include('redis.php');
if($_POST){
	$username = $_POST['username'];
	$passwd = $_POST['password'];
	$uid = $redis->get('username:'.$username);
	if($uid){
		$res = $redis->hgetall('user:'.$uid);
		if(md5($passwd) == $res['password']){
			$redis->set('auth:'.$username,$uid);
			setcookie('auth',$username,time()+3600*24);
			$url = 'userlist.php';
			header('Location: '.$url);
		}
	}
}
 ?>

 <form action="" method="post">
 	用户名：<input type="text" name="username"><br/>
 	密码：<input type="password" name="password"><br/>
 	<input type="submit" value="登录">
 </form>