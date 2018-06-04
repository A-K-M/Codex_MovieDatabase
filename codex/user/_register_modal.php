<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Register</h4>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-12">Full Name</label>
                            <div class="col-md-12">
                                <input type="text" name="fullname" placeholder="Full Name" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Username</label>
                            <div class="col-md-12">
                                <input type="text" name="username" placeholder="Username" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Email</label>
                            <div class="col-md-12">
                                <input type="email" name="email" placeholder="Email" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Password</label>
                            <div>
                                <input type="Password" name="password" placeholder="Password" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Confirm Password</label>
                            <div>
                                <input type="Password" name="password1" placeholder="Password" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Security Question</label>
                            <div class="col-md-12">
                                <select name="question" class="form-control">
                                <option value="1">What is name of your favorite teacher?</option>
                                <option value="2">What is brand of your first car?</option>
                                <option value="3">Who is your favorite comic or cartoon character?</option>
                                <option value="4">Who is your favorite person in history?</option>
                                <option value="5">What was the first album that you purchased?</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Security Answer</label>
                            <div class="col-md-12">
                                <input type="text" name="answer" placeholder="Answer" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-round btn-danger pull-left" data-dismiss="modal">Close</button>
                                <button type="submit" name="register" class="btn btn-success pull-right btn-round">Save</button>
                            </div>
                        </div>
                    </div>
                
            </div>
         
            </form>
            <?php 
                    if(isset($_POST['register'])) {
                        $fullname = mysql_real_escape_string($_POST['fullname']);
                        $email = mysql_real_escape_string($_POST['email']);
                        $username = mysql_real_escape_string($_POST['username']);
                        $password = mysql_real_escape_string($_POST['password']);
                        $repassword = mysql_real_escape_string($_POST['password1']);
                        $question = mysql_real_escape_string($_POST['question']);
                        $answer = mysql_real_escape_string($_POST['answer']);
                        // check unique username, email, password match 
                        if ($password !== $repassword) {
                        echo '<script language="javascript">';
                        echo 'alert("Password not match!");';
                        echo 'window.location="index.php";';
                        echo '</script>';
                        } else {
                         $hashed = md5($password);

                        $checkusername = mysql_query("select * from tbl_member where username = '$username';");
                        $checkemail = mysql_query("select * from tbl_member where email = '$email';");
                        if (mysql_num_rows($checkusername) == 1) {
                            echo '<script language="javascript">';
                            echo 'alert("username is already used!");';
                            echo 'window.location="index.php";';
                            echo '</script>';
                            } elseif (mysql_num_rows($checkemail) == 1) {
                            echo '<script language="javascript">';
                            echo 'alert("Email is already used!");';
                            echo 'window.location="index.php";';
                            echo '</script>';
                            } else {
                            $register = mysql_query("INSERT INTO `codex`.`tbl_member` (`name`, `email`, `username`, `password`, `sec_question`, `sec_answer`) VALUES ('$fullname', '$email', '$username', '$hashed', '$question', '$answer');");
                            echo '<script language="javascript">';
                            echo 'alert("Register Completed!");';
                            echo 'window.location="index.php";';
                            echo '</script>';
                            }
                        }
                    }
                     ?>
        </div>
    </div>
</div>