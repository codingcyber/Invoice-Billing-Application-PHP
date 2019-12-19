<?php
    include('includes/header.php');
    include('includes/navigation.php');
?>
<div id="page-wrapper" style="min-height: 345px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add New Service</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create a New Service Here...
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form">
                                <div class="form-group">
                                    <label>Service Name</label>
                                    <input class="form-control" name="name" placeholder="Enter Servive Name">
                                </div>
                                <div class="form-group">
                                    <label>Service Description</label>
                                    <textarea class="form-control" name="description" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Service Price</label>
                                    <input class="form-control" name="price" placeholder="Enter Service Price">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-danger">Reset </button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->   
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<?php include('includes/footer.php'); ?>