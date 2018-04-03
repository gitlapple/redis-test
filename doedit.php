<?php 
include('redis.php');

$username = $_POST['username'];
$age = $_POST['age'];
$uid = $_POST['id'];

$data = [
	'username'=>$username,
	'age'=>$age,
];
$redis->hmset('user:'.$uid,$data);

$url = 'userlist.php';
header('Location: '.$url);

