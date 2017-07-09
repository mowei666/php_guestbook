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
if($_GET['id']){
	$sql="select * from member where id=".$_GET['id'];
	$result=$pdo->query($sql);
	$data=$result->fetchAll(PDO::FETCH_OBJ);
	//var_dump($data);
}
//点击了提交按钮修改数据
if($_POST['send']){
	//判断是否修改了密码
	if($_POST['pwd2']==$_POST['pwd']){
		//echo "未修改密码";
		$pwd=$_POST['pwd'];
	}else{
		//echo "修改了密码";
		$pwd=md5($_POST['pwd']);
	}
	//echo $pwd;
	//exit();
	//var_dump($_POST);
	$sql="update  member
	      set     username='".$_POST['username']."',
	              pwd='".$pwd."',
	              email='".$_POST['email']."' 
	      where   id=".$_GET['id'];
	//执行修改的sql语句，成功返回修改的条数
	//失败，返回0.
	$result=$pdo->exec($sql);
	if($result){
		header("location:getall.php");
		//$result==0:未修改数据
	}else if($result==0){
		//var_dump($result);
		header("location:getall.php");
	}else{
		echo "修改失败";
	}
}
?>
<form action="" method="post">
	<input type="hidden" name="pwd2" value="<?php echo $data[0]->pwd;?>">
	<input type="text" name="username" value="<?php echo $data[0]->username;?>"><br>
	<input type="password" name="pwd" value="<?php echo $data[0]->pwd;?>"><br>
	<input type="text" name="email" value="<?php echo $data[0]->email;?>"><br>
	<input type="submit" value="submit" name="send">
</form>
