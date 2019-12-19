<?php
    include('includes/header.php');
    include('includes/navigation.php');
?>
<div id="page-wrapper" style="min-height: 345px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">My Profile</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Update Profie Information Here...
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form">
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input class="form-control" placeholder="Enter User Name">
                                </div>
                                <div class="form-group">
                                    <label>E-Mail</label>
                                    <input type="email" class="form-control" placeholder="Enter E-Mail">
                                </div>
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input class="form-control" placeholder="Enter First Name">
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" placeholder="Enter Last Name">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" placeholder="Enter User Password">
                                </div>
                                <div class="form-group">
                                    <label>User Role</label>
                                    <select class="form-control">
                                        <option>Select User Role</option>
                                        <option>Subscriber</option>
                                        <option>Editor</option>
                                        <option>Administrator</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
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