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
        <h1 class="text-center">Top 10 Most Purchaseed Movies</h1>
      </div>
      <div class="space"></div>
      <div class="container">

        <table class="table table-striped table-responsive table-hover table-bordered" id="upcoming">
          <thead>
            <th>Name</th>
            <th>Released Date</th>
            <th>Genre</th>
            <th>Purchase Count</th>
            <th>Action</th>
          </thead>
          <tbody>
            <?php 
            $gettoprated = mysql_query("SELECT count(p.id) as count , m.* 
                          FROM codex.tbl_purchase p, codex.tbl_movie m 
                          where m.id = p.movie_id 
                          group by p.movie_id 
                          order by count desc limit 10;");
             while ($result = mysql_fetch_array($gettoprated)) {
            ?>
            <tr>
              <td><?php echo $result['name']; ?></td>
              <td><?php echo $result['released_date']; ?></td>
              <td><?php echo $result['genre']; ?></td>
              <td><?php echo $result['count']; ?></td>
              <td><a href="viewmoviedetail.php?id=<?php echo $result['id'];?>" class="btn btn-primary btn-fill btn-sm">View Detail</a></td>
            </tr>
            <?php
             }
            ?>
          </tbody>  
        </table>
        
      </div>
       
      <div class="space"></div>
    </div>
  </body>
 
</html>