<?php
include "session.php";//判断是否登录
//1、通过post或get获取参数
//2、连接数据库
include "conn.php";
//3、拼写sql
$sql = "select	* from	school where status=1 order by  id desc";
//4、执行SQL 如果有返回值 则取值
$data = mysql_query($sql);
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
   <form enctype="multipart/form-data" method="post" action="add.php" >
	<table align="center" border="1" width="400">
   <tr>
	<td>头像</td>
	<td><input type="file" name="files"></td>
   </tr>
   <tr>
	<td>学号</td>
	<td><input type="text" name="s[id]"></td>
   </tr>
   <tr>
	<td>姓名</td>
	<td><input type="text" name="s[name]"></td>
   </tr>
   <tr>
	<td>性别</td>
	<td><input type="radio" name="s[sex]" value="1">男<input value="2" type="radio" name="s[sex]">女</td>
   </tr>
   <tr>
	<td>学院</td>
	<td>
	<select name="s[schoolid]">
		<option value="" selected>选择学院</option>
		<?php
//5、如果有返回值 读取并显示返回值
if(isset ($data) && !empty($data)){
	while ($rows = mysql_fetch_array($data, MYSQL_ASSOC)) {
?>
		<option value="<?php echo $rows['id']?>"><?php echo $rows['name']?></option>
<?php  
 } 
} 
?>
	</select>
 
	
	</td>
   </tr>
   <tr>
	<td>身份证号</td>
	<td><input type="text" name="s[idcard]"></td>
   </tr>
   <tr>
	<td>寝室号</td>
	<td><input type="text" name="s[room]"></td>
   </tr>
   <tr>
	<td>年级</td>
	<td><input type="text" name="s[grade]"></td>
   </tr>
   <tr >
	<td colspan="2" align="center"><input type="submit" value="提交">&nbsp;&nbsp;<input type="reset" value="重填"></td>
   </tr>
   </table>
   </form>
 </body>
</html>
<?php
//6、关闭数据库
mysql_close();
?>