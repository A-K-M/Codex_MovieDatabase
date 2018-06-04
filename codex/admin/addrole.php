<?php include '_header.php'; ?>
<?php include 'check_admin_level.php'; ?>

<!-- Page Content -->
<!-- Content Head -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h3 class="page-title">Add Role</h3> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <?php $id = $_GET['id'] ?>
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Add Role</li>
                </ol>
            </div>
        </div>
        <!-- Content Head end-->
        <!-- Content Body -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                <h3 class="box-title">Add Role</h3>
                <?php 
                $getcrew = mysql_query("select * from tbl_crew where id = $id");
                $crewinfo = mysql_fetch_array($getcrew);
                 ?>
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
                                       <?php 
                            $castid = $crewinfo['cast_id'];
                            $getcastname = mysql_fetch_array( mysql_query("select * from tbl_cast where id= $castid"));
                            $castname = $getcastname['stage_name'];
                        ?>
                                        <td><?php echo $crewinfo['id'] ?></td>
                                        <td><?php echo $castname ?></td>
                                        <td>
                                            <?php $rolequery = mysql_query("select * from tbl_role;");
                                             ?>
                                            <select name="role">
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
                $id = $_POST['id'];
                $role = $_POST['role'];

                mysql_query("UPDATE `codex`.`tbl_crew` SET `role_id`='$role' WHERE `id`='$id';");

                echo '<script language="javascript">';
                echo 'alert("done");';
                echo 'window.history.go(-2);';
                echo '</script>';
                
                }
                ?>
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