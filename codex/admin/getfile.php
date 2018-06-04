<?php
$cover_target_dir = "uploads/photos/";
$cover_target_file = $cover_target_dir . basename($_FILES["cover_file"]["name"]);
$uploadOk = 1;
$cover_FileType = pathinfo($cover_target_file,PATHINFO_EXTENSION);

// Allow certain file formats
if($cover_FileType != "jpg" && $cover_FileType != "jpeg" && $cover_FileType != "png" ) {
    echo "Sorry, only JPG, JPEG, PNG  files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    move_uploaded_file($_FILES["cover_file"]["tmp_name"], $cover_target_file)
}
?>