<?php
@session_start();
$_SESSION["islogin"] = "YES";

echo "<script type=\"text/javascript\">\n";
echo "location.href='index.php';\n";
echo "</script>\n";