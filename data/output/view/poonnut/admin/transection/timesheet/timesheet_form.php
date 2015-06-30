<?php echo '<!-- view form -->'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">timesheet_form</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Basic timesheet_form Elements
            </div>
            <div class="panel-body">
                 <?php if (isset($error_msg)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error_msg; ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="<?php echo site_url('admin/transection/timesheet/create'); ?>" method="post">
                            <input type="hidden" id="time_sheet_id" name="time_sheet_id" value="{time_sheet_id}">
                            <div class="form-group">
                                <label>Text Input with time_sheet_id</label>
                                <input name="time_sheet_id" id="time_sheet_id" value="{time_sheet_id}" class="form-control" placeholder="Enter text">
                            </div>   

                            <div class="form-group">
                                <label>Text Input with emp_id</label>
                                <input name="emp_id" id="emp_id" value="{emp_id}" class="form-control" placeholder="Enter text">
                            </div>   

                            <div class="form-group">
                                <label>Text Input with supervisor_approve_id</label>
                                <input name="supervisor_approve_id" id="supervisor_approve_id" value="{supervisor_approve_id}" class="form-control" placeholder="Enter text">
                            </div>   

                            <div class="form-group">
                                <label>Text Input with project_id</label>
                                <input name="project_id" id="project_id" value="{project_id}" class="form-control" placeholder="Enter text">
                            </div>   

                            <div class="form-group">
                                <label>Text Input with start_date</label>
                                <input name="start_date" id="start_date" value="{start_date}" class="form-control" placeholder="Enter text">
                            </div>   

                            <div class="form-group">
                                <label>Text Input with end_date</label>
                                <input name="end_date" id="end_date" value="{end_date}" class="form-control" placeholder="Enter text">
                            </div>   

                            <div class="form-group">
                                <label>Text Input with work</label>
                                <input name="work" id="work" value="{work}" class="form-control" placeholder="Enter text">
                            </div>   

                            <div class="form-group">
                                <label>Text Input with approve_status</label>
                                <input name="approve_status" id="approve_status" value="{approve_status}" class="form-control" placeholder="Enter text">
                            </div>   

                            <div class="form-group">
                                <label>Text Input with comment</label>
                                <input name="comment" id="comment" value="{comment}" class="form-control" placeholder="Enter text">
                            </div>   

                            <div class="form-group">
                                <label>Text Input with leave_id</label>
                                <input name="leave_id" id="leave_id" value="{leave_id}" class="form-control" placeholder="Enter text">
                            </div>   

                            <div class="form-group">
                                <label>Text Input with time_stamp</label>
                                <input name="time_stamp" id="time_stamp" value="{time_stamp}" class="form-control" placeholder="Enter text">
                            </div>   

                            <div class="form-group">
                                <label>Text Input with isdelete</label>
                                <input name="isdelete" id="isdelete" value="{isdelete}" class="form-control" placeholder="Enter text">
                            </div>   

                            <button type="submit" class="btn btn-success">Submit Button</button>
                            <button type="reset" class="btn btn-danger">Reset Button</button>
                        </form>
                    </div>

                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

