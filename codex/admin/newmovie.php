<?php include '_header.php'; ?>
<?php include 'check_admin_level.php'; ?>

<!-- Page Content -->
<!-- Content Head -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h3 class="page-title">New movie</h3> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">New movie</li>
                </ol>
            </div>
        </div>
        <!-- Content Head end-->
        <!-- Content Body -->
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title text-lg" style="text-align: center;">Fill the required information</h3> <hr>
                    <div class="row">
                        <form class="form-horizontal form-material" method="post" action="_uploadmovies.php" enctype="multipart/form-data">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="col-md-12">Type</label>
                                    <div class="col-md-12">
                                        <select name="type" class="form-control form-control-line">
                                            <option value="Movie">Movie</option>
                                            <option value="Series">Series</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12">Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Movie Name" class="form-control form-control-line" name="name" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Run Time</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Time" class="form-control form-control-line" name="runtime" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">File</label>
                                    <div class="col-md-12">
                                        <input type="file" class="form-control form-control-line" name="movie_file" id="movie_file">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-12">Released Date</label>
                                    <div class="col-md-12">
                                        <input type="date" placeholder="date" class="form-control form-control-line" name="releaseddate" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Genre</label>
                                    <div class="col-md-12">
                                        <select name="genre" class="form-control form-control-line" >
                                            <option value="Action">Action</option>
                                            <option value="Adventure">Adventure</option>
                                            <option value="Comedy">Comedy</option>
                                            <option value="Crime">Crime</option>
                                            <option value="Drama">Drama</option>
                                            <option value="History">History</option>
                                            <option value="Horror">Horror</option>
                                            <option value="Science Fiction">Science Fiction</option>
                                            <option value="War">War</option>
                                            <option value="Western">Western</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Cover</label>
                                    <div class="col-md-12">
                                        <input type="file" class="form-control form-control-line" name="cover_file" id="cover_file">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-md-12">Price</label>
                                    <div class="col-md-12">
                                        <input type="number" placeholder="1000" class="form-control form-control-line" name="price" >
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-12">Decription</label>
                                    <div class="col-md-12">
                                        <textarea rows="3" class="form-control form-control-line" placeholder="Decription" name="decription"></textarea>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div class="col-md-5"></div>
                                    <div class="col-sm-5">
                                        <button class="btn btn-primary" type="submit" name="create" >Create</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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