<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <?php include "_links.php"; ?>
  </head>
  <body>
    <?php include"_nav.php" ?>
    <?php include"session.php" ?>
    <div class='blurred-container-mo'>
      <div class="img-src" style="background-image: url('assets/img/cover.jpg');"></div>
    </div>
    <div class="main">
      <div class="container tim-container" style="max-width:800px; padding-top:100px">
        <h1 class="text-center">Profile</h1>
      </div>
      <div class="container">
        <?php
        $info =mysql_fetch_array(mysql_query("select * from tbl_member where username = '$username'"));
        ?>
        <form method="post">
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5">
              <div class="form-group">
                <label class="col-md-12">Full Name</label>
                <div class="col-md-12">
                  <input type="hidden" name="username" value=" <?php echo $info['username'] ?> " required />
                  <input type="text" name="fullname" value=" <?php echo $info['name'] ?> " placeholder="Full Name" class="form-control" required />
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12">Username</label>
                <div class="col-md-12">
                  <input type="text" name="username" value=" <?php echo $info['username'] ?> " placeholder="Username" class="form-control" required readonly/>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12">Email</label>
                <div class="col-md-12">
                  <input type="email" name="email" value=" <?php echo $info['email'] ?> " placeholder="Email" class="form-control" required />
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label class="col-md-12">Balance </label>
                <div class="col-md-12">
                  <input type="text" name="balance" value="<?php echo $info['balance'] ?>" placeholder="Full Name" class="form-control" required readonly/>
                </div>
              </div>
              <div class="form-group">
                <?php
                $getpurchase = mysql_query("select * from tbl_purchase where member_id = '$member_id'");
                $purchase_count = mysql_num_rows($getpurchase);
                ?>
                <label class="col-md-12">Purchase Count</label>
                <div class="col-md-12">
                  <input type="text" name="purchase" value="<?php echo $purchase_count ?>" placeholder="Username" class="form-control" required readonly/>
                </div>
              </div>
              <div class="form-group">
                <?php
                $getratingcount = mysql_num_rows(mysql_query("select * from tbl_rating where member_id = '$member_id'"));
                ?>
                <label class="col-md-12">Rating Count</label>
                <div class="col-md-12">
                  <input type="txt" name="rating" value=" <?php echo "$getratingcount" ?> " placeholder="Email" class="form-control" required readonly/>
                </div>
              </div>
            </div>
            <div class="form-group col-md-12">
              <div class="col-md-5"></div>
              <div class="col-md-7">
                <button type="submit" name="update" class="btn btn-success  btn-round" style="width: 100px">update</button>
              </div>
            </div>
          </div>
        </form>
        <?php
        if(isset($_POST['update'])) {
        $fullname = mysql_real_escape_string($_POST['fullname']);
        $email = mysql_real_escape_string($_POST['email']);
        $username = mysql_real_escape_string($_POST['username']);
        $checkemail = mysql_query("select * from tbl_member where email = '$email';");
        if (mysql_num_rows($checkemail) == 1) {
        echo '<script language="javascript">';
        echo 'alert("Email is already used!");';
        echo 'window.history.back();';
        echo '</script>';
        } else {
        mysql_query("UPDATE `codex`.`tbl_member` SET `name`='$fullname', `email`='$email' WHERE `username`='$username';");
        echo '<script language="javascript">';
        echo 'alert("Update Completed!");';
        echo 'window.history.back();';
        echo '</script>';
        }
        }
        
        ?>
      </div>
      <hr>
      <div class="space-mo"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="panel panel-default ">
              <div class="panel-heading">
                <h4 class="panel-title">
                <a data-toggle="collapse" href="#purchaseditems">
                  Purchased items
                </a>
                </h4>
              </div>
              <div id="purchaseditems" class="panel-collapse collapse">
                <div class="panel-body">
                  <?php
                  $getpurchaselist =  mysql_query("SELECT m.id, m.name , p.date FROM codex.tbl_purchase p, codex.tbl_movie m where member_id = 1 and m.id = p.movie_id;");
                  ?>
                  <div class="row">
                    <div class="col-md-12">
                      <table id='purchasetable' class="table table-striped table-bordered table-responsive">
                        <thead>
                          <tr>
                            <th>Movie Name</th>
                            <th>Purchased Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          while ($purchase = mysql_fetch_assoc($getpurchaselist)) {
                          ?>
                          <tr>
                            <td>
                              <a href="viewmoviedetail.php?id=<?php echo $purchase['id']; ?>"><?php echo $purchase['name']; ?></a>
                              
                            </td>
                            <td><?php echo $purchase['date']; ?></td>
                            <td><a href="download.php?id=<?php echo $purchase['id']; ?>" class='btn btn-primary btn-sm btn-fill' > Download</a></td>
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
      <div class="space-mo"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="panel panel-default ">
              <div class="panel-heading">
                <h4 class="panel-title">
                <a data-toggle="collapse" href="#collection">
                  Collection
                </a>
                </h4>
              </div>
              <div id="collection" class="panel-collapse collapse">
                <div class="panel-body">
                  <div class="row">
                    <?php
                    $getcollection = mysql_query("SELECT m.id, m.name, c.date, c.is_bought, c.id as cid FROM codex.tbl_collection c, codex.tbl_movie m where m.id = c.movie_id and c.member_id= $member_id;")
                    ?>
                    <div class="col-md-12">
                      <table id='collectiontable' class="table table-striped table-bordered table-responsive">
                        <thead>
                          <tr>
                            <th>Movie Name</th>
                            <th>Added Date</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          while ($collection = mysql_fetch_assoc($getcollection)) {
                          ?>
                          <tr>
                            <td>
                              <a href="viewmoviedetail.php?id=<?php echo $collection['id']; ?>"><?php echo $collection['name']; ?></a>
                            </td>
                            <td><?php echo $collection['date']; ?></td>
                            <?php
                            if ($collection['is_bought'] == 0) {
                            $is_bought = 'Not Purchased';
                            }else {
                            $is_bought = 'Purchased';
                            }
                            ?>
                            <td><?php echo $is_bought; ?></td>
                            <td><a href="_delete_collection.php?id=<?php echo $collection['cid']; ?>" class='btn btn-primary btn-sm btn-fill'>Remove</a></td>
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
      <div class="space"></div>
    </div>
  </body>
  <script>
  $('#purchasetable').dataTable(
  );
  $('#collectiontable').dataTable(
  );
  </script>
  
</html>