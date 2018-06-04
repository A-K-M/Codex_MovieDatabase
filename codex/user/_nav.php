<?php include 'config.php'; ?>
<div id="navbar-full">
    <div class="container">
        <nav class="navbar navbar-default navbar-transparent navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php" style="font-size: 30px"> <img src="assets/img/favicon.png" alt="">Codex</a>
                </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="Upcoming.php">Upcoming</a></li>
                        <li><a href="toprated.php">Top Rated</a></li>
                        <li><a href="mostpurchase.php">Most Purchase</a></li>
                        <?php
                        session_start();
                        if (isset($_SESSION['member'])) {
                        $username = $_SESSION['username'];
                        $query = "SELECT * FROM tbl_member WHERE username = '$username';";
                        $result = mysql_query($query);
                        $getmemberinfo = mysql_fetch_array($result);
                        $member_id = $getmemberinfo['id'];
                        
                        ?>
                        <li><a href="#topup"  data-toggle="modal" data-target="#topup" class="btn btn-round btn-default">Top-Up</a>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $username; ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="profile.php">Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="_logout.php">Logout</a></li>
                            </ul>
                        </li>
                        <?php
                        } else {
                        ?>
                        <li><a href="#register" data-toggle="modal" data-target="#register">Register</a></li>
                        <li><a href="#signin"  data-toggle="modal" data-target="#signin" class="btn btn-round btn-default">Sign in</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
        </nav>
    </div><!--  end container-->
    
</div>
        <?php
        include '_register_modal.php';
        include '_signin_modal.php';
        include '_forgot_modal.php';
        include '_topup_modal.php';
        ?>