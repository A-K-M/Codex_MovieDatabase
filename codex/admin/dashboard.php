<?php include '_header.php'; ?>
<!-- Content Head -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h3 class="page-title">Dashboard</h3> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#" class="active">Dashboard</a></li>
                </ol>
            </div>
        </div>
        <!-- Content Head end-->
        <!-- Content Body -->
        <?php
    if ($level != 1) {
    ?>

        <div class="row">
            <div class="col-lg-4">
                <div class="white-box analytics-info">
                    <h3 class="box-title text-center text-primary">Movies</h3>
                    <br>
                    <div class="box-title text-center">
                        <a href="movies.php" class="fcbtn btn btn-outline btn-primary btn-1f">View</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="white-box analytics-info">
                    <h3 class="box-title text-center text-info">Casts</h3>
                    <br>
                    <div class="box-title text-center">
                        <a href="casts.php" class="fcbtn btn btn-outline btn-info btn-1f">View</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="white-box analytics-info">
                    <h3 class="box-title text-center text-warning">User Reports</h3>
                    <br>
                    <div class="box-title text-center">
                        <a href="userreport.php" class="fcbtn btn btn-outline btn-warning btn-1f">View</a>
                    </div>
                </div>
            </div>
        </div>
     <?php
    } else{
    ?>

<div class="row">
            <div class="col-lg-4">
                <div class="white-box analytics-info">
                    <h3 class="box-title text-center text-primary">Members</h3>
                    <br>
                    <div class="box-title text-center">
                        <a href="members.php" class="fcbtn btn btn-outline btn-primary btn-1f">View</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="white-box analytics-info">
                    <h3 class="box-title text-center text-info">Staffs</h3>
                    <br>
                    <div class="box-title text-center">
                        <a href="staffs.php" class="fcbtn btn btn-outline btn-info btn-1f">View</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="white-box analytics-info">
                    <h3 class="box-title text-center text-success">TopUp Codes</h3>
                    <br>
                    <div class="box-title text-center">
                        <a href="topup.php" class="fcbtn btn btn-outline btn-success btn-1f">View</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="white-box analytics-info">
                    <h3 class="box-title text-center text-danger">Reports</h3>
                    <br>
                    <div class="box-title text-center">
                        <a href="reports.php" class="fcbtn btn btn-outline btn-danger btn-1f">View</a>
                    </div>
                </div>
            </div>
            
            
        </div>
        <?php
    }
    ?>
    

        <!-- Content Body end -->
    </div>
    <!-- /.container-fluid -->
<footer class="footer text-center"> 2018 &copy; Codex Admin Team </footer>
</div>
<!-- End Page Content -->
</div>
<!-- /#wrapper -->
</body>
</html>