<div class="modal fade" id="topup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Top Up</h4>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-12">TopUp Code</label>
                            <div class="col-md-12">
                                <input type="text" name="topupcode" placeholder="1234567890" class="form-control" />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" name="topup" class="btn btn-success btn-round align-content-center">Top-Up</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
             <?php
            if(isset($_POST['topup']))
            {
                $topupcode = $_POST['topupcode'];
                $query = "SELECT * FROM tbl_topup WHERE code = '$topupcode' and is_used = 0;";
                $result = mysql_query($query);
                if(mysql_num_rows($result) == 1)
                    {
                        $array = mysql_fetch_array($result);
                        $getbalancequery = mysql_query("select * from `codex`.`tbl_member` where `username` = '$username'");
                        $getbalance = mysql_fetch_array($getbalancequery);
                        $new_amount = $array['amount'] + $getbalance['balance'];
                        $update_balance = mysql_query("UPDATE `codex`.`tbl_member` SET `balance`='$new_amount' WHERE `username`='$username';");
                        $update_topupcode = mysql_query("UPDATE `codex`.`tbl_topup` SET `is_used`='1' WHERE `code`='$topupcode';");
                        echo '<script language="javascript">';
                        echo 'alert("Topup Succeed!");';
                        echo 'window.history.back();';
                        echo '</script>';
                    }
                else
                    {
                        echo '<script language="javascript">';
                        echo 'alert("Topup failed!");';
                        echo 'window.history.back();';
                        echo '</script>';
                    }
            }
            ?>
        </div>
    </div>
</div>