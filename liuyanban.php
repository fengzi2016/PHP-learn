<!--< ?php
//php打开文件
//fh 资源类型变量
$fh=fopen('./jishiben.txt', 'a');//a append 附加
//打开后，往文件写内容,沿着资源写
$str=$_POST['title'].",".$_POST['content']."\n";
fwrite($fh, $str);
//关闭
fclose($fh);
echo 'OK';
?> -->
<?php
$gh=fopen('./jishiben.txt','r');//r 只读
//读完
	$i=1;
while(($row=fgetcsv($gh))!=false ){
   echo '<li><a href="liuyanban.php?tid=',$i,'">'.$row[0].'<li>';
   $i=$i+1;
 }

?>