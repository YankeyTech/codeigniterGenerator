<?php echo '<!-- view form -->'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">supervisor_form</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Basic supervisor_form Elements
            </div>
            <div class="panel-body">
                 <?php if (isset($error_msg)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error_msg; ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="<?php echo site_url('admin/transection/supervisor/create'); ?>" method="post">
                            <input type="hidden" id="sup_id" name="sup_id" value="{sup_id}">
                            <div class="form-group">
                                <label>Text Input with sup_id</label>
                                <input name="sup_id" id="sup_id" value="{sup_id}" class="form-control" placeholder="Enter text">
                            </div>   

                            <div class="form-group">
                                <label>Text Input with emp_id</label>
                                <input name="emp_id" id="emp_id" value="{emp_id}" class="form-control" placeholder="Enter text">
                            </div>   

                            <div class="form-group">
                                <label>Text Input with supervisor_id</label>
                                <input name="supervisor_id" id="supervisor_id" value="{supervisor_id}" class="form-control" placeholder="Enter text">
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

