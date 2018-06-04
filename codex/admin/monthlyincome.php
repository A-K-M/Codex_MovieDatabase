<?php include '_header.php'; ?>
<?php include 'check_lvl.php'; ?>

<!-- Page Content -->
<!-- Content Head -->
<?php 
    
    if (!$_POST['fromdate'] || !$_POST['todate']) {
        echo '<script language="javascript">';
        echo 'alert("Pick the dates first!!");';
        echo 'window.location="reports.php";';
        echo '</script>';
    }
    $fromdate = $_POST['fromdate'];
    $todate = $_POST['todate'];
 ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h3 class="page-title">Monthly Income</h3> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Monthly Income</li>
                </ol>
            </div>
        </div>
        <!-- Content Head end-->
        <!-- Content Body -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                <h3 class="box-title">Monthly Income</h3> 
                <hr>
                <?php 
                    $dailyincome = mysql_fetch_array(mysql_query("select sum(m.price) as income from tbl_purchase p, tbl_movie m where p.movie_id = m.id and p.date between '$fromdate' and '$todate';;"));
                    $income = $dailyincome['income'];
                    $query = mysql_query("select  p.id, p.date, m.name, m.price, m.genre, me.username from tbl_purchase p, tbl_movie m , tbl_member me where p.movie_id = m.id  and p.member_id = me.id and p.date between '$fromdate' and '$todate';");
                 ?>
                <h4 class="box-title text-center">Total Income : <?php echo $income ?></h4> 
                <hr>
                 <table class="table table-striped table-responsive table-hover" id="daily">
                     <thead>
                         <th>ID</th>
                         <th>Purchased Date</th>
                         <th>Movie Name</th>
                         <th>Genre</th>
                         <th>Price</th>
                         <th>Purchased By</th>

                     </thead>
                     <tbody>
                        <?php while ( $dailyrecord = mysql_fetch_array($query)) { ?>
                         <tr>
                             <td><?php echo $dailyrecord['id'] ?></td>
                             <td><?php echo $dailyrecord['date'] ?></td>
                             <td><?php echo $dailyrecord['name'] ?></td>
                             <td><?php echo $dailyrecord['genre'] ?></td>
                             <td><?php echo $dailyrecord['price'] ?></td>
                             <td><?php echo $dailyrecord['username'] ?></td>
                         </tr>
                         <?php } ?>
                     </tbody>
                 </table>
                </div>
            </div>
        </div>
        <!-- Content Body end -->
    </div>
    <script>
        $('#daily').dataTable(
        );
        </script>
<footer class="footer text-center"> 2018 &copy; Codex Admin Team </footer>
</div>
</div>
</body>
</html>