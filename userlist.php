<a href="index.php">注册</a>
<?php if(!empty($_COOKIE['auth'])){ ?>
欢迎你， <?=$_COOKIE['auth']; ?> <a href="logout.php">退出</a>
<?php }else{ ?>

<a href="login.php">登录</a>

<?php } ?>
<?php 
include('redis.php');

$size = $redis->get('uid');

//当前页
$page = (!empty($_GET['page']))?$_GET['page']:1;

//用户总数
$tol = $redis->lsize('uids');

//每页数量
$page_size = 3;
//总页数
$total_page = ceil($tol/$page_size);

// lrange 0 2 1   $page_size*($page-1) $page*$page_size-1
// lrange 3 5 2	
// lrange 6 8 3

$res = $redis->lrange('uids',$page_size*($page-1),$page*$page_size-1);

foreach ($res as $v) {
	$data[] = $redis->hgetall('user:'.$v);
}

?>
<table border="1">
	<tr>
		<th>uid</th>
		<th>用户名</th>
		<th>年龄</th>
		<th>操作</th>
	</tr>
<?php foreach ($data as $v) {?>
	<tr>
		<td><?=$v['uid']?></td>
		<td><?=$v['username']?></td>
		<td><?=$v['age']?></td>
		<td>
			<a href="edit.php?id=<?=$v['uid']?>">编辑</a>
			<a href="del.php?id=<?=$v['uid']?>">删除</a>
		</td>
	</tr>
<?php } ?>
	<tr>
		<td colspan="4">
			<a href="?page=<?=(($page-1)<=0)?1:$page-1?>">上一页</a>
			<a href="?page=<?=(($page+1)>=$total_page)?$total_page:$page+1?>">下一页</a>
			<a href="?page=1">首页</a>
			<a href="?page=<?=$total_page?>">尾页</a>
			当前第<?=$page?>页
			共<?=$tol?>用户
		</td>
	</tr>
</table>