<div class="modal fade" id="addsynopsis" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style="text-align: center;">Add Synopsis</h3>
                <hr />
                <form class="form-horizontal form-material" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="hidden" placeholder="Time" class="form-control form-control-line" name="id"  value="<?php echo $getmovie['id'] ?>">
                            
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <?php
                            $getsynopsis = mysql_fetch_array(mysql_query("SELECT * FROM codex.tbl_synopsis where movie_id =$id"));
                            $content = $getsynopsis['content'] ;
                            ?>
                            <textarea rows="5" class="form-control form-control-line" placeholder="Synopsis" name="synopsis">
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-4">
                            <button class="btn btn-info" type="submit" name="addsynopsis" >Add</button>
                        </div>
                    </div>
                </form>
                <?php
                if(isset($_POST['addsynopsis'])){
                $id = $_POST['id'];
                $synopsis = $_POST['synopsis'];
                mysql_query("DELETE FROM `codex`.`tbl_synopsis` WHERE `movie_id`='$id';");
                $addquery = "INSERT INTO `codex`.`tbl_synopsis` (`movie_id`, `admin_id`, `content`, `date`) VALUES ('$id', '$admin_id', '$synopsis', date(now()));";
                mysql_query($addquery);
                echo '<script language="javascript">';
                echo 'alert("Synopsis Added!!");';
                echo 'window.history.back();';
                echo '</script>';
                }
                ?>
            </div>
        </div>
    </div>
</div>