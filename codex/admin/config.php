<?php
$host='localhost';
$user='root';
$pass='';
$db='codex';
$con = mysql_connect($host,$user,$pass)
		or die("Can't Connect to Database!!");
mysql_select_db($db,$con);
?>