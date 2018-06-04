<?php include '_header.php'; ?>
<?php include 'check_admin_level.php'; ?>

<!-- Page Content -->
<!-- Content Head -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h3 class="page-title">Users' Reports</h3> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Users' Reports</li>
                </ol>
            </div>
        </div>
        <!-- Content Head end-->
        <!-- Content Body -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <?php 
                    $getreports = mysql_query("SELECT * FROM codex.tbl_report;");
                     ?>
                <h3 class="box-title">Users' Reports
                </h3> <br>
                <table class="table table-hover table-striped table-responsive" id="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Type</th>
                                <td>Sender</td>
                                <td>Reply</td>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($result = mysql_fetch_array($getreports)){  ?>
                            <tr>
                                <td><?php echo $result['id']; ?></td>
                                <td><?php echo $result['type']; ?></td>
                                <td><?php echo $result['email']; ?></td>
                                <?php 
                                    $is_replyed =$result['is_replyed'];
                                    if ($is_replyed == 0) {
                                        $status = 'No';
                                    }else{
                                        $status = 'Yes';
                                    }
                                 ?>
                                <td><?php echo $status ?></td>

                                <td><a href='viewuserreport.php?id=<?php echo $result['id'];?>' class="btn btn-primary btn-sm"  >View</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                </table>
                </div>
            </div>
        </div>
        <!-- Content Body end -->
    </div>
<footer class="footer text-center"> 2018 &copy; Codex Admin Team </footer>
</div>
</div>
</body>
<script>
        $('#table').dataTable(
        );
        </script>
</html>