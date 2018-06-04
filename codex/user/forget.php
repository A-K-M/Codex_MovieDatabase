<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <?php include "_links.php"; ?>
  </head>
  <body>
    <?php include"_nav.php" ?>
    <?php 
      $username = $_POST['username'];
      $q = $_POST['question'];
      $a = $_POST['answer'];
      $check = mysql_query("select * from tbl_member where username = '$username' and sec_question = '$q' and sec_answer = '$a'"); 
      $result = mysql_num_rows($check);
      if ($result !== 1) {
        echo '<script language="javascript">';
        echo 'alert("Wrong information");';
        echo 'window.location="index.php";';
        echo '</script>';
      }

     ?>
    <div class='blurred-container-mo'>
        <div class="img-src" style="background-image: url('assets/img/cover.jpg');"></div>
    </div>
    
    <div class="main">
      <div class="container tim-container" style="max-width:800px; padding-top:100px">
        <h1 class="text-center">New Password</h1>
      </div>
     
      <div class="container tim-container">
        <form method="post" action="_change.php">
                    <div class="row">
                        <div class="form-group">
                                <input type="hidden" name="username"  class="form-control" value="<?php echo $username ?>" required/>

                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="password" name="password" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Re-enter Password</label>
                            <div class="col-md-12">
                                <input type="password" name="password1"  class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" name="change" class="btn btn-success btn-round pull-right">Change</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
        
      </div>
      
      <div class="space"></div>
    </div>
  </body>
  
</html>