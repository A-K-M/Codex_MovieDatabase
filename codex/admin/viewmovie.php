<?php include '_header.php'; ?>
<?php include 'check_admin_level.php'; ?>

<?php $id = $_GET['id'] ?>
<!-- Page Content -->
<!-- Content Head -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h3 class="page-title">Edit movie</h3> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">New movie</li>
                </ol>
            </div>
        </div>
        <!-- Content Head end-->
        <!-- Content Body -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title text-lg" style="text-align: center;">Movie information</h3> <hr>
                    <div class="row">
                        
                        <?php
                        $getmovie = mysql_fetch_array(mysql_query("SELECT * FROM tbl_movie WHERE id= $id"));
                        ?>
                        <div class="col-md-2"></div>
                        <div class="col-md-6">
                                <div class="form-group">
                                <a href="#addsynopsis" data-toggle="modal" data-target="#addsynopsis" data-dismiss="modal" data-backdrop="static"  class="btn btn-info btn-sm"  >Add Synopsis</a>
                                
                                <a href="#addcast" data-toggle="modal" data-target="#addcast" data-dismiss="modal" data-backdrop="static"  class="btn btn-primary btn-sm pull-right"  >Add Cast</a>
                                </div>
                        <?php include '_addcast_modal.php'; ?>
                        </div>
                        <div class="col-md-4">
                            
                        </div>
                        <form class="form-horizontal form-material" method="post" enctype="multipart/form-data">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="hidden" placeholder="Time" class="form-control form-control-line" name="id"  value="<?php echo $getmovie['id'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12">Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Movie Name" class="form-control form-control-line" name="name" value="<?php echo $getmovie['name'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Run Time</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Time" class="form-control form-control-line" name="runtime" value="<?php echo $getmovie['runtime'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">File</label>
                                    <div class="col-md-12">
                                        <input type="file" class="form-control form-control-line" name="movie_file" id="movie_file">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12">Released Date</label>
                                    <div class="col-md-12">
                                        <input type="date" placeholder="date" class="form-control form-control-line" name="releaseddate" value="<?php echo $getmovie['released_date'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Genre</label>
                                    <div class="col-md-12">
                                        <select name="genre" class="form-control form-control-line" >
                                            <option value="Action">Action</option>
                                            <option value="Adventure">Adventure</option>
                                            <option value="Comedy">Comedy</option>
                                            <option value="Crime">Crime</option>
                                            <option value="Drama">Drama</option>
                                            <option value="History">History</option>
                                            <option value="Horror">Horror</option>
                                            <option value="Science Fiction">Science Fiction</option>
                                            <option value="War">War</option>
                                            <option value="Western">Western</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Cover</label>
                                    <div class="col-md-12">
                                        <input type="file" placeholder="cover" class="form-control form-control-line" name="cover_file" id="cover_file">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-12">Price</label>
                                    <div class="col-md-12">
                                        <input type="number" placeholder="1000" class="form-control form-control-line" name="price" value="<?php echo $getmovie['price'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Description</label>
                                    <div class="col-md-12">
                                        <textarea rows="3" class="form-control form-control-line" placeholder="Decription" name="description"><?php echo $getmovie['description'] ?></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-md-5"></div>
                                    <div class="col-sm-5">
                                        <button class="btn btn-success" type="submit" name="update" >Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>

    <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default ">
              <div class="panel-heading">
                <h4 class="panel-title">
                <a data-toggle="collapse" href="#crews">
                  Crews
                </a>
                </h4>
              </div>
              <div id="crews" class="panel-collapse collapse">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-12">
                        <?php 
                            $getcrew = mysql_query("select * from tbl_crew where movie_id = $id"); 
                        ?>
                    <table id='crewstable' class="table table-striped table-bordered table-responsive">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Cast Name</th>
                        <th>Role</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php while ($crewinfo = mysql_fetch_array($getcrew)){  ?>
                        <tr>
                        <?php 
                            $castid = $crewinfo['cast_id'];
                            $getcastname = mysql_fetch_array( mysql_query("select * from tbl_cast where id= $castid"));
                            $castname = $getcastname['stage_name'];
                        ?>
                            <input type="hidden" placeholder="Time" class="form-control form-control-line" name="crewid"  value="<?php echo $crewinfo['id'] ?>">

                        <td><?php echo $crewinfo['id'] ?></td>
                        <td><?php echo $castname ?></td>
                        <td>
                            <a href="addrole.php?id=<?php echo $crewinfo['id'] ?>" class="btn btn-danger btn-sm"  >Add Role</a>
                            

                        
                    </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
                        <?php include '_synopsis_modal.php'; ?>


                        <?php
                        if(isset($_POST['update'])) {
                        $id = $_POST['id'];
                        $type = $_POST['type'];
                        $name = $_POST['name'];
                        $releaseddate = $_POST['releaseddate'];
                        $runtime = $_POST['runtime'];
                        $genre = $_POST['genre'];
                        $price = $_POST['price'];
                        $description = $_POST['description'];
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
                        // check unique username, email, genre, password match
                        
                        $newmovie = mysql_query("UPDATE `codex`.`tbl_movie` SET 
                            `name`='$name', 
                            `released_date`='$releaseddate', 
                            `description`='$description', 
                            `runtime`='$runtime', 
                            `genre`='$genre', 
                            `price`='$price ', 
                            `link`='$link', 
                            `cover`='$cover' 
                            WHERE `id`='$id';
                            ");
                        if($newmovie){
                        echo '<script language="javascript">';
                        echo 'alert("New Movie added!");';
                        echo 'window.location="movies.php";';
                        echo '</script>';
                        } else {
                        echo '<script language="javascript">';
                        echo 'alert("Error in adding movie!!");';
                        echo 'window.location="movies.php";';
                        echo '</script>';
                        }
                        
                        }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Body end -->
    </div>
<footer class="footer text-center"> 2018 &copy; Codex Admin Team </footer>
</div>
</div>
</body>
</html>