<?php
include "session.php";
//1、通过post或get获取参数
$id=$_GET["id"];
//2、连接数据库
include "conn.php";
//3、拼写sql
$sql = "select * from student where id='".$id."'";
$sql2 = "select	* from	school where status=1 order by  id desc";
//4、执行SQL 如果有返回值 则取值
$data= mysql_query($sql);
$data2= mysql_query($sql2);
$record = array();
if(isset ($data) && !empty($data)){
	//5、如果有返回值 读取并显示返回值
	while ($rows = mysql_fetch_array($data, MYSQL_ASSOC)) {
		$record  = $rows ;
	}
	if(count($record )==0){
		echo "数据不存在";
		mysql_close();
		exit();
	}
}
//6、关闭数据库
mysql_close();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> New Document </title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
 </head>

 <body>
   <form enctype="multipart/form-data" method="post" action="save.php">
	<table align="center" border="1" width="400">
   <tr>
	 <td colspan="2" align="center">
	 
		<img width="60" src="<?php echo $record['images']?>"/>
	 
	 </td>
   </tr>
   
   <tr>
	<td>更改头像</td>
	<td><input type="file" name="files" /></td>
   </tr>
   
   <tr>
	<td>学号</td>
	<td><?php echo $record['id']?><input type="hidden"   name="s[id]" value="<?php echo $record['id']?>"></td>
   </tr>
   <tr>
	<td>姓名</td>
	<td><input value="<?php echo $record['name']?>" type="text" name="s[name]"></td>
   </tr>
   <tr>
	<td>性别</td>
	<td><input <?php echo $record['sex']==1?"checked":""?> type="radio" name="s[sex]" value="1">男<input <?php echo $record['sex']==2?"checked":""?> value="2" type="radio" name="s[sex]">女</td>
   </tr>
   <tr>
	<td>学院</td>
	<td>
		<select name="s[schoolid]">
		<option value="" >选择学院</option>
		<?php
//5、如果有返回值 读取并显示返回值
if(isset ($data2) && !empty($data2)){
	while ($rows = mysql_fetch_array($data2, MYSQL_ASSOC)) {
?>
		<option <?php echo $record['schoolid']==$rows['id']?"selected":""?> value="<?php echo $rows['id']?>"><?php echo $rows['name']?></option>
<?php  
 } 
} 
?>
	</select>
	</td>
   </tr>
   <tr>
	<td>身份证号</td>
	<td><input value="<?php echo $record['idcard']?>" type="text" name="s[idcard]"></td>
   </tr>
   <tr>
	<td>寝室号</td>
	<td><input value="<?php echo $record['room']?>" type="text" name="s[room]"></td>
   </tr>
   <tr>
	<td>年级</td>
	<td><input value="<?php echo $record['grade']?>" type="text" name="s[grade]"></td>
   </tr>
   <tr >
	<td colspan="2" align="center"><input type="submit" value="提交">&nbsp;&nbsp;<input type="reset" value="重填"></td>
   </tr>
   </table>
   </form>
 </body>
</html>
