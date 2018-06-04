<?php 
include 'config.php';

$id = $_GET['id'];

$query = "DELETE FROM `codex`.`tbl_collection` WHERE `id`='$id';";

if (mysql_query($query)) {
	echo '<script language="javascript">';
	echo 'alert("Removed from collection!");';
	echo 'window.history.back();';
	echo '</script>';
} else {
	echo '<script language="javascript">';
	echo 'alert("ERROR");';
	echo 'window.history.back();';
	echo '</script>';
}
 ?>