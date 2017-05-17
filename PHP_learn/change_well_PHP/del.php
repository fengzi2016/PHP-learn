<?php
include "session.php";
//1、通过post或get获取参数
$id =$_GET['id'];
//2、连接数据库
include "conn.php";
//3、拼写sql
$sql = "update student set del_flag=0 where id='".$id."'";
$sql2 = "delete from student  where id='".$id."'";
//echo $sql;
//4、执行SQL 如果有返回值 则取值
$flag= mysql_query($sql);
//5、如果有返回值 读取并显示返回值
if($flag){
	echo "success";
}else{
	echo "fail";
}
//6、关闭数据库
mysql_close();