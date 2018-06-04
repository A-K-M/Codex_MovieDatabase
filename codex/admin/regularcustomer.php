<?php include '_header.php'; ?>
<?php include 'check_lvl.php'; ?>

<!-- Page Content -->
<!-- Content Head -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h3 class="page-title">Regular Customers</h3> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Regular Customers</li>
                </ol>
            </div>
        </div>
        <!-- Content Head end-->
        <!-- Content Body -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                <h3 class="box-title">Regular Customers</h3> 
                <table class="table table-striped table-responsive" id="regular">
          <thead>
            <th>ID</th>
            <th>Username</th>
            <th>Current Balance</th>
            <th>Purchase Count</th>
            <th>Total</th>
          </thead>
          <tbody>
            <?php 
            $getregular = mysql_query("select count(p.id) as count,sum(m.price) total, me.* from tbl_purchase p, tbl_member me, tbl_movie m where p.member_id = me.id and p.movie_id = m.id group by p.member_id;");
             while ($result = mysql_fetch_array($getregular)) {
            ?>
            <tr>
              <td><?php echo $result['id']; ?></td>
              <td><?php echo $result['username']; ?></td>
              <td><?php echo $result['balance']; ?></td>
              <td><?php echo $result['count']; ?></td>
              <td><?php echo $result['total']; ?></td>

            </tr>
            <?php
             }
            ?>
          </tbody>  
        </table>
                </div>
            </div>
        </div>
        <!-- Content Body end -->
    </div>
    <script>
        $('#regular').dataTable(
        );
      </script>
<footer class="footer text-center"> 2018 &copy; Codex Admin Team </footer>
</div>
</div>
</body>
</html>