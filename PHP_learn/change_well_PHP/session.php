<?php
@session_start();
if(!isset($_SESSION["islogin"]) || $_SESSION["islogin"] !="YES"){
	echo "你还没有登录！请点击<a href=\"login.php\">登录</a>！";
	exit();
}