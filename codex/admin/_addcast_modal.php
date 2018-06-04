<div class="modal fade" id="addcast" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style="text-align: center;">Add Cast</h3>
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
                            $getcasts = mysql_query("select * from tbl_cast"); 

                            ?>
                            <table class="table table-hover table-striped table-responsive" id="table">
                                <thead>
                                    <tr> 
                                        <th>ID</th>
                                        <th>Stage Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($castinfo = mysql_fetch_array($getcasts)){  ?>
                                    <tr>
                                        <td><?php echo $castinfo['id']; ?></td>
                                        <td><?php echo $castinfo['stage_name']; ?></td>
                                       
                                        <td><input type="checkbox" name="check[]" value="<?php echo $castinfo['id']; ?>"></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-4">
                            <button class="btn btn-info" type="submit" name="addcastlist" >Add</button>
                        </div>
                    </div>
                </form>
                <?php
                if(isset($_POST['addcastlist'])){
                $id = $_POST['id'];
                $check = $_POST['check'];


                foreach ($check as $castid) {
                  mysql_query("INSERT INTO `codex`.`tbl_crew` (`movie_id`, `cast_id`) VALUES ('$id', '$castid');");
                }

                echo '<script language="javascript">';
                echo 'alert("done");';
                echo 'window.history.back();';
                echo '</script>';
                
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script>
        $('#table').dataTable(
        );
        </script>