<div class="modal fade" id="newcast" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style="text-align: center;">New Cast</h3>
                <hr />
                <form class="form-horizontal form-material" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-12">Birth Name</label>
                        <div class="col-md-12">
                            <input type="text" name="birth_name" placeholder="Birth Name" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Stage Name</label>
                        <div class="col-md-12">
                            <input type="text" name="stage_name" placeholder="Stage Name" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Date of Birth</label>
                        <div class="col-md-12">
                            <input type="date" name="dob" placeholder="Date of Birth" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Photo</label>
                        <div class="col-md-12">
                            <input type="file" class="form-control form-control-line" name="photo_file" id="photo_file" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12 form-check-label">Biography</label>
                        <div class="col-md-12">
                            <textarea rows="5" required class="form-control form-control-line" placeholder="Biography" name="bio">
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-4">
                            <button class="btn btn-info" type="submit" name="Create" >Create</button>
                        </div>
                    </div>
                </form>
                <?php
                if(isset($_POST['Create'])){
                $birth_name = $_POST['birth_name'];
                $stage_name = $_POST['stage_name'];
                $dob = $_POST['dob'];
                $bio = $_POST['bio'];

                $photo_target_dir = "uploads/photos/";
                $photo_target_file = $photo_target_dir . basename($_FILES["photo_file"]["name"]);
                $uploadOk = 1;
                $photo_FileType = pathinfo($photo_target_file,PATHINFO_EXTENSION);
                if($photo_FileType != "jpg" && $photo_FileType != "jpeg" && $photo_FileType != "png" ) {
                echo "Sorry, only JPG, JPEG, PNG  files are allowed.";
                $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                } else {
                move_uploaded_file($_FILES["photo_file"]["tmp_name"], $photo_target_file);
                }
                $photo = basename( $_FILES["photo_file"]["name"]);

                $newcastquery = mysql_query("INSERT INTO `codex`.`tbl_cast` (`birth_name`, `stage_name`, `dob`, `bio`, `photo`) VALUES ('$birth_name', '$stage_name', '$dob', '$bio', '$photo');");
                
                echo '<script language="javascript">';
                echo 'alert("New Cast Added!!");';
                echo 'window.history.back();';
                echo '</script>';
                
                }
                ?>
            </div>
        </div>
    </div>
</div>