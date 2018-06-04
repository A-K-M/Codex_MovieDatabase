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
        <h1 class="text-center">Report</h1>
      </div>
      <div class="container tim-container" style="max-width:800px; padding-top:50px">
        <form method="post">
          <div class="row">
            <div class="form-group">
              <label class="col-md-12">Reason</label>
              <div class="col-md-12">
                <select name="type" id="type" style="width: 200px">
                  <option value="Hate">Hate Speech Comment</option>
                  <option value="Spoiler">Contain Spoiler</option>
                  <option value="Personal Attack">Personal Attack</option>
                  <option value="Sexual">Contain Sexual Contnet</option>
                  <option value="Spam">Spam</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12">Email</label>
              <div class="col-md-12">
                <input type="email" name="email" required class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-12">Comment</label>
              <div class="col-md-12">
                <textarea rows="3" class="form-control form-control-line" name="content">
                
                </textarea>
              </div>
            </div>
            <br>
            <div class="form-group">
              <div class="col-md-12">
                <button type="submit" name="report" class="btn btn-danger btn-round align-content-center">Report</button>
              </div>
            </div>
          </div>
        </div>
        </form>
        <?php
            if(isset($_POST['report']))
            {   
                $type = $_POST['type'];
                $email = $_POST['email'];
                $content = $_POST['content'];

                $reportquery = "INSERT INTO `codex`.`tbl_report` (`date`, `type`, `email`, `content`) VALUES (Now(), '$type', '$email', '$content');";

                $reportresult = mysql_query($reportquery);
                
                        
                        echo '<script language="javascript">';
                        echo 'alert("Reported!!");';
                        echo 'window.history.go(-2);';
                        echo '</script>';
                
            }
            ?>
        <div class="space"></div>
      </div>
    </div>
  </body>
  
</html>