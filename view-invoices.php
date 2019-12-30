<?php
    include('includes/header.php');
    include('includes/navigation.php');
    require_once('includes/connect.php');
    $sql = "SELECT * FROM invoices";
    $result = $db->query($sql);
    $res = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<div id="page-wrapper" style="min-height: 345px;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Invoices</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Invoices
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client Name</th>
                                    <th>Total</th>
                                    <th>Payment Mode</th>
                                    <th>Payment Reference</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($res as $invoice) { 
                                    // fetch the client details from clients table
                                    $clientsql = "SELECT * FROM clients WHERE id=?";
                                    $clientresult = $db->prepare($clientsql);
                                    $clientresult->execute(array($invoice['client_id']));
                                    $clientres = $clientresult->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                <tr>
                                    <td><a href="view-single-invoice.php?id=<?php echo $invoice['id']; ?>"><?php echo $invoice['id']; ?></a></td>
                                    <td><?php echo $clientres['name']; ?></td>
                                    <td><?php echo $invoice['amount']; ?></td>
                                    <td><?php echo $invoice['payment_mode']; ?></td>
                                    <td><?php echo $invoice['payment_ref']; ?></td>
                                    <td><?php echo $invoice['created']; ?></td>
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