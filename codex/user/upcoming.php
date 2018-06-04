<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <?php include "_links.php"; ?>
  </head>
  <body>
    <?php include"_nav.php" ?>
    <div class='blurred-container-mo'>
        <div class="img-src" style="background-image: url('assets/img/cover.jpg');"></div>
    </div>
    
    <div class="main">
      <div class="container tim-container" style="max-width:800px; padding-top:100px">
        <h1 class="text-center">Upcoming Movies</h1>
      </div>
      <div class="space"></div>
      <div class="container">

        <table class="table table-striped table-responsive table-hover table-bordered" id="upcoming">
          <thead>
            <th>Name</th>
            <th>Released Date</th>
            <th>Genre</th>
            <th>Action</th>
          </thead>
          <tbody>
            <?php 
            $getupcoming = mysql_query("SELECT * FROM codex.tbl_movie where released_date > Date(now());");
             while ($result = mysql_fetch_array($getupcoming)) {
            ?>
            <tr>
              <td><?php echo $result['name']; ?></td>
              <td><?php echo $result['released_date']; ?></td>
              <td><?php echo $result['genre']; ?></td>
              <td><a href="viewmoviedetail.php?id=<?php echo $result['id'];?>" class="btn btn-primary btn-fill btn-sm">View Detail</a></td>
            </tr>
            <?php
             }
            ?>
          </tbody>  
        </table>
        
      </div>
       <script>
        $('#upcoming').dataTable(
        );
      </script>
      <div class="space"></div>
    </div>
  </body>
  
</html>