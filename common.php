<?php
//开启session
session_start();
/*php公共文件，包含最常用的操作和数据*/
$pdo=new PDO("mysql:host=localhost; dbname=feifan", "root", "");
//设置操作数据库的字符集
$pdo->query("set names utf8");
//设置报错的等级,出了notice和strict外的错误都显示
error_reporting(E_ALL ^ E_NOTICE ^ E_STRICT);
//默认时区设置
date_default_timezone_set("PRC");
?>