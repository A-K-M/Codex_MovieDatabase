<?php include '_header.php'; ?>
<!-- check admin level -->
<?php include 'check_lvl.php'; ?>

<!-- Page Content -->
<!-- Content Head -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h3 class="page-title">Staffs</h3> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Staffs</li>
                </ol>
            </div>
        </div>
        <!-- Content Head end-->
        <!-- Content Body -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title">Staffs <a href="newstaff.php" class="btn btn-info pull-right">New Staff</a></h3> <br>
                    <?php
                    $getadminsql = mysql_query("select * from tbl_admin where username != '$username';");
                    ?>
                    <table class="table table-hover table-striped table-responsive" id="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fullname</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Level</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($result = mysql_fetch_array($getadminsql)){  ?>
                            <tr>
                                <td><?php echo $result['id']; ?></td>
                                <td><?php echo $result['name']; ?></td>
                                <td><?php echo $result['username']; ?></td>
                                <td><?php echo $result['email']; ?></td>
                                <td><?php echo $result['address']; ?></td>
                                <td><?php echo $result['phone']; ?></td>
                                <?php
                                if ($result['status'] == 1) {
                                $status = 'Ban';
                                }else
                                $status = 'Unban';
                                ?>
                                <?php
                                if ($result['level'] == 1) {
                                $level = 'Admin';
                                $banstatus = "can't Ban!";
                                }else{
                                $level = 'Staff';
                                $banstatus = "<a href='_banstaff.php?staffid=".$result['id']."'>".$status."</a>";
                                }
                                
                                ?>
                                <td><?php echo $level; ?></td>
                                
                                <?php
                                ?>
                                <td>
                                    <?php echo $banstatus; ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
        $('#table').dataTable(
        );
        </script>
        <!-- Content Body end -->
    </div>
<footer class="footer text-center"> 2018 &copy; Codex Admin Team </footer>
</div>
</div>
</body>
</html>