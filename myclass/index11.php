<?php
include"/session/session.php";
include "conn.php";
/*1.通过post或get获取参数
2.连接数据库
3.拼写sql
4.执行sql ，
5.如果有返回值，读取并显示返回值
6.关闭数据库*/
/*$student=$_POST['s'];

foreach($student as $key=>$val){
if(!empty($val)){
  $where=$where."and".$key."like'%".$val."%'";
  }
}*/

$sql="select *from student order by id desc";
$data=mysql_query($sql);
?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>Document</title>
  
 </head>
 <body>
 
 <form method="post" action="index11.php">

  <table border=1 >
      <caption>通讯录管理平台</caption>
       <form method="post" action="">
		姓名<input type="text" name="s[name]">
		学院<input type="text" name="s[school]">
		学员<input type="text" name="s[number]">
		<input type="submit" value="查询">
        <tbody>
          <tr>
            <th>name</th>
            <th>number</th>
            <th>grade</th>
            <th>sex</th>
            <th>school</th>
            <th>id</th>
            <th>room</th>
            <th>操作</th>
			
          </tr>
<?php
if(isset($data)&&!empty($data)){
while ($rows = mysql_fetch_array($data,MYSQL_ASSOC)){
?>
          <tr>
           <td><?php echo $rows['name']?></td>
           <td><?php echo $rows['number']?></td>
           <td><?php echo $rows['grade']?></td>
           <td><?php echo $rows['sex']?></td>
           <td><?php echo $rows['schoolid']?></td>
           <td><?php echo $rows['id']?></td>
           <td><?php echo $rows['room']?></td>
           <td><a href="update2.php?id=<?php echo $rows['id']?>">修改</a>|<a href="update.php?id=<?php echo $rows['id']?> ">删除</a></td>

          </tr>
<?php
}
		  }
		  ?>

          
		  <tr>
		  <span>
		  <td colspan="8" align="center">
		  <input type="button" value="首页" onclick="">
		  <input type="button" value="上一页" onclick="">
		  <input type="button" value="下一页" onclick="">
		  <input type="button" value="尾页" onclick="">
		  </td></span>
		  </tr>
          </tbody>
     </table>
	  </form>
	  <br />
	  <br />
	  
	  <input type="text" name="word"><input type="button" value="查询" onclick="" > <a href="add11.php">添加</a>


 </body>
 <?php
mysql_close();
?>
</html>