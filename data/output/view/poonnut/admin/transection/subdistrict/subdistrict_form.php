<?php echo '<!-- view form -->'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">subdistrict_form</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Basic subdistrict_form Elements
            </div>
            <div class="panel-body">
                 <?php if (isset($error_msg)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error_msg; ?>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="<?php echo site_url('admin/transection/subdistrict/create'); ?>" method="post">
                            <input type="hidden" id="subdistrict_id" name="subdistrict_id" value="{subdistrict_id}">
                            <div class="form-group">
                                <label>Text Input with subdistrict_id</label>
                                <input name="subdistrict_id" id="subdistrict_id" value="{subdistrict_id}" class="form-control" placeholder="Enter text">
                            </div>   

                            <div class="form-group">
                                <label>Text Input with subdistrict_name</label>
                                <input name="subdistrict_name" id="subdistrict_name" value="{subdistrict_name}" class="form-control" placeholder="Enter text">
                            </div>   

                            <div class="form-group">
                                <label>Text Input with district_id</label>
                                <input name="district_id" id="district_id" value="{district_id}" class="form-control" placeholder="Enter text">
                            </div>   

                            <div class="form-group">
                                <label>Text Input with isdelte</label>
                                <input name="isdelte" id="isdelte" value="{isdelte}" class="form-control" placeholder="Enter text">
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

