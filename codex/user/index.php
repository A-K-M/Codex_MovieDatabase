<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <?php include "_links.php"; ?>
  </head>
  <body>
    <?php include"_nav.php" ?>
    <div class='blurred-container'>
      <div class="img-src" style="background-image: url('assets/img/cover_4.jpg');"></div>
    </div>
    
    <div class="main">
      <div class="container tim-container" style="max-width:800px; padding-top:100px">
        <h1 class="text-center">What's new</h1>
      </div>
      <div class="container">
        <div class="row">
          <?php
          $getrecent6 = mysql_query("SELECT * FROM codex.tbl_movie order by added_date desc limit 6;");
          while ($recent6 = mysql_fetch_array($getrecent6)) {
          ?>
          <div class="col-md-4 col-sm-6">
            <div class="row">
              <div class="col-md-12" style="height:75px;">
                <h4><?php echo $recent6['name'] ?></h4>
              </div>
              <div class="col-md-12">
                <img src="../admin/uploads/photos/<?php echo $recent6['cover']?>" alt="Rounded Image" class="img-rounded" style="width:350px;height:520px;">
              </div>
              <br>
              <div class="col-md-12">
                <a href="viewmoviedetail.php?id=<?php echo $recent6['id']; ?>" class="btn btn-info btn-xs"> View Detail</a>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
      
      <div class="space"></div>
    </div>
  </body>
  
</html>