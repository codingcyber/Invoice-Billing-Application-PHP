<?php
    include('includes/header.php');
    include('includes/navigation.php');
?>
<div id="page-wrapper" style="min-height: 345px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add New Client</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Create a New Client Here...
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form">
                                <div class="form-group">
                                    <label>Client Name</label>
                                    <input class="form-control" name="name" placeholder="Enter Client Name">
                                </div>
                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter E-Mail">
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input class="form-control" name="mobile" placeholder="Enter Mobile Number">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address" placeholder="Enter Client Address"></textarea>
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