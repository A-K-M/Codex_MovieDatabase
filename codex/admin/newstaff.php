<?php include '_header.php'; ?>
<?php include 'check_lvl.php'; ?>

<!-- Page Content -->
<!-- Content Head -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h3 class="page-title">New Staff</h3> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">New Staff</li>
                </ol>
            </div>
        </div>
        <!-- Content Head end-->
        <!-- Content Body -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title text-lg" style="text-align: center;">Fill the required information</h3> <hr>
                    <div class="row">
                    <form class="form-horizontal form-material" method="post">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="col-md-12">Staff Level</label>
                                <div class="col-md-12">
                                 <select name="level" class="form-control form-control-line">
                                            <option value="1">Admin</option>
                                            <option value="2">Staff</option>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-12">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Full Name" class="form-control form-control-line" name="fullname" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Phone Number</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="09123456789" class="form-control form-control-line" name="phone" maxlength = '11' required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Security Question</label>
                                <div class="col-md-12">
                                 <select name="question" class="form-control form-control-line">
                                <option value="1">What is name of your favorite teacher?</option>
                                <option value="2">What is brand of your first car?</option>
                                <option value="3">Who is your favorite comic or cartoon character?</option>
                                <option value="4">Who is your favorite person in history?</option>
                                <option value="5">What was the first album that you purchased?</option>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email" placeholder="Email" class="form-control form-control-line" name="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Address</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Address" class="form-control form-control-line" name="address" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Security Answer</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Answer" class="form-control form-control-line" name="answer" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                           
                            <div class="form-group">
                                <label class="col-md-12">Username</label>
                                <div class="col-md-12">
                                    <input type="text" placeholder="Username" class="form-control form-control-line" name="username" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Password</label>
                                <div class="col-md-12">
                                    <input type="Password" placeholder="Password" class="form-control form-control-line" name="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Re-enter Password</label>
                                <div class="col-md-12">
                                    <input type="Password" placeholder="Password" class="form-control form-control-line" name="repassword" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5"></div>
                                <div class="col-sm-5">
                                <button class="btn btn-info" type="submit" name="create" >Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php 
                    if(isset($_POST['create'])) {
                        $fullname = $_POST['fullname'];
                        $email = $_POST['email'];
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $repassword = $_POST['repassword'];
                        $address = $_POST['address'];
                        $phone = $_POST['phone'];
                        $level = $_POST['level'];
                        $question = $_POST['question'];
                        $answer = $_POST['answer'];
                        // check unique username, email, phone, password match 
                        if ($password !== $repassword) {
                        echo '<script language="javascript">';
                        echo 'alert("Password not match!");';
                        echo 'window.location="newstaff.php";';
                        echo '</script>';
                        } else {
                            $hashed = md5($password);
                        $checkusername = mysql_query("select * form tbl_admin where username = '$username';");
                        $checkemail = mysql_query("select * from tbl_admin where email = '$email';");
                        $checkphone = mysql_query("select * from tbl_admin where phone = '$phone';");
                        if (mysql_num_rows($checkusername) == 1) {
                            echo '<script language="javascript">';
                            echo 'alert("Password not match!");';
                            echo 'window.location="newstaff.php";';
                            echo '</script>';
                            } elseif (mysql_num_rows($checkemail) == 1) {
                            echo '<script language="javascript">';
                            echo 'alert("Email is already used!");';
                            echo 'window.location="newstaff.php";';
                            echo '</script>';
                            } elseif (mysql_num_rows($checkphone) == 1) {
                            echo '<script language="javascript">';
                            echo 'alert("Phone number is already used!");';
                            echo 'window.location="newstaff.php";';
                            echo '</script>';
                            } else {
                                $q = "INSERT INTO `codex`.`tbl_admin` (`name`, `email`, `username`, `password`, `address`, `phone`, `level`, `sec_question`, `sec_answer`) VALUES ('$fullname', '$email', '$username', '$hashed', '$address', '$phone', '$level', '$question', '$answer');";
                            $createstaff = mysql_query("INSERT INTO `codex`.`tbl_admin` (`name`, `email`, `username`, `password`, `address`, `phone`, `level`, `sec_question`, `sec_answer`) VALUES ('$fullname', '$email', '$username', '$hashed', '$address', '$phone', '$level', '$question', '$answer');");
                            echo '<script language="javascript">';
                            echo 'alert("New Staff Account Created!'.$q.'");';
                            echo 'window.location="staffs.php";';
                            echo '</script>';
                            }
                        }
                    }
                     ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Body end -->
    </div>
<footer class="footer text-center"> 2018 &copy; Codex Admin Team </footer>
</div>
</div>
</body>
</html>