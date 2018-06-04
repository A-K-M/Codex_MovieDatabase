<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <div class="top-left-part">
            <!-- Logo -->
            <a class="logo" href="dashboard.php">
                <b>
                <img src="plugins/images/logo.png" alt="home" class="light-logo" />
                </b>
                <span class="hidden-xs">
                    <img src="plugins/images/logo-text.png" alt="home" class="light-logo" />
                </span> </a>
            </div>
            <!-- /Logo -->
            <ul class="nav navbar-top-links navbar-right pull-right">
                <li>
                    <a class="profile-pic" href="profile.php"> <img src="plugins/images/users/user.png" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"> <?php $username = $_SESSION['name']; $level = $_SESSION['level']; echo $username; ?> </b></a>
                </li>
                <?php 
                $getadmin = mysql_fetch_array(mysql_query("SELECT * from tbl_admin where username ='$username' "));
                $admin_id = $getadmin['id'];
                 ?>
                <li><a href="logout.php"><span class="fa-fw open-close"><i class="fa fa-sign-out fa-lg"></i></span></a></li>
            </ul>
        </div>
    </nav>
    <!-- End Top Navigation -->
    <!-- ============================================================== -->
    <!-- Left Sidebar -->
    <!-- ============================================================== -->
    <?php
    if ($level != 1) {
    ?>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
            </div>
            <ul class="nav" id="side-menu">
                <li style="padding: 70px 0 0;">
                    
                    <a href="dashboard.php" class="waves-effect"><i class="fa fa-columns fa-fw" aria-hidden="true"></i>Dashboard</a>
                </li>
              
                <li>
                    <a href="movies.php" class="waves-effect"><i class="fa  fa-video-camera fa-fw" aria-hidden="true"></i>Movies</a>
                </li>
                <li>
                    <a href="casts.php" class="waves-effect"><i class="fa  fa-users fa-fw" aria-hidden="true"></i>Casts</a>
                </li>
                <li>
                    <a href="userreport.php" class="waves-effect"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i>User Reports</a>
                </li>
            </ul>
            
        </div>
    </div>

    <?php
    } else{
    ?>

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
            </div>
            <ul class="nav" id="side-menu">
                <li style="padding: 70px 0 0;">
                    
                    <a href="dashboard.php" class="waves-effect"><i class="fa fa-columns fa-fw" aria-hidden="true"></i>Dashboard</a>
                </li>
                <li>
                    <a href="staffs.php" class="waves-effect"><i class="fa  fa-group fa-fw" aria-hidden="true"></i>Staffs</a>
                </li>
                <li>
                    <a href="members.php" class="waves-effect"><i class="fa fa-users fa-fw" aria-hidden="true"></i>Members</a>
                </li>
                <li>
                    <a href="topup.php" class="waves-effect"><i class="fa fa-dollar fa-fw" aria-hidden="true"></i>Topup Codes</a>
                </li>
                <li>
                    <a href="reports.php" class="waves-effect"><i class="fa fa-folder-open fa-fw" aria-hidden="true"></i>Reports</a>
                </li>
                
            </ul>
            
        </div>
    </div>

    <?php
    }
    ?>
    
    
    
    <!-- ============================================================== -->
    <!-- End Left Sidebar -->