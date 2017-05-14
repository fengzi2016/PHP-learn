<?php
@session_start();
/*$_SESSION['islogin']="what";
echo"I am login";
echo "password".md5("qwert")//加密;*/
$_SESSION["islogin"]="YES";
echo "<script type=\"text/javascript\">\n";
echo "location.href='../index11.php';\n";
echo "</script>\n";
?>
