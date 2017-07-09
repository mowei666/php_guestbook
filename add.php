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
if($_POST['send']){
	//判断用户名是否重复
	$sql2="select * from member where username='".$_POST['username']."'";
	$result2=$pdo->query($sql2);
	$oneUser=$result2->fetchAll(PDO::FETCH_OBJ);
	//var_dump($oneUser[0]);
	if($oneUser[0]){
		echo "<script>alert('用户名已经存在，请重试！');history.go(-1);</script>";
		return false;
	}
	//exit()终止代码执行
	///exit();
	//var_dump($pdo);
	$sql="insert into member(
							username,
							pwd,
							email,
							regTime
						)value(
							'".$_POST['username']."',
							'".md5($_POST['pwd'])."',
							'".$_POST['email']."',
							'".date('Y-m-d H:i:s')."'
						)";
//echo $sql;
//执行增加sql语句，如果成功返回增加的数据条数，
//失败，返回0
	$result=$pdo->exec($sql);
	if($result){
		//echo "插入".$result."条数据";
		//跳转到getall.php
		header("location:getall.php");
	}else{
		echo "插入数据失败";
	}
}

?>
<form action="" method="post">
	<input type="text" name="username"><br><br>
	<input type="password" name="pwd"><br><br>
	<input type="text" name="email"><br><br>
	<input type="submit" value="submit" name="send"><br><br>
</form>