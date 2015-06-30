<?php echo '<!-- view form -->'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">province_form</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Basic province_form Elements
            </div>
            <div class="panel-body">
                 <?php if (isset($error_msg)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error_msg; ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="<?php echo site_url('admin/master/province/create'); ?>" method="post">
                            <input type="hidden" id="province_id" name="province_id" value="{province_id}">
                            <div class="form-group">
                                <label>Text Input with province_id</label>
                                <input name="province_id" id="province_id" value="{province_id}" class="form-control" placeholder="Enter text">
                            </div>   

                            <div class="form-group">
                                <label>Text Input with province_name</label>
                                <input name="province_name" id="province_name" value="{province_name}" class="form-control" placeholder="Enter text">
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

