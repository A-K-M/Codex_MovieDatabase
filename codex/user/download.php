<?php
	include 'config.php';
	
	$id = $_GET['id'];
	if ($id == '') {
echo '<script language="javascript">';
echo 'alert("Error in adding movie!!");';
echo 'window.history.back();';
echo '</script>';
}else {
$query = mysql_query("SELECT * FROM tbl_movie where id = '$id'") or die(mysql_error());
$getmovie = mysql_fetch_array($query);
$file = $getmovie['link'];
header('Location: ../admin/uploads/movies/'.$file);
}
?>