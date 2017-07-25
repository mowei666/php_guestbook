<?php
include 'common.php';
include 'checkLogin.php';
//var_dump($_POST);
if($_POST['send']){
	$searchSql="select * 
				from   member
				where  username='".$_POST['username']."'";
	$searchResult=$pdo->query($searchSql);
	$oneUser=$searchResult->fetchAll(PDO::FETCH_OBJ);
	//var_dump($oneUser[0]);
	//如果用户名已存在
	if($oneUser[0]){
		echo "<script>
				alert('用户名已存在，请重试!');
				history.go(-1);
              </script>";
		return false;
	}
	//终止代码执行
	//exit();
	//添加数据
	$sql="insert into member(
		username,
		pwd,
		email,
		regTime
	)values(
		'".$_POST['username']."',
		'".md5($_POST['pwd'])."',
		'".$_POST['email']."',
		'".date('Y-m-d H:i:s')."'
	)";
	//echo $sql;
	$result=$pdo->exec($sql);
	if($result){
		//echo "ok";
		echo "<script>
				alert('数据添加成功');
				location.href='getall.php';
			</script>";
	}else{
		echo "failed";
	}
}
?>
<style>
.reg{
	border:1px solid #ddd;
	position:absolute;
	padding:15px;
	left:0;
	right:0;
	top:0;
	bottom:0;
	margin:auto;
	width:205px;
	height:110px;
	box-shadow:0 0 3px #ddd;
}
.reg input{
	margin-top:5px;
	width:95%;
}
</style>
<form action="" method="post" class="reg">
	<input type="text" name="username" placeholder="用户名"><br>
	<input type="password" name="pwd"><br>
	<input type="text" name="email" class="email"><br>
	<input type="submit" value="submit" name="send" class="addBtn">
</form>
<script src="Tools.js"></script>
<script>
//根据选择器名选择元素
var addBtn=document.querySelector(".addBtn");
var email=document.querySelector(".email");
//console.log(addBtn);
addBtn.addEventListener("click",function(evt){
	//alert(validate_email(email.value));
	if(!validate_email(email.value)){
		alert("邮箱格式不正确!");
		//阻止默认动作
		evt.preventDefault();
	}
});
</script>










