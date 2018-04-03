<?php 
$redis = new Redis();
$redis->connect('127.0.0.1',6379);

$redis->select(1);
// $redis->lpush('num',234);
// $redis->lpush('num',345);
// $redis->lpush('num',34565);
// $redis->lpush('num',77);
// for($i=0; $i>10;$i++){
// 	$redis->lpush('num',$i);
// }
// $size = $redis -> lsize('num');
// $nums = $redis->lrange('num',0,-1);
// echo $size.'获取列表所有值<br/>';
// foreach ($nums as $key => $value) {
// 	echo $value.'<br>';
// }
// $res = $redis->lrem('nums',0,2);
// echo '删除元素<br/>';
// print_r($res);