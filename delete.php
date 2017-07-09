<?php
include 'common.php';
//判断是否登录
if($_SESSION['admin']){
	echo"欢迎".$_SESSION['admin']->admin_name."登录,";
	echo "<a href='getall.php?action=logout'>注销</a>";
	echo "<hr>";
	/*echo "<pre>";
	var_dump($_SESSION['admin']);
	echo "</pre>";*/
}else{
	//未登录跳转到登录界面
	header("location:login.php");
}
//如果地址栏获取到了id的值
if($_GET['id']){
	//where 条件句
	$sql="delete from member where id=".$_GET['id'];
	//echo $sql;
	$result=$pdo->exec($sql);
	if($result){
		//跳转
		header("location:getall.php");
	}else{
		echo "删除失败";
	}
}
?>
