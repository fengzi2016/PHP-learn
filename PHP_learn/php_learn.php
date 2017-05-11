<?php
/*定义数值*/
$arr=array("苹果",:"香蕉","菠萝");
/*输出数组*/
print_r($arr);
/*索引数组*/
$arr[0]="苹果"；
array('0')=>'苹果'；
array（'苹果'）；
/*for循环索引*/
$fruit=array('apple','bananer','boluo');
for($i=0;$i<3;$i++){
	echo '<br>数组第'.$i.'值是：'.$fruit[$i];
}
/*foreach循环索引数组值*/
foreach ($fruit as $key => $value) {
	echo'<br>第'.$key.'值是:'.$value;
}
/*关联数组*/
$fruit=array(
	'apple'=>"苹果"
	'bananer'=>"香蕉"
	'pineapple'=>"菠萝"
	）；
$arr['apple']='苹果'
$arr('apple '=>'苹果')；
/*自定义函数*/
function name(){
	echo'Marry';
}//调用则为函数名+参数；
/*函数出现返回值会终止函数运行，回到调用处
/*调用可变函数*/
function run(){
	echo'keku';
}
$func="run"；
$func（）；
//判断函数或者类是否存在
function func(){}
if (function_exists("func")){echo "exist";}
class myclass{}
if(class_exists('myclass')){$myclass=new myclass();}
//构造函数，析构函数
class Car{
	function _construct(){
		print "父类函数被调用";

	}
}
$car=new Car ();//实例化
class Truck extends Car{
	function _construct(){
		print "子类构造函数被调用"；
		parent::_construct;
	}
function _destruct(){
	print "析构函数被调用";

 }
}
$car =new Car();
echo '使用后准备销毁car对象';
unset($car);//销毁是调用析构函数
//Static静态关键字语法：类名::方法名;不允许对象使用->操作符调用
class Car{
	private static $speed=10;
	private  static function getSpeed(){
		return self::$speed;
	}
echo Car::getSpeed();
//通过变量调用静态方法
$func="getSpeed";
$className="Car";
echo $className::$func
}//可以使用slef,parent,static 在内部调用静态方法和属性
//构造函数定义成了私有方法，则不能直接实例化对象，通过静态方法进行实例
class Car{
	private function _construct{
		echo "guanyunfeng";

	}
	private static $_obection= null;
	private static function getIstance(){
		if (empty(self::obection)){
			slef::$obection=new Car;//内部调用私有方法
		}
		return self::$obection;

	}
}
$car=Car::getIstance;
//PHP重载：动态创建属性和方法
//_set:赋值 _get：读取 _isset:判断属性是否设置 _unset销毁属性
class Car{
	public $ary=array();
	public function _set:($key,$val){
		$this->ary[$key]=$val;
	}
	public function _get($key){
		if (_isset($this->ary[$key])){
			return $this->ary[$key];
		}
		return null;
	}
}
//方法重载_class($name，$args) name替代函数名，$args替代参数
class Car{
	public $speed=0;
	public function _call($name,$args){
		if($name=="speedUp"){
			$this->speed+=10;
		}
	}
}
$car=new Car();
$car->speedUp;
echo $car->speed;
//对象比较：
//当同一个类的两个实例的所有属性都相等时，使用==判断
//判断两个变量为同一个对象使用时，用===判断
//对象复制clone
class Car{
	public $name="car"
	public function _clone(){
		$obj=new Car;
		$obj->name=$this->name;
	}
	$a=new Car();
	$a->name="new car";
	$b=clone $a;
	var_dump($b);
}
//对象序列化 serialize();unserialize()
class Car{
	public $name="car";
}
$a=new Car();
$str=serialize($a);
$b=unserialize($str);
var_dump($b);
//定义字符串:单引号，双引号，heredoc语法结构
$hello='hello world';
$hello="hello";
$hello=<<<TAG
hello world
TAG;
//单引号内容被认为是普通字符
//双引号可以直接包含字串变量
$str="hello";
echo "str is $str";//结果： str is hello
echo 'str is $str';//结果: str is $str
//字符串连接 .
//获取字符长度 英文strlen() 中文mb_strlen($var,"UTF8")
$str='我爱你'；
echo mb_strlen($str,"UTF8");
//字符串的截取 英文字符串的截取:substr()（字符串变量，开始截取的位置，截取个数）
//中文字符串的截取mb_substr()
//(字符串变量，开始截取的位置，截取个数，网络编码)
$str="我爱你，中国";
echo mb_substr($str, 4,2,'utf8');
//查找字符串strpos(要处理的字符串，要定位的字符串，[定位的其实位置])结果为显示字符串的位置
$spo=strpos($str,'我爱你');
//替换字符
str_replace(要查找的字符串，要替换的字符串，被搜索的字符串，[替换进行计数]);
//字符串格式化字符串 sprintf(格式，要转化的字符串) 返回：格式化好的字符串
$str='99.9';
$ressult=sprintf('%0.12f',$str);
echo $ressult;
//合并函数implode('分隔符[可以选择]',数组);分隔函数explode('分隔符'，字符串)
$str=$arr('hello','world');
$ressult=implode('',$arr);
$str='apple,banana';
$result=explode(',' ,$str);
//设置cookie
name(cookie名)可以通过$_COOKIE['name']
value(Cookie的值)
expire(过期时间)Unix时间戳格式，默认为0，表示浏览器关闭即失效
path(有效路径)如果路径设置为'/'，则整个网站都有效
domain(有效域)默认整个域名都有效，如果设置了'www.imooc.com'则只在www子域中有效
setcookie("TestCookie",$value,time()+3600,'/path/,'"immoc,com")；
//删除cookie
setcookie('test',$value,time()-1);
//session
session_start();//设置一个session
$_SESSION['test']=time()//显示当前的session_id
echo "session_id:".session_id()
echo $_SESSION['test'];//读取session的值
unset($_SESSION['test']);//销毁一个session
echo "<br>";
var_dump($_SESSION);
session_destroy();//销毁所以session的当前数据，但session_id依然存在，立即销毁则要用unset();
//例子
<?php
session_start();
//假设用户登录成功获得了以下用户数据
$userinfo = array(
    'uid'  => 10000,
    'name' => 'spark',
    'email' => 'spark@imooc.com',
    'sex'  => 'man',
    'age'  => '18'
);
header("content-type:text/html; charset=utf-8");

/* 将用户信息保存到session中 */
$_SESSION['uid'] = $userinfo['uid'];
$_SESSION['name'] = $userinfo['name'];
$_SESSION['userinfo'] = $userinfo;

//* 将用户数据保存到cookie中的一个简单方法 */
$secureKey = 'imooc'; //加密密钥
$str = serialize($userinfo); //将用户信息序列化
//用户信息加密前
$str = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($secureKey), $str, MCRYPT_MODE_ECB));
//用户信息加密后
//将加密后的用户数据存储到cookie中
setcookie('userinfo', $str);

//当需要使用时进行解密
$str = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($secureKey), base64_decode($str), MCRYPT_MODE_ECB);
$uinfo = unserialize($str);
echo "解密后的用户信息：<br>";
print_r($uinfo);
//判断文件是否存在，可读可写
$filename='./test.txt';
if(file_exists($filename)){
	echo file_get_contents($filename);
}
if(is_file($filename)){
	echo file_get_contents($filename);//不仅可以判断文件，还可以判断目录是否存在
}
if(is_writeable($filename)){
	echo file_put_contents(($filename,'test');
}
if(is_readable($filename)){
	echo file_put_contents($filename);
}
//文件的元属性
fileowner(filename)获得文件的所有者
filectime(filename)获取文件的创建时间
filemtime(filename)获取文件的修改时间
fileatime(filename)获取文件的访问时间
$mtime=filemtime($filename);
echo'修改时间：'.date('Y-m-d H:i:s',filemtime($filename));
//取得文件的大小filesize($filename)
$filename='/data/webroot/usercode/resource /test.txt';
$size=filesize($filename);
//time()表示从1970年1月1日00：00：00到当前时间的秒数之和
date("Y-m-d")当前的日期date("Y-m-d",'一串数字')表示数字对应的日期
//date_default_timezone_set('Asia/Shanghai');修改时区
//获取每个日期或者时间的时间戳 strtotime
echo strtotime('2017-3-22');
//格式化的日期字符串转换成时间戳
echo strtotime('now')//将now直接等于现在的日期和时间=echo time()
echo strtotime('+1 seconds');//将现在的日期和时间加上了一秒并转化为时间戳=echo time()+1;
echo strtotime('+1 day')//现在的日期和时间加上1天 week为一周
echo gmdate('Y-m-d H:i:s',time());//输出的是0时区的日期
//GD库，用来处理图形的扩展库，可以对图像进行处理或者直接生成新的图片
//常用在图片加水印，验证码生成等方面，只需要在安装的时候开启就可以，输入以下代码
header("content-type: image/png");

$img=imagecreatetruecolor(100, 100);//创建一个真彩色的空白图片：

$red=imagecolorallocate($img, 0xFF, 0x00, 0x00);//进行分配画笔颜色

imagefill($img, 0, 0, $red);//00表示直线的起点坐标，100,100终点坐标，$red利用了上面的颜色。进行线条的绘制，通过指定起点跟终点来最终得到线条。

imagepng($img);//得到一个图片文件，指定文件名将绘制后的图像保存到文件中。

imagedestroy($img);//销毁图片
//文字绘制imagestring(resource$image,int$front,int$x,int$y,string$s,int$col)
//$font 设置字体的大小，x,y设置文字显示的位置，$s是绘制的文字，$col文字的颜色
$img=imgecreatetruecolor(100,100);
$red=imagecolorallocate($image,0xFF,0x00,0x00);
imagestring ($img,5,0,0,"Hello world",$red);
header("content-type:image/png");
imagepng($img);
imagedestroy ($img);
//抛出一个异常
try{//
//可能出现错误或异常的代码
//catch表示捕获，Exception是PHP已经定义好的异常类}
//catch(Exception $e){
//异常处理，方法：
//1、自己处理
//2、不处理，将其再次抛出}
function checkNum($number){
	if($number>1){
		throw new Exception("异常提示-数字必须小于等于1");
	}
	return ture;
	}
	//在try代码块中触发异常
try{
	checkNum(2);//如果异常被抛出，那么下面一行代码将不会被输出
    echo '如果能看到这个提示，说明你的数字小于等于1';
}catch(Exception $e){
	//捕获异常
	echo'捕获异常:' .$e->getMessage();
}
//Exception是所以异常处理的基类，具有几个基本属性和方法
/*message 异常消息内容
code 异常代码
file 抛出异常的文件名
line 抛出异常在该文件的行数
常用的方法：
getTrace 获取异常追踪信息
getTraceAsString 获取异常追踪信息的字符串
getMessage 获取出错信息*/
class MyException extends Exception{
	function getInfo(){
		return'自定义错误信息';
	}
}
try{
	throw new MyException('error')
}catch(Exception $e){
	echo $e->getInfo();
	echo $e->getMessage();
}
//获取错误发生的所在行
try{
	throw new Exception('wrong');
}catch(Exception $e){
	$msg='Error:'.$ex->getMessage()."\n";
	$msg.=$ex->getTraceAsString()."\n";
	$msg.='异常行号:'.$ex->getLine()."\n";
	$msg.='所在文件: '.$ex->getFile()."\n";
//将异常信息记录到日志中
   file_put_contents('erro.log',$msg);
}
//数据库扩展
$link=mysql_connect('mysql_host','mysql_user','mysql_password')
$link=msql_connect('127.0.0.1','code1','')or die('数据库连接失败')
mysql_select_db('code1');
mysql_query("ste names 'utf8'");
$result=mysql_query('select *from user limit 1');
$row=mysql_fetch_assoc($result);
print_r($row);
//数据库连接
$host='localhost';
$user='code1';
$pass='';
$link=msql_connect($host,$user,$pass);
mysql_select_db('code1')//选择数据库
mysql_query("set names 'utf8'")//设置使用的字符编码
$res=mysql_query('select*from user limit1')//查询语句
$row=mysql_fetch_array($res);
var_dump($row);
//插入新数据
$sql="insert into user(name,age,class)values('李四',18,'高三一班')";
mysql_query($sql);
或
$name='李四';
$age=18;
$class='高三一班';
$sql="insert into user(name,age,class)values('$name','$age','$class')";
mysql_query($sql);//执行插入语句
//获得自增的主键id
$uid=mysql_insert_id();
//只获得数据索引数组
$row=mysql_fetch_row($result);
或
$row=mysql_fetch_array($result,MYSQL_NUM);
//获得关联索引数组
$row=mysql_fetch_assoc($result);
或
$row=mysql_fetch_array($result,MYSQL_ASSOC)；
//获取所有数据+循环
$data=array()
while($row=mysql_fetch_array($result)){
	$data[]=$row;
}
//查询分页数据
limt m,n表示从m行后取n行数据
$page=2;
$n=2;
$m=($page-1)*$n;
$sql="select*from uesr limit $m,$n";
$result=mysql_query($sql);
//循环获取当前页的数据
$data=array();
while($row=mysql_fetch_array($result)){
	$data[]=$row;
}
//数据更新与删除数据
$sql="update user set name='曹操'where id=2 limit1";
if(mysql_query(sql)){
	echo'更新成功';
}
$sql="delete from user where id=2 limit1";
if(mysql_query($sql)){
	echo'删除成功';
}
//获取更新后的数据行数 mysql_affected_row
$sql="update user set name='name' where id =2 limit1";
if(mysql_query($sql)){
	echo mysql_affected_rows();
}
//关闭Mysql连接
mysql_close();
若为多个数据库
$link=mysql_connect($host,$uesr,$pass);
mysql_close($link);
//正则表达式
$pattern=正则表达式
$subject=匹配的目标数据
//基本语法
//界定符:表示一个正则表达式的开始和结束：两个斜杠//
//量词
{n}表示其前面的原子恰好出现n次
{n,}表示其前面的原子最少出现n次  出现次数>=n
{n,m}表现其前面的原子最少出现n次，最多出现m次
* 匹配0次、1次、或多次其之前出现的原子，即{0,} x>=0
+ 匹配1次或多次其之前的原子即{1,} x>=1
? 匹配0次或者1次其之前的原子,即{0，1} 0<x<1
//边界控制和模式单元
^ 匹配字符串开始的位置
$ 匹配字符串结尾的位置
()匹配其中的整体为一个原子
//修正模式 
//贪婪匹配和懒惰匹配
贪婪模式 匹配结果存在歧义时取其长
懒惰模式 匹配结果存在歧义时取其短 在末尾加上U 如'/xxx/U'
U-懒惰匹配
i-忽略英文字母大小写
x-忽略空白
s-让元字符'.'匹配包括换行符在内的所有字符
//元字符
| 匹配两个或者多个分支
[]匹配方括号中的任意一个原子
[^]匹配除方括号中的原子之外的任意字符
//原子的集合
. 匹配除换行符之外的任意字符
\d 匹配任意一个十进制数字[0-9]
\D 匹配任意一个非十进制数字，即[^0-9]
\s 匹配一个可见原子
\S 匹配一个不可见原子
\w 匹配任意一个数字、字母或下划线，即[0-9a-zA-Z]
\W 匹配非\w
//PHP常用内置函数
//===============================时间日期=============================== 
//y返回年最后两位，Y年四位数，m月份数字，M月份英文。d月份几号数字，D星期几英文

$date=date("Y-m-d");

$date=date("Y-m-d H:i:s");//带时分秒

//include,include_once.require,require_once

require("file.php")；// 在PHP程序执行前就会先读入require所指定引进的文件，如出现错误是致命的。

include("file.php")；// 可以放在PHP程序的任何位置，PHP程序执行到时才读入include指定引入的文件，如出现错误会提示

//===============================输出打印===============================

sprintf("%d","3.2") ;//只格式化，返回格式化后的字符串，不输出。

printf("%d","3.2") ;//即格式化，又输出

print("3.2") ;//只输出

echo "nihao","aa";//可以输出多个字符串

print_r(array("a","b","c"));//将数组的键值与元素依次显示

//===============================常用字符串函数===============================

//获取字符串长度，有多少个字符，空格也算

$str=" sdaf sd ";

$len=strlen($str);

//用第一个参数里的字符串，把后面数组里的每个元素连接起来，返回一个字符串。

$str=implode("-",array("a","b","c"));

//字符串分割方法，返回一个数组，用第一个参数里的字符分割后面的字符串，指定字符的前后和之间都截取，如果指定字符在开头或结尾则返回的数组开头或结尾的元素为空字符串

//没有分割到字符串就返回给数组对应元素一个空值。最后一个限制返回数组长度，可不限制，则一直分割下去。

$array=explode("a","asddad addsadassd dasdadfsdfasdaaa",4);//explode(separator,string,limit)separator 必需。规定在哪里分割字符串。
//string 必需。要分割的字符串。
//limit 可选。规定所返回的数组元素的最大数目。

print_r($array);

//剔除字符串左边开头的空格,并返回

//如有第二个参数则是剔除左边开头的空格换成剔除第二个参数里的字符串

$str=ltrim("a asd ","a");

//剔除字符串右边开头的空格

$str=rtrim(" asd ");

//把第一个字符串两边以第二个参数开头的字符串剔除。如没有第二个参数，默认剔除掉字符串两边开头的空格

$str=trim(" sdsdfas ","a");

//从字符串第一个参数里的指定位置开始取多长(多少个)字符，字符串中第一个字符位置从0算。

//如果第二个参数为负则从字符串结尾倒数第几个开始取多长的字符串。结尾最后一个字符算-1，截取方向总是从左到右

$str=substr("abcdefgh",0,4);

//将第三个参数的第一个参数字符串用参数二字符串替换

$str=str_replace("a","","abcabcAbca");

//与str_replace用法同，只是不区分大小写

//$str=str_ireplace("a"," ","abcabcAbca");

//返回括号里字符串的字符全部大写的字符串

$str=strtoupper("sdaf");

//将括号里第一个字符串变成大写后返回

$str=ucfirst("asdf");

//用echo等将括号里字符串打印在网页上时原汁原味打印出括号里的字符串，包括标签字符

$str=htmlentities("
 ");

//返回第二个参数字符串在第一个字符串里出现的次数

$int=substr_count("abcdeabcdeablkabd","ab");

//返回第二个字符串在第一个字符串第一次出现的位置，第一个字符位置算0

$int=strpos("asagaab","ab");

//返回第二个字符串在第一个字符串最后一次出现的位置，第一个字符位置算0

$int=strrpos("asagaabadfab","ab");

//截取返回参数一中从左至右第一个出现的参数二到参数一最后一个字符的字符串

$str=strstr("sdafsdgaababdsfgs","ab");

//截取返回参数一中从左至右最后一个出现的参数二到参数一最后一个字符的字符串

$str=strrchr("sdafsdgaababdsfgs","ab");

//将参数二中每一个字符在参数一中相同字符前加"\"

$str=addcslashes("abcdefghijklmn","akd");

//将参数一的字符串填充到参数二指定的长度(单字符个数)，参数三为指定填充的字符串，不写默认空格

//参数四填充位置，0在参数一左侧开头填充，1右侧开头，2两边开头同时。不写默认在右侧开头填充

$str=str_pad("abcdefgh",10,"at",0);

//依次比较两字符串对应字符阿斯克码值，第一对不一样的，如果参数一里大于参数二里的返回1,反之返回-1，两字符串完全一样返回0

$int1=strcmp("b","a");

//返回第一个参数格式化后的数字格式，第二个参数为保留几个小数，参数三为将小数点换成参数三，参数四为整数部分每三位用什么字符分割

//后面三个参数都不写，则默认去掉小数部分，整数每隔三位用逗号,分割。参数三，参数四必须同时存在

$str=number_format(1231233.1415,2,"d","a");

//===============================常用数组方法===============================

$arr=array("k0"=>"a","k1"=>"b","k2"=>"c");

//返回数组元素个数

$int=count($arr);

//判断第二参数的数组元素中是否有第一个参数元素

$bool=in_array("b",$arr);

//返回括号中数组所有键值组成的新数组原数组不改变

$array=array_keys($arr);

//判断第二个参数的数组中是否有第一个参数的键值，返回真假

$bool=array_key_exists("k1",$arr);

//返回原数组中所有元素值组成的新数组，键值从0开始自增，原数组不变

$array=array_values($arr);

//返回当前数组指针指向的键值

$key=key($arr);

//返回当前数组指针指向的元素值

$value=current($arr);

//返回当前数组指针指向元素的键值及元素值组成的数组，再将指针推向下一位，最后指针指向的是一个空元素返回空

//返回的数组中有四个固定键值对应的元素值分别是返回元素的键值及元素值，其中0,'key'键值都对应返回元素键值，1,'value'键值都对应返回的元素值

$array=each($arr);

//先将数组指针推向下一位，再返回指针移动后指向的元素值

$value=next($arr);

//将数组指针推向上一位，再返回指针移动后指向的元素值

$value=prev($arr);

//让数组指针重置指向第一个元素并返回元素值

$value=reset($arr);

//将数组指针指向最后一位元素，并返回最后一位元素值

$value=end($arr);

//将第一个参数以后的参数作为元素追加入第一个参数数组的末尾，索引从最小的没用过的数值开始计，返回之后的数组长度

$int=array_push($arr,"d","dfsd");

//将第一个参数数组后面所有参数作为元素添加到第一个参数数组开头处，键值以0从第一个元素处重新累加，原非数值的键值保持不变，原元素排序位置不变，返回之后的数组长度

$int=array_unshift($arr,"t1","t2");

//返回从数组尾部提取最后一个元素值，并把最后一个元素从原数组中剔除

$value=array_pop($arr);

//array_pop相反，提取返回数组头一个元素值，并把头一个元素从原数组中剔除

$value=array_shift($arr);

//让第一个参数数组达到第二个参数数值长度，将第三个参数作为元素添加到第一个参数数组的末尾，索引从最小没用过数值开始计并返回，原数组不改变

$array1=array_pad($arr,10,"t10");

//返回一个将原数组中多余重复元素剔除掉的新数组，原数组不改变

$array=array_unique($array1);

//将原数组键值打破重新以元素值的阿斯克码值从小到大排序，索引从数字0开始重计

$int=sort($array);

//和sort相反，以元素值阿斯柯码值大小降序重新排序，索引从0重新计

$int=rsort($array);

//返回将第一个参数数组中每一个元素值依次作为键值付给参数二数组的数组，两数组长度必须一致，原数组不改变

$array=array_combine(array("a","b","c","d","e"),$arr);

//将两个数组合并并返回原数组不变

$array=array_merge($arr,array("a","b","c"));

//在第一个参数数组中从第二个参数数值位置开始截取到第三个参数数值长度的数组键值+元素并返回，数组第一个元素位置从0计

$array=array_slice($arr,2,1);

//截取功能和array_slice()一样，只是将截取部分在原数组中剔除

$array=array_splice($arr,2,1);

//将第一个参数作为第一个元素，每次自增参数三的值，自增后再作为一个元素存在数组中，直到值达到参数二的值存到数组中为止并返回这个数组

//参数一，参数二可以是数字，可以是单个字符，单字符就按阿斯柯码值算，第三个参数不写默认每次自增1

$array=range(3,9,2);

//将原数组元素与对应键值的对应关系重新随机排列返回真假

$bool=shuffle($arr);

//计算数组中所有数值型元素值的和

$int=array_sum(array("a",2,"cssf"));

//把一个数组分割为新的数组块，新数组每个元素都是一个数组，新数组每个元素内有几个元素由参数二决定

//第三个参数决定元素的键值是否保留原键值可不写，true为保留，默认false不保留

$array=array_chunk(array("a"=>"a","b","c","d","e","f","g","h"),2,true);

//json_encode()将数组转换成JSON格式字符串返回

$arr = array('k1'=>'val1','k2'=>'val2','k3'=>array('v3','v4'));

echo $encode_str = json_encode($arr);

//json_decode()将JSON格式字符串转换成能强制转换成数组的对象返回，JSON格式字符串中键与值需要引号括起来时必须用双引号

$decode_arr = (array)json_decode($encode_str);

var_dump($decode_arr);


