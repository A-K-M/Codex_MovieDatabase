<?php include '_header.php'; ?>
<?php include 'check_lvl.php'; ?>

<!-- Page Content -->
<!-- Content Head -->
<?php 
    
    if (!$_POST['date']) {
        echo '<script language="javascript">';
        echo 'alert("Pick a date first!!");';
        echo 'window.location="reports.php";';
        echo '</script>';
    }
    $date = $_POST['date'];
    
 ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h3 class="page-title">Daily Income</h3> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Daily Income</li>
                </ol>
            </div>
        </div>
        <!-- Content Head end-->
        <!-- Content Body -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                <h3 class="box-title">Daily Income</h3> 
                <hr>
                <?php 
                    $dailyincome = mysql_fetch_array(mysql_query("select sum(m.price) as income from tbl_purchase p, tbl_movie m where p.movie_id = m.id and p.date = '$date';"));
                    $income = $dailyincome['income'];
                    $query = mysql_query("select  p.id, m.name, m.price, m.genre, me.username from tbl_purchase p, tbl_movie m , tbl_member me where p.movie_id = m.id and p.member_id = me.id and p.date = '$date';");
                 ?>
                <h4 class="box-title text-center">Total Income : <?php echo $income ?></h4> 
                <hr>
                 <table class="table table-striped table-responsive table-hover" id="daily">
                     <thead>
                         <th>ID</th>
                         <th>Movie Name</th>
                         <th>Genre</th>
                         <th>Price</th>
                         <th>Purchased By</th>
                     </thead>
                     <tbody>
                        <?php while ( $dailyrecord = mysql_fetch_array($query)) { ?>
                         <tr>
                             <td><?php echo $dailyrecord['id'] ?></td>
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