<?php include '_header.php'; ?>
<?php include 'check_lvl.php'; ?>

<!-- Page Content -->
<!-- Content Head -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h3 class="page-title">Members</h3> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Members</li>
                </ol>
            </div>
        </div>
        <!-- Content Head end-->
        <!-- Content Body -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                <h3 class="box-title">Members</h3> <br>
                <?php
                    $getmembersql = mysql_query("select * from tbl_member;")
                    ?>
                    <table class="table table-hover table-striped table-responsive" id="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Balance</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($result = mysql_fetch_array($getmembersql)){ ?>
                            <tr>
                                <td><?php echo $result['id']; ?></td>
                                <td><?php echo $result['name']; ?></td>
                                <td><?php echo $result['username']; ?></td>
                                <td><?php echo $result['email']; ?></td>
                                <td><?php echo $result['balance']; ?></td>
                                <?php
                                    if ($result['status'] == 1) {
                                    $status = 'Ban';
                                    }else
                                    $status = 'Unban';
                                ?>
                                <td> 
                                    <a href="_banmember.php?id=<?php echo $result['id']; ?>"><?php echo $status ?></a>
                                </td>
                                <td>
                                    <a href="viewmember.php?id=<?php echo $result['id']; ?>" class="btn btn-primary btn-sm" > View Info </a>
                                </td>
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
<script>
        $('#table').dataTable(
        );
        </script>
</body>
</html>