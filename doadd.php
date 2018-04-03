<?php 
include('redis.php');
$username = $_POST['username'];
$password = md5($_POST['password']);
$age = $_POST['age'];

$uid = $redis->incr('uid');
$redis->rpush('uids',$uid);
$redis->set('username:'.$username,$uid);

$data = [
	'uid'=>$uid,
	'username'=>$username,
	'password'=>$password,
	'age'=>$age,
];
$redis->hmset('user:'.$uid,$data);

echo '添加成功';

$url = 'userlist.php';
header('Location: '.$url);