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
                    <h3 class="box-title text-lg" style="text-align: center;">Cast information</h3> <hr>
                    <div class="row">
                        
                        <?php
                        $getcast = mysql_fetch_array(mysql_query("SELECT * FROM tbl_cast WHERE id= $id"));
                        ?>
                        <form class="form-horizontal form-material" method="post" enctype="multipart/form-data">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="hidden" placeholder="Time" class="form-control form-control-line" name="id"  value="<?php echo $getcast['id'] ?>">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <img src="uploads/photos/<?php echo $getcast['photo']?>" alt="" class="img-rounded" style="width:300px;height:400px;">
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="col-md-12">Stage Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Stage Name" class="form-control form-control-line" name="stage_name" value="<?php echo $getcast['stage_name'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Birth Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Time" class="form-control form-control-line" name="birth_name" value="<?php echo $getcast['birth_name'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Date of Birth</label>
                                    <div class="col-md-12">
                                        <input type="date" placeholder="date" class="form-control form-control-line" name="dob" value="<?php echo $getcast['dob'] ?>" readonly>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <
                            <div class="col-md-12">
                               
                                <div class="form-group">
                                    <br>
                                    <label class="col-md-12">Biography</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control form-control-line" placeholder="Decription" name="bio"><?php echo $getcast['bio'] ?></textarea>
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
                        <?php include '_synopsis_modal.php'; ?>


                        <?php
                        if(isset($_POST['update'])) {
                        $id = $_POST['id'];
                        $stage_name = $_POST['stage_name'];
                        $bio = $_POST['bio'];
                        
                        $updatecast = mysql_query("UPDATE `codex`.`tbl_cast` SET `stage_name`='$stage_name', `bio`='$bio' WHERE `id`='$id';");
                        if($updatecast){
                        echo '<script language="javascript">';
                        echo 'alert("Cast Updated!!");';
                        echo 'window.location="casts.php";';
                        echo '</script>';
                        } else {
                        echo '<script language="javascript">';
                        echo 'alert("Error!!");';
                        echo 'window.location="casts.php";';
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