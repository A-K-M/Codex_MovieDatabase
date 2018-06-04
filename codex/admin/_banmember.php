<?php 
	include 'config.php';

	$id = $_GET['id'];

    $getmembersql = mysql_query("select * from tbl_member where id = '$id';");
    $result = mysql_fetch_array($getmembersql);
    if ($result['status'] == 1) {
	$update_status = mysql_query("UPDATE `codex`.`tbl_member` SET `status`=0 WHERE `id`='$id';"); 
    }else{
	$update_status = mysql_query("UPDATE `codex`.`tbl_member` SET `status`=1 WHERE `id`='$id';"); 
	}
	if($result['status'] == 1){
	    echo '<script language="javascript">';
	    echo 'alert("This member is now banned! '.$result['status'].'");';
		echo 'window.location="members.php";';
		echo '</script>';
		} else {
		echo '<script language="javascript">';
		echo 'alert("This member is now unbanned!'.$result['status'].'");';
		echo 'window.location="members.php";';
		echo '</script>';
		}

 ?>