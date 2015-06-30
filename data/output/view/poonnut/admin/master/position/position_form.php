<?php echo '<!-- view form -->'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">position_form</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Basic position_form Elements
            </div>
            <div class="panel-body">
                 <?php if (isset($error_msg)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error_msg; ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="<?php echo site_url('admin/master/position/create'); ?>" method="post">
                            <input type="hidden" id="position_id" name="position_id" value="{position_id}">
                            <div class="form-group">
                                <label>Text Input with position_id</label>
                                <input name="position_id" id="position_id" value="{position_id}" class="form-control" placeholder="Enter text">
                            </div>   

                            <div class="form-group">
                                <label>Text Input with position_name</label>
                                <input name="position_name" id="position_name" value="{position_name}" class="form-control" placeholder="Enter text">
                            </div>   

                            <div class="form-group">
                                <label>Text Input with type</label>
                                <input name="type" id="type" value="{type}" class="form-control" placeholder="Enter text">
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

