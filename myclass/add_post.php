<?php
//1,获取数据和图片
$stu=$_POST['s'];
if ($_FILES["file"]["error"]<=0) {
	move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$_FILES["file"]["name"]);
	$path="upload/".$_FILES["file"]["name"];//实际应用中 系统要对文件进行重新命名	
//处理图片上传结束

//2.连接数据库
include'conn.php';
$sql = "insert into student (image,id,schoolid,sex,name)values('".$path."','".$stu["id"]."','".$stu["schoolid"]."','".$stu["sex"]."','".$stu["name"]."')";
echo $sql;
exit;
$data=mysql_query($sql);
if ($data) {
	echo "添加成功";
}else{
	echo "添加失败";
}

mysql_close();
?>