<?php
//数据库连接
mysql_connect("数据库主机名或ip"，"用户名","密码");
//连接成功，返回mysql连接标识符，失败返回false；
//关闭数据库连接
mysql_close($con);//关闭上面的连接
mysql_select_db(database_name);//选择数据库
//选择成功，返回ture 选择失败返回false。
//执行一条sql语句
//插入 报错
mysql_query('insert into test(name) values("abc")')
echo mysql_error()//返回上一个MSQ文本错误信息
//执行查询
$res=mysql_query('select*from user limit1');
//会返回一个资源句柄,通过该资源获取查询结果集中的数据
$row=mysql_fetch_array($res);
var_dump($row);
//自增主键
$uid=mysql_inset_id();
//PHP内置Mysql函数
mysql_fetch_row()//获取和显示数据： 每执行一次都是从资源也就是结果集里依次取一条数据，以数组的形式返回出来，当前一次已经取到最后一条数据的时候，返回空结果.
//返回的数组是一个一维索引数组，每一个下标与数据库里字段的排序相对应。
while($row=mysql_fetch_row($query))
{
print_r($row);
}
mysql_fetch_array()和mysql_fetcho_row()的区别
1.mysql_fetch_row()取一条数据产生一个索引数组
2.mysql_fetch_array()默认状态下取一条数据产生一个索引数组和一个关联数组
mysql_fetch_array()的第二个参数
1.MYSQL_ASSOC 关联数组
2.MYSQL_NUM -数字数组(索引数组)
3.MYSQL_BOTH-默认
mysql_fetch_assoc()=mysql_fetch_array('资源标识符',MYSQL_ASSOC)；