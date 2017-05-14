<?php
$StrServer="localhost"; //数据库服务器名
$StrUid="root"; //您的登录帐号
$StrSaPwd="root"; //您的登录密码
$StrDbName="admin";//您的数据库名称
date_default_timezone_set("PRC");
@ mysql_connect($StrServer, $StrUid, $StrSaPwd, $StrDbName) OR die("Can't connect to MYSQL!");
@ mysql_select_db($StrDbName) OR die("Can't open database!");
@ mysql_query("SET NAMES 'utf8'");
?>

