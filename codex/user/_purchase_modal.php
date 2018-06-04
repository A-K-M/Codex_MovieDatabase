<div class="modal fade" id="purchase" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Purchase</h4>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-12">Enter your password to purchase.</label>
                            <div class="col-md-12">
                                <input type="password" name="password" placeholder="********" class="form-control" />
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" name="purchase" class="btn btn-success btn-round align-content-center">Pruchase</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
             <?php
            if(isset($_POST['purchase']))
            {
                $password = $_POST['password'];
                $hashed = md5($password);

                $price = $getinfo['price'];
                $member = mysql_fetch_array(mysql_query("select * from tbl_member where id = $member_id and 
                    password = '$hashed'"));
                $balance = $member['balance'];
                if ($hashed !== $member['password'] ) {
                    echo '<script language="javascript">';
                    echo 'alert("Wrong password!!!");';
                    echo 'window.history.back()';
                    echo '</script>';
                }elseif ( $price > $balance) {
                    echo '<script language="javascript">';
                    echo 'alert("Not enough balance!!!");';
                    echo 'window.history.back()';
                    echo '</script>';
                }else {
                    if(mysql_num_rows($result) == 1)
                    {   
                        
                        $new_balance = $balance - $price;
                        $update_balanace = mysql_query("UPDATE `codex`.`tbl_member` SET `balance`='$new_balance' WHERE
                         `id`='$member_id';");

                        $add_purchase = mysql_query("INSERT INTO `codex`.`tbl_purchase` (`movie_id`, `member_id`, `date`) VALUES ('$id', '$member_id', date(NOW()));");

                        $checkcollection = mysql_num_rows(mysql_query("SELECT * FROM codex.tbl_collection where movie_id=$id and member_id = $member_id;"));
                        
                        if ($checkcollection == 1) {
                            $updatecollection = mysql_query("UPDATE `codex`.`tbl_collection` SET `is_bought`='1' WHERE `movie_id`='$id' and member_id = $member_id;");
                        }
                        echo '<script language="javascript">';
                        echo 'alert("Purchase successfully done!!");';
                        echo 'window.history.back();';
                        echo '</script>';
                        
                    }
                else
                    {
                        echo '<script language="javascript">';
                        echo 'alert("Purchased failed!");';
                        echo 'window.history.back();';
                        echo '</script>';
                    }
                }
            }
            ?>
        </div>
    </div>
</div>