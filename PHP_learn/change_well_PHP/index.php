<?php
include "session.php";
//1、通过post或get获取参数
$student  = isset($_POST['s'])?$_POST['s']:array();
$student  = isset($_GET['s'])?$_GET['s']:$student;
//获取当前页码
$nowPage =   isset($_GET['page'])?$_GET['page']:1;

//2、连接数据库
include "conn.php";
//3、拼写sql
$where = "del_flag = 1";
foreach($student as $key=>$val){
	if(!empty($val)){
		$where = $where." and ".$key." like '%".$val."%'";
	}
}

//查询记录数量
$sql_count = "select	count(*) as c from	student   where $where order by  id desc";
$c =0;
$data_count = mysql_query($sql_count);
if(isset ($data_count) && !empty($data_count)){
	while ($rows = mysql_fetch_array($data_count, MYSQL_ASSOC)) {
		$c = $rows["c"];
		
	}
}
$pageNum = 3;
$pages = slipPage($nowPage,$c,$pageNum);

//var_dump($c);
$sql = "select	a.*,b.name as schoolname from	student a left join school b on a.schoolid = b.id where $where order by  id desc limit ".$pages['offeset'].",".$pageNum ;



$sql2 = "select	* from	school where status=1 order by  id desc";
//4、执行SQL 如果有返回值 则取值
$data = mysql_query($sql);
$data2= mysql_query($sql2);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title>通讯录管理平台</title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
 </head>

 <body>
 <h1>通讯录管理平台</h1>
<p>
 <form method="post" action="index.php">
	姓名：<input type="text" name="s[name]">
	学院：
<select name="s[schoolid]">
		<option value="" >选择学院</option>
		<?php
//5、如果有返回值 读取并显示返回值
if(isset ($data2) && !empty($data2)){
	while ($rows = mysql_fetch_array($data2, MYSQL_ASSOC)) {
?>
		<option  value="<?php echo $rows['id']?>"><?php echo $rows['name']?></option>
<?php  
 } 
} 
?>
</select>
	学号：<input type="text" name="s[id]">
	<input value="查询" type="submit"> <a href="add1.php">添加</a>
 </form>
</p>
<table border="1" width="750">
<tr>
	<th>头像</th>
	<th>学号</th>
	<th>姓名</th>
	<th>性别</th>
	<th>学院</th>
	<th>年级</th>
	<th>身份证号</th>
	<th>寝室号</th>
	<th>操作</th>
</tr>
<?
//5、如果有返回值 读取并显示返回值
if(isset ($data) && !empty($data)){
	while ($rows = mysql_fetch_array($data, MYSQL_ASSOC)) {
?>
<tr>
	<td><img src='<?php echo $rows['images']?>' width="40"/></td>
	<td><?php echo $rows['id']?></td>
	<td><?php echo $rows['name']?></td>
	<td><?php echo $rows['sex']==1?"男":"女"?></td>
	<td><?php echo $rows['schoolname']?></td>
	<td><?php echo $rows['grade']?></td>
	<td><?php echo $rows['idcard']?></td>
	<td><?php echo $rows['room']?></td>
	<td><a href="update.php?id=<?php echo $rows['id']?>">修改</a> | <a href="del.php?id=<?php echo $rows['id']?>">删除</a></td>
</tr>
 <?php
	}
}else{
?>
<tr>
	<td colspan="8">
		暂时木有记录！
	</td>
</tr>
 <?php
	}
?>
<tr>
	<td colspan="8">
		<a href="index.php?page=1">首页</a> 
		<?php
		if($pages['prePage']!=null){
		?>
		<a href="index.php?page=<?php echo $pages['prePage']?>">上一页 </a> 
		<?php
		} 
		if($pages['nextPage']!=null){
		?>
		<a href="index.php?page=<?php echo $pages['nextPage']?>">下一页 </a>
		<?php
		}
		?>
		<a href="index.php?page=<?php echo $pages['lastPage']?>">尾页</a> 
		&nbsp;&nbsp;当前第<?php echo $pages['nowPage']?>页&nbsp;&nbsp;
		总共<?php echo $c?>条记录
	</td>
</tr>
</table>


 </body>
</html>
<?php
//6、关闭数据库
mysql_close();
?>
