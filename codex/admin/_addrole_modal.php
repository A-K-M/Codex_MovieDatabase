<div class="modal fade" id="addrole" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style="text-align: center;">Add Cast</h3>
                <hr />
                <form class="form-horizontal form-material" method="post">
                    <div class="form-group">
                        <input type="text" hidden value="<?php echo $crewinfo['id'] ?>" name='id'>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            
                            <table class="table table-hover table-striped table-responsive" id="table">
                                <thead>
                                    <tr> 
                                        <th>ID</th>
                                        <th>Cast Name</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                       
                                        <td><?php echo $crewinfo['id'] ?></td>
                                        <td><?php echo $castname ?></td>
                                        <td>
                                            <?php $rolequery = mysql_query("select * from tbl_role;");
                                             ?>
                                            <select name="role" id="role">
                                            <?php while ( $r = mysql_fetch_array($rolequery)) {  ?>
                                            <option value="<?php echo $r['id'] ?>"><?php echo $r['role'] ?></option>
                                            <?php } ?>
                                            </select>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-4">
                            <button class="btn btn-info" type="submit" name="addcastrole" >Add</button>
                        </div>
                    </div>
                </form>
                <?php
                if(isset($_POST['addcastrole'])){
                $id = $_POST['crewid'];
                $role = $_POST['role'];


                // foreach ($role as $roleid) {
                //     echo $roleid;
                //   mysql_query("INSERT INTO `codex`.`tbl_crew` (`movie_id`, `cast_id`) VALUES ('$id', '$castid');");
                // }

                echo '<script language="javascript">';
                echo 'alert("'.$id.$role.'");';
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