<?php 
include 'config.php';
$movieid = $_POST['movieid'];
$memberid = $_POST['memberid'];

$query = "INSERT INTO `codex`.`tbl_collection` (`movie_id`, `member_id`, `date`) VALUES ('$movieid', '$memberid', date(NOW()));";

if (mysql_query($query)) {
	echo '<script language="javascript">';
	echo 'alert("Added to collection!");';
	echo 'window.history.back();';
	echo '</script>';
} else {
	echo '<script language="javascript">';
	echo 'alert("ERROR");';
	echo 'window.history.back();';
	echo '</script>';
}
 ?>