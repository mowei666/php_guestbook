<?php
include 'common.php';
if($_POST['send']){
	/*echo ($_SESSION['captcha']);
	echo $_POST['code'];*/
	//判断用户输入的验证码是否正确
	//strtolower();把字符串转换为小写
	if(strtolower($_POST['code'])!=strtolower($_SESSION['captcha'])){
		echo "<script>alert('验证码不正确');location.href='login.php';</script>";
		return false;
	}
	//echo "1";
	//根据用户名和密码设置查询语句
	$sql="select   * 
	      from     admin 
	      where    admin_name='".$_POST['admin_name']."' 
	      and      pwd='".md5($_POST['pwd'])."'";
	//echo $sql;
	//PDO执行查询sql语句,返回结果集
	$result=$pdo->query($sql);
	//从结果集中获取所有的数据
	$data=$result->fetchAll(PDO::FETCH_OBJ);
	//var_dump($data);
	if($data[0]){
		//把用户写入session
		$_SESSION['admin']=$data[0];
		//echo "ok";
		header("location:getall.php");
	}else{
		echo "<script>alert('用户名或密码错误');location.href='login.php';</script>";;
	}
}
?>
<dl class="login">
<form action="" method="post">
	<dt>后台登录</dt>
	<dd><input type="text" name="admin_name" placeholder="用户名"></dd>
	<dd><input type="password" name="pwd" placeholder="密码"></dd>
	<dd style="text-align:left">
		<input type="text" name="code" style="width:80px;display:inline;margin-left:5px">
		<img src="img.php" style="width:100px" class="captcha">
		</dd>
	<dd><input type="submit" name="send" class="submitBtn"></dd>
</form>
</dl>
<style>

.login{
	border:1px solid #ddd;
	width:250px;
	height:230px;
	position:absolute;
	left:0;
	right:0;
	top:0;
	bottom:0;
	margin:auto;	
}
.login dt{
	text-align:center;
	margin:10px auto;
}
.login dd{
	margin:10px auto;
}
.login dd input{
	width:95%;
	border:1px solid #ddd;
	display:block;
	margin:auto;
	font-size:14px;
	padding:3px;
}
.submitBtn{
	background:green;
	color:#fff;
}
</style>
<script>
var captcha=document.querySelector(".captcha");
captcha.addEventListener("click",function(){
	this.src="img.php?num="+Math.random();
});
</script>













