<?php
include 'common.php';
//判断session中是否有值
//$_SESSION['admin']中保存的是对象
//判断是否登录
if($_SESSION['admin']){
	echo"欢迎".$_SESSION['admin']->admin_name."登录,";
	echo "<a href='getall.php?action=logout'>注销</a>&nbsp;&nbsp;&nbsp;&nbsp;";
	//搜索用户
	echo "<form action='search.php' method='post' style='display:inline'>";
	echo "<input type='text' name='keyword'>";
	echo "<input type='submit' name='search' value='搜索'>";
	echo "</form>";
	echo "<hr>";
	/*echo "<pre>";
	var_dump($_SESSION['admin']);
	echo "</pre>";*/
}else{
	//未登录跳转到登录界面
	header("location:login.php");
}
//判断是否点击了注销
//var_dump($_GET);
if($_GET['action']=='logout'){
	//unset:销毁session的值
	unset($_SESSION['admin']);
	header("location:login.php");
	/*echo "<pre>";
	var_dump($_SESSION['admin']);
	echo "</pre>";*/
}
//数据总条数
$rowCount=$pdo->query("select * from member")->rowCount();
//如果地址栏有值，$page就等于这个值
$pagesize=5;
//总页数
$pageTotal=ceil($rowCount/$pagesize);
if($_GET['page']){
	$page=$_GET['page'];
	//判断页数如果超过总页数的话
	if($page>$pageTotal){
		//当前页就等于总页数;
		$page=$pageTotal;
	}
}else{
	//地址栏没有值，$page=1;
	$page=1;
}

//降序
//select * from member limit 0,5
$sql="select*from member order by id desc limit ".($page-1)*$pagesize.",".$pagesize;
//执行查询sql语句。返回结果集对象
$result=$pdo->query($sql);
//从结果集中获取数据
//fetchALL：一次获取所有的风结果集的数据
//PDO::FETCH_OBJ 输出的结果为对像
$data=$result->fetchALL(PDO::FETCH_OBJ);
echo "<table border='1' align='center' width=95% cellpadding=0 cellspacing=0>";
echo "<caption>ABC会员系统</caption>";
echo "<tr><td>用户名</td><td>邮箱</td><td>注册时间</td><td>操作</td></tr>";
foreach($data as $key=>$value){
	echo "<tr>";
	echo "<td>".$value->username."</td>";
	echo "<td>".$value->email."</td>";
	echo "<td>".$value->regTime."</td>";
	echo "<td>
	<a href='update.php?id=".$value->id."'>修改</a>||
	<a href='delete.php?id=".$value->id."'>删除</a>
	</td>";
	echo "</tr>";
}
echo "<tr><td><a href='add.php'>添加数据</a></td></tr>";
echo "</table>";
echo "<hr>";
echo "<div class='page'><ul>";
echo "<li><a href='?page=".($page-1)."'>上一页</a></li>";
for($i=1;$i<=$pageTotal;$i++){
	if($page==$i){
		echo "<li><a href='?page=".$i."' class='present'>".$i."</a></li>";
	}else{
		echo "<li><a href='?page=".$i."'>".$i."</a></li>";
	}
	
}
echo "<li><a href='?page=".($page+1)."'>下一页</a></li>";
echo "<li><span class='present'>".$page."</span>/".$pageTotal."</li>";
echo "</ul></div>";
?>
<style>
.page{
	border:1px solid red;
}
.page ul{
	margin:0;
	padding:5px;
	list-style:none;
	text-align:center;
}
.page ul li{
	display:inline-block;
	margin-left:15px;
}
.present{
	color:red;
}
</style>