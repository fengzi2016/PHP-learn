<?php
@session_start();
/*echo 
isset($_SESSION['islogin'])?$_SESSION['islogin']:"no!";*/
if(!isset($_SESSION["islogin"])||$_SESSION["islogin"]!="YES")
{
	echo "你还没有登录，请点击<a href=\"session\login.php\">登录</a>!";
	exit();
}
?>