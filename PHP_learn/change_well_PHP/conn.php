<?php
$StrServer="localhost"; //数据库服务器名
$StrUid="root"; //您的登录帐号
$StrSaPwd="root"; //您的登录密码
$StrDbName="admin";//您的数据库名称
//---------------------------------------------
@ mysql_connect($StrServer, $StrUid, $StrSaPwd, $StrDbName) OR die("Can't connect to MYSQL!");
@ mysql_select_db($StrDbName) OR die("Can't open database!");
@ mysql_query("SET NAMES 'utf8'");
/*
//---------------------------------------------
echo "ok!";
//---------------------------------------------
$sql = " update student set room = '元宝山5栋631' where id= '2015214450'";
$data = mysql_query($sql);
var_dump($data);
mysql_close();
*/

function slipPage($nowPage,$countx,$pageNum=10){
	 $totalPage  = intval(($countx+$pageNum-1)/$pageNum);
	$totalPage = $totalPage>0?$totalPage:1;
	if($nowPage>$totalPage || $nowPage<=0){
		$nowPage = 1;
	}
	$nextPage = $nowPage+1>$totalPage?null:$nowPage+1;
	$prePage = $nowPage-1>0?$nowPage-1:null;
	$offeset = 0 ;
	$offeset = ($nowPage-1)*$pageNum;
	// echo $offeset;
	return array(
		"nextPage" => $nextPage,
		"prePage" => $prePage,
		"offeset" =>$offeset,
		"nowPage" =>$nowPage,
		"lastPage" =>$totalPage,
		"count"=>$countx
	);
}