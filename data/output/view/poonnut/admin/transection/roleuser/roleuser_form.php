<?php echo '<!-- view form -->'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">roleuser_form</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Basic roleuser_form Elements
            </div>
            <div class="panel-body">
                 <?php if (isset($error_msg)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error_msg; ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="<?php echo site_url('admin/transection/roleuser/create'); ?>" method="post">
                            <input type="hidden" id="role_user_id" name="role_user_id" value="{role_user_id}">
                            <div class="form-group">
                                <label>Text Input with role_user_id</label>
                                <input name="role_user_id" id="role_user_id" value="{role_user_id}" class="form-control" placeholder="Enter text">
                            </div>   

                            <div class="form-group">
                                <label>Text Input with user_id</label>
                                <input name="user_id" id="user_id" value="{user_id}" class="form-control" placeholder="Enter text">
                            </div>   

                            <div class="form-group">
                                <label>Text Input with role_id</label>
                                <input name="role_id" id="role_id" value="{role_id}" class="form-control" placeholder="Enter text">
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

