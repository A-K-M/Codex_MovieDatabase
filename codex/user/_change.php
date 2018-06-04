<?php
include 'config.php';
$username  = $_POST['username'];
$password = $_POST['password'];
$password1 = $_POST['password1'];
$hashed = md5($password);
if ($password !== $password1) {
echo '<script language="javascript">';
echo 'alert("Password not match!");';
echo 'window.location="profile.php";';
echo '</script>';
} else  {
$change = "UPDATE `codex`.`tbl_member` SET `password`='$hashed' WHERE `username`='$username';";
if(mysql_query($change)){
echo '<script language="javascript">';
echo 'alert("password successfully updated!");';
echo 'window.location="index.php";';
echo '</script>';
} else {
echo '<script language="javascript">';
echo 'alert("Error Updating!");';
echo 'window.location= "index.php";';
echo '</script>';
}
}


?>