<?php 

if(class_exists('Redis')){
	$redis = new Redis();
	$r = $redis->connect('127.0.0.1',6379);
	if($r){

		$redis->set('goods','');
		$goods = $redis->get('goods');
		if($goods && strlen($goods) > 5){
			$data = $redis->get('goods');
			$goods = json_decode($data,true);

		}else{
			$db = new PDO("mysql:host=127.0.0.1;dbname=test","root","root");
			$db->query("set names utf8");
			$sql = "select * from goods";
			$goods = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			$redis->set('goods',json_decode($goods));
		}
	}else{
		$db = new PDO("mysql:host=127.0.0.1;dbname=test","root","root");
		$db->query("set names utf8");
		$sql = "select * from goods";
		$sql = "select * from goods";
		$goods = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
	}
}else{
	$db = new PDO("mysql:host=127.0.0.1;dbname=test","root","root");
	$db->query("set names utf8");
	$sql = "select * from goods";
	$sql = "select * from goods";
	$goods = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

if(isset($_GET['type'])&&!empty($_GET['type'])){
	$goods_name = $_GET['goods_name'];
	$score = $_GET['score'];
	$db = new PDO("mysql:host=127.0.0.1;dbname=test","root","root");
	$db->query("set names utf8");
	$msg = $goods_name."换购成功了，消费了" .$score.'积分！';
	$sql = "insert into info (msg,score) value('$msg','$score')";
	$r = $db->exec($sql);
	if($r){
		echo "<script>alert('换购成功')</script>";
	}else{
		echo "<script>alert('换购失败')</script>";
	} 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<conter>
	<a href="export.php"><button>导出</button></a>
	<a href="chart.php"><button>查看销量折线图</button></a>
	<a href="map.php"><button>查看天气地图</button></a>
	<a href="list.php"><button>换购记录</button></a>
		<table border="1">
			<tr>
				<th>ID</th>
				<th>名称</th><th>分类</th><th>品牌</th><th>库存</th>
				<th>价格</th><th>积分</th><th>销量</th><th>操作</th>
			</tr>
			<?php foreach ($goods as $k => $v) { ?>
				<tr>
					<td><?php echo $v['id'] ?></td>
					<td><?php echo $v['name'] ?></td>
					<td><?php echo $v['cate'] ?></td>
					<td><?php echo $v['brand'] ?></td>
					<td><?php echo $v['num'] ?></td>
					<td><?php echo $v['price'] ?></td>
					<td><?php echo $v['score'] ?></td>
					<td><?php echo $v['sale'] ?></td>
					<td><span class="buy" ><a href="index.php?type=buy&goods_name=<?php echo $v['name'] ?>&score=<?php echo $v['score'] ?>"><button>换购</button></a><span></td>
				</tr>
			<?php } ?>
		</table>
		<script type="text/javascript">
		</script>
	</conter>
</body>
</html>