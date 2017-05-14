<?php
include"/session/session.php";
$id=$_GET["id"];

include"conn.php";
$sql="select*from a.*,b.name as schoolname from student a left join school b on a.schoolid=b.id where $where order by id desc";
$sql2="select*from school where status=1";
$data=mysql_query($sql);
$data2=mysql_query($sql2);
$student=$_POST['s'];
$path=null;
if($_FILES["files"]["error"]<=0){
	$path="upload/".$_FILES["files"]["name"];
	move_uploaded_file($_FILES["files"]["tmp_name"],$path);
}
$str="";
if($path!=null){
	$str=",images='".$path."'";
}
$sql3="insert into student(idcard,school,grade,sex,name,id,room)value('".$student['idcard']."','"$student['schoolid']."','".$student['grade']."',".$student['sex'].",'".$student['name']."',".$student['id']."',1,'".$student['room']."')";
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

 
  <form method="post" action="Noname2.php">
<table >

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
	<td class='se'><input type="text" name="sex" value="<?php echo $record['sex']?>">男<input type="radio" name="sex"  value="<?php echo $record['sex']?>">女</td>
</tr>
<tr>
	<td>学院</td>
	<td class='se'> 
		<select name="s[schoolid]">
			<option value="">选择学院</option>
			<?php
				if (isset($data2)&&!empty($data2)) {
					while ($rows=mysql_fetch_array($data2,MYSQL_ASSOC)) {
					?>
					<option></option>
					}
				}
		</select>
	<input  type="text" name="s[school]" value="1" ></td>
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
