<div class="modal fade" id="monthlyincome" role="dialog" >
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style="text-align: center;">Pick Two Dates</h3>
                <hr />
                <form class="form-horizontal form-material" method="post" action="monthlyincome.php">
                    <div class="form-group">
                        <label class="col-md-12">From : </label>
                        <div class="col-md-12">
                            <input type="date" placeholder="date" class="form-control form-control-line" name="fromdate" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">To : </label>
                        <div class="col-md-12">
                            <input type="date" placeholder="date" class="form-control form-control-line" name="todate" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-5"></div>
                        <div class="col-sm-4">
                            <button class="btn btn-info" type="submit">Generate Report</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>