<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <?php include "_links.php";
    $id = $_GET['id'];
    ?>
  </head>
  <body>
    <?php include"_nav.php" ?>
    <div class='blurred-container-mo'>
      <div class="img-src" style="background-image: url('assets/img/cover.jpg');"></div>
    </div>
    
    <div class="main">
      <div class="container tim-container" style="max-width:800px; padding-top:100px">
      </div>
      <?php
      $getinfo =mysql_fetch_array(mysql_query("select * from tbl_movie where id = '$id'"));
      ?>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <img src="../admin/uploads/photos/<?php echo $getinfo['cover']?>" style="width:350px; height:500px;">
          </div>
          <div class="col-md-4">
            <h2><?php echo $getinfo['name']?></h2>
            <?php 
              $getavgrating = mysql_fetch_array(mysql_query("SELECT avg(rating) as avg FROM codex.tbl_rating where movie_id =  '$id'"));
              $avg = number_format($getavgrating['avg'] , 1);
              ;
             ?>
          </div>
          <div class="col-md-4">
            <div class="space-30"></div>
            <label class="label label-warning ">Rating - <?php echo $avg ?></label>
            <?php 
              if (!isset($_SESSION['member'])) {
              ?>
              <a href="#signin" data-toggle="modal" data-target="#signin" class="btn btn-default btn-xs pull-right" type="submit">Sign in to Save in Collection</a>
              <?php
              }else{
             ?>
            <form action="addtocollection.php" method="post">
              <input type="text" name="movieid" value="<?php echo $id ?>" hidden>
              <input type="text" name="memberid" value="<?php echo $member_id ?>" hidden>
              <?php 
              $checkcollection = mysql_num_rows(mysql_query("SELECT * FROM codex.tbl_collection where movie_id = $id and member_id = $member_id;"));
              if ($checkcollection == 1) {
              ?>
              <button class="btn btn-default btn-xs pull-right" type="submit" disabled>Already Saved to Collection</button>
              <?php  
              }else {
              ?>
              <button class="btn btn-default btn-xs pull-right" type="submit">Save to Collection</button>
              <?php  
              }
              ?>
            </form>
            <?php 
          }
             ?>

          </div>
            <div class="space-30"></div>
            <div class="col-md-4"></div>
            <div class="col-md-6">
            <label for="">Description</label>
            <p>
              <?php echo $getinfo['description']?>
            </p>
         
            <table class="table table-responsive table-striped">
              <tr>
                <td>Genre</td>
                <td><?php echo $getinfo['genre']?></td>
              </tr>
              <tr>
                <td>Released Date</td>
                <td><?php echo $getinfo['released_date']?></td>
              </tr>
              <tr>
                <td>Runtime</td>
                <td><?php echo $getinfo['runtime']?></td>
              </tr>
              <tr>
                <td>Price</td>
                <td><?php echo $getinfo['price']?></td>
              </tr>
            </table>
            
          </div>
          
          
        </div>
        <div class="space-30"></div>
        <div class="row">
          <div class="col-md-2">
            <?php 
              if (!isset($_SESSION['member'])) {
              ?>
              <a href="#signin" data-toggle="modal" data-target="#signin" class="btn btn-warning btn-fill btn-round " style="width:270px; height:40px;" >Sign In to purchase and rate</a>
            <?php }else{ ?>
            <?php
            $checkpurchase = mysql_num_rows(mysql_query("SELECT * FROM codex.tbl_purchase where movie_id = '$id' and member_id = '$member_id';"));
            if ($checkpurchase == 1) {
             ?>
            <a href="download.php?id=<?php echo "$id" ?>" class="btn btn-success btn-fill btn-round " style="width:110px; height:40px;" >Download</a>
            <?php 
          }else {
             ?>
             <a href="#purchase" data-toggle="modal" data-target="#purchase" class="btn btn-success btn-fill btn-round " style="width:110px; height:40px;" >Purchase</a>
             <?php 
              }
              ?>
            <?php include '_purchase_modal.php'; ?>
          </div>
          <div class="col-md-2">
            <a href="#rate" data-toggle="modal" data-target="#rate" class="btn btn-primary btn-fill btn-round " style="width:110px; height:40px;" >Rate</a>
            <?php include '_rating_modal.php'; ?>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="space-30"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default ">
              <div class="panel-heading">
                <h4 class="panel-title">
                <a data-toggle="collapse" href="#casts">
                  Casts
                </a>
                </h4>
              </div>
              <div id="casts" class="panel-collapse collapse">
                <div class="panel-body">
                  <?php
                  $getcastslist =  mysql_query("SELECT c.id, c.stage_name , r.role FROM codex.tbl_crew cr, tbl_movie m ,tbl_role r, tbl_cast c where r.id = cr.role_id and  m.id = cr.movie_id and c.id = cr.cast_id
                    and  cr.movie_id = $id;") ;
                  ?>
                  <div class="row">
                  <div class="col-md-12">
                    <table id='movielisttable' class="table table-striped table-bordered table-responsive">
                    <thead>
                      <tr>
                        <th>Cast</th>
                        <th>Role</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($getcasts = mysql_fetch_assoc($getcastslist)) {
                      ?>
                      <tr>
                        <td>
                          <a href="viewactor.php?id=<?php echo $getcasts['id']; ?>"><?php echo $getcasts['stage_name']; ?></a>
                            
                          </td>
                        <td><?php echo $getcasts['role']; ?></td>
                      </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default ">
              <div class="panel-heading">
                <h4 class="panel-title">
                <a data-toggle="collapse" href="#synopsis">
                  Synopsis
                </a>
                </h4>
              </div>
              <div id="synopsis" class="panel-collapse collapse">
                <div class="panel-body">
                  <?php
                  $getsynopsis =  mysql_fetch_array(mysql_query("SELECT * FROM codex.tbl_synopsis where movie_id = $id;")) ;
                  ?>
                  <div class="row">
                    <div class="col-md-12">
                    <p><?php echo $getsynopsis['content']; ?></p>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default ">
              <div class="panel-heading">
                <h4 class="panel-title">
                <a data-toggle="collapse" href="#comments">
                  Users' Comments
                </a>
                </h4>
              </div>
              <div id="comments" class="panel-collapse collapse">
                <div class="panel-body">
                  <?php
                  $getsynopsis =  mysql_fetch_array(mysql_query("SELECT * FROM codex.tbl_synopsis where movie_id = $id;")) ;
                  ?>
                  <div class="row">
                    <div class="col-md-12">
                    <?php 
                      $getratingquery = mysql_query("SELECT * FROM codex.tbl_rating where movie_id =  '$id'");
                      while ($comment = mysql_fetch_array($getratingquery)) { 
                      $rateid = $comment['id'];
                      $userid = $comment['member_id'];
                      $getusername = mysql_fetch_array(mysql_query("SELECT * FROM tbl_member where id = $userid"));
                      ?>
                    <h6><?php echo $getusername['username'] ?> : 
                      <a href="reportcmt.php?id=<?php echo $rateid ?>" class="btn btn-danger btn-xs btn-fill pull-right">Report</a>
                    </h6>
                    <p><?php echo $comment['comment']; ?></p>
                    <hr>
                    <?php } ?>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>