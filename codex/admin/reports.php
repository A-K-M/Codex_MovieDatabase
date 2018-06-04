<?php include '_header.php'; ?>
<?php include 'check_lvl.php'; ?>
<!-- Page Content -->
<!-- Content Head -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h3 class="page-title">Reports</h3> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Reports</li>
                </ol>
            </div>
        </div>
        <!-- Content Head end-->
        <!-- Content Body -->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="white-box analytics-info">
                            <h3 class="box-title text-center text-primary">Daily Income</h3>
                            <br>
                            <div class="box-title text-center">
                                <a href="#dailyincome" data-toggle="modal" data-target="#dailyincome" data-dismiss="modal" data-backdrop="static"  class="fcbtn btn btn-outline btn-primary btn-1f">View</a>
                            </div>
                            <?php include '_daily_modal.php'; ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="white-box analytics-info">
                            <h3 class="box-title text-center text-info">Monthly Income</h3>
                            <br>
                            <div class="box-title text-center">
                                <a href="#monthlyincome" data-toggle="modal" data-target="#monthlyincome" data-dismiss="modal" data-backdrop="static" class="fcbtn btn btn-outline btn-info btn-1f">View</a>
                            </div>
                            <?php include '_monthly_modal.php'; ?>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="white-box analytics-info">
                            <h3 class="box-title text-center text-warning">Regular Customer</h3>
                            <br>
                            <div class="box-title text-center">
                                <a href="regularcustomer.php" class="fcbtn btn btn-outline btn-warning btn-1f">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="white-box analytics-info">
                            <h3 class="box-title text-center text-danger">Top Rated Movies</h3>
                            <br>
                            <div class="box-title text-center">
                                <a href="toprated.php" class="fcbtn btn btn-outline btn-danger btn-1f">View</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="white-box analytics-info">
                            <h3 class="box-title text-center text-default">Most Purhacsed Movies</h3>
                            <br>
                            <div class="box-title text-center">
                                <a href="mostpurchased.php" class="fcbtn btn btn-outline btn-default btn-1f">View</a>
                            </div>
                        </div>
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