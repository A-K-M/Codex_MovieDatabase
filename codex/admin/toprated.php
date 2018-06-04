<?php include '_header.php'; ?>
<?php include 'check_lvl.php'; ?>

<!-- Page Content -->
<!-- Content Head -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h3 class="page-title">Top Rated Movies</h3> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Top Rated Movies</li>
                </ol>
            </div>
        </div>
        <!-- Content Head end-->
        <!-- Content Body -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                <h3 class="box-title">Top Rated Movies</h3>

        <table class="table table-striped table-responsive" id="toprated">
          <thead>
            <th>Name</th>
            <th>Released Date</th>
            <th>Genre</th>
            <th>Rating</th>
          </thead>
          <tbody>
            <?php 
            $gettoprated = mysql_query("select avg(r.rating) as avg, m.* from tbl_rating r, tbl_movie m where m.id = r.movie_id group by r.movie_id order by avg(r.rating) desc");
             while ($result = mysql_fetch_array($gettoprated)) {
            ?>
            <tr>
              <td><?php echo $result['name']; ?></td>
              <td><?php echo $result['released_date']; ?></td>
              <td><?php echo $result['genre']; ?></td>
              <td><?php $avg = number_format($result['avg'] , 1); echo $avg; ?></td>
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
        $('#toprated').dataTable(
        );
      </script>
<footer class="footer text-center"> 2018 &copy; Codex Admin Team </footer>
</div>
</div>
</body>
</html>