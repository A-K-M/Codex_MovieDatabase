<!DOCTYPE html>
<html lang="en">
    <?php
    include("config.php");
    ?>
    <head>
        <link rel="icon" type="image/png" sizes="20x20" href="plugins/images/logo.png">
        <title>Codex Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div id="loginbox">
            <form id="loginform" class="form-vertical" method="post" >
                
                <div class="control-group normal_text">
                    <img src="plugins/images/white-logo.png" alt="" width=65px >
                <h3>Codex Admin Panal</h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <input type="text" name="username" placeholder=" Username" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <input type="password" name="password" placeholder=" Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <div class="controls">
                        <div class="main_input_box">
                            <input type="submit" name="submit" class="btn btn-success" value="Login" style="width: 100px" />
                        </div>
                    </div>

                </div>
            </form>
            <?php
            session_start();
            if(isset($_POST['submit']))
            {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $hashed = md5($password);

                $query = "SELECT * FROM tbl_admin WHERE username = '$username' AND password='$hashed' and status = 1;";

                $result = mysql_query($query);
                if(mysql_num_rows($result) == 1)
                    {
                        $array = mysql_fetch_array($result);
                        $_SESSION['admin'] = true;
                        $_SESSION['name'] = $username;
                        $_SESSION['level'] = $array['level'];
                        header('Location: dashboard.php');
                    }
                else
                    {
                        echo '<script language="javascript">';
                        echo 'alert("Login failed!");';
                        echo 'window.location="login.php";';
                        echo '</script>';
                    }
            }
            ?>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/matrix.login.js"></script>
    </body>
    
</html>