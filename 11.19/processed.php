<?php 
include "pdo.php";
$conn = new Connclass();
$men = new Mencache();
$Men->connect('127.0.0.1',11211);
header('content-type:text/html;charset=utf-8');

if ($_GET['fing']=='query'){
	$keyword=$_GET['keyword'];
	if($men->get($keyword)){
		$data=$men->get($keyword);
	}else{
		$sql="select id,name,sell_price from iwebshop_goods where name like '%$keyword%'";
		$data=$conn->selectAll($sql);
		$men->set($keyword,$data,0,0);
	}

	echo json_encode($data);
}

if($_GET['fing']=='batch'){
	$str=$_GET['str'];
	$str=rtrim($str,',');

	$sql="select id,name,sell_price from iwebshop_goods where id in ($str)";
	$data=$conn->selectAll($sql);


	foreach($data as $key=>$value){
		ob_start();
		include 'model.html';
		$str=ob_get_contents();
		$filename='html/goods_'.$value['id'].'.html';
		file_put_contents($filename,$str);
		ob_end_clean();
	}
	echo 1;
}

if($_GET['flag']=='all'){
	$sql="select id,name,sell_price from iwebshop_goods";
	$data=$conn->selectAll($sql);

	foreach ($data as $key=>$value){
		ob_start();
		include 'model.html';
		$str=ob_get_contents();
		$filename='html/goods_'.$value['id'].'.html';
		file_put_contents($filename,$str);
		ob_end_clean();
	}
	echo 1;
}

if($_GET['flag']=='stastr'){
	$id = $_GET['id'];
	$filename='html/goods_'.$id.'.html';
	if(is_file($filename) && time()-filemtime($filename)<50){
		echo 'jingtai';
		include $filename;
	}else{
		echo 'dongtai';
		$sql="select id,name,sell_price from iwebshop_goods where id='$id'";
		$data = $conn ->selectOne($sql);
		$value['name']=$data['name'];
		$value['sell_price']=$data['sell_price'];

		ob_start();
		include 'model.html';
		$str=ob_get_contents();
		file_get_contents($filename,$str);
		ob_end_clean();
	}
}
?>