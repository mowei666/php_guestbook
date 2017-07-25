<?php
//开启session
session_start();
//错误处理
error_reporting(E_ALL^E_NOTICE^E_STRICT);
//设置默认时区
date_default_timezone_set("PRC");
//dsn:data source name;
//连接mysql服务器
//尝试执行指定的代码，如果出错catch中抛出错误;
try{
	$pdo=new PDO("mysql:host=localhost;dbname=web13",'root',"");
}catch(PDOException $e){
	//PDOException内置类
	//$e=new PDOException();
	echo "连接mysql服务器错误，".$e->getMessage();
	/*echo "<pre>";
	 var_dump($e);
	 echo "</pre>";*/
}
//设置操作数据库的字符集
$pdo->query("set names utf8");
?>