<div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
            </div>
            <div class="modal-body">
                <form action="forget.php" method="post">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-md-12">Username</label>
                            <div class="col-md-12">
                                <input type="text" name="username" placeholder="Answer" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Security Question</label>
                            <div class="col-md-12">
                                <select name="question" class="form-control">
                                <option value="1">What is name of your favorite teacher?</option>
                                <option value="2">What is brand of your first car?</option>
                                <option value="3">Who is your favorite comic or cartoon character?</option>
                                <option value="4">Who is your favorite person in history?</option>
                                <option value="5">What was the first album that you purchased?</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Security Answer</label>
                            <div class="col-md-12">
                                <input type="text" name="answer" placeholder="Answer" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" name="continue" class="btn btn-success btn-round pull-right">Continue</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>