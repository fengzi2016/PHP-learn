<?php
include '/session/session.php';
include 'conn.php';
$sql="select * from school  order by id desc";
//$sql="insert into student(idcard,school,grade,sex,name,id,room)value('".$student['idcard']."','"$student['schoolid']."','".$student['grade']."',".$student['sex'].",'".$student['name']."',".$student['id']."',1,'".$student['room']."')";
$data=mysql_query($sql);
?> 
<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	 <form method="post" action="add_post.php" enctype="multipart/form-data">
<table >
<tr>
	<td>头像</td>
	<td class='se'><input type="file" name="file" id="file" ></td>
<tr>
	<td>学号</td>
	<td class='se'><input type="text" name="s[id]"></td>
</tr>
<tr>
	<td>姓名</td>
	<td class='se'><input type="text" name="s[name]"></td>
</tr>
<tr>
	<td>性别</td>
	<td class='se'><input type="radio" name="s[sex]" >男<input type="radio" name="">女</td>
</tr>
<tr>
	<td>学院</td>
	<td>
		<select name="s[schoolid]">
			<option value="" selected>选择学院</option>
			<?php
				if(isset($data)&&!empty($data)){
					while ($rows= mysql_fetch_array($data,MYSQL_ASSOC)) {
						?>
						<option value="<?php echo $rows['id']?>"><?php echo $rows['name']?></option>;
				<?php
					}
				}
			?>
			mysql_close();
			?>
		</select>


	</td>
</tr>
<tr>
	<td>身份证号</td>
	<td class='se'><input type="text" name=""></td>
</tr>
<tr>
	<td>宿舍号</td>
	<td class='se'><input type="text" name=""></td>
</tr>
<tr>
	<td>举报</td>
	<td class='se'><input type="text" name=""></td>
</tr>
		<tr>
    
	<td class='se' colspan="2" style="text-align:center"><input type="submit"><input type="reset"></td>
	
		</tr>
	</table>
</form>
</body>
</html>