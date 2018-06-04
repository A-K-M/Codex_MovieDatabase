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
      <?php
      $getinfo =mysql_fetch_array(mysql_query("select * from tbl_cast where id = '$id'"));
      ?>
      <div class="container tim-container" style="max-width:800px; padding-top:100px">
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <img src="../admin/uploads/photos/<?php echo $getinfo['photo']?>" style="width:350px; height:500px;">
          </div>
          <div class="col-md-4">
            <h2><?php echo $getinfo['stage_name']?></h2>
            
          </div>
            <div class="space-30"></div>
            <div class="col-md-4"></div>
            <div class="col-md-6">
            <label for="">Biography</label>
            <p>
              <?php echo $getinfo['bio']?>
            </p>
         
            <table class="table table-responsive table-striped">
              <tr>
                <td>Birthday </td>
                <td><?php echo $getinfo['dob']?></td>
              </tr>
              <tr>
                <td>Birth Name</td>
                <td><?php echo $getinfo['birth_name']?></td>
              </tr>
            </table>
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
                <a data-toggle="collapse" href="#movielist">
                  Related Movies
                </a>
                </h4>
              </div>
              <div id="movielist" class="panel-collapse collapse">
                <div class="panel-body">
                  <?php
                  $getmovielist =  mysql_query("SELECT m.id, m.name ,m.released_date, r.role FROM codex.tbl_crew c, tbl_movie m ,tbl_role r where r.id = c.role_id and  m.id = c.movie_id and c.cast_id = '$id' ;");
                  ?>
                  <div class="row">
                    <div class="col-md-12">
                    <table id='movielisttable' class="table table-striped table-bordered table-responsive">
                    <thead>
                      <tr>
                        <th>Movie Name</th>
                        <th>Released Date</th>
                        <th>Role</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while ($movielist = mysql_fetch_assoc($getmovielist)) {
                      ?>
                      <tr>
                        <td>
                          <a href="viewmoviedetail.php?id=<?php echo $movielist['id']; ?>"><?php echo $movielist['name']; ?></a>
                            
                          </td>
                        <td><?php echo $movielist['released_date']; ?></td>
                        <td><?php echo $movielist['role']; ?></td>
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
    </div>
  </body>
   <script>
        $('#movielisttable').dataTable(
        );
  </script>
  
</html>