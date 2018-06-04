<?php
session_start();
   
if(!isset($_SESSION['admin'])){
	echo '<script language="javascript">';
	echo 'alert("Log In first!!");';
	echo 'window.location="login.php";';
	echo '</script>';
	exit();
	}
?>