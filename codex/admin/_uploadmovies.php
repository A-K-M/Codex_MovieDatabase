<?php
include 'config.php';
$type = $_POST['type'];
$name = $_POST['name'];
$releaseddate = $_POST['releaseddate'];
$runtime = $_POST['runtime'];
$genre = $_POST['genre'];
$price = $_POST['price'];
$decription = mysql_real_escape_string($_POST['decription']) ;
//movie file upload

$target_dir = "uploads/movies/";
$target_file = $target_dir . basename($_FILES["movie_file"]["name"]);
$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
if (file_exists($target_file)) {
$uploadOk = 0;
}
if($FileType != "zip" && $FileType != "rar" ) {
$uploadOk = 0;
}
if ($uploadOk == 0) {
echo "Sorry, your file was not uploaded.";
} else {
move_uploaded_file($_FILES["movie_file"]["tmp_name"], $target_file);
}
//cover upload
$cover_target_dir = "uploads/photos/";
$cover_target_file = $cover_target_dir . basename($_FILES["cover_file"]["name"]);
$uploadOk = 1;
$cover_FileType = pathinfo($cover_target_file,PATHINFO_EXTENSION);
if($cover_FileType != "jpg" && $cover_FileType != "jpeg" && $cover_FileType != "png" ) {
    echo "Sorry, only JPG, JPEG, PNG  files are allowed.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    move_uploaded_file($_FILES["cover_file"]["tmp_name"], $cover_target_file);
}
 

$link = basename( $_FILES["movie_file"]["name"]);
$cover = basename( $_FILES["cover_file"]["name"]);

$newmovie = mysql_query("INSERT INTO `codex`.`tbl_movie` (`name`, `type`, `released_date`, `description`, `runtime`, `genre`, `price`, `link`,`cover`,`added_date`) VALUES ('$name', '$type', '$releaseddate', '$decription', '$runtime', '$genre', '$price', '$link', '$cover',date(now()));");
if($newmovie){
echo '<script language="javascript">';
echo 'alert("New Movie added!");';
echo 'window.location="movies.php";';
echo '</script>';

} else {
echo '<script language="javascript">';
echo 'alert("Error in adding movie!");';
echo 'window.location="movies.php";';
echo '</script>';


}



?>