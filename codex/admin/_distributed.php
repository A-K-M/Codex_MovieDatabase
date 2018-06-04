<?php 	
	include 'config.php';
	$id = $_GET['code_id'];
	$update_distributed = "UPDATE `codex`.`tbl_topup` SET `is_distributed`='1' WHERE `id`='$id';"; 

	if(mysql_query($update_distributed)){
	    echo '<script language="javascript">';
	    echo 'alert("Top-up code Distributed!");';
		echo 'window.location="topup.php";';
		echo '</script>';
		} else {
		echo '<script language="javascript">';
		echo 'alert("Error!'.$update_distributed.'");';
		echo 'window.location="topup.php";';
		echo '</script>';
		}
 ?>