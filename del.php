<?php 
include('redis.php');

$uid = $_GET['id'];
$redis->del('user:'.$uid);
$redis->lrem('uids',$uid);

$url = 'userlist.php';
header('Location: '.$url);