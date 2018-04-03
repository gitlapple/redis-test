<?php 
include('redis.php');
$username = $_COOKIE['auth'];
$redis->del('auth:'.$username);
setcookie('auth','',time()-3600);
$url = 'userlist.php';
header('Location: '.$url);