<?php
    include('includes/header.php');
    include('includes/navigation.php');
    require_once('includes/connect.php');
    $sql = "SELECT * FROM clients";
    $result = $db->query($sql);
    $res = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<div id="page-wrapper" style="min-height: 345px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">View Clients</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Clients
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>E-Mail</th>
                                    <th>Mobile</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($res as $client) { ?>
                                <tr>
                                    <td><?php echo $client['id']; ?></td>
                                    <td><?php echo $client['name']; ?></td>
                                    <td><?php echo $client['email']; ?></td>
                                    <td><?php echo $client['mobile']; ?></td>
                                    <td><a href="update-client.php?id=<?php echo $client['id']; ?>">Edit</a> <a href="delete-client.php?id=<?php echo $client['id']; ?>">Delete</a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<?php include('includes/footer.php'); ?>