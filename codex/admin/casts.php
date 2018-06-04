<?php include '_header.php'; ?>
<?php include 'check_admin_level.php'; ?>

<!-- Page Content -->
<!-- Content Head -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h3 class="page-title">Casts</h3> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Casts</li>
                </ol>
            </div>
        </div>
        <!-- Content Head end-->
        <!-- Content Body -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <?php 
                    $getcasts = mysql_query("SELECT * FROM codex.tbl_cast;");
                     ?>
                <h3 class="box-title">
                    Casts 
                    <a href="#newcast" data-toggle="modal" data-target="#newcast" data-dismiss="modal" data-backdrop="static"  class="btn btn-info pull-right">New Cast</a>
                    <?php include '_newcast_modal.php'; ?>
                </h3> <br>
                <table class="table table-hover table-striped table-responsive" id="table">
                        <thead>
                            <tr>
                                <th>Stage Name</th>
                                <th>Birth Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($result = mysql_fetch_array($getcasts)){  ?>
                            <tr>
                                <td><?php echo $result['stage_name']; ?></td>
                                <td><?php echo $result['birth_name']; ?></td>
                                <td><a href='viewcast.php?id=<?php echo $result['id'];?>' class="btn btn-primary btn-sm"  >Edit</a></td>
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