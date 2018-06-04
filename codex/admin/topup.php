<?php include '_header.php'; ?>
<!-- Page Content -->
<?php include 'check_lvl.php'; ?>

<!-- Content Head -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h3 class="page-title">Topup Codes</h3> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Topup Codes</li>
                </ol>
            </div>
        </div>
        <!-- Content Head end-->
        <!-- Content Body -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title">Generated Topup Codes <a href="#newtopup" data-toggle="modal" data-target="#newtopup" data-dismiss="modal" data-backdrop="static" class="btn btn-info pull-right">New Topup Code</a></h3>
                    <!-- New Top up Modal -->
                    <div class="modal fade" id="newtopup" role="dialog">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 style="text-align: center;">New TopUp Code</h4>
                                    <hr />
                                    <form class="form-horizontal form-material" method="post" >
                                    <?php
                                    $topupcode= strtoupper(uniqid(substr(rand(),0,3)));
                                    ?>
                                        <div class="form-group">
                                            <label class="col-md-12">TopUp Code</label>
                                            <div class="col-md-12">
                                                <input type="text" readonly class="form-control form-control-line" name="code" value="<?php echo $topupcode ?>">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Amount</label>
                                            <div class="col-md-12">
                                                <select name="amount" class="form-control form-control-line">
                                                    <option value="1000">1000  </option>
                                                    <option value="3000">3000</option>
                                                    <option value="5000">5000</option>
                                                    <option value="10000">10000</option>
                                                    <option value="30000">30000</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-5"></div>
                                            <div class="col-md-7">
                                                <button class="btn btn-primary"  type="submit" name="generate" >Generate</button>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                    if(isset($_POST['generate']))
                                    {
                                    $code = $_POST['code'];
                                    $amount = $_POST['amount'];
                                    $getadmin = mysql_query("SELECT * FROM tbl_admin WHERE username = '$username'");
                                    $r = mysql_fetch_array($getadmin);
                                    $admin = $r['id'];
                                    $sql = "INSERT INTO `codex`.`tbl_topup` (`amount`, `code`, `date`, `admin_id`) VALUES ('$amount', '$code', NOW(), '$admin' );";
                                    if(mysql_query($sql)){
                                    echo '<script language="javascript">';
                                    echo 'alert("New Topup Code Generated!");';
                                    echo 'window.location="topup.php";';
                                    echo '</script>';
                                    }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php
                    $gettopupsql = mysql_query("select * from tbl_topup;")
                    ?>
                    <table class="table table-hover table-striped table-responsive" id="table">
                        <thead>
                            <tr>
                                <th style="width: 7%">ID</th>
                                <th style="width: 28%">TopUp Code</th>
                                <th style="width: 15%">Amount</th>
                                <th style="width: 10%">Used</th>
                                <th style="width: 20%">Generated By</th>
                                <th style="width: 15%""> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($result = mysql_fetch_array($gettopupsql)){
                            ?>
                            <tr>
                                <td style="width: 5%"><?php echo $result['id']; ?> </td>
                                <td style="width: 30%"><?php echo $result['code']; ?> </td>
                                <td style="width: 15%"><?php echo $result['amount']; ?> </td>
                                <?php
                                if ($result['is_used'] == 0) {
                                $used = 'NO';
                                }else
                                $used = 'Yes';
                                ?>
                                <td style="width: 10%"><?php echo $used ?> </td>
                                <?php
                                $adminid = $result['admin_id'];
                                $getadminname = mysql_query("SELECT * FROM tbl_admin WHERE id = '$adminid'");
                                $r = mysql_fetch_array($getadminname);
                                $adminname = $r['username'];
                                ?>
                                <td style="width: 20%"><?php echo $adminname ?> </td>
                                <td style="width: 15%" >
                                    <?php
                                    if ($result['is_distributed'] == 0) {
                                    
                                    ?>
                                    <a href="_distributed.php?code_id=<?php echo $result['id']; ?>"
                                    class="btn btn-secondary">Distribute</a>
                                    <?php
                                    }else
                                    echo "Distributed!";
                                    ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
        $('#table').dataTable(
        );
        </script>
        <!-- Content Body end -->
    </div>
<footer class="footer text-center"> 2018 &copy; Codex Admin Team </footer>
</div>
</div>
</body>
</html>