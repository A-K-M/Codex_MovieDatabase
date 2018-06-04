<?php 
	include 'config.php';

	$id = $_GET['staffid'];

    $getadminsql = mysql_query("select * from tbl_admin where id = '$id';");
    $result = mysql_fetch_array($getadminsql);
    if ($result['status'] == 1) {
	$update_status = mysql_query("UPDATE `codex`.`tbl_admin` SET `status`=0 WHERE `id`='$id';"); 
    }else{
	$update_status = mysql_query("UPDATE `codex`.`tbl_admin` SET `status`=1 WHERE `id`='$id';"); 
	}
	if($result['status'] == 1){
	    echo '<script language="javascript">';
	    echo 'alert("This staff is now banned!");';
		echo 'window.location="staffs.php";';
		echo '</script>';
		} else {
		echo '<script language="javascript">';
		echo 'alert("This staff is now unbanned!");';
		echo 'window.location="staffs.php";';
		echo '</script>';
		}

 ?>