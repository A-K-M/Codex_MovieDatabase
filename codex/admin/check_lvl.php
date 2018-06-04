<?php 
	$level = $_SESSION['level'];
	if ($level == 2) {
		echo '<script language="javascript">';
		echo 'alert("You have no access for this page!");';
		echo 'window.history.back();';
		echo '</script>';
	}
 ?>