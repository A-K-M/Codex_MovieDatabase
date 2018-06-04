<?php include '_header.php'; ?>
<?php include 'check_admin_level.php'; ?>

<!-- Page Content -->
<!-- Content Head -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h3 class="page-title">Reply Report</h3> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Reply Report</li>
                </ol>
            </div>
        </div>
        <!-- Content Head end-->
        <!-- Content Body -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                <h3 class="box-title">Reply Report</h3> 
                <?php $id = $_GET['id'] ;
                $r = mysql_fetch_array(mysql_query("select * from tbl_report where id = $id"));

                ?>

                <form class="form-horizontal form-material" method="post" action="mail.php"c>
                    <div class="form-group">
                        <input type="text" hidden value="<?php echo $r['id'] ?>" name='id'>
                        <input type="text" hidden value="<?php echo $admin_id ?>" name='admin_id'>

                    </div>
                        <div class="form-group">
                                <label class="col-md-12">From : </label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Email" class="form-control form-control-line" name="toid" value="<?php echo $r['email'] ?>" readonly required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">About : </label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Type" class="form-control form-control-line" name="subject" value="<?php echo $r['type'] ?>" readonly required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Content : </label>
                                <div class="col-md-12">
                                    <p><?php echo $r['content'] ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Reply : </label>
                                <div class="col-md-12">
                                    <textarea rows="5" class="form-control form-control-line" placeholder="Reply" name="message" id="message">
                            </textarea>
                                </div>
                            </div>
                    <div class="form-group">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-4">
                            <button class="btn btn-info" type="submit" name="send" >Reply</button>
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
</body>
</html>