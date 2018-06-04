<?php include '_header.php'; ?>
<!-- Page Content -->
<!-- Content Head -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h3 class="page-title">Profile</h3> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Profile</li>
                </ol>
            </div>
        </div>
        <!-- Content Head end-->
        <!-- Content Body -->
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <?php
                $query = mysql_query("SELECT * FROM tbl_admin WHERE username = '$username'");
                $r = mysql_fetch_array($query);
                ?>
                <div class="white-box">
                    <div class="user-bg">
                        <div class="overlay-box">
                            <div class="user-content">
                                <a href="javascript:void(0)"><img src="plugins/images/users/user.png" class="thumb-lg img-circle" alt="img"></a>
                                <h4 class="text-white"> <?php echo $username ?> </h4>
                            <h5 class="text-white"><?php echo $r['email'] ?></h5> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xs-12">
                <div class="white-box">
                    <form class="form-horizontal form-material" method="post">
                        <div class="form-group">
                            <input type="text" name="id" value="<?php echo $r['id'] ?>" hidden>
                            <label class="col-md-12">Full Name</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Full Name" class="form-control form-control-line" name="name" value="<?php echo $r['name'] ?>"> </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" placeholder="Email" class="form-control form-control-line" name="email" value="<?php echo $r['email'] ?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="123 456 7890" class="form-control form-control-line" name="phone" value="<?php echo $r['phone'] ?>" maxlength = '11'> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Address</label>
                                        <div class="col-md-12">
                                            <textarea rows="3" class="form-control form-control-line" name="address"> <?php echo $r['address'] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-9">
                                            <button class="btn btn-success" type="submit" name="update" >Update Profile</button>
                                            <?php
                                            if(isset($_POST['update']))
                                            {
                                            $id = mysql_real_escape_string($_POST['id']);
                                            $name = mysql_real_escape_string($_POST['name']);
                                            $email = mysql_real_escape_string($_POST['email']);
                                            $phone = mysql_real_escape_string($_POST['phone']);
                                            $address = mysql_real_escape_string($_POST['address']);
                                            
                                            $sql = "UPDATE tbl_admin SET name='$name', email='$email', phone='$phone', address='$address' WHERE id=$id;";
                                            if(mysql_query($sql)){
                                            echo '<script language="javascript">';
                                            echo 'alert("Profile successfully updated!'.$sql.'");';
                                            echo 'window.location="profile.php";';
                                            echo '</script>';
                                            
                                            } else {
                                            echo '<script language="javascript">';
                                            echo 'alert("Error Updating!");';
                                            echo 'window.location="profile.php";';
                                            echo '</script>';
                                            }
                                            }
                                            ?>
                                        </div>
                                        <div class="col-sm-3">
                                            <a href="#change" data-toggle="modal" data-target="#change" data-dismiss="modal" data-backdrop="static" class="btn btn-info"> Change Password</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Content Body end -->
            </div>
        <footer class="footer text-center"> 2018 &copy; Codex Admin Team </footer>
    </div>
</div>
<div class="modal fade" id="change" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 style="text-align: center;">Change Password</h4>
                <hr />
                <form class="form-horizontal form-material" method="post">
                    <input type="text" name="id" value="<?php echo $r['id'] ?>" hidden>
                    <div class="form-group">
                        <label class="col-md-12">Old Password</label>
                        <div class="col-md-12">
                            <input type="password" placeholder="*********" class="form-control form-control-line" name="old">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">New Password</label>
                        <div class="col-md-12">
                            <input type="password" placeholder="*********" class="form-control form-control-line" name="new">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Confirm New Password</label>
                        <div class="col-md-12">
                            <input type="password" placeholder="*********" class="form-control form-control-line" name="new1">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <button class="btn btn-info" type="submit" name="change" >Update Password</button>
                        </div>
                </form>
                    <?php
                    if(isset($_POST['change'])){
                    $id  = mysql_real_escape_string($_POST['id']);
                    $old = mysql_real_escape_string($_POST['old']);
                    $new = mysql_real_escape_string($_POST['new']);
                    $new1 = mysql_real_escape_string($_POST['new1']);
                    $oldh = md5($old);

                    if ($new !== $new1) {
                    echo '<script language="javascript">';
                    echo 'alert("Password not match!");';
                    echo 'window.location="profile.php";';
                    echo '</script>';
                    } else {
                    $oldq = mysql_query("SELECT * FROM tbl_admin WHERE id = '$id'");
                    $pw = mysql_fetch_array($oldq);
                    if ($oldh !== $pw['password']) {
                    echo '<script language="javascript">';
                    echo 'alert("Old password is incorrect!");';
                    echo 'window.location="profile.php";';
                    echo '</script>';
                    } else {
                        $newh = md5($new);
                    $change = "UPDATE `codex`.`tbl_admin` SET `password`='$newh' WHERE `id`='$id';";
                    if(mysql_query($change)){
                    echo '<script language="javascript">';
                    echo 'alert("Password successfully updated!");';
                    echo 'window.location="profile.php";';
                    echo '</script>';
                    } else {
                    echo '<script language="javascript">';
                    echo 'alert("Error Updating!");';
                    echo 'window.location="profile.php";';
                    echo '</script>';
                    }
                    }
                    }
                    }
                    ?>
            </div>
        </div>
    </div>
</div>
    </body>
</html>