<?php
if(!isset($_SESSION['member'])){
	echo '<script language="javascript">';
	echo 'alert("Log In first!!");';
	echo 'window.location="index.php";';
	echo '</script>';
	exit();
	}
?>