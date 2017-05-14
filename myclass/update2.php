<?php
$id=$_GET["id"];
echo $id;
include"conn.php";
$sql="select*from student where id='".$id."'";
$sql2="select*from school where status=1 order by id desc";
$data2=mysql_query($sql2);
$data=mysql_query($sql);
$record=array();
if(isset($data)&&!empty($data)){
	while($rows=mysql_fetch_array($data,MYSQL_ASSOC)){
		$record=$rows;
}

if(count($record)==0){
	echo"数据不存在";
	mysql_close();
	exit();
}
}
mysql_close();
?>

 
  <form method="post" action="save.php" enctype="multipart/form-data">
<table >
<tr>
	<td colspan="2">
	<img src="<?php echo $record['images']?>" width="60px"/>
	</td>
</tr>
<tr>
	<td>头像</td>
	<td class='se'><input type="file" name="files"></td>
<tr>
<tr>
	<td>学号</td>
	<td class='se'><input type="text"  readonly name="s[number]" value="<?php echo $record['number']?>"></td>
</tr>
<tr>
	<td>姓名</td>
	<td class='se'><input type="text" name="s[name]"></td>
</tr>
<tr>
	<td>性别</td>
	<td><input type="radio" name="sex" value="<?php echo $record['sex']?>">男<input type="radio" name="sex"  value="<?php echo $record['sex']?>">女</td>
</tr>
<tr>
	<td>学院</td>
	<td class='se'><input  type="text" name="s[schoolid]" value="1" >
			<?php
				if(isset($data2)&&!empty($data2)){
					while ($rows= mysql_fetch_array($data2,MYSQL_ASSOC)) {
						?>
						<option <?php echo $record['schoolid']==$rows['id']?"selected":""?> value="<?php echo $rows['id']?>"><?php echo $rows['id']?><?php echo $rows['name']?>"></option>
					}
				}
						
				<?php
						
					}
				}
			?>
			
		</select>


	</td>
</tr>
<tr>
	<td>身份证号</td>
	<td class='se'><input type="text" name="s[id]" value="<?php echo $record['id']?>"></td>
</tr>
<tr>
	<td>宿舍号</td>
	<td class='se'><input type="text" name="s[room]" value="<?php echo $record['room']?>"></td>
</tr>
<tr>
	<td>年级</td>
	<td class='se'><input type="text" name="" value="<?php echo $record ['grade']?>" ></td>
</tr>
<tr>
    
	<td class='se' colspan="2" style="text-align:center">
	<input type="submit" / >
	<input type="reset" /></td>
	
</tr>
</table>
  </form>
