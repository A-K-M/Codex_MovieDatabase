<div class="modal fade" id="rate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php 
            $checkratingquery = mysql_query("SELECT * FROM codex.tbl_rating where movie_id = $id and member_id = $member_id;");
            $getpersonalrating = mysql_fetch_array($checkratingquery);

             ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Rating</h4>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-3">Rating</label>
                            <div class="col-md-9">
                                <select name="rating" id="rating" style="width: 100px">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Comment</label>
                            <div class="col-md-12">
                                <textarea rows="3" class="form-control form-control-line" name="comment"><?php echo $getpersonalrating['comment']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" name="rate" class="btn btn-success btn-round align-content-center">Give Rating</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
             <?php
            if(isset($_POST['rate']))
            {
                $rating = $_POST['rating'];
                $comment = $_POST['comment'];
                $count = mysql_num_rows($checkratingquery);



                if($count == 1)
                    {   
                        $rating_id = $getpersonalrating['id'];

                        $updaterating = mysql_query("UPDATE `codex`.`tbl_rating` SET `rating`='$rating', `comment`='$comment' WHERE `id`='$rating_id';");

                        echo '<script language="javascript">';
                        echo 'alert("Rating Updated!!!");';
                        echo 'window.history.back();';
                        echo '</script>';
                    }
                else
                    {
                        $addrating = mysql_query("INSERT INTO `codex`.`tbl_rating` (`movie_id`, `member_id`, `rating`, `comment`) VALUES ('$id', '$member_id', '$rating', '$comment');");
                        echo '<script language="javascript">';
                        echo 'alert("Rating Added!!!");';
                        echo 'window.history.back();';
                        echo '</script>';
                    }
            }
            ?>
        </div>
    </div>
</div>