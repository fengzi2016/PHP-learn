<?php
include "session.php";
//1、通过post或get获取参数
$student =$_POST['s'];

//处理图片上传 开始
if ($_FILES["files"]["error"] <= 0)
{ 
	 //实际应用中 系统要对文件进行重名
	$path =  "upload/" .$_FILES["files"]["name"];
     move_uploaded_file($_FILES["files"]["tmp_name"],$path );
}
//处理图片上传 结束

//2、连接数据库
include "conn.php";
//3、拼写sql
$sql = "insert into student(images,idcard,schoolid,grade,sex,name,id,del_flag,room)values('".$path ."','".$student['idcard']."',".$student['schoolid'].",'".$student['grade']."',".$student['sex'].",'".$student['name']."','".$student['id']."',1,'".$student['room']."')";
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