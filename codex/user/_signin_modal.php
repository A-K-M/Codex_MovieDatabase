<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Sign in</h4>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-12">Username</label>
                            <div class="col-md-12">
                                <input type="text" name="username" placeholder="Username" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Password</label>
                            <div class="col-md-12">
                                <input type="Password" name="password" placeholder="Password" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <a href="#forgot" data-toggle="modal" data-target="#forgot" class="btn btn-simple btn-sm btn-info pull-left" data-dismiss="modal">Forgot Password?</a>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" name="signin" class="btn btn-success btn-round pull-right">Sign in</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
             <?php
            if(isset($_POST['signin']))
            {
                $username = mysql_real_escape_string($_POST['username']);
                $password = mysql_real_escape_string($_POST['password']);
                $hashed = md5($password);

                $query = "SELECT * FROM tbl_member WHERE username = '$username' AND password='$hashed' and status = 1;";

                $result = mysql_query($query);
                if(mysql_num_rows($result) == 1)
                    {
                        $array = mysql_fetch_array($result);
                        session_start();
                        $_SESSION['member'] = true;
                        $_SESSION['username'] = $username;
                        echo '<script language="javascript">';
                        echo 'alert("Login Completed!");';
                        echo 'window.history.back();';
                        echo '</script>';
                    }
                else
                    {
                        echo '<script language="javascript">';
                        echo 'alert("Login failed!");';
                        echo 'window.history.back();';
                        echo '</script>';
                    }
            }
            ?>
        </div>
    </div>
</div>