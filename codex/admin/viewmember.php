<?php include '_header.php'; ?>
<?php include 'check_lvl.php'; ?>

<!-- Page Content -->
<!-- Content Head -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h3 class="page-title">Member info</h3> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Member info</li>
                </ol>
            </div>
        </div>
        <!-- Content Head end-->
        <!-- Content Body -->
        <div class="row">
            
            <div class="col-md-4 col-xs-12">
                <?php
                if (!$_GET['id']) {
                echo '<script language="javascript">';
                echo 'window.location="members.php";';
                echo '</script>';
                }
                $memberid = $_GET['id'];
                $query = mysql_query("SELECT * FROM tbl_member WHERE id = '$memberid'");
                $r = mysql_fetch_array($query);
                ?>
                <div class="white-box">
                    <div class="user-bg">
                        <div class="overlay-box">
                            <div class="user-content">
                                <a href="javascript:void(0)"><img src="plugins/images/users/user.png" class="thumb-lg img-circle" alt="img"></a>
                                <h4 class="text-white"> <?php echo $username ?> </h4>
                            <h5 class="text-white"><?php echo $r['email'] ?></h5> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
            <div class="white-box">
                <h3 class="box-title">Member info</h3> 
                <table class="table table-striped table-responsive">
                    <tr>
                        <td style="width: 35%;">Full Name : </td>
                        <td><?php echo $r['name'] ?></td>
                    </tr>
                    <tr>
                        <td>Balance : </td>
                        <td><?php echo $r['balance'] ?></td>
                    </tr>
                    <tr>
                        <?php $pcount =mysql_fetch_array(mysql_query("select count(p.id) as count from tbl_purchase p, tbl_member me where p.member_id = me.id and member_id = '$memberid' group by p.member_id;")) ?>
                        <td>Total Purchase Count : </td>
                        <td><?php echo $pcount['count'] ?></td>
                    </tr>
                    <tr>
                        <?php $rcount = mysql_fetch_array(mysql_query("select count(r.id) as count from tbl_rating r, tbl_member me where r.member_id = me.id and member_id = '$memberid' group by r.member_id;")) ?>
                        <td>Total Rating Count : </td>
                        <td><?php echo $rcount['count'] ?></td>
                    </tr>
                    <tr>
                        <?php $ccount = mysql_fetch_array(mysql_query("select count(c.id) as count from tbl_collection c, tbl_member me where c.member_id = me.id and member_id = '$memberid' group by c.member_id;")) ?>
                        <td>Items in Collection : </td>
                        <td><?php echo $ccount['count'] ?></td>
                    </tr>
                </table>
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